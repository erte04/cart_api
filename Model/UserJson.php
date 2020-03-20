<?php

namespace Model;


class UserJson implements UserInterface
{
    public function getUsers()
    {
        $users = file_get_contents(__DIR__ . "/../Data/users.json");
        return json_decode($users, true);
    }
}
