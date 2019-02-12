<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="col-md-12">
	<a class="btn btn-sm btn-warning btn-fill"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'add'));?>" ?>">
	    <i class="fa fa-plus-circle"></i>
	    <?php echo "<?php echo __('Add'); ?>\n"; ?>
	</a>
</div>
<hr>
<div class="col-md-12">
	<div class="card">
	    <div class="header text-center" data-background-color="blue">
	        <h4 class="title"><?php echo "<?php echo __('{$pluralHumanName}'); ?>"; ?></h4>
	        <p class="category">&nbsp;</p>
	    </div>
		<div class="content table-responsive">
			<?php echo "<?php if(empty(\${$pluralVar}) && !empty(\$this->request->query['q'])) : ?>" ?>
			<?php echo "\t\t\t<script type='text/javascript'>$(function(){demo.showNotification('<?php echo __('No se encontraron datos');?>', 'top','center','info');})</script>\n"; ?>
			<?php echo "<?php endif; ?>\n" ?>
			<table class="table table-condensed">
				<thead class="text-primary">
					<tr>						<?php echo "\n" ?>
			<?php foreach ($fields as $field):
				$title = ucfirst(mb_strtolower($field));
				if(in_array($field , array('id','created','modified','sucursal_id'))) continue;
				$rest = substr($title, -3);
				if($rest == '_id') {
					$title = substr($title, 0, -3);
				}
				$title = Inflector::humanize($title);
			?>
			<th><?php echo "<?php echo \$this->Paginator->sort('{$field}', __('{$title}')); ?>"; ?></th>
			<?php endforeach; ?>
			<th><?php echo "<?php echo __('Actions'); ?>"; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
	echo "<?php \n\t\t\t\t\tif(is_array(\${$pluralVar}))\n";
	echo "\t\t\t\t\t foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t\t\t\t\t\t\t<tr>\n\t\t";
					foreach ($fields as $field) {
						if(in_array($field , array('id','created','modified'))) continue;
						$isKey = false;
						if (!empty($associations['belongsTo'])) {
							foreach ($associations['belongsTo'] as $alias => $details) {
								$clave = $details['displayField'];
								$name = array_search('name', $details['fields']);
								if(!empty($name)) $clave = 'name';
								if ($field === $details['foreignKey']) {
									$isKey = true;
									echo "\t\t\t\t\t\t\t\t<td>\n\t\t\t\t\t\t\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$clave}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t\t\t\t\t\t</td>\n";
									break;
								}
							}
						}
						if ($isKey !== true) {
							echo "\t\t\t\t\t\t\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
						}
					}
				?>
								<td class="td-actions">
								    <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'view',\${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"  ?>" title="<?php echo "<?php echo __('View'); ?>"; ?>" class="btn btn-info  btn-xs">
								        <i class="fa fa-eye"></i>
								    </a>
								    <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'edit',\${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"  ?>" title="<?php echo "<?php echo __('Edit'); ?>"; ?>" class="btn btn-success btn-xs">
								        <i class="fa fa-edit"></i>
								    </a>
								    <a rel="tooltip" href="<?php echo "<?php echo \$this->Html->url(array('action' => 'delete',\${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>"  ?>" title="<?php echo "<?php echo __('Delete'); ?>"; ?>" class="btn btn-danger btn-xs deleteModal" confirm-message="<?php echo __('Realmente desea eliminar este ítem?'); ?>">
								        <i class="fa fa-trash"></i>
								    </a>
								</td>
				<?php 
						echo "\t\t</tr>\n";
						echo "\t\t\t\t\t<?php endforeach; ?>\n";
				 ?>
				</tbody>
			</table>
		</div>
	</div>
	<p>
		<small>
			<?php echo "<?php
				echo \$this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
			?>\n"; ?>
		</small>
	</p>

	<ul class="pagination pagination-info">
		<?php
			echo "<?php\n";
			echo "\t\t\t\t\techo \$this->Paginator->prev('< ' . __('Prev'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
			echo "\t\t\t\t\techo \$this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));\n";
			echo "\t\t\t\t\techo \$this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));\n";
			echo "\t\t\t\t?>\n";
		?>
	</ul>
</div>
