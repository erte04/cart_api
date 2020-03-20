<?php

namespace Utils;

use Exception;
use Model\User\UserModel;
use Utils\Request;

class Router
{
    private $allowMethods = ['GET', 'POST', 'DELETE', 'PATH', 'PUT'];
    private $paths;
    private $reqMethod;

    public function route()
    {
        $this->reqMethod = $_SERVER['REQUEST_METHOD'];
        if (in_array($this->reqMethod, $this->allowMethods)) {
            $this->paths = explode('/', $_SERVER['PATH_INFO']);
            $controllerClass = "Controller\\" . ucfirst($this->paths[1]) . 'Controller';

            try {
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
            $UserModel = new UserModel();
            $Authentication->login($UserModel->createUser()->getUsers());

            $class->$classMethod(...$params);
        } else {
            throw new Exception("Class " . $controllerClass . " not found");
        }

        return true;
    }
}
