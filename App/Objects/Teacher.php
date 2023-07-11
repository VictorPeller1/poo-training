<?php

namespace App\Objects;

class Teacher extends Person
{

    // ----------------------
    // Static
    // ----------------------

    protected static $introduce = "Bonjour, je m'appelle ##firstname## ##lastname## et j'enseigne à l'école ##schoolName## les matières suivantes ##topics##.";

    // ----------------------
    // Instances
    // ----------------------

    private array $topics = [];

    public function __construct(string $firstname, string $lastname, string $schoolName, array $topics = [])
    {
        parent::__construct($firstname, $lastname, $schoolName);
        $this->topics = $topics;
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

    public function setSchool(string $schoolName): void
    {
        $this->schoolName = $schoolName;
    }

    public function getSchool(): string
    {
        return $this->schoolName;
    }

    public function setTopics(array $topics): void
    {
        $this->topics = $topics;
    }

    public function getTopics(): array
    {
        return $this->topics;
    }

    // ----------------------
    // Methods
    // ----------------------

    public function addTopic(string $topic): array
    {
        array_push($this->topics, $topic);
        return $this->topics;
    }

    public function deleteTopic(string $topic): array
    {
        $index = array_search($topic, $this->topics);
        if ($index !== false) {
            unset($this->topics[$index]);
        }
        return $this->topics;
    }

    public function displayTopics(): string
    {
        return implode(' ', $this->topics);
    }

    public function __toString(): string
    {
        return "Bonjour, je m'appelle {$this->firstname} {$this->lastname} et j'enseigne à l'école {$this->schoolName} les matières suivantes : {$this->displayTopics()}.";
    }

    public function introduceMyself(): string
    {
        return self::getIntroduction([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'schoolName' => $this->schoolName,
            'topics' => $this->displayTopics()
        ]);
    }
}
