<?php

namespace App\Objects;

class Person
{
    protected string $firstname;
    protected string $lastname;
    protected string $schoolName;

    public function __construct(string $firstname, string $lastname, string $schoolName)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->schoolName = $schoolName;
    }

    // ----------------------
    // Getters and Setters
    // ----------------------

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getSchoolName(): string
    {
        return $this->schoolName;
    }

    public function setSchoolName(string $schoolName): void
    {
        $this->schoolName = $schoolName;
    }
}
