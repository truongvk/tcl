<?php echo $this->Html->css(array('/acl_management/css/treeview'));?>
<?php echo $this->Html->script(array(
    '/acl_management/js/jquery.cookie',
    '/acl_management/js/treeview',
    '/acl_management/js/acos',    
));
?>
<div class="span4">
    <div class="">
        <button class="btn btn-danger" id="bt-generate" data-loading-text="loading..." >Generate</button>
    </div>
    <div id="acos">
        <?php echo $this->Tree->generate($results, array('alias' => 'alias', 'plugin' => 'acl_management', 'model' => 'Aco', 'id' => 'acos-ul', 'element' => '/permission-node')); ?>
    </div>
</div>
<div class="span5">
    <div id="aco-edit"></div>
</div>
<script type="text/javascript">
$(document).ready(function() { 
    $("#acos").treeview({collapsed: true});
});
$(function() {
    var btn = $('#bt-generate').click(function () {
        btn.button('loading');
        $.get('<?php echo $this->Html->url('/acl_management/user_permissions/sync');?>', {},
            function(data){
                btn.button('reset');
                $("#acos").html(data);
            }
        );        
    })
});
</script>
