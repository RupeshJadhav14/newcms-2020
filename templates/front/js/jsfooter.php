<?php
	//restrict direct access to the page
	defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	$path = URI::getLiveTemplatePath();
	/*
	for($i=0;$i<500000;$i++)
	{
		
	}
	*/
?>


<script type="text/javascript">
    
	
	

    $(document).ready(function(){
		

		/*
		$(document)[0].oncontextmenu = function() { return false; }

		$(document).mousedown(function(e) {
				if( e.button == 2 ) {
					//alert('Sorry, this functionality is disabled!');
					return false;
				} else {
					return true;
				}
		});	
		*/
		

		
       $("#enquiry_Form").validate({
           
           onkeyup:false,
           ignore:[],
           rules:{
               
              name:{required: true},
               email:{required: true, email: true},
               phone: {required: true, minlength: 10, maxlength: 10},
               
               secureImg1: {required: true}
           },
           messages:{
                name: {required: 'Please enter name'},
               email: {required: 'Please enter email address', email: 'Please enter valid email address'},
                phone: {required: 'Please enter phone number', minlength: "Phone number must be 10 digit long"},
                
                secureImg1: {required: 'Please select checkbox'}
           }
       });
	   /*
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
	   
	   */
       
        $("#mailchimp").validate({
           onkeyup:false,
           ignore:[],
            rules:{
                
                email_chimp:{required: true,email: true}
            },
            
             messages:{
                email_chimp:{required:'Please enter email',email: "Please enter valid email"} 
             }
           
       });
       
       
       
    });
    
    function get_page_content(slug,obj)
    {
		$('.main_nav_link').each(function(){
			//alert($(this).html());
			$(this).removeClass("active");
		 });
		 
		 
		//$('#'.obj.id).addClass("active");
		if(slug)
		{
			//alert(slug);
			
			//var formURL = "<?php echo URI::getUrl('mod_restmenu','get_product'); ?>";
			var base_url = '<?php echo CFG::$livePath; ?>//index.php?m=mod_page&a=front_view_page&slug='+slug;
			//alert(base_url);
			data = {slug:slug};
			$.ajax({					
				url: base_url,
				dataType: "json",
				data: data,
				async: true,
				type: 'post',				
				success : function(itemData) {
					console.log(itemData);
					if(itemData.result='success')
					{
						
						//alert(itemData.page.description);
						$("#page_title").html(itemData.page.name);
						$("#page_content").html(itemData.page.description);
						
					}
					else
					{
						alert('Data Not Found');					
					}
					
				},
				error : function( xhr, status ) {					
					alert('Error in Ajax:browser error');
				}					
			});
			
		}
	}
    function isNumberic(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46 && charCode != 8)
            return false;
        if (charCode == 46)
            return false;
        return true;
    }
    // document.getElementById("captcha1").addEventListener('click', function() {
    //         changeBg();
    //         $('#secureImg1').val($('#encriptNum1').text());
    //         $('#cptchaError1').hide();
    //     });
    function changeBg() {
            animate = 0;
            var stopAnimation = setInterval(function() {
                document.getElementById('captcha1').style.backgroundPosition = animate + 'px 27px';
                if (animate == -297) {
                    clearInterval(stopAnimation);
                    document.getElementById('captcha1').style.pointerEvents = 'none';
                    
                } else {
                    animate = animate - 27;
                }
            }, 50);
        }
</script>
 <script src="<?php echo $path; ?>/js/jquery.validate.js" type="text/javascript"></script>
  <script src="<?php echo $path; ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo $path; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo $path; ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo $path; ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo $path; ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo $path; ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo $path; ?>/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo $path; ?>/assets/js/main.js"></script>
  
<!--<script src="<?php echo $path; ?>/js/additional-method.js" type="text/javascript"></script>-->