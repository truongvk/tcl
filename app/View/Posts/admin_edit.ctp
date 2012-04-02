<div class="posts form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Post', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Edit Post'); ?></li>
</ul>
<?php echo $this->Form->create('Post', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Title').'</label><div class="controls">',
					'after'=>$this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('body', array('div'=>'control-group', 'type'=>'textarea','placeholder'=>'',
					'before'=>'<label class="control-label">'.__('Body').'</label><div class="controls">',
					'after'=>$this->Form->error('body', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xxlarge'));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
