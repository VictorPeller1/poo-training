<?php

namespace App\Controllers;

use App\Models\Product;
use App\Views\Page;
use App\Views\ProductAdd;
use App\Views\ProductPage;

class ProductController
{

    public function index(): void
    {
        $product = new Product();
        $data = $product->getAll();
        $page = new Page([
            'title' => 'Mes Produits',
            'mainTitle' => 'Mes Produits',
            'content' => implode('<br>', array_map(fn ($p) => '<a href="test.php?action=show&id=' . $p['ref_product'] . '" >' . $p['name_product'] . '</a>', $data)),
        ]);

        $page->display();
    }

    public function create(): void
    {
        $form = new ProductAdd([]);

        $page = new Page([
            'title' => 'Mes Produits',
            'mainTitle' => 'Mes Produits',
            'content' => $form->getContentHtml(),
        ]);
        $page->display();
    }

    public function show(int $id): void
    {
        $product = new Product();

        $productPage = new ProductPage($product->find($id));

        $page = new Page([
            'title' => 'Mes Produits',
            'mainTitle' => 'Mes Produits',
            'content' => $productPage->getContentHtml(),
        ]);
        $page->display();
    }
}
