<ul class="breadcrumb">
    <li href=""><a href="<?php echo $this->Html->url(array('action'=>'index'));?>">Root</a> <span class="divider">/</span></li>
    <li class="active"><?php echo $parentCategory;?></li>
</ul>
<div class="categories">
    <table cellpadding="0" cellspacing="0" id="table-categories" class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="40px" nowrap=""><?php echo __('Order'); ?></th>
                <th class="header" ><?php echo __('Category Name'); ?></th>
                <th class="header" style="text-align: center; width:150px"><?php echo __('Published'); ?></th>
                <th class="header" style="text-align: center; width:200px"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr id='<?php echo $category['Category']['id']; ?>'>
                    <td class="dragHandle"></td>
                    <td>
                        <?php
                        if(!empty($category['ChildCategory'])){
                            $data_content="<ul>";
                            foreach($category['ChildCategory'] as $child){
                                $data_content.="<li>".$child['name']."</li>";
                            }
                            $data_content.="<ul>";
                        ?>
                            <a data-content="<?php echo $data_content;?>" rel="popover" href="#" data-original-title="<?php echo __("Child list");?>"><?php echo h($category['Category']['name']); ?>&nbsp;</a>
                        <?php
                        }else{
                            echo h($category['Category']['name']);
                        }
                        ?>
                    </td>
                    <td style="text-align: center">
                        <span style="cursor: pointer">
                            <?php
                            echo $this->Html->image('icons/allow-' . intval($category['Category']['published']) . '.png', array('onclick' => 'published.toggle("status-' . $category['Category']['id'] . '",
				"' . $this->Html->url(array('action' => 'toggle', $category['Category']['id'], (int) $category['Category']['published'], "published")) . '");',
                                'id' => 'status-' . $category['Category']['id']
                            ));
                            ?>
                        </span>&nbsp;
                    </td>
                    <td style="text-align: center">
                        <span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), array('action' => 'view', $category['Category']['id'])); ?></span>
                        <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?></span>
                        <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php
    echo $this->Html->script(array(
        'jquery/json2',
        'jquery/tablednd/jquery.tablednd'
    ));
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            //popover
            $('a[rel=popover]').popover('hide');

            // Initialise the table dragable
            $("#table-categories tr").hover(function() {
                $(this.cells[0]).addClass('showDragHandle');
            }, function() {
                $(this.cells[0]).removeClass('showDragHandle');
            });
            $("#table-categories").tableDnD({
                dragHandle: "dragHandle",
                onDrop: function(table, row) {
                    var rows = table.tBodies[0].rows;
                    var newOrder = [];
                    for (var i=0; i<rows.length; i++) {
                        newOrder[i] = rows[i].id;
                    }
                    var params = { 'data[Category][ordered]': JSON.stringify(newOrder) };
                    $.post('<?php echo $this->Html->url('/admin/' . Inflector::tableize('Category') . '/ordered'); ?>', params,
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