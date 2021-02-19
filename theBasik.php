<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
use App\LinkedinProfile;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$userArray = $_GET;

$userArray = null;
if (isset($_POST['data']) && !empty($_POST['data'])) {
    try {
        $parsedUserData = json_decode($_POST['data'], true);

        if (is_array($parsedUserData)) {
            $userArray = $parsedUserData;
        }
    } catch (Exception $e) {}
}

if ($userArray !== null) {
    // Something good action
    echo json_encode($userArray);
} else {
    echo 'bad bad bad';
    // :(
}

die;

$user = new LinkedinProfile($userArray['basics'], $userArray['work'],$userArray['education'],$userArray['skills']);

var_dump($user);
