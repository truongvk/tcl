<?php //echo $this->Html->script(array('smoke/smoke.min'), array('block' => 'scriptBottom'));?>
<?php //echo $this->Html->css(array('../js/smoke/smoke', '../js/smoke/themes/default'), null, array('block' => 'scriptTop'));?>
<ul class="breadcrumb">
    <li><a href="<?php echo $this->Html->url('/');?>"><i class="icon-home"></i></a> <span class="divider">/</span></li>
    <li class="active"><?php echo $category_name;?></li>
</ul>
<div class="row">
    <div class="span9" style="">
        <?php
        if(!empty($products)):
        $cateId = 0;
        $i=0;
        $itemCount = count($products);
        foreach ($products as $product):
            $features_excerpt = trim(str_replace("\r\n","", h($product['Product']['features_excerpt'])));
            $price = h($this->Number->currency($product['Product']['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
            $dataCart = array('id'=>$product['Product']['id'],'qty'=>1);
            $dataCart = h(json_encode($dataCart));
            if(($product['Category']['id'] != $cateId) && $i > 0):
                echo '</ul></div></div>';
            endif;
            if($product['Category']['id'] != $cateId):
        ?>
        <div class="row">
            <div class="span9" style="">
                <div class="product-title">
                    <h5><span><?php echo $product['Category']['name']; ?></span></h5>
                </div>
         <?php
                echo '<ul class="thumbnails">';
            endif;
         ?>
                <li class="span3">
                    <div class="thumbnail">
                         <a data-placement="bottom" data-content="<?php echo $features_excerpt;?>" rel="popover" href="<?php echo $this->Html->url('/products/detail/'.$product['Product']['id']);?>" data-original-title="<?php echo $product['Product']['name'];?>">
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
                            echo '<img alt="" src="http://placehold.it/260x180">';
                        endif;
        ?>
                         </a>
                        <div class="caption">
                            <h3><?php echo h($product['Product']['name']); ?></h3>
                            <p><?php echo h($this->Text->excerpt($product['Product']['excerpt'], null)); ?></p>
                            <p><span class="label label-info"><?php echo $price;?></span><a class="btn pull-right add2cart" data-cart="<?php echo $dataCart;?>" href="javascript:;;"><i class='icon-shopping-cart'></i>&nbsp;<?php echo __('Buy');?></a></p>
                        </div>
                    </div>
                </li>
        <?php
                if((($i+1) == $itemCount)):
                    echo '</ul></div></div>';
                endif;

                $cateId = $product['Category']['id'];
                $i++;
        endforeach;
        else:
            echo '<div class="alert alert-error">'.__('No results found.').'</div>';
        endif;
        ?>
        </div>
        <div class="span3">        
            <div class="row">        
                <div class="span3">        
                <?php
                    echo $this->element('sidebar/features_filter', array('attributes'=>$attributes));
                ?>
                </div>
            </div>
            <div class="row">        
                <div class="span3">        
                <?php
                    echo $this->element('sidebar/online_support');
                ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
echo $this->element('front/add2cart');
//script popover
echo $this->Html->scriptBlock("$(document).ready(function(){ $('a[rel=popover]').popover('hide'); });", array('block' => 'scriptBottom'));
?>