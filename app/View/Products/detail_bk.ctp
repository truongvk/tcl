<?php echo $this->Html->script(array('jquery/jquery.mousewheel-3.0.6.pack', 'fancybox/jquery.fancybox', 'fancybox/helpers/jquery.fancybox-thumbs.js?v=2.0.4'), array('block' => 'scriptBottom'));?>
<?php echo $this->Html->css(array('../js/fancybox/jquery.fancybox','../js/fancybox/helpers/jquery.fancybox-thumbs.css?v=2.0.4','slidebox/style', 'sweetthumbnails/style'), null, array('block' => 'scriptTop'));?>
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
        <div id="ps_container" class="ps_container">
                <div class="ps_image_wrapper">
                    <!-- First initial image -->
                    <div class="thumbnail">
                        <img src="/tclvn/files/products/1/big_2040128_13136.jpg" alt="">
                    </div>
                </div>               
                <!-- Dot list with thumbnail preview -->                
                <ul class="ps_nav">
                        <li class="selected"><a href="/tclvn/files/products/1/big_2040128_13136.jpg" thumb="/tclvn/files/products/1/thumb_2040128_13136.jpg">Image 1</a></li>
                        <li><a href="/tclvn/files/products/1/big_2040128_13136.jpg" thumb="/tclvn/files/products/1/thumb_2040128_13136.jpg">Image 2</a></li>
                        <li><a href="/tclvn/files/products/1/big_2040128_13136.jpg" thumb="/tclvn/files/products/1/thumb_2040128_13136.jpg">Image 3</a></li>
                        <li class="ps_preview">
                                <div class="ps_preview_wrapper">
                                        <!-- Thumbnail comes here -->
                                </div>
                                <!-- Little triangle -->
                                <span></span>
                        </li>
                </ul>

        </div>
    </div>
    <div class="span6" style="margin-left: 20px;">
        <div class="summary">
            <div class="page-header">
                <h3>Lorem ipsum la iscumstat</h3>
            </div>
            <p><span class="label">Giá: 5,900,000 VND</span></p>
            <p>Vivamus nam arcu purus feugiat. Nunc tincidunt aliquet labore tellus, magna quisque erat morbi placerat donec quisque, felis sapien inceptos imperdiet wisi nec, pede donec mauris mauris cursus amet libero.</p>
            <p>Vivamus nam arcu purus feugiat. Nunc tincidunt aliquet labore tellus, magna quisque erat morbi placerat donec quisque, felis sapien inceptos imperdiet wisi nec, pede donec mauris mauris cursus amet libero.</p>

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

<div class="row">
    <div class="span12">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#1" data-toggle="tab">Section 1</a></li>
                <li><a href="#2" data-toggle="tab">Section 2</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="1">
                    <p>Vivamus nam arcu purus feugiat. Nunc tincidunt aliquet labore tellus, magna quisque erat morbi placerat donec quisque, felis sapien inceptos imperdiet wisi nec, pede donec mauris mauris cursus amet libero.</p>
                    <p>Vivamus nam arcu purus feugiat. Nunc tincidunt aliquet labore tellus, magna quisque erat morbi placerat donec quisque, felis sapien inceptos imperdiet wisi nec, pede donec mauris mauris cursus amet libero.</p>
                </div>
                <div class="tab-pane" id="2">
                    <p>Vivamus nam arcu purus feugiat. Nunc tincidunt aliquet labore tellus, magna quisque erat morbi placerat donec quisque, felis sapien inceptos imperdiet wisi nec, pede donec mauris mauris cursus amet libero.</p>
                    <p>Vivamus nam arcu purus feugiat. Nunc tincidunt aliquet labore tellus, magna quisque erat morbi placerat donec quisque, felis sapien inceptos imperdiet wisi nec, pede donec mauris mauris cursus amet libero.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="slidebox">
    <a class="close"></a>
    <p>Khuyến mãi</p>
    <h2>Giảm đến 50% khi mua hàng qua mạng</h2>
    <ul>
        <li>Mua trả góp chỉ từ :2,700,000-3,000,000/tháng</li>
        <li>Bộ bán hàng chuẩn :Máy, chân đế, Remote,sách hướng dẫn </li>
    </ul>
   <a class="more">Read More »</a>
</div>
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
</script>

<script type="text/javascript">
    /*
        the images preload plugin
     */
    (function($) {
        $.fn.preload = function(options) {
            var opts 	= $.extend({}, $.fn.preload.defaults, options),
            o		= $.meta ? $.extend({}, opts, this.data()) : opts;
            return this.each(function() {
                var $e	= $(this),
                t	= $e.attr('thumb'),
                i	= $e.attr('href'),
                l	= 0;
                $('<img/>').load(function(i){
                    ++l;
                    if(l==2) o.onComplete();
                }).attr('src',i);
                $('<img/>').load(function(i){
                    ++l;
                    if(l==2) o.onComplete();
                }).attr('src',t);
            });
        };
        $.fn.preload.defaults = {
            onComplete	: function(){return false;}
        };
    })(jQuery);
</script>
<script type="text/javascript">
$(function() {
//some elements..
var $ps_container		= $('#ps_container'),
$ps_image_wrapper               = $ps_container.find('.ps_image_wrapper'),
$ps_next			= $ps_container.find('.ps_next'),
$ps_prev			= $ps_container.find('.ps_prev'),
$ps_nav				= $ps_container.find('.ps_nav'),
$tooltip			= $ps_container.find('.ps_preview'),
$ps_preview_wrapper = $tooltip.find('.ps_preview_wrapper'),
$links				= $ps_nav.children('li').not($tooltip),
total_images		= $links.length,
currentHovered		= -1,
current				= 0,
$loader				= $('#loader');

/*check if you are using a browser*/
var ie 				= false;
if ($.browser.msie) {
    ie = true;//you are not!Anyway let's give it a try
}
if(!ie)
    $tooltip.css({
        opacity	: 0
    }).show();


/*first preload images (thumbs and large images)*/
var loaded	= 0;
$links.each(function(i){
    var $link 	= $(this);
    $link.find('a').preload({
        onComplete	: function(){
            ++loaded;
            if(loaded == total_images){
                //all images preloaded,
                //show ps_container and initialize events
                $loader.hide();
                $ps_container.show();
                //when mouse enters the pages (the dots),
                //show the tooltip,
                //when mouse leaves hide the tooltip,
                //clicking on one will display the respective image
                $links.bind('mouseenter',showTooltip)
                .bind('mouseleave',hideTooltip)
                .bind('click',showImage);
                //navigate through the images
                $ps_next.bind('click',nextImage);
                $ps_prev.bind('click',prevImage);
            }
        }
    });
});

function showTooltip(){
    var $link			= $(this),
    idx				= $link.index(),
    linkOuterWidth	= $link.outerWidth(),
    //this holds the left value for the next position
    //of the tooltip
    left			= parseFloat(idx * linkOuterWidth) - $tooltip.width()/2 + linkOuterWidth/2,
    //the thumb image source
    $thumb			= $link.find('a').attr('thumb'),
    imageLeft;

    //if we are not hovering the current one
    if(currentHovered != idx){
        //check if we will animate left->right or right->left
        if(currentHovered != -1){
            if(currentHovered < idx){
                imageLeft	= 75;
            }
            else{
                imageLeft	= -75;
            }
        }
        currentHovered = idx;

        //the next thumb image to be shown in the tooltip
        var $newImage = $('<img/>').css('left','0px')
        .attr('src',$thumb);

        //if theres more than 1 image
        //(if we would move the mouse too fast it would probably happen)
        //then remove the oldest one (:last)
        if($ps_preview_wrapper.children().length > 1)
            $ps_preview_wrapper.children(':last').remove();

        //prepend the new image
        $ps_preview_wrapper.prepend($newImage);

        var $tooltip_imgs		= $ps_preview_wrapper.children(),
        tooltip_imgs_count	= $tooltip_imgs.length;

        //if theres 2 images on the tooltip
        //animate the current one out, and the new one in
        if(tooltip_imgs_count > 1){
            $tooltip_imgs.eq(tooltip_imgs_count-1)
            .stop()
            .animate({
                left:-imageLeft+'px'
            },150,function(){
                //remove the old one
                $(this).remove();
            });
            $tooltip_imgs.eq(0)
            .css('left',imageLeft + 'px')
            .stop()
            .animate({
                left:'0px'
            },150);
        }
    }
    //if we are not using a "browser", we just show the tooltip,
    //otherwise we fade it
    //
    if(ie)
        $tooltip.css('left',left + 'px').show();
    else
        $tooltip.stop()
    .animate({
        left		: left + 'px',
        opacity		: 1
    },150);
}

function hideTooltip(){
    //hide / fade out the tooltip
    if(ie)
        $tooltip.hide();
    else
        $tooltip.stop()
    .animate({
        opacity		: 0
    },150);
}

function showImage(e){
    var $link				= $(this),
    idx					= $link.index(),
    $image				= $link.find('a').attr('href'),
    $currentImage 		= $ps_image_wrapper.find('img'),
    currentImageWidth	= $currentImage.width();

    //if we click the current one return
    if(current == idx) return false;

    //add class selected to the current page / dot
    $links.eq(current).removeClass('selected');
    $link.addClass('selected');

    //the new image element
    var $newImage = $('<img/>').css('left',currentImageWidth + 'px')
    .attr('src',$image).attr('class', 'fancybox'). attr('data-fancybox-group', 'gallery');

    //if the wrapper has more than one image, remove oldest
    if($ps_image_wrapper.children().length > 1)
        $ps_image_wrapper.children(':last').remove();

    //prepend the new image
    $ps_image_wrapper.prepend($newImage);

    //the new image width.
    //This will be the new width of the ps_image_wrapper
    var newImageWidth	= $newImage.width();

    //check animation direction
    if(current > idx){
        $newImage.css('left',-newImageWidth + 'px');
        currentImageWidth = -newImageWidth;
    }
    current = idx;
    //animate the new width of the ps_image_wrapper
    //(same like new image width)
    $ps_image_wrapper.stop().animate({
        width	: newImageWidth + 'px'
    },350);
    //animate the new image in
    $newImage.stop().animate({
        left	: '0px'
    },350);
    //animate the old image out
    $currentImage.stop().animate({
        left	: -currentImageWidth + 'px'
    },350);

    e.preventDefault();
}

function nextImage(){
    if(current < total_images){
        $links.eq(current+1).trigger('click');
    }
}
function prevImage(){
    if(current > 0){
        $links.eq(current-1).trigger('click');
    }
}
});
</script>
<script type="text/javascript" language="javascript">
$(function () {
      $('.fancybox').fancybox();
});
</script>