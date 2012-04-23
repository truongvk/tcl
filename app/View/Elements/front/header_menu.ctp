<div class="navbar navbar-fixed-top" id="header_menu">
    <div id="logo" class="container">
        <div class="row">
            <div class="span4">
                <?php echo $this->Html->link($this->Html->image('front/logo.png'), array('controller'=>'products', 'action'=>'index'), array('escape'=>false));?>
<!--                <img src="http://placehold.it/83x50">-->
            </div>
            <div class="span8">
                
                    <?php if($this->Session->check('Auth.User.id')): ?>
                    <div style="margin:10px -20px 5px" class="btn-toolbar pull-right">
                        <div class="btn-group">
                            <a href="<?php echo $this->Html->url(array('controller'=>'orders', 'action'=>'history'));?>" class="btn"><i class="icon-asterisk"></i> <?php echo __('Order History');?></a>
                            <a href="<?php echo $this->Html->url('/users/edit_profile');?>" class="btn"><i class="icon-pencil"></i> <?php echo __('Edit Profile');?></a>                            
                        </div>
                        <div class="btn-group">
                            <?php echo $this->Html->link('<i class="icon-off icon-white"></i> '.__('Logout'), '/users/logout', array('class'=>'btn btn-warning', 'escape'=>false));?>
                        </div>
                    </div>
                    <?php else: ?>
                        <p class="right-content pull-right">
                            <?php echo $this->Html->link('<i class="icon-lock"></i> '.__('Login'), '/users/login', array('class'=>'btn', 'escape'=>false));?>
                            <?php echo $this->Html->link('<i class="icon-user"></i> '.__('Register'), '/users/register', array('class'=>'btn', 'escape'=>false));?>
                        </p>
                    <?php endif; ?>                
            </div>
        </div>
    </div>
    <div class="navbar-inner">
        <div class="container">
        <div class="row">
                    <div class="nav-collapse">
                        <ul id="ldd_menu" class="ldd_menu">                            
                            <li>
                                <span><a href="#"><?php echo __('Products');?></a></span><!-- Increases to 510px in width-->
                                <div class="ldd_submenu">
                                    <?php 
                                        $products_categories = $this->requestAction('/categories/get_menu_categories');
                                        $numOfCate = count($products_categories);
                                        $numOfSpan = $numOfCate*3;
                                    ?>
                                    <div class="row">
                                        <div class="span<?php echo $numOfSpan;?>">
                                            <div class="row">                                            
                                            <?php foreach ($products_categories as $category): ?>
                                                    <div class="span3">
                                                        <ul>
                                                            <li class="ldd_heading"><?php echo $this->Html->link($category['Category']['name'], array('controller'=>'products', 'action'=>'view', $category['Category']['slug']));?></li>
                                                            <?php
                                                                if(!empty($category['children'])):
                                                                    foreach ($category['children'] as $child): 
                                                            ?>
                                                                        <li><?php echo $this->Html->link($child['Category']['name'].' ('.$child['Category']['product_count'].')', array('plugin'=>false,'controller'=>'products', 'action'=>'view', $child['Category']['slug']));?></li>
                                                            <?php 
                                                                    endforeach;
                                                                endif; 
                                                            ?>
                                                        </ul>
                                                    </div>
                                            <?php endforeach; ?>
                                            </div>    
                                        </div>    
                                    </div>    
                                    <a class="ldd_subfoot" href="#"></a>
                                </div>
                            </li>
                            <?php
                            $pages = $this->requestAction('/static_pages/get_pages');
                            foreach($pages as $page){
                            ?>
                            <li>
                                <span><?php echo $this->Html->link($page['StaticPage']['title'], '/p/'. $page['StaticPage']['slug']. '.html');?></span>
                            </li>
                            <?php 
                            }
                            ?>                            
                        </ul>
                    </div>
                    <!--
                    <div class="nav-collapse">
                        <ul class="nav">
                            <li id="nav-logo"><a href="#">&nbsp;</a></li>
                            <li class="active"><a href="#">Home</a></li>
                            <li class="dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Sản phẩm <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                                </ul>
                            </li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>/.nav-collapse -->
               
         </div>
         </div>
    </div>
</div>
 <!-- Top Panel -->
<div class="settings display_settings_false">
    <div id="top-content">
        <div class="full-top pull-right">            
            <p>               
                <span id="mini_cart"></span>&nbsp;<a href="<?php echo $this->Html->url('/cart/checkout');?>" class="btn btn-success"><i class="icon-check icon-white"></i> <?php echo __('Checkout');?></a>
                <a href="<?php echo $this->Html->url('/cart/');?>" class="btn"><i class="icon-eye-open"></i> <?php echo __('View Cart');?> </a>
            </p>
        </div>
    </div>
    <div id="pull-bttn">
        <div class="openclose openclosedisplay_settings"></div>
    </div>
</div>
<!-- end -->