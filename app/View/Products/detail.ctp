<?php echo $this->Html->script(array('jquery/jquery.easing.1.3', 'jquery/jquery.hoverIntent.minified', 'diapo/diapo.min', 'fancybox/jquery.fancybox', 'fancybox/helpers/jquery.fancybox-buttons.js?v=2.0.4'), array('block' => 'scriptBottom'));?>
<?php echo $this->Html->css(array('../js/fancybox/jquery.fancybox', '../js/fancybox/helpers/jquery.fancybox-buttons.css?v=2.0.4', '../js/diapo/diapo','slidebox/style'), null, array());?>
<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<?php echo $this->element('front/breadscrumbs', array('breadscrumbs'=>$breadscrumbs, 'product_name'=>h($product['Product']['name'])));?>

<div class="row">
    <div class="span6">
            <div class="pix_diapo">
            <?php
                if(!empty($product['Gallery'])):
                    $limit = 5;
                    $i=1;
                    foreach($product['Gallery'] as $gallery):
                        if($i==$limit){
                            break;
                        }
                        if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$gallery['dir'].'/'.$gallery['attachment'])){
            ?>
                            <div data-thumb="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/thumb_'.$gallery['attachment']);?>">
                                 <a href="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/'.$gallery['attachment']);?>" class="fancybox"><img src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/small_'.$gallery['attachment']);?>"></a>
                            </div>
            <?php
                        }
                        $i++;
                    endforeach;
                else:
            ?>
                <div data-thumb="http://placehold.it/80x80.gif">
                    <a href="http://placehold.it/800x600.gif" class="fancybox"><img src="http://placehold.it/450x340.gif"></a>
                </div>
            <?php
                endif;
            ?>

           </div><!-- #pix_diapo -->
    </div>
    <div class="span6">
        <div class="row">
            <div class="span6">
                <div class="summary">
                    <div class="page-header">
                        <h3><?php echo h($product['Product']['name']);?></h3>
                    </div>
                    <?php
                    if($product['Product']['promotion_price'] > 0){
                    ?>
                    <p>
                        <span class="label label-important"><?php echo __('Price').': '.h($this->Number->currency($product['Product']['promotion_price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?></span>
                        <strike><span class="label"><?php echo __('List Price').': '.h($this->Number->currency($product['Product']['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?></span></strike>
                    </p>
                    <?php
                    }else{
                    ?>
                    <p><span class="label label-important"><?php echo __('Price').': '.h($this->Number->currency($product['Product']['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?></span></p>
                    <?php
                    }
                    ?>
                    <p><?php echo h($product['Product']['excerpt']);?></p>

                    <div style="margin-bottom: 9px" class="btn-toolbar">
                        <div class="btn-group pull-left">
                            <a href="#" class="btn btn-primary"><i class="icon-user icon-white"></i> <?php echo __('Online Support');?></a>
                            <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if(Configure::read('debug') == 0):?>
                                <li><a href="ymsgr:sendim?khanhtruong111@yahoo.com" border="0"><img src="http://opi.yahoo.com/online?u=khanhtruong111&t=2"></a> </li>
                                <li><a href="ymsgr:sendim?khanhtruong111@yahoo.com" border="0"><img src="http://opi.yahoo.com/online?u=khanhtruong111&t=2"></a> </li>
                                <li><a href="skype:khanhtruong111?call"><img src="http://mystatus.skype.com/smallclassic/khanhtruong111" style="border: none;" alt="My status" /></a></li>
                                <?php endif;?>
                            </ul>
                        </div>

                        <div class="btn-group pull-right">
                            <?php
                            $dataCart = array('id'=>$product['Product']['id'],'qty'=>1);
                            $dataCart = h(json_encode($dataCart));
                            ?>
                            <a class="btn btn-success add2cart" data-cart="<?php echo $dataCart;?>" href="javascript:;;"><i class="icon-shopping-cart icon-white"></i> <?php echo __('Buy');?></a>
                        </div>
                        <div class="btn-group pull-right">
                            <a href="javascript:;;" id="qty-minus" class="btn btn-small" style="margin-bottom:9px"><i class="icon-minus-sign"></i></a>
                            <a href="#" class="btn active"><span id="item_qty">1</span></a>
                            <a href="javascript:;;" id="qty-plus" class="btn btn-small"><i class="icon-plus-sign"></i></a>&nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="span6">
                <?php if(Configure::read('debug') == 0): ?>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                <a class="addthis_button_preferred_1"></a>
                <a class="addthis_button_preferred_2"></a>
                <a class="addthis_button_preferred_3"></a>
                <a class="addthis_button_preferred_4"></a>
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f88443513c1aca4"></script>
                <!-- AddThis Button END -->
                <!-- AddThis Button small BEGIN -->
<!--                <div class="addthis_toolbox addthis_default_style ">
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f88443513c1aca4"></script>-->
                <!-- AddThis Button END -->
                <?php endif;?>
            </div>
        </div>
        <?php
        if($product['Product']['instock'] < 1){
        ?>
        <div class="clearfix"><br/></div>
        <div class="row">
            <div class="span6">
                <div class="alert alert-error"><?php echo __('Not in stock');?></div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div class="clearfix"><br/></div>
<div class="row" id="detail-tabs">
    <div class="span12">
        <div class="tabbable">
            <ul class="nav nav-tabs" style="margin-bottom: 0px;border-bottom: none">
                <?php if(!empty($product['Product']['features'])): ?>
                <li class="active"><a href="#features" data-toggle="tab"><?php echo __('Features');?></a></li>
                <?php endif; ?>
                <?php if(!empty($product['Product']['article'])): ?>
                <li><a href="#article" data-toggle="tab"><?php echo __('Article');?></a></li>
                <?php endif; ?>
                <?php if(!empty($product['Gallery'])): ?>
                <li><a href="#gallery" data-toggle="tab"><?php echo __('Gallery');?></a></li>
                <?php endif; ?>
            </ul>
            <div class="tab-content" style="border: 1px solid #DDDDDD;padding: 15px 5px 10px 5px;">
                <?php if(!empty($product['Product']['features'])): ?>
                <div class="tab-pane active" id="features">
                    <?php echo $product['Product']['features'];?>
                </div>
                <?php endif; ?>
                <?php if(!empty($product['Product']['article'])): ?>
                <div class="tab-pane" id="article">
                    <?php echo $product['Product']['article'];?>
                </div>
                <?php endif; ?>
                <?php if(!empty($product['Gallery'])): ?>
                <div class="tab-pane" id="gallery">
                    <div class="row" style="margin-left:80px">
                        <div class="span11">
                            <ul class="thumbnails">
                            <?php
                            if(!empty($product['Gallery'])):
                                foreach($product['Gallery'] as $gallery):
                                    if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$gallery['dir'].'/'.$gallery['attachment'])){
                            ?>
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/big_'.$gallery['attachment']);?>">
                                        <img alt="" src="<?php echo $this->Html->url('/files/products/'.$gallery['dir'].'/thumb_'.$gallery['attachment']);?>">
                                    </a>
                                </li>
                            <?php
                                        }
                                    endforeach;
                                endif;
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php if(!empty($product['Product']['promotion_content'])): ?>
 <span id="last"></span>
<div id="slidebox">
    <a class="close"></a>
    <?php echo $product['Product']['promotion_content'];?>
</div>
 <script type="text/javascript">
$(function() {
    /**
     * Slide box in footer
     */

    $(window).scroll(function(){
            /* when reaching the element with id "last" we want to show the slidebox. Let's get the distance from the top to the element */
            var distanceTop = $('#last').offset().top - $(window).height();

            if  ($(window).scrollTop() > distanceTop)
                    $('#slidebox').animate({'right':'0px'},300);
            else
                    $('#slidebox').stop(true).animate({'right':'-430px'},100);
    });
    $('#slidebox').animate({'right':'0px'},300);
    /* remove the slidebox when clicking the cross */
    $('#slidebox .close').bind('click',function(){
            $(this).parent().remove();
    });
});
 </script>
<?php endif; ?>
<?php
echo $this->element('front/add2cart', array('qtyContainer'=>'item_qty'));
echo $this->element('products/related_products', array('related_products'=>$related_products));
?>
<script type="text/javascript">
$(function(){
	$('.pix_diapo').diapo({'time': 1500, 'transPeriod' : 1500});
        $('.fancybox').fancybox();
        $('.fancybox-buttons').fancybox({
                openEffect  : 'none',
                closeEffect : 'none',

                prevEffect : 'none',
                nextEffect : 'none',

                closeBtn  : false,

                helpers : {
                        title : {
                            type : 'inside'
                        },
                        buttons	: {}
                },

                afterLoad : function() {
                        this.title = (this.index + 1) + ' / ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
        });

        $('#qty-plus').bind('click', {}, function(){
            $qty = $('#item_qty').html();
            $qty = parseInt($qty);
            $qty++;
            $('#item_qty').html($qty);
        });

        $('#qty-minus').bind('click', {}, function(){
            $qty = $('#item_qty').html();
            $qty = parseInt($qty);
            $qty--;
            if($qty<=0){
                $qty = 1;
            }
            $('#item_qty').html($qty);
        });
});
</script>
