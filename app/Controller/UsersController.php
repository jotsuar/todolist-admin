<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

    public $components = array('Paginator');

    public  $helpers = array('Paginator');
    
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout');
    }

    public function index() {
        $conditions = $this->User->buildConditions($this->request->query);
        $this->Paginator->settings = array('conditions' => $conditions, 'order' => array("User.modified DESC"));
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function login() {
        $this->layout = 'top_navigation';
        if($this->Auth->loggedIn()) {
            return $this->redirect("/profile");
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->validateActiveState();
                return $this->redirect("/profile");
            }
            $this->Session->setFlash(__('contraseña o correo inválido, por favor inténtelo nuevamente.'), 'flash_error');
        }
    }

    public function validateActiveState() {
        if(AuthComponent::user('role') == Configure::read('OTHER_ROLE')) {
            $this->Session->setFlash(__('Usuario no permitido'), 'flash_error');
            $this->logout();
        }
        if(AuthComponent::user('state') == Configure::read('DISABLED_VALUE')) {
            $this->Session->setFlash(__('Usted está inactivo para acceder a la aplicación, por favor contacta al administrador.'), 'flash_error');
            $this->logout();
        }
    }

    public function logout() {
        /**
         * Borrar sesión de usuario
         */
        $this->Cookie->delete('Auth.User');
        # Destroy the session
        $this->redirect($this->Auth->logout());
    }

    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Página no encontrada.'));
        }
        $this->User->recursive = 0;
        $conditions = array('User.' . $this->User->primaryKey => $id);
        $this->set('user', $this->User->find('first', compact('conditions')));
    }

    public function add() {
        if (AuthComponent::user('role') != Configure::read('ADMIN_ROLE')) {
            throw new NotFoundException(__('Página no encontrada.'));
        }
        if ($this->request->is('post') || AuthComponent::user('role') != Configure::read('ADMIN_ROLE')) {
            $this->User->create();
            $hash = $this->User->generateHashChangePassword();
            $this->request->data['User']['hash_change_password'] = $hash;

            $user = $this->request->data;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Los datos se han guardado correctamente.'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Error al guardar, por favor inténtelo nuevamente.'), 'flash_error');
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists($id) || AuthComponent::user('role') != Configure::read('ADMIN_ROLE')) {
            throw new NotFoundException(__('Página no encontrada.'));
        }
        $conditions = array('User.id' => $id);
        $user       = $this->User->find('first', compact('conditions'));
        $this->request->data["User"]["email"] = $user["User"]["email"];
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->User->updateSession($this->request->data, $this->Session);
                $this->Session->setFlash(__('Los datos se han guardado correctamente.'), 'flash_success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Error al guardar, por favor inténtelo nuevamente.'), 'flash_error');
            }
        } else {
            $conditions = array('User.' . $this->User->primaryKey => $id);
            $this->request->data = $this->User->find('first', compact('conditions'));
        }
    }
 
    public function profile() {
        
    }

    public function edit_profile() {
        if ($this->request->is('post') || $this->request->is('put')) { 
            $this->request->data['User']['id']    = AuthComponent::user('id');
            $this->request->data['User']['email'] = AuthComponent::user('email'); 
            if ($this->User->save($this->request->data)) {
                $this->User->updateSession($this->request->data, $this->Session);
                $this->Session->setFlash(__('Los datos han sido guardados correctamente.'), 'flash_success');
                $this->redirect(array('action' => 'profile'));
            } else {
                $this->Session->setFlash(__('Error al guardar, por favor inténtelo nuevamente.'), 'flash_error');
            }   
        } else {
            $conditions = array('User.id' => AuthComponent::user('id'));
            $this->request->data = $this->User->find('first', compact('conditions')); 
        }


    }

    public function change_password() {
        App::Import('Utility', 'Validation');
        if(!AuthComponent::user('id')) $this->layout = "top_navigation";
        if($this->request->is('post') || $this->request->is('put')) {
            //when user is logged
            if(AuthComponent::user('id')) {
                $currentPassword = $this->User->field('password',array('User.id'=>AuthComponent::user('id')));
                $confirmPassword = AuthComponent::password($this->request->data['User']['confirm_password']);
                /*If the passwords match*/
                if(Validation::minLength($this->request->data['User']['password'], 8)) {
                    /*If the passwords match*/
                    if($currentPassword == AuthComponent::password($this->request->data['User']['current_password'])) {
                        if(AuthComponent::password($this->request->data['User']['password']) == $confirmPassword) {
                            $this->request->data['User']['id'] = AuthComponent::user('id');

                            if ($this->User->save($this->request->data, array('validate'=>false))) {
                                $this->Session->setFlash(__('La contraseña ha sido cambiada.'), 'flash_success');
                                $this->redirect(array('action'=>'profile'));
                            } else {
                                $this->Session->setFlash(__('Error al guardar, por favor inténtelo nuevamente.'), 'flash_error');   
                            }
                        } else {
                            $this->Session->setFlash(__('Las contraseñas no coinciden.'), 'flash_fail');
                        }
                    } else {
                        $this->Session->setFlash(__('La contraseña actual es incorrecta'), 'flash_fail');
                    }
                } else {
                    $this->Session->setFlash(__('La contraseña deben tener mínimo 8 caracteres.'), 'flash_fail');
                }           
           
            } 
        }
    }

    public function change_state($id = null, $state=null) {
        if(in_array($state, array(Configure::read('ENABLED_VALUE'), Configure::read('DISABLED_VALUE')))){
            $data = array("User"=>array(
                'id'    => $id,
                'state' => $state,
            ));
            if ($this->User->save($data, array('validate'=>false))) {
                $this->Session->setFlash(__('Los datos se han guardado correctamente.'), 'flash_success');
            } else {
                $this->Session->setFlash(__('Error al guardar, por favor inténtalo nuevamente.'), 'flash_error');
            }   
        }
        $this->redirect(array('action' => 'index'));
    }
}

?>
