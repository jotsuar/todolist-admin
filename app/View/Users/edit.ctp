<div class="row">
    <section class="content-header">
      <h1><?php echo __('Editar usuario'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-default"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="glyphicon glyphicon-th-list"></i>
            <?php echo __('Listar usuario'); ?>
        </a>

        <a class="editModal btn btn-sm btn-default" href="<?php echo $this->Html->url(array('action'=>'view',$this->request->data['User']['id']));?>">
            <i class="glyphicon glyphicon-share-alt"></i>
            <?php echo __('Ver usuario'); ?>
        </a>

        <a class="btn btn-sm btn-default"  href="<?php echo $this->Html->url(array('action'=>'add'));?>">
            <i class="glyphicon glyphicon-plus"></i>
            <?php echo __('Adicionar usuario'); ?>
        </a>
    </div>
</div>
<hr/>
<div class="row"> 
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border"></div>
            <?php echo $this->Form->create('User', array('type'=>'file'));?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo $this->Form->input('id');?>
                        <?php echo $this->Form->label('User.username',__('Nombre completo'), array('class'=>'control-label required'));?>
                        <?php echo $this->Form->input('username',array('label' => false, 'div'=>false,'class'=>'form-control', 'required'));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('User.email',__('Correo electrónico'), array('class'=>'control-label required'));?>
                        <?php echo $this->Form->input('email',array('label' => false,'div'=>false, 'required','class'=>'form-control', 'readOnly' => true));?>
                    </div>
                    
                    <div class="form-group">
                        <?php echo $this->Form->label('User.role',__('Rol'), array('class'=>'control-label'));?>
                        <?php 
                            $options = array(
                                'administrador' => __('Administrador'), 
                                'generico'      => __('Genérico')
                            );
                            echo $this->Form->input('role', array('label' => false, 'div'=>false,'options' => $options, 'class'=>'form-control'));
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
