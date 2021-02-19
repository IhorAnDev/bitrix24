<?php

namespace App;

class Education
{
    public string $institution;
    public string $area;
    public string $studyType;
    public string $startDate;
    public string $endDate;


    public function __construct(array $education)
    {
        $this->institution = $education['institution'];
        $this->area = $education['area'];
        $this->studyType = $education['studyType'];
        $this->startDate = $education['startDate'];
        $this->endDate = $education['endDate'];
    }

}