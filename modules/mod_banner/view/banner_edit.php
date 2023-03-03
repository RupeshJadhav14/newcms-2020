<?php
//restrict direct access to the Banner
defined('DMCCMS') or die('Unauthorized access');
//error_reporting(E_ALL);

?>
<style>
    div.selector {
        width: auto;
    }
</style>

<section>
    <!-- page title part start -->
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add" ?> Banner</div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_banner&a=banner_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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
                            <!--<ul class="tabUl">
                                <li data-tab="general" class="trans current" title="General">General</li>
                                <li data-tab="images" class="trans" title="Additional Images">Additional Images</li>
                                <li data-tab="meta" class="trans" title="Meta Content">Meta Content</li>

                            </ul>-->
                            <form class="form-horizontal" id="frmBanner" method="post">
                                <div class="tabMain">
                                    <div class="accMain arrowDown">General</div>
                                    <div class="accDiv tabDiv current" id="general">
                                        <div class="formBox oneCol">

                                            <input type="hidden" id="lang_id" name="lang_id" value="">
                                            <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                            <ul class="row">
                                                <li class="">
                                                    
                                                        <div class="form-group">
                                                            <div class="span12">
                                                                <label for="txtTitle" class="col-md-2 col-sm-3 control-label star">Title:</label>
                                                                <div class="col-md-6 col-sm-8">
                                                                    <input type="text" name="title" readonly id="txtTitle" class="txt" title="Banner Slug"  value="<?php echo $data['data']['name']; ?>" style="cursor: no-drop;">

                                                                </div>
                                                            </div>

                                                        </div>
                                                        
                                                    
                                                </li>

                                               <li class="">
                                <div class="uploader_section ">
                                                            <span class="labelSpan ">Image:</span>
                                <div class="img_upMain">
                                                            <ul class="img_thumbMain singleImgUp" id="files">
    
                                                            </ul>
    
                                                            <div class="uploaderMain singleDiv">
                                                                    <div class="fileProgress"></div>
                                                                    <div class="qq-upload-button">Upload Image
                                                                    <input type="file" name="flImage" id="flImage" class="up-Btn"> 
                                                            </div>
                                                                    <input type="hidden" id="hdnImg" name="flImage" value="" class="">
                                                                    <div class="upload_text">Allowed Extensions: jpg, gif, png<br>Recommended Size: Width: 1375px, Height: 220px</div>
                                                                     </div>
                                                            </div>
                                
                                                           </div>
                            </li>
                                                
                                                
                                                
                                                <li class="">		
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
                        <li><a href="index.php?m=mod_banner&a=banner_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                        <li><a href="#" id="btnFooterEdit" class="trans comBtn" title="Save & continue Edit">Save & continue Edit</a></li>
                        <li><a href="#" id="btnFooterSave" class="trans comBtn" title="Save">Save</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- table part end -->
</section>

<div class="imgPrt modal fade" role="dialog"></div>