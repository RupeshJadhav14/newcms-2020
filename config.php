<?php

//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');
// set australian time zone
date_default_timezone_set('Australia/Sydney');
// Start the session
if (!isset($_SESSION)) {
    session_start();
}
// Set error reporting

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
error_reporting(0);

class CFG {
    
    /** used to encrypt and decrypt user password
        @var $cryptKey string
    */
    public static $cryptKey = 'qJB0rGtIn5UB1xG0';
    
    /** Store absolute path of site			
      @var $absPath string
     */
    public static $absPath = __DIR__;

    /** Store live url of site			
      @var $livePath string
     */
    public static $livePath = 'http://localhost/newcms-2020';
    public static $liveSite = '';

    /** Store host detail of database
      @var $host string
     */
    public static $host = "localhost";

    /** Store user detail of database
      @var $user string
     */
    public static $user = "root";

    /** Store password detail of database
      @var $password string
     */
    public static $password = "";

    /** Store database name detail of database
      @var $db string
     */
    public static $db = "newcms_2020";

    /** Store database table name prefix value
      @var $tblPrefix string
     */
    public static $tblPrefix = "dtm_";

    /** Store libraties folder name
      @var $libraries string
     */
    public static $libraries = "libraries";

    /** Store session key name for login user
      @var $session_key string
     */
    public static $session_key = "WC_user_login";

    /** Store database name detail of database
      @var $modules string
     */
    public static $modules = "modules";

    /** Store template folder name
      @var $templates string
     */
    public static $templates = "templates";

    /** Store model folder name
      @var $model string
     */
    public static $model = "model";

    /** Store view folder name
      @var $view string
     */
    public static $view = "view";

    /** Store block folder name
      @var $block string
     */
    public static $block = "block";

    /** Store helper folder name
      @var $helper string
     */
    public static $helper = "helper";

    /** Store media folder name
      @var $mediaDir string
     */
    public static $mediaDir = "media";

    /** Store editor image folder name
      @var $mediaDir string
     */
    public static $editorImgDir = "editor";

    /** SEF url enable or disable
      @var $sef string
     */
    public static $sef = true;

    /** It will set language option in URL
      @var $langURL string
     */
    public static $langURL = false;

    /** Meta title length
     *  @var string length of meta title
     */
    public static $metaTitleLen = 100;

    /** Meta title length
     *  @var string length of meta description
     */
    public static $metaDescLen = 150;

    /** Meta title length
     *  @var string length of meta keyword
     */
    public static $metaKeywordLen = 180;

    /** if set to true will combine JS and CSS files
      @var $mergeFiles string
     */
    public static $mergeFiles = false;

    /** Name of merge directory
      @var $mergeDir string
     */
    public static $mergeDir = "cache";

    /** SEF slug for dynamic image
      @var $sefCatalog string
     */
    public static $sefCatalog = "image-catalog";

    /** Store base directory of an application
      @var $baseDir string
     */
    public static $baseDir = "";
    public static $bannerDir = 'banner';

    /** Maximum file upload limit (in MB)
      @var $maxFileSize string
     */
    public static $maxFileSize = 10;

    /** store site config data
      @var $siteConfig string
     */
    public static $siteConfig = array();
    public static $aesKey = "cyaehJGt%32h%|,Df1c~REh";

    /** No of days to display in graph at dashboard
      @var $graphDays int
     */
    public static $graphDays = 31;

    /**
     * For whole site paging pagesize limit
     * @var $pageSize Integer
     */
    public static $pageSize = 10;

    /** Language folder path
      @var $languageDir string
     */
    public static $languageDir = "local";
    public static $stateArray = array("NSW" => "New South Wales",
        "VIC" => "Victoria",
        "ACT" => "Australian Capital Territory",
        "QLD" => "Queensland",
        "WA" => "Western Australia",
        "TAS" => "Tasmania",
        "SA" => "South Australia",
        "NT" => "Northern Territory");

    /** Page images folder name
      @var $pageDir string
     */
    public static $pageDir = "page";
    public static $mypageDir = "mypage";
    public static $categoryDir = "category";
    public static $productDir = "product";
    public static $imageSize = array("thumb" => array(80, 80),
        "sl" => array(740, 320),
        "small" => array(140, 68),
        "vs" => array(190, 105), // video small image
        'ib' => array(1375, 220) // For banner image 
    );
    public static $pageGalleryDir = "page-gallery";
    public static $categoryGalleryDir = "category-gallery";
    public static $productGalleryDir = "product-gallery";
    public static $sliderDir = "slider";
    public static $orderDir = "order";
    public static $galleryDir = "gallery";
    public static $default_banner = "inner-banner.jpg";
}
