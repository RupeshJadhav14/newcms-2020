<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
error_reporting(0);
?>

<?php $path=URI::getLiveTemplatePath(); ?>
<div>
        <div>Content Start...</div>
        <div><strong>Module:</strong>mod_sitemap
        <strong>View:</strong>sitemap.php
        <strong>file path:</strong><?php echo CFG::$livePath."/".CFG::$modules."/mod_page/".CFG::$view."/sitemap.php"; ?></div>
</div> 
<section>
    <div class="sitemapMain">
        <div class="container">
            <div class="row">
                <div class="col-md-14 col-sm-14 col-xs-14 comSite">
                    <div class="quickSite">
                        <div class="comTitle">
                            <span class="leftLine"></span>
                            <div class="sitetitle">Quick Links</div>
                            <span class="rightLine"></span>
                        </div>
                        <ul>
                            <li><a class="trans" href="<?php echo URI::getURL("mod_page", "home"); ?>" title="Home">Home</a></li>
                            <li><a class="trans" href="<?php echo URI::getURL("mod_page", "view_page", 3); ?>" title="About Us">About Us</a></li>
                            
                            <li><a class="trans" href="<?php echo URI::getURL("mod_page", "contact_us"); ?>" title="Contact Us">Contact Us</a></li>
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

