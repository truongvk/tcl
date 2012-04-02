<?php echo $this->Html->script(array('dragdrop/js/ajax', 'dragdrop/js/context-menu', 'dragdrop/js/drag-drop-folder-tree'));?>
<?php echo $this->Html->css(array('/js/dragdrop/css/drag-drop-folder-tree', '/js/dragdrop/css/context-menu'));?>
    <a class="btn btn-primary" id="bt-generate" data-loading-text="Saving...">Save Changes</a>
    <div class="clearfix"><br/></div>
    <div class="well">
    <ul id="tree" class="dhtmlgoodies_tree">

    <?php
        echo $this->TreeView->createListTree($categories);
    ?>
    </ul>
    </div>
<script language="javascript">
    window.onload=function() {
        treeObj = new JSDragDropTree();
        treeObj.setTreeId('tree');
        treeObj.setMaximumDepth(15);
        treeObj.setMessageMaximumDepthReached('Maximum depth reached');
        treeObj.setImageFolder('<?php echo $this->Html->url('/js/dragdrop/images/');?>');
        treeObj.initTree();
        treeObj.expandAll();
    };

    $(function() {
        var btn = $('#bt-generate').click(function () {
            btn.button('loading');
            save_string = treeObj.getNodeOrders();
            $.post('<?php echo $this->Html->url('/admin/categories/ordered');?>', {'data[Order][save_string]':save_string},
                function(response){
                    btn.button('reset');                    
                }
            );
        })
    });
</script>