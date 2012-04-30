<div class="options display_switch" style="left: -365px;">
        <div class="open_close open_close_display_options"></div>
        <div class="full_options">
                <h3><?php echo __('Feedback to us');?></h3>
        </div>

        <div style="padding-top: 20px; border-top: solid 1px #eeeeee;" class="full_options">

            <?php echo $this->Form->create('Contact', array('id'=>'contactForm'));?>
                   <?php
                            echo $this->Form->input('name', array('div'=>'control-group','placeholder'=>__('Required field'),
                                                    'before'=>'<label>'.__('Name').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large required'));
                            echo $this->Form->input('email', array('div'=>'control-group','placeholder'=>__('Required field'),
                                                    'before'=>'<label>'.__('Email').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large required required-email'));
                            echo $this->Form->input('title', array('div'=>'control-group','placeholder'=>__('Required field'),
                                                    'before'=>'<label>'.__('Title').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large required'));
                            echo $this->Form->input('content', array('div'=>'control-group','placeholder'=>__('Required field'),
                                                    'before'=>'<label>'.__('Content').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('content', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large required'));
                    ?>
                    <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-primary', 'type'=>'button', 'id'=>'submitContact', 'div'=>false, 'data-loading-text'=>__('waiting').'...'));?>
                    <?php echo $this->Form->button(__('Cancel'), array('class'=>'btn', 'div'=>false, 'type'=>'reset'));?>
            <?php echo $this->Form->end();?>

        </div>

</div>
<script type="text/javascript">
    var contact = {
        isValidEmailAddress : function(emailAddress){
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        },
        validate : function(){
            var error = 1;
            var hasError = false;
            $('#contactForm').find(':input:not(button)').each(function(){
                var $this 		= $(this);
                
                if($this.hasClass('required') && !$this.is(':disabled')){
                        var valueLength = jQuery.trim($this.val()).length;

                        if(valueLength == ''){
                            $this.css('background-color','#FFEDEF');
                            $this.focus();
                            hasError = true;
                        }else{
                            $this.css('background-color','#FFFFFF');
                        }
                }



            });
            
            if(contact.isValidEmailAddress($('#ContactEmail').val()) == false){
                $('#ContactEmail').css('background-color','#FFEDEF');
                $('#ContactEmail').focus();
                hasError = true;
            }
            
            if(hasError){
                error = -1;
            }
            return error;
        }
    }

$(function(){
    var btn = $('#submitContact').click(function () {
        $this = $(this);
        $this.button('loading');

        error = contact.validate();
        if(error == 1){
            var params = {
                            'data[Contact][name]': $('#ContactName').val(),
                            'data[Contact][email]': $('#ContactEmail').val(),
                            'data[Contact][title]': $('#ContactTitle').val(),
                            'data[Contact][content]': $('#ContactContent').val()
                         };
            var str = jQuery.param(params);
            $.post('<?php echo $this->Html->url('/contacts/index');?>', str, function(response){
                if(response == 1){
                    smoke.signal('<?php echo __('Thank you for your feedback.');?>');
                    $(':input','#contactForm').not(':button, :submit, :reset, :hidden').val('');
                    setTimeout("$this.button('reset');", 2000);
                }else{
                    if(response == 0){
                        smoke.signal('<?php echo __('Something went wrong.Sorry for inconvenience.');?>');
                    }else{
                        smoke.signal(response);
                    }
                }
            });
        }
        setTimeout("$this.button('reset');", 2000);
    });

    jQuery('.open_close_display_options').click(function()
    {
        var target = jQuery(this).parent();
        if(target.is('.display_switch'))
        {
            target.animate({left: "-75"}, function()
            {
                target.removeClass('display_switch');
            });
        }
        else
        {
            target.animate({left: "-365px"}, function()
            {
                target.addClass('display_switch');
            });
        }
    });
});
</script>