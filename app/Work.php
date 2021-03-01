<?php

namespace LinkedinToBitrixImporter;

class Work
{
    public string $company;
    public string $endDate;
    public string $position;
    public string $startDate;
    public string $summary;
    public string $website;


    public function __construct(array $work)
    {
        $this->company = $work['company'];
        $this->endDate = $work['endDate'];
        $this->position = $work['position'];
        $this->startDate = $work['startDate'];
        $this->summary = isset($this->$work['summary'], $this->$work['summary'])
            ? $this->$work['summary']
            : '';
        $this->website = $work['website'];
    }

}
