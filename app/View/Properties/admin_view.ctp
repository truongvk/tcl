<div class="properties view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Property', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Property'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($property['Property']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Parent Property'); ?></th>
		<td>
			<?php echo $this->Html->link($property['ParentProperty']['name'], array('controller' => 'properties', 'action' => 'view', $property['ParentProperty']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Lft'); ?></th>
		<td>
			<?php echo h($property['Property']['lft']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Rght'); ?></th>
		<td>
			<?php echo h($property['Property']['rght']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($property['Property']['name']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($property['Category']['name'], array('controller' => 'categories', 'action' => 'view', $property['Category']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
