<?php

namespace LinkedinToBitrixImporter;

class LinkedinProfile
{

    protected string $name;
    protected string $label;
    protected string $email;
    protected string $phone;
    protected string $website;
    protected string $summary;

    /** @var Work[] $works */
    protected array $works;

    /** @var Education[] $educations */
    protected array $educations;

    /** @var Skills[] $skills */
    protected array $skills;

    private array $userData;

    public function __construct(array $userArray)
    {
        $this->userData = $userArray['basics'];
        $this->setWorks($userArray['work']);
        $this->setEducation($userArray['education']);
        $this->setSkills($userArray['skills']);
        $this->setNewUserArray();
    }

    protected function setNewUserArray(): self
    {
        $this->name = $this->userData['name'] ?? '';
        $this->label = $this->userData['label'] ?? '';

        $this->email = isset($this->userData['email'], $this->userData['email'])
            ? $this->userData['email']
            : '';

        $this->summary = isset($this->userData['summary'], $this->userData['summary'])
            ? $this->userData['summary']
            : '';

        $this->phone = isset($this->userData['phone'], $this->userData['phone'])
            ? $this->userData['phone']
            : '';
        $this->website = isset($this->userData['website'], $this->userData['website'])
            ? $this->userData['website']
            : '';

        return $this;
    }

    protected function setWorks(array $works): void
    {

        foreach ($works as $work) {
            $this->works[] = new Work($work);
        }
    }

    protected function setEducation(array $educations): void
    {
        foreach ($educations as $education) {
            $this->educations[] = new Education($education);
        }
    }

    protected function setSkills(array $skills): void
    {

        foreach ($skills as $userSkills) {
            $this->skills[] = new Skills($userSkills);
        }
    }

}