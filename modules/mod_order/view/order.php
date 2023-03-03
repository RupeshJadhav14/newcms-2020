<?php
    //restrict direct access to the page
    defined( 'DMCCMS' ) or die( 'Unauthorized access' );
?>

<?php $path=URI::getLiveTemplatePath(); ?>

<!--<section class="innerBanner">
    <img src="<?php // echo $path."/images/Lighthouse.jpg" ?>">

    <div class="bannerText">
        <div class="bannerTitle"><?php // echo $pageData['name']; ?></div>
        <div class="breadclum">
            <a title="Home"  href="<?php // echo CFG::$livePath; ?>">Home</a><?php // echo $pageData['name']; ?>
        </div>
    </div>
</section>-->
<div style="margin-top:10%">
<?php
$crumb2 = array('lastchild' => 1, 'name' => 'Product', 'url' => URI::getURL("mod_order", "order"));

$mainTitle = 'Product Details';
$breadCrumb = array($crumb2);
display_banner($breadCrumb, $mainTitle);
?>
</div>
<style type="text/css">
body{
    margin-top:20px;
    background-color: #f4f7f6;
}

.product_item .product_details {
    
    text-align: center
}
.card {
    background: #fff;
    margin: 10px;
    transition: .5s;
    border: 0;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.1);
    
    width: calc(25% - 20px);
}

.card .body {
    font-size: 14px;
    color: #424242;
    padding: 20px;
    font-weight: 400;
}

.product_item .product_details h5 {
    margin: 10px;
    color: black;
}

.product_item .product_details .product_price {
    margin: 0
}

.product_item .product_details .product_price li {
    display: inline-block;
    padding: 0 10px
}

.product_item .product_details .product_price .new_price {
    font-weight: 600;
    color: #ff4136
}

.product_item_list table tr td {
    vertical-align: middle
}

.product_item_list table tr td h5 {
    font-size: 15px;
    margin: 0
}

.product_item_list table tr td .btn {
    box-shadow: none !important
}

.product-order-list table tr th:last-child {
    width: 145px
}

button {
  padding: 2%;
  background-color: #dfd;
  border: none;
  border-radius: 2%;
  margin: 20px;
}

button:hover {
  bottom: 0.1em;
}

button:focus {
  outline: 0;
}

button:active {
  bottom: 0;
  background-color: #fdf;
}
.product_item .product_details p {
    margin-top: 10px;
    color: black;
}
.prd-row{
    flex-wrap: wrap;
}

</style>

<!-- <div>
        <div>Content Start...</div>
        <div><strong>Module:</strong>mod_order
   ordertrong>View:</strong>enquiry.php
        <strong>file path:</strong><?php // echo CFG::$livePath."/".CFG::$modules."/mod_page/".CFG::$view."/enquiry.php"; ?></div>
    </div> -->
<div style="margin-left: 10%;"><h1>Product Details</h1></div>



 
<div class="container">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-4 col-sm-12 prd-row"style="display: flex;width: auto;height: auto;">   
            


      <?php
       $result = DB::query("SELECT * FROM " . CFG::$tblPrefix . "order");
        //var_dump($result);
       
       foreach ($result as $key => $res) {  ?>  

        <div class="card product_item"><a href="<?php echo URI::getURL("mod_order","view_order"); ?><?php echo "?id="; echo $res['id']; ?>">
            <div class="body">
                <div class="cp_img">
                    <img src="http://localhost/newcms-2020/media/slider/<?php echo $res['img']; ?>" alt="<?php echo $res['img']; ?>" style="width:100%">
                </div>
                <div class="product_details">
                    <h5><?php echo $res['product_name']; ?></h5>
                    <ul class="product_price list-unstyled">
                        <li class="new_price"> &#8377;<?php echo $res['price']; ?></li>
                        <li class="new_price">Quantity :- <?php echo $res['qty']; ?></li>
                    </ul>
                        <p> Order By :- <?php echo $res['user_email'] ?></p>
                        <!-- <button type="button" name="item-1-button" id="item-1-button">Add to Cart</button> -->
                        <p><b>Order Date:-</b><span style="color:forestgreen;"><?php echo $res['created_date']; ?> </span></p>
                </div>
            </div> </a>
        </div>
        
<?php } ?>
        
    </div>      
   </div>
</div>