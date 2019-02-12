<div class="row">
    <section class="content-header">
      <?php if(AuthComponent::user("id")):?>
        <h1><?php echo __('Cambiar contraseña'); ?></h1>
      <?php else: ?>
        <h1><?php echo __('Restablecer contraseña'); ?></h1>
      <?php endif; ?>
    </section>
</div>
<hr>
<div class="row">
  <?php echo $this->Form->create('User'); ?>
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header"></div>
            <div class="box-body">
              <div class="row">
                  <div  class="col-md-5 col-md-offset-3">
                  <p></p>
                  <?php if(AuthComponent::user('id')): ?>
                   <div class="form-group">
                      <label><?php echo __('Contraseña actual'); ?></label>
                      <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                        <?php echo $this->Form->input('current_password', array('type'=>'password','div'=>false,'label'=>false, 'class'=>'form-control', 'required')); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                    <div class="form-group">
                      <label><?php echo __('Nueva contraseña'); ?></label>
                      <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                        <?php if(!AuthComponent::user('id')) echo $this->Form->input('hash', array('type'=>'hidden','value'=>(!empty($hash) ? $hash: null))); ?>
                        <?php echo $this->Form->input('password', array('type'=>'password','div'=>false,'label'=>false, 'class'=>'form-control', 'required')); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label><?php echo __('Confirmar contraseña'); ?></label>
                      <div class="input-group">
                        <div class="input-group-addon"><span class="fa fa-lock"></span></div>
                        <?php if(!AuthComponent::user('id')) echo $this->Form->input('hash', array('type'=>'hidden','value'=>(!empty($hash) ? $hash: null))); ?>
                        <?php echo $this->Form->input('confirm_password', array('type'=>'password','div'=>false,'label'=>false, 'class'=>'form-control', 'required')); ?>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <div class="box-footer">
              <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6"></div>
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <button class="btn icon-btn-save btn-primary" type="submit">
                        <?php echo __('Cambiar contraseña') ?>
                      </button>
                  </div>
              </div>
            </div>
        </div>
    </div>
  </form>
</div>