<?php

namespace App\Views;

class View
{
    // ----------------------
    // Static
    // ----------------------

    protected static string $file;
    protected const PATH = 'App/Templates';

    private static function setFile(string $file): void
    {
        static::$file = $file;
    }

    // ----------------------
    // Instances
    // ----------------------

    private array $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    // ----------------------
    // Getters and Setters
    // ----------------------

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getFile(): string
    {
        return self::PATH . '/' . static::$file;
    }

    // ----------------------
    // Methods
    // ----------------------

    public function addData(string $key, string $content): void
    {
        $this->data[$key] = $content;
    }


    public function getTemplate(): string
    {
        return file_get_contents($this->getFile());
    }

    public function getContentHtml(): string
    {
        $search = array_map(fn ($v) => '{{' . $v . '}}', array_keys($this->data));
        return str_replace($search, array_values($this->data), $this->getTemplate());
    }

    public function display(): void
    {
        echo $this->getContentHtml();
    }
}
