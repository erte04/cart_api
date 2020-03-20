<?php

namespace Utils;

use Exception;
use Model\User\UserModel;
use Utils\Request;

class Router
{
    private $allowMethods = ['GET', 'POST', 'DELETE', 'PATH', 'PUT', 'OPTIONS'];
    private $paths;
    private $reqMethod;

    public function route()
    {
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];
        if (in_array($this->reqMethod, $this->allowMethods)) {
            $this->paths = explode('/', $_SERVER['PATH_INFO']);
            $controllerClass = "Controller\\" . ucfirst($this->paths[1]) . 'Controller';

            try {
                header('Access-Control-Allow-Origin: http://localhost:8080');
                header("Access-Control-Allow-Credentials: true");
                header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
                header('Access-Control-Allow-Headers: Authorization, Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers');
                if ($this->reqMethod == 'OPTIONS') {
                    header("HTTP/1.1 200 OK");
                    exit;
                }
                $this->loadMethod($controllerClass);
            } catch (Exception $e) {
                echo 'Message: ' . $e->getMessage();
            }
        } else {
            header("HTTP/1.0 405 Method Not Allowed");
            return false;
        }
    }

    private function loadMethod($controllerClass)
    {
        if (class_exists($controllerClass)) {
            $class = new $controllerClass;
            $classMethod = strtolower($this->reqMethod) . ucfirst($this->paths[1]);
            $params = array_slice($this->paths, 2);

            $Authentication = new Authentication;
            if ($Authentication->checkLogin() || ($controllerClass == 'Controller\UserController' && $classMethod == "postUser")) {

                $class->$classMethod(...$params);
            }
        } else {
            throw new Exception("Class " . $controllerClass . " not found");
        }

        return true;
    }
}
