<?php

namespace LinkedinToBitrixImporter\BitrixImporter;

use App\Bitrix24\Bitrix24API;

class BitrixSync
{
    private Bitrix24API $bitrixSDK;
    private BitrixLeadModel $bitrixModel;

    public function __construct(
        Bitrix24API $bitrixSDK,
        BitrixLeadModel $bitrixModel
    )
    {
        $this->bitrixSDK = $bitrixSDK;
        $this->bitrixModel = $bitrixModel;
    }

    public function sync()
    {
        $this->bitrixSDK->addLead(
            $this->bitrixModel->getBitrixLead()
        );
    }
}
