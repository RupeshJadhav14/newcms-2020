<?php /* Contact model class. Contains all attributes and method related to contact.
*/
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	
	class StudentModel
	{				
		
            public $records = array();
		function __construct($id="")
		{
	
		}


        //order edit fetch data query 
        public function getStudentAllData($id) {
        return DB::queryFirstRow("SELECT id,name,roll_id,email,phone,status,created_date FROM " . CFG::$tblPrefix . "student where id=%d ", $id);
    }

public function getStudentList() 
            {
                $where = "";
                $whereParam = array();
                $orderBy = "id desc";
                if (isset($_GET['o_type']))
                    $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];

                if (isset($_GET['searchForm']['enquiry_name']) && trim($_GET['searchForm']['enquiry_name']) != "") {
                    $where .= " ((name like %ss_name) or (email like %ss_email) or (roll_id like %ss_roll_id))";
                    $whereParam["name"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                    $whereParam["email"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                    $whereParam["roll_id"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                }
                
                //var_dump($_REQUEST);exit();
                $status="";
                if(isset($_GET['select']) && $_GET['select'] == 'Deactive'){
                    $status = " `status` = 0 ";
                }
                elseif(isset($_GET['select']) && $_GET['select'] == 'Active' ){
                    $status = " `status` = 1 ";
                }
                if ($status != "") {
                    if ($where == "") {
                        $where.=$status;
                    } else {
                        $where.=" and " . $status;
                    }
                }
//DB::debugMode();

                 $date = "";

                 if(isset($_GET['searchForm']['dateFrom']) && $_GET['searchForm']['dateFrom'] != '' && isset($_GET['searchForm']['dateTo']) && $_GET['searchForm']['dateTo'] != '') {
                    $date = "  date(created_date) between '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "' and '" . date("Y-m-d", strtotime($_GET['searchForm']['dateTo'])) . "' ";
                 }
                 else if (isset($_GET['searchForm']['dateFrom']) && $_GET['searchForm']['dateFrom'] != '' && $_GET['searchForm']['dateTo'] == '') {
                     $date = " date(created_date) >= '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "' ";
                 }
                 else if (isset($_GET['searchForm']['dateTo']) && $_GET['searchForm']['dateTo'] != '' && $_GET['searchForm']['dateFrom'] == '') {
                     $date = " date(created_date) <= '" . date("Y-m-d", strtotime($_GET['searchForm']['dateTo'])) . "'";
                 }


                if ($date != "") {
                    if ($where == "") {
                        $where.=$date;
                    } else {
                        $where.=" and " . $date;
                    }
                }

                
                //if you want to list your fileld then insert feild name in below query
                //DB::debugMode();
                UTIL::doPaging("totalContacts", "id,name,roll_id,email,phone,status,created_date", CFG::$tblPrefix . "student", $where, $whereParam, $orderBy); 
                //die;
            }
            

             function deleteStudent() {
    
                //DB::delete(CFG::$tblPrefix . "order", "id=%d ", $key);
                DB::query("delete from ".CFG::$tblPrefix."student where id=%d",APP::$curId); 
                UTIL::redirect(URI::getURL(APP::$moduleName,"student_list")); 
           
    }

    public function saveAddStudent(){
        if($_POST['name'] != ''){
            $arrFields=array("name"=>$_POST['name'],"email"=>$_POST['email'],"status"=>$_POST['status'],"roll_id"=>$_POST['roll_id'] ,"phone" => $_POST['phone']);
            $arrFields['created_date'] = date("Y-m-d H:i:s");

            DB::insert(CFG::$tblPrefix . "student", StringManage::processString($arrFields));

                // get current id
                APP::$curId = DB::insertId();
                UTIL::redirect(URI::getURL(APP::$moduleName,"student_list"));
                $_SESSION["actionResult"] = array("success" => "Student Record has been Added successfully");
        }
    }

    public function saveStudent() {
        
            //echo "<pre>";print_r($_POST);exit;
            
            if($_POST['name']!=''){
                //var_dump(URI::getLiveMediaPath($_POST['uploadDir'])."/order/");exit();
                //var_dump( URI::getLiveMediaPath($_POST['uploadDir'])."/");exit();
//var_dump($_FILES); var_dump($_POST['flImage_hdn']); exit();
            $arrFields = array("name" => $_POST['name'],"email" => $_POST['email'],"roll_id"=>$_POST['roll_id'] ,"phone" => $_POST['phone']);

            //print_r($arrFields); exit;

            // get current id
                //APP::$curId = DB::insertId();
            
                // store updated date
                // $arrFields['updated_date'] = date("Y-m-d H:i:s");
                // $arrFields['updated_by'] = $userID;
                // update record
          
                DB::update(CFG::$tblPrefix . "student", StringManage::processString($arrFields), " id=%d ",APP::$curId);

                UTIL::redirect(URI::getURL(APP::$moduleName,"student_list"));
                $_SESSION["actionResult"] = array("success" => "Student Data has been Updated successfully");
            }              
    }

}
?>