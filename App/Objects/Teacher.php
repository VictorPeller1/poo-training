<?php

namespace App\Objects;


class Teacher extends Person
{

    // ----------------------
    // Static
    // ----------------------

    protected static $introduce = "Bonjour, je m'appelle ##firstname## ##lastname## et j'enseigne à l'école ##school## les matières suivantes ##topics##.";

    // ----------------------
    // Instances
    // ----------------------

    private array $topics = [];

    public function __construct(string $firstname, string $lastname, School $school, array $topics = [])
    {
        parent::__construct($firstname, $lastname, $school);
        $this->topics = $topics;
    }

    // ----------------------
    // Getters and Setters
    // ----------------------

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
        return "Bonjour, je m'appelle {$this->firstname} {$this->lastname} et j'enseigne à l'école {$this->school->getName()} les matières suivantes : {$this->displayTopics()}.";
    }

    public function introduceMyself(): string
    {
        return self::getIntroduction([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'schoolName' => $this->school->getName(),
            'topics' => $this->displayTopics()
        ]);
    }
}
