<?php
//restrict direct access to the contact_enquiry_list
defined('DMCCMS') or die('Unauthorized access');
//print_r($data);die();

//print_r($data);exit;
?>

<!-- middle section part start -->
<section>
    <!-- page title part start -->
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">

                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>">Log Details</div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl">    
                            <li><a href="<?php echo URI::getURL(APP::$moduleName, "log_list"); ?>" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>              
    </div>
    <!-- page title part end -->


    <!-- table part start -->
    <div class="middlePart">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="midWhite oldnewMid">
                        <div class="tabBox">
                            <ul class="tabUl">
                                <li data-tab="data-view" class="trans current" title="General">Log</li>
                            </ul>
                            <div class="tabMain">
                                <div class="accMain arrowDown">General</div>
                                <div class="accDiv tabDiv current" id="data-view">
                                    <div class="enqBox">
                                        <ul class="enqUl">

                                            <li>
                                                <div class="leftData">
                                                    <span class="boldSpan">Log Number:</span>
                                                    <span id="log_number" class="dataSpan"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="leftData">
                                                    <span class="boldSpan">Name:</span>
                                                    <span id="user_name" class="dataSpan"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="leftData">
                                                    <span class="boldSpan">Log Type:</span>
                                                    <span id="log_type" class="dataSpan"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="leftData newoldData" id="desc">
                                                    <span class="boldSpan">Description:</span>
                                                    <span id="description" class="dataSpan">
                                                        <?php
                                                        if ($data['json_format'] == '1') {
                                                            require URI:: getAbsModulePath(APP::$moduleName) . "/" . CFG::$view . "/log_template.php";
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="leftData">
                                                    <span class="boldSpan">Created Date:</span>
                                                    <span id="created_date" class="dataSpan"></span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="topRight btmBtn">
                    <ul class="btnUl">    
                        <li><a href="<?php echo URI::getURL(APP::$moduleName, "log_list"); ?>" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- table part end -->
</section>
<!-- middle section part end -->


