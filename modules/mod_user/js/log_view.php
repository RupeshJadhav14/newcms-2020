<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<script type="text/javascript">	
	$(document).ready(function(){		
		<?php echo StringManage::createJsObject("logData",$data);?>	
		$(document).ready(function(){			
			fillForm();
		});
		// fillup form if record is set
		function fillForm()
		{
			if(logData)  
			{
				$("#log_number").text(logData.id);
				$("#user_name").text(logData.user_name);
				$("#username").text(logData.username);
				$("#log_type").text(logData.log_type);
				if(logData.job_id != undefined){
					$("#job_id").text(logData.job_id);
				} else { 
					$("#job_id").parents('.form-group').hide();
				}
				if(logData.json_format == "0") {
					$("#description").html(logData.description);
					$('#desc').removeClass('newoldData');
				}
				$("#created_date").text(displayDateTime(logData.created_date));
			}
		}
	});	
	function displayDateTime(val)
	{
		dateString = val.toString();
		reggie = /(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})/g;
		dateArray = reggie.exec(dateString);
		return dateArray[3] + "/" + dateArray[2] + "/" + dateArray[1] + " " + dateArray[4] + ":" + dateArray[5] + ":" + dateArray[6];
	}
</script>