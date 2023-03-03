<?php
//restrict direct access to the page
defined('DMCCMS') or die('Unauthorized access');

// $crumb2 = array('lastchild' => 1, 'name' => 'Login', 'url' => URI::getURL("mod_order", "order"));

// $mainTitle = 'User Login';
// $breadCrumb = array($crumb2);
// display_banner($breadCrumb, $mainTitle);
?>
<style type="text/css">

body{
     margin-top:10%;
}

</style>
<div class="loginBox"  style="margin-left:5%;">
    <div class="loginMain">
        <div class="loginCenter">
            <div class="logInn">
                <div class="userIcon"></div>
                <div class="rightFrm">
                    <form class="form-horizontal"  id="loginFrm" method="post">

                        <div class="alert alert-error" id="alertMsg"></div>
                        <div class="header-alert header-alert-error" id="alertMsg" ></div>
                        <div class="frmTitle">User Login</div>
                        <div class="frmTxt uname">          
                            <input id="username" class="required" name="username" class="txt required" title="User name" placeholder="Username" type="text">
                        </div>
                        <div class="frmTxt pwd">
                            <input type="password" id="password" class="required" name="password" placeholder="Password" title="Password" data-content="Enter your password" data-placement="right" data-title="Password" class="txt required" class="span12 required applyPopover low-line-height" autocomplete="false">
                        </div>
                        <div class="subBox">
                            <div class="login-box login-btns">
                            <a href="javascript:void(0)" id="btnSubmit" class="trans comBtn" title="Login">Login</a> 
                               <!--  <input type="button" class="trans addNew loginBtn" id="btnSubmit" title="Login" value="Login"> -->
                            </div>
                        </div>

                    </form>
                    <p id="msg"> </p>
                </div>
                <div class="backTo"><a href="<?php echo CFG::$livePath; ?>" title="Back to website" class="trans"><span>Back to website</span></a>
                </div>
                <div id="my-signin2"></div>
                <!-- <div id="g_id_onload"
                    data-client_id="165615668136-s76a0vc66f630d6ct5nhvuhj6bc4n3bp.apps.googleusercontent.com"
                    data-login_uri="http://localhost/newcms-2020/"
                    data-your_own_param_1_to_login="any_value"
                    data-your_own_param_2_to_login="any_value">
                </div> -->
            </div>    
        </div>    
    </div>    
</div>    


<script>
    function onSignIn(googleUser) {
        
      if(profile){
        var profile = googleUser.getBasicProfile();
        console.log(profile.getId());
        console.log(profile.getName());
          $.ajax({
                type: 'POST',
                url: 'login_pro.php',
                data: {id:profile.getId(), name:profile.getName(), email:profile.getEmail()}
            }).done(function(data){
                console.log(data);
                window.location.href = '<?php echo CFG::$livePath; ?>';
            }).fail(function() { 
                alert( "Posting failed." );
            });
      }
    }
    function onSuccess(googleUser) {
      console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
    }
    function onFailure(error) {
      console.log(error);
    }
    function renderButton() {
      gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsignin': onSignIn,
        'onsuccess': onSuccess,
        'onfailure': onFailure
      });
    }
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>