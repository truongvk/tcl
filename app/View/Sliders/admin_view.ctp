<div class="sliders view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Slider', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Slider'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($slider['Slider']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($slider['Slider']['title']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($slider['Slider']['description']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Photo'); ?></th>
		<td>
			<?php echo h($slider['Slider']['photo']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Photo Dir'); ?></th>
		<td>
			<?php echo h($slider['Slider']['photo_dir']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Published'); ?></th>
		<td>
			<?php echo h($slider['Slider']['published']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Ordered'); ?></th>
		<td>
			<?php echo h($slider['Slider']['ordered']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
