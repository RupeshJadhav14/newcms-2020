<?php

/* Gallery model class. Contains all attributes and method related to gallery.
 */
//restrict direct access to the gallery
defined('DMCCMS') or die('Unauthorized access');

class GalleryModel {

    /** Store fields of Gallery record
      @var $fields array
     */
    public $records = array();

    /**
     * constructor of class GalleryModel. do initialisation
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function __construct($id = "") {
        
    }

    /**
     * get Gallery detail by its id
     *
     * @param int $id gallery id
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    public function getGalleryById($id) {
        $this->records = DB::queryFirstRow("SELECT name,image_name,image_title,image_alt,status FROM " . CFG::$tblPrefix . "gallery where status='1' and id=%d limit 1", $id);
    }

    /**
     * get gallery record list. 
     *
     * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
     */
    public function getGalleryList() {
        $orderBy = "id desc";
        if (isset($_GET['o_type']))
            $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
        $where = "";
        $whereParam = array();

        if (isset($_GET['searchForm']['gallery_name']) && trim($_GET['searchForm']['gallery_name']) != "") {
            $where .= " name like %ss_sortOrder ";
            $whereParam["sortOrder"] = StringManage::processString($_GET['searchForm']['gallery_name']);
        }

        UTIL::doPaging("totalGallerys", "id,name,status,sort_order", CFG::$tblPrefix . "gallery", $where, $whereParam, $orderBy);
    }

    /**
     * get gallery record with its slug. 
     *
     * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
     */
    public function getGalleryData($id) {
        if ((int) $id != 0)
            return UTIL::getLanguageData("SELECT id,name,image_name,image_title,image_alt,status,sort_order FROM " . CFG::$tblPrefix . "gallery where id=" . $id);
    }

    /**
     *  Save gallery data if submitted
     *
     *  @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    public function saveGallery() {
        if (isset($_POST['name'])) {  //echo "<pre>";print_r($_POST);exit;
            $varTitle = trim($_POST['name']);

            if (isset($_POST['status']))
                $varStatus = '1';
            else
                $varStatus = '0';
            

            $sortOrder = "";
            if ($_POST['sortOrder'] == "") {
                $sortOrder = Core::maxId("gallery");
                $_POST['sortOrder'] = $sortOrder['maxId'] + 1;
            }

            // create array of fields
            $arrFields = array("name" => $_POST['name'], "image_name" => $_POST['flImage_hdn'], "image_title" => $_POST['flImage_title_hdn'][0], "image_alt" => $_POST['flImage_alt_hdn'][0], "status" => $varStatus, "sort_order" => $_POST['sortOrder']);

            // insert new record
            if (APP::$curId == "") {
                // store created and updated date
                $arrFields['created_date'] = date("Y-m-d H:i:s");
                $arrFields['updated_date'] = date("Y-m-d H:i:s");

                // insert record
                DB::insert(CFG::$tblPrefix . "gallery", StringManage::processString($arrFields));

                // get current id
                APP::$curId = DB::insertId();
            } else {
                // store updated date
                $arrFields['updated_date'] = date("Y-m-d H:i:s");

                // update record
                DB::update(CFG::$tblPrefix . "gallery", StringManage::processString($arrFields), " id=%d ", APP::$curId);
            }

            // pass action result
            $_SESSION["actionResult"] = array("success" => "Gallery has been saved successfully"); // different type success, info, warning, error

            if ($_POST['edit'] == 1)
                UTIL::redirect(URI::getURL(APP::$moduleName, "gallery_edit", APP::$curId, "lang_id=" . $_POST['lang_id']));
            else
                UTIL::redirect(URI::getURL(APP::$moduleName, "gallery_list"));
        }
    }

    /** Change Status of gallerys
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function changeStatus() {
        $newStatus = $_GET['newstatus'];

        foreach ($_POST['status'] as $key => $val) {
            DB::update(CFG::$tblPrefix . "gallery", array("status" => $newStatus), " id=%d ", $key);
        }
    }

    /** delete selected gallerys
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function deleteGallery() {
        foreach ($_POST['status'] as $key => $val) {
            $arrImages = DB::query("select image_name from " . CFG::$tblPrefix . "gallery where id=" . $key);

            foreach ($arrImages as $image) {
                UTIL::unlinkFile($image['image_name'], URI::getAbsMediaPath(CFG::$galleryDir));
            }

            DB::query("delete from " . CFG::$tblPrefix . "gallery where id=%d", $key);
        }
    }

    /** Save sort order of mahatma gallery
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function saveSortOrder() {
        $newValue = $_GET['val'];
        $id = $_GET['id'];
        DB::update(CFG::$tblPrefix . "gallery", array("sort_order" => $newValue), " id=%d ", $id);
    }

}