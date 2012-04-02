<div class="products view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Product', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Product'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Category'); ?></th>
		<td>
			<?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($product['Product']['description']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Features'); ?></th>
		<td>
			<?php echo h($product['Product']['features']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Price'); ?></th>
		<td>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Discount'); ?></th>
		<td>
			<?php echo h($product['Product']['discount']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Quantity'); ?></th>
		<td>
			<?php echo h($product['Product']['quantity']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Instock'); ?></th>
		<td>
			<?php echo h($product['Product']['instock']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Promotion Content'); ?></th>
		<td>
			<?php echo h($product['Product']['promotion_content']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Is Promoted'); ?></th>
		<td>
			<?php echo h($product['Product']['is_promoted']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Ordered'); ?></th>
		<td>
			<?php echo h($product['Product']['ordered']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
