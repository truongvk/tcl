<div class="customerTypes form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('CustomerType', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Add Customer Type'); ?></li>
</ul>
<?php echo $this->Form->create('CustomerType', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Add Customer Type'); ?></legend>
	<?php
		echo $this->Form->input('name', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Name').'</label><div class="controls">',
					'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
