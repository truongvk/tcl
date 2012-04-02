<div class="products">
	<table cellpadding="0" cellspacing="0" id="table-products" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
                <th width="40px" nowrap=""><?php echo $this->Paginator->sort('ordered', __('Order'));?></th>
                <th class="header" ><?php echo $this->Paginator->sort('name');?></th>
                <th class="header" style="text-align: center; width: 100px"><?php echo $this->Paginator->sort('instock', __('In Stock?'));?></th>
                <th class="header" style="text-align: center; width: 100px"><?php echo $this->Paginator->sort('is_promoted', __("Promotion"));?></th>
                <th class="header" style="text-align: center; width: 100px"><?php echo $this->Paginator->sort('published', __("Published"));?></th>
                <th class="header" style="text-align: center; width: 150px"><?php echo $this->Paginator->sort('created');?></th>
                <th class="header" style="text-align: center; width: 200px"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($products as $product): ?>
	<tr id='<?php echo $product['Product']['id'];?>'>
		<td class="dragHandle"></td>
		<td>
                    <a data-content="<?php echo h($product['Product']['features_excerpt']);?>" rel="popover" href="/" data-original-title="<?php echo h($this->Number->currency($product['Product']['price'], 'VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?>">
                        <?php echo h($product['Product']['name']); ?>&nbsp;
                    </a>
                </td>
		<td style="text-align: center">
                    <span style="cursor: pointer">
                        <?php
                        echo $this->Html->image('icons/allow-' . intval($product['Product']['instock']) . '.png', array('onclick' => 'published.toggle("instock-' . $product['Product']['id'] . '",
                            "' . $this->Html->url(array('action' => 'toggle', $product['Product']['id'], (int) $product['Product']['instock'], "instock")) . '");',
                            'id' => 'instock-' . $product['Product']['id']
                        ));
                        ?>
                    </span>&nbsp;
                </td>
		<td style="text-align: center">
                    <span style="cursor: pointer">
                        <?php
                        echo $this->Html->image('icons/allow-' . intval($product['Product']['is_promoted']) . '.png', array('onclick' => 'published.toggle("is_promoted-' . $product['Product']['id'] . '",
                            "' . $this->Html->url(array('action' => 'toggle', $product['Product']['id'], (int) $product['Product']['is_promoted'], "is_promoted")) . '");',
                            'id' => 'is_promoted-' . $product['Product']['id']
                        ));
                        ?>
                    </span>&nbsp;
                </td>
                <td style="text-align: center">
                    <span style="cursor: pointer">
                        <?php
                        echo $this->Html->image('icons/allow-' . intval($product['Product']['published']) . '.png', array('onclick' => 'published.toggle("status-' . $product['Product']['id'] . '",
                            "' . $this->Html->url(array('action' => 'toggle', $product['Product']['id'], (int) $product['Product']['published'], "published")) . '");',
                            'id' => 'status-' . $product['Product']['id']
                        ));
                        ?>
                    </span>&nbsp;
                </td>
		<td style="text-align: center"><?php echo h($product['Product']['created']); ?>&nbsp;</td>
		<td style="text-align: center">
                    <span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?></span>
                    <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?></span>
                    <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?></span>
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
    $("#table-products tr").hover(function() {
        $(this.cells[0]).addClass('showDragHandle');
    }, function() {
        $(this.cells[0]).removeClass('showDragHandle');
    });
    $("#table-products").tableDnD({
        dragHandle: "dragHandle",
        onDrop: function(table, row) {
            var rows = table.tBodies[0].rows;
            var newOrder = [];
            for (var i=0; i<rows.length; i++) {
                newOrder[i] = rows[i].id;
            }
            var params = { 'data[Product][ordered]': JSON.stringify(newOrder) };
            $.post('<?php echo $this->Html->url('/admin/'.Inflector::tableize('Product').'/ordered');?>', params,
                function(response){}
            );
        }
    });

    $('a[rel=popover]').popover('hide');
});

var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };
$(document).ready(function(){
    $('.asc').closest('th').addClass('headerSortDown');
    $('.desc').closest('th').addClass('headerSortUp');
});
</script>
</div>
