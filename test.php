<?php
spl_autoload_register();

use App\Views\View;

// $content = file_get_contents('App/Templates/page.html');

$datas = [
    'title' => 'Le titre de la page',
    'title2' => 'Hello Word azr aze z',
    'text' => 'Coucou les gens !'
];

// $search = array_map(fn ($v) => '{{'.$v.'}}', array_keys($datas));
// $content = str_replace($search, array_values($datas), $content);

// echo $content;

$page = new View($datas, 'App/Templates/page.html');

echo $page->getContentHtml();