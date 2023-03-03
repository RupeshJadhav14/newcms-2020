<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<!--<script type="text/javascript" src="<?php //echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>-->

<?php $path = URI::getLiveTemplatePath(); ?>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>
<script type="text/javascript">
<?php echo StringManage::createJsObject("FieldData", $data); ?>

    $(document).ready(function() {

        $(document).ready(function() {



applyPopover();
        var rules = {
                question: {required: true},
                txaDescription:{required: true}
                
        };
                //hdnImg: {required: true}
            
            var messages = {
                question: {required:"Please enter question"},
               txaDescription:{required:"Please enter description"}
                
                //hdnImg: "Please select slider image"
            };

            // initialize form validator
            validaeForm("frmPage", rules, messages);

            //loadEditor("txaDescription");

            // initialize popover
            

            // initialize form validator
            validaeForm("frmPage");

            // call form fillup function
            fillForm();

            // display message
<?php Core::displayMessage("actionResult", "Field Save"); ?>

            //apply tool tip
            applyTooltip();
			
			
			$('.editTab a').click(function() {
                $('.editTab a').removeClass('activeLink')
				$(this).addClass('activeLink')
            });
			


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
        
              /* #@author : Harshal Solanki @Date : 15-08-2016 @Changes : Add Tabing Code */

        $("#btnSave,#btnEdit,#btnFooterEdit,#btnFooterSave").click(function(event) {
            var lastp;
            var flag = true;
            $('.tabUl li').each(function() {
                $(this).trigger("click");
                if ($(".error").is(':visible')) {
                    if (flag)
                    {
                        lastp = $(this);
                        flag = false;
                    }
                    $(this).css("border", "1px solid red");
                }
                else
                {
                    $(this).css("border", "none");
                }
            });
            lastp.trigger("click");

        });
        // submit form
        function submitForm(event, obj)
        {
            tinyMCE.triggerSave();
            event.preventDefault();
            if ($('#frmPage').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmPage').submit();
            }
        }

    });
    
//    $("#html-editor").click(function(){
//                    var uploderId = $('.mceu_opner').find('.mce-i-image').parent('button').parent('div').attr('id');
//                    $('#'+uploderId).trigger('click');
//    });

    // fillup form if record is set
    function fillForm()
    {
       
        if (fieldData)    // fill form data if passed
        {
            
            
            $("#txtQuestion").val(fieldData.question);
            

            // check tinyMCE is initialized or not
            if (tinyMCE.activeEditor == null)
                $("#txaDescription").val(fieldData.answer);
            else
                tinyMCE.get("txaDescription").setContent(fieldData.answer);

            $("#txtSortOrder").val(fieldData.sort_order);
            

            if (fieldData.status == 1)
            {
                $("#chkStatus").attr("checked", "checked");
                $("#checkAct").html("Active");
            }
            else if (fieldData.status == 0)
            {
                $("#chkStatus").removeAttr("checked");
                $("#checkAct").html("Inactive");
            }

        }

        toggleFormLoad("hide"); // hide form load div
    }



</script>