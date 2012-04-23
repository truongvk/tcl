<!--footer-->
<div id="footer" class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span2">
                    <a href="/">
                        <img src="<?php echo $this->Html->url('/img/front/TCL_Logo.png');?>" alt="Logo">
                    </a>
                </div>
                <div class="span7">
                    <h3><?php echo __('About TCL');?></h3>
                    <p><?php echo Configure::read('Settings.footer_about_us.value');?></p>
                </div>
                <div class="span3" style="">
                    <h3>Contact Us</h3>
                    <p><i class="icon-envelope icon-white"></i>&nbsp;<?php echo __('Email');?>&nbsp;-&nbsp;<a href=""><?php echo Configure::read('Settings.contact_email.value');?></a></p>
                    <p><i class="icon-book icon-white"></i>&nbsp;<?php echo __('Phone');?>&nbsp;-&nbsp;<?php echo Configure::read('Settings.contact_phone.value');?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="copyright" class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span5">
                    <p><?php echo __('2012 © TCL Vietnam Corporation | All Rights Reserved');?></p>
                </div>
                <div class="span7 pull-right">
<!--                            <ul class="footer-menu">
                        <li class=""><a href="#">Home</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>                                                    -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--end footer-->