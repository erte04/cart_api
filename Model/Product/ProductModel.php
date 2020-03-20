<?php

namespace Model\Product;

use Config;
use Utils\Model;

class ProductModel extends Model implements ProductFactory
{
    private $dataType;

    public function __construct()
    {
        $Config = new Config;
        $this->dataType = $Config::db;
    }

    public function createProduct()
    {
        if ($this->dataType == 'json') {
            return new ProductJson;
        } else {
            /// database
        }
    }
}
