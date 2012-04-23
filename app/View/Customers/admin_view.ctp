<?php $vietnamCity = Configure::read('VietnamCities'); ?>
<div class="customers view">
<ul class="breadcrumb">
    <li>
        <?php echo $this->Html->link(__('Customer'), array('action'=>'index'));?>
        <span class="divider">/</span>
    </li>
    <li class="active"><?php echo __('View'); ?></li>
</ul>
<div class="tabbable">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#1" data-toggle="tab"><?php echo __('Personal Information');?></a></li>
        <li><a href="#2" data-toggle="tab"><?php echo __('Checkout Information');?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="1">
            <table class="table table-condensed table-bordered table-striped">            
            <tr>
                    <th><?php echo __('Email'); ?></th>
                    <td>
                            <?php echo $customer['User']['email']; ?>
                            &nbsp;
                    </td>
            </tr>
           <tr>
                    <th><?php echo __('First Name'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['first_name']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th><?php echo __('Last Name'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['last_name']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th><?php echo __('Company'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['company']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th width="1%" nowrap=""><?php echo __('Company Address'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['company_address']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th><?php echo __('Tax No'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['tax_no']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th><?php echo __('Website'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['website']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th><?php echo __('Fax'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['fax']); ?>
                            &nbsp;
                    </td>
            </tr>
            <tr>
                    <th><?php echo __('Phone'); ?></th>
                    <td>
                            <?php echo h($customer['Customer']['phone']); ?>
                            &nbsp;
                    </td>
            </tr>
            </table>
        </div>
        <div class="tab-pane" id="2">
            <?php
                    echo '<h3>'.__('Checkout Address').'</h3>';
                    echo '<table class="table table-bordered table-condensed table-striped">';
                    echo '    <tbody>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Customer Name').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['last_name'].' '.$customer['CheckoutAddress']['first_name'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Phone').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['phone'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Address').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['address'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Ward').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['ward'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('District').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['district'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('City').'</th>';
                    echo '          <td>'.$vietnamCity[$customer['CheckoutAddress']['city']].'</td>';
                    echo '      </tr>';
                    echo '    </tbody>';
                    echo '</table>';
                    
                    
                    echo '<h3>'.__('Delivery Address').'</h3>';
                    echo '<table class="table table-bordered table-condensed table-striped">';
                    echo '    <tbody>';                                                   
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Phone').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['phone'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Address').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['address'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('Ward').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['ward'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('District').'</th>';
                    echo '          <td>'.$customer['CheckoutAddress']['district'].'</td>';
                    echo '      </tr>';
                    echo '      <tr>';
                    echo '          <th width="1%" nowrap="">'.__('City').'</th>';
                    echo '          <td>'.$vietnamCity[$customer['CheckoutAddress']['city']].'</td>';
                    echo '      </tr>';
                    echo '    </tbody>';
                    echo '</table>';     
            ?>
        </div>
    </div>
</div>

</div>
