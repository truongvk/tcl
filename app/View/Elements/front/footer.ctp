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
                    <h3>About TCL</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="span3" style="">
                    <h3>Contact Us</h3>
                    <p><i class="icon-envelope icon-white"></i>&nbsp;Support&nbsp;-&nbsp;<a href="">support@tclvn.vn</a></p>
                    <p><i class="icon-book icon-white"></i>&nbsp;Phone&nbsp;-&nbsp;(08) 3555555</p>
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
                    <p>2012 © TCL Vietnam Corporation | All Rights Reserved</p>
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
<script type="text/javascript">
    $(function(){
    jQuery('.settings .openclose').click(function()
    {
        //show hide mini cart
        var target = jQuery(this).parent().parent('.settings');
        if(target.is('.display_switch'))
        {
            target.animate({top: "-78"}, function()
            {
                target.removeClass('display_switch').addClass('display_settings_false');
            });
        }
        else
        {
            $.get("<?php echo $this->Html->url('/products/mini_cart/');?>", {}, function(response){
                //load mini cart
                $('#mini_cart').html(response);

                target.animate({top: "0"}, function()
                {
                    target.removeClass('display_settings_false').addClass('display_switch');
                });
            });
        }
    });
});

</script>