<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
error_reporting(E_ALL);
//$abs_path = CFG::$absPath . DIRECTORY_SEPARATOR . CFG::$mediaDir . DIRECTORY_SEPARATOR . CFG::$sliderDir . DIRECTORY_SEPARATOR;
//Load::loadModel('page', 'mod_page');
//$pageObj = new PageModel();
//$bannerImages = $pageObj->bannerImages();
//pre($bannerImages);exit;
//$bannerImage = isset($bannerImages['banner_img']) && $bannerImages['banner_img'] != "" ? $bannerImages['banner_img'] : CFG::$siteConfig['txtBannerImage'];

$image = URI::getLiveTemplatePath() . "/new-images/inner-banner.jpg";
/*if (is_file($abs_path . $bannerImage) && file_exists($abs_path . $bannerImage)) {
    $image = UTIL::getResizedImageSrc(CFG::$banner, $bannerImage, "ib", CFG::$siteConfig['txtBannerImage']);
}*/
//pre($data, 1);
?>



<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $mainTitle;?></h2>
          <ol>
            
			
			
          </ol>
        </div>

      </div>
    </section>
