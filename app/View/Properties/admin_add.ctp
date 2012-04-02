<?php echo $this->Html->script(array(
        'jquery/cloneform/jquery.cloneform'
    ));?>
<div class="properties form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link('Property', array('action'=>'index'));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Add Property'); ?></li>
</ul>
<?php echo $this->Form->create('Property', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Add Property'); ?></legend>
	<?php
		echo $this->Form->input('category_id', array('div'=>'control-group','placeholder'=>'','empty'=>array('0'=>__('Select Category')),'id'=>'CategoryId',
					'before'=>'<label>'.__('Category').'</label><div class="controls">',
					'after'=>$this->Form->error('category_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
                echo $this->Form->input('parent_id', array('div'=>'control-group','placeholder'=>'','empty'=>array('0'=>__('Select Property')),'id'=>'PropertyList',
					'before'=>'<label>'.__('Property').'</label><div class="controls">',
					'after'=>$this->Form->error('parent_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('name', array('div'=>'control-group clonable','placeholder'=>'','name'=>'data[Property][name][]',
					'before'=>'<label>'.__('Name').'</label><div class="controls">',
					'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));		
	?>
        <div class="control-group"><label>&nbsp;</label>
            <div class="controls">
                <a class="btn btn-small btn-info" id="addnew" href="javascript:;;"><i class="icon-plus icon-white"></i></a>
            </div>
        </div>
        <span id="cloneContainer"></span>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>
            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
<script type="text/javascript">
$(function(){
    $("#CategoryId").change(function(){
        category_id = $(this).val();
        $("#PropertyList").empty();
        $("#PropertyList").append($("<option></option>").attr("value","0").text("<?php echo __('Select Property');?>"));
        var randomnumber=Math.floor(Math.random()*100000000);
        $.get('<?php echo $this->Html->url('/properties/getListPropertiesByCategory/');?>'+category_id,{
            rand:randomnumber
        },
        function(data){
            data = jQuery.parseJSON(data);//alert(data.title);return;
            $.each(data, function(i,item){
                $("#PropertyList").append($("<option></option>").attr("value",i).text(item));
            });
        });
    });

    $("#addnew").click(function(){
        var yourclass=".clonable"; //The class you have used in your form
        var clonecount = $(yourclass).length; //how many clones do we already have?
        var newid = Number(clonecount) + 1; //Id of the new clone
        $(yourclass+":first").fieldclone({//Clone the original elelement
            newid_: newid, //Id of the new clone, (you can pass your own if you want)
            target_: $("#cloneContainer"), //where do we insert the clone? (target element)
            insert_: "before" //where do we insert the clone? (after/before/append/prepend...)
            //limit_: config.maximumNumOfAnswers //Maximum Number of Clones
        });
        //return false;
    });
});
</script>