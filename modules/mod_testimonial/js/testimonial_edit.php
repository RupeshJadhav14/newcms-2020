<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>
<!--
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>
-->
<?php /*?><link href="<?php echo URI::getLiveTemplatePath()."/css/datepicker.css"?>" rel="stylesheet" type="text/css" /><?php */?>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/datepicker.js"?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>


			

<script type="text/javascript">


<?php echo StringManage::createJsObject("pageData", $data); ?>

    $(document).ready(function() {
		
		
		 // load editor
		 
		  tinymce.init({
    	selector: '#txaDescription',
    	browser_spellcheck: true,
    	plugins: "image imagetools advlist autosave save preview table code media wordcount autoresize link anchor charmap print searchreplace",
    	images_upload_url: 'index.php?app=admin&module=ajax&act=tinymce_upload&csrfKey=',
    	file_picker_types: 'image',
    	images_upload_base_path: '',
    	images_upload_credentials: true,
    	relative_urls : false,
        remove_script_host : false,
        convert_urls : false,
    });
		
		 
            
         
			$("#txtDFrom").datepicker({ dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true, buttonImage: "<?php echo URI::getLiveTemplatePath()."/images/calender2.png";?>",buttonImageOnly: true,showOn: "both",onClose: function( selectedDate ) {
				
				$( "#txtDTo" ).datepicker( "option", "minDate", selectedDate );
				
			}});
                    
            $("#txtDTo").datepicker({ dateFormat: "dd-mm-yy",changeMonth: true,changeYear: true, buttonImage: "<?php echo URI::getLiveTemplatePath()."/images/calender2.png";?>",buttonImageOnly: true,showOn: "both",onClose: function( selectedDate ) {
				
				$( "#txtDFrom" ).datepicker( "option", "maxDate", selectedDate );
				
			}});
		
		
		

        $(document).ready(function() {
            
			
	
			
			
            var rules = {
                title: {required: true},
                shortDesc:{required: true}
            
                //hdnImg: {required: true}
            };
            var messages = {
                title: "Please enter testimonial name",
                shortDesc:{required:'Please enter description'}
                //hdnImg: "Please select slider image"
            };

            // initialize form validator
            validaeForm("frmTestimonial", rules, messages);
            // load editor
            //  loadEditor("txaDescription");

            // initialize popover
            applyPopover();

            // initialize form validator
            validaeForm("frmTestimonial");

            // call form fillup function
            fillForm();

            // display message
<?php Core::displayMessage("actionResult", "Testimonial Save"); ?>

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
            if ($('#frmTestimonial').valid())
            {
                obj.prop("disabled", true);
                toggleFormLoad("show");
                $('#frmTestimonial').submit();
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
             if(tinyMCE.activeEditor == null)
			 {
				// alert('XXXX');
				$("#txaDescription").val(pageData.description);
				//tinyMCE.get( "txaDescription" ).setContent( pageData.description );
             }
			 else
			 {		 
             
				tinyMCE.get( "txaDescription" ).setContent( pageData.description );
			 
			 }	
			 
			 
			 
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