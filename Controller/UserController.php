<?php

namespace Controller;

use Utils\Controller;

class UserController extends Controller
{
    public function getUser($id)
    {
        return ['test ' => $id];
    }
}
