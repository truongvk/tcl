<!DOCTYPE html>
<html lang="en">
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
/*      .container {
        width: 940px;  downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid, meaning you only go to 14 columns and not 16.
      }*/

      /* The white background content wrapper */
      .container > .content {
        background-color: #fff;
        padding: 20px;
        margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
        -webkit-border-radius: 0 0 6px 6px;
           -moz-border-radius: 0 0 6px 6px;
                border-radius: 0 0 6px 6px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
                box-shadow: 0 1px 2px rgba(0,0,0,.15);
      }

      /* Page header tweaks */
      .page-header {
        background-color: #f5f5f5;
        padding: 20px 20px 10px;
        margin: -20px -20px 20px;
      }

      /* Styles you shouldn't keep as they are for displaying this base example only */
      .content .span12,
      .content .span7,
      .content .span5 {
        min-height: 500px;
      }
      /* Give a quick and non-cross-browser friendly divider */
      .content .span5 {
        margin-left: 0;
        padding-left: 19px;
        border-left: 1px solid #eee;
      }

      .topbar .btn {
        border: 0;
      }

    </style>
  </head>

  <body>

    <?php echo $this->element('top-nav');?>

    <div class="container">
        <div class="content">
            <div class="row">
                <div class="span12">
                <?php if(isset($title)){?>
                <div class="page-header">
                    <div class="row">
                        <div class="span8">
                            <h1><?php echo $title; ?> <small><?php if(isset($description)) echo $description;?></small></h1>
                        </div>
                        <div class="span4" style="text-align: right;">
                            <?php
                            if (fileExistsInPath(APP.'View'.DS.'Elements'.DS . "Actions" . DS . $this->request->params['controller'] . DS . $this->request->params['action'] . ".ctp")){
                                echo $this->element("Actions" . DS . $this->request->params['controller'] . DS . $this->request->params['action'], array());
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->Session->flash('auth'); ?>
                <?php echo $content_for_layout; ?>
                </div>
            </div>
        </div>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-transition.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-alert.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-modal.js');?>"></script>

    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-dropdown.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-scrollspy.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-tab.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-tooltip.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-popover.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-button.js');?>"></script>

    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-collapse.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-carousel.js');?>"></script>
    <script src="<?php echo $this->Html->url('/acl_management/js/twitter/bootstrap-typeahead.js');?>"></script>

  </body>
</html>