<?php

use App\Bitrix24\Bitrix24API;
use LinkedinToBitrixImporter\BitrixImporter\BitrixLeadModel;
use LinkedinToBitrixImporter\BitrixImporter\BitrixSync;

$webhookURL = 'https://wdtest.bitrix24.ru/rest/1/bnr59s5dl5k8zeic/';
$bitrix24 = new Bitrix24API($webhookURL);
$bitrixModel = new BitrixLeadModel();
//@todo create Linkedin Profile
$bitrixModel->setLinkedinProfile();

$bitrixSync = new BitrixSync(
    $bitrix24,
    $bitrixModel
);
