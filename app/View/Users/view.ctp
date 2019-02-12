<div class="row">
    <section class="content-header">
      <h1><?php  echo __('Visualizando').' '.__('usuario'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-sm btn-success"  href="<?php echo $this->Html->url(array('action'=>'index'));?>">
            <i class="glyphicon glyphicon-th-list"></i>
            <?php echo __('Listar'); ?>
        </a>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header"></div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <?php 
                                if(!empty($user['User']['imagen'])) {
                                    echo $this->Html->image("users/{$user['User']['imagen']}", array('class'=>'img-profile'));
                                } else {
                                    echo $this->Html->image('users/default.png', array('class'=>'img-profile'));
                                }
                            ?>
                        </div>                       
                    </div>
                    <div class="col-md-6">
                        <strong><?php echo  __('Datos');?></strong><br>
                        <div class="table-responsive">
                            <table class="table table-condensed table-responsive table-user-information">
                                <tbody>
                                  <tr>
                                    <td><?php echo __('Nombre'); ?></td>
                                    <td>
                                      <?php echo h($user['User']['username']); ?>&nbsp;
                                    </td>
                                  </tr>

                                  <tr>
                                    <td><?php echo __('Correo electrónico'); ?></td>
                                    <td>
                                      <?php echo h($user['User']['email']); ?>&nbsp;
                                    </td>
                                  </tr>

                                  <tr>
                                    <td><?php echo __('Creado'); ?></td>
                                    <td>
                                      <?php echo h($user['User']['created']); ?>&nbsp;
                                    </td>
                                  </tr>

                                  <tr>
                                    <td><?php echo __('Modificado'); ?></td>
                                    <td>
                                      <?php echo h($user['User']['modified']); ?>&nbsp;
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
