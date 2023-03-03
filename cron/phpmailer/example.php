<?php
//place this before any script you want to calculate time
$time_start = microtime(true); 

define('DMCCMS', 1);
require_once "../load.php";
Load::loadApplication();

// $dateFolder = date('d-m-Y',strtotime('2020-06-26'));
$dateFolder = date('d-m-Y');
echo "Date :: ",$dateFolder,'<br>';

use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;

require CFG::$absPath.'/cron/phpmailer/Exception.php';
require CFG::$absPath.'/cron/phpmailer/PHPMailer.php';
require CFG::$absPath.'/cron/phpmailer/SMTP.php';

$mail = new PHPMailer(true);
try {
	$mail->setFrom(CFG::$siteConfig['site_email'], 'Bargains Market Place');

	$ccemail = explode(',', CFG::$siteConfig['enquiry_emails']);
	$mail->addAddress($ccemail[0]);
	unset($ccemail[0]);
	$ccemail = array_values($ccemail);
	$cc = array();
	foreach ($ccemail as $key => $value) {
		$mail->addCC($value);
	}

	// Attachments
	$mail->addAttachment(CFG::$absPath.'/localBackup/dropship/'.$dateFolder.'/dropship-deactive.csv');
	$mail->addAttachment(CFG::$absPath.'/localBackup/dropship/'.$dateFolder.'/dropship-new-products-images.csv');
	$mail->addAttachment(CFG::$absPath.'/localBackup/dropship/'.$dateFolder.'/dropship-new-products-to-import-in-neto.csv');
	$mail->addAttachment(CFG::$absPath.'/localBackup/dropship/'.$dateFolder.'/dropship-price-qty-to-insert-in-neto - Mydeal.csv');
	$mail->addAttachment(CFG::$absPath.'/localBackup/dropship/'.$dateFolder.'/dropship-price-qty-to-insert-in-neto.csv');
	$mail->addAttachment(CFG::$absPath.'/localBackup/dropship/'.$dateFolder.'/Flat-Rate-Shipping-Charge.csv');

	// Content
	// Set email format to HTML
	$mail->isHTML(true); 
	$mail->Subject = 'Bargains Online Product Mapping ('.$dateFolder.')';
	$mail->Body    = 'Hello, <br> please find attachments files which is used to update bargains products <br>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	$mail->send();
	echo 'Mail has been sent';
} catch (Exception $e) {
	echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$time_end = microtime(true);
$execution_time = ($time_end - $time_start)/60;

//execution time of the script
echo '<br><b>Total Execution Time:</b> '.number_format((float) $execution_time, 3).' Mins';
?>