<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $this->fetch('title'); ?></title>
        <?php echo $this->fetch('meta'); ?>
        <?php echo $this->fetch('script'); ?>
        <?php echo $this->fetch('css'); ?>
        <?php
        if (Configure::read('debug') > 0) {
            echo $this->Html->script('jquery/jquery-1.7.1.min');
        } else {
        ?>
            <script src="https://www.google.com/jsapi?key=ABQIAAAAa44qXAhHZFTYANZzBZYvahSJNboRFY-KWCF1_jCiST2eg5RhLRSZtibOiJfIYeMGYIUbzDeGeg5hww" type="text/javascript"></script>
            <script type="text/javascript">
                google.load("jquery", "1.7.1");
            </script>
            <?php
        }
        ?>
        <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le styles -->
        <link href="<?php echo $this->Html->url('/css/front/font.css'); ?>" rel="stylesheet">
        <link href="<?php echo $this->Html->url('/css/twitter/bootstrap.css'); ?>" rel="stylesheet">
<!--        <link href="<?php //echo $this->Html->url('/css/front/bootstrap-responsive.css'); ?>" rel="stylesheet">-->
        <link href="<?php echo $this->Html->url('/css/front/mycustomize.css'); ?>" rel="stylesheet">
        <?php echo $this->Html->script(array('large_dropdown/large_dropdown'), array('block' => 'scriptBottom'));?>
        <?php echo $this->Html->css(array('../js/large_dropdown/style'), null, array());?>        
        <?php echo $this->fetch('scriptTop');?>
    </head>
    <body>
        <?php echo $this->element('front/header_menu');?>
        <div id="content" class="container">
            <div class="row">
                <div class="span12">
                    <?php echo $this->element('front/carousel');?>

                    <?php echo $this->fetch('promotion_products');?>

                    <?php
                    if ($this->fetch('latest_products')):
                    ?>
                    <div class="row">
                        <div class="span9">
                            <?php echo $this->fetch('latest_products');?>
                        </div>
                        <div class="span3">
                            <?php echo $this->element('sidebar/subscribe');?>
                            <?php echo $this->fetch('block_ads_right');?>
                        </div>
                    </div>
                    <?php
                    endif;
                    ?>

                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
        </div> <!-- /container -->

    <?php
    echo $this->element('front/footer');
    echo $this->element('front/add2cart');
    echo $this->element('front/contact');
    ?>
    </body>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php      
    echo $this->Html->script(array('twitter/bootstrap.min'));
    ?>
    <script type="text/javascript">
     $(function(){
	jQuery('.settings .openclose').click(function()
        {
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
                target.animate({top: "0"}, function()
                {
                    target.removeClass('display_settings_false').addClass('display_switch');
                });
            }
        });
    });
    
    </script>    
    <?php echo $this->Html->script(array('smoke/smoke.min'), array());?>
    <?php echo $this->Html->css(array('../js/smoke/smoke', '../js/smoke/themes/default'), null, array());?>
    <?php echo $this->fetch('scriptBottom');?>
</html>
