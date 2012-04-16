<?php echo $this->element('front/breadscrumbs', array('data'=>array(array('name'=>__('Activate Password')))));?>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal'));
?>
<div class="row">
    <div class="span7">
       <div class="page-header">
            <h3><?php echo __('Activate Password');?></h3>
        </div>
    </div>
    <div class="span5">
       <div class="page-header">
            <h3><?php echo __('Help');?></h3>
       </div>
    </div>
</div>
<?php //echo $this->element('social_connect', array(), array('plugin'=>'AclManagement'));?>
<div class="row">    
    <div class="span7">
        <?php
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
        <?php echo $this->Form->hidden('ident', array('value' => $ident)); ?>
        <?php echo $this->Form->hidden('activate', array('value' => $activate)); ?>        
    </div>
    <div class="span5">
      <p>
           <?php 
           $email = $this->requestAction('/global_config/setting2array/admin_email/1');
           echo __('Give us a call at %s or shoot us an email at %s', Configure::read('Settings.contact_phone.value'), $email[0]);  ?>
       </p>
    </div>
</div>
<div class="row">
    <div class="span7">
        <div class="control-group required">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <?php echo $this->Form->button(__('Submit'), array('class'=>'btn btn-primary', 'type'=>'submit', 'div'=>false));?>
                <?php echo $this->Form->button(__('Cancel'), array('class'=>'btn', 'type'=>'reset', 'div'=>false));?>
            </div>
        </div>
    </div>
    <div class="span5">
       
    </div>
</div>
<?php
echo $this->Form->end();
?>


