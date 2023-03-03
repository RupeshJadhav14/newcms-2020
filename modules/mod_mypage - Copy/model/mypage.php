<?php

/* Page model class. Contains all attributes and method related to page.
 */
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class MypageModel {

    /** Store fields of Page record
      @var $fields array
     */
	 
	 
	 
    public $records = array();

    /**
     * constructor of class PageModel. do initialisation
     *
     * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
     */
    function __construct($id = "") {
       
        if ($id != "") {
            $this->getMyPageById($id);
        }
    }
    
	
	 
	 public function test()
   {
           echo "test";
		   exit;
   }		
	
		
    /**
	
	
	
    * get Page detail by its id
    *
    * @param int $id page id
    * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */
	
   public function getMyPageById($id)
   {
           $this->records = DB::queryFirstRow("SELECT * FROM ".CFG::$tblPrefix."mypage where status='1' and id=%d limit 1",$id);
   }		
	
	
	
	
	
	

   
    /**
     * get record list. 
     *
     * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
     */
	 
    public function getMyPageList() {
        
         
        $orderBy = "id desc";
        if (isset($_GET['o_type']))
            $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];
        $where = "";
        $whereParam = array();

        if(isset($_GET['searchForm']['page_name']) && trim($_GET['searchForm']['page_name'])!="")
        {
              
                $where .= " name like %ss_name ";
                $whereParam["name"] = StringManage::processString($_GET['searchForm']['page_name']);
        }
		
        UTIL::doPaging("totalPages", "id,image_name,name,slug,status,sort_order", CFG::$tblPrefix . "mypage", $where, $whereParam, $orderBy);
    }
	
	 /**
     * get all  record list. 
     *
     * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
     */
	 
    public function getAllMyPageList() {
        
         
	$list = array();	 
		 
    $list = DB::query("SELECT * FROM ".CFG::$tblPrefix."mypage where status='1'");
	   
	   return $list;
	   
    }
	
	
	
	 /**
     * get all  record list. 
     *
     * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
     */
	 
    public function getMyPageSingle($id) 
	{
        
         
	$list = array();	 
		 
    $list = DB::queryFirstRow("SELECT * FROM ".CFG::$tblPrefix."mypage where status='1' and id=%d limit 1",$id);
	   
	   return $list;
	   
    }
    
    /**
    * get page record with its slug. 
    *
    * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */
	
   public function getMyPageData($id)
   {
	   
			if(!$id)
			{
				$id = 0;	
			}
			
		   $qry='';
				
		   $qry = "SELECT p.id,p.name,p.category_id,s.slug,p.description,p.image_name,p.image_title,p.image_alt,p.gallery_image,p.meta_title,p.meta_description,p.meta_keyword,p.sort_order,p.status FROM ".CFG::$tblPrefix."mypage as p left join ".CFG::$tblPrefix."slug as s on p.id=s.entity_id and s.module_key = '".APP::$moduleName."' where p.id=".$id;
			
	   //echo $qry;
        return UTIL::getLanguageData($qry);
	   
   }

   /**
    *  Save page data if submitted
    *
    *  @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */
   public function saveMyPage()
   {
           if(isset($_POST['name']))
           {		//echo "<pre>";print_r($_POST);exit;
                   $varSlug = trim($_POST['slug']);

                   if($varSlug == "")
                           $varSlug = $_POST['name'];
                   
                   if(isset($_POST['status']))
                        $varStatus = '1';
                   else
                        $varStatus = '0';
                   
                    $sortOrder = "";
			if($_POST['txtSortOrder'] == "") {
				$sortOrder = Core::maxId("mypage");
				$_POST['txtSortOrder'] = $sortOrder['maxId'] + 1;
			}                    
                   
                   // create gallery data array
                   $galleryData = array();
                   
                   // fill gallery data if uploaded
                   if(isset($_POST['image2_hdn']))
                   {
                       $galleryData = array_map("UTIL::combineValueInArray",$_POST['image2_hdn'],$_POST['image2_sort_hdn'],$_POST['image2_title_hdn'],$_POST['image2_alt_hdn']);
                   }
                   
                   // create array of fields
                   $arrFields = array("name" => $_POST['name'],"category_id" => $_POST['cmbCategory'],"slug"=>$_POST['slug'],"description" => $_POST['txaDescription'],"image_name" => $_POST['flImage_hdn'],"image_title" => $_POST['flImage_title_hdn'][0],"image_alt" => $_POST['flImage_alt_hdn'][0],"gallery_image" => json_encode($galleryData),"meta_title" => $_POST['meta_title'],"meta_description" => $_POST['meta_description'],"meta_keyword" => $_POST['meta_keyword'],"sort_order"=>$_POST['txtSortOrder'],"status" => $varStatus,"user_id" => $_SESSION[CFG::$session_key]["id"]);

                   // insert new record
                   if(APP::$curId == "")
                   {                           
                           // store created and updated date
                           $arrFields['created_date'] = date("Y-m-d H:i:s");
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");

							//echo "<pre>";
							//print_r($arrFields);
							//exit;

                           // insert record
                           DB::insert(CFG::$tblPrefix."mypage",StringManage::processString($arrFields));

                           // get current id
                           APP::$curId = DB::insertId();
                           
                           // save slug
                           Core::saveSlug($varSlug,APP::$curId,"mod_mypage","view_mypage");
                           
                   }
                   else
                   {	                              
                           // store updated date
                           $arrFields['updated_date'] = date("Y-m-d H:i:s");                           

							
							
                           // update record
                           DB::update(CFG::$tblPrefix."mypage",StringManage::processString($arrFields)," id=%d ",APP::$curId);
                           
                           // update slug
                           Core::updateSlug($varSlug,APP::$curId,false,"mod_mypage","view_mypage");
                   }

                   // pass action result
                   $_SESSION["actionResult"] = array("success" => "MyPage has been saved successfully"); // different type success, info, warning, error

                   if($_POST['edit'] == 1)
                           UTIL::redirect(URI::getURL(APP::$moduleName,"mypage_edit",APP::$curId));
                   else
                           UTIL::redirect(URI::getURL(APP::$moduleName,"mypage_list"));
           }
   }

   /** Change Status of pages
    *
    * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */
   function changeStatus()
   {
           $newStatus = $_GET['newstatus'];

			//print_r($_POST);
			//exit;

           foreach($_POST['status'] as $key => $val)
           {
                   DB::update(CFG::$tblPrefix."mypage",array("status" => $newStatus)," id=%d ",$key);
           }
   }
	/** Display Menu on this page
    *
    * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */


   /*function displayMenu()
   {
			$dataRecords = array();	
			$productRecords = array();
            $data['menu'] = DB::query("SELECT name FROM ".CFG::$tblPrefix."module_action WHERE admin_menu = '1'");
			
			$data['dataRecords'] = DB::query("SELECT id,name,image,slug FROM ".CFG::$tblPrefix."category");
			
			$data['productRecords'] = DB::query("SELECT p.id,p.name,p.slug,p.category FROM ".CFG::$tblPrefix."product as p LEFT JOIN ". CFG::$tblPrefix."category as c ON p.category = c.id");
			
			$data['combine'] = array_merge($data['dataRecords'],$data['menu']);
			return $data;
   }*/

   
   
 

   /** delete selected pages
    *
    * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */
   function deleteMyPage()
   {
           foreach($_POST['status'] as $key => $val)
           {               
                $record = DB::queryFirstRow("SELECT image_name,gallery_image FROM ".CFG::$tblPrefix."mypage where id=%d",$key);
                
				
                // delete uploaded image
                UTIL::unlinkFile($record['image_name'],URI::getAbsMediaPath(CFG::$mypageDir));
                
				
				
                // delete uploaded gallery
                if(!empty($record['gallery_image'])){
                    $arrImage = json_decode($record['gallery_image']);
                    foreach($arrImage as $image)
                        UTIL::unlinkFile($image->name,URI::getAbsMediaPath(CFG::$pageGalleryDir));                    
                }
                
                DB::query("delete from ".CFG::$tblPrefix."mypage where id=%d",$key);
				//DB::query("delete from ".CFG::$tblPrefix."slug where entity_id='mod_mypage' and entity_id=%d",$key); 	
				
           }
   }
   
   /** Save sort order of mahatma slider
    *
    * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
    */
   function saveSortOrder()
   {
	  // echo "Test work"; exit;
     $newValue=$_GET['val'];
     $id=$_GET['id'];
     DB::update(CFG::$tblPrefix."mypage",array("sort_order" => $newValue)," id=%d ",$id);
	 
   }
   
   
      public function bannerImages() {
        $record = "";
        $data = array();
        $curSlug = APP::$slugParts[0];
        
        
        
        if($curSlug == 'news')
        {
            $curSlug = 'news-page';
        }
        $record = DB::queryFirstRow("select id from " . CFG::$tblPrefix . "slug where slug = '" . $curSlug . "'");
        if (isset($record['id']) && !empty($record['id'])) {
            $data = DB::queryFirstRow("SELECT image_name FROM " . CFG::$tblPrefix . "banner WHERE image_name <> '' AND status='1' and slug_id=" . $record['id']);
        }
        //echo "SELECT image_name FROM " . CFG::$tblPrefix . "banner WHERE image_name <> '' AND status='1' and slug_id=" . $record['id'];
        
        
        return $data;
    }
}