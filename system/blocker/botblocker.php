<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

// Set the API key and redirect URL for detected bots
$config_botblocker['apikey'] = $api->botblockerkey();
$config_botblocker['bot']    = $api->ngeblock("error");

// Function to retrieve the client's real IP address
function get_client_ip() {
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
        $_SERVER['REMOTE_ADDR']    = $_SERVER["HTTP_CF_CONNECTING_IP"];
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

// Get the client's IP
$ip = get_client_ip();

// Initialize cURL session
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Make the API request to botblocker.pro
curl_setopt($ch, CURLOPT_URL, 
    "https://botblocker.pro/api/v1/blocker?ip=" . $ip . 
    "&apikey=" . $config_botblocker['apikey'] . 
    "&ua=" . urlencode($_SERVER['HTTP_USER_AGENT']) . 
    "&url=" . urlencode($_SERVER['REQUEST_URI']) . 
    "&" . rand(1, 1000000) // Random query to prevent caching
);

// Execute the request and close connection
$data = curl_exec($ch);
curl_close($ch);

// Decode JSON response
$json = json_decode($data, true);

// Get bot status from response
$isBot = $json['data']['block_access'];

// If user is detected as a bot, log and block them
if ($isBot == true) {
    $api->save($api->onetime, $_SESSION['ip'] . PHP_EOL, "a");
    $api->block("BLOCKED by BOT BLOCKER");
    die(header("Location: " . $config_botblocker['bot']));
}
?>