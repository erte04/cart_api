<?php

namespace Utils;

class Request
{

    public function getRequest()
    {
        return file_get_contents("php://input");
    }
}
