<?php

App::uses('Sanitize', 'Utility');
App::uses('File', 'Utility');

class GlobalConfigController extends AppController {

    var $name = 'GlobalConfig';
    var $components = array();
    var $_radoms_list = array();

    public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('setting2array');
    }
    
//    private function __random_id() {
//        $salt = "abchefghjkmnpqrstuvwxyz0123456789";
//        srand((double) microtime() * 1000000);
//
//        while (1) {
//            $i = 0;
//            $makepass = '';
//            while ($i <= 6) {
//                $num = rand() % 33;
//                $tmp = substr($salt, $num, 1);
//                $makepass = $makepass . $tmp;
//                $i++;
//            }
//            if (!in_array($makepass, $this->_radoms_list)) {
//                $this->_radoms_list[] = $makepass;
//                return $makepass;
//            }
//        }
//    }

   /**
     * Convert config.php -> Settings to array
     *
     * @param <string> $settingKey
     * @param <boolean> $escapeKey
     * @return <array>
     */
    public function setting2array($settingKey=null, $escapeKey=false) {
        if ($settingKey != null) {
            $settings = Configure::read("Settings.{$settingKey}.value");
            $settings = str_replace('\r\n', '\n', $settings);
            $settings = explode('\n', $settings);
            $mysettings = array();
            if (!is_array($settings)) {
                $settings = array($settings);
            }
            foreach ($settings as $setting) {
                $setting = str_replace('\"', '"', $setting);
                if ($escapeKey) {
                    $mysettings[] = $setting;
                } else {
                    $mysettings[$setting] = $setting;
                }
            }
            return $mysettings;
        }
        return null;
    }
    
    public function admin_index() {
        $this->set('title', __('Global Config'));
        $this->set('description', __('Manage Config'));

        
        if (!empty($this->request->data)) {
            if (!empty($this->request->data["OldSettings"])) {
                foreach ($this->request->data["OldSettings"] as $key => $value) {
                    $desc = (isset($this->request->data["Edit_" . $key]["desc"]) && !empty($this->request->data["Edit_" . $key]["desc"])) ? $this->request->data["Edit_" . $key]["desc"] : Configure::read("Settings." . $key . ".desc");
                    if (!empty($key)) {
                        $priority = isset($this->request->data["priority"][$key]) ? intval($this->request->data["priority"][$key]) : "0";
                        $this->request->data["Settings"][$key] = array("value" => $value, "desc" => $desc, "priority" => $priority);
                    }
                }
            }
            if (!empty($this->request->data["NewSettings"])) {
                $newSettings = $this->request->data["NewSettings"];
                $keys = $newSettings["key"];
                $values = $newSettings["value"];
                $descs = $newSettings["desc"];
                $priority = isset($newSettings["priority"]) ? intval($newSettings["priority"]) : "0";
                foreach ($keys as $idx => $key) {
                    $value = $values[$idx];
                    $desc = $descs[$idx];
                    if (!empty($key)) {
                        $this->data["Settings"][$key] = array("value" => $value, "desc" => $desc, "priority" => $priority);
                    }
                }
            }
            if (!empty($this->request->data["Settings"])) {//pr($this->data);exit;
                $filename = APP. 'config' . DS . "config.php";
                $file = new File($filename);
                if ($file->writable()) {
                    $new_settings = $this->request->data["Settings"];
                    $write_this = "<?php\r\n";
                    $write_this .= "\$config['Settings'] = array(";
                    foreach ($new_settings as $settingKey => $settingValues) {
                        $value = Sanitize::escape($settingValues["value"]);
                        $desc = Sanitize::escape($settingValues["desc"]);
                        $priority = isset($settingValues["priority"]) ? intval($settingValues["priority"]) : '0';
                        $write_this .= "\n'" . Sanitize::escape($settingKey) . "' => array('value'=>'" . $value . "','desc'=>'" . $desc . "','priority'=>'" . $priority . "'),";
                    }
                    $write_this .= "\n);";
                    $write_this .= "\n?>";
                    if ($file->write($write_this)) {
                        $this->Session->setFlash(__('Success'), 'success');
                        $this->redirect("/admin/global_config/");
                    } else {
                        $this->Session->setFlash(__('Settings cannot save', true), "error");
                        $this->redirect("/admin/global_config/");
                    }
                } else {
                    $this->Session->setFlash(__('File cannot write', true), "error");
                    $this->redirect("/admin/global_config/");
                }
            }
        }
    }
}

?>