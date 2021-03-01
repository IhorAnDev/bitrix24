<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

define('BITRIX_DOMAIN', 'https://wdtest.bitrix24.ru');

$webhookURL = BITRIX_DOMAIN . '/rest/1/36zq3foulz4pcx0t/profile.json';

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_POST => 1,
    CURLOPT_HEADER => 0,
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $webhookURL,
));

$result = curl_exec($curl);
curl_close($curl);

echo '<pre>';
print_r($result);
print_r(json_decode($result, true));
echo '</pre>';
