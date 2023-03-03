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
                        <div class="pageTitle blc-<?php echo APP::$moduleRecord['icon_class']; ?>"><span><?php echo isset(APP::$curId) && !empty(APP::$curId) ? "Update" : "Add" ?> Student</span></div>
                    </div>
                    <div class="topRight btnRight">
                        <ul class="btnUl threeBtn">    
                            <li><a href="index.php?m=mod_student&a=student_list" class="trans comBtn backBtn" title="Back to list">Back to list</a></li>
                            
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
                            <form class="form-horizontal" id="frmStudent" enctype="multipart/form-data" method="post">

                                <div class="txtBox">
                                    <span class="labelSpan star">Student Name:</span>
                                    <input type="text" name="name" id="txtName" class="txt required" maxlength="50" title="Student Name">
                                </div>
                            
                                <div class="txtBox">
                                    <span class="labelSpan star">E-mail:</span>
                                    <input type="text" name="email" id="txtEmail" class="txt required" maxlength="50" title="Student E-mail">
                                </div>

                                <div class="txtBox">
                                    <span class="labelSpan star">Roll No :</span>
                                    <input type="number" name="roll_id" id="txtRId" class="txt required" title="Student Roll No">
                                </div>

                                <div class="txtBox">
                                    <span class="labelSpan star">Status :</span>
                                    <input type="number" name="status" id="status" class="txt required" title="Status">
                                </div>
                            
                                <div class="txtBox">
                                    <span class="labelSpan star">Phone No :</span>
                                    <input type="tel" maxlength="10" class="txt numericOnly numbers" id="txtPhone" name="phone" title="Phone">
                                </div>
                            </form>    
                        </div>
                    </div>
                </div>

                    

</section>            