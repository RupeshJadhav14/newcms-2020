<?php /* Contact model class. Contains all attributes and method related to contact.
*/
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	
	class EnquiryModel
	{				
		
            public $records = array();
		function __construct($id="")
		{
	
		}
		 
            public function getContactEnquiryList() 
            {
                $where = "";
                $whereParam = array();
                $orderBy = "id desc";
                if (isset($_GET['o_type']))
                    $orderBy = $_GET['o_field'] . " " . $_GET['o_type'];

                if (isset($_GET['searchForm']['enquiry_name']) && trim($_GET['searchForm']['enquiry_name']) != "") {
                    $where .= " ((name like %ss_name) or (email like %ss_email) or (phone like %ss_phone))";
                    $whereParam["name"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                    $whereParam["email"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                    $whereParam["phone"] = StringManage::processString($_GET['searchForm']['enquiry_name']);
                }

                $date = "";
                if (isset($_GET['searchForm']['dateFrom']) == true && isset($_GET['searchForm']['dateTo']) == true) {
                    if ($_GET['searchForm']['dateFrom'] != $_GET['searchForm']['dateTo'] && $_GET['searchForm']['dateFrom'] != "" && $_GET['searchForm']['dateTo'] != "") {
                        $date = " date(created_date) between '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "' and '" . date("Y-m-d", strtotime($_GET['searchForm']['dateTo'])) . "'";
                    } else if ($_GET['searchForm']['dateFrom'] == $_GET['searchForm']['dateTo'] && $_GET['searchForm']['dateTo'] != "") {
                        $date = " created_date like '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "%'";
                    } else if (isset($_GET['searchForm']['dateFrom']) == true && $_GET['searchForm']['dateFrom'] != "") {
                        $date = " created_date >= '" . date("Y-m-d", strtotime($_GET['searchForm']['dateFrom'])) . "'";
                    } else if (isset($_GET['searchForm']['dateTo']) == true && $_GET['searchForm']['dateTo'] != "") {
                        $date = " date(created_date) <= '" . date("Y-m-d", strtotime($_GET['searchForm']['dateTo'])) . "'";
                    }
                }

                if ($date != "") {
                    if ($where == "") {
                        $where.=$date;
                    } else {
                        $where.=" and " . $date;
                    }
                }

                UTIL::doPaging("totalContacts", "id,name,email,phone,created_date", CFG::$tblPrefix . "enquiries", $where, $whereParam, $orderBy);
            }
                  
                  
		 
                
		
		public function getContactEnqData1($id) {
       // DB::update(CFG::$tblPrefix . "enquiries", array('is_view' => '1'), "id=%d", $id);
        return DB::queryFirstRow("SELECT name,email,phone,created_date FROM " . CFG::$tblPrefix . "enquiries  where id=%d ", $id);
    }
    
    public function getContactEnqData($id) {
        
        DB::update(CFG::$tblPrefix . "enquiries", array('is_view' => '1'), "id=%d", $id);
            return DB::queryFirstRow("SELECT name AS 'Name',phone AS 'Phone',postcode AS 'Postcode', email AS 'Email address',state AS 'State',created_date as 'Enquiry Date' FROM " . CFG::$tblPrefix . "enquiries where id=" . $id);
            
}
                
 function mailSendEnquiry() {
        
        
    //global $config;
//To store success fail message
    $message = "";
//include sender.php
    Load::loadLibrary("sender.php", "phpmailer");

    $valid = EnquiryModel::check($_POST['secureImg1']);
        
    if (!$valid) {
        $message = 'Session Expired';
       
    } else {
//Set Mail Data
        $varName = (isset($_POST['name'])) ? $_POST['name'] : "";
        $varEmail = (isset($_POST['email'])) ? $_POST['email'] : "";
        $varPhone = (isset($_POST['phone'])) ? preg_replace('~.*(\d{4})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{3}).*~', '$1 $2 $3',$_POST['phone']) : "";
        $varAdd = (isset($_POST['address'])) ? $_POST['address'] : "";
        $varState = (isset($_POST['state'])) ? $_POST['state'] : "";
        $varCity = (isset($_POST['city'])) ? $_POST['city'] : "";
        $varPostcode = (isset($_POST['postcode'])) ? $_POST['postcode'] : "";
        $varMessage = (isset($_POST['message'])) ? $_POST['message'] : "";

            $title = 'Book a free consultation';
            $saveArr['form_title'] = trim($title);
            
        if (!empty($varName)) {
            $arrContactData['Name'] = trim($varName);
            $saveArr['name'] = trim($varName);
        }
        
       if (!empty($varEmail)) {
            $arrContactData['Email address'] = trim($varEmail);
            $saveArr['email'] = trim($varEmail);
        }
        if (!empty($varPhone)) {
            $arrContactData['Phone'] = trim($varPhone);
            $saveArr['phone'] = trim($varPhone);
        }
        if (!empty($varAdd)) {
            $arrContactData['Address'] = trim($varAdd);
            $saveArr['address'] = trim($varAdd);
        }
        if (!empty($varState)) {
            $arrContactData['State'] = trim($varState);
            $saveArr['state'] = trim($varState);
        }
        if (!empty($varCity)) {
            $arrContactData['City'] = trim($varCity);
            $saveArr['city'] = trim($varCity);
        }
        if (!empty($varPostcode)) {
            $arrContactData['Postcode'] = trim($varPostcode);
            $saveArr['postcode'] = trim($varPostcode);
        }
        if (!empty($varMessage)) {
            $arrContactData['Message'] = trim($varMessage);
            $saveArr['message'] = trim($varMessage);
        }

//Load Mail Template 
        /* $subject = "Landing Page Enquiry for " . ucfirst(CFG::$siteConfig['site_name']); */


        $subject = "Book a free consultation for " . ucfirst(CFG::$siteConfig['site_name']);


        $content = Core::loadMailTempleate($subject, $arrContactData);
        
        $this->saveEnquiry($saveArr, CFG::$tblPrefix . 'enquiries');
        //Store enquiry in db
        // Send mail to client
        $mail_from = $varEmail;
        $mail_from_name = $varName;
        $mail_to = CFG::$siteConfig['enquiry_emails'];

            echo $mail_from;
              echo $mail_from_name;
              print_r($mail_to);
             echo $subject;
                   echo $content;
               exit;
        if (!$send = mosMail($mail_from, $mail_from_name, $mail_to, $subject, $content, 1)) {
            $message = "<span style='color:#ff0000;font-family:Arial;font-size:12px;font-weight:bold;'>Error in sending mail.</span>";
        }
        //Send copy mail to customer
        $subject = "Copy of book a free consultation to " . CFG::$siteConfig['site_name'];

        //$mail_from = CFG::$siteConfig['site_email'];
        $mail_from = CFG::$siteConfig['site_email'];
        $mail_from_name = CFG::$siteConfig['site_name'];
        $mail_to = array($varEmail);
        $content = Core::loadMailTempleate($subject, $arrContactData);
        echo $mail_from;
        echo $mail_from_name;
        print_r($mail_to);
        echo $subject;
        echo $content;
        exit;
        if (!$send = mosMail($mail_from, $mail_from_name, $mail_to, $subject, $content, 1)) {
            $message = "<span style='color:#ff0000;font-family:Arial;font-size:12px;font-weight:bold;'>Error in sending mail.</span>";
        } else {
            $_SESSION['contact'] = $_SERVER['HTTP_REFERER'];
            UTIL::redirect(URI::getURL("mod_page", "thankyou_page"));
            exit;
        }

//        $_SESSION['contact'] = $_SERVER['HTTP_REFERER'];
//        header("Location: ".sefRelToAbs('thank-you.php'));
//        exit;
    }
    return $message;
}

function check($num) {

        if ($_SESSION['uniqueNum'] == Core::decryptPass($num)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    function saveEnquiry($saveArray = array(), $table) {
        //$saveArray['enquiry_date'] = date("Y-m-d H:i:s");
        DB::insert($table, $saveArray);

        // get enquiry from
        $enquiryFrom = $this->getEnquiryFrom($table);

        //check date
        if ($this->checkDt($enquiryFrom) != 1) {
            //Prepare Array
            $insertLog = array("enquiry_from" => $enquiryFrom, "counter" => 1, "enquiry_date" => DB::sqleval("CURDATE()"));
            //insert enquiry log
            DB::insert(CFG::$tblPrefix . 'enquiry_log', $insertLog);
        } else {
            //update counter
            $counter = $this->getCounter($enquiryFrom);
            //Prepare Array
            $updtLog = array("counter" => $counter);
            //update enquiry log
            DB::update(CFG::$tblPrefix . 'enquiry_log', $updtLog, "enquiry_date=CURDATE() and enquiry_from=%s", $enquiryFrom);
        }
    }
    
    function getEnquiryFrom($table) {
        $enquiryFrom = str_replace(CFG::$tblPrefix, "", $table);
       // $enquiryFrom = str_replace("_enquiry", "", $enquiryFrom);
        return $enquiryFrom;
    }

    function checkDt($enquiryFrom) {

        DB::query("SELECT enquiry_date FROM " . CFG::$tblPrefix . "enquiry_log WHERE  enquiry_date =CURDATE() and enquiry_from=%s", $enquiryFrom);

        return DB::count();
    }

    function getCounter($enquiryForm) {
        $counter = DB::queryFirstRow("SELECT counter FROM " . CFG::$tblPrefix . "enquiry_log WHERE  enquiry_date=CURDATE() and enquiry_from=%s", $enquiryForm);
        $cnt = (int) $counter['counter'];
        ++$cnt;
        return $cnt;
    }
		
		
	}