<?php

namespace Controller;

use Utils\Controller;
use Utils\Request;
use Utils\Response;

class UserController extends Controller
{
    public function getUser($id)
    {
        $request = $this->getJsonRequest();
        $view = $this->createView('json')->render($request);
        $response = new Response($view, 201);
        return $response;
    }
}
