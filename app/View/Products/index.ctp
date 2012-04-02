<?php
    // create promotion block.
    $this->start('promotion_products');
    echo $this->element('products/promotion_products', array('promotion_products'=>$promotion_products));
    $this->end();

    // create the latest product block.
    $this->start('latest_products');
    echo $this->element('products/latest_products', array('latest_products'=>$latest_products));
    $this->end();

    // create the ads block.
    $this->start('block_ads_right');
    echo $this->element('front/block_ads_right');
    $this->end();

    //script popover
    echo $this->Html->scriptBlock("$(document).ready(function(){ $('a[rel=popover]').popover('hide'); });", array('block' => 'scriptBottom'))
?>
