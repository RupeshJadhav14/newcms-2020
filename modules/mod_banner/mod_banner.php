<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
//        error_reporting(E_ALL);
	class Banner
	{
		
		/**
		 * variables for assigning image direcotry in media folder and storing path so that can accessible in all views of this module and blocks
		 *
		 * @author Kushan Antani <kushan.datatechmedia@gmail.com>
		 */
		 
		public static $bannerImageDir = "banner";
		
	    public static $bannerImagePath="";
	
		/**
			Store all front actions
		*/
		public static $action=array();
		/**
		 * constructor of class Banner Model. do initialisation
		 *
		 * @author Amul Patel <amul.datatech@gmail.com>
		 */ 
		 
		function __construct()
		{		
			Banner::$bannerImagePath=CFG::$livePath."/".CFG::$mediaDir."/".Banner::$bannerImageDir;
			
			// load model
			Load::loadModel("banner");
	
			// create model object
			$bannerObj = new BannerModel();
			Banner::$action=$bannerObj->actionArray();
		}
		
		
		/**
		 * List all banners in admin section
		 *
	     * @author Amul Patel <amul.datatech@gmail.com>		
		 */
		function banner_list()
		{	
		
			// load model
			Load::loadModel("banner");
			
			// create model object
			$bannerObj = new BannerModel();
			
			// get banner listing
			$data = $bannerObj->getBannerList();
			
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/banner.php");
			
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
						
			// render layout
			
			Layout::renderLayout($data);
		}
		
		/**
		 * banner add/edit
		 *
	 	 * @author Kushan Antani <kushan.datatechmedia@gmail.com>>
		 */
		function banner_edit()
		{	
                    
		
			// load model
			Load::loadModel("banner");
			
			// create model object
			$bannerObj = new BannerModel();
		 	
			// save banner record is submitted
			$bannerObj->saveBanner();
			
			// get  banner record for update
			$bannerData = $bannerObj->getBannerData(APP::$curId);
                        
                        $data = $bannerObj->getPageName(APP::$curId);
        
                      //  print_r($bannerData);exit;
			
			//get actions
		//	$bannerObj->getActions();
			
                        $bannerObj->records = $bannerObj->getPageName(APP::$curId);
			$data = array("data"=>$bannerObj->records);
			
                      
			//this is used in ajax to check whether selected id  is home or not in action table
			if(isset($_GET['banner_id']) && $_GET['banner_id']!=0)
			{
				     echo json_encode(array("result"=>"true"));
					 exit;	 
			}
		
			 
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/banner_edit.php",$bannerData);			
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout($data);
		}
		
		/* Change status of banner
		 *
		 * @author Kushan Antani <kushan.datatechmedia@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("banner");
			
			// create model object
			$bannerObj = new BannerModel();
			
			//change status
			$bannerObj->changeStatus();
			
			echo json_encode(array("result" => "success","title"=>"Banner Status","message"=>"Banner(s) status have been changed successfully"));
			exit;
		}
		
		/* Delete selected banners
		 *
		 * @author Kushan Antani <kushan.datatechmedia@gmail.com>
		 */
		function delete_banner()
		{
			// load model
			Load::loadModel("banner");
			
			// create model object
			$bannerObj = new BannerModel();
			
			//change status
			$bannerObj->deleteBanner();
			
			echo json_encode(array("result" => "success","title"=>"Delete Banner","message"=>"Banner(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete banner image and also update database
		 *
		 * @author Kushan Antani <kushan.datatechmedia@gmail.com>
		 */
		function delete_image()
		{
			// create image path
			$imagePath = URI::getAbsMediaPath($_GET['folder']."/".$_GET['filename']);
			
			// delete image
			if(file_exists($imagePath) && is_file($imagePath))
				unlink($imagePath);			
				
			// update database if id is passed
			if(APP::$curId != "")
			{
				switch($_GET['upload'])
				 {
					case "image_name":
					$arrFields = array("image_name" => "");
					break;
				 }
				
				
				DB::update(CFG::$tblPrefix."banner",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
                
                function save_sortorder()
		{			
                    // load model
                    Load::loadModel("banner");

                    // create model object
                    $bannerObj = new BannerModel();

                    //sort order
                    $bannerObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "Banner","message" => "Sort order has been saved successfully"));
                    exit;
		}
                
                function delete_file()
		{			
                        // delete image                    
                        UTIL::unlinkFile($_GET['filename'],URI::getAbsMediaPath(CFG::$bannerDir));
				
			// update database if id is passed
			if(APP::$curId != "")
			{
                            $arrFields = array("image_name" => "");
                            DB::update(CFG::$tblPrefix."banner",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
		
	  
	}