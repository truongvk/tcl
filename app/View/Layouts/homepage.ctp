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
    </body>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php
    echo $this->Html->script(array('twitter/bootstrap.min'));
    ?>
    <?php echo $this->fetch('scriptBottom');?>
</html>
