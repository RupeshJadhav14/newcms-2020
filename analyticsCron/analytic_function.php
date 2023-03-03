<?php
function getAccountFeed($url,$authcode)
{
	$header[] ="Authorization: ".$authcode."";
	$response=sendCurlRequest($url,$header);
	//echo $response;exit;
	return $response;
}

function getGoalDetail($tableId,$profileId,$startDate,$endDate,$authCode)
{ 
	$goalData=getAccountFeed("https://www.googleapis.com/analytics/v2.4/management/accounts/~all/webproperties/~all/profiles/~all/goals",$authCode);
	$goalDoc = new DOMDocument();
	$goalDoc->loadXML($goalData);
	$goalFeed = $goalDoc->getElementsByTagName( "feed" );
	$goalObjEntry = $goalFeed->item(0)->getElementsByTagName( "entry" );
        foreach($goalObjEntry as $goalEntry)
	{
            $goalProfile = $goalEntry->getElementsByTagName("property");
	   $profId = $goalProfile->item(0)->getAttribute("value");
           if($profId!=$profileId)
               continue;
           if($goalEntry->getElementsByTagName("goal")) // Check goal
           {
	   $objGoal = $goalEntry->getElementsByTagName("goal");	// Create goal object
           foreach($objGoal as $goal)		// Insert goal data in database
            {
                    $goalStatus = ($goal->getAttribute("active")== true)?'1':'0';
                    $goalName = $goal->getAttribute("name");
                    $goalNumber = $goal->getAttribute("number");		
                    
                                        
                    $arrGoal=DB::query("SELECT * FROM ".CFG::$tblPrefix."analytics_goal where  profile_id=%s and goal_id=%d " ,$profileId,$goalNumber);

                    if(count($arrGoal) > 0)
                    {
                          
                            $arrFields=  array("goal_name"=>$goalName,"status"=>$goalStatus);
                            DB::update(CFG::$tblPrefix."analytics_goal",StringManage::processString($arrFields)," profile_id=%s and goal_id=%d ",$profileId,$goalNumber);
                    }
                    else
                    {
                            
                            $arrFields=  array("profile_id"=>$profileId,"goal_id"=>$goalNumber,"goal_name"=>$goalName,"status"=>$goalStatus);
                            DB::insert(CFG::$tblPrefix."analytics_goal",StringManage::processString($arrFields));
                    }
            }
        }
           
        }
        $header[] ="Authorization: ".$authCode."";
        $arrGoal=DB::query("SELECT * FROM ".CFG::$tblPrefix."analytics_goal where  profile_id=%s  " ,$profileId);
        $arrTemp = array();
		
	if(count($arrGoal) > 0)
	{
		$strMatrics = "";
		foreach($arrGoal as $mKey => $mVal)
			$strMatrics .= "ga:goal".$mVal['goal_id']."Completions,";	
		
		$strMatrics = substr($strMatrics,0,strlen($strMatrics)-1);
		
		$postdata = array("metrics=".urlencode($strMatrics),
					  "dimensions=".urlencode("ga:month,ga:year"),
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "sort=".urlencode("-ga:year,-ga:month"),
					  "max-results=500",
					  "ids=".urlencode($tableId));
					  
		$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
		$response = sendCurlRequest($url,$header);
		
		//echo "<pre>";print_r($response);exit;
		
		$objEntry = parseResponseFeed($response);
		
		foreach($objEntry as $entry)
		{
			$objDate = $entry->getElementsByTagName( "dimension" );
			
			$month = $objDate->item(0)->getAttribute("value");
			$year = $objDate->item(1)->getAttribute("value");
			
			$objMatric = $entry->getElementsByTagName( "metric" );
			$cntM = 0;
			$strGoal = "";
			foreach($objMatric as $matKey => $matVal)
			{
				$strGoal .= addslashes($arrGoal[$cntM]['goal_name'])."=".$matVal->getAttribute("value")."<br>";
				$cntM++;
			}
			
			$arrTemp[$year."_".$month] = $strGoal;
		}
	}
	
		
	return $arrTemp;
}
function authenticateAnalytic()
{	  
        // check for authorization code. if found send request for api access tocken
        if(isset($_GET['code']) && $_GET['code'] != "" && urlencode("security_token".CFG::$googleSecretKey) == $_GET['state'])      
        {
            // create post data
            $postdata = array(
              'code='.urlencode($_GET['code']),
              'client_id='.urlencode(CFG::$googleClientId),
              'client_secret='.urlencode(CFG::$googleSecretKey),
              'redirect_uri='.urlencode(CFG::$googleRedirectURL),
              'grant_type='.'authorization_code'
              );
            
            // send request
            $response = sendCurlRequest("https://www.googleapis.com/oauth2/v3/token",$header,$postdata);
            $arrResponse = json_decode($response);
            
            if(isset($arrResponse->refresh_token))      // if access tocken get successfully then insert it into database and return access token
            {
                // delete existing refresh token if exists
                DB::query("delete from ".CFG::$tblPrefix."configuration where config_key='google_analytics_refresh_token'");

                // insert refresh tocken into database
                DB::query("insert into ".CFG::$tblPrefix."configuration (config_name,config_key,config_value,created_date) values('Google API Refresh Tocken','google_analytics_refresh_token','".$arrResponse->refresh_token."','".date("Y-m-d")."')");
            
                // return access token
                return $arrResponse->token_type." ".$arrResponse->access_token;        
            }
            else    // otherwise redirect control to google API authentication page
            {
                    
                header("Location: "."https://accounts.google.com/o/oauth2/auth?scope=".urlencode("https://www.googleapis.com/auth/analytics")."&response_type=code&client_id=".urlencode(CFG::$googleClientId)."&redirect_uri=".urlencode(CFG::$googleRedirectURL)."&state=".urlencode("security_token".CFG::$googleSecretKey)."&approval_prompt=force&access_type=offline");
                exit;
            }    
        }
       
        // check refresh token data in configuration table.
        $tokenData = DB::query("select config_value from ".CFG::$tblPrefix."configuration where config_key='google_analytics_refresh_token'");
        if(count($tokenData) > 0 )
        {           
            // create post data
            $postdata = array(
              'refresh_token='.urlencode($tokenData[0]['config_value']),
              'client_id='.urlencode(CFG::$googleClientId),
              'client_secret='.urlencode(CFG::$googleSecretKey),              
              'grant_type='.'refresh_token'
              );
            
            
            $response = sendCurlRequest("https://www.googleapis.com/oauth2/v3/token",$header,$postdata);    // send request for access token
            $arrResponse = json_decode($response);
            return $arrResponse->token_type." ".$arrResponse->access_token;
        }            
        else
        {
            // redirect to google API authentication page.
            header("Location: "."https://accounts.google.com/o/oauth2/auth?scope=".urlencode("https://www.googleapis.com/auth/analytics")."&response_type=code&client_id=".urlencode(CFG::$googleClientId)."&redirect_uri=".urlencode(CFG::$googleRedirectURL)."&state=".urlencode("security_token".CFG::$googleSecretKey)."&approval_prompt=force&access_type=offline");
            exit;
        }
}

function sendCurlRequest($url,$header=array(),$postdata = array())
{
	$ch = curl_init();	

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);	
        //curl_setopt($ch, CURLOPT_SSLVERSION, 1);
        if(count($header) > 0)
        {  // print_r($header);
            @curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
           // curl_setopt($ch, CURLOPT_HEADER, true);
        }
	if(count($postdata) > 0)
	{ //echo implode("&",$postdata);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, implode("&",$postdata));
	}
	
	$response = curl_exec($ch);
    $info = curl_getinfo($ch);
	
	curl_close($ch);
		
	return $response;
}
function getTotalVisit($tableId,$startDate,$endDate,$authCode)
{ 
	//echo $tableId."<br><br>";exit;
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
				  "dimensions=".urlencode("ga:month,ga:year"),
				  "start-date=".urlencode($startDate),
				  "end-date=".urlencode($endDate),
				  "sort=".urlencode("-ga:year,-ga:month"),
				  "max-results=100",
				  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);

	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$month = $objDate->item(0)->getAttribute("value");
		$year = $objDate->item(1)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[$year."_".$month] = $value;
	}
	
	return $arrTemp;
}
function parseResponseFeed($response)
{
	$doc = new DOMDocument();
	$doc->loadXML($response);
	
	$objFeed = $doc->getElementsByTagName( "feed" );	
	$objEntry = $objFeed->item(0)->getElementsByTagName( "entry" );
	
	return $objEntry;
}

function getVisitType($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
					  "dimensions=".urlencode("ga:visitorType,ga:month,ga:year"),					
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "sort=".urlencode("-ga:year,-ga:month"),
					  "max-results=500",
					  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$arrNewVisitor = array();
	$arrReturnVisitor = array();
	
	$objEntry = parseResponseFeed($response);
		
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$type = $objDate->item(0)->getAttribute("value");
		$month = $objDate->item(1)->getAttribute("value");
		$year = $objDate->item(2)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		if($type == 'New Visitor')
			$arrNewVisitor[$year."_".$month] = $value;
		else
			$arrReturnVisitor[$year."_".$month] = $value;
	}	
	
	return array($arrNewVisitor,$arrReturnVisitor);
}

function getMediumType($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
					  "dimensions=".urlencode("ga:medium,ga:month,ga:year"),					
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "sort=".urlencode("-ga:year,-ga:month"),
					  "max-results=500",
					  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$arrReferral = array();
	$arrDirect = array();
	$arrOrganic = array();
	$arrPPC = array();
	
	$objEntry = parseResponseFeed($response);
		
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$type = $objDate->item(0)->getAttribute("value");
		$month = $objDate->item(1)->getAttribute("value");
		$year = $objDate->item(2)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		if($type == '(none)')
			$arrDirect[$year."_".$month] = $value;
		else if($type == 'organic')
			$arrOrganic[$year."_".$month] = $value;
		else if($type == 'referral')
			$arrReferral[$year."_".$month] = $value;
		else if($type == 'cpc')
			$arrPPC[$year."_".$month] = $value;
	}	
	
	return array($arrDirect,$arrReferral,$arrOrganic,$arrPPC);
}

function getAustraliaTraffic($tableId,$startDate,$endDate,$authCode)
{ 
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
				  "dimensions=".urlencode("ga:month,ga:year,ga:country"),
				  "start-date=".urlencode($startDate),
				  "end-date=".urlencode($endDate),
				  "filters=".urlencode("ga:country==Australia"),
				  "sort=".urlencode("-ga:year,-ga:month"),
				  "max-results=100",
				  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);

	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$month = $objDate->item(0)->getAttribute("value");
		$year = $objDate->item(1)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[$year."_".$month] = $value;
	}
	
	return $arrTemp;
}

function getPageViews($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:pageviews"),
				  "dimensions=".urlencode("ga:month,ga:year"),
				  "start-date=".urlencode($startDate),
				  "end-date=".urlencode($endDate),				
				  "sort=".urlencode("-ga:year,-ga:month"),
				  "max-results=100",
				  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);

	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$month = $objDate->item(0)->getAttribute("value");
		$year = $objDate->item(1)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[$year."_".$month] = $value;
	}
	
	return $arrTemp;
}

function getUniqueVisitor($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visitors"),
				  "dimensions=".urlencode("ga:month,ga:year"),
				  "start-date=".urlencode($startDate),
				  "end-date=".urlencode($endDate),				
				  "sort=".urlencode("-ga:year,-ga:month"),
				  "max-results=100",
				  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);

	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$month = $objDate->item(0)->getAttribute("value");
		$year = $objDate->item(1)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[$year."_".$month] = $value;
	}
	
	return $arrTemp;
}

function getBounceRate($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:bounces"),
					  "dimensions=".urlencode("ga:month,ga:year"),
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),				
					  "sort=".urlencode("-ga:year,-ga:month"),
					  "max-results=100",
					  "ids=".urlencode($tableId));
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);

	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );
		
		$month = $objDate->item(0)->getAttribute("value");
		$year = $objDate->item(1)->getAttribute("value");
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[$year."_".$month] = $value;
	}
	
	return $arrTemp;
}

function getTopTrafficeReferral($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";	
	$postdata = array("metrics=".urlencode("ga:visits"),
					  "dimensions=".urlencode("ga:source"),
					  "filters=".urlencode("ga:medium==referral"),
					  "sort=".urlencode("-ga:visits"),	
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "max-results=6",
					  "ids=".urlencode($tableId));
	
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );		
		$site = $objDate->item(0)->getAttribute("value");		
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[] = $site;
	}
	
	return $arrTemp;
}

function getTopTrafficeOrganic($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
					  "dimensions=".urlencode("ga:source"),
					  "filters=".urlencode("ga:medium==organic"),
					  "sort=".urlencode("-ga:visits"),	
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "max-results=6",
					  "ids=".urlencode($tableId));
	
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );		
		$site = $objDate->item(0)->getAttribute("value");		
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[] = $site;
	}
	
	return $arrTemp;
}

function getTopKeywordOrganic($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
					  "dimensions=".urlencode("ga:keyword"),
					  "filters=".urlencode("ga:medium==organic"),
					  "sort=".urlencode("-ga:visits"),	
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "max-results=6",
					  "ids=".urlencode($tableId));
	
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );		
		$site = $objDate->item(0)->getAttribute("value");		
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[] = $site;
	}
	
	return $arrTemp;
}

function getTopKeywordPPC($tableId,$startDate,$endDate,$authCode)
{

	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:visits"),
					  "dimensions=".urlencode("ga:keyword"),
					  "filters=".urlencode("ga:medium==cpc"),
					  "sort=".urlencode("-ga:visits"),	
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "max-results=6",
					  "ids=".urlencode($tableId));
	
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );		
		$site = $objDate->item(0)->getAttribute("value");		
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[] = $site;
	}
	
	return $arrTemp;
}

function getTopEntryPage($tableId,$startDate,$endDate,$authCode)
{
	
	$header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:entrances"),
					  "dimensions=".urlencode("ga:landingPagePath"),					 
					  "sort=".urlencode("-ga:entrances"),	
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "max-results=6",
					  "ids=".urlencode($tableId));
	
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );		
		$site = $objDate->item(0)->getAttribute("value");		
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[] = $site;
	}
	
	return $arrTemp;
}

function getTopExitPage($tableId,$startDate,$endDate,$authCode)
{
      $header[] ="Authorization: ".$authCode."";
	
	$postdata = array("metrics=".urlencode("ga:exits"),
					  "dimensions=".urlencode("ga:exitPagePath"),					 
					  "sort=".urlencode("-ga:exits"),	
					  "start-date=".urlencode($startDate),
					  "end-date=".urlencode($endDate),
					  "max-results=6",
					  "ids=".urlencode($tableId));
	
	$url = "https://www.google.com/analytics/feeds/data"."?".implode("&",$postdata);
	$response = sendCurlRequest($url,$header);
	
	$objEntry = parseResponseFeed($response);
	
	$arrTemp = array();
	
	foreach($objEntry as $entry)
	{
		$objDate = $entry->getElementsByTagName( "dimension" );		
		$site = $objDate->item(0)->getAttribute("value");		
		
		$objMatric = $entry->getElementsByTagName( "metric" );
		$value = $objMatric->item(0)->getAttribute("value");
		
		$arrTemp[] = $site;
	}
	
	return $arrTemp;
}
function checkArrayVariable($array,$varName)
{
	return isset($array[$varName])?$array[$varName]:"";
}
?>