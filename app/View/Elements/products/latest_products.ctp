<!-- Latest -->
<div class="row">
    <div class="span9">
        <div class="product-title">
            <h5><span><?php echo __('New Products');?></span></h5>
        </div>
        <ul class="thumbnails">
            <?php 
            foreach($latest_products as $product):
                $features_excerpt = trim(str_replace("\r\n","", h($product['Product']['features_excerpt'])));
                $price = h($this->Number->currency($product['Product']['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
            ?>
            <li class="span3">
                <div class="thumbnail">
                    <?php
                        if(!empty($product['Gallery'])):
                            foreach($product['Gallery'] as $gallery):                                
                    ?>
                    <a data-content="<?php echo $features_excerpt;?>" rel="popover" href="<?php echo $this->Html->url('/products/detail/'.$product['Product']['id']);?>" data-original-title="<?php echo $product['Product']['name'];?>">
                        <img alt="" style="width:260px" src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/thumb_'.$gallery['attachment']);?>">
                    </a>
                    <?php
                            endforeach;
                        endif;
                    ?>
                    <div class="caption">
                        <a href="<?php echo $this->Html->url('/products/detail/'.$product['Product']['id']);?>">
                            <h3><?php echo $product['Product']['name'];?></h3>
                        </a>
                        <p><?php echo $this->Text->excerpt($product['Product']['excerpt'], '');?></p>
                        <p><span class="label label-info"><?php echo $price;?></span><a class="btn pull-right" href="#"><i class='icon-shopping-cart'></i>&nbsp;<?php echo __('Buy');?></a></p>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!-- end latest product -->