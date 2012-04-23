<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
<div class="widget-shop">
        <div class="widget-title"><?php echo __('Online Support');?></div>
        <?php
            $yahoosupports = $this->requestAction('/global_config/setting2array/support_by_yahoo/1');
            $skypesupports = $this->requestAction('/global_config/setting2array/support_by_skype/1');
        ?>
        <ul class="nav nav-list">
            <li class="nav-header"><?php echo __('Support Staff');?></li>
            <?php 
                foreach($yahoosupports as $ysupport):
                    $u = substr($ysupport,0, strpos($ysupport, '@'));
            ?>
            <li><a href="ymsgr:sendim?<?php echo $ysupport;?>" border="0"><img src="http://opi.yahoo.com/online?u=<?php echo $u;?>&t=2"></a> </li>
            <?php endforeach;?>
            <?php 
                foreach($skypesupports as $ssupport):                    
            ?>
            <li><a href="skype:<?php echo $ssupport;?>?call"><img src="http://mystatus.skype.com/smallclassic/<?php echo $ssupport;?>" style="border: none;" alt="Offline" /></a></li>
            <?php endforeach;?>
        </ul>
</div>