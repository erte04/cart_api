<?php

namespace Model;

use Config;
use Utils\Model;

class UserModel extends Model implements UserFactory
{
    private $dataType;

    public function __construct()
    {
        $Config = new Config;
        $this->dataType = $Config::db;
    }

    public function createUser()
    {
        if ($this->dataType == 'json') {
            return new UserJson;
        } else {
            /// database
        }
    }
}
