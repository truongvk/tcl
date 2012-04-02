<?php if(!empty($promotion_products)): ?>
<!-- Features -->
<div class="row">
    <div class="span12">
        <div class="product-title">
            <h5><span><?php echo __('Promotion Products');?></span></h5>
        </div>
        <ul class="thumbnails">
            <?php 
            foreach($promotion_products as $product):
                $features_excerpt = trim(str_replace("\r\n","", h($product['Product']['features_excerpt'])));
            ?>
            <li class="span3">
                <div class="thumbnail">
                    <?php 
                        if(!empty($product['Gallery'])):
                            foreach($product['Gallery'] as $gallery):
                                if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$gallery['dir'].'/small_'.$gallery['attachment'])){
                    ?>
                    <a data-content="<?php echo $features_excerpt;?>" rel="popover" href="<?php echo $this->Html->url('/products/detail/'.$product['Product']['id']);?>" data-original-title="<?php echo h($this->Number->currency($product['Product']['price'], 'VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?>">
                        <img alt="" src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/small_'.$gallery['attachment']);?>">
                    </a>
                    <?php
                                }else{
                                    echo '<img alt="" src="http://placehold.it/260x180">';
                                }
                            endforeach;
                        else:
                            echo '<img alt="" src="http://placehold.it/260x180">';
                        endif;
                    ?>
                    <div class="caption">
                        <a href="<?php echo $this->Html->url('/products/detail/'.$product['Product']['id']);?>">
                            <h3><?php echo $product['Product']['name'];?></h3>
                        </a>
                        <p><?php echo $this->Text->excerpt($product['Product']['excerpt'], '');?></p>
                        <p><a>&nbsp;</a><a class="btn btn-info pull-right" href="#"><i class='icon-shopping-cart icon-white'></i>&nbsp;<?php echo __('Buy');?></a></p>
                    </div>
                </div>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>
<!-- end features -->
<?php endif;?>