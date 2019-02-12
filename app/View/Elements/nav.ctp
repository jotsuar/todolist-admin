<header class="main-header">
  <a href="<?php echo $this->webroot ?>" class="logo">
    <span class="logo-mini"><i class="fa fa-check-circle-o"></i></span>
    <span class="logo-lg"><b>TODOLIST</b></span>
  </a>

  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">---</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <?php if(AuthComponent::user('id')) { ?>
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php
                $userImg = AuthComponent::user('imagen');
                if(!empty($userImg) && file_exists(APP.'webroot'.DS.'img'.DS.'users'.DS.$userImg)) {
                    echo $this->Html->image("users/{$userImg}", array('class'=>'user-image','alt'=>"User Image"));
                } else {
                    echo $this->Html->image('users/default.png', array('class'=>'user-image'));
                }
            ?>
            <span class="hidden-xs"><?php echo AuthComponent::user("username") ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <?php
                  $userImg = AuthComponent::user('imagen');
                  if(!empty($userImg) && file_exists(APP.'webroot'.DS.'img'.DS.'users'.DS.$userImg)) {
                      echo $this->Html->image("users/{$userImg}", array('class'=>'img-circle','alt'=>"User Image"));
                  } else {
                      echo $this->Html->image('users/default.png', array('class'=>'img-circle'));
                  }
              ?>
              <p>
                <?php echo AuthComponent::user("username") ?>
                <small></small>
              </p>
            </li>
            <li class="user-body">
              <div class="row">
                <div class="col-xs-5 text-center">
                  <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'edit_profile')); ?>">
                    <?php echo __('Editar perfil'); ?>
                  </a>
                </div>
                <div class="col-xs-7 text-center">
                  <a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'change_password')); ?>">
                    <?php echo __('Cambiar contraseña'); ?>
                  </a>
                </div>
              </div>
            </li>
            <li class="user-footer">
              <div class="pull-right">
                  <a href="<?php echo $this->webroot ?>users/logout" class="btn btn-default btn-flat"><?php echo __('Cerrar sesión'); ?></a>
              </div>
            </li>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </div>
  </nav>
</header>
