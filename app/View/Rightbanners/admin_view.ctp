<div class="rightbanners view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Rightbanner', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Rightbanner'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['name']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Photo'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['photo']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Photo Dir'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['photo_dir']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Published'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['published']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Ordered'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['ordered']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($rightbanner['Rightbanner']['created']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
