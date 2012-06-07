<?php echo $this->Html->script(array('jquery/jquery-ui/jquery-ui-datepicker.min.js'), array('block' => 'scriptBottom'));?>
<?php echo $this->Html->css(array('jquery.ui/jquery-ui-1.8.19.custom.css', 'jquery.ui/custom.css'), null,  array('block' => 'scriptBottom'));?>
<style>
.tab-content .table tbody tr:nth-child(2n+1) td, .tab-content .table tbody tr:nth-child(2n+1) th {
    background-color: #ffffff;
}
</style>
<?php echo $this->Form->create('Order', array('class'=>'well form-search'));?>
    <?php
    echo $this->Form->input('customer_type', array('div'=>false,'placeholder'=>__('Name'), 'options'=>$customer_types, 'empty'=>__('Customer Type'),
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    echo $this->Form->input('status', array('div'=>false,'placeholder'=>__('Status'), 'options'=>array('-'=>__('UnResolve'), '1'=>__('Resolve')), 'empty'=>__('Status'),
                            'error' => array('attributes' => array('style' => 'display:none')),
                            'after'=>'&nbsp;',
                            'label'=>false, 'class'=>'input-medium search-query'));
    echo $this->Form->input('customer_name', array('div'=>false,'placeholder'=>__('Customer Name'),
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

    <button class="btn btn-info" type="submit">Search</button>
<?php echo $this->Form->end();?>

<?php
if(isset($conditions)){
    $this->passedArgs = array_merge($this->passedArgs, array('conditions'=>$conditions));
    $this->Paginator->options(array('url' => $this->passedArgs));
}
?>

<div class="orders">
	<table cellpadding="0" cellspacing="0" id="table-orders" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
            <th class="header" ><?php echo $this->Paginator->sort('id', __('OrderID'));?></th>
            <th class="header" ><?php echo $this->Paginator->sort('user_id', __('Customer Name'));?></th>
            <th class="header" style="text-align: center"><?php echo $this->Paginator->sort('created', __('Order Date'));?></th>
            <th class="header" style="text-align: center"><?php echo $this->Paginator->sort('published', __('Resolve?'));?></th>
            <th class="header" style="text-align: center"><?php echo __('Actions');?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($orders as $order):
            $orderId = $order['Order']['id'];
            $customer_name = '';
            if($order['Order']['user_id'] == 0){
                $customer_info = unserialize($order['Order']['personal_information']);
                $customer_name = $customer_info['Customer']['last_name'].' '.$customer_info['Customer']['first_name'];
            }else{
                $customer_name = $order['Customer']['last_name'].' '.$order['Customer']['first_name'];
            }

            if(!(trim($customer_name))){
                $customer_name = $order['User']['email'];
            }
        ?>
	<tr id='<?php echo $orderId;?>'>
		<td>
                    <?php
                    echo $order['Order']['id'];
                    ?>
                </td>
		<td>
                    <?php
                    echo $customer_name;

                    echo $this->element('order_modal', array('order'=>$order));
                    ?>
                </td>
                <td style="text-align: center"><?php echo h(date('d/m/Y H:i', strtotime($order['Order']['created']))); ?>&nbsp;</td>
		<td style="text-align: center">
		<span style="cursor: pointer">
		<?php
                 switch($order['Order']['published']):
                     case 0:
                         echo "<a href='#' rel='tooltip' title='".__('UnResolve')."'><i class='icon-refresh'></i></a>";
                     break;
                     case 1:
                         echo "<a href='#' rel='tooltip' title='".__('Resolve')."'><i class='icon-ok'></i></a>";
                     break;
                     case 2:
                         echo "<a href='#' rel='tooltip' title='".__('Cancel Order')."'><i class='icon-remove'></i></a>";
                     break;
                 endswitch;
                ?>
		</span>&nbsp;
		</td>
		<td style="text-align: center">
			<span class="label label-info link-white" style="cursor: pointer" onclick="$('#cartModal<?php echo $order['Order']['id'];?>').modal('show');"><i class="icon-zoom-in icon-white"></i> <?php echo __('View'); ?></span>
                        <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $order['Order']['id'])); ?></span>
			<span class="label label-important link-white"><i class="icon-trash icon-white"></i> <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $order['Order']['id']), null, __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?></span>
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
<script type="text/javascript">
	var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };
	$(document).ready(function(){
		$('.asc').closest('th').addClass('headerSortDown');
		$('.desc').closest('th').addClass('headerSortUp');
	});

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
</div>
