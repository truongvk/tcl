<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

 $action =  str_replace('admin_', '', $action);
?>
<div class="<?php echo $pluralVar;?> form">
<ul class="breadcrumb">
    <li>
		<?php echo "<?php echo \$this->Html->link('{$modelClass}', array('action'=>'index'));?>\n";?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></li>
</ul>
<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('class'=>'form-horizontal'));?>\n";?>
	<fieldset>
		<legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize($action), $singularHumanName); ?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				//echo "\t\techo \$this->Form->input('{$field}');\n";
				if($field == $primaryKey){
					echo "\t\techo \$this->Form->input('{$field}');\n";
					continue;
				}
				if($field == "ordered"){					
					continue;
				}
				if ($field == 'status' || $field == 'published') {
					echo "\t\techo \$this->Form->input('{$field}', array('div'=>'control-group', 'type'=>'checkbox','placeholder'=>'',
					'before'=>'<label>'.__('".Inflector::humanize($field)."').'</label><div class=\"controls\">',
					'after'=>\$this->Form->error('{$field}', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>''));\n";
				}elseif ($field == 'body' || $field == 'description') {
					echo "\t\techo \$this->Form->input('{$field}', array('div'=>'control-group', 'type'=>'textarea','placeholder'=>'',
					'before'=>'<label class=\"control-label\">'.__('".Inflector::humanize($field)."').'</label><div class=\"controls\">',
					'after'=>\$this->Form->error('{$field}', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xxlarge'));\n";
				}else{
					echo "\t\techo \$this->Form->input('{$field}', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('".Inflector::humanize($field)."').'</label><div class=\"controls\">',
					'after'=>\$this->Form->error('{$field}', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));\n";
				}
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
        <div class="form-actions">
            <?php echo "<?php echo \$this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>";?>
            <?php echo "<?php echo \$this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>";?>
        </div>
	</fieldset>
<?php
	echo "<?php echo \$this->Form->end();?>\n";
?>
</div>
<?php /*
<div class="actions">
	<h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>
	<ul>

<?php if (strpos($action, 'add') === false): ?>
		<li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
<?php endif;?>
		<li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index'));?>";?></li>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
	</ul>
</div>
*/?>
