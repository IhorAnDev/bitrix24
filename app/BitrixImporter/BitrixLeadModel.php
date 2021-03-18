<?php

namespace LinkedinToBitrixImporter\BitrixImporter;

use LinkedinToBitrixImporter\InternalModels\LinkedinProfile;

class BitrixLeadModel
{
    /**
     * @var LinkedinProfile
     */
    private LinkedinProfile $linkedinProfile;
    private array $bitrixLead;

    public function setLinkedinProfile(LinkedinProfile $linkedinProfile)
    {
        $this->linkedinProfile = $linkedinProfile;
        $this->bitrixLead = [
            'UF_CRM_1593696871' => $this->linkedinProfile->getIdVacancy(),
            'TITLE' => '',
            'NAME' => $this->linkedinProfile->getName(),
            'LAST_NAME' => $this->linkedinProfile->getSurname(),
            'SECOND_NAME' => '',
            'PHONE' => [
                [
                    'VALUE' => $this->linkedinProfile->getPhone(),
                    'VALUE_TYPE' => 'WORK',
                ]
            ],
            'COMPANY_TITLE' => $this->linkedinProfile->getLabel(),
            'EMAIL' => [
                [
                    'VALUE' => '',
                    'VALUE_TYPE' => 'WORK',
                ]
            ],
            'POST' => '',
        ];

    }


    public function getBitrixLead()
    {
        return $this->bitrixLead;
    }
}
