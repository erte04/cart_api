<?php

namespace Utils;

use View\View;

class Controller
{

    private $request;
    private $view;

    public function __construct()
    {
        $this->request = new Request;
    }
    protected function getRequest()
    {
        return $this->request->getRequest();
    }

    protected function getJsonRequest()
    {
        return json_decode($this->request->getRequest());
    }

    protected function createView($type = 'json')
    {
        $view = new View;
        return $view->createView($type);
    }
}
