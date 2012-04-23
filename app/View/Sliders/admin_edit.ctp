<div class="sliders form">
<ul class="breadcrumb">
    <li>
        <?php echo $this->Html->link(__('Slider'), array('action'=>'index'));?>
        <span class="divider">/</span>
    </li>
    <li class="active"><?php echo __('Edit Slider'); ?></li>
</ul>
<?php echo $this->Form->create('Slider', array('class'=>'form-horizontal','type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Edit Slider'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Title').'</label><div class="controls">',
					'after'=>$this->Form->error('title', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('description', array('div'=>'control-group', 'type'=>'textarea','placeholder'=>'',
					'before'=>'<label class="control-label">'.__('Description').'</label><div class="controls">',
					'after'=>$this->Form->error('description', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xxlarge'));
                echo $this->Form->input('url', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('URL').'</label><div class="controls">',
					'after'=>$this->Form->error('url', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));                
		echo $this->Form->input('photo', array('div'=>'control-group','placeholder'=>'','type'=>'file',
					'before'=>'<label>'.__('Photo').'</label><div class="controls">',
					'after'=>$this->Form->error('photo', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
                echo $this->Form->input('photo_dir', array('type' => 'hidden'));              
                
                
		echo $this->Form->input('published', array('div'=>'control-group', 'type'=>'checkbox','placeholder'=>'',
					'before'=>'<label>'.__('Published').'</label><div class="controls">',
					'after'=>$this->Form->error('published', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>''));
                
                $image = null;
                if(fileExistsInPath(WWW_ROOT.DS.'/files/sliders/'.$this->data['Slider']['photo_dir'].'/big_'.$this->data['Slider']['photo'])):
                    $image = $this->Html->image('../files/sliders/'.$this->data['Slider']['photo_dir'].'/big_'.$this->data['Slider']['photo']);
                endif;
                if($image != null):
                    echo "<div class=\"control-group\"><label>&nbsp;</label>
                        <div class=\"controls\"><div class='row'><div class='span4'><div class='thumbnail'>";
                    echo $image;
                    echo "</div></div></div></div></div>";
                endif;                
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
