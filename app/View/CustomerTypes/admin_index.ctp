<div class="customerTypes">
	<table cellpadding="0" cellspacing="0" id="table-customerTypes" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
	<th width="40px" nowrap=""><?php echo __('Order'); ?></th>
			<th class="header" ><?php echo $this->Paginator->sort('name');?></th>
			<th class="header" ><?php echo $this->Paginator->sort('created');?></th>
			<th class="header" style="text-align: center"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($customerTypes as $customerType): ?>
	<tr id='<?php echo $customerType['CustomerType']['id'];?>'>
		<td class="dragHandle"></td>
		<td><?php echo h($customerType['CustomerType']['name']); ?>&nbsp;</td>
		<td><?php echo h($customerType['CustomerType']['created']); ?>&nbsp;</td>
		<td style="text-align: center">
			<span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $customerType['CustomerType']['id'])); ?></span>
			<span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customerType['CustomerType']['id']), null, __('Are you sure you want to delete # %s?', $customerType['CustomerType']['id'])); ?></span>
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
<?php echo $this->Html->script(array(
		'jquery/json2',
		'jquery/tablednd/jquery.tablednd'
));?>
<script type="text/javascript">
	$(document).ready(function(){
            // Initialise the table dragable
            $("#table-customerTypes tr").hover(function() {
                $(this.cells[0]).addClass('showDragHandle');
            }, function() {
                $(this.cells[0]).removeClass('showDragHandle');
            });
            $("#table-customerTypes").tableDnD({
                dragHandle: "dragHandle",
                onDrop: function(table, row) {
                    var rows = table.tBodies[0].rows;
                    var newOrder = [];
                    for (var i=0; i<rows.length; i++) {
                        newOrder[i] = rows[i].id;
                    }
                    var params = { 'data[CustomerType][ordered]': JSON.stringify(newOrder) };
                    $.post('<?php echo $this->Html->url('/admin/'.Inflector::tableize('CustomerType').'/ordered');?>', params,
                        function(response){}
                    );
                }
            });
	});
</script>
</div>
