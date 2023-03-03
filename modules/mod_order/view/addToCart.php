<?php

defined( 'DMCCMS' ) or die( 'Unauthorized access' );
?>

<style type="text/css">
.cart-wrap {
    padding: 40px 0;
    font-family: 'Open Sans', sans-serif;
}
.main-heading {
    font-size: 19px;
    margin-bottom: 20px;
}
.table-wishlist table {
    width: 100%;
}
.table-wishlist thead {
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 5px;
}
.table-wishlist thead tr th {
    padding: 8px 0 18px;
    color: #484848;
    font-size: 15px;
    font-weight: 400;
}
.table-wishlist tr td {
    padding: 25px 0;
    vertical-align: middle;
}
.table-wishlist tr td .img-product {
    width: 72px;
    float: left;
    margin-left: 8px;
    margin-right: 31px;
    line-height: 63px;
}
.table-wishlist tr td .img-product img {
    width: 100%;
}
.table-wishlist tr td .name-product {
    font-size: 15px;
    color: #484848;
    padding-top: 8px;
    line-height: 24px;
    width: 50%;
}
.table-wishlist tr td.price {
    font-weight: 600;
}
.table-wishlist tr td .quanlity {
    position: relative;
}

.total {
    font-size: 24px;
    font-weight: 600;
    color: #8660e9;
}
.display-flex {
    display: flex;
}
.align-center {
    align-items: center;
}
.round-black-btn {
    border-radius: 25px;
    background: #212529;
    color: #fff;
    padding: 5px 20px;
    display: inline-block;
    border: solid 2px #212529; 
    transition: all 0.5s ease-in-out 0s;
    cursor: pointer;
    font-size: 14px;
}
.round-black-btn:hover,
.round-black-btn:focus {
    background: transparent;
    color: #212529;
    text-decoration: none;
}
.mb-10 {
    margin-bottom: 10px !important;
}
.mt-30 {
    margin-top: 30px !important;
}
.d-block {
    display: block;
}
.custom-form label {
    font-size: 14px;
    line-height: 14px;
}
.pretty.p-default {
    margin-bottom: 15px;
}
.pretty input:checked~.state.p-primary-o label:before, 
.pretty.p-toggle .state.p-primary-o label:before {
    border-color: #8660e9;
}
.pretty.p-default:not(.p-fill) input:checked~.state.p-primary-o label:after {
    background-color: #8660e9 !important;
}
.main-heading.border-b {
    border-bottom: solid 1px #ededed;
    padding-bottom: 15px;
    margin-bottom: 20px !important;
}
.custom-form .pretty .state label {
    padding-left: 6px;
}
.custom-form .pretty .state label:before {
    top: 1px;
}
.custom-form .pretty .state label:after {
    top: 1px;
}
.custom-form .form-control {
    font-size: 14px;
    height: 38px;
}
.custom-form .form-control:focus {
    box-shadow: none;
}
.custom-form textarea.form-control {
    height: auto;
}
.mt-40 {
    margin-top: 40px !important; 
}
.in-stock-box {
    background: #ff0000;
    font-size: 12px;
    text-align: center;
    border-radius: 25px;
    padding: 4px 15px;
    display: inline-block;  
    color: #fff;
}
.trash-icon {
    font-size: 20px;
    color: #212529;
}
.counter{
/* width: 15%;*/
 display: flex;
/* justify-content: space-between;*/
 align-items: center;
}
.btnP{
    background: gray;
    border-radius: 50%;
    height: 25px;
    width: 25px;
    cursor: pointer;
    text-align: center;
}
.btnM{
    background: gray;
    border-radius: 50%;
    height: 25px;
    width: 25px;
    cursor: pointer;
    text-align: center;
}



</style>

<?php 
//var_dump($_SESSION['cart']);
if(isset($_SESSION['cart'])){
$temp = array();
foreach($_SESSION['cart']['orderid'] as $key => $val){
    //echo $key;
    $temp[] = $key;
     //$idin = $key;

}
$idin = implode(',', $temp);
//var_dump($idin);exit();


//var_dump($idin);
//$idin = implode(',', $_SESSION['cart']['orderid']);
//var_dump($idin);exit();
}
else {
  $idin = 0;
}



?>




<h1 style="margin-top:10%;margin-left: 5%;">Shopping Cart</h1>


    <?php 
$sql = DB::query("SELECT * FROM dtm_order WHERE id in ($idin)");
if (!isset($_SESSION['username'])) {
    ?>
<div id="noGrid" class="content noRecord hideBlock" style="margin-left: 10%;margin-top: 20px;color: red;font-size: 25px;"> Session Expire Please Login </div>
<?php 
}
    //$sql = " SELECT * from dtm_order WHERE id in ($idin) ";
    elseif(count($sql) == 0){
?>
<div id="noGrid" class="content noRecord hideBlock" style="margin-left: 10%;margin-top: 20px;color: red;font-size: 25px;"> Your Cart is Empty </div>
<?php }
else {
?>
    
<div class="cart-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading mb-10">Shopping Cart</div>
                    <div class="table-wishlist">
                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                            <thead>
                                <tr>
                                    <td width="20%">Product Image</td>
                                    <td width="20%"> Qty </td>
                                    <td width="15%">Product Name</td>
                                    <td width="20%">Product Price</td>
                                    <td width="15%">Total</td>
                                    <td width="25%">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sql as $key => $r){ // var_dump($r);exit();
                                ?>
                                <tr id="data<?php echo $r['id']; ?>">
                                    <td width="20%">
                                        <div class="display-flex align-center">
                                            <div class="img-product">
                                                <img src="http://localhost/newcms-2020/media/slider/<?php echo $r['img']; ?>" alt="<?php echo $r['img']; ?>" class="mCS_img_loaded">
                                            </div>
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="counter">
                                            <div class="btnM" style="margin: 10px;" data-id="<?php echo $r['id']; ?>">-</div>
                                            <input type="text" value="<?php if(isset($_SESSION['cart']['orderid'])){ echo $_SESSION['cart']['orderid'][$r['id']]; } else { echo "1";} ?>" disabled id="qty-<?php echo $r['id']; ?>" style="width: 50px;text-align: center;">
                                            <div class="btnP" style="margin: 10px;" data-id="<?php echo $r['id']; ?>">+</div>
                                            <!-- <div class="btn">+</div>
                                            <div class="count" id="count"> 1 </div>
                                            <div class="btnM">-</div> -->
                                        </div>
                                    </td>
                                    <td width="20%">
                                        <div class="name-product">
                                            <?php echo $r['product_name']; ?>
                                        </div>
                                    </td>
                                    <td width="20%" class="price" id="price">&#8377;
                                        <span id="price-<?php echo $r['id']; ?>"><?php echo $r['price']; ?></span>
                                    </td>
                                    <td width="20%" class="total">
                                        <span id="total-<?php echo $r['id']; ?>"><?php if(isset($_SESSION['cart']['orderid'])){ echo $r['price'] * $_SESSION['cart']['orderid'][$r['id']];  } else{ echo $r['price']; }  ?>.00</span>
                                    </td>
                                    <td width="10%"> <button id="btnRemove" class="btnRemove" data-id="<?php echo $r['id']; ?>"> REMOVE </button>
                                    </td> 
                                    <td style="padding: 10px;">
                                        
                                    </td>
                                    
                                </tr>
                            <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div> 
                <!-- data-id="<?php // echo $r['id']; ?>"  -->
                <form method="post" action="<?php echo URI::getURL("mod_order","checkOut"); ?>">
                <div id="refresh">
                    <div class="totals">
                        
                        <div class="totals-item">
                            <label><b>Subtotal : </b></label>
                            <div class="totals-value" id="cart-subtotal"></div>
                        </div>
                        <!-- <div class="totals-item">
                            <label>Tax (5%)</label>
                            <div class="totals-value" id="cart-tax">3.60</div>
                        </div>
                        <div class="totals-item">
                            <label>Shipping</label>
                            <div class="totals-value" id="cart-shipping">15.00</div>
                        </div> -->
                        
                        <div class="totals-item totals-item-total" >
                            <label><b> Grand Total : </b></label> <input type="hidden" id="cart-grandtotal1" name="grand-total" value="">
                            <div class="totals-value" id="cart-grandtotal"></div>
                        </div>
                    
                    </div>
                    <button id="btnCheckOut" class="btnCheckOut" type="submit"> CheckOut
                        <!-- <a href="<?php echo URI::getURL("mod_order","checkOut"); ?>"> CheckOut </a> -->
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>


<!-- script type="text/javascript">
const totalElement = document.getElementById("total");

let total = document.getElementById("total");
total.val= parseInt(price.value) ;


cart.forEach(item => {
  const row = document.createElement("tr");

  const nameCell = document.createElement("td");
  nameCell.textContent = item.name;
  row.appendChild(nameCell);

  const priceCell = document.createElement("td");
  priceCell.textContent = item.price;
  row.appendChild(priceCell);

  const quantityCell = document.createElement("td");
  quantityCell.textContent = item.quantity;
  row.appendChild(quantityCell);

  const totalCell = document.createElement("td");
  totalCell.textContent = item.price * item.quantity;
  row.appendChild(totalCell);

  cartItems.appendChild(row);

  total += item.price * item.quantity;
});

totalElement.textContent = `Total: $${total}`;
                                        </script> -->