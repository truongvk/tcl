<?php //echo $this->Html->script(array('smoke/smoke.min'), array('block' => 'scriptBottom'));?>
<?php //echo $this->Html->css(array('../js/smoke/smoke', '../js/smoke/themes/default'), null, array('block' => 'scriptTop'));?>
<style type="text/css">
    div.widget-shop {
        background: none repeat scroll 0 0 #EEEEEE;
        float: left;
        margin-bottom: 20px;
        width:220px;
    }
    div.widget-shop .widget-title {
        background: none repeat scroll 0 0 #484848;
        color: #A6A6A6;
        padding: 10px 20px;
    }
</style>
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
                                <img src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/small_'.$gallery['attachment']);?>">
        <?php
                                endif;
                            endforeach;
                        else:
                            echo '<img alt="" src="http://placehold.it/450x340">';
                        endif;
        ?>
                         </a>
                        <div class="caption">
                            <h3><?php echo h($product['Product']['name']); ?></h3>
                            <p><?php echo h($this->Text->excerpt($product['Product']['excerpt'], null)); ?></p>
                            <p><span class="label label-info"><?php echo $price;?></span><a class="btn pull-right add2cart" data-cart="<?php echo $dataCart;?>" href="#"><i class='icon-shopping-cart'></i>&nbsp;<?php echo __('Buy');?></a></p>
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
    <div class="span3" style="margin-left: 20px;">
        <div class="widget-shop">
            <div class="widget-title"><?php echo __('Features Search');?>&nbsp;&nbsp;<span class="label label-warning"><a href="<?php echo $this->Html->url(array($category_id));?>" style="color:#FFFFFF"><i class="icon-retweet icon-white"></i> <?php echo __('Reset');?></a></span></div>
            <ul class="nav nav-list">
                <?php
                $limit = Configure::read('Settings.more_less_view_limit.value');
                foreach($attributes as $attribute):
                    $header = $attribute['Property']['name'];
                ?>
                <li class="nav-header"><?php echo $header;?></li>
                <?php
                    $i = 0;
                    $hasFilter=null;
                    foreach($attribute['children'] as $child):
                        $selectProperty = (isset($this->request->params["named"][$attribute["Property"]["slug"]]) && $child["Property"]["slug"] == $this->request->params["named"][$attribute["Property"]["slug"]]) ? 'active' : '';
                        $url = array('controller'=>'products', 'action'=>'view');
                        $url_pass = $this->NamedParams->set($attribute["Property"]["slug"], $child["Property"]["slug"]);
                        if(!empty($url_pass)){
                            $url = array_merge($url, $url_pass);
                        }
                        $propertyURL = $this->Html->link($child["Property"]["name"], $url, array('escape'=>false, 'encode'=>false));

                        $class = "always_show";
                        if ($i >= $limit) {
                            $class = 'hidden';
                        }
                        if($selectProperty){
                            $hasFilter[] = $selectProperty;
                        }
                ?>
                        <li class="<?php echo $class.' '.$selectProperty;?> <?php echo 'group-'.$attribute['Property']['id'];?>"><?php echo $propertyURL;?></li>
                <?php
                        $i++;
                    endforeach;
                    if($i > $limit){
                ?>
                        <span class="label" style="cursor: pointer;text-transform: none" id="bt-expand-<?php echo $attribute['Property']['id'];?>" onclick="property.choose_more(this, '.group-<?php echo $attribute['Property']['id'];?>');"><?php echo __('expand');?></span>
                <?php
                    }
                    if(!empty($hasFilter)){
                ?>
                    <script>$(document).ready(function(){property.choose_more($("#bt-expand-<?php echo $attribute['Property']['id'];?>"), '.group-<?php echo $attribute['Property']['id'];?>')});</script>
                <?php
                    }
                endforeach;
                ?>
            </ul>
        </div>
    </div>
    <?php echo $this->element('sidebar/online_support');?>
</div>
<a class="btn" id="launchModel" data-toggle="modal" href="#myModal" style="display:none">Launch Modal</a>
<div id="myModal" class="modal hide fade" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo __('Your Shopping Cart');?></h3>
    </div>
    <div class="modal-body"></div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal"><?php echo __('Continue Shopping');?></a>
        <a href="#" class="btn btn-primary"><?php echo __('Checkout');?></a>
    </div>
</div>
<script type="text/javascript">
var expand = '<?php echo __('expand');?>';
var collapse = '<?php echo __('collapse');?>';
var property = {
    choose_more : function(obj, group) {
        $obj   = $(obj);
        $group = $obj.closest('ul').find(group);

        $.each($group, function(i, val) {
             $liObj = $(this);
             if($liObj.hasClass("hidden")){
                 $liObj.removeClass('hidden').addClass('tmpShow');
             }else{
                 if(!$liObj.hasClass("always_show")){
                    $liObj.removeClass('tmpShow').addClass('hidden');
                 }
             }
        });


        if($obj.html() == expand){
            $obj.html(collapse);
        }else{
            $obj.html(expand);
        }
    }
}
$(function(){
    $('.add2cart').bind('click', {}, function(){
        $params = $(this).attr('data-cart');
        $params = jQuery.parseJSON($params);
        
        $.post('<?php echo $this->Html->url('/products/add2cart/');?>', {'data[Product][id]':$params.id,'data[Product][qty]':$params.qty},
            function(response){
                $.get('<?php echo $this->Html->url('/products/shopping_cart/');?>', {}, function(response){
                   $('#myModal').find('.modal-body').html(response);
                   $('#launchModel').trigger('click');
                });
            }
        );
    });

    $('#myModal').on('shown', function () {
        setTimeout("$('#myModal').modal('hide');", 6000);
    })    
});
</script>
<?php
//script popover
echo $this->Html->scriptBlock("$(document).ready(function(){ $('a[rel=popover]').popover('hide'); });", array('block' => 'scriptBottom'));
?>