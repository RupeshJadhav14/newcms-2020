<?php

//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

class UserHelper {

    /**
     * constructor of class UserHelper. do initialisation
     *
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function __construct() {

    }

    /**
     * process login request
     * 
     * @author Rutwik Avasthi <php.datatechmedia@gmail.com>
     */
    function doLogin() {
        // check whether form is submitted or not
        if (isset($_POST['txtUsername'])) {
            if (trim($_POST['txtUsername']) != "" && trim($_POST['txtPassword']) != "") {

                //DB::debugMode();
                $userData = DB::query("SELECT u.id,u.name,u.username,u.email,u.suburb,u.state,u.address,u.postcode,u.phone,u.mobile,u.fax,r.id as roll_id,r.name as roll_name,r.access_level,r.access_type FROM " . CFG::$tblPrefix . "user as u," . CFG::$tblPrefix . "rolls as r WHERE u.roll_id=r.id and username=%s and password=%s and (r.access_level='all' or r.access_level=%s) and u.active='1' and is_deleted='0' limit 1", $_POST['txtUsername'], Core::encryptPass($_POST['txtPassword']), APP::$appType);

                if (count($userData) > 0) {
                    if ($userData[0]['access_type'] == "selected" || $userData[0]['access_type'] == 'exclude') {
                        $actionData = DB::queryFirstColumn("SELECT a.id AS parent FROM `" . CFG::$tblPrefix . "roll_action` AS r, `" . CFG::$tblPrefix . "module_action` AS a WHERE (r.action_id = a.id OR r.action_id = a.parent_action) AND r.roll_id=%i", $userData[0]['roll_id']);
                        $userData[0]['action'] = $actionData;
                    }
                    $_SESSION[CFG::$session_key] = $userData[0];
                    LOG::$log_type = LOGIN_SUCCESS;
                    LOG::save_log();
                    // check for the return url if there return to that url
                    if (isset($_GET['returnURL']) && !empty($_GET['returnURL']) && CFG::$livePath . "/" . CFG::$baseDir . "/" . "index.php?" . base64_decode($_GET['returnURL']) != URI::getURL("mod_user", "admin_login")) {
                        echo json_encode(array("result" => "success", "redirectLink" => CFG::$livePath . "/" . CFG::$baseDir . "/" . "index.php?" . base64_decode($_GET['returnURL'])));
                    } else {
                        echo json_encode(array("result" => "success", "redirectLink" => URI::getURL("mod_admin", "dashboard")));
                    }

                    exit;
                } else {
                    echo json_encode(array("result" => "error", "reqMsg" => "Invalid username or password"));
                    exit;
                }
            } else {
                echo json_encode(array("result" => "error", "reqMsg" => "Invalid username or password"));
                exit;
            }
        }
    }

    function sendEmail() {
        if (isset($_POST['txtEmail'])) {
            //check for valid email
            $email = trim($_POST['txtEmail']);
            $record = DB::query("SELECT id,username,password FROM " . CFG::$tblPrefix . "user where active='1' and is_deleted='0' and email=%s", $email);
            if (count($record) == 0) {
                echo json_encode(array("result" => "error", "reqMsg" => "Invalid email."));
                exit;
            } else {

                $newPass = $this->randomPassword();

                $arrFields['password'] = Core::encryptPass($newPass);
                DB::update(CFG::$tblPrefix . "user", StringManage::processString($arrFields), " id=%d ", $record[0]['id']);
                Load::loadLibrary("sender.php", "phpmailer");
                $content = "";
                $subject = CFG::$siteConfig['site_name'] . " - Password Details ";
                $content = "<strong>Forgot Password Detail For Admin</strong><br><strong>Username:</strong> " . $record[0]['username'] . "<br><strong>Password:</strong> " . $newPass . "<br><br>Please <a href='" . CFG::$livePath . "/myAdmin' target='_blank'>click here</a> to login. Once you logged in change your password.";
                $content = Core::loadTextMailTempleate($subject, $content);
                // echo $content;exit;
                $to = $email;

                mosMail(CFG::$siteConfig['site_email'], CFG::$siteConfig['site_name'], $to, $subject, $content, 1);


                echo json_encode(array("result" => "success", "reqMsg" => "Mail has been sent successfully"));
                exit;
            }
        }
    }

    function randomPassword() {
        $randAry = array("ABCDEFGHIJKLMNOPQRSTUWXYZ", "0123456789", "$@#");
        $str1 = $randAry[0][rand(0, strlen($randAry[0]) - 1)];
        $str2 = $randAry[1][rand(0, strlen($randAry[1]) - 1)];
        $str3 = $randAry[2][rand(0, strlen($randAry[2]) - 1)];
        $alphabet = "abcdefghijklmnopqrstuwxyz0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return $str1 . implode($pass) . $str2 . $str3; //turn the array into a string
    }

}

?>