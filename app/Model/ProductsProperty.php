<?php
App::uses('AppModel', 'Model');
/**
 * ProductsProperty Model
 *
 */
class ProductsProperty extends AppModel {
    /*
     * quick post save properties
     *
     * @return boolean
     */
    public function saveProperties($data, $foreign_key){
        $this->data = $data;
        $postProperty=null;
        if(!empty($this->data["Property"]["id"])){
            foreach($this->data["Property"]["id"] as $property_id){
                if($property_id){
                    $postProperty["ProductsProperty"][] = array(
                                            "product_id"        => $foreign_key,
                                            "property_id"       => $property_id
                        );
                }
            }
            if(!empty($postProperty)){
                $this->deleteAll(array('ProductsProperty.product_id'=>$foreign_key), false);
                return $this->saveAll($postProperty["ProductsProperty"]);
            }
        }
        return false;
    }    
}
