<?php

namespace Controller;

use Utils\Controller;

class UserController extends Controller
{
    public function getUser($id)
    {
        echo 'test: '.$id;
    }
}
