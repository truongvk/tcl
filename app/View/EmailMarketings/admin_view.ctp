<div class="emailMarketings view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Email Marketing', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('View'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">	
	<tr>
		<th nowrap=""><?php echo __('Customer Type'); ?></th>
		<td>
			<?php 
                        $cusType = ($emailMarketing['EmailMarketing']['customer_type_id'] > 0) ? $emailMarketing['CustomerType']['name'] : __('All Customer');
                        $cusType = ($emailMarketing['EmailMarketing']['customer_type_id'] < 0) ? __('Subscribers') : $cusType;
                        echo h($cusType); 
                        ?>
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
            <th style="vertical-align: top"><?php echo __('Content'); ?></th>
		<td>
			<?php echo $emailMarketing['EmailMarketing']['content']; ?>
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
