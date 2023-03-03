<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
return true;
// Load helper file
//print_r($data);exit;
Load::loadHelper("admin", APP::$moduleName);

// create object of helper
$adminHelper = new AdminHelper();
//echo "<pre>";
$summary = $data['data'][0]['final_graph']['summary'];
//print_r($data['data'][0]);exit;
if (trim($summary) != "") {
    $summary = explode("@@@", $summary);
}
//  echo "<pre>";
//print_r($summary);
?>

<section>
    <div class="container-fluid">
        <div class="row">

            <!-- Dashboard left part start -->
            <div class="dashLeft">
                <div class="dashRow clearDiv openAccdiv">
                    <div class="titleDiv">
                        <i class="fa fa-file-text-o"></i>
                        <span class="titSpan">Enquiries</span>
                    </div>

                    <div class="rowBtm clearDiv">
                        <div class="btmInner">
                            <div class="enQsel">	
                                <select  id="showGraphdata" class="selectBox" >
                                    <option value="All Enquiries">All Enquiries</option>
                                    <?php foreach ($data['enquiryType'][0] as $k => $v) { ?>
                                    <option value="<?php echo $v['enquiry_from']; ?>"><?php echo ucwords($v['enquiry_from']); ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>

                            <ul class="tabUl">	
                                <li title="All Enquiries" class="trans current" data-tab="allEnq">All Enquiries</li>

                            </ul>   

                            <div class="tabMain">
                                <div class="accMain">All Enquiries</div>
                                <div id="allEnq" class="accDiv tabDiv current">
                                    <div id="allEnqchart" style="width:100%;height:250px;"></div> 
                                </div>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="dashRow clearDiv">
                    <div class="titleDiv">
                        <i class="fa fa-file-text-o"></i>
                        <span class="titSpan">Enquiry Summary</span>
                    </div>
                    <div class="rowBtm clearDiv">
                        <div class="btmInner">
                            <ul class="tabUl">	
                                <li title="Unread Enquiry" class="trans current" data-tab="unread">Unread Enquiry</li>
                                <li title="Recent Enquiry" class="trans" data-tab="recent">Recent Enquiry</li>
                            </ul>

                            <div class="tabMain">

                                <div class="accDiv tabDiv current" id="unread">
                                    <div class="enQsel">	
                                        <select class="selectBox" id="unreadUlData"  data-trigger="focus"  data-title="Enquiry Type" rel="popover" data-placement="right" data-content="Select enquiry type." >
                                            <option value="All">All Enquiries</option>
                                        </select>
                                    </div>                                
                                    <div id="gridBlock">
                                        <!-- loader -->
                                        <div class="qLoverlay-new"></div>
                                        <div class="qLbar-new"></div>
                                        <!-- loader -->
                                        <form id="frmGrid" class="scrForm">
                                            <ul class="table tableu" id="checkAll">
                                                <li class="topLi">
                                                    <div class="hashBox">#</div>
                                                    <div id="id" class="sort">Id</div>
                                                    <div  id="first_name" class="sort">Name</div>
                                                    <div id="enquiry_date" class="sort">Email</div>
                                                    <div id="enquiry_typeU" class="sort">Mobile</div>
                                                    <div>Enquiry Date</div>
                                                </li>

                                            </ul>
                                        </form>
                                    </div>
                                    <div id="noGrid" class="content hideBlock" >
                                        Contact enquiry records not found
                                    </div> 
                                </div>

                                <div class="accDiv tabDiv" id="recent">
                                    <div class="enQsel">	
                                        <select class="selectBox" id="recentUlData"  data-trigger="focus"  data-title="Enquiry Type" rel="popover" data-placement="right" data-content="Select enquiry type." >
                                            <option value="All">All Enquiries</option>
                                        </select>                                        
                                    </div>                 
                                    <div id="gridBlock">
                                        <!-- loader -->
                                        <div class="qLoverlay-new"></div>
                                        <div class="qLbar-new"></div>
                                        <!-- loader -->
                                        <form id="frmGrid" class="scrForm">
                                            <ul class="table tabler" id="checkAll">
                                                <li class="topLi">
                                                    <div class="hashBox">#</div>
                                                    <div id="id" class="sort">Id</div>
                                                    <div id="name" class="sort">Name</div>
                                                    <div id="created_date" class="sort">Email</div>
                                                    <div id="phone" class="sort">Mobile</div>
                                                    <div id="date" class="sort">Enquiry Date</div>
                                                </li>

                                            </ul>
                                        </form>
                                    </div>

                                    <div id="noGrid" class="content hideBlock" >
                                        Contact enquiry records not found
                                    </div>

                                </div>
                            </div>

                        </div>    
                    </div>
                </div>                    
            </div>
            <!-- Dashboard left part start -->


            <!-- Dashboard right part start -->
            <div class="dashRight">
                <!-- Google Analytic Chart part start -->
                <div class="dashRow clearDiv">
                    <div class="titleDiv">
                        <i class="fa  fa-line-chart"></i>
                        <span class="titSpan">Google Analytic Chart</span>
                    </div>

                    <div class="rowBtm clearDiv paddNone">
                        <div class="btmInner">
                            <div class="enqdateRight">	
                                <form class="box-form " onsubmit="return false;">
                                    <?php
                                    $previouseDate = date("d-m-Y", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
                                    $currentDate = date("d-m-Y", strtotime(date("Y-m-d", strtotime(date("Y-m-d")))));
                                    ?>
                                    <div class="dateContaine">
                                        <span class="labelSpan">Date From:</span>
                    <!--                    <input  type="text" name="searchForm[dateFrom]" id="txtDFromgoogle" class="low-line-height applyTooptip" maxlength="85" data-content="Select from date" data-placement="top" rel="popover" data-title="From date" data-trigger="focus" readonly="readonly" value="<?php //echo $previouseDate;    ?>" >-->
                                        <select class="form-control applyPopover " name="selFromMonth" id="selFromMonth">
                                            <option <?php if (date("m", strtotime("+1 month")) == 1) { ?> selected="selected" <?php } ?> value="01">January</option> 
                                            <option <?php if (date("m", strtotime("+1 month")) == 2) { ?> selected="selected" <?php } ?> value="02">February</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 3) { ?> selected="selected" <?php } ?> value="03">March</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 4) { ?> selected="selected" <?php } ?> value="04">April</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 5) { ?> selected="selected" <?php } ?> value="05">May</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 6) { ?> selected="selected" <?php } ?> value="06">June</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 7) { ?> selected="selected" <?php } ?> value="07">July</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 8) { ?> selected="selected" <?php } ?> value="08">August</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 9) { ?> selected="selected" <?php } ?> value="09">September</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 10) { ?> selected="selected" <?php } ?> value="10">October</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 11) { ?> selected="selected" <?php } ?> value="11">November</option>
                                            <option <?php if (date("m", strtotime("+1 month")) == 12) { ?> selected="selected" <?php } ?> value="12">December</option>
                                        </select>

                                        <select class="form-control applyPopover" name="selFromYear" id="selFromYear">
                                            <?php
                                            for ($int = date("Y"); $int > 1980; $int--) {
                                                echo date("Y");
                                                ?>
                                                <option <?php if (date("Y", strtotime("-1 year")) == $int) { ?> selected="selected" <?php } ?> value="<?php echo $int; ?>"><?php echo $int; ?></option>
<?php } ?></select>
                                    </div>
                                    <div class="dateContaine">	
                                        <span class="labelSpan">Date To:</span>
                                        <select class="form-control applyPopover " name="selToMonth" id="selToMonth">
                                            <option <?php if (date("m") == 1) { ?> selected="selected" <?php } ?> value="01">January</option> 
                                            <option <?php if (date("m") == 2) { ?> selected="selected" <?php } ?> value="02">February</option>
                                            <option <?php if (date("m") == 3) { ?> selected="selected" <?php } ?> value="03">March</option>
                                            <option <?php if (date("m") == 4) { ?> selected="selected" <?php } ?> value="04">April</option>
                                            <option <?php if (date("m") == 5) { ?> selected="selected" <?php } ?> value="05">May</option>
                                            <option <?php if (date("m") == 6) { ?> selected="selected" <?php } ?> value="06">June</option>
                                            <option <?php if (date("m") == 7) { ?> selected="selected" <?php } ?> value="07">July</option>
                                            <option <?php if (date("m") == 8) { ?> selected="selected" <?php } ?> value="08">August</option>
                                            <option <?php if (date("m") == 9) { ?> selected="selected" <?php } ?> value="09">September</option>
                                            <option <?php if (date("m") == 10) { ?> selected="selected" <?php } ?> value="10">October</option>
                                            <option <?php if (date("m") == 11) { ?> selected="selected" <?php } ?> value="11">November</option>
                                            <option <?php if (date("m") == 12) { ?> selected="selected" <?php } ?> value="12">December</option>
                                        </select>
                                        <select class="form-control applyPopover" name="selToYear" id="selToYear">
                                            <?php
                                            for ($int = date("Y"); $int > 1980; $int--) {
                                                echo date("Y");
                                                ?>
                                                <option <?php if (date("Y") == $int) { ?> selected="selected" <?php } ?> value="<?php echo $int; ?>"><?php echo $int; ?></option>
<?php } ?>
                                        </select>
                                    </div>    

                                    <button class="btn btn-success applyTooptip" id="searchgoogle" title="Go" >Go</button>
                                </form>
                            </div>
                            <div class="chartTab clearDiv">
                                <ul class="tabUl">
                                    <li class="trans current" data-tab="trafficChart" title="Traffic chart">Traffic chart</li>
                                    <li class="trans" data-tab="otherChart" title="Other Traffic">Other Traffic</li>
                                    <li class="trans" data-tab="otherData" title="Other Data">Other Data</li>
                                </ul>
                                <div class="tabMain">   
                                    <div class="accMain arrowDown">Traffic chart</div>             
                                    <div class="accDiv tabDiv current" id="trafficChart">	
                                        <div id="myfirstchart" style="height: 250px;"></div>                                                
                                    </div>   
                                    <div class="accMain">Other Traffic</div>
                                    <div class="accDiv tabDiv" id="otherChart">

                                    </div>
                                    <div class="accMain">Other Data</div>
                                    <div class="accDiv tabDiv" id="otherData">

                                    </div>	 

                                </div>  
                            </div>           
                        </div>	
                    </div>

                </div>
                <!-- Google Analytic Chart part End -->


                <!-- Google Analytic Summary part start -->
                <div class="dashRow clearDiv">
                    <div class="titleDiv">
                        <i class="fa fa-file-text-o"></i>
                        <span class="titSpan">Google Analytic Summary</span>
                    </div>

                    <div class="rowBtm clearDiv paddNone">
                        <div class="btmInner">
                            <div class="enqdateRight">
                                <?php
                                $previouseDate = date("d-m-Y", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "-1 month"));
                                $currentDate = date("d-m-Y", strtotime(date("Y-m-d", strtotime(date("Y-m-d")))));
                                ?>
                                <div class="dateContaine">	
                                    <span class="labelSpan">Date:</span>
                                    <select class="form-control applyPopover " name="selMonthSummary" id="selMonthSummary">
                                        <option <?php if (date("m") == 1) { ?> selected="selected" <?php } ?> value="01">January</option> 
                                        <option <?php if (date("m") == 2) { ?> selected="selected" <?php } ?> value="02">February</option>
                                        <option <?php if (date("m") == 3) { ?> selected="selected" <?php } ?> value="03">March</option>
                                        <option <?php if (date("m") == 4) { ?> selected="selected" <?php } ?> value="04">April</option>
                                        <option <?php if (date("m") == 5) { ?> selected="selected" <?php } ?> value="05">May</option>
                                        <option <?php if (date("m") == 6) { ?> selected="selected" <?php } ?> value="06">June</option>
                                        <option <?php if (date("m") == 7) { ?> selected="selected" <?php } ?> value="07">July</option>
                                        <option <?php if (date("m") == 8) { ?> selected="selected" <?php } ?> value="08">August</option>
                                        <option <?php if (date("m") == 9) { ?> selected="selected" <?php } ?> value="09">September</option>
                                        <option <?php if (date("m") == 10) { ?> selected="selected" <?php } ?> value="10">October</option>
                                        <option <?php if (date("m") == 11) { ?> selected="selected" <?php } ?> value="11">November</option>
                                        <option <?php if (date("m") == 12) { ?> selected="selected" <?php } ?> value="12">December</option>
                                    </select>
                                    <select class="form-control applyPopover" name="selYearSummary" id="selYearSummary"><?php
                                for ($int = date("Y"); $int > 1980; $int--) {
                                    echo date("Y");
                                    ?>
                                            <option <?php if (date("Y") == $int) { ?> selected="selected" <?php } ?> value="<?php echo $int; ?>"><?php echo $int; ?></option>
<?php } ?>
                                    </select>
                                </div>    
                                <button class="btn btn-success applyTooptip" id="searchgoogleSummary" title="Go" >Go</button>
                            </div>

                            <div class="gsummaryCol clearDiv">
                                <div class="horColumn">
                                    <h4 class="horTitle">Top 5 organic traffic</h4>
                                    <ul id="organictraffic">
                                        <li class="clearfix">google</li><li class="clearfix">bing</li><li class="clearfix">yahoo</li><li class="clearfix">ask</li><li class="clearfix">globo</li>                                    
                                    </ul>
                                    <?php
                                    //                            if (!empty($summary[0])) {
                                    //                                $temp = explode(",", $summary[0]);
                                    //                                echo "<ul><li class='clearfix'/>" . implode("<li class='clearfix'/>", $temp) . "</ul>";
                                    //                            }
                                    ?>
                                </div>

                                <div class="horColumn">
                                    <h4 class="horTitle">Top 5 keywords organic</h4>
                                    <ul id="organicKeyword"></ul>
                                    <?php
                                    //                            if (!empty($summary[1])) {
                                    //                                $temp = explode(",", $summary[1]);
                                    //                                echo "<ul><li class='clearfix'/>" . implode("<li class='clearfix'/>", $temp) . "</ul>";
                                    //                            }
                                    ?>
                                </div>
                                <div class="horColumn">
                                    <h4 class="horTitle">Top 5 keywords (PPC) </h4>
                                    <ul id="ppc"></ul>
                                    <?php
                                    //                            if (!empty($summary[2])) {
                                    //                                $temp = explode(",", $summary[2]);
                                    //                                echo "<ul><li class='clearfix'/>" . implode("<li class='clearfix'/>", $temp) . "</ul>";
                                    //                            }
                                    ?>
                                </div>
                                <div class="horColumn">
                                    <h4 class="horTitle">Top 5 entry pages</h4>
                                    <ul id="entrypages"></ul>
                                    <?php
                                    //                            if (!empty($summary[3])) {
                                    //                                $temp = explode(",", $summary[3]);
                                    //                                echo "<ul><li class='clearfix'/>" . implode("<li class='clearfix'/>", $temp) . "</ul>";
                                    //                            }
                                    ?>
                                </div>                            
                            </div>
                        </div>
                    </div>

                </div>                    
                <!-- Google Analytic Summary part end -->

            </div>


            <!-- Dashboard right part end -->
        </div>   
    </div>
</section>  



<script language="javascript" type="text/javascript">
<?php echo StringManage::createJsObject("final_graph", $data['data']['final_graph']); ?>
</script>