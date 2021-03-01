<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use App\Bitrix24\Bitrix24API;
use App\Bitrix24\Bitrix24APIException;

try {

    $webhookURL = 'https://wdtest.bitrix24.ru/rest/1/lt04a2sczmqqp2cz/';
    $bx24 = new Bitrix24API($webhookURL);

    // Добавляем новый контакт
    $contactId = $bx24->addContact([
        'NAME'        => 'Митя',
        'COMPANY_ID'  => 333,
        'SECOND_NAME' => 'Васильевич',
        'LAST_NAME'   => 'Фомин',
    ]);
    print_r($contactId);



    // Устанавливаем набор связанных компаний
    $bx24->setContactCompanyItems($contactId, [
        [ 'COMPANY_ID' => 8483 ],
        [ 'CONPANY_ID' => 4094 ]
    ]);

    // Обновляем существующий контакт
    $bx24->updateContact($contactId, [
        'NAME' => 'Фёдор'
    ]);

    // Загружаем контакт по ID вместе со связанными компаниями
    $contact = $bx24->getContact($contactId, [ Bitrix24API::$WITH_COMPANIES ]);
    print_r($contact);

    // Удаляем существующий контакт
    $bx24->deleteContact($contactId);

    // Загружаем все контакты используя быстрый метод при работе с большими объемами данных
    $generator = $bx24->fetchContactList();
    foreach ($generator as $contacts) {
        foreach($contacts as $contact) {
            print_r($contact);
        }
    }

    // Пакетно добавляем контакты
    $contactIds = $bx24->addContacts([
        [
            'NAME'        => 'Владимир',
            'COMPANY_ID'  => 3322,
            'SECOND_NAME' => 'Вадимович',
            'LAST_NAME'   => 'Владимиров'
        ],
        [
            'NAME'        => 'Андрей',
            'COMPANY_ID'  => 1332,
            'SECOND_NAME' => 'Васильевич',
            'LAST_NAME'   => 'Иванов'
        ]
    ]);
    print_r($contactIds);


    // Пакетно удаляем контакты
    $bx24->deleteContacts($contactIds);

} catch (Bitrix24APIException $e) {
    printf('Ошибка (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
} catch (Exception $e) {
    printf('Ошибка (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}