<?php

namespace Src\Service;

use Src\Factory\UsersFactory;

class UsersService
{

    private $usersFactory;

    public function __construct()
    {
        $this->usersFactory = new UsersFactory;
    }

    public function getAllUsers()
    {
        return $this->usersFactory->getAllUsers();
    }

    public function getUser($param)
    {
        return $this->usersFactory->getUser($param);
    }

    public function delUser($param)
    {

        $this->usersFactory->delUser($param);
        return 'OK';
    }

    public function createUser($params)
    {
        try {
            if ($params["username"] !== "" && $params["password"] !== "" && $params["email"] !== "") {

                if ($this->checkNewUser($params["email"])) {

                    $pwdsafe = password_hash($params["password"], PASSWORD_DEFAULT);
                    $token_string = $params["email"] . $params["username"];
                    $token_base64 = base64_encode($token_string);
                    $this->usersFactory->createUser($params["username"], $pwdsafe, $params["email"], $token_base64);
                } else {
                    throw new \Exception("alreadyExists");
                }
            } else {
                throw new \Exception("allFieldRequired");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkNewUser($email)
    {
        $allUsers = $this->getAllUsers();
        foreach ($allUsers as $user) {
            if ($user["EMAIL"] == $email) {
                return false;
            }
        }

        return true;
    }

    public function editUser($params)
    {
        try {
            if ($params['id'] !==  "" &&  $params['username'] !==  "" && $params['email'] !==  "" && $params['password'] !==  "") {
                if ($this->checkNewUser($params["email"])) {
                    $this->usersFactory->edituser(intval($params['id']), $params['username'], $params['email'], $params['password']);
                } else {
                    throw new \Exception("alreadyExists");
                }
            } else {
                throw new \Exception("fieldRequired");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
