<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<style>

</style>

<!------------------------------------------------------------------------>

<!-- middle section part start -->
<section>
    <!-- page title part start -->
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add" ?> FAQ</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_faq&a=faq_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                            <li><a href="#" id="btnEdit" class="trans comBtn" title="Save & continue edit">Save & continue edit</a></li>
                            <li><a href="#" id="btnSave" class="trans comBtn" title="Save">Save</a></li>
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
                                <li data-tab="general" class="trans current" title="General">General</li>
                                
                             </ul>
                            <form class="form-horizontal" id="frmPage" method="post">
                            	<div class="tabMain">
								
                               <div class="accMain arrowDown">General</div>
                                    <div class="accDiv tabDiv current" id="general">
                                        <div class="formBox oneCol">
                                            
                                                <input type="hidden" id="lang_id" name="lang_id" value="">
                                                <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                                <ul class="row">
                                                    <li class="">
                                                        <span for="txtQuestion" class="labelSpan star">Question:</span>
                                                        <div class="txtBox">
                                                            <input type="text" name="question" id="txtQuestion" class="txt required" maxlength="100" title="Question"></div>
                                                    </li>
                                                    <li>
                                                        <span class="labelSpan">Answer:</span>                                                       
                                                         <div class="txtBox txtDescdiv">
                                                            <?php echo UTIL::loadTinymce(1,'txaDescription'); ?>
                                                        </div>
                                                    </li>
    
    
                                                    <li class="halfLi">
                                                        <span for="txtSortOrder" class="labelSpan">Sort Order:</span>
                                                        <div class="txtBox">
                                                            <input type="text" onkeypress="return isNumberic(event);"  maxlength="3" class="txt" id="txtSortOrder" name="txtSortOrder" title="Sort Order">
                                                        </div>
                                                    </li>
    
    
                                                    <li class="halfLi">	
                                                        <span class="labelSpan">Status:</span>
                                                        <div class="optionBox">
                                                            <div class="chkInn">
                                                                <label>
                                                                    <input type="checkbox" class="checkbox">
                                                                    <input type="checkbox" class="checkbox" id="chkStatus" name="status" value="1" checked="checked" title="Page Status" data-content="Page Status">
                                                                    <span></span>
                                                                </label>
                                                                <label for="chkStatus" id="checkAct"></label>
                                                            </div>                                                   
                                                        </div>
                                                    </li>     
    
                                                </ul>
                                        </div>
                                    </div>
    
                             </div>
                       	    </form>
                        </div>
                    </div>
                </div>
                <div class="topRight btmBtn">
                    <ul class="btnUl threeBtn">    
                        <li><a href="index.php?m=mod_faq&a=faq_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                        <li><a href="#" id="btnFooterEdit" class="trans comBtn" title="Save & continue Edit">Save & continue Edit</a></li>
                        <li><a href="#" id="btnFooterSave" class="trans comBtn" title="Save">Save</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- table part end -->
</section>
<!-- middle section part end -->


<div class="imgPrt modal fade" role="dialog"></div>