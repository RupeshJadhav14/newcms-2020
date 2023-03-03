<?php

/* Comment model class. Contains all attributes and method related to Comment.
 */
//restrict direct access to the Comment
defined('DMCCMS') or die('Unauthorized access');

class CommentModel {

    /** Store fields of Comment record
      @var $fields array
     */
    public $records = array();

    /**
     * constructor of class CommentModel. do initialisation
     *
     * @author Hitendra Makwana <hitendra.seorank@gmail.com>
     */
    function __construct($id = "") {
       
    }
    
    /**
    * get Comment detail by its id
    *
    * @param int $id Comment id
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   public function getCommentById($id)
   {
           $this->records = DB::queryFirstRow("SELECT blog_id,customer_name,description,status FROM ".CFG::$tblPrefix."Comment where status='1' and is_deleted='0' and id=%d limit 1",$id);
   }		
	
    /**
     * get Comment record list. 
     *
     * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
     */
    public function getCommentList() {
        $orderBy = "id desc";
        if (isset($_GET['o_type']))
            $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
        $where = "";
        $whereParam = array();

        if(isset($_GET['searchForm']['comment_name']) && trim($_GET['searchForm']['comment_name'])!="")
        {
                $where .= "  customer_name like %ss_sortOrder ";
                $whereParam["sortOrder"] = StringManage::processString($_GET['searchForm']['comment_name']);
        }

        UTIL::doPaging("totalPages", "id,blog_id,customer_name,status,sort_order", CFG::$tblPrefix . "comment", $where, $whereParam, $orderBy);
    }
    
    /**
    * get Comment record with its slug. 
    *
    * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
    */
   public function getCommentData($id)
   {    
       if((int)$id != 0)
        return UTIL::getLanguageData("SELECT id,blog_id,customer_name,description,status,sort_order FROM ".CFG::$tblPrefix."Comment where id=".$id);
   }

	 public function saveFrontComment()
   {
			if(isset($_POST['title']))
           {		//echo "<pre>";print_r($_POST);exit;
                   $varTitle = trim($_POST['title']);
                   
                   if(isset($_POST['status']))
                        $varStatus = '1';
                   else
                        $varStatus = '0';
						
                    $sortOrder = "";
                    if($_POST['sortOrder'] == "")
                    {
                            $sortOrder = Core::maxId("comment");
                            $_POST['sortOrder'] = $sortOrder['maxId'] + 1;
                    }                              
                   
                   // create array of fields
                   $arrFields = array("blog_id" => $_POST['blog_id'],"customer_name" => $_POST['title'],"description" => $_POST['shortDesc'],"status" => $varStatus,"sort_order" => $_POST['sortOrder']);

                   // insert new record
                   if(APP::$curId == "")
                   {
                           // store created and updated date
                           $arrFields['created_date'] = date("Y-m-d H:i:s");
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");
                           
                           // insert record
                           DB::insert(CFG::$tblPrefix."comment",StringManage::processString($arrFields));

                           // get current id
                           APP::$curId = DB::insertId();                           
                   }
                   else
                   {	
                           // store updated date
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");

                           // update record
                           DB::update(CFG::$tblPrefix."comment",StringManage::processString($arrFields)," id=%d ",APP::$curId);
                   }

                   // pass action result
                   $_SESSION["actionResult"] = array("success" => "Comment has been saved successfully"); // different type success, info, warning, error

           }
   }

   /**
    *  Save Comment data if submitted
    *
    *  @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   public function saveComment()
   {
           if(isset($_POST['title']))
           {		//echo "<pre>";print_r($_POST);exit;
                   $varTitle = trim($_POST['title']);
                   
                   if(isset($_POST['status']))
                        $varStatus = '1';
                   else
                        $varStatus = '0';
						
                    $sortOrder = "";
                    if($_POST['sortOrder'] == "")
                    {
                            $sortOrder = Core::maxId("comment");
                            $_POST['sortOrder'] = $sortOrder['maxId'] + 1;
                    }                              
                   
                   // create array of fields
                   $arrFields = array("blog_id" => $_POST['blog_id'],"customer_name" => $_POST['title'],"description" => $_POST['shortDesc'],"status" => $varStatus,"sort_order" => $_POST['sortOrder']);

                   // insert new record
                   if(APP::$curId == "")
                   {
                           // store created and updated date
                           $arrFields['created_date'] = date("Y-m-d H:i:s");
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");
                           
                           // insert record
                           DB::insert(CFG::$tblPrefix."comment",StringManage::processString($arrFields));

                           // get current id
                           APP::$curId = DB::insertId();                           
                   }
                   else
                   {	
                           // store updated date
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");

                           // update record
                           DB::update(CFG::$tblPrefix."comment",StringManage::processString($arrFields)," id=%d ",APP::$curId);
                   }

                   // pass action result
                   $_SESSION["actionResult"] = array("success" => "Comment has been saved successfully"); // different type success, info, warning, error

                   if($_POST['edit'] == 1)
                           UTIL::redirect(URI::getURL(APP::$moduleName,"comment_edit",APP::$curId,"lang_id=".$_POST['lang_id']));
                   else
                           UTIL::redirect(URI::getURL(APP::$moduleName,"comment_list"));
           }
   }

   /** Change Status of Comments
    *
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   function changeStatus()
   {
           $newStatus = $_GET['newstatus'];

           foreach($_POST['status'] as $key => $val)
           {
                   DB::update(CFG::$tblPrefix."comment",array("status" => $newStatus)," id=%d ",$key);
           }
   }

           /** delete selected Comments
    *
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   function deleteComment()
   {
           foreach($_POST['status'] as $key => $val)
           {
                DB::query("delete from ".CFG::$tblPrefix."comment where id=%d",$key);  
           }
   }
   
   /** Save sort order of mahatma Comment
    *
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   function saveSortOrder()
   {
     $newValue=$_GET['val'];
     $id=$_GET['id'];
     DB::update(CFG::$tblPrefix."comment",array("sort_order" => $newValue)," id=%d ",$id);
   }
}