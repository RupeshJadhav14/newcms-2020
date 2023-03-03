<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath().'/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/plugins/tiny_mce/tiny_mce.js"?>"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor();?>
 
<script type="text/javascript">	
	$(document).ready(function(){		
	
		<?php echo StringManage::createJsObject("contactData",$data);?>	
		
		$(document).ready(function(){			
		
				// initialize popover
				applyPopover();
		 
				 
				// call form fillup function
				fillForm();
				
				// display message
				<?php //Core::displayMessage("actionResult","Testimonial Save");?>	
				
				//apply tool tip
				applyTooltip();	
		});
		
	 		
		// fillup form if record is set
		function fillForm()
		{
		 
			if(contactData)
			{
                           
			    if(contactData.name) {
                               
				$("#Name").text(contactData.name);
			    } else {
				$("#sectionName").hide();
				 }
				
				if(contactData.email.length!=0) {
					$("#Email").text(contactData.email);
				} else {
				$("#sectionEmail").hide();
				}
				
				if(contactData.phone.length!=0) {
				$("#Phone").text(contactData.phone);
			    } else {
				$("#sectionMobile").hide();
			    }
				/*if(contactData.location.length!=0) {
                                    $("#Location").text(contactData.location);
                                } else {
                                    $("#sectionLocation").hide();
                                }
                            
                                if(contactData.enquiry_type.length!=0) {
                                    $("#EnquiryType").text(contactData.enquiry_type);
                                } else {
                                    $("#sectionEnquiryType").hide();
                                }*/
                                
				if(contactData.msg.length!=0) {
				$("#Msg").html(contactData.msg);
				} else {
				$("#sectionMessage").hide();
				}
				
				$("#EnquiryDate").text(displayDate(contactData.enquiry_date));	
                            
			}
		}
					
	});	
	
	
</script>
