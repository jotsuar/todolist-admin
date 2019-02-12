<div class="row">
    <section class="content-header">
      <h1><?php echo __('Usuarios'); ?></h1>
    </section>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <?php $this->request->data =  array('Search'=>$this->request->query); ?>
        <?php echo $this->Form->create('Search',array('url'=>array('controller'=>$this->request->controller),'class'=>'form-inline', 'type'=>'GET', 'role'=>'form'));?>
            <div class="form-group">
                <label class="sr-only" for="q"><?php echo __('Buscar');?></label>
                <?php echo $this->Form->input('q', array('placeholder'=>__('Buscar...'), 'id'=>'q','label'=>false,'div'=>false,'class'=>'form-control'));?>
            </div>
            <button type="submit" class="btn btn-default"><?php echo __('Buscar');?></button>
            <?php 
                if(AuthComponent::user('role') == Configure::read('ADMIN_ROLE')) {
                    echo $this->Html->link(__('Adicionar usuario'), array('action' => 'add'), array('class'=>'btn btn-info pull-right')); 
                }
            ?>
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-xs-12">
        <div class="box"> 
            <?php if(empty($users) && !empty($this->request->query['q'])) : ?>
                <script type='text/javascript'>$(function(){bootbox.alert("<div class='alert alert-danger'><?php echo __('No se encontraron datos');?></div>");})</script>
            <?php endif; ?>
            <div class="box-body table-responsive no-padding">
                <table cellpadding="0" cellspacing="0" class="table table-striped table-hover">
                    <thead>
                        <tr>                        
                            <th><?php echo $this->Paginator->sort('username', __('Nombre')); ?></th>
                            <th><?php echo $this->Paginator->sort('email', __('Correo electrónico')); ?></th>
                            <th><?php echo $this->Paginator->sort('state', __('Estado')); ?></th>
                            <th><?php echo __('Acciones'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                                <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                                <td><span class="label label-<?php echo $user['User']['state']; ?>"><?php echo ($user['User']['state'] == Configure::read('ENABLED_VALUE')) ? __('Activo') : __('Inactivo'); ?></span></td>
                                <td>
                                    <?php echo $this->Html->link("", array('action' => 'view',   $user['User']['id']), array('class'=>'btn btn-success btn-xs glyphicon glyphicon-eye-open isTooltip',  'data-placement'=>'top' ,'title'=>__('Ver'))); ?>
                                    <?php 
                                        if(AuthComponent::user('role') == Configure::read('ADMIN_ROLE') && AuthComponent::user("id") != $user["User"]["id"]) {
                                            echo $this->Html->link("", array('action' => 'edit',   $user['User']['id']), array('class'=>'btn btn-info btn-xs glyphicon glyphicon-share isTooltip',  'data-placement'=>'top' ,'title'=>__('Editar')));
                                        }
                                    ?>
                                    <?php 
                                        if(AuthComponent::user('role') == Configure::read('ADMIN_ROLE') && AuthComponent::user("id") != $user["User"]["id"]) {
                                            if($user['User']['state'] == Configure::read('ENABLED_VALUE')) {
                                                echo $this->Html->link("", array('action' => 'change_state', $user['User']['id'], 0) , array('class'=>'btn btn-danger btn-xs glyphicon glyphicon-remove-sign isTooltip deleteModal',  'data-placement'=>'top' ,'confirm-message'=>__('¿Realmente desea desabilitar este usuario?'), 'title'=>__('Desabilitar'))); 
                                            } elseif($user['User']['state'] == Configure::read('DISABLED_VALUE')) {
                                                echo $this->Html->link("", array('action' => 'change_state', $user['User']['id'], 1) , array('class'=>'btn btn-warning btn-xs glyphicon glyphicon-ok-sign isTooltip deleteModal',  'data-placement'=>'top' ,'confirm-message'=>__('¿Realmente desea habilitar este usuario?'), 'title'=>__('Habilitar'))); 
                                            }
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p>
            <small>
                <?php
                    echo $this->Paginator->counter(array(
                    'format' => __('Página {:page} de {:pages}, mostrando {:current} registros de {:count} en total, comenzando en {:start}, terminando en {:end}')
                    ));
                ?>
            </small>
        </p>

        <ul class="pagination">
            <?php
                echo $this->Paginator->prev('< ' . __('Ant'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                echo $this->Paginator->next(__('Sig') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
            ?>
        </ul>
    </div>
</div>
