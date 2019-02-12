<?php if($action=='add') { ?>
<div class="col-md-12">
	<div class="row">
		<div class="col-md-12">
            <a class="btn btn-sm btn-fill btn-success"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'index'));?>" ?>">
                <i class="fa fa-list-alt"></i>
                <?php echo "<?php echo __('List'); ?>\n"; ?>
            </a>
        </div>
        <hr>
		<div class="col-md-12">
			<div class="card">
			    <div class="header text-center" data-background-color="blue">
			        <h4 class="title"><?php printf("<?php echo __('%s').' '.__('%s'); ?>", 'Add', $singularHumanName); ?></h4>
					<p class="category">&nbsp;</p>
			    </div>
				<div class="content">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<?php  echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form')); ?>\n"; ?>
							<div class="row">
							<?php		
								foreach ($fields as $field) {
									if(in_array($field , array('sucursal_id'))) continue;
									if (strpos($action, 'add') !== false && $field == $primaryKey) {
										continue;
									} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
										$label = ucfirst(Inflector::humanize(strtolower($field)));
										$rest = substr($label, -2);
										if($rest == 'Id') {
											$label = substr($label, 0, -3);
										}
										echo "\t\t\t\t\t\t<div class='col-md-6'>\n";
										echo "\t\t\t\t\t\t\t<div class='form-group'>\n";
										if($field != $primaryKey) echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->label('{$modelClass}.{$field}',__('$label'), array('class'=>'control-label'));?>\n";
										echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control','label'=>false,'div'=>false)); ?>\n";
										echo "\t\t\t\t\t\t\t</div>\n";
										echo "\t\t\t\t\t\t</div>\n";
									}
								}
								if (!empty($associations['hasAndBelongsToMany'])) {
									foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
										$label = ucfirst(Inflector::humanize(strtolower($assocName)));
										echo "\t\t\t\t\t\t<div class='col-md-6'>\n";
										echo "\t\t\t\t\t\t\t\t<div class='form-group'>\n";
										echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->label('',__('$label'), array('class'=>'control-label'));?>\n";
										echo "\t\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}',array('class' => 'form-control','label'=>false,'div'=>false));?>\n";
										echo "\t\t\t\t\t\t\t\t</div>\n";
										echo "\t\t\t\t\t\t</div>\n";
									}
								}
							?>
							</div>
							<?php
								echo "\t\t\t\t<div class='col-md-12'><button type='submit' class='btn btn-primary btn-fill pull-right'><?php echo __('Save'); ?></button></div>\n";
								echo "\t\t\t\t\t<div class='clearfix'></div>\n";
							?>
							<?php echo "<?php echo \$this->Form->end(); ?>\n";?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>



<?php if($action=='edit') { ?>
<div class="col-md-12">
	<div class="row">
	    <div class="col-md-12">
            <a class="btn btn-sm btn-fill btn-success"  href="<?php echo "<?php echo \$this->Html->url(array('action'=>'index'));?>" ?>">
                <i class="fa fa-list-alt"></i>
                <?php echo "<?php echo __('List'); ?>\n"; ?>
            </a>

            <a class="btn btn-sm btn-fill btn-info" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'view',\$this->request->data['{$modelClass}']['id']));?>" ?>">
                <i class="fa fa-eye"></i>
                <?php echo "<?php echo __('View'); ?>\n"; ?>
            </a>

            <a class="deleteModal btn btn-sm btn-fill btn-danger" href="<?php echo "<?php echo \$this->Html->url(array('action'=>'delete',\$this->request->data['{$modelClass}']['id']));?>" ?>">
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
			    <div class="card-header text-center" data-background-color="blue">
			        <h4 class="title"><?php printf("<?php echo __('%s').' '.__('%s'); ?>", 'Edit', $singularHumanName); ?></h4>
					<p class="category">&nbsp;</p>
			    </div>
				<div class="card-content">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<?php  echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form')); ?>\n"; ?>
							<div class="row">
							<?php
								foreach ($fields as $field) {
										if(in_array($field , array('sucursal_id'))) continue;
										$label = ucfirst(Inflector::humanize(strtolower($field)));
										$rest = substr($label, -2);
										if($rest == 'Id') {
											$label = substr($label, 0, -3);
										}
										$divHide = '';
										if($field == 'id') {
											$divHide = 'style="display:none;"';
										}
										if (strpos($action, 'add') !== false && $field == $primaryKey) {
											continue;
										} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
		echo "\t\t\t\t\t\t<div class='col-md-6' $divHide>\n";
		echo "\t\t\t\t\t\t\t<div class='form-group'>\n";
											if($field != $primaryKey) echo "\t\t\t\t\t\t\t<?php echo \$this->Form->label('{$modelClass}.{$field}',__('$label'), array('class'=>'control-label'));?>\n";
											echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('class' => 'form-control', 'label'=>false,'div'=>false)); ?>\n";
											echo "\t\t\t\t\t\t\t<span class='material-input'></span>\n";
											echo "\t\t\t\t\t\t\t</div>\n";
											echo "\t\t\t\t\t\t</div>\n";
										}
									}
									if (!empty($associations['hasAndBelongsToMany'])) {
										foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
											$label = ucfirst(Inflector::humanize(strtolower($assocName)));
		echo "\t\t\t\t\t\t<div class='col-md-6'>\n";
		echo "\t\t\t\t\t\t\t<div class='form-group'>\n";
											echo "\t\t\t\t\t\t\t<?php echo \$this->Form->label('',__('$label'), array('class'=>'control-label'));?>\n";
											echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}',array('class' => 'form-control', 'label'=>false,'div'=>false));?>\n";
											echo "\t\t\t\t\t\t\t<span class='material-input'></span>\n";
											echo "\t\t\t\t\t\t\t</div>\n";
											echo "\t\t\t\t\t\t</div>\n";
										}
									}
								?>
								</div>
								<?php
									echo "\t\t\t\t\t\t<div class='col-md-12'><button type='submit' class='btn btn-primary btn-fill pull-right'><?php echo __('Save'); ?></button></div>\n";
									echo "\t\t\t\t\t<div class='clearfix'></div>\n";
								?>
								<?php echo "<?php echo \$this->Form->end(); ?>\n";?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>