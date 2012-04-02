<div class="groups view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Group', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Group'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($group['Group']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($group['Group']['name']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($group['Group']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($group['Group']['modified']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
