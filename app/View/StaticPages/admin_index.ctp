<div class="staticPages">
    <table cellpadding="0" cellspacing="0" id="table-staticPages" class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="40px" nowrap=""><?php echo __('Order'); ?></th>
                <th class="header" ><?php echo $this->Paginator->sort('title'); ?></th>
                <th class="header" style="text-align: center; width: 150px"><?php echo $this->Paginator->sort('published'); ?></th>
                <th class="header" style="text-align: center; width: 200px"><?php echo $this->Paginator->sort('created'); ?></th>
                <th class="header" style="text-align: center; width: 200px"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($staticPages as $staticPage): ?>
                <tr id='<?php echo $staticPage['StaticPage']['id']; ?>'>
                    <td class="dragHandle"></td>
                    <td><?php echo h($staticPage['StaticPage']['title']); ?>&nbsp;</td>
                    <td style="text-align: center">
                        <span style="cursor: pointer">
                            <?php
                            echo $this->Html->image('icons/allow-' . intval($staticPage['StaticPage']['published']) . '.png', array('onclick' => 'published.toggle("status-' . $staticPage['StaticPage']['id'] . '",
				"' . $this->Html->url(array('action' => 'toggle', $staticPage['StaticPage']['id'], (int) $staticPage['StaticPage']['published'], "published")) . '");',
                                'id' => 'status-' . $staticPage['StaticPage']['id']
                            ));
                            ?>
                        </span>&nbsp;
                    </td>
                    <td style="text-align: center"><?php echo h($staticPage['StaticPage']['created']); ?>&nbsp;</td>
                    <td style="text-align: center">
                        <span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), '/p/'.$staticPage['StaticPage']['slug']); ?></span>
                        <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $staticPage['StaticPage']['id'])); ?></span>
                        <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $staticPage['StaticPage']['id']), null, __('Are you sure you want to delete # %s?', $staticPage['StaticPage']['id'])); ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <p>
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>		</p>
        <ul>
            <?php
            echo $this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'before' => '', 'after' => ''));
            echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li', 'escape' => false), null, array('tag' => 'li', 'escape' => false, 'class' => 'next disabled'));
            ?>
        </ul>
    </div>
    <?php
    echo $this->Html->script(array(
        'jquery/json2',
        'jquery/tablednd/jquery.tablednd'
    ));
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            // Initialise the table dragable
            $("#table-staticPages tr").hover(function() {
                $(this.cells[0]).addClass('showDragHandle');
            }, function() {
                $(this.cells[0]).removeClass('showDragHandle');
            });
            $("#table-staticPages").tableDnD({
                dragHandle: "dragHandle",
                onDrop: function(table, row) {
                    var rows = table.tBodies[0].rows;
                    var newOrder = [];
                    for (var i=0; i<rows.length; i++) {
                        newOrder[i] = rows[i].id;
                    }
                    var params = { 'data[StaticPage][ordered]': JSON.stringify(newOrder) };
                    $.post('<?php echo $this->Html->url('/admin/' . Inflector::tableize('StaticPage') . '/ordered'); ?>', params,
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
