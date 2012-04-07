$(function() {
	$.minicart = {version: '1.0'};
	$.fn.minicart = function(config){
		config = $.extend({}, {
				url: null,
				callback: function() {}
		}, config);


            jQuery('.settings .openclose').bind('click', {}, function()
            {
                //show hide mini cart
                var target = jQuery(this).parent().parent('.settings');
                if(target.is('.display_switch'))
                {
                    target.animate({top: "-78"}, function()
                    {
                        target.removeClass('display_switch').addClass('display_settings_false');
                    });
                }
                else
                {
                    $.get(config.url, {}, function(response){
                        //load mini cart
                        $('#mini_cart').html(response);

                        target.animate({top: "0"}, function()
                        {
                            target.removeClass('display_settings_false').addClass('display_switch');
                        });
                    });
                }
            });
	};
});