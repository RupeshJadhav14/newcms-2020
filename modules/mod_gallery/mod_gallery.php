<?php 
	//restrict direct access to the gallery
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
        error_reporting(E_ALL);
	class Gallery
	{
		/**
		 * constructor of class Gallery. do initialisation
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function __construct()
		{		
                    
		}
		
		/**
		 * List all available gallery
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function gallery_list()
		{
			// load model
			Load::loadModel("gallery");
			
			// create model object
			$galleryObj = new GalleryModel();
			
			// get gallery listing
			$galleryObj->getGalleryList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/gallery.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /**
		 * gallery add/edit
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function gallery_edit()
		{	
			// load model
			Load::loadModel("gallery");
			
			// create model object
			$galleryObj = new GalleryModel();
			
			// save gallery record is submitted
			$galleryObj->saveGallery();
			
			// get gallery record for update
			$galleryData = $galleryObj->getGalleryData(APP::$curId);
                         
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/gallery_edit.php",$galleryData);			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /* Change status of gallery
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("gallery");
			
			// create model object
			$galleryObj = new GalleryModel();
			
			//change status
			$galleryObj->changeStatus();
			
			$msg = "Gallery(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Gallery(s) status have been inactivated successfully";
			
			echo json_encode(array("result" => "success","title" => "Gallery Status","message" => $msg));
			exit;
		}
		
		/* Delete selected gallerys
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function delete_gallery()
		{
			// load model
			Load::loadModel("gallery");
			
			// create model object
			$galleryObj = new GalleryModel();
			
			//change status
			$galleryObj->deleteGallery();
			
			echo json_encode(array("result" => "success","title" => "Delete Gallery","message" => "Gallery(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete gallery image and also update database
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function delete_file()
		{
			// create image path
			$imagePath = URI::getAbsMediaPath(CFG::$galleryDir."/".$_GET['filename']);
			
			// delete image
			if(file_exists($imagePath) && is_file($imagePath))
				unlink($imagePath);			
				
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."gallery",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
                
                /** Save sort order of gallery
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function save_sortorder()
		{			
                    // load model
                    Load::loadModel("gallery");

                    // create model object
                    $galleryObj = new GalleryModel();

                    //sort order
                    $galleryObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "Gallery","message" => "Sort order has been saved successfully"));
                    exit;
		}
	}