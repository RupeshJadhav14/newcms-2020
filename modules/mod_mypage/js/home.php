<?php

/* Page model class. Contains all attributes and method related to page.
 */
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		//alert('aa');
	$('.records').hide();
	$('.products').hide();
	$(".menu").click(function(){
		var selected = $(this).text();
		if(selected == 'Category')
		{
			$('.records').show();
		}
	});
	
	$(".category").click(function(){
			$('.records').hide();
			$('.products').show();
	});
	
	
	}); 
	  


</script>