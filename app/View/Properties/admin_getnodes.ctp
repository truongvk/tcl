<?php

$data = array();

foreach ($nodes as $node){
    $data[] = array(
        "text" => $node['Property']['name'],
        "id" => $node['Property']['id'],
        "cls" => "folder",
        "leaf" => ($node['Property']['lft'] + 1 == $node['Property']['rght'])
    );
}

echo json_encode($data);

?>