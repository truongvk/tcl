<div class="users form">
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Home', '/');?><span class="divider">/</span></li>
    <li class="active">Sign Up</li>
</ul>
<?php echo $this->element('social_connect', array(), array('plugin'=>'AclManagement'));?><br/>
<?php echo $this->Form->create('User', array('class'=>'form-horizontal'));?>
	<?php
            echo $this->Form->input('name', array('div'=>'control-group',
                'before'=>'<label class="control-label">'.__('Name').'</label><div class="controls">',
                'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
                'error' => array('attributes' => array('style' => 'display:none')),
                'label'=>false, 'class'=>'input-xlarge'));
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
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
        </div>
<?php echo $this->Form->end();?>
</div>
