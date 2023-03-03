<?php

/* Banner model class. Contains all attributes and method related to banner.
 */
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class BannerModel {

    /** Store fields of banner record
      @var $fields array
     */
    public $records = array();

    /**
     * constructor of class Banner Model. do initialisation
     *
     * @author Amul Patel <amul.datatech@gmail.com>
     */
    function __construct($id = "") {
        
    }

    /**
     * get banner list. 
     *
     * @author Amul Patel <amul.datatech@gmail.com>
     */
    public function getBannerList() {
        $orderBy = "id desc";
        if (isset($_GET['o_type']))
            $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
        $whereParam = array();
//        $where = " s.action_id = ma.id and ma.action_type='front' and s.entity_id!=105 ";
        $where = " s.has_banner='1' ";
//        $where = " " ;
        if (isset($_GET['searchForm']['title']) && trim($_GET['searchForm']['title']) != "") {
            $where .= " and ma.name like %ss_title ";
            $whereParam["title"] = StringManage::processString($_GET['searchForm']['title']);
            $where .= " or if(s.entity_id = 0 , p.name like %ss_title2,1!=1) ";
            $whereParam["title2"] = StringManage::processString($_GET['searchForm']['title']);
        }
        if (isset($_GET['searchForm']['banner_name']) && trim($_GET['searchForm']['banner_name']) != "") {
            $where .= " and (s.slug like %ss_name OR IF(s.entity_id=0,ma.name,p.name) like %ss_name2 ) ";
            
            $whereParam["name"] = StringManage::processString($_GET['searchForm']['banner_name']);
            $whereParam["name2"] = StringManage::processString($_GET['searchForm']['banner_name']);
        }

//        UTIL::doPaging("totalBanners", "id,title,sort_order,status", CFG::$tblPrefix . "banner", $where, $whereParam, $orderBy);
//        UTIL::doPaging("totalBanners", "s.id as id,IF(s.entity_id=0,ma.name,p.name) as name", CFG::$tblPrefix . "slug as s left join " . CFG::$tblPrefix . "page as p on s.entity_id=p.id," . CFG::$tblPrefix . "module_action as ma", $where, $whereParam, $orderBy);
        UTIL::doPaging("totalBanners", "s.id as id,ab.status , IF(s.entity_id=0,ma.name,p.name) as name,s.slug", CFG::$tblPrefix . "slug as s left join " . CFG::$tblPrefix . "page as p on s.entity_id=p.id left join " . CFG::$tblPrefix . "module_action as ma ON ma.id = s.`action_id` left join ". CFG::$tblPrefix . "banner as ab on ab.slug_id = s.id ", $where, $whereParam, $orderBy);
    }

    /**
     * Returns front actions
     *
     * @author Amul Patel <amul.datatech@gmail.com>
     */
    public function actionArray() {

        $row = DB::query("SELECT s.id as id,IF(s.entity_id=0,ma.name,p.name) as name FROM " . CFG::$tblPrefix . "slug as s left join " . CFG::$tblPrefix . "page as p on s.entity_id=p.id," . CFG::$tblPrefix . "module_action as ma where s.action_id = ma.id and ma.action_type='front'");

        foreach ($row as $action_id) {

            $action[$action_id['id']] = $action_id['name'];
        }
        return $action;
    }

    /**
     * get banner records. 
     *
     * @author Amul Patel <amul.datatech@gmail.com>
     */
    public function getBannerData($id) {
        
        return DB::queryFirstRow("SELECT * FROM " . CFG::$tblPrefix . "banner  where slug_id=%d ", $id);
    }
    
    public function getPageName($id) {
        $pageName = DB::queryFirstRow("select s.id as id,IF(s.entity_id=0,ma.name,p.name) as name,s.slug from " . CFG::$tblPrefix . "slug as s left join " . CFG::$tblPrefix . "page as p on s.entity_id=p.id left join " . CFG::$tblPrefix . "module_action as ma ON ma.id = s.`action_id`  where  s.has_banner ='1' AND s.id=%d", $id);
       
        return $pageName;
    }

    /**
     *  Save banner data if submitted
     *
     *  @author Amul Patel <amul.datatech@gmail.com>
     */
    public function saveBanner() {
        //print_r($_REQUEST);
        //exit;
        if (isset($_POST['flImage_hdn']) || $_POST['title'] != '') {
            if (isset($_POST['status']) == false) {
                $_POST['status'] = "0";
            }
           
            $arrFields = array("image_name" => $_POST['flImage_hdn'], "status" => $_POST['status'], "slug_id" => APP::$curId ,"image_title" => $_POST['flImage_title_hdn'][0],"image_alt" => $_POST['flImage_alt_hdn'][0] );
            
            if (isset(APP::$curId) && !empty(APP::$curId)) {
                DB::query("delete from " . CFG::$tblPrefix . "banner where slug_id=%d", APP::$curId);
                $arrFields['created_date'] = date("Y-m-d H:i:s");
                DB::insert(CFG::$tblPrefix . "banner", StringManage::processString($arrFields));
                
            }
            // pass action result
            $_SESSION["actionResult"] = array("success" => "Banner has been saved successfully");

            if ($_POST['edit'] == 1)
                UTIL::redirect(URI::getURL(APP::$moduleName, "banner_edit", APP::$curId));
            else
                UTIL::redirect(URI::getURL(APP::$moduleName, "banner_list"));
        }
        
        
    }

    /** Change Status of banner
     *
     * @author Amul Patel <amul.datatech@gmail.com>
     */
    function changeStatus() {
        $newStatus = $_GET['newstatus'];

        foreach ($_POST['status'] as $key => $val) {
            DB::update(CFG::$tblPrefix . "banner", array("status" => $newStatus), " id=%d ", $key);
        }
    }

    /** delete selected banners
     *
     * @author Amul Patel <amul.datatech@gmail.com>
     */
    function deleteBanner() {

        foreach ($_POST['status'] as $key => $val) {
            if ($this->deleteImage($key) == true) {
                DB::delete(CFG::$tblPrefix . "banner", "id=%d ", $key);
            } else {
                DB::delete(CFG::$tblPrefix . "banner", "id=%d ", $key);
            }
        }
    }

    /**
     * delete  banner image permanently
     * 
     * @author Amul Patel <amul.datatech@gmail.com>	
     */
    function deleteImage($id) {
        $img = DB::query("select image_name from " . CFG::$tblPrefix . "banner where id=" . $id);
        $imagePath = URI::getAbsMediaPath(Banner::$bannerImageDir . "/" . $img[0]['image_name']);

        // delete image
        if (file_exists($imagePath) && is_file($imagePath)) {
            unlink($imagePath);
            return true;
        } else {
            return false;
        }
    }

    function getActions() {
        $defaultActionId = (int) $this->getDefaultActionId();
       
        $this->records = DB::query("SELECT s.id as id,IF(s.entity_id=0,ma.name,p.name) as name FROM " . CFG::$tblPrefix . "slug as s left join " . CFG::$tblPrefix . "page as p on s.entity_id=p.id," . CFG::$tblPrefix . "module_action as ma where s.action_id = ma.id and  s.id not in (select slug_id from " . CFG::$tblPrefix . "banner) and ma.action_type='front' and ma.id <> 1 and ma.id <> " . $defaultActionId);
    }

    function getDefaultActionId() {
        $defaultAction = DB::queryFirstRow("select id from " . CFG::$tblPrefix . "module_action where default_action='front'");
        return $defaultAction['id'];
    }
    
    function saveSortOrder()
   {
     $newValue=$_GET['val'];
     
     $id=$_GET['id'];
     DB::update(CFG::$tblPrefix."banner",array("sort_order" => $newValue)," id=%d ",$id);
   }

}