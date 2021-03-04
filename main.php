<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use LinkedinToBitrixImporter\ArrayClass;
use App\Bitrix24\Bitrix24API;

$webhookURL = 'https://wdtest.bitrix24.ru/rest/1/bnr59s5dl5k8zeic/';
$bx24 = new Bitrix24API($webhookURL);

$test = new ArrayClass();
var_dump($bx24->addLead($test->setArray()));
die();