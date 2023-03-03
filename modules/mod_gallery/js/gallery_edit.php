<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php /* echo UTIL::loadEditor(); */ ?>
<script type="text/javascript">


<?php echo StringManage::createJsObject("pageData", $data); ?>

    $(document).ready(function() {

        $(document).ready(function() {

            // load editor
            /* loadEditor("txaDescription"); */

            // initialize popover
            applyPopover();

            var rules = {name: required,
                flImage: required,};
            var messages = {
                name: "Please enter name",
                flImage: "Please select gallery image",
            };
            // initialize form validator
            validaeForm("frmGallery", rules, messages);

            // call form fillup function
            fillForm();

            // display message
<?php Core::displayMessage("actionResult", "Gallery Save"); ?>

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
            var fileName = $('.bx_2 p').html();
            $('#hdnImg').val(fileName);
            event.preventDefault();
            if ($('#frmGallery').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmGallery').submit();
            }
        }

    });

    // fillup form if record is set
    function fillForm()
    {

        // Create main image uploader
        createUploader("flImage", "fileProgress", "files", displayUploadResult, "<?php echo URI::getURL("mod_admin", "upload_image") ?>", ["jpg", "gif", "png", "JPG", "GIF", "PNG"], "<?php echo CFG::$galleryDir; ?>", "<?php echo URI::getURL("mod_gallery", "delete_file") ?>", (pageData ? [{"name": pageData.image_name, "title": pageData.image_title, "alt": pageData.image_alt}] : ""), ((pageData) ? pageData.id : ""));



        if (pageData)    // fill form data if passed
        {
            $("#lang_id").val(pageData.lang_id);
            $("#txtName").val(pageData.name);
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