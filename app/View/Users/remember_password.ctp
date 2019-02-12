<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo $this->Html->url('/'); ?>"><b><?php echo Configure::read('Application.name') ?></b></a>
  </div>
  <div class="login-box-body">
	<br><br>
	<?php echo $this->Form->create('User',array('url' => array('controller' => 'users','action'	 => 'remember_password')));?>
		<h3 class="text-primary">
			<?php echo __('¿Olvidaste tu contraseña?') ?>
		</h3>
		<hr>
		<div class="clearfix"></div>
		<div class="col-xs-12">	
		    <div class="form-group">
				<?php echo $this->Form->label('User.email',__('Por favor ingresa tu dirección de correo'), array('class'=>'required'));?>
		    	<?php echo $this->Form->input('email',array('placeholder' => __('Correo'),'label' => false,'div'=>false, 'class' => 'form-control')); ?>
		    </div>
		</div>
		<div class="col-xs-12">	
			<button type="submit" class="btn btn-primary">
				<?php echo __('Continuar'); ?>
			</button>
		</div>
	</form>
	<br><br>
	<hr>
	<hr>
  </div>
</div>