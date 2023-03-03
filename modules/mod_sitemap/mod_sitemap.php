<?php

//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class Sitemap {

    function __construct() {
        
    }

    /**
     * HTML sitemap
     *
     * @author Kushan Antani <kushan.datatechmedia@gmail.com>
     */
    function sitemap() {
//        Load::loadModel("sitemap");
//	$sitemapObj = new SitemapModel();
//      $data=$sitemapObj->getstore();
        Layout::renderLayout();
    }

    /**
     * HTML sitemap
     *
     * @author Parth Parikh <parth.datatechmedia@gmail.com>
     */
    public function get_sitemap() {
        global $config;


        // read sitemap template
        $sitemap = file_get_contents("sitemap_template.xml");

        $url = URI::getURL("mod_page", "home");
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
		$url = URI::getURL("mod_page", "view_page", 3);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
			$url = URI::getURL("mod_car", "search_cars");
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';				
      
		$url = URI::getURL("mod_page", "view_page", 9);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';	
		$url = URI::getURL("mod_page", "view_page", 13);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';	
		$url = URI::getURL("mod_page", "view_page", 17);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
$url = URI::getURL("mod_page", "view_page", 14);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        $url = URI::getURL("mod_testimonial", "testimonial_all");
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
$url = URI::getURL("mod_page", "view_page", 15);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';	
$url = URI::getURL("mod_page", "view_page", 12);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';							
		$url = URI::getURL("mod_page", "view_page", 2);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
$url = URI::getURL("mod_page", "view_page", 16);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';	
							
		$url = URI::getURL("mod_page", "view_page", 6);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
							$url = URI::getURL("mod_page", "view_page", 5);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
							$url = URI::getURL("mod_page", "view_page", 4);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
							$url = URI::getURL("mod_page", "view_page", 12);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        
        $url = URI::getURL("mod_page", "view_page", 19);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
							$url = URI::getURL("mod_page", "view_page", 7);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        $storedata = DB::query("SELECT * FROM " . CFG::$tblPrefix . "store where status='1' order by name asc");
        foreach ($storedata as $store) 
		{
			  if ($store['id'] == 1) {
                                                $url = URI::getURL("mod_testimonial", "campbelltown_testimonial");
                                            } else if ($store['id'] == 2) {
                                                $url = URI::getURL("mod_testimonial", "cabramatta_testimonial");
                                            } else if ($store['id'] == 3) {
                                                $url = URI::getURL("mod_testimonial", "cabramatta_clearance_testimoni");
                                            } else if ($store['id'] == 4) {
                                                $url = URI::getURL("mod_testimonial", "lansvale_testimonial");
                                            } else if ($store['id'] == 6) {
                                                $url = URI::getURL("mod_testimonial", "prestige_testimonial");
                                            } else {
                                                $url = URI::getURL("mod_testimonial", "campbelltown_testimonial");
                                            }
           
            $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
							
							
        }
        // @author: Vishal Vasani @date: 10-05-2016 @change: add url in xmlschema  start
        $url = URI::getURL("mod_page", "view_page", 18);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        
        $url = URI::getURL("mod_page", "view_page", 8);
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        
        $url = URI::getURL("mod_page", "contact_us");
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        
        
        
        $url = URI::getURL("mod_sitemap", "sitemap");
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        $url = URI::getURL("mod_car", "advance_car_search");
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
        // @author: Vishal Vasani @date: 10-05-2016 @change: add url in xmlschema  end
        
		$url = CFG::$livePath."/blog";
        $sitemap .= '<url>
							  <loc>' . $url . '</loc>
							  <changefreq>weekly</changefreq>
							  <priority>0.80</priority>
							</url>';
	


        // close sitemap tag
        $sitemap .= "</urlset>";

        // set xml header
        header("Content-Type: text/xml");
        // print sitemap
        echo trim($sitemap);
        exit;
    }

}
