<?php 
	//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );

class Admin
{
		/**
		 * constructor of class page. do initialisation
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function __construct()
		{		
			
		}
		
		/**
		 * About company action
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function dashboard()
		{	
			// check user logged in or not
			if(!UTIL::isUserLogin()){
				UTIL::redirect(URI::getURL("mod_user","admin_login"));	// redirect user to login page if not logged in
			}
			
			// Load helper file
			Load::loadHelper("admin",APP::$moduleName);
			
			// create object of helper
			$adminHelper = new AdminHelper();
			
			$adminHelper->getEnquiryData();
			$adminHelper->getAllEnquiryDataByType();
			$unreadArr[]=array('tableName'=>CFG::$tblPrefix.'enquiries','fields'=>'id,name,email, phone , created_date,"Contact" as datatype','type'=>'Contact');

          //  $unreadArr[]=array('tableName'=>CFG::$tblPrefix.'function_enquiry','fields'=>'id,title,first_name,last_name,status,enquiry_date,"Function" as datatype','type'=>'Function');
         //   $unreadArr[]=array('tableName'=>CFG::$tblPrefix.'product_enquiry','fields'=>'id,title,first_name,last_name,status,enquiry_date,"Product" as datatype','type'=>'Product');


   //                      $data['ddData']=$unreadArr;
			// $adminHelper->getAllUnreadEnquiryData($unreadArr);
			// $adminHelper->getAllRecentEnquiryData($unreadArr);
			// $data['data']=array($adminHelper->getAllValues());					
			// $data['enquiryType']=array($adminHelper->getEnquiryType());					
			// // include chart js
			// $jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/chart.php",$data);
			
			// // create javascript variable for ajax url			
			// Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
		}
		
		
		
		/**
		 * Upload image file into server
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function upload_image()
		{ 
			Load::loadLibrary("UploadHandler.php","jquery_uploader");                          
			$upload_handler = new UploadHandler(array('script_url' => $_POST['deleteURL'],	
                                                              'upload_dir' => URI::getAbsMediaPath($_POST['uploadDir'])."/",	// Physical upload directory path
                                                              'upload_url' => URI::getLiveMediaPath($_POST['uploadDir'])."/",	// live image url
                                                              'param_name'  => $_POST['fileInput']));  

															  
			exit;
		}
		
		/*
		function upload_image()
		{ 
			Load::loadLibrary("UploadHandler.php","jquery_uploader");                          
			$upload_handler = new UploadHandler(array('script_url' => $_POST['deleteURL'],	
                                                              'upload_dir' => URI::getAbsMediaPath($_POST['uploadDir'])."/",	// Physical upload directory path
                                                              'upload_url' => URI::getLiveMediaPath($_POST['uploadDir'])."/",	// live image url
                                                              'param_name'  => $_POST['fileInput']));                                                  
			exit;
		}*/
		
	}