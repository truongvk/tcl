<div class="orders form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Order', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Add Order'); ?></li>
</ul>
<?php echo $this->Form->create('Order', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('User Id').'</label><div class="controls">',
					'after'=>$this->Form->error('user_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('personal_information', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Personal Information').'</label><div class="controls">',
					'after'=>$this->Form->error('personal_information', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('cart_information', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Cart Information').'</label><div class="controls">',
					'after'=>$this->Form->error('cart_information', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('published', array('div'=>'control-group', 'type'=>'checkbox','placeholder'=>'',
					'before'=>'<label>'.__('Published').'</label><div class="controls">',
					'after'=>$this->Form->error('published', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>''));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
