<?php
	//restrict direct access to the page
defined( 'DMCCMS' ) or die( 'Unauthorized access' );
	//Declare path variable for get live template file
$path=URI::getLiveTemplatePath();


/*
for($i=0)
{
	
}
*/
?>
 <head>

<meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
<link rel="stylesheet" href='<?php echo $path . '/vendor/bootstrap/css/bootstrap.min.css' ?>'/>
<link rel="stylesheet" href='<?php echo $path . '/vendor/bootstrap/css/bootstrap.min.css.map.css' ?>'/>
<link rel="stylesheet" href='<?php echo $path . '/assets_tmp/css/animated.css' ?>'/>
<link rel="stylesheet" href='<?php echo $path . '/assets_tmp/css/fontawesome.css' ?>'/>
<link rel="stylesheet" href='<?php echo $path . '/assets_tmp/css/owl.css' ?>'/>
<!-- 165615668136-s76a0vc66f630d6ct5nhvuhj6bc4n3bp.apps.googleusercontent.com -->
<meta name="google-signin-client_id" content="165615668136-s76a0vc66f630d6ct5nhvuhj6bc4n3bp.apps.googleusercontent.com">

<link rel="stylesheet" href='<?php echo $path . '/assets_tmp/css/templatemo-onix-digital.css' ?>'/>

<script type="text/javascript" src='<?php echo $path . '/assets_tmp/js/animation.js' ?>'></script>
<script type="text/javascript" src='<?php echo $path . '/assets_tmp/js/custom.js' ?>'></script>
<script type="text/javascript" src='<?php echo $path . '/assets_tmp/js/imagesloaded.js' ?>'></script>
<script type="text/javascript" src='<?php echo $path . '/assets_tmp/js/isotope.js' ?>'></script>
<script type="text/javascript" src='<?php echo $path . '/assets_tmp/js/owl-carousel.js' ?>'></script>
<script type="text/javascript" src='<?php echo $path . '/assets_tmp/js/tabs.js' ?>'></script> 
</head>


<!---- Page loading Code ----->

<style>
  .stickyHeader {
position: fixed;
width: 100%;
}
</style>



<!---- Page loading Code ----->


<!-- ======= Header ======= -->
<!-- ***** Preloader Start ***** -->
 <!--  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->

 <header class="header-area header-sticky wow slideInDown stickyHeader" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="<?php echo CFG::$livePath; ?>" class="logo">
              <img src="http://localhost/newcms-2020/templates/front/assets_tmp/images/logo.png">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="<?php echo CFG::$livePath; ?>" class="active">Home</a></li>
              <!-- <li class="scroll-to-section"><a href="#services">Services</a></li> -->
              <li class="scroll-to-section"><a href="#about">About</a></li>

              <li class="scroll-to-section"><a href="<?php echo URI::getURL("mod_order","order"); ?>">Product</a></li>
              <li class="scroll-to-section"><a href="#video">Videos</a></li> 
              <li class="scroll-to-section"><a href="#contact">Contact Us</a></li> 
               <?php if(isset($_SESSION['username'])){
            ?>
            <li class="scroll-to-section"><a href="<?php echo URI::getURL("mod_order","wishList"); ?>">WhishList</a></li>

            <li class="scroll-to-section"><a href="<?php echo URI::getURL("mod_user","userLogout"); ?>">Logout</a></li>

        <?php }
        else{
            ?>
            <li class="scroll-to-section"><a href="<?php echo URI::getURL("mod_user","userLogin"); ?>">Login</a></li>
        <?php
        }
        ?>  
              <li class="scroll-to-section"><a><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></a></li> 
              <li class="scroll-to-section">
                <div class="main-red-button-hover">
                  <a href="<?php echo URI::getURL("mod_order", "addToCart"); ?>">
                   <i class="fa" style="font-size:24px">&#xf07a;</i>
                   <span class='badge badge-warning' id='lblCartCount'><span id="cart-count">
                <?php if($_SESSION['cart']['orderid'] != 0){ echo sizeof($_SESSION['cart']['orderid']); } ?></span>
                  </a>
               </div>
              </li> 
              <!-- <li class="scroll-to-section"><div class="main-red-button-hover"><a href="#contact">Contact Us Now</a></div></li>  -->
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
    