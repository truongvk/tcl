<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Home', '/');?><span class="divider">/</span></li>
    <li class="active">Sign In</li>
</ul>
<?php
echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-horizontal'));
?>
<?php echo $this->element('social_connect', array(), array('plugin'=>'AclManagement'));?><br/>
<div class="row">
    <div class="span2">&nbsp;</div>
    <div class="span5">
        <?php
            if($this->Session->read('Auth.User')):
                echo '<p>You are currently login '.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')).'</p>';
            endif;
        ?>
    </div>
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
?>

<div class="row">
<div class="span7">
    <div class="form-actions">
        <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
        <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>
    </div>
</div>
</div>
<?php
echo $this->Form->end();
?>


