<?php
//restrict direct access to the Comment
defined('DMCCMS') or die('Unauthorized access');
?>

<!-- middle section part start -->
<section>
    <!-- page title part start -->
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add/Edit" ?> Comment</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_comment&a=comment_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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
                                <li data-tab="tab-1" class="trans current" title="General">General</li>
                            </ul>
                            <div class="tabMain">
                                <div class="accMain arrowDown">General</div>
                                <div class="accDiv tabDiv current" id="tab-1">
                                    <div class="formBox oneCol">
                                        <form class="form-horizontal" id="frmComment" method="post">
                                            <input type="hidden" id="lang_id" name="lang_id" value="">
                                            <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                            <ul class="row">
                                                <li class="">
                                                    <span for="txtTitle" class="labelSpan star">Customer Name:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="title" id="txtTitle" class="txt required" maxlength="100" title="Comment Name"><small>Maximum character length 100</small>
                                                    </div>
                                                </li>

	
												<li class="">
                                                    <span for="txtBlog" class="labelSpan star">Blog ID:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="blog_id" id="txtBlog" class="txt required" maxlength="100" title="Blog Name"><small>Maximum character length 100</small>
                                                    </div>
                                                </li>

                                                <li>
                                                    <span for="txaDescription" class="labelSpan star">Description:</span>
                                                    <div class="txtBox">
													
														<?php
														
														
														
														?>
													
                                                        <textarea class="txt required" name="shortDesc" id="txaDescription" title="Description"></textarea>
														
                                                    </div>
                                                </li>


                                                <li class="halfLi">
                                                    <span class="labelSpan">Sort Order:</span>
                                                    <div class="txtBox">
                                                        <input type="text" onkeypress="return isNumberic(event);"  maxlength="3" class="txt smallTxt" id="sortOrder" name="sortOrder" title="Sort Order">
                                                    </div>
                                                </li>


                                                <li class="halfLi">	
                                                    <span class="labelSpan">Status:</span>
                                                    <div class="optionBox">
                                                        <div class="chkInn">
                                                            <label>
                                                                <input type="checkbox" class="checkbox">
                                                                <input type="checkbox" class="checkbox" id="chkStatus" name="status" value="1" checked="checked" title="Comment Status" data-content="Comment Status">
                                                                <span></span>
                                                            </label>
                                                            <label for="chkStatus" id="checkAct"></label>
                                                        </div>                                                   
                                                    </div>
                                                </li>     

                                            </ul>
                                        </form>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="topRight btmBtn">
                    <ul class="btnUl threeBtn">    
                        <li><a href="index.php?m=mod_Comment&a=Comment_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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