<?php

define('DMCCMS', 1);
require_once('load.php');
Load::loadApplication();

//echo "<pre>";
//print_r($_REQUEST);


if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'quickSave') {

    $field = $_REQUEST['fields'];
    $table = $_REQUEST['table'];
    $id = $_REQUEST['id'];
    
    $arrFields = json_decode($field, true);
    
    if (!empty($arrFields)) {
        DB::update($table, StringManage::processString($arrFields), " id=%d ", $id);
        if(isset($arrFields['slug']) && $arrFields['slug']!=''){
            Core::updateSlug($arrFields['slug'],$id,false,"mod_page","view_page");
        }
    }
    echo json_encode(array("result" => "success","title" => "Quick Save","message" => "Records have been saved successfully"));
    exit;
}