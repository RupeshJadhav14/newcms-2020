<?php define( 'DMCCMS', 1 );
require_once "cronConfig.php";
//UTIL::redirect(cfg::$livePath."/myAdmin/index.php?m=mod_admin&a=dashboard");
require_once "analytic_function.php";

	  set_time_limit(0);

	  error_reporting(0);
          APP::getSiteConfig();
          //echo "<pre>";print_r(cfg::$siteConfig);exit;
          // $authCode=authenticateAnalytic(cfg::$siteConfig['google_analytic_emails'],cfg::$siteConfig['google_analytic_password']);
           //$authCode=authenticateAnalytic("simmons.lewis@gmail.com","luCa6YeaR0lD");
          $authCode=authenticateAnalytic();
         
         $tableId=cfg::$google_tableId;
         $profileId=cfg::$google_profileId;
         $startDate = date("Y")."-".date("m")."-01";
	 $lastDate = date("Y")."-".date("m")."-".date("t");
        //           $startDate = date("Y-m-d",mktime(0,0,0,date("n")-1,1,date("Y")));
	//	   $varStrToTime=strtotime($startDate);
	//	   $lastDate = date("Y",$varStrToTime)."-".date("m",$varStrToTime)."-".date("t",$varStrToTime);
         
         if(!empty($authCode))		// Check authentication code
		{
			$arrTotalVisists = getTotalVisit($tableId,$startDate,$lastDate,$authCode);
                        echo "<pre>";print_r($arrTotalVisists);exit;
                        list($arrNewVisitor,$arrReturnVisitor) = getVisitType($tableId,$startDate,$lastDate,$authCode);
                        list($arrDirect,$arrReferral,$arrOrganic,$arrPpc) = getMediumType($tableId,$startDate,$lastDate,$authCode);
                        $arrAustraliaTraffic = getAustraliaTraffic($tableId,$startDate,$lastDate,$authCode);
                        $arrTotalPageViews = getPageViews($tableId,$startDate,$lastDate,$authCode);
                        $arrUniqueVisitor = getUniqueVisitor($tableId,$startDate,$lastDate,$authCode);
                        $arrBounceRate = getBounceRate($tableId,$startDate,$lastDate,$authCode);
                        $arrGoal = getGoalDetail($tableId,$profileId,$startDate,$lastDate,$authCode);
                        
                        foreach($arrTotalVisists as $monthKey => $row)
			{
                                        $year = "";
					$month = "";
					list($year,$month) = explode("_",$monthKey);
					$lastDate = date("t",strtotime($year."-".$month."-01"));
					$startDate = $year."-".$month."-01";
					$endDate = $year."-".$month."-".$lastDate;
					$arrTopTrafficReferral = getTopTrafficeReferral($tableId,$startDate,$endDate,$authCode);
					$arrTopTrafficOrganic = getTopTrafficeOrganic($tableId,$startDate,$endDate,$authCode);					
					$arrTopKeywordOrganic = getTopKeywordOrganic($tableId,$startDate,$endDate,$authCode);					
					$arrTopKeywordPPC = getTopKeywordPPC($tableId,$startDate,$endDate,$authCode);
					$arrTopEntryPage = getTopEntryPage($tableId,$startDate,$endDate,$authCode);
					$arrTopExitPage = getTopExitPage($tableId,$startDate,$endDate,$authCode);
					
					$organic = checkArrayVariable($arrOrganic,$monthKey);
                                        if($organic == "")
					$organic = 0;
					$ppc = checkArrayVariable($arrPpc,$monthKey);
					if($ppc == "")
					$ppc=0;
					$bounceRate = checkArrayVariable($arrBounceRate,$monthKey);
					$feed_id = $profileId.$month.$year;
                                        $fields['profile_id'] = $profileId;
					$fields['total_traffic'] = $row;
					$fields['new_traffic']	= checkArrayVariable($arrNewVisitor,$monthKey);
					$fields['returning_traffic'] = checkArrayVariable($arrReturnVisitor,$monthKey);
					$fields['total_referral_traffic'] = checkArrayVariable($arrReferral,$monthKey);
					$fields['direct_traffic'] = checkArrayVariable($arrDirect,$monthKey);
					$fields['search_engine'] = $organic + $ppc;
					$fields['organic'] = $organic;
					$fields['ppc'] = $ppc;
					$fields['australia_traffic'] = checkArrayVariable($arrAustraliaTraffic,$monthKey);
					$fields['total_page_views'] = checkArrayVariable($arrTotalPageViews,$monthKey);
					$fields['unique_visitors'] = checkArrayVariable($arrUniqueVisitor,$monthKey);
					$fields['top_sources_referral'] = implode(",",$arrTopTrafficReferral);
					$fields['top_organic_traffic'] = implode(",",$arrTopTrafficOrganic);
					$fields['top_keywords_organic'] = implode(",",$arrTopKeywordOrganic);
					$fields['top_keywords_ppc'] = implode(",",$arrTopKeywordPPC);
					
					$bounceRate = ((float)$bounceRate*100)/(float)$fields['total_traffic'];
					$fields['total_bounce_rate'] = $bounceRate;
					
					$fields['top_entry_page'] = implode(",",$arrTopEntryPage);
					$fields['top_exit_page'] = implode(",",$arrTopExitPage);
					$fields['goal_data'] = checkArrayVariable($arrGoal,$monthKey);
					//$fields['no_pages_index'] = "";
					$fields['start_date'] = $startDate;
					$fields['end_date'] = $endDate;
                                        $arrTemp=DB::query("SELECT * FROM ".CFG::$tblPrefix."analytics_feed where  feed_id=%s  " ,$feed_id);
                                        					
					if(count($arrTemp) > 0)
					{	
					
                                         DB::update(CFG::$tblPrefix."analytics_feed",StringManage::processString($fields)," feed_id=%s  ",$feed_id);
					}
					else
					{
						$fields['feed_id'] = $feed_id;
						$fields['no_pages_index']="";
						
                                                DB::insert(CFG::$tblPrefix."analytics_feed",StringManage::processString($fields));
					}				
                        }
                        
                }
     UTIL::redirect(cfg::$livePath."/myAdmin/index.php?m=mod_admin&a=booking");
          


?>