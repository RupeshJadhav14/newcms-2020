<?php
//restrict direct access to the slider
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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add/Edit" ?> Slider</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_slider&a=slider_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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
                                    <div class="formBox">
                                        <form class="form-horizontal" id="frmSlider" method="post">
                                            <input type="hidden" id="lang_id" name="lang_id" value="">
                                            <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                            <ul class="row">
                                                <li class="">
                                                    <span for="txtTitle" class="labelSpan star">Name:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="title" id="txtTitle" class="txt required" maxlength="100" title="Slider Name"><small>Maximum character length 100</small>
                                                    </div>
                                                </li>
                                                <li class="clear"></li>
                                                
                                                
                                                
                                                <li class="">
                                                 <div class="uploader_section singleImgUp">
                                                    <span class="labelSpan star">Slider Image(Desktop):</span>
                                                    <div class="img_upMain">
                                                        <ul class="img_thumbMain singleImgUp " id="files">

                                                        </ul>

                                                        <div class="uploaderMain singleDiv">
                                                            <div class="fileProgress"></div>
                                                            <div class="qq-upload-button">Upload Image
                                                                <input type="file" name="flImage" id="flImage" class="up-Btn required"  data-required="1"> 
                                                            </div>
                                                            <input type="hidden" id="hdnImg" name="flImage" value="" class="">
                                                            <div class="upload_text">Allowed Extensions: jpg, gif, png<br>Recommended Size: Width: 800px, Height: 600px</div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </li>
                                            
                                            
                                            
                                            <li class="">
                                             <div class="uploader_section singleImgUp">
                                                <span class="labelSpan">Slider Image(IPAD):</span>
                                                <div class="img_upMain">
                                                    <ul class="img_thumbMain singleImgUp " id="files1">

                                                    </ul>

                                                    <div class="uploaderMain singleDiv">
                                                        <div class="fileProgress1"></div>
                                                        <div class="qq-upload-button">Upload Image
                                                            <input type="file" name="blImage" id="blImage" class="up-Btn"> 
                                                        </div>
                                                        <input type="hidden" id="hdnImg" name="blImage" value="" class="">
                                                        <div class="upload_text">Allowed Extensions: jpg, gif, png<br>Recommended Size: Width: 1199px, Height: 403px</div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </li>


                                        <li class="clear"></li>

                                        <li class="halfLi">
                                            <span class="labelSpan">Sort Order:</span>
                                            <div class="txtBox">
                                                <input type="text" onkeypress="return isNumberic(event);"  maxlength="3" class="txt" id="sortOrder" name="sortOrder" title="Sort Order">
                                            </div>
                                        </li>


                                        <li class="">		
                                            <span class="labelSpan">Status:</span>
                                            <div class="optionBox">
                                                <div class="chkInn">
                                                    <label>
                                                        <input type="checkbox" class="checkbox">
                                                        <input type="checkbox" class="checkbox" id="chkStatus" name="status" value="1" checked="checked" title="Slider Status" data-content="Slider Status">
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
                <li><a href="index.php?m=mod_slider&a=slider_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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