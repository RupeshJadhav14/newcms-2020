<?php 
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	 
	class Seo
	{		
		/**
		 * constructor of class seo. do initialisation
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function __construct()
		{		
		    
		}		
		
		/**
		 * List all pages in admin section
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function seo_list()
		{	
			// load model
			Load::loadModel("seo");
			
			// create model object
			$pageObj = new SeoModel();
			
			// get page action listing
			$pageObj->getActionList();
			
			$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/seo.php");
			
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
			Load::loadModel("seo");
			
			// create model object
			$pageObj = new SeoModel();
			
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
	}