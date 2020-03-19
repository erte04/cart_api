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

        $response = new Response($request, 201);
        return $response;
    }
}
