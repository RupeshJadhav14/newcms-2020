<?php $path1 = URI::getLiveTemplatePath(); ?>
<link rel="stylesheet" href="<?php echo $path1; ?>/css/owl.carousel.css" type="text/css">
<script src="<?php echo $path1; ?>/js/owl.carousel.js" type="text/javascript"></script>

<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
$path = BlockSlider::$sliderImagePath;


$ipadSlider = array();
?>
<!-- Banner section start -->
<!--<div>
        <div>Slider Start...</div>
        <div><strong>Module:</strong>mod_slider
        <strong>Block:</strong>block_slider
        <strong>file path:</strong><?php // echo CFG::$livePath."/".CFG::$modules."/mod_slider/".CFG::$block."/block_slider/".CFG::$view."/block_slider.php"; ?></div>
    </div> --><!-- 
<div class="slideContain">	
    <ul class="rslides" id="slider">    
        <?php
        foreach ($data as $image) {    
            if ($image['image_name'] != "") {
                ?>
                <li>
                    <img src="<?php echo UTIL::getResizedImageSrc("slider", $image['image_name'], "sl", URI::getAbsTemplatePath() . "/images/no-image.jpg"); ?>" title="<?php echo ($image['image_title'] != '') ? $image['image_title'] : $image['title']; ?>" alt="<?php echo ($image['image_alt'] != '') ? $image['image_alt'] : $image['title']; ?>"  />
                </li>
                <?php
            }
        }
        ?>
    </ul>
    <ul class="rslides" id="slider2">    
        <?php
        foreach ($data as $image) {    
            if ($image['ipad_image_name'] != "") {
                ?>
                <li>
                    <img src="<?php echo UTIL::getResizedImageSrc("slider", $image['ipad_image_name'], "sl", URI::getAbsTemplatePath() . "/images/no-image.jpg"); ?>" title="<?php echo ($image['ipad_image_title'] != '') ? $image['ipad_image_title'] : $image['title']; ?>" alt="<?php echo ($image['ipad_image_alt'] != '') ? $image['ipad_image_alt'] : $image['title']; ?>"  />
                </li>
                <?php
            }
        }
        ?>
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function() {
$(".slideContain").owlCarousel(
                {
                    nav: true,
                    dots: false,
                    responsiveClass: true,
                    items: 1,
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    autoplayTimeout: 3500,
                    itemsDesktop: true,
                    autoplayHoverPause: true
                });
                });
</script> -->