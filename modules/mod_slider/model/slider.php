<?php

/* Slider model class. Contains all attributes and method related to slider.
 */
//restrict direct access to the slider
defined('DMCCMS') or die('Unauthorized access');

class SliderModel {

    /** Store fields of Slider record
      @var $fields array
     */
    public $records = array();

    /**
     * constructor of class SliderModel. do initialisation
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function __construct($id = "") {
        
    }

    /**
     * get Slider detail by its id
     *
     * @param int $id slider id
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    public function getSliderById($id) {
        $this->records = DB::queryFirstRow("SELECT name,short_description,description,image_name,ipad_image_name,meta_title,meta_description,meta_keyword,status FROM " . CFG::$tblPrefix . "slider where status='1' and is_deleted='0' and id=%d limit 1", $id);
    }

    /**
     * get slider record list. 
     *
     * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
     */
    public function getSliderList() {
        $orderBy = "id desc";
        if (isset($_GET['o_type']))
            $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
        $whereParam = array("deleted" => "0");
        $where = " is_deleted=%s_deleted ";

        if (isset($_GET['searchForm']['slider_name']) && trim($_GET['searchForm']['slider_name']) != "") {
            $where .= " and title like %ss_sortOrder ";
            $whereParam["sortOrder"] = StringManage::processString($_GET['searchForm']['slider_name']);
        }

        UTIL::doPaging("totalSliders", "id,title,status,image_name,sort_order", CFG::$tblPrefix . "slider", $where, $whereParam, $orderBy);
    }

    /**
     * get slider record with its slug. 
     *
     * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
     */
    public function getSliderData($id) {
        if ((int) $id != 0)
            return UTIL::getLanguageData("SELECT * FROM " . CFG::$tblPrefix . "slider where id=" . $id);
    }

    /**
     *  Save slider data if submitted
     *
     *  @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    public function saveSlider() {
        if (isset($_POST['title'])) {  //echo "<pre>";print_r($_POST);exit;
            $varTitle = trim($_POST['title']);

            if (isset($_POST['status']))
                $varStatus = '1';
            else
                $varStatus = '0';

            $sortOrder = "";
            if ($_POST['sortOrder'] == "") {
                $sortOrder = Core::maxId("slider");
                $_POST['sortOrder'] = $sortOrder['maxId'] + 1;
            }

            // create array of fields
            $arrFields = array("title" => $_POST['title'], "short_description" => $_POST['shortDesc'], "image_name" => $_POST['flImage_hdn'], "image_title" => $_POST['flImage_title_hdn'][0], "image_alt" => $_POST['flImage_alt_hdn'][0], "ipad_image_name" => $_POST['blImage_hdn'], "ipad_image_title" => $_POST['blImage_title_hdn'][0], "ipad_image_alt" => $_POST['blImage_alt_hdn'][0], "status" => $varStatus, "user_id" => $_SESSION[CFG::$session_key]["id"], "sort_order" => $_POST['sortOrder']);

            // insert new record
            if (APP::$curId == "") {
                // store created and updated date
                $arrFields['created_date'] = date("Y-m-d H:i:s");
                $arrFields['updated_date'] = date("Y-m-d H:i:s");

                // insert record
                DB::insert(CFG::$tblPrefix . "slider", StringManage::processString($arrFields));

                // get current id
                APP::$curId = DB::insertId();
            } else {
                // store updated date
                $arrFields['updated_date'] = date("Y-m-d H:i:s");

                // update record
                DB::update(CFG::$tblPrefix . "slider", StringManage::processString($arrFields), " id=%d ", APP::$curId);
            }

            // pass action result
            $_SESSION["actionResult"] = array("success" => "Slider has been saved successfully"); // different type success, info, warning, error

            if ($_POST['edit'] == 1)
                UTIL::redirect(URI::getURL(APP::$moduleName, "slider_edit", APP::$curId, "lang_id=" . $_POST['lang_id']));
            else
                UTIL::redirect(URI::getURL(APP::$moduleName, "slider_list"));
        }
    }

    /** Change Status of sliders
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function changeStatus() {
        $newStatus = $_GET['newstatus'];

        foreach ($_POST['status'] as $key => $val) {
            DB::update(CFG::$tblPrefix . "slider", array("status" => $newStatus), " id=%d ", $key);
        }
    }

    /** delete selected sliders
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function deleteSlider() {
        foreach ($_POST['status'] as $key => $val) {
            $arrImages = DB::query("select image_name from " . CFG::$tblPrefix . "slider where id=" . $key);

            foreach ($arrImages as $image) {
                UTIL::unlinkFile($image['image_name'], URI::getAbsMediaPath(CFG::$sliderDir));
            }

            DB::query("delete from " . CFG::$tblPrefix . "slider where id=%d", $key);
        }
    }

    /** Save sort order of mahatma slider
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function saveSortOrder() {
        $newValue = $_GET['val'];
        $id = $_GET['id'];
        
        DB::update(CFG::$tblPrefix . "slider", array("sort_order" => $newValue), " id=%d ", $id);
    }

}