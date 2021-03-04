<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use App\Bitrix24\Bitrix24API;
use App\Bitrix24\Bitrix24APIException;

try {

    $webhookURL = 'https://wdtest.bitrix24.ru/rest/1/bnr59s5dl5k8zeic/';
    $bx24 = new Bitrix24API($webhookURL);

//    $newLead = $bx24->getLeadFields();
//    var_dump($newLead);
//    die();

    $leadField = [
        'TITLE' => 'My Lead',
        'NAME' => 'Egor',
        'LAST_NAME' => 'Popov',
        'SECOND_NAME' => 'Fedorovich',
        'PHONE' => array([
            'VALUE' => '+380968080845',
            'VALUE_TYPE' =>'WORK']),
        'COMPANY_TITLE' => 'Velicio',
        'ID' => '23',
        'EMAIL' => array([
            'VALUE' => 'daassasassasasasd@asdsa.com',
            'VALUE_TYPE' =>'WORK']),
        'POST' => 'Junior'
    ];

    // Добавляем новый лид
    $leadId = $bx24->addLead($leadField);
    print_r($leadId);




    // Устанавливаем набор связанных товарных позиций
    $bx24->setLeadProductRows($leadId, [
        ['PRODUCT_ID' => 1689, 'PRICE' => 1500.00, 'QUANTITY' => 2],
        ['PRODUCT_ID' => 1860, 'PRICE' => 500.00, 'QUANTITY' => 15]
    ]);

    // Обновляем существующий лид
    $bx24->updateLead($leadId, [
        'TITLE' => 'Новый лид №12'
    ]);

    // При необходимости, изменяем значение по умолчанию 'PRODUCTS' на '_PRODUCTS' для имени поля
    // со списком товарных позиций, возвращаемых вместе с лидом
    Bitrix24API::$WITH_PRODUCTS = '_PRODUCTS';

    // Загружаем лид по ID вместе со связанными товарными позициями
    $lead = $bx24->getLead($leadId, [Bitrix24API::$WITH_PRODUCTS]);
    print_r($lead);

    // Удаляем существующий лид
    $bx24->deleteLead($leadId);

    // Загружаем все лиды используя быстрый метод при работе с большими объемами данных
    $generator = $bx24->fetchLeadList();
    foreach ($generator as $leads) {
        foreach ($leads as $lead) {
            print_r($lead);
        }
    }


} catch (Bitrix24APIException $e) {
    printf('Ошибка (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
} catch (Exception $e) {
    printf('Ошибка (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}