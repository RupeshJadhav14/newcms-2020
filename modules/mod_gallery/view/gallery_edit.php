
<!--
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="title ">
                <h4> <span class="icon16 icomoon-icon-equalizer-2"></span> <span>Gallery Add/Edit</span> </h4>
            </div>
            <div>
                <div  id="formLoad" class="showFormLoad"></div>                
                <div class="content snd-top-button" >           
                    <div class="shortcuts scroll">
                        <div id="langOptions">                         
                        </div>
                        <ul class="shortcuts scroll" id="menu" >
                            <li class="topBtns"><a href="#" class="btn btn-success applyTooptip" data-title="Save" id="btnSave" >Save</a></li>
                            <li class="topBtns"><a href="JavaScript:return false;" class="btn btn-success applyTooptip" data-title="Save & Continue Edit" id="btnEdit" >Save &amp; Continue Edit</a></li>
                            <li class="topBtns"><a href="index.php?m=mod_gallery&a=gallery_list" class="btn btn-warning applyTooptip" data-title="Back to list" >Back to list</a></li>
                        </ul>
                    </div>
                </div>
                <div class="content">
                    <form class="form-horizontal" id="frmGallery" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="lang_id" name="lang_id" value="">
                        <input type="hidden" name="edit" id="hdnEdit" value="0" />
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="general">
                                <div class="row" >
                                    <div class="form-group">                                    
                                        <label for="txtName" class="col-md-2 col-sm-3 control-label">Name:<em>*</em></label>
                                        <div class="col-md-6 col-sm-8">
                                            <input type="text" name="name" id="txtName" class="form-control required applyPopover" maxlength="65" data-content="Enter gallery name.<br> Max-length: 65 Characters" data-placement="right" rel="popover" data-title="Gallery Name" data-trigger="focus" >
                                        </div>
                                    </div>
                                    <div class="form-group">                                                                                  
                                        <label for="flImage" class="col-md-2 col-sm-3 control-label">Gallery Image:<em>*</em></label>
                                        <div class="col-md-6 col-sm-8">
                                            <div class="qq-upload-button btn btn-success">
                                                Upload Image
                                                <input type="file" name="flImage" id="flImage" class="up-Btn"> 
                                            </div>
                                            <div id="files"></div>                    
                                            <div class="fileProgress"></div> 
                                            <input type="hidden" id="hdnImg" name="flImage" value="" class="required" />
                                            <div  class="red-note"><small><strong>Allowed Extensions:</strong> jpg, gif, png<br><strong>Recommended Size:</strong> Width: 800px, Height: 600px</small></div>
                                            <label for="hdnImg" generated="true" class="text-error" style="display:none;">Please select gallery image</label>
                                        </div>                                       
                                    </div>
                                    <div class="form-group">
                                        <label for="sortOrder" class="col-md-2 col-sm-3 control-label">Sort Order:</label>      
                                        <div class="col-md-6 col-sm-8">
                                            <input  type="text" onkeypress="return isNumberic(event);" maxlength="3" class="form-control text-success applyPopover sotr-order" id="sortOrder" name="sortOrder" data-content="Sort order." data-placement="right" rel="popover" data-title="Sort Order" data-trigger="focus">
                                        </div>                                   
                                    </div>	
                                    <div id="block_status" class="form-group">    
                                        <label for="chkStatusActive" class="col-md-2 col-sm-3 control-label status" >Status:</label>
                                        <div class="col-md-6 col-sm-8">
                                            <input type="checkbox" id="chkStatus"  name="status" value="1" checked="checked" class="applyPopover" data-content="Gallery status." data-placement="right" rel="popover" data-title="Gallery Status" data-trigger="focus"/>
                                        </div>
                                    </div>
                                </div>                



                            </div>

                        </div>
                    </form>
                </div>
                <div class="content snd-top-button" >           
                    <div class="shortcuts scroll">
                        <div id="langOptions">                         
                        </div>
                        <ul class="shortcuts scroll" id="menu" >
                            <li class="topBtns"><a href="#" class="btn btn-success applyTooptip" data-title="Save" id="btnSave_footer" >Save</a></li>
                            <li class="topBtns"><a href="JavaScript:return false;" class="btn btn-success applyTooptip" data-title="Save & Continue Edit" id="btnEdit_footer" >Save &amp; Continue Edit</a></li>
                            <li class="topBtns"><a href="index.php?m=mod_gallery&a=gallery_list" class="btn btn-warning applyTooptip" data-title="Back to list" >Back to list</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="imgPrt modal fade" role="dialog"></div>-->

<!---------------------------------------------------------------------- ---------------->


<?php
//restrict direct access to the gallery
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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add" ?> Gallery</div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_gallery&a=gallery_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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
                                        <form class="form-horizontal" id="frmGallery" method="post">
                                            <input type="hidden" id="lang_id" name="lang_id" value="">
                                            <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                            <ul class="row">
                                                <li class="">
                                                    <span for="txtName" class="labelSpan star">Name:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="name" id="txtName" class="txt required" maxlength="100" title="Gallery Name">
                                                    </div>
                                                </li>

                                                <li class="">
                                                    <span class="labelSpan star">Gallery Image:</span>
                                                    <div class="txtBox">
                                                        <div class="qq-upload-button btn btn-success">
                                                            Upload Image
                                                            <input type="file" name="flImage" id="flImage" class="up-Btn"> 
                                                        </div>
                                                        <div id="files"></div>                    
                                                        <div class="fileProgress"></div> 
                                                        <input type="hidden" id="hdnImg" name="flImage" value="" class="required" />
                                                        <div  class="red-note"><small><strong>Allowed Extensions:</strong> jpg, gif, png<br><strong>Recommended Size:</strong> Width: 800px, Height: 600px</small></div>
                                                        <label for="hdnImg" generated="true" class="text-error" style="display:none;">Please select gallery image</label>
                                                    </div>
                                                </li>


                                                <li>
                                                    <span class="labelSpan">Sort Order:</span>
                                                    <div class="txtBox">
                                                        <input type="text" onkeypress="return isNumberic(event);"  maxlength="10" class="txt" id="sortOrder" name="sortOrder" title="Sort Order">
                                                    </div>
                                                </li>


                                                <li class="">		
                                                    <span class="labelSpan">Status:</span>
                                                    <div class="optionBox">
                                                        <div class="chkInn">
                                                            <label>
                                                                <input type="checkbox" class="checkbox">
                                                                <input type="checkbox" class="checkbox" id="chkStatus" name="status" value="1" checked="checked" title="Gallery Status" data-content="Gallery Status">
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
                        <li><a href="index.php?m=mod_gallery&a=gallery_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
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
