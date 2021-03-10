<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');

use App\Bitrix24\Bitrix24API;
use LinkedinToBitrixImporter\BitrixImporter\BitrixLeadModel;
use LinkedinToBitrixImporter\BitrixImporter\BitrixSync;

use LinkedinToBitrixImporter\InternalModels\LinkedinProfile;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$userArray = null;

if (!empty($_POST['data'])) {
    try {
        $parsedUserData = json_decode($_POST['data'], true);

        if (is_array($parsedUserData)) {
            $userArray = $parsedUserData;
        }

    } catch (Exception $e) {
    }
}

if ($userArray !== null) {

    $webhookURL = 'https://wdtest.bitrix24.ru/rest/1/bnr59s5dl5k8zeic/';
    $bitrix24 = new Bitrix24API($webhookURL);
    $bitrixModel = new BitrixLeadModel();
//@todo create Linkedin Profile
    $bitrixModel->setLinkedinProfile(
        new LinkedinProfile($userArray)
    );


    $bitrixSync = new BitrixSync(
        $bitrix24,
        $bitrixModel
    );
    $bitrixSync->sync();

} else {
    echo 'request exit';
    // :(
}

