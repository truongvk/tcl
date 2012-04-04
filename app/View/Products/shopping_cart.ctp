<?php
if($cart->itemcount > 0) {
?>
<table class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th>&nbsp;</th>
            <th style="text-align: center"><?php echo __('Product Name'); ?></th>
            <th style="text-align: center"><?php echo __('Quantity'); ?></th>
            <th style="text-align: center"><?php echo __('Price'); ?></th>
            <th style="text-align: center"><?php echo __('Sub-Total'); ?></th>
        </tr>
    </thead>
    <tbody>
<?php
    $total = h($this->Number->currency($cart->total, ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
    foreach($cart->get_contents() as $item) {
        $price = h($this->Number->currency($item['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
        $subtotal = h($this->Number->currency($item['subtotal'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
?>
    <tr>
        <td width="1%" nowrap><img src="http://placehold.it/80x80"/></td>
        <td style="vertical-align: middle"><?php echo $item['info'];?></td>
        <td style="vertical-align: middle; text-align: center"><?php echo $item['qty'];?></td>
        <td style="vertical-align: middle; text-align: right"><?php echo $price;?></td>
        <td style="vertical-align: middle; text-align: right"><?php echo $subtotal;?></td>
    </tr>
<?php
    }
?>
    <tr><td colspan="5" style="text-align: right"><h4><?php echo __('Total').': '.$total;?></h4></td></tr>
    </tbody>
</table>    
<?php    
} else {
	echo "<h3>".__('No items in cart')."</h3>";
}
?>