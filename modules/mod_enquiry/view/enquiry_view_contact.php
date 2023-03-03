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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>">View Enquiry</div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl">    
                            <li><a <?php if(isset($_GET['loc'])) { ?> href="index.php?m=mod_admin&a=dashboard" <?php } ?> href="index.php?m=mod_enquiry&a=contact_enquiry_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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
                    <div class="midWhite">
                        <div class="tabBox">
                            <ul class="tabUl">
                                <li data-tab="data-view" class="trans current" title="General">General</li>
                            </ul>
                            <div class="tabMain">
                                <div class="accMain arrowDown">General</div>
                                <div class="accDiv tabDiv current" id="data-view">
                                    <div class="enqBox">
                                        <ul class="enqUl">
                                            <?php
                                            $dataDiv = TRUE;
                                            foreach ($data as $key => $value) {
                                                if ($value !== '') {
                                                    if ($key == 'Estimated Property Value' || $key == 'Estimated Equipment Value' || $key == 'Loan Amount') {
                                                        $value = number_format($value,2,'.',',');
                                                        $value = '$ ' . $value;
                                                    }
                                                    if($key == 'Enquiry Date' /*|| $key == 'Prefered Time'*/) {
                                                        //$phpdate = strtotime($value);
                                                        $value = UTIL::dateDisplay($value);   
                                                    }
                                                    if ($dataDiv) {
                                                        $dataDiv = FALSE;
                                                        ?>
                                                        <li>
                                                            <div class="leftData">
                                                                <span class="boldSpan"><?php echo $key; ?>:</span>
                                                                <span class="dataSpan"><?php echo $value; ?></span>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            $dataDiv = TRUE;
                                                            ?>
                                                            <div class="rightData">
                                                                <span class="boldSpan"><?php echo $key; ?>:</span>
                                                                <span class="dataSpan"><?php echo $value; ?></span>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="topRight btmBtn">
                    <ul class="btnUl">    
                        <li><a href="index.php?m=mod_enquiry&a=contact_enquiry_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- table part end -->
</section>
<!-- middle section part end -->


