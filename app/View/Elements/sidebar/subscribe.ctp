<div class="widget-shop">
        <div class="widget-title"><?php echo __('Subscribe');?></div>
        <?php echo $this->Form->create('Subscriber', array('id'=>'subscriberForm'));?>
        <ul class="nav nav-list subscribe">
            <li>
                <div class="input-append">
                    <?php
                    echo $this->Form->input('email', array('placeholder'=>__('Your Email'),
                                                    'before'=>'',
                                                    'after'=>'',
                                                    'div'=>false,
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'span2', 'size'=>16));
                    ?>
                    <button type="button" id="submitSubscriber" class="btn" data-loading-text='...'>Go!</button>
                </div>
                <p class="help-block"><?php echo __('Subscribe us to receive many interesting promotion information');?></p>
            </li>
        </ul>
</div>
<script type="text/javascript">
var subscriber = {
        isValidEmailAddress : function(emailAddress){
            var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
            return pattern.test(emailAddress);
        }
}
$(function(){
    var btn = $('#submitSubscriber').click(function () {
        $this = $(this);
        $this.button('loading');

        emailAddress = $('#SubscriberEmail').val();
        if(subscriber.isValidEmailAddress(emailAddress)){
            var params = {'data[Subscriber][email]': emailAddress};
            var str = jQuery.param(params);
            $.post('<?php echo $this->Html->url('/subscribers/add');?>', str, function(response){
                if(response == 1){
                    smoke.signal('<?php echo __('Your email has been saved. Thank you.');?>');
                    $('#SubscriberEmail').attr('style','');
                    $(':input','#subscriberForm').not(':button, :submit, :reset, :hidden').val('');
                    
                }else{
                    if(response == 0){
                        smoke.signal('<?php echo __('Something went wrong.Sorry for inconvenience.');?>');
                    }else{
                        smoke.signal(response);
                    }
                }
            });
        }else{
            smoke.signal('<?php echo __('Email is invalid.');?>');
            $('#SubscriberEmail').css('background-color','#FFEDEF');
            $('#SubscriberEmail').focus();
        }
        setTimeout("$this.button('reset');", 2000);

    });
});
</script>