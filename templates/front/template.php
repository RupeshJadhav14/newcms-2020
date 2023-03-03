<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class Template {

    /**
     * This function must require. It is used by system to set common attributes of template
     *
     * @author Bhavesh Prajapati <php.datatechmedia@gmail.com>
     */
    public static function setTemplate() {
      $path = URI::getLiveTemplatePath();

        // add css and js in header
        /* Layout::addHeader('<link rel="stylesheet" href="'.$path.'/css/menu.css" type="text/css"/>');
          Layout::addHeader('<link rel="stylesheet" href="'.$path.'/css/style.css" type="text/css">');
          Layout::addHeader('<link rel="stylesheet" href="'.$path.'/css/1140.css" type="text/css">'); */

          $absPath = URI::getAbsTemplatePath();
          
          //Layout::addHeader('<link rel="stylesheet" href="'.$path.'/css/bootstrap/bootstrap.min.css" type="text/css">');
      
      
      
      Layout::addHeader('<link href="'.$path.'/assets/img/favicon.png" rel="icon">');
      Layout::addHeader('<link href="'.$path.'/assets/img/apple-touch-icon.png" rel="icon">');
      Layout::addHeader('<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">');
     
     Layout::addHeader('<link href="'.$path.'/assets/vendor/animate.css/animate.min.css" rel="stylesheet">');
     Layout::addHeader('<link href="'.$path.'/assets/vendor/aos/aos.css" rel="stylesheet">');
     Layout::addHeader('<link href="'.$path.'/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">'); 
     Layout::addHeader('<link href="'.$path.'/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">');
     Layout::addHeader('<link href="'.$path.'/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">');
     Layout::addHeader('<link href="'.$path.'/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">');
     Layout::addHeader('<link href="'.$path.'/assets/vendor/remixicon/remixicon.css" rel="stylesheet">');
     Layout::addHeader('<link href="'.$path.'/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">');
         Layout::addHeader('<link href="'.$path.'/assets/css/style.css" rel="stylesheet">'); 
        


       // Layout::groupFiles("commonstyle", $absPath . "/css/menu.css", "css", "header");
        //  Layout::groupFiles("commonstyle", $absPath . "/css/style.css", "css", "header");
       // Layout::groupFiles("commonstyle", $absPath . "/css/1140.css", "css", "header");
        //Layout::groupFiles("commonjs", $absPath . "/js/jquery.min.js", "js", "header");

        // get all header css and js
          $jsData = Layout::bufferContent(URI:: getAbsTemplatePath() . "/js/jspage.php");
          Layout::addHeader($jsData);
          Layout::addHeader('<script src="'.$path.'/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>');

        // get all footer css and js
          $jsFooter = Layout::bufferContent(URI:: getAbsTemplatePath() . "/js/jsfooter.php");
          Layout::addFooter($jsFooter);
        }
      }