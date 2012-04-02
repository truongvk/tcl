<?php
App::uses('AppHelper', 'View/Helper');
/**
 * This class help add/remove params['named']
 */
class NamedparamsHelper extends Helper {

    /**
     * Make params for url
     * If value = 0, then unset params with the key specific
     *
     * @param string $key
     * @param string $value
     * @return string url (implode params[pass]...then join with.../params[named][key]:params[named][value])
     */
    function set($key=null, $value=null) {
        if(!isset($this->params['pass'])){
            return false;
        }

        $url_pass = implode("/", $this->params['pass']);
        $assoc_array = $this->params['named'];

        //remove array when value is null
        if(!$value && isset($assoc_array[$key])){
            unset($assoc_array[$key]);
        }else{
            //add new item for params[named]
            $assoc_array[$key] = $value;
        }

        $passData[] = $url_pass;
        $passData = array_merge($passData, $assoc_array);
        return $passData;
    }

    function multi_set($params) {
        if(!isset($this->params['pass'])){
            return false;
        }

        $url_pass = implode("/", $this->params['pass']);
        $assoc_array = $this->params['named'];

        foreach($params as $key => $value){
            //remove array when value is null
            if(!$value && isset($assoc_array[$key])){
                unset($assoc_array[$key]);
            }else{
                //add new item for params[named]
                $assoc_array[$key] = $value;
            }
        }

        $passData[] = $url_pass;
        $passData = array_merge($passData, $assoc_array);
        return $passData;
    }

    /**
     * Assoc array with key and value
     *
     * @param array $assoc_array
     * @return array
     */
    function __makeParams($assoc_array){
        $keys   = array_keys($assoc_array);
        $values = array_values($assoc_array);

        return array_map(array($this, '__join'), $keys, $values);
    }

    /**
     * Array map call back
     *
     * @param array $key
     * @param array $value
     * @return array
     */
    function __join($key, $value){
        return $key.":".$value."/";
    }

}

?>
