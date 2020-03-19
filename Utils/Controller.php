<?php

namespace Utils;

class Controller
{

    private $request;

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
}
