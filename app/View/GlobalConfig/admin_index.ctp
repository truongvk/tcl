<form method="post" name="myForm" action="<?php echo $this->Html->url('/admin/global_config/index/'); ?>" >
    <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-condensed table-striped" id="tablelist">
        <thead>
            <tr class="tbl_header">
                <th width="20%"><?php echo __("key") ?></th>
                <th width="80%"><?php echo __("value") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $configs = Configure::read("Settings");
            $i = 0;
            foreach ($configs as $configKey => $configValue) {               
                $configValue['value'] = str_replace('\r\n', chr(13), $configValue['value']);
                $configValue['value'] = str_replace('\"', '"', $configValue['value']);
                $tip_desc = Sanitize::html($configValue['desc']);
                $tip_desc = str_replace('\r\n', '<br>', $tip_desc);
                $configValue['desc'] = str_replace('\r\n', chr(13), $configValue['desc']);
                $configValue['desc'] = str_replace('\"', '"', $configValue['desc']);
            ?>
            
            <tr id="configuration-<?php echo $configKey ?>">
                <td width="1" nowrap><a href="#" rel="tooltip" title="<?php echo $tip_desc;?>"><?php echo  $configKey ?></a></td>
                <td>
                    <?php echo  $this->Form->input("OldSettings." . $configKey, array("type"=>"textarea", "class"=>"input-xlarge", "value" => $configValue['value'], "rows" => 3, "label"=>false, "div"=>false)); ?>
                    <?php echo  $this->Form->input("Edit_" . $configKey . ".desc", array("type"=>"textarea","id" => "txtDesc_" . $configKey, "class"=>"input-xlarge", "style" => "display:none", "label"=>false, "div"=>false, "value" => $configValue['desc'], "rows" => 3)); ?>
                </td>
        </tr>
        <?php
                $i++;
            }
        ?>
            </tbody>
        </table>
       
        <script>           
         $(function(){
            $('a[rel=tooltip]').tooltip('hide');
         });
    </script>
</form>