<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>
<script type="text/javascript">


<?php echo StringManage::createJsObject("pageData", $data); ?>

    $(document).ready(function() {

        $(document).ready(function() {

            var rules = {
                title: {required: true},
           //   flImage: {required: true}
            
                //hdnImg: {required: true}
};
            var messages = {
                title: {required:"Please enter slider name"},
                flImage: {required:"Please upload slider image"}
            
                
                //hdnImg: "Please select slider image"
            };

            // initialize form validator
            validaeForm("frmSlider", rules, messages);

            // load editor
            //  loadEditor("txaDescription");

            // initialize popover
            applyPopover();

            // initialize form validator
            validaeForm("frmSlider");

            // call form fillup function
            fillForm();

            // display message
<?php Core::displayMessage("actionResult", "Slider Save"); ?>

            //apply tool tip
            applyTooltip();

        });

        // save
        $("#btnSave,#btnFooterSave").click(function(event) {
            event.preventDefault();
            submitForm(event, $(this));
        });

        // save and continue edit
        $("#btnEdit,#btnFooterEdit").click(function(event) {
            event.preventDefault();
            $("#hdnEdit").val("1");
            submitForm(event, $(this));
        });
        
        


        function submitForm(event, obj)
        {

            event.preventDefault();
            if ($('#frmSlider').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmSlider').submit();
            }
        }

    });

    // fillup form if record is set
    function fillForm()
    {
        // Create main image uploader
        createUploader("flImage", "fileProgress", "files", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["jpg", "gif", "png","jpeg", "JPG", "PNG", "GIF" ,"JPEG"], "<?php echo CFG::$sliderDir; ?>", "<?php echo URI::getURL("mod_slider", "delete_file") ?>", (pageData ? [{"name": pageData.image_name, "title": pageData.image_title, "alt": pageData.image_alt}] : ""), ((pageData) ? pageData.id : ""));

        createUploader("blImage", "fileProgress1", "files1", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["jpg", "gif", "png","jpeg", "JPG", "PNG", "GIF" , "JPEG"], "<?php echo CFG::$sliderDir; ?>", "<?php echo URI::getURL("mod_slider", "delete_file") ?>", (pageData ? [{"name": pageData.ipad_image_name, "title": pageData.ipad_image_title, "alt": pageData.ipad_image_alt}] : ""), ((pageData) ? pageData.id : ""));

        if (pageData)    // fill form data if passed
        {
            $("#lang_id").val(pageData.lang_id);
            $("#txtTitle").val(pageData.title);
            $("#shortDesc").val(pageData.short_description);
            $("#sortOrder").val(pageData.sort_order);

            if (pageData.status == 1)
            {
                $("#chkStatus").attr("checked", "checked");
                $("#checkAct").html("Active");
            }
            else if (pageData.status == 0)
            {
                $("#chkStatus").removeAttr("checked");
                $("#checkAct").html("Inactive");
            }

        }

        toggleFormLoad("hide"); // hide form load div
    }
</script>