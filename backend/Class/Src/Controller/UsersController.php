<?php

namespace Src\Controller;

use Src\Service\UsersService;
use Util\MessagesUtil;
use Util\ResponseUtil;

class UsersController
{
    private $usersService;

    private $messages;

    private $response;

    public function __construct()
    {
        $this->usersService = new UsersService;
        $this->messages = new MessagesUtil;
        $this->response = new ResponseUtil;
    }


    public function getAllUsers()
    {
        try {
            $data = $this->usersService->getAllUsers();

            return $this->response->sendResponse($data);
        } catch (\Throwable $th) {
            return $this->messages->errorGenericMessage($th);
        }
    }

    public function delUser($params)
    {
        try {
            $this->usersService->delUser($params);
            return $this->response->sendResponse($this->messages->messageSuccess());
        } catch (\Throwable $th) {
            return $this->messages->errorGenericMessage($th);
        }
    }

    public function createUser($params)
    {
        try {
            $this->usersService->createUser($params);
            return $this->response->sendResponse($this->messages->messageSuccess());
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }

    public function getUser($params)
    {
        try {
            $data = $this->usersService->getUser($params);
            return $this->response->sendResponse($data);
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }

    public function editUser($params)
    {
        try {
            $this->usersService->editUser($params);
            return $this->response->sendResponse($this->messages->messageSuccess());
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }
}
