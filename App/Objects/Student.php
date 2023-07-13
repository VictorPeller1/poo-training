<?php

namespace App\Objects;

use DateTime;

class Student extends Person
{

    // ----------------------
    // Static
    // ----------------------

    protected static $introduce = 'Bonjour, je m\'appelle ##firstname## ##lastname## , j\'ai ##age## ans et je vais à l\'école ##schoolName## en classe de ##grade##.';

    // ----------------------
    // Instances
    // ----------------------

    private DateTime $birthdate;
    private string $grade;

    public function __construct(string $firstname, string $lastname, School $school, DateTime $birthdate, string $grade)
    {
        parent::__construct($firstname, $lastname, $school);
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

    public function setGrade(string $grade): bool
    {
        if ($this->school->isGradeInSchool($grade)) {
            $this->grade = $grade;
            return true;
        }
        return false;
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
        return 'Bonjour, je m\'appelle ' . $this->firstname . ' ' . $this->lastname . ', j\'ai ' . $this->getAge() . ' ans et je vais à l\'école ' . $this->school->getName() . ' en class de ' . $this->grade . '.';
    }

    public function getAge(): int
    {
        return $this->birthdate->diff(new DateTime)->y;
        // return $this->birthdate->diff(new DateTime)->format('%y');
    }

    public function introduceMyself(): string
    {
        return self::getIntroduction([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'age' => $this->getAge(),
            'schoolName' => $this->school->getName(),
            'grade' => $this->grade
        ]);
    }
}
