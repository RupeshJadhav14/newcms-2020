<?php
//restrict direct access to the page
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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add" ?> Order</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_order&a=order_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                            
                            <li><a href="#" id="btnSave" class="trans comBtn" title="Save">Save</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>              
    </div>

<?php // table form section start ?>
                <div class="fullColumn">
                    <div class="midWhite">
                        <div class="tabBox">
                            <form class="form-horizontal" id="frmOrder" enctype="multipart/form-data" method="post">
                                <div class="txtBox">
                                    <span class="labelSpan star">Product Name:</span>
                                    <input type="text" name="name" id="txtPrdName" class="txt required" maxlength="50" title="Product Name">
                                </div>

                            
                                <div class="txtBox">
                                    <span class="labelSpan star">User E-mail:</span>
                                    <input type="email" name="uemail" id="txtEmail" class="txt required" maxlength="50" title="User E-mail">
                                </div>

                            
                                <div class="txtBox">
                                    <span class="labelSpan star">Quantity:</span>
                                    <input type="text" name="qty" id="txtQty" class="txt required" maxlength="10" title="Quantity">
                                </div>

                                <div class="txtBox">
                                    <span class="labelSpan star">Price:</span>
                                    <input type="text" name="price" id="txtPri" class="txt required" title="Price">
                                </div>

                                <div class="txtBox">
                                    <span class="labelSpan star">Status:</span>
                                    <input type="text" name="status" id="txtSta" class="txt required" maxlength="1" title="Status">
                                </div>

<!--                                 <div class="txtBox">
                                    <span class="labelSpan star">Order Date</span>
                                    <input type="date" name="odate" id="txtDat" class="txt required" title="Order Date">
                                </div> -->

                                <div class="uploader_section singleImgUp">
                                    <span class="labelSpan star"> Image:</span>
                                    <div class="img_upMain">
                                        <ul class="img_thumbMain singleImgUp " id="files">

                                        </ul>

                                        <div class="uploaderMain singleDiv">
                                            <div class="fileProgress"></div>
                                                <div class="qq-upload-button">Upload Image
                                                    <input type="file" name="flImage" id="flImage" class="up-Btn"> 
                                                </div>
                                            <input type="hidden" id="hdnImg1" name="flImage1" value="" class="">
                                            <div class="upload_text">Allowed Extensions: jpg, gif, png<br>Recommended Size: Width: 800px, Height: 600px</div>
                                        </div>
                                    </div>                    
                                </div>

                                
                            
                                <!-- <div class="txtBox">
                                    <span class="labelSpan star">Image:</span>
                                    <input type="file" name="img" id="filImage" class="txt required"  title="Image">
                                </div> -->
                            </form>    
                        </div>
                    </div>
                </div>

                    

</section>            