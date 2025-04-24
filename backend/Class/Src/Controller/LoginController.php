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
            
            error_log(json_encode(JsonUtil::bodyRequest()));
            $data = $this->loginService->singIn(JsonUtil::bodyRequest());
            error_log(json_encode($data));
            return $data;
        } catch (\Throwable $th) {
            $e = $th->getMessage();
            return $this->response->sendResponse($this->messages->$e());
        }
    }
}
