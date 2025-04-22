<?php

namespace Src\Factory;

use DB\MySQL;

class LoginFactory
{
    private $connection;

    public function __construct()
    {
        $this->connection = new MySQL;
    }

    public function singIn($user)
    {
        $sql = "SELECT USER, ID, EMAIL, USERTOKEN, PWD 
                  FROM users 
                 WHERE EMAIL = '$user'";

        return $this->connection->executeQuery($sql);
    }
}
