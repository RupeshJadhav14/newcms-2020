<?php
 /* Page model class. Contains all attributes and method related to page.
*/
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	
	class listModel
	{		
		/** Store fields of page record
			@var $fields array
		*/
		public $records = array();			
		
		/**
		 * constructor of class PageModel. do initialisation
		 *
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		function __construct($id="")
		{
			if($id != "")
			{
				$this->getPageById($id);
			}			
		}		
		
		/**
		 * get Page detail by its id
		 *
		 * @param int $id page id
		 * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		public function getPageById($id)
		{
			$this->records = DB::queryFirstRow("SELECT * FROM ".CFG::$tblPrefix."page where status='1' and is_deleted='0' and id=%d limit 1",$id);					
		}
	}



?>