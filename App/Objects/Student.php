<?php

namespace App\Objects;

use DateTime;

class Student extends Person
{
    private DateTime $birthdate;
    private string $grade;

    public function __construct(string $firstname, string $lastname, string $schoolName, DateTime $birthdate, string $grade)
    {
        parent::__construct($firstname, $lastname, $schoolName);
        $this->birthdate = $birthdate;
        $this->grade = $grade;
    }

    // ----------------------
    // Getters and Setters
    // ----------------------


    public function setBirthdate(DateTime $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function getBirthdate(): DateTime
    {
        return $this->birthdate;
    }

    public function setGrade(string $grade): void
    {
        $this->grade = $grade;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }


    // ----------------------
    // Methods
    // ----------------------
    

    public function __toString(): string
    {
        return 'Bonjour, je m\'appelle ' . $this->firstname . ' ' . $this->lastname . ', j\'ai ' . $this->getAge() . ' ans et je vais à l\'école ' . $this->schoolName . ' en class de ' . $this->grade . '.';
    }

    public function getAge(): int
    {
        return $this->birthdate->diff(new DateTime)->y;
        // return $this->birthdate->diff(new DateTime)->format('%y');
    }
}