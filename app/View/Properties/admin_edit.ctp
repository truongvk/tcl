<div class="properties form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Property', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Edit Property'); ?></li>
</ul>
<?php echo $this->Form->create('Property', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Edit Property'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id', array('div'=>'control-group','placeholder'=>'','empty'=>array('0'=>__('Select Category')),
					'before'=>'<label>'.__('Category').'</label><div class="controls">',
					'after'=>$this->Form->error('category_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge','id'=>'CategoryId'));
                echo $this->Form->input('parent_id', array('div'=>'control-group','placeholder'=>'','empty'=>array('0'=>__('Select Property')),
					'before'=>'<label>'.__('Parent').'</label><div class="controls">',
					'after'=>$this->Form->error('parent_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge','id'=>'PropertyList'));                
		echo $this->Form->input('name', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label>'.__('Name').'</label><div class="controls">',
					'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
                echo $this->Form->input('slug', array('div'=>'control-group clonable','placeholder'=>__('No need input. You can modify later.'),
					'before'=>'<label>'.__('Slug').'</label><div class="controls">',
					'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?> 
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        
        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
<script type="text/javascript">
$(function(){    
    var propertyId = '<?php echo $this->data['Property']['parent_id'];?>';
    $("#CategoryId").bind('change', {}, function(){
        category_id = $(this).val();
        $("#PropertyList").empty();
        $("#PropertyList").append($("<option></option>").attr("value","0").text("<?php echo __('Select Property');?>"));
        var randomnumber=Math.floor(Math.random()*100000000);
        $.get('<?php echo $this->Html->url('/properties/getListPropertiesByCategory/');?>'+category_id,{
            rand:randomnumber
        },
        function(data){
            data = jQuery.parseJSON(data);
            $.each(data, function(i,item){
                selected = (i==propertyId) ? 'selected' : '';
                $("#PropertyList").append($("<option "+selected+"></option>").attr("value",i).text(item));
            });        
        });    
    });
});
</script>
<?php if(isset($this->data['Property']['category_id']) && !empty($this->data['Property']['category_id'])){?>
<script type="text/javascript">
$(function(){    
    $("#CategoryId").trigger('change');
});
</script>
<?php } ?>