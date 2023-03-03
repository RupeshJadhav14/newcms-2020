<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>

<!--<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="box">
            <div class="title">
                <h4> <span class="icon16 icomoon-icon-equalizer-2"></span> <span>SEO Page Edit</span> </h4>
            </div>
            <div style="" id="formLoad" class="showFormLoad"></div>
            <div class="content">
                <p style="margin:0; text-align:right">
                  <button type="button" class="btn "><span class="icon24 icomoon-icon-pencil"></span></button>
                    <a href="#" class="btn pd10 applyTooptip" data-title="Save" id="btnSave"><span class="icon16 icon-pencil"></span></a>
                    <a href="#" class="btn pd10 applyTooptip" data-title="Save & Continue Edit" id="btnEdit"><span class="icon16 icon-edit"></span></a>
                    <a href="index.php?m=mod_seo&a=seo_list"  data-title="Back to list" class="btn pd10 applyTooptip"><span class="icon16 icon-arrow-left"></span></a>
                    </h4>
                </p>
            </div>
            <div class="content ">
                <form class="form-horizontal" id="frmPage" method="post">
                    <input type="hidden" name="edit" id="hdnEdit" value="0" />
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#general" data-toggle="tab">General</a></li>           
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane active" id="general">

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label for="txtSlug" class="form-label span2">Slug:<em>*</em></label>
                                        <input type="text" name="slug" id="txtSlug" class="text applyPopover required"  maxlength="100" data-content="Enter page slug. Use in SEF URL.<br> Accepts only letters, digits and dash(-).<br>Max-length: 255 Characters" data-placement="right" rel="popover" data-title="Page Slug" data-trigger="focus">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label for="txtMetaTitle" class="form-label span2">Meta Title:</label>
                                        <input type="text" name="meta_title" id="txtMetaTitle" class="span9 text applyPopover" maxlength="<?php echo CFG::$metaTitleLen ?>" data-content="Enter meta title for page.<br> Max-length: <?php echo CFG::$metaTitleLen ?> Characters.<br> Use in SEO." data-placement="top" rel="popover" data-title="Meta Title" data-trigger="focus">                   
                                        <div class="dbVariables"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label for="txaMetaDescription" class="form-label span2">Meta Description:</label>
                                        <textarea name="meta_description" id="txaMetaDescription" class="span9 text applyPopover" data-content="Enter meta description for page.<br>Max-length: <?php echo CFG::$metaDescLen ?> Characters<br> Use in SEO." data-placement="top" rel="popover" data-title="Meta Description" maxlength="<?php echo CFG::$metaDescLen ?>" data-trigger="focus"></textarea>
                                        <div class="dbVariables"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row row-fluid">
                                <div class="span12">
                                    <div class="row-fluid">
                                        <label for="txaMetakeyword" class="form-label span2">Meta Keyword:</label>
                                        <textarea name="meta_keyword" id="txaMetakeyword" class="span9 text applyPopover" data-content="Enter meta keyword for page.<br>Max-length: <?php echo CFG::$metaKeywordLen ?> Characters<br> Use in SEO." data-placement="top" rel="popover" maxlength="<?php echo CFG::$metaKeywordLen ?>" data-title="Meta Keyword" data-trigger="focus"></textarea>
                                        <div class="dbVariables"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>-->


<!-- middle section part start -->
<section>
    <!-- page title part start -->
    <div class="midTop">
        <div class="container-fluid">
            <div class="row">
                <div class="fullColumn">
                    <div class="topLeft">
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add/Edit" ?> Seo</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_seo&a=seo_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                            <li><a href="#" id="btnEdit" class="trans comBtn" title="Save & continue Edit">Save & continue edit</a></li>
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
                                        <form class="form-horizontal" id="frmPage" method="post">
                                            <input type="hidden" id="lang_id" name="lang_id" value="">
                                            <input type="hidden" name="edit" id="hdnEdit" value="0" />
                                            <ul class="row">
                                                <li class="mobiHalf">
                                                    <span for="txtSlug" class="labelSpan star">Slug:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="slug" id="txtSlug" class="txt required" title="Slug">
                                                    </div>
                                                </li>

                                                <li class="">
                                                    <span for="txtMetaTitle" class="labelSpan">Meta Title:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="meta_title" id="txtMetaTitle" class="txt"  maxlength="70" title="Meta Title">
                                                        <small>Maximum character length 70</small>
                                                    </div>
                                                    <div class="dbVariables"></div>
                                                </li>

                                                <li class="">
                                                    <span for="txaMetakeyword" class="labelSpan">Meta Keyword:</span>
                                                    <div class="txtBox">
                                                        <input type="text" name="meta_keyword" id="txaMetakeyword" class="txt"  title="Meta Keyword">
                                                    </div>

                                                <li class="">
                                                    <span for="txaMetaDescription" class="labelSpan">Meta Description:</span>
                                                    <div class="txtBox">
                                                        <textarea class="txt" name="meta_description" id="txaMetaDescription" maxlength="160" title="Meta Description"></textarea>
                                                        <small>Maximum character length 160</small>
                                                    </div>
                                                    
                                                    <div class="dbVariables"></div>
                                                </li>

                                                <div class="dbVariables"></div>
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
                        <li><a href="index.php?m=mod_seo&a=seo_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                        <li><a href="#" id="btnFooterEdit" class="trans comBtn" title="Save & continue edit">Save & continue edit</a></li>
                        <li><a href="#" id="btnFooterSave" class="trans comBtn" title="Save">Save</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- table part end -->
</section>
<!-- middle section part end -->


