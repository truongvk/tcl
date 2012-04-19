<div class="emailMarketings form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('EmailMarketing', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Edit Email Marketing'); ?></li>
</ul>
<?php echo $this->Form->create('EmailMarketing', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Email Marketing'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('customer_type_id', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Customer Type Id').'</label><div class="controls">',
					'after'=>$this->Form->error('customer_type_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('title', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Title').'</label><div class="controls">',
					'after'=>$this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('content', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Content').'</label><div class="controls">',
					'after'=>$this->Form->error('content', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
