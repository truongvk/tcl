<?php
//list user
Router::connect('/admin/users', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'index'));
//register
Router::connect('/users/register', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'register'));
//login
Router::connect('/users/login', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'login'));
Router::connect('/admin/users/login', array('admin'=>true, 'plugin' => 'acl_management', 'controller' => 'users', 'action' => 'login'));
//logout
Router::connect('/users/logout', array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/admin/users/logout', array('admin'=>true, 'plugin' => 'acl_management', 'controller' => 'users', 'action' => 'logout'));
//oauth
Router::connect('/users/facebook_connect', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'facebook_connect'));
Router::connect('/users/twitter_connect', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'twitter_connect'));
Router::connect('/users/twitter_login', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'twitter_login'));
Router::connect('/users/oauth_callback', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'oauth_callback'));
//user action
Router::connect('/admin/users/add', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'add'));
Router::connect('/admin/users/view/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'view'));
Router::connect('/admin/users/edit/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'edit'));
Router::connect('/admin/users/delete/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'delete'));
Router::connect('/admin/users/toggle/*', array('plugin' => 'acl_management', 'controller' => 'users', 'action'=>'toggle'));

//list group
Router::connect('/admin/groups', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'index'));
//groups action
Router::connect('/admin/groups/add', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'add'));
Router::connect('/admin/groups/edit/*', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'edit'));
Router::connect('/admin/groups/delete/*', array('plugin' => 'acl_management', 'controller' => 'groups', 'action'=>'delete'));

//list permissions
Router::connect('/admin/user_permissions', array('plugin' => 'acl_management', 'controller' => 'user_permissions', 'action'=>'index'));
?>
