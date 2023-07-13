<?php

namespace App\Models;

class Product extends Model
{
    public function getAll()
    {
        $query = self::$connection->prepare("SELECT `ref_product`, `name_product`, `price`FROM `product` ORDER BY `ref_product`;");
        $query->execute();
        return $query->fetchAll();
    }

    public function find(int $id):array
    {
        $query = self::$connection->prepare("SELECT `ref_product`, `name_product`, `price`FROM `product` WHERE `ref_product` = :id;");
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch();
    }
}
