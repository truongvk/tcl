<?php

App::uses('Controller', 'Controller');
App::uses('wfCart', 'Vendor');
class AppController extends Controller {

    public $components = array(
        'Acl',
        'Auth' => array(
            'authenticate' => array(
                'Form' => array(
                    'fields' => array('username' => 'email'),
                    'scope' => array('User.status' => 1)
                )
            ),
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Session',
        //'DebugKit.Toolbar',
    );
    public $helpers = array(
        'Session',
        'Form',
        'Html',
        'Cache',
        'Js',
        'Time'
    );

    public $shoppingCart;
    public function beforeFilter() {
        parent::beforeFilter();

        //$this->Auth->allow();//comment after generate action
        //Configure AuthComponent
        $this->Auth->flash = array("element" => "error", "key" => "auth", "params" => array());
        $this->Auth->loginAction = '/users/login';
        $this->Auth->logoutRedirect = '/users/login';
        $this->Auth->loginRedirect = array('plugin' => 'acl_management', 'controller' => 'users', 'action' => 'index');

        //Initial shopping cart
        $this->shoppingCart =& $this->Session->read('ShoppingCart');
        if(!is_object($this->shoppingCart)){
            $this->shoppingCart = new wfCart();
            $this->Session->write('ShoppingCart', $this->shoppingCart);
        }
    }

    /**
     * return previous URL
     *
     * @return string
     */
    public function __getPreviousUrl() {
        return ($this->Session->check('HistoryComponent.current')) ? $this->Session->read('HistoryComponent.current') : false;
    }

    /**
     * add url
     */
    public function __addUrl() {
        $current = Router::url($this->here, true);
        if ($this->Session->read('HistoryComponent.current') != $current) {
            $this->Session->write('HistoryComponent.current', $current);
        }
    }

}

?>