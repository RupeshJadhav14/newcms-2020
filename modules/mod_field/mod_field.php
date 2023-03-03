<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
        
        class Field
        {
            function __construct()
		{		
		     
		}
                
                function field_edit()
                {
                    // load model
                    Load::loadModel("field");
                    // create model object
                    $fieldObj = new FieldModel();
                    // save page record is submitted
                    $fieldObj->saveField();
                    
                    // get page record for update
			$fieldData = $fieldObj->getFieldData(APP::$curId);

                    
                    // include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/field_edit.php",$fieldData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
                    
                    Layout::renderLayout();
                }
                
                function field_list()
                {
                    // load model
			Load::loadModel("field");	
                        
                        // create model object
                    $fieldObj = new FieldModel();
                    
                    // get page listing
			$fieldObj->getFieldList();
                        
                        $jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/field_list.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
						
			// render layout
                        
                    Layout::renderLayout();
                }
                
                function change_status()
		{
			// load model
			Load::loadModel("field");
			
			// create model object
			$fieldObj = new FieldModel();
			
			//change status
			$fieldObj->changeStatus();
			
			$msg = "Field(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Field(s) status have been inactivated successfully";
			
			echo json_encode(array("result" => "success","title" => "Field Status","message" => $msg));
			exit;
		}
                
                function delete_field()
		{
			// load model
			Load::loadModel("field");
			
			// create model object
			$fieldObj = new FieldModel();
			
			//change status
			$fieldObj->deleteField();
			
			echo json_encode(array("result" => "success","title" => "Delete Field","message" => "Field(s) have been deleted successfully"));
			exit;
	}
        
        function save_sortorder()
		{			
                    // load model
                    Load::loadModel("field");

                    // create model object
                    $fieldObj = new FieldModel();

                    //sort order
                    $fieldObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "Field","message" => "Sort order has been saved successfully"));
                    exit;
		}
        }