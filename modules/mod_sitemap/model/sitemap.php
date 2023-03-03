<?php

defined('DMCCMS') or die('Unauthorized access');

class SitemapModel {

    function __construct($id = "") {
        
        
        
    }
    
	function getstore()
	{
		$data['store']= DB::query("SELECT * from " . CFG::$tblPrefix . "store where status='1'");	
	return $data;
	}
   

}

?>
 