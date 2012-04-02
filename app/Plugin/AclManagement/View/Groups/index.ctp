<div class="groups index">	
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-condensed table-striped">
	<tr>
                <th class="header"><?php echo $this->Paginator->sort('id');?></th>
                <th class="header"><?php echo $this->Paginator->sort('name');?></th>
                <th class="header"><?php echo $this->Paginator->sort('created');?></th>
                <th class="header"><?php echo $this->Paginator->sort('modified');?></th>
                <th class="header"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($groups as $group):
        ?>
	<tr>
		<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['created']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['modified']); ?>&nbsp;</td>
		<td class="">
                    <span class="label label-warning link-white"><i class="icon-edit icon-white"></i><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id'])); ?></span>
                    <span class="label label-important link-white"><i class="icon-trash icon-white"></i><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $group['Group']['id']), null, __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?></span>
		</td>
	</tr>
        <?php endforeach; ?>
	</table>
	<?php echo $this->element('pagination');?>
</div>
<script type="text/javascript">
    $(function(){
        $('.asc').closest('th').addClass('headerSortDown');
        $('.desc').closest('th').addClass('headerSortUp');
    });
</script>