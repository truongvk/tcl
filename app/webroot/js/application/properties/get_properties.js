(function($) {
	$.get_properties = {version: '1.0'};
	$.fn.get_properties = function(config){
            config = $.extend({}, {
                    url: '',
                    list_categories_id: '',
                    display_container: '',
                    fieldset: false,
                    fieldset_options: null,
                    doloadProperty: null,
                    selected_data: null,
                    container_style: '',
                    container_class: '',
                    callback: function() {

                    }
            }, config);

            if($.browser.msie){
                $.ajaxSetup({cache: false});
            }

            $("#"+config.list_categories_id).change(
                function (){
                    $.get(config.url+this.value, {},
                        function(data){
                            $("#"+config.display_container).show();
                            data = jQuery.parseJSON(data);
                            if(data != null){
                                table = "";
                                if(config.fieldset){
                                    style = (config.fieldset_options['style'] != undefined) ? config.fieldset_options['style'] : "";
                                    legend = (config.fieldset_options['legend'] != undefined) ? config.fieldset_options['legend'] : "";
                                    table += '<fieldset style="'+style+'">';
                                    table += '<legend>'+legend+'</legend>';
                                }
                                $.each(data, function(parent,items){

                                    table += "<div style='"+config.container_style+"' class='"+config.container_class+"'>";
                                    table += "<select name='data[Property][id][]' class='textbox'>";
                                    table += "<option value='0'>---"+parent+"---</option>";
                                    $.each(items, function(id, value){
                                        selected = '';
                                        $.each(config.selected_data, function(idx, val){
                                            if(val == id){
                                                selected = 'selected';
                                            }
                                        })
                                        table += "<option value='"+id+"' "+selected+">"+value+"</option>";
                                    })
                                    table += "</select>";
                                    table += "</div>";

                                });

                                if(config.fieldset){
                                    table += "</fieldset>";
                                }

                                $("#"+config.display_container).html(table);
                            }else{
                                $("#"+config.display_container).html("");
                            }
                        }
                    );
            });

            if(config.doloadProperty != ''){
                $(document).ready(function(){
                    $("#"+config.list_categories_id).trigger('change');
                });
            }
    }

    return this;
})(jQuery);