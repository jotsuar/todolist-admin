<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="col-md-12">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-sm btn-fill btn-success"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'index'));?>" ?>">
                <i class="fa fa-list-alt"></i>
                <?php echo "<?php echo __('List'); ?>\n"; ?>
            </a>

            <a class="btn btn-sm btn-fill btn-info" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'edit',\${$singularVar}['{$modelClass}']['id']));?>" ?>">
                <i class="fa fa-edit"></i>
                <?php echo "<?php echo __('Edit'); ?>\n"; ?>
            </a>

            <a class="deleteModal btn btn-sm btn-fill btn-danger" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'delete',\${$singularVar}['{$modelClass}']['id']));?>" ?>">
                <i class="fa fa-trash"></i>
                <?php echo "<?php echo __('Delete'); ?>\n"; ?>
            </a>

            <a class="btn btn-sm btn-fill btn-warning"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'add'));?>" ?>">
                <i class="fa fa-plus-circle"></i>
                <?php echo "<?php echo __('Add'); ?>\n"; ?>
            </a>
        </div>
        <hr>
        <div class="col-md-12">
            <div class="card">
                <div class="header text-center" data-background-color="blue">
                    <h4 class="title"><?php echo "<?php  echo __('Viewing').' '.__('{$singularHumanName}'); ?>"; ?></h4>
                    <p class="category">&nbsp;</p>
                </div>
                <div class="content table-responsive">  
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">   
                            <table class="table table-condensed"><?php echo "\n"; ?>
                                <tbody><?php echo "\n"; ?>
        							<?php
        								foreach ($fields as $field) {
        									if(in_array($field, array('id','sucursal_id'))){
                                                continue;
                                            } 
        									$isKey = false;
        									if (!empty($associations['belongsTo'])) {
        										foreach ($associations['belongsTo'] as $alias => $details) {
        											if ($field === $details['foreignKey']) {
                                                        $label = ucfirst(strtolower(Inflector::humanize($alias)));
        												$isKey = true;
        												echo "\n\t\t\t\t\t\t\t\t\t<tr>\n";
        												echo "\t\t\t\t\t\t\t\t\t\t<td><?php echo __('$label'); ?></td>\n";
        												echo "\t\t\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}']), array('class' => '')); ?>&nbsp;\n\t\t\t\t\t\t\t\t\t\t</td>\n";
        												echo "\t\t\t\t\t\t\t\t\t</tr>\n";
        												break;
        											}
        										}
        									}
        									if ($isKey !== true) {
                                                $label = ucfirst(strtolower(Inflector::humanize($field)));
        										echo "\n\t\t\t\t\t\t\t\t\t<tr>\n";
        										echo "\t\t\t\t\t\t\t\t\t\t<td><?php echo __('$label'); ?></td>\n";
        										echo "\t\t\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;\n\t\t\t\t\t\t\t\t\t\t</td>\n";
        										echo "\t\t\t\t\t\t\t\t\t</tr>\n";
        									}
        								}
                                        echo "\n";
        							?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
