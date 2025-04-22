<?php

namespace Src\Factory;

use DB\MySQL;

class UsersFactory
{
    private $connection;

    public function __construct()
    {
        $this->connection = new MySQL;
    }

    public function getAllUsers()
    {

        $sql = "SELECT ID, USER, EMAIL
                  FROM users 
              ORDER BY USER";

        return $this->connection->executeQuery($sql);
    }

    public function getuser($param)
    {

        $sql = "SELECT ID, USER, EMAIL
                  FROM users
                  WHERE ID = $param";

        return $this->connection->executeQuery($sql);
    }

    public function delUser($param)
    {
        $sql = "DELETE FROM users 
                      WHERE ID = $param";

        $this->connection->executeStatement($sql);
    }

    public function createUser($user, $pwd, $email, $token)
    {

        $sql = "INSERT INTO users (EMAIL, USER, PWD, USERTOKEN) 
                     VALUES ('$email', '$user', '$pwd', '$token')";

        $this->connection->executeStatement($sql);
    }


    public function editUser($id, $user, $email, $pwd)
    {
        $sql = "UPDATE users 
                   SET USER  = '$user', 
                        PWD  = '$pwd', 
                       EMAIL = '$email'
                 WHERE ID    = $id ";
        
        $this->connection->executeStatement($sql);
    }
}
