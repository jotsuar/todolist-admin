<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $this->Html->url('/'); ?>"><b><?php echo configure::read("Application.name");?></b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg"><?php echo __('Inicio de sesión'); ?></p>
    <?php echo $this->Form->create('User',array('url' => array('controller' => 'users','action' => 'login')));?>
      <div class="form-group has-feedback">
        <?php echo $this->Form->label('Categoria.nombre',__('Correo electrónico'), array('class'=>'control-label required'));?>
        <?php echo $this->Form->input('email', array('class' => 'form-control border-input','label'=>false,'div'=>false, 'required')); ?>
      </div>
      <div class="form-group has-feedback">
        <?php echo $this->Form->label('Categoria.nombre',__('Contraseña'), array('class'=>'control-label required'));?>
        <?php echo $this->Form->input('password', array('class' => 'form-control border-input','label'=>false,'div'=>false, 'required')); ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-default"><?php echo __('Ingresar')?></button>
        </div>
      </div>
    </form>
  </div>
</div>