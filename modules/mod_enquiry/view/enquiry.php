<?php $path=URI::getLiveTemplatePath(); ?>

<!--<section class="innerBanner">
    <img src="<?php // echo $path."/images/Lighthouse.jpg" ?>">

    <div class="bannerText">
        <div class="bannerTitle"><?php // echo $pageData['name']; ?></div>
        <div class="breadclum">
            <a title="Home"  href="<?php // echo CFG::$livePath; ?>">Home</a><?php // echo $pageData['name']; ?>
        </div>
    </div>
</section>-->
<?php
$crumb2 = array('lastchild' => 1, 'name' => 'Contact Us', 'url' => URI::getURL("mod_enquiry", "enquiry"));

$mainTitle = 'Contact Us';
$breadCrumb = array($crumb2);
display_banner($breadCrumb, $mainTitle);
?>
<!-- <div>
        <div>Content Start...</div>
        <div><strong>Module:</strong>mod_enquiry
        <strong>View:</strong>enquiry.php
        <strong>file path:</strong><?php // echo CFG::$livePath."/".CFG::$modules."/mod_page/".CFG::$view."/enquiry.php"; ?></div>
    </div> -->
<div><h1>Contact Us</h1></div>

<form method="post" id="enquiry_Form" name="enquiry_Form" enctype="multipart/form-data">

    <table border="0">
        <tr>
            <td><span for="txtTitle" class="labelSpan star">Name:</span></td>
            <td><div style="position: relative;"><input  type="text" name="name" class="txt required" id="txtTitle" title="Enter name"/></div></td>
            
        </tr>
        <tr>
            <td>Email :</td>
            <td><input type="text" name="email" id="email"/></td>
        </tr>
        <tr>
            <td>Phone :</td>
            <td><input type="text" name="phone" id="phone" onkeypress="return isNumberic(event);" maxlength="10"/></td>
        </tr>
        <tr>
            <td>Address :</td>
            <td><input type="text" name="address" id="address"/></td>
        </tr>
        <tr>
            <td>State :</td>
            <td><select name="state">
                    <option value="">Select State</option>
                    <?php foreach (CFG::$stateArray as $v) { ?>
                    <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                    <?php } ?>
                </select></td>
        </tr>
        <tr>
            <td>City :</td>
            <td><input type="text" name="city" /></td>
        </tr>
        <tr>
            <td>Post Code :</td>
            <td><input type="text" name="postcode" onkeypress="return isNumberic(event);" maxlength="4" /></td>
        </tr>
       
        <tr>
            <td>Message :</td>
            <td><textarea cols="15" row="10" name="message" id="message"></textarea></td>
        </tr>
       <!-- <tr>
            <td>Date :</td>
            <td><input type="text"  id="txtDFrom" class="txt" maxlength="85" data-content="Select date" data-placement="top" rel="popover" data-title="Select date" data-trigger="focus" readonly="readonly" title="Date" name="date"/></td>
        </tr> -->
        <tr>
            <td id="captcha1" class="bg"></td>
                 <?php
                            $num = rand();
                            $_SESSION['uniqueNum'] = $num;
                            ?>

            <td><span id="encriptNum1" style="display: none;"><?php echo Core::encryptPass($num); ?></span>
            <input type="hidden" id="secureImg1" name="secureImg1" value=""/><span class="capTxt" for="captcha">I am not a robot</span>
            <label id="cptchaError1" for="secureImg1" generated="true" class="error" style="display: none;">Please enter answer</label>
            </td>


        </tr>
        <tr>
            <td><input type="submit" value="Submit"/></td>
            <td></td>
        </tr>
    </table>

</form>