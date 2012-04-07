$(function() {
	$.add2cart = {version: '1.0'};
	$.fn.add2cart = function(config){
		config = $.extend({}, {
                                elementClass: null,				
				post_to_url: null,
				get_from_url: null,
				modalID: null,
				qtyContainer: null,
				callback: function() {}
		}, config);
            
            
            $('.'+config.elementClass).bind('click', {}, function(){
                $params = $(this).attr('data-cart');
                $params = jQuery.parseJSON($params);
                $qty =  ($('#'+config.qtyContainer).length) ? $('#'+config.qtyContainer).html() : $params.qty;

                $.post(config.post_to_url, {'data[Product][id]':$params.id,'data[Product][qty]':$qty},
                    function(response){
                        $.get(config.get_from_url, {}, function(response){
                            $('#'+config.modalID).find('.modal-body').html(response);
                            $('#'+config.modalID).modal('show');
                        });
                    }
                );
            });
            
	};
});