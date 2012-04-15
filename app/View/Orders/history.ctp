<style>
.tab-content .table tbody tr:nth-child(2n+1) td, .tab-content .table tbody tr:nth-child(2n+1) th {
    background-color: #ffffff;    
}    
</style>
<?php echo $this->element('front/breadscrumbs', array('data'=>array(array('name'=>__('Order History')))));?>
<?php $vietnamCity = Configure::read('VietnamCities');?>
<div class="orders">
	<table cellpadding="0" cellspacing="0" id="table-orders" class="table table-striped table-bordered table-condensed">
	<thead>
	<tr>
            <th class="header" ><?php echo $this->Paginator->sort('Order.id', __('Order ID'));?></th>
            <th class="header" style="text-align: center"><?php echo $this->Paginator->sort('created', __('Order Date'));?></th>            
            <th class="header" style="text-align: center"><?php echo __('Review');?></th>            
	</tr>
	</thead>
	<tbody>
	<?php
	foreach ($orders as $order):
            $orderId = $order['Order']['id'];            
        ?>
	<tr id='<?php echo $orderId;?>'>
		<td>
                    <?php
                    echo $orderId;
                    ?>                    
                    <div id="cartModal<?php echo $order['Order']['id'];?>" class="modal hide fade" style="display: none; ">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">×</a>
                            <h3><?php echo __('Order');?></h3>
                        </div>
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#<?php echo $orderId;?>1" data-toggle="tab"><?php echo __('Cart Information');?></a></li>
                                    <?php 
                                    $customer_info = unserialize($order['Order']['personal_information']); 
                                    if(!empty($customer_info)):
                                        foreach($customer_info as $type => $info):
                                            switch($type):
                                                case 'Customer':
                                                    echo '<li><a href="#'.$orderId.$type.'" data-toggle="tab">'.__('Customer Info').'</a></li>';
                                                break;
                                                case 'CheckoutAddress':
                                                    echo '<li><a href="#'.$orderId.$type.'" data-toggle="tab">'.__('Checkout Address').'</a></li>';
                                                break;
                                                case 'DeliveryAddress':
                                                    echo '<li><a href="#'.$orderId.$type.'" data-toggle="tab">'.__('Delivery Address').'</a></li>';
                                                break;
                                                default:
                                                    continue;
                                                break;
                                            endswitch;                                            
                                        endforeach;
                                    endif;
                                    ?>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="<?php echo $orderId;?>1">
                                        <table class="table table-striped table-bordered table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th style="text-align: center"><?php echo __('Product Name'); ?></th>
                                                    <th style="text-align: center"><?php echo __('Quantity'); ?></th>
                                                    <th style="text-align: right"><?php echo __('Price'); ?></th>
                                                    <th style="text-align: right"><?php echo __('Sub-Total'); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            $cart = unserialize($order['Order']['cart_information']);
                                            $total = h($this->Number->currency($cart['total'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                                            foreach($cart as $idx => $item) {
                                                if(!is_numeric($idx)){
                                                    continue;
                                                }

                                                $price = h($this->Number->currency($item['price'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                                                $subtotal = h($this->Number->currency($item['subtotal'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                                                $thumb = 'http://placehold.it/80x80';
                                                if(isset($item['extra']['image']['name']) && !empty($item['extra']['image']['name'])):
                                                    if(fileExistsInPath(WWW_ROOT.DS.'/files/products/'.$item['extra']['image']['dir'].'/tiny_'.$item['extra']['image']['name'])){
                                                        $thumb = $this->Html->url('/files/products/'.$item['extra']['image']['dir'].'/tiny_'.$item['extra']['image']['name']);
                                                    }
                                                endif;
                                                $slug = (isset($item['extra']['slug'])) ? $item['extra']['slug'] : null;
                                        ?>
                                            <tr>
                                                <td width="1%" nowrap><img src="<?php echo $thumb;?>"/></td>
                                                <td style="vertical-align: middle"><?php echo $this->Html->link($item['info'], array('admin'=>false,'controller'=>'products', 'action'=>'detail', $item['id'].'_'.$slug));?></td>
                                                <td style="vertical-align: middle; text-align: center"><?php echo $item['qty'];?></td>
                                                <td style="vertical-align: middle; text-align: right"><?php echo $price;?></td>
                                                <td style="vertical-align: middle; text-align: right"><?php echo $subtotal;?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                            <tr>
                                                <td colspan="5">
                                                    <h4 class="pull-right" style="margin-top: 5px"><?php echo __('Total').': '.$total;?></h4>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>                                        
                                    </div>                                    
                                    <?php 
                                    if(!empty($customer_info)):
                                        $i=2;
                                        foreach($customer_info as $type => $info):
                                            switch($type):
                                                case 'Customer':
                                                    echo '<div class="tab-pane" id="'.$orderId.$type.'">';
                                                    echo '<table class="table table-bordered table-condensed">';
                                                    echo '    <tbody>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Customer Name').'</th>';
                                                    echo '          <td>'.$info['last_name'].' '.$info['first_name'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Company').'</th>';
                                                    echo '          <td>'.$info['company'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Company Address').'</th>';
                                                    echo '          <td>'.$info['company_address'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Tax No').'</th>';
                                                    echo '          <td>'.$info['tax_no'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('website').'</th>';
                                                    echo '          <td>'.$info['website'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Fax').'</th>';
                                                    echo '          <td>'.$info['fax'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Phone').'</th>';
                                                    echo '          <td>'.$info['phone'].'</td>';
                                                    echo '      </tr>';
                                                    echo '    </tbody>';
                                                    echo '</table>';
                                                    echo '</div>';
                                                break;
                                                case 'CheckoutAddress':
                                                    echo '<div class="tab-pane" id="'.$orderId.$type.'">';
                                                    echo '<table class="table table-bordered table-condensed">';
                                                    echo '    <tbody>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Customer Name').'</th>';
                                                    echo '          <td>'.$info['last_name'].' '.$info['first_name'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Phone').'</th>';
                                                    echo '          <td>'.$info['phone'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Address').'</th>';
                                                    echo '          <td>'.$info['address'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Ward').'</th>';
                                                    echo '          <td>'.$info['ward'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('District').'</th>';
                                                    echo '          <td>'.$info['district'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('City').'</th>';
                                                    echo '          <td>'.$vietnamCity[$info['city']].'</td>';
                                                    echo '      </tr>';
                                                    echo '    </tbody>';
                                                    echo '</table>';
                                                    echo '</div>';
                                                break;
                                                case 'DeliveryAddress':
                                                    echo '<div class="tab-pane" id="'.$orderId.$type.'">';
                                                    echo '<table class="table table-bordered table-condensed">';
                                                    echo '    <tbody>';                                                   
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Phone').'</th>';
                                                    echo '          <td>'.$info['phone'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Address').'</th>';
                                                    echo '          <td>'.$info['address'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('Ward').'</th>';
                                                    echo '          <td>'.$info['ward'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('District').'</th>';
                                                    echo '          <td>'.$info['district'].'</td>';
                                                    echo '      </tr>';
                                                    echo '      <tr>';
                                                    echo '          <th width="1%" nowrap="">'.__('City').'</th>';
                                                    echo '          <td>'.$vietnamCity[$info['city']].'</td>';
                                                    echo '      </tr>';
                                                    echo '    </tbody>';
                                                    echo '</table>';
                                                    echo '</div>';
                                                break;
                                                default:
                                                    continue;
                                                break;
                                            endswitch;                                            
                                            $i++;
                                        endforeach;
                                    endif;
                                    ?>                                    
                                    <div class="tab-pane" id="<?php echo $orderId;?>2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <p>
                                <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> <?php echo __('Close');?></a>
                            </p>
                        </div>
                    </div>
                </td>
                <td style="text-align: center"><?php echo h(date('d/m/Y H:i:s', strtotime($order['Order']['created']))); ?>&nbsp;</td>
                <td style="text-align: center">
			<span class="label label-info link-white" style="cursor: pointer" onclick="$('#cartModal<?php echo $order['Order']['id'];?>').modal('show');"><i class="icon-zoom-in icon-white"></i> <?php echo __('View'); ?></span>
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
</script>
</div>
