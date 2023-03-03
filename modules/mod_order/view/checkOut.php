<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
?>


<style>


.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container1 {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

span.price2{
  float: right;
}

span.price1{
  float: right;
}


</style>
</head>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php // var_dump($_SESSION['cart']); ?>
<h2 style="margin-top:10%;margin-left: 6%;"> Checkout Form</h2>
<div class="row" style="margin-left: 5%;">
  <div class="col-75">
    <div class="container1">
      <form id="frmBilling">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="Rupesh Jadhav">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="rj@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;cursor: pointer;"></i>
              <i class="fa fa-cc-amex" style="color:blue;cursor: pointer;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;cursor: pointer;"></i>
              <i class="fa fa-cc-discover" style="color:orange;cursor: pointer;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="Jadhav Rupesh Chandrakant">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="May" class="form-control">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2028" class="form-control">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="148">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <button type="submit" class="btn">Continue to checkout</button>
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
    	<table>
    		<tr>
    			<td width="63%">Cart<span style="color:black"><i class="fa fa-shopping-cart"></i><b><?php echo count($_SESSION['cart']['orderid']); ?></b></span></td>
    			<td width="7%">Qty</td>
    			<td width="30%">Price</td>
    			<!-- <td>Total</td> -->
    		</tr>
    		<?php 
          if(isset($_SESSION['cart'])){
			$temp = array();
			foreach($_SESSION['cart']['orderid'] as $key => $val){
    		//echo $key;
    		$temp[] = $key;
     		//$idin = $key;
		  }
			$idin = implode(',', $temp);
		}
		  else {
  				$idin = 0;
		   }
			$sql = DB::query("SELECT * FROM dtm_order WHERE id in ($idin)");
			foreach ($sql as $key => $r){
		?>
    		<tr>
    			<td width="63%"> <?php echo $r['product_name']; ?> </td>
    			<td width="7%" class="qtych" style="text-align: center;"> <?php if(isset($_SESSION['cart']['orderid'])){ echo $_SESSION['cart']['orderid'][$r['id']]; } ?> </td>
    			<td width="30%" class="price2"> <?php echo $r['price']; } ?> </td>
    			<!-- <td><?php echo $r['price'] * $_SESSION['cart']['orderid'][$r['id']];?> </td> -->
    		</tr>
    	</table>
      <!-- <h4>Cart <b class="midqty">Qty</b><span class="price1" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php echo count($_SESSION['cart']['orderid']); ?></b></span></h4>
        <?php 
          if(isset($_SESSION['cart'])){
			$temp = array();
			foreach($_SESSION['cart']['orderid'] as $key => $val){
    		//echo $key;
    		$temp[] = $key;
     		//$idin = $key;
		  }
			$idin = implode(',', $temp);
		}
		  else {
  				$idin = 0;
		   }
			$sql = DB::query("SELECT * FROM dtm_order WHERE id in ($idin)");
			foreach ($sql as $key => $r){
		?>
      <p><?php echo $r['product_name']; ?> <b class="midqty"> <?php if(isset($_SESSION['cart']['orderid'])){ echo $_SESSION['cart']['orderid'][$r['id']]; } ?> </b>
      	<span class="price2"><?php echo $r['price']; }?></span>
      </p> -->
      <hr>
      <p>Total <span class="price" style="color:black"><b id="checkouttotal"><?php if(isset($_POST['grand-total'])){
      	echo $_POST['grand-total'];

      } ?></b></span></p>
    </div>
  </div>
</div>

</body>
</html>