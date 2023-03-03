<?php

/* Testimonial model class. Contains all attributes and method related to testimonial.
 */
//restrict direct access to the testimonial
defined('DMCCMS') or die('Unauthorized access');

class TestimonialModel {

    /** Store fields of Testimonial record
      @var $fields array
     */
    public $records = array();

    /**
     * constructor of class TestimonialModel. do initialisation
     *
     * @author Hitendra Makwana <hitendra.seorank@gmail.com>
     */
    function __construct($id = "") {
       
    }
    
    /**
    * get Testimonial detail by its id
    *
    * @param int $id testimonial id
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   public function getTestimonialById($id)
   {
           $this->records = DB::queryFirstRow("SELECT customer_name,description,status FROM ".CFG::$tblPrefix."testimonial where status='1' and is_deleted='0' and id=%d limit 1",$id);
   }		
	
    /**
     * get testimonial record list. 
     *
     * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
     */
    public function getTestimonialList() {
        $orderBy = "id desc";
        if (isset($_GET['o_type']))
            $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
        $where = "";
        $whereParam = array();

        if(isset($_GET['searchForm']['testimonial_name']) && trim($_GET['searchForm']['testimonial_name'])!="")
        {
                $where .= "  customer_name like %ss_sortOrder ";
                $whereParam["sortOrder"] = StringManage::processString($_GET['searchForm']['testimonial_name']);
        }

        UTIL::doPaging("totalPages", "id,customer_name,status,sort_order", CFG::$tblPrefix . "testimonial", $where, $whereParam, $orderBy);
    }
    
    /**
    * get testimonial record with its slug. 
    *
    * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
    */
   public function getTestimonialData($id)
   {    
       if((int)$id != 0)
        return UTIL::getLanguageData("SELECT id,customer_name,description,status,sort_order FROM ".CFG::$tblPrefix."testimonial where id=".$id);
   }

   /**
    *  Save testimonial data if submitted
    *
    *  @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   public function saveTestimonial()
   {
           if(isset($_POST['title']))
           {		
	   
				// DB::debugMode();
	   
				//echo "<pre>";print_r($_POST);exit;
                   $varTitle = trim($_POST['title']);
                   
                   if(isset($_POST['status']))
                        $varStatus = '1';
                   else
                        $varStatus = '0';
						
                    $sortOrder = "";
                    if($_POST['sortOrder'] == "")
                    {
                            $sortOrder = Core::maxId("testimonial");
                            $_POST['sortOrder'] = $sortOrder['maxId'] + 1;
                    }                              
                   
                   // create array of fields
				   //$_POST['txaDescription'] = htmlentities($_POST['txaDescription']);
                   $arrFields = array("customer_name" => $_POST['title'],"description" =>$_POST['txaDescription'],"status" => $varStatus,"sort_order" => $_POST['sortOrder']);

                   // insert new record
                   if(APP::$curId == "")
                   {
                           // store created and updated date
                           $arrFields['created_date'] = date("Y-m-d H:i:s");
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");
                           
                           // insert record
                           DB::insert(CFG::$tblPrefix."testimonial",StringManage::processString($arrFields));

                           // get current id
                           APP::$curId = DB::insertId();                           
                   }
                   else
                   {	
                           // store updated date
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");

                           // update record
                           DB::update(CFG::$tblPrefix."testimonial",StringManage::processString($arrFields)," id=%d ",APP::$curId);
						   
                   }

                   // pass action result
                   $_SESSION["actionResult"] = array("success" => "Testimonial has been saved successfully"); // different type success, info, warning, error

                   if($_POST['edit'] == 1)
                           UTIL::redirect(URI::getURL(APP::$moduleName,"testimonial_edit",APP::$curId,"lang_id=".$_POST['lang_id']));
                   else
                           UTIL::redirect(URI::getURL(APP::$moduleName,"testimonial_list"));
           }
   }

   /** Change Status of testimonials
    *
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   function changeStatus()
   {
           $newStatus = $_GET['newstatus'];

           foreach($_POST['status'] as $key => $val)
           {
                   DB::update(CFG::$tblPrefix."testimonial",array("status" => $newStatus)," id=%d ",$key);
           }
   }

           /** delete selected testimonials
    *
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   function deleteTestimonial()
   {
           foreach($_POST['status'] as $key => $val)
           {
                DB::query("delete from ".CFG::$tblPrefix."testimonial where id=%d",$key);  
           }
   }
   
   /** Save sort order of mahatma testimonial
    *
    * @author Hitendra Makwana <hitendra.seorank@gmail.com>
    */
   function saveSortOrder()
   {
     $newValue=$_GET['val'];
     $id=$_GET['id'];
     DB::update(CFG::$tblPrefix."testimonial",array("sort_order" => $newValue)," id=%d ",$id);
   }
}