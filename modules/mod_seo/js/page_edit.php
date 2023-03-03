<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath().'/js/jquery.validate.js' ?>"></script>
<?php echo UTIL::loadEditor();?>
<script type="text/javascript">	
	$(document).ready(function(){		
	
		<?php echo StringManage::createJsObject("pageData",$data);?>	
		
		$(document).ready(function(){			
		
				// initialize popover
				applyPopover();
                                
                                
                                var rules = {
                                    
                                slug:{required:true}    
                                
                            };
                            
                            var messages = {
                                
                                slug:{required:'Please enter slug'}
                            };
				
				// initialize form validator
				validaeForm("frmPage",rules,messages);				
				
				// call form fillup function
				fillForm();
				
				// display message
				<?php Core::displayMessage("actionResult","Page Save");?>	
				
				//apply tool tip
				applyTooltip();	
				
		});
		
		// save
		$("#btnSave,#btnFooterSave").click(function(event){	
                    event.preventDefault();
                    submitForm(event,$(this));
		});	
		
		// save and continue edit
		$("#btnEdit,#btnFooterEdit").click(function(event){	
                    event.preventDefault();
			$("#hdnEdit").val("1");
			 submitForm(event,$(this));
		});	
		
		// submit form
		function submitForm(event,obj)
		{                    
                        
                      
                        toggleFormLoad("show");
			if($('#frmPage').valid()){
                                obj.prop("disabled",true);
                                  event.preventDefault();
				$('#frmPage').submit();}
		}
		
		// fillup form if record is set
		function fillForm()
		{
			if(pageData)
			{			
				$("#txtSlug").val(pageData.slug);			
				$("#txtMetaTitle").val(pageData.meta_title);
				$("#txaMetaDescription").val(pageData.meta_description);
				$("#txaMetakeyword").val(pageData.meta_keyword);
				
				if(pageData.field_variables != "")
				{
					var arrVar = pageData.field_variables.split(",");
					var strVar = "";
					for(i=0;i<arrVar.length;i++)
					{
						if(i == (arrVar.length - 1))
							strVar = strVar + "[" + arrVar[i] + "]";
						else
							strVar = strVar + "[" + arrVar[i] + "]" + ",";
					}
					
					$(".dbVariables").html('<span><b>Allowed dynamic variables:</b>&nbsp;</span><span>' + strVar + '</span>');
				}
			}
                        toggleFormLoad("hide");
		}
					
	});	
</script>