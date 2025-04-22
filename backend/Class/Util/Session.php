<?php

namespace Util;

class Session
{

    public static $sessionExpiration;

    public static function start()
    {
        session_start();
        $_SESSION['lastActivity'] = time();
        self::$sessionExpiration = 1800;
    }

    public function verifySession()
    {
        if (isset($_SESSION['lastActivity']) && time() - $_SESSION['lastActivity'] > $this->sessionExpiration) {
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit();
        }
        $_SESSION['lastActivity'] = time();
    }

    public function validateToken()
    {

        $this->verifySession();
        $headers = getallheaders();
        if (isset($headers['Authorization'])) {
            $authorizationHeader = $headers['Authorization'];
            $matches = array();

            if (preg_match('/Bearer\s(\S+)/', $authorizationHeader, $matches)) {
                $token = $matches[1];
            }

            if ($token === $_SESSION["TOKEN"]) {
                return true;
            }
            return false;
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        exit();
    }
}
