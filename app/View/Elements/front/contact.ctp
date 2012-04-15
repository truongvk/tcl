<div class="options display_switch" style="left: -365px;">
        <div class="open_close open_close_display_options"></div>
        <div class="full_options">
                <h3><?php echo __('Contact Us');?></h3>
        </div>

        <div style="padding-top: 20px; border-top: solid 1px #eeeeee;" class="full_options">

            <?php echo $this->Form->create('Contact', array());?>
                   <?php
                            echo $this->Form->input('name', array('div'=>'control-group','placeholder'=>'',
                                                    'before'=>'<label>'.__('Name').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large'));
                            echo $this->Form->input('email', array('div'=>'control-group','placeholder'=>'',
                                                    'before'=>'<label>'.__('Email').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large'));
                            echo $this->Form->input('title', array('div'=>'control-group','placeholder'=>'',
                                                    'before'=>'<label>'.__('Title').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large'));
                            echo $this->Form->input('content', array('div'=>'control-group','placeholder'=>'',
                                                    'before'=>'<label>'.__('Content').'</label><div class="controls">',
                                                    'after'=>$this->Form->error('content', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                    'error' => array('attributes' => array('style' => 'display:none')),
                                                    'label'=>false, 'class'=>'input-large'));
                    ?>                    
                    <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
                    <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>                    
            <?php echo $this->Form->end();?>            

        </div>

</div>
<script type="text/javascript">
$(function(){    
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