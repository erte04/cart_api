<?php

namespace Model\Product;


class ProductJson implements ProductInterface
{
    public function getProducts()
    {
        $products = file_get_contents(__DIR__ . "/../../Data/products.json");
        return json_decode($products, true);
    }

    public function getProductById($id)
    {
        $products  = $this->getProducts();

        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }

        
    }
}
