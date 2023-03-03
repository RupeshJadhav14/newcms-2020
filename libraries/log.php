<?php
/**
  This is utility class contains general operation function for site.
 */
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class LOG {

    public static $old_data = [];
    public static $new_data = [];
    public static $other_data = "";
    public static $adjust_type = "";
    public static $json = '1';
    public static $log_type = "";

    public static function save_log() {
        if (isset($_SESSION[CFG::$session_key]["name"])) {
            $logData = array(
                "user_id" => $_SESSION[CFG::$session_key]["id"],
                "user_name" => $_SESSION[CFG::$session_key]["name"],
                "user_type" => $_SESSION[CFG::$session_key]["roll_name"],
                "json_format" => "1",
                "created_date" => date("Y-m-d h:i:s")
            );
        }
        $logData['log_type'] = LOG::$log_type;
        switch (LOG::$log_type) {
            case LOGIN_SUCCESS:
                $logData['description'] = $_SESSION[CFG::$session_key]["name"] . " successfully logged In";
                $logData['json_format'] = "0";
                break;
            case LOGOUT_SUCCESS:
                $logData['description'] = $_SESSION[CFG::$session_key]["name"] . " successfully logged Out";
                $logData['json_format'] = "0";
                break;
            case PRODUCT_UPDATE:
                $logData['description'] = LOG::dropshipProductUpdate();
                break;
        }

        DB::insert(CFG::$tblPrefix . "log", $logData);
        LOG::$old_data = LOG::$new_data = LOG::$other_data = "";
    }

    public static function dropshipProductUpdate() {
        $return = array();
        if (isset(LOG::$old_data) && !empty(LOG::$old_data)) {
            $new_data = LOG::dropshipProductUpdateLog(LOG::$old_data);
            $return['old_data'] = $new_data;
        }
        if (isset(LOG::$new_data) && !empty(LOG::$new_data)) {
            $new_data = LOG::dropshipProductUpdateLog(LOG::$new_data);
            $return['new_data'] = $new_data;
        }
        return json_encode($return);
    }

    public static function dropshipProductUpdateLog($data) {
        $new_data = array();
        if (isset($data)) {
            $new_data[1] = array(
                "SKU" => array("label" => "SKU", "value" => ($data['sku'])?$data['sku']:'Not Changed'),
                "Title" => array("label" => "Title", "value" => ($data['title'])?$data['title']:'Not Changed'),
                "Title Changed" => array('label' => "Title Changed","value"=>($data["title_changed"] == '0')?"No":"Yes"),
                "Category" => array('label' => "Category","value"=>$data["category"]),
                "Stock QTY" => array('label' => "Stock QTY","value"=>$data["stock_qty"]),
                "Status" => array('label' => "Status","value"=>$data["status"]),
                "Price" => array('label' => "Price","value"=>$data["price"]),
                "RRP Price" => array('label' => "RRP Price","value"=>$data["rrpprice"]),
                "VIC" => array('label' => "VIC","value"=>$data["vic"]),
                "NSW" => array('label' => "NSW","value"=>$data["nsw"]),
                "SA" => array('label' => "SA","value"=>$data["sa"]),
                "QLD" => array('label' => "QLD","value"=>$data["qld"]),
                "TAS" => array('label' => "TAS","value"=>$data["tas"]),
                "WA" => array('label' => "WA","value"=>$data["wa"]),
                "NT" => array('label' => "NT","value"=>$data["nt"]),
                "Bulky Item" => array('label' => "Bulky Item","value"=>$data["bulky_item"]),
                "Discontinued" => array('label' => "Discontinued","value"=>$data["discontinued"]),
                "EAN Code" => array('label' => "EAN Code","value"=>$data["ean_code"]),
                "Brand" => array('label' => "Brand","value"=>$data["brand"]),
                "MPN" => array('label' => "MPN","value"=>$data["mpn"]),
                "Weight KG" => array('label' => "Weight KG","value"=>$data["weight_kg"]),
                "Carton Length (CM)" => array('label' => "Carton Length (CM)","value"=>$data["carton_length_cm"]),
                "Carton Width (CM)" => array('label' => "Carton Width (CM)","value"=>$data["carton_width_cm"]),
                "Carton Height (CM)" => array('label' => "Carton Height (CM)","value"=>$data["carton_height_cm"]),
                "Color" => array('label' => "Color","value"=>$data["color"]),
                "Description" => array('label' => "Description","value"=>$data["description"]),
                "Image Change" => array('label' => "Image Change","value"=>(count($data["image_change"]) < 2)?"No":"Yes"),
                "Image 1" => array('label' => "Image 1",'value'=>$data["image_1"]),
                "Image 2" => array('label' => "Image 2",'value'=>$data["image_2"]),
                "Image 3" => array('label' => "Image 3",'value'=>$data["image_3"]),
                "Image 4" => array('label' => "Image 4",'value'=>$data["image_4"]),
                "Image 5" => array('label' => "Image 5",'value'=>$data["image_5"]),
                "Image 6" => array('label' => "Image 6",'value'=>$data["image_6"]),
                "Image 7" => array('label' => "Image 7",'value'=>$data["image_7"]),
                "Image 8" => array('label' => "Image 8",'value'=>$data["image_8"]),
                "Image 9" => array('label' => "Image 9",'value'=>$data["image_9"]),
                "Image 10" => array('label' => "Image 10",'value'=>$data["image_10"]),
                "Image 11" => array('label' => "Image 11",'value'=>$data["image_11"]),
                "Image 12" => array('label' => "Image 12",'value'=>$data["image_12"]),
                "Image 13" => array('label' => "Image 13",'value'=>$data["image_13"]),
                "Image 14" => array('label' => "Image 14",'value'=>$data["image_14"]),
                "Image 15" => array('label' => "Image 15",'value'=>$data["image_15"]),
                "Updated Date" => array("label" => "Updated Date", "value" => UTIL::dateDisplay($data['updated_date'])),
                "Updated By" => array("label" => "Updated By", "value" => CORE::getUserData('name')),
            );
          
        }
        return $new_data;
    }

}
