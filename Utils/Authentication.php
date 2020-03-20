<?php

namespace Utils;

use Model\User\UserModel;

class Authentication
{
    public function login($username, $password)
    {
        $LoginSuccessful = false;
        $User = new UserModel();
        $Users = $User->createUser()->getUsers();

        foreach ($Users as $User) {
            if ($username == $User['username'] && $password == $User['password']) {
                $token = sha1(mt_rand(1, 90000) . 'SALT');;
                $refreshToken = sha1(mt_rand(1, 90000) . 'SALT');
                $jsonToken = json_encode(['token' => $token, 'refresh_token' => $refreshToken]);
                $file = fopen(__DIR__ . '/../Data/token.json', 'w');
                fwrite($file, $jsonToken);
                fclose($file);
                return ['token' => $token, 'refresh_token' => $refreshToken];
            }
        }

        if (!$LoginSuccessful) {
            header('WWW-Authenticate: Basic realm="Secret page"');
            header('HTTP/1.0 401 Unauthorized');

            print "Login failed!\n";
            exit;
        }
    }
}
