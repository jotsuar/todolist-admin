<div class="row">
    <section class="content-header">
      <h1><?php echo __('Perfil'); ?></h1>
    </section>
</div>
<hr>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <h2 class="panel-title">
                    <b>
                        <?php  echo __('Visualizando').' '.__('Usuario'); ?>
                    </b>
                </h2>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="thumbnail">
                            <?php
                              $userImg = AuthComponent::user('imagen');
                              if(!empty($userImg) && file_exists(APP.'webroot'.DS.'img'.DS.'users'.DS.$userImg)) {
                                  echo $this->Html->image("users/{$userImg}", array('class'=>'img-profile','alt'=>"User Image"));
                              } else {
                                  echo $this->Html->image('users/default.png', array('class'=>'img-profile'));
                              }
                            ?>
                        </a>                       
                    </div>
                    <div class="col-md-6">
                        <strong><?php echo  __('Datos');?></strong><br>
                        <div class="table-responsive">
                            <table class="table table-condensed table-responsive table-user-information">
                                <tbody>
    								
    								<tr>
    									<td><?php echo __('Nombre'); ?></td>
    									<td>
    										<?php echo AuthComponent::user('username'); ?>&nbsp;
    									</td>
    								</tr>

    								<tr>
    									<td><?php echo __('Correo'); ?></td>
    									<td>
    										<?php echo AuthComponent::user('email'); ?>&nbsp;
    									</td>
    								</tr>
                                    <tr>
                                        <td><?php echo __('Teléfono'); ?></td>
                                        <td>
                                            <?php echo AuthComponent::user('telefono'); ?>&nbsp;
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>