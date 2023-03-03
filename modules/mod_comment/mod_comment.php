<?php 
	//restrict direct access to the Comment
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Comment
	{
		/**
		 * constructor of class Comment. do initialisation
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function __construct()
		{		
                    
		}
		
		
		function comment_front_add()
		{			
			
                   // load model
			Load::loadModel("comment");
			
			// create model object
			$commentObj = new CommentModel();
			
			// save Comment record is submitted
			$commentObj->saveFrontComment();

			

			$url = CFG::$livePath.'/'.$_POST['blog_slug'];
			
			//echo $url;exit;
			
			UTIL::redirect($url);
            exit;
		}
		
		
		/**
		 * List all available Comment
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function comment_list()
		{
			// load model
			Load::loadModel("comment");
			
			// create model object
			$commentObj = new CommentModel();
			
			// get Comment listing
			$commentObj->getCommentList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/comment.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /**
		 * Comment add/edit
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function comment_edit()
		{	
			// load model
			Load::loadModel("Comment");
			
			// create model object
			$commentObj = new CommentModel();
			
			// save Comment record is submitted
			$commentObj->saveComment();
			
			// get Comment record for update
			$CommentData = $commentObj->getCommentData(APP::$curId);
                         
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/Comment_edit.php",$CommentData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /* Change status of Comment
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("Comment");
			
			// create model object
			$CommentObj = new CommentModel();
			
			//change status
			$CommentObj->changeStatus();
			
			$msg = "Comment(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Comment(s) status have been inactivated successfully";
			
			echo json_encode(array("result" => "success","title" => "Comment Status","message" => $msg));
			exit;
		}
		
		/* Delete selected Comments
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function delete_comment()
		{
			// load model
			Load::loadModel("Comment");
			
			// create model object
			$CommentObj = new CommentModel();
			
			//change status
			$CommentObj->deleteComment();
			
			echo json_encode(array("result" => "success","title" => "Delete Comment","message" => "Comment(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete Comment image and also update database
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function delete_file()
		{
			// create image path
			$imagePath = URI::getAbsMediaPath(CFG::$CommentDir."/".$_GET['filename']);
			
			// delete image
			if(file_exists($imagePath) && is_file($imagePath))
				unlink($imagePath);			
				
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."Comment",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
                
                /** Save sort order of Comment
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function save_sortorder()
		{			
                    // load model
                    Load::loadModel("Comment");

                    // create model object
                    $CommentObj = new CommentModel();

                    //sort order
                    $CommentObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "Comment","message" => "Sort order has been saved successfully"));
                    exit;
		}
	}