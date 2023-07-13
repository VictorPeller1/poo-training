<?php

namespace App\Views;

class View
{
    private array $data = [];
    private string $file;

    public function __construct(array $data, string $file)
    {
        $this->data = $data;
        $this->file = $file;
    }

    public function getTemplate(): string
    {
        return file_get_contents($this->file);
    }

    public function getContentHtml(): string
    {
        $search = array_map(fn ($v) => '{{'.$v.'}}', array_keys($this->data));
        return str_replace($search, array_values($this->data), $this->getTemplate());
    }
}
