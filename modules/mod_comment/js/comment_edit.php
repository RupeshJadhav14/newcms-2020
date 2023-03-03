<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>
<script type="text/javascript">


<?php echo StringManage::createJsObject("pageData", $data); ?>

    $(document).ready(function() {

        $(document).ready(function() {
            
            var rules = {
                title: {required: true},
                shortDesc:{required: true}
            
                //hdnImg: {required: true}
            };
            var messages = {
                title: "Please enter Comment name",
                shortDesc:{required:'Please enter description'}
                //hdnImg: "Please select slider image"
            };

            // initialize form validator
            validaeForm("frmComment", rules, messages);
            // load editor
            //  loadEditor("txaDescription");

            // initialize popover
            applyPopover();

            // initialize form validator
            validaeForm("frmComment");

            // call form fillup function
            fillForm();

            // display message
<?php Core::displayMessage("actionResult", "Comment Save"); ?>

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
            if ($('#frmComment').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmComment').submit();
            }
        }

    });

    // fillup form if record is set
    function fillForm()
    {

        if (pageData)    // fill form data if passed
        {
            $("#txtTitle").val(pageData.customer_name);
            // $("#shortDesc").val(pageData.description);
            // check tinyMCE is initialized or not
            // if(tinyMCE.activeEditor == null)
            $("#txaDescription").val(pageData.description);
            //  else
            //    tinyMCE.get( "txaDescription" ).setContent( pageData.description );

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