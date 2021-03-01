<?php


namespace LinkedinToBitrixImporter;


class Skills
{
    public string $name;
    public string $level;


    public function __construct(array $userSkills)
    {
        $this->name = $userSkills['name'];
        $this->level = $userSkills['level'];

    }
}