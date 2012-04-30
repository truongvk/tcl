<div class="rightbanners">
	<table cellpadding="0" cellspacing="0" id="table-rightbanners" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
            <th width="60px" nowrap=""><?php echo __('Order'); ?></th>
            <th class="header" ><?php echo $this->Paginator->sort('name');?></th>
            <th width="150px" class="header" ><?php echo $this->Paginator->sort('created');?></th>
            <th width="200px" class="header" style="text-align: center"><?php echo $this->Paginator->sort('published');?></th>
            <th width="200px"class="header" style="text-align: center"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($rightbanners as $rightbanner): ?>
	<tr id='<?php echo $rightbanner['Rightbanner']['id'];?>'>
		<td class="dragHandle"></td>
		<td><?php echo h($rightbanner['Rightbanner']['name']); ?>&nbsp;</td>
                <td style="text-align: center"><?php echo h(date('d/m/Y H:i', strtotime($rightbanner['Rightbanner']['created']))); ?>&nbsp;</td>
		<td style="text-align: center">
                    <span style="cursor: pointer">
                    <?php echo $this->Html->image('icons/allow-' . intval($rightbanner['Rightbanner']['published']) . '.png',
                            array('onclick' => 'published.toggle("status-'.$rightbanner['Rightbanner']['id'].'",
                                    "'.$this->Html->url(array('action'=>'toggle', $rightbanner['Rightbanner']['id'], (int)$rightbanner['Rightbanner']['published'], "published")).'");',
                                    'id' => 'status-'.$rightbanner['Rightbanner']['id']
                    )); ?>
                    </span>&nbsp;
		</td>		
		<td style="text-align: center">
			<span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rightbanner['Rightbanner']['id'])); ?></span>
			<span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rightbanner['Rightbanner']['id']), null, __('Are you sure you want to delete # %s?', $rightbanner['Rightbanner']['id'])); ?></span>
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
            $("#table-rightbanners tr").hover(function() {
                $(this.cells[0]).addClass('showDragHandle');
            }, function() {
                $(this.cells[0]).removeClass('showDragHandle');
            });
            $("#table-rightbanners").tableDnD({
                dragHandle: "dragHandle",
                onDrop: function(table, row) {
                    var rows = table.tBodies[0].rows;
                    var newOrder = [];
                    for (var i=0; i<rows.length; i++) {
                        newOrder[i] = rows[i].id;
                    }
                    var params = { 'data[Rightbanner][ordered]': JSON.stringify(newOrder) };
                    $.post('<?php echo $this->Html->url('/admin/'.Inflector::tableize('Rightbanner').'/ordered');?>', params,
                        function(response){}
                    );
                }
            });
	});
</script>
<script type="text/javascript">
	var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };
	$(document).ready(function(){
		$('.asc').closest('th').addClass('headerSortDown');
		$('.desc').closest('th').addClass('headerSortUp');
	});
</script>
</div>
