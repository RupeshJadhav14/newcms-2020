<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath().'/js/jquery.validate.js' ?>"></script>
<script type="text/javascript" src="<?php echo URI::getLiveTemplatePath()."/plugins/tiny_mce/tiny_mce.js"?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php echo UTIL::loadFileUploadJs(); ?>
<?php echo UTIL::loadEditor(); ?>


<script type="text/javascript">

        $(document).ready(function() {
        $(document).on("click",".addWish",function(e) {
        //$(".addWish").click(function(e) {
            e.preventDefault();
            //alert("this");    
            	var oi = <?php echo $_GET['id']; ?>;
            	//alert(oi);
            	var $t = $(this);

            	$.ajax({
        		method:"POST",
        		url: "<?php if(isset($_SESSION['username'])){ echo URI::getURL("mod_order","add_wish");} else { echo URI::getURL("mod_user","userLogin"); } ?>",
        		data:{ orderid: oi },
        		success: function(response){
        			var jsondata = JSON.parse(response); 
        			//alert(jsondata.response);
        			if(jsondata.response == 1){
                        swal("Data Added Successfully!", "success");
        				//alert("Data Added Successfully");
                        
                        $t.removeClass("addWish");
                        $t.addClass("removeWish").replaceWith(" <a href='javascript:void(0)' class='removeWish'><i class='bx bxs-heart'></i> Remove From Wishlist </a> ");
                         //$t.parent().remove();
        			}
        			else if(jsondata.response == 0){
        				alert("Something is Wrong");
        			}
        			else if(jsondata.response == 2){
        				//alert("Already Added");
                        //$t.removeClass("addWish");
                        $t.addClass("removeWish").replaceWith(" <a href='javascript:void(0)' class='removeWish'><i class='bx bxs-heart'></i> Remove From Wishlist </a> ");
                        //$t.parent().remove();
        			}
        			
    			}
    	    });  

        });


            $(document).on("click",".addCart",function(e) {
            //$(".addCart").click(function(e) {
            e.preventDefault();
            //alert("this");    
                var oi = <?php echo $_GET['id']; ?>;
                //alert(oi);
                var $t = $(this);
                var c = "<?php echo $_SESSION['count'] = count($_SESSION['cart']); ?>";
                //alert(c);

                $.ajax({
                method:"POST",
                url: "<?php if(isset($_SESSION['username'])){ echo URI::getURL("mod_order","add_cart");} else { echo URI::getURL("mod_user","userLogin"); } ?>",                
                data:{ orderid: oi , count : c},
                success: function(response){
                    //alert(response);
                    var jsondata = JSON.parse(response); 
                    //alert(jsondata.response);
                    if(jsondata.response == 1){
                        //alert(cartcount);
                        swal("","Data Added Successfully!", "success");
                        //alert("Data Added Successfully");
                        $("#cart-count").html(jsondata.count);
                        $t.removeClass("addCart");
                        $t.addClass("removeCart").replaceWith(" <a href='javascript:void(0)' class='removeCart'><i class='bx bxs-cart' ></i> Remove from Cart</a> ");
                         
                        //<?php echo CFG::$livePath; ?>

                    }
                    else if(jsondata.response == 2){
                        alert("Already Added");
                    }
                    //alert(response);
                    //alert("Product Added Successfully");    
                }
            });  

           });




            //$(".removeWish").click(function(e) {
            $(document).on("click",".removeWish",function(e) {
            e.preventDefault();
            //alert("this");
                var ui = "<?php echo $_SESSION['userid'] ?>";    
                var oi = <?php echo $_GET['id']; ?>;
                //alert(oi);
                var $t = $(this);

                $.ajax({
                method:"POST",
                url: "<?php echo URI::getURL("mod_order","removeWish"); ?>",
                data:{ userid: ui , orderid: oi },
                success: function(response){
                    var jsondata = JSON.parse(response); 
                    //alert(jsondata.response);
                    
                    alert("Data Removed Successfully");
                        //$t.removeClass("addWish");
                    $t.removeClass("removeWish");
                    $t.addClass("addWish").html(" <a href='javascript:void(0)' ><i class='bx bxs-heart'></i> Add to Wishlist </a> ");
                    
                         //$t.parent().remove();             
                    }
                });  
           });


             $(document).on("click",".removeCart",function(e) {
             e.preventDefault();
            //alert("this");   
                var oi = <?php echo $_GET['id']; ?>;

                var $t = $(this);
                //alert(oi);

                $.ajax({
                method:"POST",
                url: "<?php echo URI::getURL("mod_order","removeCart"); ?>",
                data:{ orderid: oi },
                success: function(response){
                    //alert(response);//alert(jsondata);
                    
                    var jsondata = JSON.parse(response);
                    if(jsondata.response == 1){
                        //alert("Data Removed Successfully");
                        swal("","Data Removed Successfully!", "success");
                        $("#cart-count").html(jsondata.count);
                        $t.removeClass("removeCart");
                        $t.addClass("addCart").html(" <a href='javascript:void(0)' class='addCart'><i class='bx bxs-cart' ></i> Add to Cart</a> ");
                    }
                }
                });  
           });






    });
</script>