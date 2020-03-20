<?php

namespace Model\Product;

interface ProductInterface
{
    public function getProducts();
    public function getProductById($id);
}
