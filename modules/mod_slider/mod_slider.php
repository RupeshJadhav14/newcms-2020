<?php 
	//restrict direct access to the slider
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Slider
	{
		/**
		 * constructor of class Slider. do initialisation
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function __construct()
		{		
                    
		}
		
		/**
		 * List all available slider
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function slider_list()
		{
			// load model
			Load::loadModel("slider");
			
			// create model object
			$sliderObj = new SliderModel();
			
			// get slider listing
			$sliderObj->getSliderList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/slider.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /**
		 * slider add/edit
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function slider_edit()
		{	
			// load model
			Load::loadModel("slider");
			
			// create model object
			$sliderObj = new SliderModel();
			
			// save slider record is submitted
			$sliderObj->saveSlider();
			
			// get slider record for update
			$sliderData = $sliderObj->getSliderData(APP::$curId);
                         
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/slider_edit.php",$sliderData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
                
                /* Change status of slider
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function change_status()
		{
			// load model
			Load::loadModel("slider");
			
			// create model object
			$sliderObj = new SliderModel();
			
			//change status
			$sliderObj->changeStatus();
			
			$msg = "Slider(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Slider(s) status have been inactivated successfully";
			
			echo json_encode(array("result" => "success","title" => "Slider Status","message" => $msg));
			exit;
		}
		
		/* Delete selected sliders
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function delete_slider()
		{
			// load model
			Load::loadModel("slider");
			
			// create model object
			$sliderObj = new SliderModel();
			
			//change status
			$sliderObj->deleteSlider();
			
			echo json_encode(array("result" => "success","title" => "Delete Slider","message" => "Slider(s) have been deleted successfully"));
			exit;
		}
		
		/*
		 * Delete slider image and also update database
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function delete_file()
		{
			// create image path
			$imagePath = URI::getAbsMediaPath(CFG::$sliderDir."/".$_GET['filename']);
			
			// delete image
			if(file_exists($imagePath) && is_file($imagePath))
				unlink($imagePath);			
				
			// update database if id is passed
			if(APP::$curId != "")
			{
				$arrFields = array("image_name" => "");
				DB::update(CFG::$tblPrefix."slider",$arrFields," id=%d ",APP::$curId);
			}
			echo json_encode(array("result" => "success"));
			exit;
		}
                
                /** Save sort order of slider
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function save_sortorder()
		{			
                    // load model
                    Load::loadModel("slider");

                    // create model object
                    $sliderObj = new SliderModel();

                    //sort order
                    $sliderObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "Slider","message" => "Sort order has been saved successfully"));
                    exit;
		}
	}