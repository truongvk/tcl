<div class="posts view">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Post', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Admin View Post'); ?></li>
</ul>
	<table class="table table-condensed table-bordered">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Body'); ?></th>
		<td>
			<?php echo h($post['Post']['body']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</td>
	</tr>
	<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</td>
	</tr>
	</table>
</div>
