<?php echo $this->element('front/breadscrumbs', array('data'=>array(array('name'=>__('Login')))));?>
<?php
echo $this->Form->create('User', array('action' => 'login', 'class'=>'form-horizontal'));
?>
<div class="row">
    <div class="span7">
       <div class="page-header">
            <h3><?php echo __('Login');?></h3>
        </div>
    </div>
    <div class="span5">
       <div class="page-header">
            <h3><?php echo __('Register');?></h3>
       </div>
    </div>
</div>
<?php //echo $this->element('social_connect', array(), array('plugin'=>'AclManagement'));?>
<div class="row">    
    <div class="span7">
        <?php
//            if($this->Session->read('Auth.User')):
//                echo '<p>You are currently login '.$this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')).'</p>';
//            endif;
        ?>
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
    </div>
    <div class="span5">
       <p><?php echo __('If you are not a member of TCL. Please click here to register');?></p>
       <p><a href="<?php echo $this->Html->url('/users/register');?>" class="btn btn-info"><i class="icon-user icon-white"></i> <?php echo __('Register');?></a></p>
    </div>
</div>
<div class="row">
    <div class="span7">
        <div class="control-group required">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
                <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>                
            </div>
        </div>
        <div class="control-group required">
            <label class="control-label">&nbsp;</label>
            <div class="controls">
                <p>
                    <?php echo $this->Html->link(__('Forgot password ?'), '/users/forgot_password', array('class'=>'', 'div'=>false));?>
                </p>
            </div>
        </div>
    </div>
    <div class="span5">
       <?php if(intval($shoppingCart->itemcount) > 0): ?>
           <div class="page-header">
                <h3><?php echo __('Purchase without register');?></h3>
           </div>
           <p><?php echo __('If you want purchase, but don\'t want become a member of TCL. Please click here');?></p>
           <p><a href="<?php echo $this->Html->url('/cart/checkout/nologin');?>" class="btn btn-info"><i class="icon-shopping-cart icon-white"></i> <?php echo __('Checkout');?></a></p>
       <?php endif; ?>
    </div>
</div>
<?php
echo $this->Form->end();
?>


