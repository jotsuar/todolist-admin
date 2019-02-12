<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public $name = 'User';

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password']) && !empty($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    public $validate = array(
        'username' => array(
            array(
                'rule' => array('notEmpty'),
                'message' => 'El nombre es requerido.'
            ),
        ),
        'email' => array(
            array(
                'rule' => array('email'),
                'message' => 'Dirección de correo electrónico no válida.'
            ),
            array(
                'rule' => 'isUnique',
                'message' => 'Esta dirección de correo electrónico ya existe.'
            )
        ), 
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('administrador', 'generico')),
                'message' => 'Por favor selecciona un rol.',
                'allowEmpty' => false
            )
        ),
        'password' => array(
            array('rule' => 'notEmpty', 'message' => 'La contraseña es requerida.', 'on' => 'create'),
            array('rule' => array('minLength', '8'), 'message' => 'La contraseña debe tener como mínimo 8 caracteres.'),
            array('rule' => 'matchPasswords', 'required' => true, 'message' => '', 'on' => 'create'),
        ),
        'confirm_password' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'on' => 'create',
            'message' => 'Por favor confirma tu contraseña.',
            array(
                'rule' => array('minLength', '8'),
                'required' => true,
                'message' => 'La contraseña debe tener como mínimo 8 caracteres.',
                'on' => 'create'
            )
        ),
        
    );

    public function buildConditions($params = array()) {
        $conditions = array();
        if (!empty($params['q'])) {
            $params['q'] = strtolower($params['q']);
            $conditions['OR'] = array(
                'LOWER(User.username) LIKE' => "%{$params['q']}%",
                'LOWER(User.email)    LIKE' => "%{$params['q']}%",
            );
        }
        return $conditions;
    }

    public function generateHashChangePassword() {
        $salt = Configure::read('Security.salt');
        $salt_v2 = Configure::read('Security.cipherSeed');
        $rand = mt_rand(1, 999999999);
        $rand_v2 = mt_rand(1, 999999999);
        $hash = hash('sha256', $salt . $rand . $salt_v2 . $rand_v2);
        return $hash;
    }

    public function getUsername($email) {
        $username = $this->findByEmail($email, 'username');
        if (empty($username)) {
            throw new InternalErrorException(__('Invalid username or password, try again'));
        }
        return $username['User']['username'];
    }

    public function updateSession($data = array(), $Session) {
        if (!empty($data['User'])) {
            if ($data['User']['id'] == AuthComponent::user('id')) {
                $conditions = array('User.id' => AuthComponent::user('id'));
                $recursive  = -1;
                $user       = $this->find('first', compact('conditions', 'recursive'));
                foreach ($user['User'] as $key => $value) {
                    $Session->write("Auth.User.{$key}", $value);
                }
            }
        } 
    }

    public function matchPasswords($data) {
        if ($data['password'] == $this->data['User']['confirm_password']) {
            return true;
        }
        $this->invalidate('confirm_password', 'Tus contraseñas no coinciden.');
        return false;
    }

}

?>
