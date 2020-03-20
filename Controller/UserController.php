<?php

namespace Controller;

use Model\User\UserModel;
use Utils\Controller;
use Utils\Response;

class UserController extends Controller
{
    public function postUser()
    {
        // $request = $this->getJsonRequest();
        $User = new UserModel();
        $view = $this->createView('json')->render($User->createUser()->getUsers());

        $response = new Response($view, 200);
        return $response;
    }
}
