<?php echo $this->Html->script(array('application/cart/add2cart'));?>
<div id="myModal" class="modal hide fade" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo __('Your Shopping Cart');?></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <p>
            <a href="#" class="btn" data-dismiss="modal"><i class="icon-shopping-cart"></i> <?php echo __('Continue Shopping');?></a>
            <a href="<?php echo $this->Html->url('/cart/');?>" class="btn"><i class="icon-eye-open"></i> <?php echo __('View Cart');?> </a>
            <a href="<?php echo $this->Html->url('/cart/checkout');?>" class="btn btn-primary"><i class="icon-ok-sign icon-white"></i> <?php echo __('Checkout');?></a>
        </p>
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