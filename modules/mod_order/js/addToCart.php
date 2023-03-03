<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>
<?php /*?><link href="<?php echo URI::getLiveTemplatePath()."/css/datepicker.css"?>" rel="stylesheet" type="text/css" /><?php */?>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/jquery.paging.min.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/js/datepicker.js"?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath() . "/js/jquery-ui.custom.js" ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php echo "rupesh"; ?>
<script type="text/javascript">	

var qtytotal = "";

var subtotal = 0;
$(document).ready(function(){

var subt = 0;
      $(".total").each(function(){
      subt += parseFloat($(this).text());      
    });
      $("#cart-subtotal").html("&#8377;"+subt+".00");
      $("#cart-grandtotal").html("&#8377;"+subt+".00");
      $("#cart-grandtotal1").val(subt);
    

$(".btnP").click(function(e){
  e.preventDefault();
  //var $t = $(this);
  var dataId = $(this).attr("data-id");
  //alert(dataId);
  var price = $("#price-"+dataId).html();//alert(price);
  //alert(dataId);
  var qty = $("#qty-"+dataId).val();//alert(qty);
  var value = parseInt(qty);
  if(value < 10){
    value++;
    $("#qty-"+dataId).val(value);
    var qantity = $("#qty-"+dataId).val(); 
    //console.log($("#qty-"+dataId).val());
    
     var total = parseInt(qantity) * parseFloat(price) ;//alert(total);
     $("#total-"+dataId).html(total+".00");
      var subt = 0;
      $(".total").each(function(){
      subt += parseFloat($(this).text());
      // subtotal = subt ;alert(subtotal);      
      });
      
      $("#cart-subtotal").html("&#8377;"+subt+".00");
      $("#cart-grandtotal").html("&#8377;"+subt+".00");
      $("#cart-grandtotal1").val(subt);
      

     //subtotal += $(".total").html();console.log(subtotal);
     //$("#cart-subtotal").html()
  }
//alert(dataId);
  $.ajax({
                method:"POST",
                url: "<?php echo URI::getURL("mod_order","changeqty"); ?>",
                data:{ "qty" : value , "orderid" : dataId ,"prc" : price },
                success: function(response){
                  var jsondata = JSON.parse(response);
                     console.log(jsondata.qty);
                     var upqty = jsondata.qty;
                     console.log(jsondata.price);
                     var uppri = jsondata.price;
                     var total = uppri * upqty;
                     $("#total-"+dataId).html(total+".00");
                     //$("#refresh").load(location.href + "#refresh");
                    }
                });  

});

$(".btnM").click(function(e){
  e.preventDefault();
  //var $t = $(this);
  var dataId = $(this).attr("data-id");
  //alert(dataId);
  var qty = $("#qty-"+dataId).val();//alert(qty);
  var price = $("#price-"+dataId).html();//alert(price);
  var value = parseInt(qty);
  if(value > 1){
    value--;
    $("#qty-"+dataId).val(value);

    var qantity = $("#qty-"+dataId).val(); 
    console.log($("#qty-"+dataId).val());
    
     var total = parseInt(qantity) * parseFloat(price) ;
     $("#total-"+dataId).html(total+".00");

     var subt = 0;
      $(".total").each(function(){
      subt += parseFloat($(this).text());

      // subtotal = subt ;alert(subtotal);
      
    });
      $("#cart-subtotal").html("&#8377;"+subt+".00");
      $("#cart-grandtotal").html("&#8377;"+subt+".00");
      $("#cart-grandtotal1").val(subt);
      //alert(subt);
      

  }

  $.ajax({
                method:"POST",
                url: "<?php echo URI::getURL("mod_order","changeqty"); ?>",
                data:{ "qty" : value , "orderid" : dataId ,"prc" : price },
                success: function(response){
                  var jsondata = JSON.parse(response);
                     console.log(jsondata.qty);
                     var upqty = jsondata.qty;
                     console.log(jsondata.price);
                     var uppri = jsondata.price;
                     var total = uppri * upqty;
                     $("#total-"+dataId).html(total+".00");
                         
                    }
                });  



});


$(".btnRemove").click(function(e){
  e.preventDefault();
  	//alert("remove");
  	var oi = $(this).attr("data-id");
    //alert(oi);
    //alert("The data-id of clicked item is: " + dataId);
    //var ui = "<?php echo $_SESSION['userid'] ?>";
    var url = "<?php echo URI::getURL("mod_order","removeCartFromList"); ?>";
    //alert("user id = " + ui);
    //alert(url);
//alert(oi);
    $.ajax({ 
		type: "POST",
        url :"<?php echo URI::getURL("mod_order","removeCartFromList"); ?>",
        data : {orderid : oi },
        success: function(response)
        { 
          var jsondata = JSON.parse(response);
          //alert(response);
            if(jsondata.response == 1){
              //alert("Data Removed Successfully");
              swal("","Data Removed Successfully!", "success");
        	//var jsondata=JSON.parse(response);
            $("#data"+oi).hide();
          }
          //var carttotal = "<?php  echo count($_SESSION['cart']['orderid']) ?>";
          $("#cart-count").html(jsondata.count);
          if(jsondata.count == 0){
            $(".row").hide();
            $(".cart-wrap").html("Your Cart is Empty");
            
          }

            //alert(response);
        }  
	});


});

});



</script>


<!-- $('.add').click(function () {
    if ($(this).prev().val() < 3) {
      $(this).prev().val(+$(this).prev().val() + 1);
    }
});
$('.sub').click(function () {
    if ($(this).next().val() > 1) {
      if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
    }
}); -->