<?php

namespace LinkedinToBitrixImporter;


class ArrayClass
{
    public array $leadField = [
        'TITLE' => 'My Lead',
        'NAME' => 'Egor',
        'LAST_NAME' => 'Popov',
        'SECOND_NAME' => 'Fedorovich',
        'PHONE' => array([
            'VALUE' => '+380968080845',
            'VALUE_TYPE' => 'WORK']),
        'COMPANY_TITLE' => 'Velicio',
        'ID' => '23',
        'EMAIL' => array([
            'VALUE' => 'daassasassasasasd@asdsa.com',
            'VALUE_TYPE' => 'WORK']),
        'POST' => 'Junior'
    ];

    public function setArray()
    {
        return $this->leadField;
    }

}

