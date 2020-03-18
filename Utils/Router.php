<?php

namespace Utils;

class Router
{
    private $methods = ['GET', 'POST', 'DELETE', 'PATH', 'PUT'];

    public function route()
    {
        if (in_array($_SERVER['REQUEST_METHOD'], $this->methods)) {
            $route = explode('/', $_SERVER['PATH_INFO']);

                var_dump($route);
        }
    }
}
