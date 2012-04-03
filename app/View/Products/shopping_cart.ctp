<?php
if($cart->itemcount > 0) {
    foreach($cart->get_contents() as $item) {
        $price = h($this->Number->currency($item['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
        $subtotal = h($this->Number->currency($item['subtotal'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
?>
<div class="row">
    <div class="span2"><img src="http://placehold.it/200x120"/></div>
    <div class="span7">
        <div class="row">
            <div class="span7"><?php echo $item['info'];?></div>
        </div>
         <div class="row">
            <div class="span7"><?php echo $item['qty'];?> x <?php echo$price;?> = <?php echo $item['price'];?></div>
        </div>
    </div>
</div>
<hr/>
<?php
    }
} else {
	echo "<h3>".__('No items in cart')."</h3>";
}
?>