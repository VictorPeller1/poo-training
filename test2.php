<?php

spl_autoload_register();

use App\Views\View;

$p = new View([
    'title' => 'Una utre titre',
    'title2' => 'Una utre titre',
],
'App/Templates/page.html');

echo $p->getContentHtml();