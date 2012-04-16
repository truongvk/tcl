<?php
$products = $this->requestAction('/products/getRandomProducts');
if(!empty($products)):
?>
<div class="widget-shop">
    <div class="widget-title"><?php echo __('Typical Products');?></div>
    <ul class="nav nav-list">
        <?php foreach($products as $product): ?>
        <li><a href="ymsgr:sendim?khanhtruong111@yahoo.com" border="0"><?php echo h($product['Product']['name']);?></a> </li>
        <?php endforeach; ?>
        
    </ul>
</div>
<?php    
endif;
?>