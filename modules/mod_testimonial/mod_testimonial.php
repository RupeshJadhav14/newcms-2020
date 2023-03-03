<?php 
	//restrict direct access to the testimonial
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Testimonial
	{
		/**
		 * constructor of class Testimonial. do initialisation
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function __construct()
		{		
                    
		}
		
		/**
		 * List all available testimonial
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function testimonial_list()
		{
			// load model
			Load::loadModel("testimonial");
			
			// create model object
			$testimonialObj = new TestimonialModel();
			
			// get testimonial listing
			$testimonialObj->getTestimonialList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/testimonial.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /**
		 * testimonial add/edit
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function testimonial_edit()
		{	
			// load model
			Load::loadModel("testimonial");
			
			// create model object
			$testimonialObj = new TestimonialModel();
			
			// save testimonial record is submitted
			$testimonialObj->saveTestimonial();
			
			// get testimonial record for update
			$testimonialData = $testimonialObj->getTestimonialData(APP::$curId);
                         
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/testimonial_edit.php",$testimonialData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /* Change status of testimonial
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("testimonial");
			
			// create model object
			$testimonialObj = new TestimonialModel();
			
			//change status
			$testimonialObj->changeStatus();
			
			$msg = "Testimonial(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Testimonial(s) status have been inactivated successfully";
			
			echo json_encode(array("result" => "success","title" => "Testimonial Status","message" => $msg));
			exit;
		}
		
		/* Delete selected testimonials
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function delete_testimonial()
		{
			// load model
			Load::loadModel("testimonial");
			
			// create model object
			$testimonialObj = new TestimonialModel();
			
			//change status
			$testimonialObj->deleteTestimonial();
			
			echo json_encode(array("result" => "success","title" => "Delete Testimonial","message" => "Testimonial(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete testimonial image and also update database
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function delete_file()
		{
			// create image path
			$imagePath = URI::getAbsMediaPath(CFG::$testimonialDir."/".$_GET['filename']);
			
			// delete image
			if(file_exists($imagePath) && is_file($imagePath))
				unlink($imagePath);			
				
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."testimonial",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
                
                /** Save sort order of testimonial
		 *
		 * @author Hitendra Makwana <hitendra.seorank@gmail.com>
		 */
		function save_sortorder()
		{			
                    // load model
                    Load::loadModel("testimonial");

                    // create model object
                    $testimonialObj = new TestimonialModel();

                    //sort order
                    $testimonialObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "Testimonial","message" => "Sort order has been saved successfully"));
                    exit;
		}
	}