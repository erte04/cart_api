<?php

namespace Controller;

use Model\User\UserModel;
use Utils\Authentication;
use Utils\Controller;
use Utils\Response;

class UserController extends Controller
{
    public function postUser()
    {
        $request = $this->getJsonRequest();
        $Authentication = new Authentication;
        $token = $Authentication->login($request->username, $request->password);

        $view = $this->createView()->render($token);
        $response = new Response($view, 200);
        return $response;
    }
}
