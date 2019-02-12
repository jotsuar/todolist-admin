<div class="row">
    <section class="content-header">
      <h1><?php echo __('Editar perfil'); ?></h1>
    </section>
</div>
<hr>
<div class="row"> 
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header with-border"></div>
            <?php echo $this->Form->create('User', array('type'=>'file'));?>
                <div class="box-body">
                    <div class="form-group">
                        <?php echo $this->Form->label('Ingredient.username',__('Nombre completo'), array('class'=>'control-label required-label'));?>
                        <?php echo $this->Form->input('username',array('label'=>false, 'div'=>false,'required', 'class'=>'form-control'));?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->label('Ingredient.email',__('Correo electrónico'), array('class'=>'control-label required-label'));?>
                        <?php echo $this->Form->input('email',array('label'=>false, 'div'=>false,'required','readOnly' => true, 'class'=>'form-control'));?>
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
$('.btn').on('click', function() {
  var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 3000);
});
</script>
