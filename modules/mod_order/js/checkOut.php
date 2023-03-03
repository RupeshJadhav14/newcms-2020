<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<?php /*?><link href="<?php echo URI::getLiveTemplatePath()."/css/datepicker.css"?>" rel="stylesheet" type="text/css" /><?php */?>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/datepicker.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery-ui.custom.js" ?>"></script>

<?php echo "rupesh"; ?>
<script type="text/javascript">	

$(document).ready(function(){

$(document).on("submit","#frmBilling",function(e){
      e.preventDefault();
      var name = $("#fname").val();
      var email = $("#email").val();
      var address = $("#adr").val();
      var city = $("#city").val();
      var state = $("#state").val();
      var zip = $("#zip").val();
      var noc = $("#cname").val();
      var ccn = $("#ccnum").val();
      var exm = $("#expmonth").val();
      var exy = $("#expyear").val();
      var cvv = $("#cvv").val();
      
        $.ajax({
                method:"POST",
                url: "<?php echo URI::getURL("mod_order","checkOut"); ?>",
                data:{
                  "name" : name,
                  "email" : email,
                  "address" : address,
                  "city" : city,
                  "state" : state,
                  "zip" : zip,
                  "noc" : noc,
                  "ccn" : ccn,
                  "exm" : exm,
                  "exy" : exy,
                  "cvv" : cvv,

                 },
                success: function(response){
                        //alert(response);
                        alert("Thank You For Shopping With us");
                        window.location = "http://localhost/newcms-2020/";
                    }
                }); 
});
	
});
</script>