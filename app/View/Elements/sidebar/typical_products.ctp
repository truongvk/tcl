<?php
$products = $this->requestAction('/products/getRandomProducts');
if(!empty($products)):
?>
<div class="widget-shop">
    <div class="widget-title"><?php echo __('Typical Products');?></div>
    <ul class="nav typical_products">
        <?php foreach ($products as $product) :?>
        <li>
            <div class="row">
                <div class="span1">
                    <a href="<?php echo $this->Html->url('/sp/'.$product['Product']['slug'].'.html');?>">
                    <?php
                    if(!empty($product['Gallery'])):
                        foreach($product['Gallery'] as $gallery):
                            if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$gallery['dir'].'/'.$gallery['attachment'])):
                    ?>
                                    <img src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/thumb_'.$gallery['attachment']);?>">
                    <?php
                                endif;
                            endforeach;
                        else:
                            echo '<img alt="" src="http://placehold.it/120x80">';
                        endif;
                    ?>
                    </a>
                </div>
                <div class="span1 intro">                    
                    <p><a href="<?php echo $this->Html->url('/sp/'.$product['Product']['slug'].'.html');?>"><?php echo h($product['Product']['name']);?></a></p>
                </div>
            </div>
        </li>
        <?php endforeach;?>
    </ul>
</div>
<?php    
endif;
?>