<ul class="breadcrumb">
    <li>
            <?php echo $this->Html->link('Customer', array('plugin'=>false, 'admin'=>true, 'controller'=>'customers','action'=>'index'));?>
            <span class="divider">/</span>
    </li>
    <li class="active"><?php echo __('Edit Customer'); ?></li>
</ul>

<?php $vietnamCity = Configure::read('VietnamCities');?>
<div class="users form">
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
    <div class="tabbable1">
        <ul class="nav nav-tabs" style="margin-bottom: 0px;border-bottom: none">
            <li class="active"><a href="#1" data-toggle="tab"><?php echo __('General Information');?></a></li>
            <li><a href="#2" data-toggle="tab"><?php echo __('Checkout Information');?></a></li>
        </ul>
        <div class="tab-content" style="border: 1px solid #DDDDDD;padding: 15px 5px 10px 5px;">
            <div class="tab-pane active" id="1">
                <div class="">
                    <h3><?php echo __('Login Information');?></h3>
                </div>                           
                <?php  
                    echo $this->Form->input('id');
                    echo $this->Form->input('Customer.id');
                    echo $this->Form->input('email', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
                        'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));                
                    echo $this->Form->input('password1', array('div'=>'control-group', 'type'=>'password',
                        'before'=>'<label class="control-label">'.__('Password').'</label><div class="controls">',
                        'after'=>$this->Form->error('password1', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('password2', array('div'=>'control-group', 'type'=>'password',
                        'before'=>'<label class="control-label">'.__('Confirm Password').'</label><div class="controls">',
                        'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                ?>
                <div class="">
                    <h3><?php echo __('Personal Information');?></h3>
                </div>
                <?php
                    echo $this->Form->input('Customer.customer_type_id', array('div'=>'control-group', 'options'=>$customer_types,
                        'before'=>'<label class="control-label">'.__('Customer Type').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.customer_type_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));                
                    echo $this->Form->input('Customer.first_name', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('First Name').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.first_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.last_name', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Last Name').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.last_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.company', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Company').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.company', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.company_address', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Company Address').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.company_address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.tax_no', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Tax No').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.tax_no', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.website', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Website').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.website', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.fax', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Fax').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.fax', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.phone', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Phone').'</label><div class="controls">',
                        'after'=>$this->Form->error('Customer.phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                ?>
            </div>
            <div class="tab-pane" id="2">
                <div class="">
                    <h3><?php echo __('Checkout Address');?></h3>
                </div>
                <?php
                    echo $this->Form->input('CheckoutAddress.first_name', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('First Name').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.first_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.last_name', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Last Name').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.last_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.phone', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Phone').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.address', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Address').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.ward', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Ward').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.ward', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.district', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('District').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.district', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.city', array('div'=>'control-group','placeholder'=>'','options'=>$vietnamCity, 'value'=>52,
                                            'before'=>'<label>'.__('City').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.city', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    $checked = (isset($this->data['DeliveryAddress'])) ? false : true;
                    $checked = (isset($this->data['CheckoutAddress']['is_delivery_address']) && $this->data['CheckoutAddress']['is_delivery_address'] > 0) ? true : $checked;
                    echo $this->Form->input('CheckoutAddress.is_delivery_address', array('div'=>'control-group','placeholder'=>'', 'id'=>'is_delivery_address','checked'=>$checked,
                                            'before'=>'<label>'.__('Delivery Address').'</label><div class="controls">',
                                            'after'=>$this->Form->error('CheckoutAddress.is_delivery_address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'&nbsp;'.__('The same checkout address').'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    if($checked){
                        echo $this->Html->scriptBlock('$(function(){ $("#is_delivery_address").trigger("change"); });', array('inline' => false, 'block' => 'scriptBottom'));
                    }
                ?>
                <div class="">
                    <h3><?php echo __('Delivery Address');?></h3>
                </div>
                <?php           
                    echo $this->Form->input('DeliveryAddress.phone', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Phone').'</label><div class="controls">',
                                            'after'=>$this->Form->error('DeliveryAddress.phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.address', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Address').'</label><div class="controls">',
                                            'after'=>$this->Form->error('DeliveryAddress.address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.ward', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Ward').'</label><div class="controls">',
                                            'after'=>$this->Form->error('DeliveryAddress.ward', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.district', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('District').'</label><div class="controls">',
                                            'after'=>$this->Form->error('DeliveryAddress.district', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.city', array('div'=>'control-group','placeholder'=>'','options'=>$vietnamCity, 'value'=>52,
                                            'before'=>'<label>'.__('City').'</label><div class="controls">',
                                            'after'=>$this->Form->error('DeliveryAddress.city', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                ?>
            </div>
        </div>
    </div> 
    <div class="form-actions">
        <?php echo $this->Form->button(__('Submit'), array('type'=>'submit','class'=>'btn btn-primary', 'div'=>false));?>
        <?php echo $this->Form->button(__('Cancel'), array('class'=>'btn', 'type'=>'reset', 'div'=>false));?>
    </div>
<?php echo $this->Form->end();?>
</div>
<script type="text/javascript">
$(function(){
    $('#is_delivery_address').bind('change', {}, function(){
        $obj = $(this);
        if($obj.is(':checked')){
            $('.DeliveryAddress').attr('disabled', true);
        }else{
            $('.DeliveryAddress').removeAttr('disabled');
        }
    });    
});
</script>