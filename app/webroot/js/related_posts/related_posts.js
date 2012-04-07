$(function() {
    $.related_posts = {
        version: '1.0'
    };
    $.fn.related_posts = function(config){
        config = $.extend({}, {
            post_count: 0,
            callback: function() {}
        }, config);    
        /**
        * the list of posts
        */
        var $list = $('#rp_list ul');
        /**
        * number of related posts
        */
        var elems_cnt   = $list.children().length;
		
        /**
        * show the first set of posts.
        * 200 is the initial left margin for the list elements
        */
        load(200);
		
        function load(initial){
            $list.find('li').hide().andSelf().find('div').css('margin-left',-initial+'px');
            var loaded	= 0;
            //show 5 random posts from all the ones in the list. 
            //Make sure not to repeat
            loadpost = (config.post_count > 5) ? 5 : config.post_count;
            while(loaded < loadpost){
                var r 		= Math.floor(Math.random()*elems_cnt);
                var $elem	= $list.find('li:nth-child('+ (r+1) +')');
                if($elem.is(':visible'))
                    continue;
                else
                    $elem.show();
                ++loaded;
            }
            //animate them
            var d = 200;
            $list.find('li:visible div').each(function(){
                $(this).stop().animate({
                    'marginLeft':'-70px'
                },d += 100);
            });
        }
			
        /**
		* hovering over the list elements makes them slide out
		*/	
        $list.find('li:visible').live('mouseenter',function () {
            $(this).find('div').stop().animate({
                'marginLeft':'-220px'
            },200);
        }).live('mouseleave',function () {
            $(this).find('div').stop().animate({
                'marginLeft':'-70px'
            },200);
        });
		
        /**
		* when clicking the shuffle button,
		* show 5 random posts
		*/
        $('#rp_shuffle').unbind('click')
        .bind('click',shuffle)
        .stop()
        .animate({
            'margin-left':'-18px'
        },700);
						
        function shuffle(){
            $list.find('li:visible div').stop().animate({
                'marginLeft':'60px'
            },200,function(){
                load(-60);
            });
        }
                
    };
});