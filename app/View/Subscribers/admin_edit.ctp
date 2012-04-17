<div class="subscribers form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Subscriber', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Edit Subscriber'); ?></li>
</ul>
<?php echo $this->Form->create('Subscriber', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Subscriber'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('email', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Email').'</label><div class="controls">',
					'after'=>$this->Form->error('email', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
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
