<?php

namespace App\Objects;

abstract class Person
{

    // ----------------------
    // Static
    // ----------------------

    protected static $introduce = 'Bonjour, je m\'appelle ##firstname## ##lastname##.';


    public static function getIntroduction(array $datas): string
    {
        $search = array_map(fn ($v) => "##$v##", array_keys($datas));
        return str_replace($search, array_values($datas), static::$introduce);
    }

    // ----------------------
    // Instances
    // ----------------------

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

    // ----------------------
    // Methods
    // ----------------------

    public function introduceMyself(): string
    {
        return self::getIntroduction([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname
        ]);
    }
}
