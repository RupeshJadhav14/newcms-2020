<style type="text/css">
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    
}
body{
    margin-top:6%;
}
/*
.container{
    display: flex;
    position: relative;
    align-items: center;
    justify-content: center;
    height: 100vh;
}*/



.col-6{
    width: 50%;
}

.single-product{
    width: 1080px;
    position: relative;
}


/** product image **/

.single-product .product-image{
    width: 100%;
}

.product-image .product-image-main{
    position: relative;
    display: block;
    height: 300px;
    background: var(--bg-grey);
    padding: 10px;
}

.product-image-main img{
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
}


/** product title **/

.product-title{
    margin-top: 20px;

}
.product-title h2{
    font-size: 32px;
    line-height: 2.4rem;
    font-weight: 700;
    letter-spacing: -0.02rem;
}

/** Product price **/
.product-price{
    display: flex;
    position: relative;
    margin: 10px 0;
    align-items: center;
}

.product-price .offer-price{
    font-size: 48px;
    font-weight: 700;
}

/** Product Details **/
.product-details{
    margin: 10px 0;
}
.product-details h3{
    font-size: 18px;
    font-weight: 500;
}
.product-details p{
    margin: 5px 0;
    font-size: 14px;
    line-height: 1.2rem;
}
/* button style */
.product-btn-group{
    display: flex;
    gap: 15px;
}
.product-btn-group .button{
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    padding: 10px 24px;
    font-size: 16px;
    font-weight: 500;
}
.product-btn-group .add-cart{
    
    background-color: var(--bg-grey);
    color: var(--grey);
    border-radius: 4px;
    cursor: pointer;
}
.product-btn-group .add-cart i{
    font-size: 20px;
}
.product-btn-group .add-cart:hover{
    box-shadow: 0 3px 6px var(--shadow);
    background: var(--grey);
    color: black;
}
.product-btn-group .heart{
    color: var(--grey);
    cursor: pointer;
}
.product-btn-group .heart i{
    font-size: 20px;
}
.product-btn-group .heart:hover{
    color: var(--accent-color);
}


</style>

<?php

defined( 'DMCCMS' ) or die( 'Unauthorized access' );

$pageData = $data['data']->records;

//print_r($pageData);exit;
$path=URI::getLiveTemplatePath();


//var_dump($_GET['id']);
//$query = 'SELECT * FROM tbl_whish_list JOIN tblproduct ON tblproduct.id = tbl_whish_list.product_id ORDER BY tbl_whish_list.product_id ASC';

$result = DB::query("SELECT * FROM " . CFG::$tblPrefix . "order where id =" .$_GET['id'] );

//var_dump($result);

 ?>




<?php foreach ($result as $key => $r) {
    // code...
 ?>

    <div class="container">
        <div class="single-product">
            <div class="row">
                <div class="col-6">
                    <div class="product-image">
                        <div class="product-image-main">
                            <img src="http://localhost/newcms-2020/media/slider/<?php echo $r['img']; ?>" alt="<?php echo $r['img']; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    

                    <div class="product">
                        <div class="product-title">
                            <h2> <?php echo $r['product_name'] ?> </h2>
                        </div>
                        
                        <div class="product-price">
                            <span class="offer-price">&#8377;<?php echo $r['price'] ?> </span>
                        </div>

                        <div class="product-details">
                            <h3>Order By : <?php echo $r['user_email'] ?></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos est magnam quibusdam maiores sit perferendis minima cupiditate iusto earum repudiandae maxime vitae nostrum, ea cumque iste ipsa hic commodi tempore.</p>
                        </div>
                        <div class="product-btn-group">
                            
                           <?php

                           if(isset($_SESSION['username'])){                            
                            //DB::debugMode();
                            //var_dump($_GET['id']);var_dump($_SESSION['cart']); exit();
                            if (array_key_exists($r['id'],$_SESSION['cart']['orderid'])){                              
                            ?>
                            <div class="button remove-cart"><a href="javascript:void(0)" class="removeCart"><i class='bx bxs-cart' ></i> Remove from Cart</a></div>
                            <?php }
                             else { 
                                ?>
                            <div class="button add-cart"><a href="javascript:void(0)" class="addCart"><i class='bx bxs-cart' ></i> Add to Cart</a></div>
                            <?php
                             }
                             $sql=DB::query("SELECT * FROM " . CFG::$tblPrefix . "wishlist where uid =" .$_SESSION['userid']." AND oid = ".$_GET['id'] ); 
                             if(count($sql) == 0) {
                             ?>
                           <div class="button heart"><a href="javascript:void(0)" class="addWish"><i class='bx bxs-heart'></i> Add to Wishlist </a>
                           </div>
                           <?php } 
                           else { 
                            ?>
                           <div class="button heart"><a href="javascript:void(0)" class="removeWish"><i class='bx bxs-heart'></i> Remove From Wishlist </a>
                           </div>

                          <?php 
                            }
                             } 
                          else { 
                            ?>
                            <div class="button add-cart"><a href="<?php echo URI::getURL("mod_user","userLogin"); ?>"><i class='bx bxs-cart' ></i> Add to Cart</a></div>

                            <div class="button heart"><a href="<?php echo URI::getURL("mod_user","userLogin"); ?>" ><i class='bx bxs-heart'></i> Add to Wishlist </a>
                           </div>

                        <?php  }
                          ?>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>

<!-- <script type="text/javascript">
var x=0;
function box_true() 
{ 
    if(x== 0)
    {
    document.getElementById("txtWish").innerHTML= ' Remove From Wishlist ';
     x = 1;
    }
    else if(x==1)
     {
    document.getElementById("txtWish").innerHTML= ' Add to Wishlist ';
    x = 0;
    }
}
</script> -->