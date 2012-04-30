<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="i-bar"></span>
                <span class="i-bar"></span>
                <span class="i-bar"></span>
            </a>
            <a class="brand" href="/">TCL</a>
            <?php if($this->Session->check('Auth.User')):?>
            <div class="nav-collapse">
                <ul class="nav">

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $this->Html->url('/admin/dashboards/index');?>"><?php echo __('Dashboard');?> </a>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $this->Html->url('/admin/orders/index');?>"><?php echo __('Orders');?> </a>
                    </li>
                  
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Category');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/categories');?>"><?php echo __('Manage Category');?></a></li>
                            <li><a href="<?php echo $this->Html->url('/admin/categories/add');?>"><?php echo __('New Category');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/categories/sort');?>"><?php echo __('Order Category');?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Property');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/properties/index/lst');?>"><?php echo __('Manage Property');?></a></li>
                            <li><a href="<?php echo $this->Html->url('/admin/properties/add');?>"><?php echo __('New Property');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/properties/sort');?>"><?php echo __('Order Property');?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Product');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/products');?>"><?php echo __('Manage Product');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/products/add');?>"><?php echo __('New Product');?></a></li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Pages');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/static_pages');?>"><?php echo __('Manage Pages');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/static_pages/add');?>"><?php echo __('New Page');?></a></li>
                        </ul>
                    </li>
                    
                   
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Customer');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/customers');?>"><?php echo __('Manage Customer');?></a></li>
                            <li><a href="<?php echo $this->Html->url('/admin/customer_types/');?>"><?php echo __('Manage Customer Type');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/email_marketings/');?>"><?php echo __('Email Marketing');?></a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo __('Other');?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/sliders');?>"><?php echo __('Slider');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/contacts/');?>"><?php echo __('Contact');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/subscribers/');?>"><?php echo __('Subscribers');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/rightbanners/');?>"><?php echo __('Rightbanner');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/global_config/');?>"><?php echo __('Site Config');?></a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Users <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $this->Html->url('/admin/user_permissions');?>"><?php echo __('Permission');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/users');?>"><?php echo __('Manage Users');?></a></li>
                            <li><a href="<?php echo $this->Html->url('/admin/users/add');?>"><?php echo __('New User');?></a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo $this->Html->url('/admin/groups');?>"><?php echo __('Manage Groups');?></a></li>
                            <li><a href="<?php echo $this->Html->url('/admin/groups/add');?>"><?php echo __('New Group');?></a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav pull-right">
                <li class=""><a>Hi, <?php echo $this->Session->read('Auth.User.name');?></a></li>
                <li class=""><?php echo $this->Html->link('Logout', '/users/logout');?></li>
                </ul>

            </div><!--/.nav-collapse -->
        <?php
        endif;
        ?>
        </div>
    </div>
</div>

<?php /*
<div class="topbar">
  <div class="fill">
    <div class="container">
        <a class="brand" href="/">Practice Test</a>
        <ul class="nav" data-dropdown="dropdown">
        <li class="menu">
            <a class="menu" href="#" class="dropdown-toggle">Post</a>
            <ul class="menu-dropdown">
                <li><a href="<?php echo $this->Html->url('/posts/manage');?>">Manage Posts</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $this->Html->url('/posts/add');?>">New Post</a></li>
            </ul>
        </li>
        <li class="menu">
            <a class="menu" href="#" class="dropdown-toggle">Practice Test</a>
            <ul class="menu-dropdown">
                <li><a href="<?php echo $this->Html->url('/admin/practice_tests/index');?>"><?php echo __('Manage Pr.Tests');?></a></li>
                <li><a href="<?php echo $this->Html->url('/admin/practice_tests/add');?>"><?php echo __('New Pr.Test');?></a></li>
            </ul>
        </li>
        <li class="menu">
            <a class="menu" href="#" class="dropdown-toggle">Basic Setup</a>
            <ul class="menu-dropdown">
                <li><a href="<?php echo $this->Html->url('/admin/test_types/index');?>"><?php echo __('Manage Test Types');?></a></li>
                <li><a href="<?php echo $this->Html->url('/admin/test_types/add');?>"><?php echo __('New Test Type');?></a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $this->Html->url('/admin/countries/index');?>"><?php echo __('Manage Countries');?></a></li>
                <li><a href="<?php echo $this->Html->url('/admin/countries/add');?>"><?php echo __('New Country');?></a></li>
            </ul>
        </li>
        <li class="menu">
            <a class="menu" href="#" class="dropdown-toggle">User</a>
            <ul class="menu-dropdown">
                <li><a href="<?php echo $this->Html->url('/admin/user_permissions');?>"><?php echo __('Permission');?></a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $this->Html->url('/admin/users');?>"><?php echo __('Manage Users');?></a></li>
                <li><a href="<?php echo $this->Html->url('/admin/users/add');?>"><?php echo __('New User');?></a></li>
                <li class="divider"></li>
                <li><a href="<?php echo $this->Html->url('/admin/groups');?>"><?php echo __('Manage Groups');?></a></li>
                <li><a href="<?php echo $this->Html->url('/admin/groups/add');?>"><?php echo __('New Group');?></a></li>
            </ul>
        </li>
        </ul>
        <?php
        if($this->Session->check('Auth.User.id')){
        ?>
        <ul class="nav secondary-nav">
          <li class="menu"><a>Hi, <?php echo $this->Session->read('Auth.User.name');?></a></li>
          <li class="menu"><?php echo $this->Html->link('Logout', '/users/logout');?></li>
        </ul>
        <?php
        }
        ?>
      <!--
      <form action="" class="pull-right">
        <input class="input-small" type="text" placeholder="Username">
        <input class="input-small" type="password" placeholder="Password">
        <button class="btn" type="submit">Sign in</button>
      </form>
      -->
    </div>
  </div>
</div>
 *
 */?>