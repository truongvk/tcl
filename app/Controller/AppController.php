<?php

App::uses('Controller', 'Controller');
App::import('Vendor', 'wfCart', array('file' => 'wfcart.php'));
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
        'Js' => array('Jquery'),
        'Time'
    );

    public $shoppingCart;
    public function beforeFilter() {
        parent::beforeFilter();

        if( (isset($this->params->admin) && $this->params->admin) || (preg_match("/admin\//i", $this->params->url))){
            $this->layout = 'admin';
        }
        
        $locale = Configure::read('Config.language');
       
        
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
        $this->set('shoppingCart', $this->shoppingCart);
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
    
    /**
     *Remove item = 0 or null
     */    
    function array_filter_recursive($input) {
        if(empty($input)) return false;
        
        foreach ($input as &$value) {
            if (is_array($value)) {
                $value = $this->array_filter_recursive($value);
            }
        }
        return array_filter($input);
    }    

}

?>