<?php /* Seo model class. Contains all attributes and method related to seo.
*/
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	
	class SeoModel
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
		}				
		
		/**
		 * get action record list. 
		 *
		 * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
		 */
		public function getActionList()
		{	
			$fromTable = CFG::$tblPrefix."module_action as ma,".CFG::$tblPrefix."slug as s ";
			
			$where = " ma.id=s.action_id and action_type='front' and s.entity_id=0 ";
                        
                        $groupBy = " ma.id ";
				
			$orderBy = " ma.id desc";
			if(isset($_GET['o_type']))
				$orderBy = $_GET['o_field']." ".$_GET['o_type'];
			$whereParam = array();

			if(isset($_GET['searchForm']['seo_name']) && trim($_GET['searchForm']['seo_name'])!="")
			{
				$where .= " and name like %ss_name ";
				$whereParam = array("name" => StringManage::processString($_GET['searchForm']['seo_name']));
			}				 
			
			UTIL::doPaging("totalPages","ma.id,name,ma.module_key,action,slug",$fromTable,$where,$whereParam,$orderBy,$groupBy);
		}	
		
		/**
		 * get page record with its slug. 
		 *
		 * @author Rutwik Avasthi <php@datatechmedia@gmail.com>
		 */
		public function getPageData($id)
		{	
			return DB::queryFirstRow("SELECT ma.id,s.slug,ma.meta_title,ma.meta_keyword,ma.meta_description,ma.field_variables FROM ".CFG::$tblPrefix."module_action as ma,".CFG::$tblPrefix."modules as m,".CFG::$tblPrefix."slug as s where ma.id=s.action_id and ma.module_key=m.module_key and ma.id=%d ",$id);
		}
		
		/**
		 *  Save page data if submitted
		 *
		 *  @author Rutwik Avasthi <php.datatechmedia@gmail.com>
		 */
		public function savePage()
		{
			if(isset($_POST['slug']))
			{		
				$varSlug = trim($_POST['slug']);				
					 
				$arrFields = array("meta_title" => $_POST['meta_title'],"meta_description" => $_POST['meta_description'],"meta_keyword" => $_POST['meta_keyword']);				
	
				// update record
				DB::update(CFG::$tblPrefix."module_action",StringManage::processString($arrFields)," id=%d ",APP::$curId);
				
				// update slug
				Core::updateSlug($varSlug,APP::$curId,true);
				
				// pass action result
				$_SESSION["actionResult"] = array("success" => "SEO content has been saved successfully");
				
				if($_POST['edit'] == 1)
					UTIL::redirect(URI::getURL(APP::$moduleName,"page_edit",APP::$curId));
				else
					UTIL::redirect(URI::getURL(APP::$moduleName,"seo_list"));
			}
		}		
	}