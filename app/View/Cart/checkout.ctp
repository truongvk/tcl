<?php echo $this->Html->script(array('sliding_form/sliding.form'), array());?>
<?php echo $this->Html->css(array('../js/sliding_form/style'), null, array('block' => 'css'));?>

<?php echo $this->element('front/breadscrumbs', array('data'=>array(array('name'=>__('Checkout')))));?>
<?php $vietnamCity = Configure::read('VietnamCities');?>
<div class="row">
    <div class="span12" style="">
        <div id="sliding-form-content">
            <div id="sliding-form-wrapper">
                <div id="navigation" style="display:none;">
                    <ul>
                        <li class="selected">
                            <a href="#"><?php echo __('Customer Information');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Checkout Information');?></a>
                        </li>
                     	<li>
                            <a href="#"><?php echo __('Confirm');?></a>
                        </li>
                    </ul>
                </div>
                <div id="steps">
                    <?php //echo $this->Form->create('User', array('class'=>'form-horizontal', 'id'=>'formElem', 'name'=>'formElem'));?>
                    <form id="formElem" name="formElem" action="<?php echo $this->Html->url('/cart/checkout/'.$IsCheckoutWithoutLogin);?>" method="post" class ="form-horizontal">
                        <fieldset class="step first-fieldset">
<!--                            <legend>Account</legend>-->
                            <div class="fieldset-content">
                                <div class="formInfo">
                                    <div class="page-header">
                                        <h3><?php echo __('Personal Information');?></h3>
                                    </div>
                                   <?php
                                    $readOnly = (isset($this->request->data['User']['email']) && !empty($this->request->data['User']['email'])) ? true : false;
                                    echo $this->Form->input('User.email', array('div'=>'control-group', 'readonly'=>$readOnly,
                                        'before'=>'<label class="control-label">'.__('Email').'</label><div class="controls">',
                                        'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('User.email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                        'error' => array('attributes' => array('style' => 'display:none')),
                                        'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('Customer.first_name', array('div'=>'control-group',
                                        'before'=>'<label class="control-label">'.__('First Name').'</label><div class="controls">',
                                        'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('Customer.first_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                        'error' => array('attributes' => array('style' => 'display:none')),
                                        'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('Customer.last_name', array('div'=>'control-group',
                                        'before'=>'<label class="control-label">'.__('Last Name').'</label><div class="controls">',
                                        'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('Customer.last_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                        'error' => array('attributes' => array('style' => 'display:none')),
                                        'label'=>false, 'class'=>'input-xlarge required'));
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
                                        'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('Customer.phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                        'error' => array('attributes' => array('style' => 'display:none')),
                                        'label'=>false, 'class'=>'input-xlarge required'));
                                ?>
                                </div>
                            </div>
                            <div class="form-actions" style="padding-left: 180px;">
                                <a class="btn btn-large btn-primary next-step" href="javascript:;;"><?php echo __('Next');?> <i class="icon-chevron-right icon-white"></i></a>
                            </div>
                        </fieldset>
                        <fieldset class="step">
                            <div class="fieldset-content hidden">
                                <div class="formInfo">
                                    <div class="page-header">
                                        <h3><?php echo __('Checkout Address');?></h3>
                                    </div>
                                <?php
                                      echo $this->Form->input('CheckoutAddress.first_name', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('First Name').'</label><div class="controls">',
                                                            'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('CheckoutAddress.first_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('CheckoutAddress.last_name', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Last Name').'</label><div class="controls">',
                                                            'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('CheckoutAddress.last_name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('CheckoutAddress.phone', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Phone').'</label><div class="controls">',
                                                            'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('CheckoutAddress.phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('CheckoutAddress.address', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Address').'</label><div class="controls">',
                                                            'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('CheckoutAddress.address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('CheckoutAddress.ward', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Ward').'</label><div class="controls">',
                                                            'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('CheckoutAddress.ward', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('CheckoutAddress.district', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('District').'</label><div class="controls">',
                                                            'after'=>'<span class="help-inline"><a rel="tooltip" title="'.__('Required field').'"><i class="icon-asterisk"></i></a></span>'.$this->Form->error('CheckoutAddress.district', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    echo $this->Form->input('CheckoutAddress.city', array('div'=>'control-group','placeholder'=>'','options'=>$vietnamCity, 'value'=>52,
                                                            'before'=>'<label>'.__('City').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('CheckoutAddress.city', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge required'));
                                    //$checked = (isset($this->data['DeliveryAddress']) && !empty($this->data['DeliveryAddress'])) ? false : true;
                                    echo $this->Form->input('CheckoutAddress.is_delivery_address', array('div'=>'control-group','placeholder'=>'', 'id'=>'is_delivery_address',
                                                            'before'=>'<label>'.__('Delivery Address').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('CheckoutAddress.is_delivery_address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'&nbsp;'.__('The same checkout address').'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge'));
                                    if( !isset($this->request->data['CheckoutAddress']) || (isset($this->request->data['CheckoutAddress']['is_delivery_address']) && intval($this->request->data['CheckoutAddress']['is_delivery_address']) > 0)){
                                        echo $this->Html->scriptBlock('$(function(){ $("#is_delivery_address").attr("checked", true); $("#is_delivery_address").trigger("change"); });', array('inline' => false, 'block' => 'scriptBottom'));
                                    }
                                ?>
                                </div>
                                <div class="formInfo">
                                    <div class="page-header">
                                        <h3><?php echo __('Delivery Address');?></h3>
                                    </div>
                                <?php
                                    echo $this->Form->input('DeliveryAddress.phone', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Phone').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('DeliveryAddress.phone', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress required'));
                                    echo $this->Form->input('DeliveryAddress.address', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Address').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('DeliveryAddress.address', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress required'));
                                    echo $this->Form->input('DeliveryAddress.ward', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('Ward').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('DeliveryAddress.ward', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress required'));
                                    echo $this->Form->input('DeliveryAddress.district', array('div'=>'control-group','placeholder'=>'',
                                                            'before'=>'<label>'.__('District').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('DeliveryAddress.district', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress required'));
                                    echo $this->Form->input('DeliveryAddress.city', array('div'=>'control-group','placeholder'=>'','options'=>$vietnamCity, 'value'=>52,
                                                            'before'=>'<label>'.__('City').'</label><div class="controls">',
                                                            'after'=>$this->Form->error('DeliveryAddress.city', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                                            'error' => array('attributes' => array('style' => 'display:none')),
                                                            'label'=>false, 'class'=>'input-xlarge DeliveryAddress required'));
                                ?>
                                </div>
                            </div>
                            <div class="form-actions" style="padding-left: 180px;">
                                <a class="btn btn-large prev-step" href="javascript:;;"><i class="icon-chevron-left"></i> <?php echo __('Back');?></a>
                                <a class="btn btn-large btn-primary" id="confirmStep" href="javascript:;;"><?php echo __('Next');?> <i class="icon-chevron-right icon-white"></i></a>
                            </div>
                        </fieldset>
                        <fieldset class="step">
                            <div class="fieldset-content hidden">
                                <div id="confirmInfo"></div>
                                <div class="page-header">
                                    <h3><?php echo __('Your Cart');?></h3>
                                </div>
                                <?php
                                if($cart->itemcount > 0):
                                ?>
                                <table class="table table-striped table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th style="text-align: center"><?php echo __('Product Name'); ?></th>
                                            <th style="text-align: center"><?php echo __('Quantity'); ?></th>
                                            <th style="text-align: right"><?php echo __('Price'); ?></th>
                                            <th style="text-align: right"><?php echo __('Sub-Total'); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    $total = h($this->Number->currency($cart->total, ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                                    foreach($cart->get_contents() as $item) {
                                        $price = h($this->Number->currency($item['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                                        $subtotal = h($this->Number->currency($item['subtotal'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                                        $thumb = 'http://placehold.it/80x80';
                                        if(isset($item['extra']['image']['name']) && !empty($item['extra']['image']['name'])):
                                            if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$item['extra']['image']['dir'].'/tiny_'.$item['extra']['image']['name'])){
                                                $thumb = $this->Html->url('/files/products/'.$item['extra']['image']['dir'].'/tiny_'.$item['extra']['image']['name']);
                                            }
                                        endif;
                                        $slug = (isset($item['extra']['slug'])) ? $item['extra']['slug'] : null;
                                ?>
                                    <tr>
                                        <td width="1%" nowrap><img src="<?php echo $thumb;?>"/></td>
                                        <td style="vertical-align: middle"><?php echo $this->Html->link($item['info'], array('controller'=>'products', 'action'=>'detail', $item['id'].'_'.$slug));?></td>
                                        <td style="vertical-align: middle; text-align: center"><?php echo $item['qty'];?></td>
                                        <td style="vertical-align: middle; text-align: right"><?php echo $price;?></td>
                                        <td style="vertical-align: middle; text-align: right"><?php echo $subtotal;?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                    <tr>
                                        <td colspan="5">
                                            <h4 class="pull-right" style="margin-top: 5px"><?php echo __('Total').': '.$total;?></h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <?php
                                endif;
                                ?>
                                <div class="form-actions" style="padding-left: 180px;">
                                    <a class="btn btn-large prev-step" href="javascript:;;"><i class="icon-chevron-left"></i> <?php echo __('Back');?></a>
                                    <a class="btn btn-large btn-primary" id="finishButton" href="javascript:;;"><i class="icon-ok icon-white"></i> <?php echo __('Finish');?></a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    $('a[rel="tooltip"]').tooltip();
    
    $('#is_delivery_address').bind('change', {}, function(){
        $obj = $(this);
        if($obj.is(':checked')){
            $('.DeliveryAddress').attr('disabled', true);
        }else{
            $('.DeliveryAddress').removeAttr('disabled');
        }
    });

    $(document).sliding_form ({
        smoke: smoke,
        validateMsg: '<?php echo __('Please correct the errors in the Form');?>'
    });
});
</script>