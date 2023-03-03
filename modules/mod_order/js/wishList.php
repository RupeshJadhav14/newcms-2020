<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<?php /*?><link href="<?php echo URI::getLiveTemplatePath()."/css/datepicker.css"?>" rel="stylesheet" type="text/css" /><?php */?>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/datepicker.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery-ui.custom.js" ?>"></script>

<script type="text/javascript">	


$(document).ready(function(){
$(".btnRemove").click(function(e){
  e.preventDefault();
  	//alert("remove");
  	var dataId = $(this).attr("data-id");
    //alert("The data-id of clicked item is: " + dataId);
    var ui = "<?php echo $_SESSION['userid'] ?>";
    var url = "<?php echo URI::getURL("mod_order","removeWish"); ?>";
    //alert("user id = " + ui);
    //alert(url);

    $.ajax({
		type: "POST",
        url :"<?php echo URI::getURL("mod_order","removeWish"); ?>",
        data : { userid: ui , orderid : dataId },
        success: function(response)
        {
        	//var jsondata=JSON.parse(response);
            $("#data"+dataId).hide();
            //alert(response);
        }  
	});


});

});



</script>