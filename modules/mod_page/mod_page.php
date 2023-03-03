<?php 
	//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );

class Page
{
	/**
	 * constructor of class Page. do initialisation
	 *
	 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
	 */
	function __construct()
	{

	}

		/**
		 * List all available page
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function page_list()
		{
			// load model
			Load::loadModel("page");
			
			// create model object
			$pageObj = new PageModel();
			
			// get page listing
			$pageObj->getPageList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/page.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
		
		/**
		 * page add/edit
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function page_edit()
		{	
			// load model
			Load::loadModel("page");

			// create model object
			$pageObj = new PageModel();

			// save page record is submitted
			$pageObj->savePage();

			// get page record for update
			$pageData = $pageObj->getPageData(APP::$curId);

			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/page_edit.php",$pageData);			

			// create javascript variable for ajax url			
			Layout::addFooter($jsData);

			// render layout
			Layout::renderLayout();
		}

		/* Change status of page
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("page");

			// create model object
			$pageObj = new PageModel();

			//change status
			$pageObj->changeStatus();

			$msg = "Page(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Page(s) status have been inactivated successfully";

			echo json_encode(array("result" => "success","title" => "Page Status","message" => $msg));
			exit;
		}

		/* Delete selected pages
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function delete_page()
		{
			// load model
			Load::loadModel("page");
			
			// create model object
			$pageObj = new PageModel();
			
			//change status
			$pageObj->deletePage();
			
			echo json_encode(array("result" => "success","title" => "Delete Page","message" => "Page(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete page image and also update database
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function delete_file()
		{			
						// delete image                    
			UTIL::unlinkFile($_GET['filename'],URI::getAbsMediaPath(CFG::$pageDir));
			
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."page",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
		
		/** Delete gallery image
		 * 
		 *  @author Rutwik Avasthi <php.datatechmedia@gamil.com>
		 */
		function delete_gallery()
		{
					// delete image                    
			UTIL::unlinkFile($_GET['filename'],URI::getAbsMediaPath(CFG::$pageGalleryDir));

					// update database if id is passed
			if(APP::$curId != "")
			{
				$record = DB::queryFirstRow("SELECT gallery_image FROM ".CFG::$tblPrefix."page where id=%d",APP::$curId);                                                
				$arrFields = array("gallery_image" => json_encode(UTIL::removeFileFromArray(json_decode($record['gallery_image']),$_GET['filename'])));
				DB::update(CFG::$tblPrefix."page",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}

		/* Home page action
		 * 
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com> 
		 */
		 
		 /*
		function bloglist()
		{       
		
			//echo  "bloglist run from here";
			//exit;
			Load::loadModel("page");
			$pageObj = new PageModel();
			
			//change status
			
			//$data = $pageObj->displayMenu();
			//$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/home.php");

			   // include js in footer
			
			
			// create javascript variable for ajax url			
			//Layout::addFooter($jsData);                        
			
			// render layout
			Layout::renderLayout();
		}  
		 */
		function home()
		{       
		
			//echo  "home run from here";
			//exit;
			Load::loadModel("page");
			$pageObj = new PageModel();
			
			//change status
			
			//$data = $pageObj->displayMenu();
			//$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/home.php");

			   // include js in footer
			
			
			// create javascript variable for ajax url			
			//Layout::addFooter($jsData);                        
			
			// render layout
			Layout::renderLayout();
		} 

		function records()
		{       
			Load::loadModel("page");
			$pageObj = new PageModel();
			
			//change status
			//$data = $pageObj->displayMenu();
			

			// include js in footer
			//	$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/home.php");			
			
			// create javascript variable for ajax url			
			Layout::addFooter();                        
			
			// render layout
			Layout::renderLayout();
		} 
		
		/** Save sort order of slider
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function save_sortorder()
		{			
					// load model
			Load::loadModel("page");

					// create model object
			$pageObj = new PageModel();

					//sort order
			$pageObj->saveSortOrder();

			echo json_encode(array("result" => "success","title" => "Page","message" => "Sort order has been saved successfully"));
			exit;
		}


		function view_page()
		{

			// load model
			Load::loadModel("page");

			// create model object
			$pageObj = new PageModel(APP::$curId);
			

			$data = array("data" => $pageObj);
					// render layout
			Layout::renderLayout($data);
		}
		
		function front_view_page()
		{
			Load::loadModel("page");
			$slug = $_REQUEST['slug'];
			
			
			$pageObj = new PageModel();

			$page = $pageObj->getPageBySlug($slug);
			
			if(!$page)
			{
				$file = CFG::$livePath."/".CFG::$modules."/mod_page/".CFG::$view."/".$slug.".php";
				$content = file_get_contents($file);
				$page['name']=ucfirst($slug);
				$page['description']=$content;
			}
			
		
			
			echo json_encode(array("result" => "success","title" => "Page", "page" => $page,"message" => "Sort order has been saved successfully"));
			exit;

		}
		

	}