<!--<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . '/js/jquery.validate.js' ?>"></script>-->
<!--<script type="text/javascript" src="<?php //echo URI::getLiveTemplatePath() . "/plugins/tiny_mce/tiny_mce.js" ?>"></script>-->


<script type="text/javascript">
    $(document).ready(function() {
		
		
		$("#frmComment").validate({
           
           onkeyup:false,
           ignore:[],
           rules:{
               
            title: {required: true},
			txaDescription:{required: true}
			
			 },
           messages:{
               title: {required:"Please enter customer name"},
			   txaDescription:{required:"Please enter comment"}
                
             
           }
       });
		
				// initialize popover
				//applyPopover();
		 
				/*
				
		

					var frontrules = {
							title: {required: true},
							txaDescription:{required: true}
							
					};
						//hdnImg: {required: true}
					
					var frontmessages = {
						title: {required:"Please enter customer name"},
						txaDescription:{required:"Please enter comment"}
						
						//hdnImg: "Please select slider image"
					};

					// initialize form validator
					validaeForm("frmComment", frontrules, frontmessages);
					validaeForm("frmComment");

		*/
		
		
		

		
		
		

    });
   


</script>