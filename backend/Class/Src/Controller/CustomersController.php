<?php

namespace Src\Controller;

use Src\Service\CustomersService;
use Src\Service\LoginService;
use Util\JsonUtil;
use Util\MessagesUtil;
use Util\ResponseUtil;

class CustomersController
{
    private $loginService;

    private $messages;

    private $response;

    private $customerService;

    public function __construct()
    {
        $this->loginService = new LoginService;
        $this->customerService = new CustomersService;
        $this->messages = new MessagesUtil;
        $this->response = new ResponseUtil;
    }

    public function getAllCustomers()
    {
        try {

            $this->response->sendResponse($this->customerService->getAllCustomers());
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }

    public function newCustomer($params)
    {
        try {
            $this->customerService->newCustomer($params);
            return $this->response->sendResponse($this->messages->messageSuccess());
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }
}
