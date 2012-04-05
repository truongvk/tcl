<?php echo $this->Html->script(array('jquery/jquery.easing.1.3', 'jquery/jquery.hoverIntent.minified', 'diapo/diapo.min', 'fancybox/jquery.fancybox', 'fancybox/helpers/jquery.fancybox-buttons.js?v=2.0.4'), array('block' => 'scriptBottom'));?>
<?php echo $this->Html->css(array('relateposts/style','../js/fancybox/jquery.fancybox', '../js/fancybox/helpers/jquery.fancybox-buttons.css?v=2.0.4', '../js/diapo/diapo','slidebox/style'), null, array('block' => 'scriptTop'));?>
<style type="text/css">
div.summary {
    border: 4px solid #F5F5F5;
    box-shadow: 0 0 1px #888888;
    float: right;
    margin-bottom: 20px;
    padding: 5px;
}
div.summary span.label{
    font-size: 14px;
    padding: 5px;
    text-align: right;
}
div.summary div.page-header{
    margin: 10px 0px;
    padding-bottom: 10px;
}

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
    <li><a href="#"><i class="icon-home"></i></a> <span class="divider">/</span></li>
    <li><a href="#">Library</a> <span class="divider">/</span></li>
    <li class="active">Data</li>
</ul>

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
        <div class="summary">
            <div class="page-header">
                <h3><?php echo h($product['Product']['name']);?></h3>
            </div>
            <p><span class="label"><?php echo __('Price').': '.h($this->Number->currency($product['Product']['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?></span></p>
            <p><?php echo h($product['Product']['excerpt']);?></p>

                <div style="margin-bottom: 9px" class="btn-toolbar">
                    <div class="btn-group">
                        <a href="#" class="btn btn-small" style="margin-bottom:9px"><i class="icon-minus-sign"></i></a>
                        <a href="#" class="btn active"><span>1</span></a>
                        <a href="#" class="btn btn-small"><i class="icon-plus-sign"></i></a>
                    </div>
                    <div class="btn-group pull-right">
                        <a href="#" class="btn btn-success"><i class="icon-shopping-cart icon-white"></i> Mua</a>
                    </div>
                </div>

        </div>
    </div>
</div>
<div class="clearfix"><br/></div>
<div class="row">
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
                    <div class="row">
                        <div class="span11">
                            <ul class="thumbnails">
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="http://placehold.it/600x480.gif">
                                        <img alt="" src="http://placehold.it/260x180.gif">
                                    </a>
                                </li>
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="http://placehold.it/600x480.gif">
                                        <img alt="" src="http://placehold.it/260x180.gif">
                                    </a>
                                </li>
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="http://placehold.it/600x480.gif">
                                        <img alt="" src="http://placehold.it/260x180.gif">
                                    </a>
                                </li>
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="http://placehold.it/600x480.gif">
                                        <img alt="" src="http://placehold.it/260x180.gif">
                                    </a>
                                </li>
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="http://placehold.it/600x480.gif">
                                        <img alt="" src="http://placehold.it/260x180.gif">
                                    </a>
                                </li>
                                <li class="span3">
                                    <a class="thumbnail fancybox-buttons" data-fancybox-group="thumb" href="http://placehold.it/600x480.gif">
                                        <img alt="" src="http://placehold.it/260x180.gif">
                                    </a>
                                </li>
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
<div id="slidebox">
    <a class="close"></a>
    <?php echo $product['Product']['promotion_content'];?>
</div>
<?php endif; ?>
<script type="text/javascript">
$(function() {
    /**
     * Slide box in footer
     */

//	$(window).scroll(function(){
//		/* when reaching the element with id "last" we want to show the slidebox. Let's get the distance from the top to the element */
//		var distanceTop = $('#last').offset().top - $(window).height();
//
//		if  ($(window).scrollTop() > distanceTop)
//			$('#slidebox').animate({'right':'0px'},300);
//		else
//			$('#slidebox').stop(true).animate({'right':'-430px'},100);
//	});
        $('#slidebox').animate({'right':'0px'},300);
	/* remove the slidebox when clicking the cross */
	$('#slidebox .close').bind('click',function(){
		$(this).parent().remove();
	});
});

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
});
</script>
