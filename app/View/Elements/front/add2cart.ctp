<?php echo $this->Html->script(array('application/cart/add2cart'));?>
<div id="myModal" class="modal hide fade" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo __('Your Shopping Cart');?></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal"><?php echo __('Continue Shopping');?></a>
        <a href="#" class="btn btn-primary"><?php echo __('Checkout');?></a>
    </div>
</div>
<?php
$qtyContainer = (isset($qtyContainer)) ? $qtyContainer : null;
?>
<script type="text/javascript">
$(function(){
    $(document).add2cart ({
        'elementClass': 'add2cart',
        post_to_url: '<?php echo $this->Html->url('/cart/add2cart/');?>',
        get_from_url: '<?php echo $this->Html->url('/cart/view/');?>',
        modalID: 'myModal',
        qtyContainer: '<?php echo $qtyContainer;?>'
    });
    
    $('#myModal').on('shown', function () {
        setTimeout("$('#myModal').modal('hide');", 5000);
    });
});
</script>