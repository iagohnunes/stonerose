<?php

namespace Src\Controller;

use Src\Service\CustomersService;
use Src\Service\LoginService;
use Util\JsonUtil;
use Util\MessagesUtil;
use Util\ResponseUtil;

class LoginController
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

    public function singIn()
    {
        try {
            $data = $this->loginService->singIn(JsonUtil::bodyRequest());
            return $this->response->sendResponse($data);
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }
}
