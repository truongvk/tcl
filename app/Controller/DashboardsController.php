<?php

App::uses('OrdersController', 'Controller');
App::uses('analytics', 'GoogleAnalytics');
App::import('Vendor', 'analytics', array('file' => 'GoogleAnalytics' . DS . 'analytics.class.php'));
/**
 * Dashboard Controller
 *
 * @property PracticeTest $PracticeTest
 */
class DashboardsController extends OrdersController {
    public $uses = array('Order','AclManagement.User');
    public $helpers = array('Text', 'Time', 'Number');
    
    public function admin_index(){
        $this->set('title', __('Dashboard'));
        //$this->set('description', __('Manage Quiz'));
        
        $numOfOrderNotYetResolve = $this->Order->find('count', array('conditions'=>array('Order.published'=>0)));
        if($numOfOrderNotYetResolve > 0){
            $this->Session->setFlash(__('You have <a href="%s">%s</a> order(s) not yet resolve.',
                    FULL_BASE_URL.$this->base.'/admin/orders/index/sort:created/direction:desc/conditions:YToxOntzOjU6Ik9yZGVyIjthOjU6e3M6MTM6ImN1c3RvbWVyX3R5cGUiO3M6MDoiIjtzOjY6InN0YXR1cyI7czoxOiItIjtzOjEzOiJjdXN0b21lcl9uYW1lIjtzOjA6IiI7czo0OiJmcm9tIjtzOjA6IiI7czoyOiJ0byI7czowOiIiO319', 
                    $numOfOrderNotYetResolve), 'error');
        }

        $orders = $this->Order->find('all', array('order'=>array('Order.created'=>'DESC'), 'limit'=>20));
        $this->set('orders', $orders);

//        $this->User->bindModel(array('hasOne' => array(
//                'Customer' => array(
//                    'className' => 'Customer',
//                    'foreignKey' => 'user_id',
//                    'dependent' => true
//                )
//                )), false);
//        $users = $this->User->find('all', array('order'=>array('User.created'=>'DESC'), 'limit'=>10));
//        $this->set('users', $users);

        //google analytics
	try {

            // construct the class
            $oAnalytics = new analytics(Configure::read('GA.email'), Configure::read('GA.password'));
            // set it up to use caching
            $oAnalytics->useCache();
            $oAnalytics->setProfileByName(Configure::read('GA.domain'));
            //$oAnalytics->setProfileById('ga:12345');
            // set the date range
            $oAnalytics->setMonth(date('n'), date('Y'));
            //$oAnalytics->setDateRange('2012-03-01', '2012-03-06');
            //echo '<pre>';
            // print out visitors for given period
            //print_r($oAnalytics->getVisitors());
            // print out pageviews for given period
            //print_r($oAnalytics->getPageviews());
            // use dimensions and metrics for output
            // see: http://code.google.com/intl/nl/apis/analytics/docs/gdata/gdataReferenceDimensionsMetrics.html
            // print_r($oAnalytics->getData(array(   'dimensions' => 'ga:keyword',
            // 'metrics'    => 'ga:visits',
            // 'sort'       => 'ga:keyword')));
            //print_r($oAnalytics->getData(array('dimensions' => 'ga:visitorType','metrics'    => 'ga:newVisits')));
            $visits = $oAnalytics->getVisitors();
            $views = $oAnalytics->getPageviews();
            /* build tables */
            if (count($visits)) {
                $visits = $this->array_filter_recursive($visits);
                $views = $this->array_filter_recursive($views);
                foreach ($visits as $day => $visit) {
                    $flot_datas_visits[] = '[' . $day . ',' . $visit . ']';
                    $flot_datas_views[] = '[' . $day . ',' . $views[$day] . ']';
                }
                $flot_data_visits = '[' . implode(',', $flot_datas_visits) . ']';
                $flot_data_views = '[' . implode(',', $flot_datas_views) . ']';
            }
            $this->set(compact('flot_data_visits', 'flot_data_views'));
	} catch (Exception $e) {
		echo 'Caught exception: ' . $e->getMessage();
	}
    }   
   

    public function admin_toggle($id, $status, $field='published') {
        return parent::admin_toggle($id, $status, $field);
    }
}
?>
