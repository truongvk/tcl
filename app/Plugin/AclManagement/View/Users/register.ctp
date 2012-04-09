<?php $vietnamCity = array(1 => "An Giang", 2 => "Bắc Giang", 3 => "Bắc Kạn", 4 => "Bạc Liêu", 5 => "Bắc Ninh", 6 => "Bến Tre", 7 => "Bình Dương", 8 => "Bình Phước", 9 => "Bình Thuận", 10 => "Bình Định", 11 => "Cà Mau", 12 => "Cần Thơ", 13 => "Cao Bằng", 14 => "Gia Lai", 15 => "Hà Giang", 16 => "Hà Nam", 17 => "Hà Nội", 18 => "Hà Tây", 19 => "Hà Tĩnh", 20 => "Hải Dương", 21 => "Hải Phòng", 22 => "Hậu Giang", 23 => "Hoà Bình", 24 => "Huế", 25 => "Hưng Yên", 26 => "Khánh Hoà", 27 => "Kiên Giang", 28 => "Kon Tum", 29 => "Lai Châu", 30 => "Lâm Ðồng", 31 => "Lạng Sơn", 32 => "Lào Cai", 33 => "Long An", 34 => "Nam Ðịnh", 35 => "Nghệ An", 36 => "Ninh Bình", 37 => "Ninh Thuận", 38 => "Phú Thọ", 39 => "Phú Yên", 40 => "Quảng Bình", 41 => "Quảng Nam", 42 => "Quảng Ngãi", 43 => "Quảng Ninh", 44 => "Quảng Trị", 45 => "Sóc Trăng", 46 => "Sơn La", 47 => "Tây Ninh", 48 => "Thái Bình", 49 => "Thái Nguyên", 50 => "Thanh Hóa", 51 => "Tiền Giang", 52 => "TP Hồ Chí Minh", 53 => "Trà Vinh", 54 => "Tuyên Quang", 55 => "Vĩnh Long", 56 => "Vĩnh Phúc", 57 => "Vũng Tàu", 58 => "Yên Bái", 59 => "Ðà Nẵng", 60 => "Ðắc Lắc", 61 => "Ðắk Nông", 62 => "Ðồng Nai", 63 => "Ðồng Tháp", 64 => "Điện Biên");?>
<div class="users form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link(__('Homepage'), '/');?><span class="divider">/</span></li>
    <li class="active"><?php echo __('Sign Up');?></li>
</ul>
<?php //echo $this->element('social_connect', array(), array('plugin'=>'AclManagement'));?>
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
    <div class="tabbable">
        <ul class="nav nav-tabs" style="margin-bottom: 0px;border-bottom: none">
            <li class="active"><a href="#1" data-toggle="tab"><?php echo __('General Information');?></a></li>
            <li><a href="#2" data-toggle="tab"><?php echo __('Checkout Information');?></a></li>
        </ul>
        <div class="tab-content" style="border: 1px solid #DDDDDD;padding: 15px 5px 10px 5px;">
            <div class="tab-pane active" id="1">
                <div class="page-header">
                    <h3><?php echo __('Login Information');?></h3>
                </div>
                <?php
                    echo $this->Form->input('email', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
                        'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('password', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Password').'</label><div class="controls">',
                        'after'=>$this->Form->error('password', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('password2', array('div'=>'control-group', 'type'=>'password',
                        'before'=>'<label class="control-label">'.__('Confirm Password').'</label><div class="controls">',
                        'after'=>$this->Form->error('password2', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                ?>
                <div class="page-header">
                    <h3><?php echo __('Personal Information');?></h3>
                </div>
                <?php
                    echo $this->Form->input('Customer.first_name', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('First Name').'</label><div class="controls">',
                        'after'=>$this->Form->error('first_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.last_name', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Last Name').'</label><div class="controls">',
                        'after'=>$this->Form->error('last_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.company', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Company').'</label><div class="controls">',
                        'after'=>$this->Form->error('company', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.company_address', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Company Address').'</label><div class="controls">',
                        'after'=>$this->Form->error('company_address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.tax_no', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Tax No').'</label><div class="controls">',
                        'after'=>$this->Form->error('tax_no', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.website', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Website').'</label><div class="controls">',
                        'after'=>$this->Form->error('website', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.fax', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Fax').'</label><div class="controls">',
                        'after'=>$this->Form->error('fax', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('Customer.phone', array('div'=>'control-group',
                        'before'=>'<label class="control-label">'.__('Phone').'</label><div class="controls">',
                        'after'=>$this->Form->error('phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                        'error' => array('attributes' => array('style' => 'display:none')),
                        'label'=>false, 'class'=>'input-xlarge'));
                ?>
            </div>
            <div class="tab-pane" id="2">
                <div class="page-header">
                    <h3><?php echo __('Checkout Address');?></h3>
                </div>
                <?php
                    echo $this->Form->input('CheckoutAddress.first_name', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('First Name').'</label><div class="controls">',
                                            'after'=>$this->Form->error('first_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.last_name', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Last Name').'</label><div class="controls">',
                                            'after'=>$this->Form->error('last_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.phone', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Phone').'</label><div class="controls">',
                                            'after'=>$this->Form->error('phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.address', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Address').'</label><div class="controls">',
                                            'after'=>$this->Form->error('address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.ward', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Ward').'</label><div class="controls">',
                                            'after'=>$this->Form->error('ward', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.district', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('District').'</label><div class="controls">',
                                            'after'=>$this->Form->error('district', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.city', array('div'=>'control-group','placeholder'=>'','options'=>$vietnamCity, 'value'=>52,
                                            'before'=>'<label>'.__('City').'</label><div class="controls">',
                                            'after'=>$this->Form->error('city', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                    echo $this->Form->input('CheckoutAddress.is_delivery_address', array('div'=>'control-group','placeholder'=>'', 'id'=>'is_delivery_address',
                                            'before'=>'<label>'.__('Delivery Address').'</label><div class="controls">',
                                            'after'=>$this->Form->error('is_delivery_address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'&nbsp;'.__('The same checkout address').'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
                ?>
                <div class="page-header">
                    <h3><?php echo __('Delivery Address');?></h3>
                </div>
                <?php           
                    echo $this->Form->input('DeliveryAddress.phone', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Phone').'</label><div class="controls">',
                                            'after'=>$this->Form->error('phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.address', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Address').'</label><div class="controls">',
                                            'after'=>$this->Form->error('address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.ward', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Ward').'</label><div class="controls">',
                                            'after'=>$this->Form->error('ward', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.district', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('District').'</label><div class="controls">',
                                            'after'=>$this->Form->error('district', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));
                    echo $this->Form->input('DeliveryAddress.city', array('div'=>'control-group','placeholder'=>'','options'=>$vietnamCity, 'value'=>52,
                                            'before'=>'<label>'.__('City').'</label><div class="controls">',
                                            'after'=>$this->Form->error('city', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress'));            
                ?>
            </div>
        </div>
    </div> 
    <div class="form-actions">
        <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
        <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
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