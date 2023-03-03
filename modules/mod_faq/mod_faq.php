<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
        
        class FAQ
        {
            function __construct()
		{		
		     
		}
                
                function faq_edit()
                {
                    // load model
                    Load::loadModel("faq");
                    // create model object
                    $faqObj = new FaqModel();
                    // save page record is submitted
                    $faqObj->saveFaq();
                    
                    // get page record for update
			$faqData = $faqObj->getFaqData(APP::$curId);

                    
                    // include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/faq_edit.php",$faqData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
                    
                    Layout::renderLayout();
                }
                
                function faq_list()
                {
                    // load model
			Load::loadModel("faq");	
                        
                        // create model object
                    $faqObj = new FaqModel();
                    
                    // get page listing
			$faqObj->getFaqList();
                        
                        $jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/faq_list.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
						
			// render layout
                        
                    Layout::renderLayout();
                }
                
                function change_status()
		{
			// load model
			Load::loadModel("faq");
			
			// create model object
			$faqObj = new FaqModel();
			
			//change status
			$faqObj->changeStatus();
			
			$msg = "Faq(s) status have been activated successfully";
			if($_GET['newstatus'] == "0")
				$msg = "Faq(s) status have been inactivated successfully";
			
			echo json_encode(array("result" => "success","title" => "Faq Status","message" => $msg));
			exit;
		}
                
        function delete_faq(){
			// load model
			Load::loadModel("faq");
			
			// create model object
			$faqObj = new FaqModel();
			
			//change status
			$faqObj->deleteFaq();
			
			echo json_encode(array("result" => "success","title" => "Delete Faq","message" => "Faq(s) have been deleted successfully"));
			exit;
	}
        
        function save_sortorder()
		{			
                    // load model
                    Load::loadModel("faq");

                    // create model object
                    $faqObj = new FaqModel();

                    //sort order
                    $faqObj->saveSortOrder();

                    echo json_encode(array("result" => "success","title" => "FAQ","message" => "Sort order has been saved successfully"));
                    exit;
		}
        }