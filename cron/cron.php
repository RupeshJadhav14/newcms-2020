<?php
    
     define('DMCCMS', 1);
     
     require_once dirname(__FILE__) . "/../load.php";
     
     Load::loadApplication();
     
     $value = 0;
     
     $bookingData = DB::query("SELECT b.customer_name , b.ref_amt , b.repair_shop ,(select shop_name from ".CFG::$tblPrefix."repair_shop where id=b.repair_shop) as shop_name ,(select email from ".CFG::$tblPrefix."repair_shop where id=b.repair_shop) as email from ".CFG::$tblPrefix . "booking as b where b.is_paid='%d'",$value);
     
   
     $image = CFG::$livePath."/".CFG::$templates."/admin/images/admin-logo.png";
     
    require_once CFG::$livePath."/".CFG::$libraries."/phpmailer/sender.php";
     
     foreach ($bookingData as $v)
     {

           echo   $content = ' <table height="50%" width="50%" border="1">
                <tr>
                        <td align="center"><img src="'.$image;'"></td>
                </tr>
                <tr>
                        <td>'.$v['shop_name'];'</td>
                </tr>
                <tr>
                        <td>your due amount is $"'.$v['ref_amt'];'</td>
                </tr>
                <tr>
                            <td>Thank you.</td>
                </tr>
                </table>';

              echo   $subject = 'Regarding due amount';
              echo   $mail_from = CFG::$siteConfig['site_email'];
               echo   $mail_from_name = '';
               echo  $mail_to = $v['email'];
               
               
            mosMail($mail_from, $mail_from_name, $mail_to, $subject, $content, 1);
     }
 
 ?>