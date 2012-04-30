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
                $dataCart = array('id'=>$product['Product']['id'],'qty'=>1);
                $dataCart = h(json_encode($dataCart));                
            ?>
            <li class="span3">
                <div class="thumbnail">
                    <?php
                        if(!empty($product['Gallery'])):
                            foreach($product['Gallery'] as $gallery):                                
                    ?>
                    <a data-placement="bottom"  data-content="<?php echo $features_excerpt;?>" rel="popover" href="<?php echo $this->Html->url('/sp/'.$product['Product']['slug'].'.html');?>" data-original-title="<?php echo $product['Product']['name'];?>">
                        <img alt="" style="width:260px" src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/thumb_'.$gallery['attachment']);?>">
                    </a>
                    <?php
                            endforeach;
                        endif;
                    ?>
                    <div class="caption">
                        <a href="<?php echo $this->Html->url('/sp/'.$product['Product']['slug'].'.html');?>">
                            <h3><?php echo $product['Product']['name'];?></h3>
                        </a>
                        <p><?php echo $this->Text->excerpt($product['Product']['excerpt'], '');?></p>
                        <p><span class="label label-info"><?php echo $price;?></span><a class="btn pull-right add2cart" data-cart="<?php echo $dataCart;?>" href="javascript:;;"><i class='icon-shopping-cart'></i>&nbsp;<?php echo __('Buy');?></a></p>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!-- end latest product -->