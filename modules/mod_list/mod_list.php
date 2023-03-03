<?php 
	
//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );


class List 
{
	function __construct()
	{
		
	}

	function view_list()
	{
		echo "hi"; exit;
		//Load::loadModel("list");
			
			// create model object
			//$pageObj = new listModel();
			
			// get page listing
			//$pageObj->getPageList();
			
			//$jsData = Layout::bufferContent(URI::getAbsModulePath()."/js/list.php");
			
			// create javascript variable for ajax url			
			//Layout::addFooter($jsData);
			
			// render layout
			Layout::renderLayout();
	}


}






?>