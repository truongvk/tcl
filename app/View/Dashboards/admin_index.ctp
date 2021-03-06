<?php echo $this->Html->script(array(
        'jquery/json2',
        'jquery/tablednd/jquery.tablednd'        
    ));
echo $this->element('google_analytics', array('flot_data_views'=>$flot_data_views, 'flot_data_visits'=>$flot_data_visits));
?>
<div class="row">
<div class="span12">
<h3><?php echo __('New Order');?></h3><hr/>
<div class="practiceTests">
    <table cellpadding="0" cellspacing="0" id="practice_table" class="table table-striped table-bordered table-condensed">
        <thead>
        <tr>
            <th class="header" width="170px"><?php echo __('OrderID');?></th>
            <th class="header"><?php echo __('Customer Name');?></th>
            <th class="header" style="text-align: center; width:150px"><?php echo __('Resolve?');?></th>
            <th class="header" style="text-align: center; width:150px"><?php echo __('Actions');?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(isset($orders)):
        foreach ($orders as $order):
            $customer_name = (!empty($order['Customer']['last_name']) && !empty($order['Customer']['first_name'])) 
                            ? $order['Customer']['last_name'].' '.$order['Customer']['first_name']
                            : $order['User']['email'];
        
            $customer_name = ($order['Order']['user_id'] == 0) ? __('Anonymous Guest') : $customer_name;
        ?>
        <tr id="<?php echo $order['Order']['id']; ?>">
            <td>                
               <?php echo $order['Order']['id']; ?>
            </td>
            <td>                
                <?php if(!empty($customer_name)): ?><?php echo h($customer_name); ?><?php endif; ?>
                <?php echo $this->element('order_modal', array('order'=>$order));?>
                <span class="label link-white" style="cursor: pointer"><i class="icon-time icon-white"></i> <?php echo date('d/m/Y H:i', strtotime($order['Order']['created'])); ?></span>
            </td>
            <td style="text-align: center">
                <span style="cursor: pointer">
                <?php
                /*
                switch ($order['Order']['published']){               
                    case 1:
                        echo '<a rel="tooltip" href="javascript:;;" data-original-title="'.__('Resolve').'">';
                        echo $this->Html->image('icons/allow-' . intval($order['Order']['published']) . '.png',
                                array('onclick' => 'published.toggle("status-'.$order['Order']['id'].'",
                                        "'.$this->Html->url(array('action'=>'toggle', $order['Order']['id'], (int)$order['Order']['published'], "published")).'");',
                                        'id' => 'status-'.$order['Order']['id']
                        ));
                        echo '</a>';
                    break;
                    case 0:
                        echo '<a rel="tooltip" href="javascript:;;" data-original-title="'.__('UnResolve').'">';
                        echo $this->Html->image('icons/allow-' . intval($order['Order']['published']) . '.png',
                                array('onclick' => 'published.toggle("status-'.$order['Order']['id'].'",
                                        "'.$this->Html->url(array('action'=>'toggle', $order['Order']['id'], (int)$order['Order']['published'], "published")).'");',
                                        'id' => 'status-'.$order['Order']['id']
                        ));
                        echo '</a>';
                    break;
                }         
                 * 
                 */      
                ?>
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
            <td>
                <span class="label label-info link-white" style="cursor: pointer" onclick="$('#cartModal<?php echo $order['Order']['id'];?>').modal('show');"><i class="icon-zoom-in icon-white"></i> <?php echo __('View'); ?></span>
                <span class="label label-warning link-white"><i class="icon-edit icon-white"></i> <?php echo $this->Html->link(__('Edit'), array('controller'=>'orders', 'action' => 'edit', $order['Order']['id'])); ?></span>
            </td>
        </tr>
        <?php 
        endforeach; 
        endif; 
        ?>
        </tbody>
    </table>
</div>
</div>
<?php /*
<div class="span6">
<h3><?php echo __('New Member')?></h3><hr/>
<div class="practiceTests">
    <table cellpadding="0" cellspacing="0" id="practice_table" class="table table-striped table-bordered table-condensed">
        <thead>
        <tr>
            <th class="header"><?php echo __('Customer Name');?></th>
            <th class="header" style="text-align: center; width:150px"><?php echo __('Created');?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($users as $user):
            $customer_name = (!empty($user['Customer']['last_name']) && !empty($user['Customer']['first_name'])) 
                            ? $user['Customer']['last_name'].' '.$user['Customer']['first_name']
                            : $user['User']['email'];            
        ?>
        <tr id="<?php echo $user['User']['id']; ?>">
            <td>
                <?php echo h($customer_name); ?>
                <a href="<?php echo $this->Html->url(array('controller'=>'customers', 'action' => 'view', $user['User']['id']));?>" target="_blank">
                    <span class="label label-info link-white" style="cursor: pointer"><i class="icon-zoom-in icon-white"></i> <?php echo __('View'); ?></span>                    
                </a>
            </td>
            <td style="text-align: center">
                 <?php echo h($user['User']['created']); ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
  */ ?> 
</div>

<script type="text/javascript">
    var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };


    $(function () {
        $("a[rel=tooltip]").tooltip('hide');

        $("a[rel=popover]")
        .popover({
            offset: 10
        })
//        .click(function(e) {
//            e.preventDefault()
//        })
    });
</script>