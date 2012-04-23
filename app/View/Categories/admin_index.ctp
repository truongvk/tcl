<?php echo $this->Html->css(array('../js/treetable/jquery.treeTable.css'));?>
<?php echo $this->Html->script(array('treetable/jquery.treeTable.js'));?>
<script type="text/javascript">
$(document).ready(function()  {
  $("#table-categories").treeTable({expandable: false});
});
</script>

<div class="categories">
    <table cellpadding="0" cellspacing="0" id="table-categories" class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th class="header" ><?php echo __('Category Name'); ?></th>
                <th class="header" style="text-align: center; width:150px"><?php echo __('Published'); ?></th>
                <th class="header" style="text-align: center; width:200px"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($categories as $category):
                    $rowId = "node-".$category['Category']['id'];
                    $childClass = (intval($category['Category']['parent_id']) > 0) ? "child-of-node-".$category['Category']['parent_id'] : "";
                ?>
                <tr id="<?php echo $rowId;?>" class="<?php echo $childClass;?>">
                    <td>
                        <?php
                            echo $category['Category']['name'];//$this->Html->link($category['Category']['name'], array('action'=>'edit', $category['Category']['id']));
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
                        <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?></span>
                        <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['name'])); ?></span>
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
        var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };
        $(document).ready(function(){
            $('.asc').closest('th').addClass('headerSortDown');
            $('.desc').closest('th').addClass('headerSortUp');
        });
    </script>
</div>