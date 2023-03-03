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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add" ?> MyPage</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_mypage&a=mypage_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                            <li><a href="javascript:;" onclick="previewPage();" id="btnView" class="trans comBtn" title="View">View</a></li>
                            <li><a href="javascript:;" id="btnEdit" class="trans comBtn" title="Save & continue edit">Save & continue edit</a></li>
                            <li><a href="javascript:;" id="btnSave" class="trans comBtn" title="Save">Save</a></li>
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
                                <li data-tab="images" class="trans" title="Additional Images">Additional Images</li>
                                <li data-tab="meta" class="trans" title="Meta Content">Meta Content</li>

                            </ul>
                            <form class="form-horizontal" id="frmMyPage" method="post">
                            	<div class="tabMain">
								
                                    <div class="accMain arrowDown">General</div>
                                    <div class="accDiv tabDiv current" id="general">
                                        <div class="formBox oneCol">
                                            
                                                <input type="hidden" id="lang_id" name="lang_id" value="">
                                                <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                                <ul class="row">
                                                    <li class="">
                                                        <span for="txtTitle" class="labelSpan star">Name:</span>
                                                        <div class="txtBox">
                                                            <input type="text" name="name" id="txtTitle" class="txt required" maxlength="100" title="Page Name"><small>Maximum character length 100</small></div>
                                                            
                                                    </li>
													
													<li class="">
													<br>
                                                        <span for="" class="labelSpan star">Category:</span>
                                                        <div class="cmbCombo">
														
															
															<select title="cmbCategory" style="border-color: #dfdfdf;height: 40px;padding: 0 10px;width:100%;" name="cmbCategory" id="cmbCategory" class="txt required">
															<option value="0">SELECT</option>
															<option value="1">Page</option>
															<option value="2">Post</option>
															</select>
															
															</div>
                                                            
                                                    </li>
                                                    <li class="">
                                                        <span for="txtSlug" class="labelSpan">Slug:</span>
                                                        <div class="txtBox">
                                                            <input type="text" name="slug" maxlength="100" id="txtSlug" class="txt" title="Page Slug">
                                                        </div>
                                                    </li>
    
                                                   
                                                    
                                                    <li class="">
                                <div class="uploader_section">
                                                            <span class="labelSpan">Form Image:</span>
                                <div class="img_upMain">
                                                            <ul class="img_thumbMain singleImgUp " id="files">
    
                                                            </ul>
    
                                                            <div class="uploaderMain singleDiv">
                                                                    <div class="fileProgress"></div>
                                                                    <div class="qq-upload-button">Upload Image
                                                                    <input type="file" name="flImage" id="flImage" class="up-Btn" data-required="1"> 
                                                            </div>
                                                                    <input type="hidden" id="hdnImg" name="flImage" value="" class="">
                                                                    <div class="upload_text">Allowed Extensions: jpg, gif, png<br>Recommended Size: Width: 370px, Height: 278px</div>
                                                                     </div>
                                                            </div>
                                
                                                           </div>
                            </li>
                                                    
                                                   
                                                    
                                                   <!-- <li>
                                                        <span class="labelSpan">Text:</span>
                                                        <div class="">
                                                            <input type="button" id="text" value="Text"/>
                                                            
                                                        </div>
                                                    </li>
                                                    
                                                    <li>
                                                        <span class="labelSpan">Design:</span>
                                                        <div class="">
                                                            <input type="button" id="design" value="Design"/>
                                                            
                                                        </div>
                                                    </li>-->
                                                   
    
                                                    <li>
                                                        <span class="labelSpan">Description:</span>
<!--                                                        <div class="descBtns">	
                                                            <input type="button" id="html-editor" onclick="tinymce.execCommand('mceImage',false,'txaDescription');" value="Image" title="Image" class="btn backBtn"/>
                                                            <div class="editTab">
                                                            <a  class="btn activeLink" onclick="tinymce.execCommand('mceAddEditor', false , 'txaDescription');" title="Visual"><span>Visual</span></a>
                                                            <a  class="btn" onclick="tinymce.execCommand('mceRemoveEditor', false , 'txaDescription');" title="Html"><span>Html</span></a>
                                                            </div>
                                                        </div>    -->
                                                        <div class="txtBox txtDescdiv">
                                                            <?php echo UTIL::loadTinymce(1,'txaDescription'); ?>
<!--                                                            <textarea class="txt" name="txaDescription" id="txaDescription" title="Description"></textarea>-->
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
    
                                    <div class="accMain">Additional Images</div>
                                    <div class="accDiv tabDiv" id="images">
                                        <div class="formBox">
                                            
                                                <ul class="row">
                                                    
                                                   <?php /*?> <li class="">
                                                        <span class="labelSpan">Page Image:</span>
                                                        <div class="txtBox">
                                                            <div id="files2"></div> 
                                                            <div class="clear"></div>
                                                            <div class="qq-upload-button btn btn-success">
                                                                Upload Image
                                                                <input type="file" name="image2" id="image2" multiple="" class="up-Btn"> 
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div class="fileProgress2"></div>     
                                                            <div  class="red-note"><small><strong>Allowed Extensions:</strong> jpg, gif, png<br><strong>Recommended Size:</strong> Width: 800px, Height: 600px</small></div>
                                                        </div>
                                                    </li><?php */?>
                                                    
                                                    
                                                    <li class="fullLi">
                                                        <div class="uploader_section">
                                                             <span class="labelSpan">Page Image:</span>
                                                        <div class="img_upMain">
                                                            <ul class="img_thumbMain multiImages" id="files2">
        
                                                            </ul>
        
                                                            <div class="uploaderMain">
                                                                    <div class="fileProgress2"></div>
                                                                    <div class="qq-upload-button">Upload Image
                                                                    <input type="file" multiple name="image2" id="image2" class="up-Btn" data-required="1"> 
                                                            </div>
                                                                    <input type="hidden" id="hdnImg" name="image2" value="" class="">
                                                                    <div class="upload_text">Allowed Extensions: jpg, gif, png<br>Recommended Size: Width: 800px, Height: 600px</div>
                                                                     </div>
                                                            </div>
                                
                                                           </div>
                                                    </li>
        
                                                </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="accMain">Meta Content</div>
                                    <div class="accDiv tabDiv" id="meta">
                                        <div class="formBox oneCol">
                                            
                                                <ul class="row">
                                                    <li class="">
                                                        <span for="txtMetaTitle" class="labelSpan">Meta Title:</span>
                                                        <div class="txtBox">
                                                            <input type="text" name="meta_title" id="txtMetaTitle" class="txt"  maxlength="70" title="Meta Title">
                                                            <small>Maximum character length 70</small>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <span for="txaMetaDescription" class="labelSpan">Meta Description:</span>
                                                        <div class="txtBox">
                                                            <input type="text" name="meta_description" id="txaMetaDescription" class="txt"  maxlength="160" title="Meta Description">
                                                            <small>Maximum character length 160</small>
                                                        </div>
                                                    </li>
                                                    <li class="">
                                                        <span for="txaMetakeyword" class="labelSpan">Meta Keyword:</span>
                                                        <div class="txtBox">
                                                            <input type="text" name="meta_keyword" id="txaMetakeyword" class="txt"  title="Meta Keyword">
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
                        <li><a href="index.php?m=mod_mypage&a=mypage_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                        <li><a href="javascript:;" onclick="previewPage();" id="btnFooterView" class="trans comBtn backBtn" title="View">View</a></li>
                        <li><a href="javascript:;" id="btnFooterEdit" class="trans comBtn" title="Save & continue Edit">Save & continue Edit</a></li>
                        <li><a href="javascript:;" id="btnFooterSave" class="trans comBtn" title="Save">Save</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
    
    <!-- table part end -->
</section>
<!-- middle section part end -->


<div class="imgPrt modal fade" role="dialog"></div>