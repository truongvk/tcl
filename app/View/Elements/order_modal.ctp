<?php
$vietnamCity = Configure::read('VietnamCities');
if(isset($order) && !empty($order)):
$orderId = $order['Order']['id'];

if(isset($showNormal)):
?>
<div id="cartModal<?php echo $order['Order']['id'];?>" style="">
    <div class="modal-header">       
        <h3><?php echo __('Your Cart');?></h3>
    </div>
<?php
else:
?>
<div id="cartModal<?php echo $order['Order']['id'];?>" class="modal hide fade" style="display: none; width:660px;">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo __('Your Cart');?></h3>
    </div>    
<?php
endif;
?>    
    
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
                        //$total = h($this->Number->currency($cart['total'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
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
                        
                    <?php     
                        if($order['Order']['ordertotal'] > 0 && ($order['Order']['shipping_fee'] > 0 || $order['Order']['fee_arising'] > 0)){
                            $ordertotal = h($this->Number->currency($order['Order']['ordertotal'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                    ?>
                        <tr>
                            <td colspan="4"><span class="pull-right"><?php echo __('Order Total');?></span></td>
                            <td  width="20%">
                                <h4 class="pull-right" style="margin-top: 5px"><?php echo $ordertotal;?></h4>
                            </td>
                        </tr>                                
                    <?php
                        }
                    ?>
                    <?php     
                        if($order['Order']['shipping_fee'] > 0){
                            $shipping_fee = h($this->Number->currency($order['Order']['shipping_fee'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                    ?>
                        <tr>                            
                            <td colspan="4"><span class="pull-right"><?php echo __('Shipping Fee');?></span></td>
                            <td  width="20%">
                                <h4 class="pull-right" style="margin-top: 5px"><?php echo $shipping_fee;?></h4>
                            </td>
                        </tr>                                
                    <?php
                        }
                    ?>
                    <?php     
                        if($order['Order']['fee_arising'] > 0){
                            $fee_arising = h($this->Number->currency($order['Order']['fee_arising'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));
                    ?>
                        <tr>
                            <td colspan="4"><span class="pull-right"><?php echo __('Fee Arising');?></span></td>
                            <td  width="20%">
                                <h4 class="pull-right" style="margin-top: 5px"><?php echo $fee_arising;?></h4>
                            </td>
                        </tr>                                
                    <?php
                        }
                    ?>
                        <tr>
                            <td colspan="4"><span class="pull-right"><?php echo __('Total');?></span></td>
                            <td  width="20%">
                            <?php $total = h($this->Number->currency($order['Order']['total'], ' VND', array('wholePosition'=>'after', 'places'=>0,'thousands'=>'.', 'decimals'=>',')));?>
                            <h4 class="pull-right" style="margin-top: 5px"><?php echo $total;?></h4>
                            </td>
                        </tr>
                    <?php     
                        if($order['Order']['published'] == 2){                            
                    ?>
                        <tr>
                            <td colspan="5"><p><span class="label label-important"><i class="icon-ban-circle icon-white"></i> <?php echo __('Cancel Order');?></span> <span class="label"><?php echo $order['Order']['cancel_reason'];?></span></p></td>
                        </tr>                                
                    <?php
                        }
                    ?>
                        
                        </tbody>
                    </table>                                        
                </div>                                    
                <?php 
                if(!empty($customer_info)):
                    $i=2;
                    $email = isset($customer_info['User']['email']) ?$customer_info['User']['email'] : null;
                    foreach($customer_info as $type => $info):                        
                        switch($type):
                            case 'Customer':
                                echo '<div class="tab-pane" id="'.$orderId.$type.'">';
                                echo '<table class="table table-bordered table-condensed">';
                                echo '    <tbody>';
                                echo '      <tr>';
                                echo '          <th width="1%" nowrap="">'.__('Email').'</th>';
                                echo '          <td>'.$email.'</td>';
                                echo '      </tr>';
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
<?php
if(!isset($showNormal)):
?>    
    <div class="modal-footer">
        <p>
            <a href="#" class="btn" data-dismiss="modal"><i class="icon-remove"></i> <?php echo __('Close');?></a>
        </p>
    </div>
<?php endif; ?>    
</div>
<?php endif; ?>