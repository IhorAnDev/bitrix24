<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
use App\LinkedinProfile;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$userArray = $_GET;

$user_data = null;
if (isset($_POST['data']) && !empty($_POST['data'])) {
    try {
        $parsed_user_data = json_decode($_POST['data'], true);

        if (is_array($parsed_user_data)) {
            $user_data = $parsed_user_data;
        }
    } catch (Exception $e) {}
}

if ($user_data !== null) {
    // Something good action
    echo json_encode($user_data);
} else {
    echo 'bad bad bad';
    // :(
}

die;

$user = new LinkedinProfile($userArray['basics'], $userArray['work'],$userArray['education'],$userArray['skills']);

var_dump($user);
