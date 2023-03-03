<?php

//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class AdminHelper {

    /**
     * constructor of class admin. do initialisation
     *
     * @author Kushan Antani <kushan.datatechmedia@gmail.com>
     */
    function __construct() {
        
    }

    function getAllValues() {

        if ($_REQUEST['selFromMonth'] != "" && $_REQUEST['selToMonth'] != '') {
            $date = "";
            //$numberDaysFrom = cal_days_in_month(CAL_GREGORIAN, $_REQUEST['selFromMonth'], $_REQUEST['selFromYear']);
            $numberDaysTo = cal_days_in_month(CAL_GREGORIAN, $_REQUEST['selToMonth'], $_REQUEST['selToYear']);
            $fromDateAnalytic = $_REQUEST['selFromYear'] . '-' . $_REQUEST['selFromMonth'] . '-1';
            $toDateAnalytic = $_REQUEST['selToYear'] . '-' . $_REQUEST['selToMonth'] . '-' . $numberDaysTo;
        } else {
            $fromdate = strtotime(date('y-m-01') . '-1 year');
            $fromDateAnalytic = date('Y-m-d', $fromdate);
            $toDateAnalytic = date('Y-m-t');
        }
        // if(isset($_REQUEST['fromdate'])==true && isset($_REQUEST['todate'])==true){
        if ($fromDateAnalytic != $toDateAnalytic && $fromDateAnalytic != "" && $toDateAnalytic != "") {
            $date = " date(start_date) between '" . date("Y-m-d", strtotime($fromDateAnalytic)) . "' and '" . date("Y-m-d", strtotime($toDateAnalytic)) . "'";
        } else if ($fromDateAnalytic == $toDateAnalytic && $toDateAnalytic != "") {
            $date = " start_date like '" . date("Y-m-d", strtotime($fromDateAnalytic)) . "%'";
        } else if (isset($fromDateAnalytic) == true && $fromDateAnalytic != "") {
            $date = " start_date >= '" . date("Y-m-d", strtotime($fromDateAnalytic)) . "'";
        } else if (isset($toDateAnalytic) == true && $toDateAnalytic != "") {
            $date = " date(start_date) <= '" . date("Y-m-d", strtotime($toDateAnalytic)) . "'";
        }
        if ($date != '') {
            $date = " where " . $date;
        }

        //  echo "Select *  from ".CFG::$tblPrefix."analytics_feed ".$date." order by  start_date desc limit 0,4";
        $totFeed = DB::query("Select *  from " . CFG::$tblPrefix . "analytics_feed " . $date . " order by  start_date desc ");

        //echo "<pre>";print_r($totFeed);
        $totFeed = array_reverse($totFeed);
        //echo "<pre>";
        // print_r($totFeed);
        //exit;

        $summa = "";
        for ($i = 0; $i < count($totFeed); $i++) {
            $v = $totFeed[$i];
            $month_data = date('m', strtotime($v['start_date']));
            // $month=date('m', strtotime($v['start_date']));
            $month = strtotime($v['start_date']);
            $year = date('Y', strtotime($v['start_date']));

            //  if($i==0)
            $summa = $v['top_organic_traffic'] . "@@@" . $v['top_keywords_organic'] . "@@@" . $v['top_keywords_ppc'] . "@@@" . $v['top_entry_page'];
//                            /$month_data."_".$year
            $total_traffic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['total_traffic']);
            $new_traffic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['new_traffic']);
            $return_traffic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['returning_traffic']);

            $ref_traffic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['total_referral_traffic']);
            $dir_traffic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['direct_traffic']);

            $aus_traffic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['australia_traffic']);
            $uni_visitor[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['unique_visitors']);

            $ser_engine[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['search_engine']);
            $organic[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['organic']);
            $ppc[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['ppc']);
            $page_views[(int) $month_data . "_" . $year] = array((int) $month, (int) $v['total_page_views']);
        }
        $tot_trafic = $oth_trafic = $oth_data = array();
        //echo "<pre>";
        //print_r($total_traffic);
        if (count($totFeed) > 0) {
            $tot_trafic[] = array("label" => "Total Traffic", "data" => $total_traffic, "lines" => array("fillColor" => "#f2f7f9"), "points" => array("fillColor" => "#88bbc8"));
            $tot_trafic[] = array("label" => "New Traffic", "data" => $new_traffic, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));
            $tot_trafic[] = array("label" => "Return Traffic", "data" => $return_traffic, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));
            $tot_trafic[] = array("label" => "Referral Traffic", "data" => $ref_traffic, "lines" => array("fillColor" => "#f2f7f9"), "points" => array("fillColor" => "#88bbc8"));
            $tot_trafic[] = array("label" => "Direct Traffic", "data" => $dir_traffic, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));

            $oth_trafic[] = array("label" => "Australia traffic", "data" => $aus_traffic, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));
            $oth_trafic[] = array("label" => "Unique Visitors", "data" => $uni_visitor, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));
            $oth_trafic[] = array("label" => "Number of page views", "data" => $page_views, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));

            $oth_data[] = array("label" => "Search Engine", "data" => $ser_engine, "lines" => array("fillColor" => "#f2f7f9"), "points" => array("fillColor" => "#88bbc8"));
            $oth_data[] = array("label" => "Organic", "data" => $organic, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));
            $oth_data[] = array("label" => "PPC", "data" => $ppc, "lines" => array("fillColor" => "#fff8f2"), "points" => array("fillColor" => "#ed7a53"));
        }


        $record['final_graph']['main_trafic'] = $tot_trafic;
        $record['final_graph']['other_trafic'] = $oth_trafic;
        $record['final_graph']['other_data'] = $oth_data;
        $record['final_graph']['summary'] = $summa;

        //echo "<pre>";print_r($record);exit;
        if ($_REQUEST['selFromMonth'] != "" && $_REQUEST['selToMonth'] != '') {
            echo json_encode($record);
            exit;
        } else {
            return $record;
        }
    }

    function getGoogleAnalyticSummary() {
        if (isset($_REQUEST['selMonthSummary']) != '') {
            $numberDaysTo = cal_days_in_month(CAL_GREGORIAN, $_REQUEST['selMonthSummary'], $_REQUEST['selYearSummary']);
            $fromDateSummary = $_REQUEST['selYearSummary'] . '-' . $_REQUEST['selMonthSummary'] . '-1';
            $toDateSummary = $_REQUEST['selYearSummary'] . '-' . $_REQUEST['selMonthSummary'] . '-' . $numberDaysTo;
            $date = "where  date(start_date) between '" . date("Y-m-d", strtotime($fromDateSummary)) . "' and '" . date("Y-m-d", strtotime($toDateSummary)) . "'";
            $totFeed = DB::query("Select *  from " . CFG::$tblPrefix . "analytics_feed " . $date . " order by  start_date desc ");
            $summa = $totFeed[0]['top_organic_traffic'] . "@@@" . $totFeed[0]['top_keywords_organic'] . "@@@" . $totFeed[0]['top_keywords_ppc'] . "@@@" . $totFeed[0]['top_entry_page'];
            echo json_encode($summa);
            exit;
        }
    }

    /**
     * Get all page status
     *
     * @author Kushan Antani <kushan.datatechmedia@gmail.com>
     */
    function getPageStatus() {
        $pageData = DB::query("Select IF(status = '1', 'Active','Inactive') as status,count(id) as cnt  from " . CFG::$tblPrefix . "page where status <>'' and is_deleted='0'  group by status order by status asc");
        return $pageData;
    }

    function getCouponStatus() {
        $testimonialData = DB::query("Select IF(status = '1', 'Active','Inactive') as status,count(id) as cnt from " . CFG::$tblPrefix . "coupon where status <>''  group by status order by status asc");
        return $testimonialData;
    }

    function getSectionStatus() {
        $testimonialData = DB::query("Select IF(status = '1', 'Active','Inactive') as status,count(id) as cnt from " . CFG::$tblPrefix . "section where status <>''  group by status order by status asc");
        return $testimonialData;
    }

    function getHeadingStatus() {
        $newsData = DB::query("Select IF(status = '1', 'Active','Inactive') as status,count(id) as cnt  from " . CFG::$tblPrefix . "heading where status <>''  group by status order by status asc");
        return $newsData;
    }

    function getAreaStatus() {
        $newsData = DB::query("Select IF(status = '1', 'Active','Inactive') as status,count(id) as cnt  from " . CFG::$tblPrefix . "area where status <>''  group by status order by status asc");
        return $newsData;
    }

    function getSuburbStatus() {
        $newsData = DB::query("Select IF(status = '1', 'Active','Inactive') as status,count(id) as cnt  from " . CFG::$tblPrefix . "suburb where status <>''  group by status order by status asc");
        return $newsData;
    }

    function displayStatus($data, $moduleClass) {
        $active = "icomoon-icon-checkmark greenColor";
        $inactive = "icomoon-icon-cancel redColor";

        if (is_array($data) && count($data) != 0) {
            if (count($data) == 1) {
                // Check both active and inactive record is exists or not
                if ($data[0]['status'] == "Active") {
                    // create inactive record with value zero
                    $data[1]['status'] = "Inactive";
                    $data[1]['cnt'] = 0;
                } else if ($data[0]['status'] == "Inactive") { // create active record with value zero
                    // store inactive record count in temp variable
                    $varCnt = $data[0]['cnt'];

                    // create active record at 0 position to maintain order
                    $data[0]['status'] = "Active";
                    $data[0]['cnt'] = 0;

                    // create inactive record at 1 position to maintain order
                    $data[1]['status'] = "Inactive";
                    $data[1]['cnt'] = $varCnt;
                }
            }
            echo '<ul>';
            $total = 0;
            foreach ($data as $val) {
                $total+=$val['cnt'];

                echo '<li class="clearfix">
						  <div class="icon"> <span class="' . (($val['status'] == "Active") ? $active : $inactive) . '"></span> </div>
						  <span class="txt txtformat">' . $val['status'] . '</span><span class="number">' . $val['cnt'] . '
						  </span> </li>';
            }
            echo '<li class="clearfix">
					  <div class="icon"> <span class="' . $moduleClass . '"></span> </div>
					  <span class="txt txtformat">
					   Total
					  </span><span class="number">' . $total . '
					  </span> </li>
					 </ul>';
        }
        else
            echo 'No records avliable';
    }

    /**
     * Return total enqury count of last 7 days from all enquiry tables.
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function getEnquiryData() {
        if (isset($_GET['type'])) {
            $typeCond = "";

            if ($_GET['type'] != "All Enquiries")
                $typeCond = " and enquiry_from='" . strtolower(str_replace(" ", "_", $_GET['type'])) . "'";
            // DB::debugMode();
            $data = DB::query('select sum(counter) as cntEnq, date( enquiry_date ) AS enqDate,( DATE_SUB(DATE(NOW()),INTERVAL ' . (CFG::$graphDays - 1) . ' DAY) ) as startDate from ' . CFG::$tblPrefix . 'enquiry_log where enquiry_date > ( DATE_SUB(DATE(NOW()),INTERVAL ' . (CFG::$graphDays + 60) . ' DAY) ) ' . $typeCond . ' GROUP BY enqDate');


            // DB::debugMode(true);

            echo json_encode($data);
            exit;
        }
    }

    /**
     * Return pie chart enqury count of last 7 days from all enquiry tables.
     *
     * @author Hitendra Makwana <hitendra.seorank@gmail.com>
     */
    function getAllEnquiryDataByType() {
        if (isset($_GET['piechart'])) {
            $typeCond = "";

            //if($_GET['type'] != "All")
            //	$typeCond = " and enquiry_from='".strtolower(str_replace(" ","_",$_GET['type']))."'";
            // print_r($_REQUEST);
            // DB::debugMode();
            $date = "";
            // if(isset($_REQUEST['fromdate'])==true && isset($_REQUEST['todate'])==true){
            if ($_REQUEST['fromdate'] != $_REQUEST['todate'] && $_REQUEST['fromdate'] != "" && $_REQUEST['todate'] != "") {
                $date = " date(enquiry_date) between '" . date("Y-m-d", strtotime($_REQUEST['fromdate'])) . "' and '" . date("Y-m-d", strtotime($_REQUEST['todate'])) . "'";
            } else if ($_REQUEST['fromdate'] == $_REQUEST['todate'] && $_REQUEST['todate'] != "") {
                $date = " enquiry_date like '" . date("Y-m-d", strtotime($_REQUEST['fromdate'])) . "%'";
            } else if (isset($_REQUEST['fromdate']) == true && $_REQUEST['fromdate'] != "") {
                $date = " enquiry_date >= '" . date("Y-m-d", strtotime($_REQUEST['fromdate'])) . "'";
            } else if (isset($_GET['todate']) == true && $_REQUEST['todate'] != "") {
                $date = " date(enquiry_date) <= '" . date("Y-m-d", strtotime($_REQUEST['todate'])) . "'";
            }
            //}
            $data = DB::query('select sum(counter) as cntEnq,enquiry_from, date( enquiry_date ) AS enqDate,( DATE_SUB(DATE(NOW()),INTERVAL ' . (CFG::$graphDays - 1) . ' DAY) ) as startDate from ' . CFG::$tblPrefix . 'enquiry_log where ' . $date . ' GROUP BY enquiry_from');
            // DB::debugMode(true);

            echo json_encode($data);
            exit;
        }
    }

    function getEnquiryDataUnread($tableName, $fields) {
        return $functionCond = "(select $fields from " . $tableName . " where is_view = '0' limit 0,7)";
    }

    function getEnquiryDataRecent($tableName, $fields) {
        return $functionCond = "(select $fields from " . $tableName . " order by created_date desc limit 0,7)";
    }

    /**
     * Return All Unread enqury data tables.
     *
     * @author Hitendra Makwana <hitendra.seorank@gmail.com>
     */
    function getAllUnreadEnquiryData($unreadArr) {
        if (isset($_GET['unreadtype'])) {
            $typeCond = "";
            //print_r($unreadArr);
            $intC = 0;
            foreach ($unreadArr as $unreadArrKey => $unreadArrVal) {
                if ($_GET['unreadtype'] == $unreadArrVal['type']) {
                    $typeCond = $this->getEnquiryDataUnread($unreadArrVal['tableName'], $unreadArrVal['fields']);
                    break;
                } else {
                    if ($intC > 0) {
                        $typeCond.= ' UNION ';
                    }
                    $typeCond .= $this->getEnquiryDataUnread($unreadArrVal['tableName'], $unreadArrVal['fields']);
                    //print_r($typeCond);exit;
                }
                $intC++;
            }

            //DB::debugMode(true);
            $data = DB::query($typeCond);
            //DB::debugMode(true);

            echo json_encode($data);
            exit;
        }
    }

    function getMostPopularEnquiryData($unreadArr) {
        if (isset($_GET['mostpopular'])) {
            $typeCond = "";
            //print_r($unreadArr);
            $typeCond = "select count(*) as cntRec,pe.id as peid,pe.title,pe.first_name,pe.last_name,pe.status,pe.enquiry_date,pe.pid,p.name,p.id from " . CFG::$tblPrefix . "product_enquiry as pe," . CFG::$tblPrefix . "products as p where p.id=pe.pid group by pid order by cntRec DESC";

            //DB::debugMode(true);
            $data = DB::query($typeCond);
            //DB::debugMode(true);

            echo json_encode($data);
            exit;
        }
    }

    function getAllRecentEnquiryData($recentArr) {

        if (isset($_GET['recenttype'])) {

            $typeCond = "";
            $intC = 0;
            foreach ($recentArr as $recentArrKey => $recentArrVal) {
                if ($_GET['recenttype'] == $recentArrVal['type']) {
                    $typeCond = $this->getEnquiryDataRecent($recentArrVal['tableName'], $recentArrVal['fields']);

                    break;
                } else {
                    if ($intC > 0) {
                        $typeCond.= ' UNION ';
                    }
                    $typeCond .= $this->getEnquiryDataRecent($recentArrVal['tableName'], $recentArrVal['fields']);
                }
                $intC++;
            }

            //DB::debugMode(true);
            $data = DB::query($typeCond);

            //DB::debugMode(true);

            echo json_encode($data);
            exit;
        }
    }

    /*
     * get enquiry type from log table 
     * Hitendra Makwana <hitendra.seorank@gmail.com>
     */

    function getEnquiryType() {
        $data = DB::query('select sum(counter) as cntEnq,enquiry_from, date( enquiry_date ) AS enqDate,( DATE_SUB(DATE(NOW()),INTERVAL ' . (CFG::$graphDays - 1) . ' DAY) ) as startDate from ' . CFG::$tblPrefix . 'enquiry_log  GROUP BY enquiry_from');
        return $data;
    }

    function getCityList($state) {
        $data = DB::query('select city from ' . CFG::$tblPrefix . 'zones where state = %s order by city asc', $state);
        echo json_encode($data);
        exit;
    }

}