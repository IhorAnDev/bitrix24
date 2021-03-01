<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use App\Bitrix24\Bitrix24API;
use App\Bitrix24\Bitrix24APIException;


define('BITRIX_DOMAIN', 'https://wdtest.bitrix24.ru');
$webhookURL = BITRIX_DOMAIN . '/rest/1/36zq3foulz4pcx0t/';




    $bx24 = new Bitrix24API($webhookURL);

    // Получаем пользователя по ID
    $user = $bx24->getUser(1);
    print_r($user);


    $generator = $bx24->getUsers(
        [ 'USER_TYPE' => 'employee' ],
        $order = 'ASC',
        $sort = 'NAME'
    );
    foreach ($generator as $users) {
        foreach($users as $user) {
            var_dump($user);
        }
    }

    die();

