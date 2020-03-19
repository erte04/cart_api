<?php

namespace Controller;

use Utils\Controller;
use Utils\Response;

class UserController extends Controller
{
    public function getUser($id)
    {

        $response = new Response(['test ' => $id], 201);

        return $response;
    }
}
