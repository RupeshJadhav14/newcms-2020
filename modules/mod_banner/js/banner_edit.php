<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath().'/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/plugins/tiny_mce/tiny_mce.js"?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor();?>

<script type="text/javascript">	
   
    
        <?php echo StringManage::createJsObject("pageData",$data);?>	       
       
	$(document).ready(function(){		
		
		$(document).ready(function(){	                    
                    
                                // load editor
                               // loadEditor("txaDescription");
		
				// initialize popover
				applyPopover();
                                
                                 var rules = {
                title: {required: true}
                
                                 
                
        };
                //hdnImg: {required: true}
            
            var messages = {
                title: {required:"Please enter banner title"}
                
            
                
                //hdnImg: "Please select slider image"
            };
				
				// initialize form validator
				validaeForm("frmBanner" , rules , messages);
				
				// call form fillup function
				fillForm();
				
				// display message
				<?php Core::displayMessage("actionResult","Banner Save");?>	
				
				//apply tool tip
				applyTooltip();	
                                //$('#pages').uniform();
				
		});
		
		// save
		$("#btnSave, #btnFooterSave").click(function(event){	
                    event.preventDefault();
                     submitForm(event,$(this));
		});	
		
		// save and continue edit
		$("#btnFooterEdit, #btnEdit").click(function(event){	
                    event.preventDefault();
			$("#hdnEdit").val("1");
			  submitForm(event,$(this));
		});	
		
		
		function submitForm(event,obj)
		{
                    
                    event.preventDefault();
                    if($('#frmBanner').valid())
                        {
                            obj.prop("disabled",true);
                            toggleFormLoad("show");
                            $('#frmBanner').submit();
                        }
		}
		                             	                
	});	
        
        // fillup form if record is set
        function fillForm()
        {                                
                // Create main image uploader
               createUploader("flImage","fileProgress","files",displayUploadResult,"<?php echo URI::getURL("mod_admin","upload_image")?>",["JPG","jpg", "gif","GIF", "png","PNG","jpeg","JPEG"],"<?php echo CFG::$bannerDir;?>","<?php echo URI::getURL("mod_banner","delete_file")?>",(pageData ?[{"name": pageData.image_name,"title":pageData.image_title,"alt": pageData.image_alt}]:""),((pageData)? pageData.id:""));

                if(pageData == undefined)
                 {
                     $("#chkStatus").removeAttr("checked");
                     $("#checkAct").html("Inactive");
                 }
                
                if(pageData)    // fill form data if passed
                {    
                    
                    console.log(pageData);
                       
                        if(pageData.status == 1)
                        {	
                               $("#chkStatus").attr("checked","checked");
                               $("#checkAct").html("Active");
                        }
                        else if(pageData.status == 0)
                        { 
                                $("#chkStatus").removeAttr("checked");
                                $("#checkAct").html("Inactive");
                        }
                		
                }
                
                toggleFormLoad("hide"); // hide form load div
        }
</script>