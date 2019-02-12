<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package   app.Controller
 * @link    http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = array('Auth','Session','Error','Cookie');
  public $uses       = array('User');
  public $helpers    = array('CakeStrap' => array('className' => 'CakeStrapHtml'),'Form' => array('className' => 'CakeStrapForm'));

  public function beforeFilter() {
    $this->Auth->authenticate = array('Form');
    $this->Auth->authenticate = array(
        'Form' => array(
            'fields' => array('username' => 'email', 'password' => 'password'),
        ),
    );
    $this->Auth->loginRedirect  = array('controller'=>'pages','action'=>'index');
    $this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
    $this->Auth->authError      = 'No tiene permitida esta acción';
    Configure::write('Config.language', 'esp');
  }

  public function beforeRender() {
  
  }


  public function outAjax($value=null) {
    echo $value;
  }

  public function outJSON($value=null) {
    echo json_encode($value);
  }
}

