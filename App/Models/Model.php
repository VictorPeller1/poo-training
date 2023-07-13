<?php

namespace App\Models;

use PDO;
use Exception;

abstract class Model {
    protected static ?PDO $connection = null;

    public function __construct() {
        if (self::$connection instanceof PDO) return;
        
        try {
            self::$connection = new PDO(
                "mysql:host=localhost;dbname=ecom;charset=utf8",
                "phpgroot",
                "123456"
            );
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Unable to connect to the database. ' . $e->getMessage());
        }
    }
}