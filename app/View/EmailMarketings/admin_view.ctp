<div class="emailMarketings view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('EmailMarketing', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Email Marketing'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($emailMarketing['EmailMarketing']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Customer Type Id'); ?></th>
		<td>
			<?php echo h($emailMarketing['EmailMarketing']['customer_type_id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($emailMarketing['EmailMarketing']['title']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Content'); ?></th>
		<td>
			<?php echo h($emailMarketing['EmailMarketing']['content']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($emailMarketing['EmailMarketing']['created']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
