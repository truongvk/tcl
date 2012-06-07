<?php echo $this->Html->script(array('jquery/jquery.numeric', 'jquery/jquery.formatCurrency-1.4.0.min'));?>
<div class="orders form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Order', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Edit Order'); ?></li>
</ul>
<?php echo $this->Form->create('Order', array('class'=>'form-horizontal', 'id'=>'theForm'));?>
	<fieldset>
		<legend><?php echo __('Edit Order'); ?></legend>
                <div class="control-group"><label><?php echo __('Order Total')?></label>
                    <div class="controls">
                        <p style="margin-top: 5px;" id="ordertotal" val="<?php echo $this->request->data['Order']['ordertotal'];?>">
                        <?php
                        $ordertotal = h($this->Number->currency($this->request->data['Order']['ordertotal'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                        echo $ordertotal;
                        ?>
                        </p>
                    </div>
                </div>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->hidden('ordertotal');
                echo $this->Form->input('shipping_fee', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Shipping Fee').'</label><div class="controls">',
                                            'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge numeric'));
                echo $this->Form->input('fee_arising', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Fee Arising').'</label><div class="controls">',
                                            'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge numeric'));
        ?>
                <hr>
                <div class="control-group"><label><?php echo __('Total')?></label>
                    <div class="controls">
                        <p style="margin-top: 5px;" id="total">
                        <?php
                        $total = h($this->Number->currency($this->request->data['Order']['total'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                        echo $total;
                        ?>
                        </p>
                    </div>
                </div>
        <?php
                echo $this->Form->input('note', array('div'=>'control-group','placeholder'=>'',
                                            'before'=>'<label>'.__('Note').'</label><div class="controls">',
                                            'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                                            'error' => array('attributes' => array('style' => 'display:none')),
                                            'label'=>false, 'class'=>'input-xlarge'));
	?>
        <div class="control-group">
            <label class="control-label"><?php echo __('Status');?></label>
            <div class="controls">
                <label class="radio">
                <input type="radio" value="0" class="" placeholder="" id="OrderPublished0" name="data[Order][published]"><?php echo __('UnResolve');?>
                </label>
                <label class="radio">
                <input type="radio" value="1" class="" placeholder="" id="OrderPublished1" name="data[Order][published]"><?php echo __('Resolve');?>
                </label>
                <label class="radio">
                <input type="radio" value="2" class="" placeholder="" id="OrderPublished2" name="data[Order][published]"><?php echo __('Cancel Order');?>
                </label>
                <?php
                $showhide = ($this->request->data['Order']['published'] == 2) ? 'display:block' : 'display:none';
                echo $this->Form->input('cancel_reason', array('div'=>false, 'placeholder'=>__('Cancel Reason'), 'style'=>$showhide,'id'=>'cancel_reason',
                                            'label'=>false, 'class'=>'input-xlarge'));
                ?>
            </div>
        </div>

        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
        <?php echo $this->element('order_modal', array('order'=>$this->request->data, 'showNormal'=>true));?>
<?php echo $this->Form->end();?>
</div>
<script type="text/javascript">
$('#theForm input[name="data[Order][published]"]').each(function(){
    $obj = $(this);
    if($obj.val() == <?php echo intval($this->request->data['Order']['published']);?>){
        $obj.attr('checked', true);
    }
});
$('#theForm input[name="data[Order][published]"]').change(function(){
    $obj = $(this);
    if($obj.val() == 2){
        $('#cancel_reason').show();
    }else{
        $('#cancel_reason').hide();
    }
});
$(document).ready(function(){
    $(".numeric").numeric({ decimal: false, negative: false }, function() { this.value = ""; this.focus(); });

    $(".numeric").bind("keyup keydown change blur", {}, function(){
        $total = parseFloat($('#ordertotal').attr('val'));
        $(".numeric").each(function(){
            $val = ($(this).val() != '') ? $(this).val() : 0;
            $total += parseFloat($val);
        });
        $('#total').html($total);
        $('#total').formatCurrency({'symbol':'', 'digitGroupSymbol' : '.', 'decimalSymbol' : ',', 'roundToDecimalPlace' : 0});
    });
});
</script>
