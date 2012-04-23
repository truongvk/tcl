<?php echo $this->Html->script(array('jquery/jquery-ui/jquery-ui-datepicker.min.js'), array('block' => 'scriptBottom'));?>
<?php echo $this->Html->css(array('jquery.ui/jquery-ui-1.8.19.custom.css', 'jquery.ui/custom.css'), null,  array('block' => 'scriptBottom'));?>
<?php echo $this->Form->create('Customer', array('class'=>'well form-search'));?>
    <?php
    echo $this->Form->input('customer_type', array('div'=>false,'placeholder'=>__('Name'), 'options'=>$customer_types, 'empty'=>__('Customer Type'),
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    echo $this->Form->input('customer_name', array('div'=>false,'placeholder'=>__('Name'),
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    echo $this->Form->input('customer_email', array('div'=>false,'placeholder'=>__('Email'),
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    echo $this->Form->input('from', array('div'=>false,'placeholder'=>__('From Date'), 'id'=>'from',
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    echo $this->Form->input('to', array('div'=>false,'placeholder'=>__('To Date'), 'id'=>'to',
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    ?>    
    
    <button class="btn btn-info" type="submit"><?php echo __('Search');?></button>
<?php echo $this->Form->end();?>
    
<?php
if(isset($conditions)){
    $this->passedArgs = array_merge($this->passedArgs, array('conditions'=>$conditions));
    $this->Paginator->options(array('url' => $this->passedArgs));
}
?>
<div class="customers">
	<table cellpadding="0" cellspacing="0" id="table-customers" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
			<th class="header" ><?php echo $this->Paginator->sort('CustomerType.name', __('Customer Type'));?></th>
			<th class="header" ><?php echo $this->Paginator->sort('User.email', __('Email'));?></th>
			<th class="header" ><?php echo $this->Paginator->sort('first_name');?></th>
			<th class="header" ><?php echo $this->Paginator->sort('last_name');?></th>			
			<th class="header" ><?php echo $this->Paginator->sort('phone');?></th>
			<th class="header" style="text-align: center; width: 200px"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($customers as $customer): ?>
	<tr id='<?php echo $customer['Customer']['id'];?>'>
		<td><?php echo h($customer['CustomerType']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($customer['User']['email'], array('controller' => 'users', 'action' => 'view', $customer['User']['id'])); ?>
		</td>
		<td><?php echo h($customer['Customer']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($customer['Customer']['last_name']); ?>&nbsp;</td>		
		<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>
		<td style="text-align: center">
			<span class="label label-info link-white"><i class="icon-zoom-in icon-white"></i> <?php echo $this->Html->link(__('View'), array('action' => 'view', $customer['User']['id'])); ?></span>
			<span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('plugin'=>'acl_management', 'admin'=>true,'controller'=>'users','action' => 'editcustomer', $customer['User']['id'])); ?></span>
			<span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['User']['id']), null, __('Are you sure you want to delete # %s?', $customer['Customer']['first_name'])); ?></span>
		</td>
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="pagination">
		<p>
		<?php echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));?>		</p>
		<ul>
		<?php
		echo $this->Paginator->prev('&larr; ' . __('previous'), array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => '','tag' => 'li', 'before'=>'', 'after'=>''));
		echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape'=>false), null, array('tag' => 'li', 'escape'=>false, 'class' => 'next disabled'));
	?>
		</ul>
	</div>
</div>
<script type="text/javascript">
$(function() {
        var dates = $( "#from, #to" ).datepicker({
                dateFormat: 'dd/mm/yy',
                defaultDate: "+1w",                       
                changeMonth: false,
                numberOfMonths: 3,
                onSelect: function( selectedDate ) {
                        var option = this.id == "from" ? "minDate" : "maxDate",
                                instance = $( this ).data( "datepicker" ),
                                date = $.datepicker.parseDate(
                                        instance.settings.dateFormat ||
                                        $.datepicker._defaults.dateFormat,
                                        selectedDate, instance.settings );
                        dates.not( this ).datepicker( "option", option, date );
                }
        });
});    
</script>