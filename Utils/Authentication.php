<?php

namespace Utils;

class Authentication
{
    public function login($Users)
    {
        $LoginSuccessful = false;

        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {

            $Username = $_SERVER['PHP_AUTH_USER'];
            $Password = $_SERVER['PHP_AUTH_PW'];

            foreach ($Users as $User) {
                if ($Username == $User['username'] && $Password == $User['password']) {
                    $LoginSuccessful = true;
                }
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
