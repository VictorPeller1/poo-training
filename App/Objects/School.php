<?php

namespace App\Objects;

class School
{

    // ----------------------
    // Static
    // ----------------------

    protected static array $grades = [];

    public static function getGrades(): array
    {
        return static::$grades;
    }

    public static function isGradeInSchool(string $gradeName):bool {
        return array_search($gradeName, static::$grades);
    }

    // ----------------------
    // Instances
    // ----------------------

    protected string $name;
    protected string $city;


    public function __construct(string $name, string $city)
    {
        $this->name = $name;
        $this->city = $city;
    }

    // ----------------------
    // Getters and Setters
    // ----------------------

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }
}
