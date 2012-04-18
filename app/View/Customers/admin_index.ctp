<div class="customers">
	<table cellpadding="0" cellspacing="0" id="table-customers" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th class="header" ><?php echo $this->Paginator->sort('CustomerType.name', __('Customer Type'));?></th>
			<th class="header" ><?php echo $this->Paginator->sort('User.email', __('Email'));?></th>
			<th class="header" ><?php echo $this->Paginator->sort('first_name');?></th>
			<th class="header" ><?php echo $this->Paginator->sort('last_name');?></th>			
			<th class="header" ><?php echo $this->Paginator->sort('phone');?></th>
			<th class="header" style="text-align: center; width: 200px"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($customers as $customer): ?>
	<tr id='<?php echo $customer['Customer']['id'];?>'>
		<td><?php echo h($customer['CustomerType']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($customer['User']['email'], array('controller' => 'users', 'action' => 'view', $customer['User']['id'])); ?>
		</td>
		<td><?php echo h($customer['Customer']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['last_name']); ?>&nbsp;</td>		
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>
		<td style="text-align: center">
			<span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['User']['id'])); ?></span>
			<span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('plugin'=>'acl_management', 'admin'=>true,'controller'=>'users','action' => 'editcustomer', $customer['User']['id'])); ?></span>
			<span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['User']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['first_name'])); ?></span>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="pagination">
		<p>
		<?php echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));?>		</p>
		<ul>
		<?php
		echo $this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'before'=>'', 'after'=>''));
		echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'next disabled'));
	?>
		</ul>
	</div>
</div>
