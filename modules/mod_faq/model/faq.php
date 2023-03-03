<?php
//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
        
        class FaqModel
        {
            /** Store fields of faq record
			@var $fields array
		*/
            public $records = array();	
            
            /**
		 * constructor of class Faq Model. do initialisation
		 *
		 * @author Vishal Vasani <vishal.datatech@gmail.com>
		 */
		function __construct($id="")
		{
		 			
		}
                
                public function getFaqList()
		{		
			$orderBy = "id desc";
			if(isset($_GET['o_type']))
				$orderBy = $_GET['o_field']." ".$_GET['o_type'];
			$whereParam = array();			
			$where = "";
			if(isset($_GET['searchForm']['question']) && trim($_GET['searchForm']['question'])!="")
			{
				$where .= "question like %ss_question ";
				$whereParam["question"] =StringManage::processString($_GET['searchForm']['question']);
				
			}
			
			UTIL::doPaging("totalFaqs","id,question,sort_order,status",CFG::$tblPrefix."faq",$where,$whereParam,$orderBy);
		}
                
                public function getFaqData($id)
		{	
			return DB::queryFirstRow("SELECT id,question,answer,status,sort_order FROM ".CFG::$tblPrefix."faq where id=%d ",$id);
		}
                
                
                public function saveFaq()
                {
                    if(isset($_POST['question']))
                        {	
                                if(isset($_POST['status'])==false)
				  {
					  $_POST['status']="0";
				  }
                                  
                               $arrFields = array("question" => $_POST['question'],"answer" => $_POST['txaDescription'],"sort_order" => $_POST['txtSortOrder'],"status" => $_POST['status']);
                               $sortOrder=Core::maxId("faq");		
                               
                               if(APP::$curId == "")
				{
					if($arrFields['sort_order']=="")
							$arrFields['sort_order']=((int)$sortOrder['maxId']+1);  
											
					// store created and updated date
					$arrFields['created_date'] = date("Y-m-d H:i:s");
				//	$arrFields['updated_date'] = date("Y-m-d H:i:s");
			 
					// insert record
					DB::insert(CFG::$tblPrefix."faq",StringManage::processString($arrFields));
					
					// get current id
					APP::$curId = DB::insertId();
					
				 
				}
                                else
				{	
					if($arrFields['sort_order']=="")
							$arrFields['txtSortOrder']=0;  
							
					// store updated date
					$arrFields['updated_date'] = date("Y-m-d H:i:s");
				 
					// update record
					DB::update(CFG::$tblPrefix."faq",StringManage::processString($arrFields)," id=%d ",APP::$curId);
					
					 
				}
                                
                                $_SESSION["actionResult"] = array("success" => "Faq has been saved successfully");
				
				if($_POST['edit'] == 1)
					UTIL::redirect(URI::getURL(APP::$moduleName,"faq_edit",APP::$curId));
				else
					UTIL::redirect(URI::getURL(APP::$moduleName,"faq_list"));
                        }	 
                }
                
                function changeStatus()
   {
           $newStatus = $_GET['newstatus'];

           foreach($_POST['status'] as $key => $val)
           {
                   DB::update(CFG::$tblPrefix."faq",array("status" => $newStatus)," id=%d ",$key);
           }
   }
   
   
   function deleteFaq()
   {
       foreach($_POST['status'] as $key => $val)
           {             
           
                DB::query("delete from ".CFG::$tblPrefix."faq where id=%d",$key);  
           }
           
           
   }
   
   function saveSortOrder()
   {
     $newValue=$_GET['val'];
     $id=$_GET['id'];
     DB::update(CFG::$tblPrefix."faq",array("sort_order" => $newValue)," id=%d ",$id);
   }
        }