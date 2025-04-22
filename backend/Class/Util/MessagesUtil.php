<?php

namespace Util;

class MessagesUtil
{
    public function notAuthenticated()
    {
        return array(
            "status" => array(
                "error" => "User not authenticated"
            )
        );
    }

    public function messageSuccess()
    {
        return array(
            "status" => array(
                "success" => "success"
            )
        );
    }

    public function fieldRequired()
    {
        return array(
            "status" => array(
                "error" => "email and password required"
            )
        );
    }

    public function errorGenericMessage($e)
    {
        return array(
            "status" => array(
                "error" => $e
            )
        );
    }

    public function alreadyExists()
    {
        return array(
            "status" => array(
                "error" => "User already exists"
            )
        );
    }

    public function userNotRegistered()
    {
        return array(
            "status" => array(
                "error" => "User Not Registered"
            )
        );
    }

    public function invalidUserPwd()
    {
        return array(
            "status" => array(
                "error" => "Invalid username or password"
            )
        );
    }

    public function allFieldRequired()
    {
        return array(
            "status" => array(
                "error" => "All fields are required"
            )
        );
    }
}
