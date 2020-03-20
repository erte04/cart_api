<?php

namespace Controller;

use Model\Product\ProductModel;
use Utils\Controller;
use Utils\Response;

class ProductController extends Controller
{

    public function getProduct()
    {

        $Product = new ProductModel();
        $view = $this->createView()->render($Product->createProduct()->getProducts());

        $response = new Response($view, 200);
        return $response;
    }
}
