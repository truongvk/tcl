<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="<?php echo $this->Html->url('/acl_management/css/twitter/bootstrap.css');?>" rel="stylesheet">
    <link href="<?php echo $this->Html->url('/acl_management/css/twitter/bootstrap-responsive.css');?>" rel="stylesheet">
    <link href="<?php echo $this->Html->url('/acl_management/css/twitter/bootstrap-mycustomize.css');?>" rel="stylesheet">
    <?php
    if(Configure::read('debug') > 0){
        echo $this->Html->script('jquery/jquery-1.7.1.min');
    }else{
    ?>
    <script src="https://www.google.com/jsapi?key=ABQIAAAAa44qXAhHZFTYANZzBZYvahSJNboRFY-KWCF1_jCiST2eg5RhLRSZtibOiJfIYeMGYIUbzDeGeg5hww" type="text/javascript"></script>
    <script type="text/javascript">
        google.load("jquery", "1.7.1");
    </script>
    <?php
    }
    ?>

    <style type="text/css">
      /* Override some defaults */
      html, body {
        background-color: #eee;
      }
      body {
        padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      }
      .container > footer p {
        text-align: center; /* center align it with the container */
      }
     .container {
        width: 680px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16.*/
      }

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 6px 6px 6px 6px;
           -moz-border-radius: 6px 6px 6px 6px;
                border-radius: 6px 6px 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }
     



    </style>
  </head>

  <body>

    <div class="container">
        <div class="content">
            <div class="row">
                <div class="span7">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->Session->flash('auth'); ?>
                    <?php echo $content_for_layout; ?>
                </div>
            </div>
        </div>

    </div> <!-- /container -->

  </body>
</html>