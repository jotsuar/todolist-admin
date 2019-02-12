<div class="row">
    <section class="content-header">
      <h1><?php echo __('Registrar').' '.__('usuario'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-default shiny green"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="glyphicon glyphicon-th-list"></i>
            <?php echo __('Listar usuarios'); ?>
        </a>
    </div>
</div>
<hr/>
<div class="row"> 
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border"></div>
            <?php echo $this->Form->create('User', array('type'=>'file', 'novalidate' => true));?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo $this->Form->label('Categoria.username',__('Nombre completo'), array('class'=>'control-label required'));?>
                        <?php echo $this->Form->input('username',array('label' => false, 'div'=>false, 'required', 'class'=>'form-control',));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('Categoria.email',__('Correo electrónico'), array('class'=>'control-label required'));?>
                        <?php echo $this->Form->input('email',array('label' => false, 'div'=>false, 'required','class'=>'form-control',));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('Categoria.password',__('Contraseña'), array('class'=>'control-label required'));?>
                        <?php echo $this->Form->input('password',array('label' => false, 'div'=>false, 'required','class'=>'form-control','autocomplete' => 'new-password'));?>
                    </div>
                     <div class="form-group">
                        <?php echo $this->Form->label('Categoria.confirm_password',__('Confirmar contraseña'), array('class'=>'control-label required'));?>
                        <?php echo $this->Form->input('confirm_password',array('label' => false, 'div'=>false, 'class'=>'form-control','class'=>'form-control','required','autocomplete' => 'new-password','type' => 'password'));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('Categoria.role',__('Rol'), array('class'=>'control-label required'));?>
                        <?php 
                            $options = array(
                                'administrador' => __('Administrador'), 
                                'generico'      => __('Genérico')
                            );
                            echo $this->Form->input('role', array('label' => false, 'div'=>false, 'class'=>'form-control', 'options' => $options));
                        ?>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn-submit btn btn-primary pull-right" id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> <?php echo __('Cargando...'); ?>">
                        <?php echo __('Guardar'); ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('.btn-submit').on('click', function() {
  var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 3000);
});
</script>
