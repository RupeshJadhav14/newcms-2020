<?php 
	//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );



class Mypage
{
	/**
	 * constructor of class Page. do initialisation
	 *
	 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
	 */
	function __construct()
	{

	}
	
	public function test()
	{
           echo "test";
		   exit;
	}

		/**
		 * List all available page
		 *
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
		 */
		function mypage_list()
		{
			
			
			// load model
			Load::loadModel("mypage");
			
			// create model object
			$mypageObj = new MypageModel();
			
			
			
			// get page listing
			$mypageObj->getMyPageList();
			
			
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/mypage.php");
			
			//print_r($jsData);exit;
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
		
		/**
		 * page add/edit
		 *
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
		 */
		function mypage_edit()
		{	
			// load model
			Load::loadModel("mypage");
			
			// create model object
			$mypageObj = new MypageModel();
			
			// save page record is submitted
			$mypageObj->saveMyPage();

			// get page record for update
			$mypageData = $mypageObj->getMyPageData(APP::$curId);


			//print_r($mypageData);exit;
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/mypage_edit.php",$mypageData);			

			// create javascript variable for ajax url			
			Layout::addFooter($jsData);

			// render layout
			Layout::renderLayout();
		}

		/* Change status of page
		 *
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("mypage");

			// create model object
			$mypageObj = new MypageModel();

			//change status
			$mypageObj->changeStatus();

			$msg = "Page(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Page(s) status have been inactivated successfully";

			echo json_encode(array("result" => "success","title" => "Page Status","message" => $msg));
			exit;
		}

		/* Delete selected pages
		 *
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
		 */
		function delete_mypage()
		{
			// load model
			Load::loadModel("mypage");
			
			// create model object
			$mypageObj = new MypageModel();
			
			//change status
			$mypageObj->deleteMyPage();
			
			echo json_encode(array("result" => "success","title" => "Delete Page","message" => "Page(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete page image and also update database
		 *
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
		 */
		function delete_file()
		{		
		
			// delete image                    
			UTIL::unlinkFile($_GET['filename'],URI::getAbsMediaPath(CFG::$mypageDir));
			
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."mypage",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
		
		/** Delete gallery image
		 * 
		 *  @author Bhavesh Prajapati <bhavesh.webential@gmail.com>
		 */
		function delete_gallery()
		{
					// delete image                    
			UTIL::unlinkFile($_GET['filename'],URI::getAbsMediaPath(CFG::$pageGalleryDir));

					// update database if id is passed
			if(APP::$curId != "")
			{
				$record = DB::queryFirstRow("SELECT gallery_image FROM ".CFG::$tblPrefix."mypage where id=%d",APP::$curId);                                                
				$arrFields = array("gallery_image" => json_encode(UTIL::removeFileFromArray(json_decode($record['gallery_image']),$_GET['filename'])));
				DB::update(CFG::$tblPrefix."mypage",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}

		/* Home page action
		 * 
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com> 
		 */
		 
		 
				
		
		function bloglist()
		{       
			// load model
			Load::loadModel("mypage");

			// create model object
			
			
			$data = array();
		
				if($_GET['page'])
				{	
				$mypageObj = new MypageModel();
				$start = '1';
				$sort_order = 'DESC';
				$sort_by = 'id';
				// get page listing
				$list =  $mypageObj->getAllMyPageList($start,$sort_by,$sort_order);
			
				
				//echo "<pre>";
				//print_r($list);exit;
				
				//header('Content-Type: application/json');
				echo json_encode($list);
				exit;
				
				
				}
			
			
			

			//$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/mypage.php");
			
			//print_r($jsData);exit;
			
			// create javascript variable for ajax url	
			
			
			//Layout::addFooter($list);
			
			
			// render layout
			Layout::renderLayout($data);
		} 
		
		function load_mypage_data_html()
		{
			Load::loadModel("mypage");
	
			// create model object
			$mypageObj = new MypageModel();
			$start = '1';
			$sort_order = 'DESC';
			$sort_by = 'id';
			// get page listing
			$list =  $mypageObj->getAllMyPageList($start,$sort_by,$sort_order);
			exit;
			
		}
		
		function view_mypage()
		{
			

			// load model
			Load::loadModel("mypage");
			
			// load model
			
			 Load::loadModel("comment","mod_comment");
			 $comment_modal = new CommentModel();

			//echo "=>";exit;

			// create model object
			$mypageObj = new MypageModel();
			
			
			
			//print_r($mypageObj);
			//exit;
			
			// get all header css and js
						// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/front_mypage.php",$contactData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			
			$data['list'] = $mypageObj->getMyPageSingle(APP::$curId);
			$data['comment'] = $mypageObj->getAllComments(APP::$curId);
			
					// render layout
			Layout::renderLayout($data);
		}

		function records()
		{       
			Load::loadModel("mypage");
			$mypageObj = new MypageModel();
			
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
		 * @author Bhavesh Prajapati <bhavesh.webential@gmail.com> 
		 */
		function save_sortorder()
		{			
					// load model
			Load::loadModel("mypage");

					// create model object
			$mypageObj = new MypageModel();

					//sort order
			$mypageObj->saveSortOrder();

			echo json_encode(array("result" => "success","title" => "Page","message" => "Sort order has been saved successfully"));
			exit;
		}


	


		

	}