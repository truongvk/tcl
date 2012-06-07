$(function() {
//window width and height
var window_w 					= $(window).width();
var window_h 					= $(window).height();
//the main panel div
var $pc_panel = $('#pc_panel');
//the wrapper and the content divs
var $pc_wrapper					= $('#pc_wrapper');
var $pc_content					= $('#pc_content');
//the slider / slider div
var $pc_slider					= $('#pc_slider');
//the element reference - reaching this element
//activates the panel
var $pc_reference 				= $('#pc_reference');

var maxWidth,maxHeight,marginL;

buildPanel();

function buildPanel(){
	$pc_panel.css({'height': window_h + 'px'});
	hidePanel();
	//we want to display the items in a grid.
	//we need to calculate how much width and height
	//the wrapper should have.
	//we also want to display it centered, so we need to calculate
	//the margin left of the wrapper

	//First, lets see how much of height:
	//maxHeight = Math.floor((window_h-20)/135)*135;
	//20 => pc_titles height
	//135 => 125 of each items height plus its margin (10)
	maxHeight 		= Math.floor((window_h-20)/135)*135;
	//maxWidth = Math.floor((window_w-35)/220)*220;
	//220 = item width + margins (left and right)
	maxWidth 		= Math.floor((window_w-35)/220)*220;
	marginL  		= (window_w - maxWidth)/2;
	$pc_wrapper.css({
		'width' 		: maxWidth + 20 + 'px',
		'height'		: maxHeight +'px',
		'margin-left' 	: marginL + 'px'
	});

	//innitialize the slider
	try{
		$pc_slider.slider('destroy');
	}catch(e){}
	//total_scroll is the number of how much we can scroll
	var total_scroll = $pc_content.height()-maxHeight;
	//add a slider to scroll the content div
	//hidden until the panel is expanded
	if(total_scroll > 0){
		$pc_slider.slider({
			orientation	: 'vertical',
			max			: total_scroll,
			min			: 0,
			value		: total_scroll,
			slide		: function(event, ui) {
				$pc_wrapper.scrollTop(Math.abs(ui.value-total_scroll));
			}
		}).css({
			'height'	: maxHeight -40 + 'px',//40 extra
			'left'		: maxWidth + 20 + marginL + 'px',
			'top'		: 30 + 20 + 'px',
			//30 = 20 of title + 10 margin, 20 extra
			'display'	: 'none'
		});
	}
}

//the panel gets positioned out of the viewport,
//and ready to be slided out!
function hidePanel(){
	//165 => 20 pc_title + 120 item + margins
	$pc_panel.css({
		'right'	: -window_w + 'px',
		'top'	: window_h - 165 + 'px'
	}).show();
	try{
		//position the slider in the beginning
		slideTop();
	}catch(e){}
	$pc_slider.hide();
	$pc_panel.find('.collapse')
	.addClass('expand')
	.removeClass('collapse');
}

//resets the slider by sliding it to the top
function slideTop(){
	var total_scroll 	= $pc_content.height()-maxHeight;
	$pc_wrapper.scrollTop(0);
	$pc_slider.slider('option', 'value', total_scroll );
}

$(window).bind('scroll',function(){
	/*
	When we reach the element pc_reference, we want to show the panel.
	Let's get the distance from the top to the element
	 */
	var distanceTop = $pc_reference.offset().top - window_h;
	if($(window).scrollTop() > distanceTop){
		if(parseInt($pc_panel.css('right'),10) == -window_w)
			$pc_panel.stop().animate({'right':'0px'},300);
	}
	else{
		if(parseInt($pc_panel.css('right'),10) == 0)
			$pc_panel.stop().animate({'right': -window_w + 'px'},300,function(){
				hidePanel();
			});
	}
}).bind('resize',function(){
	//on resize calculate the windows dimentions again,
	//and build the panel accordingly
	window_w 			= $(window).width();
	window_h 			= $(window).height();
	buildPanel();
});

//when clicking on the expand button,
//we animate the panel to the size of the window,
//reset the slider and show it
$pc_panel.find('.expand').bind('click',function(){
	var $this = $(this);
	$pc_wrapper.hide();
	$pc_panel.stop().animate({'top':'0px'},500,function(){
		$pc_wrapper.show();
		slideTop();
		$pc_slider.show();
		$this.addClass('collapse').removeClass('expand');
	});
})

//clicking collapse will hide the slider,
//and minimize the panel
$pc_panel.find('.collapse').live('click',function(){
	var $this = $(this);
	$pc_wrapper.hide();
	$pc_slider.hide();
	$pc_panel.stop().animate({'top':window_h - 165 + 'px'},500,function(){
		$pc_wrapper.show();
		$this.addClass('expand').removeClass('collapse');
	});
});

//clicking close will make the panel disappear
$pc_panel.find('.close').bind('click',function(){
	$pc_panel.remove();
	$(window).unbind('scroll').unbind('resize');
});

//mouse over the items add class "selected"
$pc_wrapper.find('.pc_item').hover(
function(){
	$(this).addClass('selected');
},
function(){
	$(this).removeClass('selected');
}
).bind('click',function(){
	window.open($(this).find('.pc_more').html());
});
});