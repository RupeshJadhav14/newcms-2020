<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Enquiry
	{
		
	
		function __construct()
		{		
		     
		}
		
		function contact_enquiry_list()
		{	
			// load model
			Load::loadModel("enquiry");
			
			// create model object
			$contactenqObj = new EnquiryModel();
			
			// get contact listing
			$contactenqObj->getContactEnquiryList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/contact_list.php");
			
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
						
			// render layout
			Layout::renderLayout();
		}
		
		
		function enquiry_view_contact()
		{		
			// load model
			Load::loadModel("enquiry");
			
			// create model object
			$contactenqObj = new EnquiryModel();
 
			// get page record for update
			$contactData = $contactenqObj->getContactEnqData(APP::$curId);
                        
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/contact_enquiry_view.php",$contactData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
 
			// render layout
			Layout::renderLayout($contactData);
		}
		
		function enquiry_manager()
		{	
		
			// load model
			Load::loadModel("enquiry");
			
			// create model object
			$contactenqObj = new EnquiryModel();
 
			// get page record for update
			$contactData = $contactenqObj->getContactEnqData(APP::$curId);
                        
                        
			// include js in footer
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/contact_enquiry_view.php",$contactData);			
				
			// create javascript variable for ajax url			
			Layout::addFooter($jsData);
 
			// render layout
			Layout::renderLayout();
		}
                
                
                function enquiry()
                {
                    Load::loadModel("enquiry");
                    
                    $contactenqObj = new EnquiryModel();
                    
                     if (isset($_POST['name']) && $_POST['name'] != '') {
            
                            $data['message'] = $contactenqObj->mailSendEnquiry();
                }
                    Layout::renderLayout();
                }
	 	
	}