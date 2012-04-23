<?php echo $this->Html->css(array('../js/treetable/jquery.treeTable.css'));?>
<?php echo $this->Html->script(array('treetable/jquery.treeTable.js'));?>
<script type="text/javascript">
$(document).ready(function()  {
  $("#table-properties").treeTable({expandable: false});
});
</script>
<?php echo $this->Form->create('Property', array('class'=>'form-horizontal well form-search'));?>
	<?php		
            echo $this->Form->input('category_id', array('div'=>'control-group','placeholder'=>'','empty'=>array('0'=>__('All')),'id'=>'CategoryId',
					'before'=>'<label>'.__('Category').'</label><div class="controls">',
					'after'=>$this->Form->error('category_id', array(), array('wrap' => 'span', 'class' => 'help-inline')).' '.$this->Form->submit(__('Search'), array('class'=>'btn', 'div'=>false)).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));                
	?>        
<?php echo $this->Form->end();?>    
<div class="properties">
	<table cellpadding="0" cellspacing="0" id="table-properties" class="table table-bordered table-condensed">
	<thead>
	<tr>
            <th class="header" ><?php echo __('Name');?></th>         
            <th class="header" style="width: 200px"><?php echo __('Category Name');?></th>
            <th class="header" style="text-align: center; width: 200px"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
        if(!empty($properties)):
            foreach ($properties as $property): 
            $rowId = "node-".$property['Property']['id'];
            $childClass = (intval($property['Property']['parent_id']) > 0) ? "child-of-node-".$property['Property']['parent_id'] : "";
        ?>
	<tr id="<?php echo $rowId;?>" class="<?php echo $childClass;?>">
		<td><?php echo $property['Property']['name'];//$this->Html->link($property['Property']['name'], array('controller' => 'properties', 'action' => 'index', $property['Property']['id']));  ?>&nbsp;</td>
		<td>
                    <?php 
                    if((intval($property['Property']['parent_id']) == 0)){
                        echo $this->Html->link($property['Category']['name'], array('controller' => 'categories', 'action' => 'edit', $property['Category']['id'])); 
                    }
                    ?>
		</td>
		<td style="text-align: center">			
                    <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $property['Property']['id'])); ?></span>
                    <span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $property['Property']['id']), null, __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?></span>
		</td>
	</tr>
	<?php 
            endforeach; 
        else:
        ?>
        <tr><td colspan="3"><?php echo __('No data found');?></td></tr>
        <?php    
        endif; 
        ?>
	</tbody>
	</table>	
</div>
