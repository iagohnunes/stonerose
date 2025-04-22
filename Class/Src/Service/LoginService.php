<?php

namespace Src\Service;

use Src\Factory\LoginFactory;
use Util\Session;

class LoginService
{

    private $loginFactory;

    private $startSession;

    public function __construct()
    {
        $this->loginFactory = new LoginFactory;
        $this->startSession = Session::start();
    }

    public function singIn($params)
    {
        try {

            if ($params["username"] !== "" && $params["password"] !== "") {

                $user = $this->loginFactory->singIn($params["username"]);
                
                if (password_verify($params["password"], $user[0]["PWD"])) {
                    unset($user[0]['PWD']);
                } else {
                    throw new \Exception("invalidUserPwd");
                }
            } else {
                throw new \Exception("fieldRequired");
            }

            if (!empty($user[0])) {
                $this->startSession;
                $_SESSION['TOKEN'] = $user[0]['USERTOKEN'];
                $_SESSION["USERNAME"] = $user[0]["USER"];
                return $user;
            }

            throw new \Exception("userNotRegistered");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
