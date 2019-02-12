<aside class="main-sidebar">
  <section class="sidebar" style="height: auto;">
  <?php if(AuthComponent::user('id')){?>
    <div class="user-panel">
      <div class="pull-left image">
        <?php
            $userImg = AuthComponent::user('imagen'); 
            if(!empty($userImg) && file_exists(APP.'webroot'.DS.'img'.DS.'users'.DS.$userImg)) {
                echo $this->Html->image("users/{$userImg}", array('class'=>'user-image','alt'=>"User Image"));
            } else {
                echo $this->Html->image('users/default.png', array('class'=>'user-image'));
            }
        ?>
      </div>
      <div class="pull-left info">
        <p><?php echo AuthComponent::user('username') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?php echo __("Online") ?></a>
      </div>
    </div>

    <ul class="sidebar-menu" style="margin-top: 10px">
      <li class="header"><?php echo __('NAVEGACIÓN') ?></li>
      <li class="treeview">
        <a href="<?php echo $this->Html->url('/profile'); ?>">
          <i class="fa fa-user"></i> <span><?php echo __('Perfil') ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span><?php echo __('Usuarios') ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'add'));?>"><i class="fa fa-plus-circle"></i><?php echo __('Registrar Usuario') ?></a></li>
          <li><a href="<?php echo $this->Html->url(array('controller'=>'users','action'=>'index'));?>"><i class="fa fa-list"></i><?php echo __('Listar Usuarios') ?></a></li>
        </ul>
      </li>
      
    </ul>
  <?php } ?>
  </section>
</aside>