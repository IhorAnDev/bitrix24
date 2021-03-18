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

if (isset($_POST['data'], $_POST['bitrix_user_id'])) {
    try {
        $parsedUserData = json_decode($_POST['data'], true);
        $parsedUserData['bitrix_user_id'] = $_POST['bitrix_user_id'];

        if (is_array($parsedUserData)) {
            $userArray = $parsedUserData;
        }

    } catch (Exception $e) {
    }
}
if ($userArray !== null) {

    $webhookURL = 'https://bitrix.wizardsdev.com/rest/56/0ehxjf8on72381zu/';
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

