<?php

namespace Src\Service;

use Src\Factory\CustomersFactory;
use Util\Session;

class CustomersService
{
    private $customersFactory;

    public function __construct()
    {
        $this->customersFactory = new CustomersFactory;
        //$this->startSession = Session::start();
    }

    public function getAllCustomers()
    {
        return $this->customersFactory->getAllCustomers();
    }

    public function newCustomer($params)
    {
        try {
            if ($params["nome"] !== "" && $params["endereco"] !== "") {
                $this->customersFactory->newCustomer(
                    $params["nome"],
                    $params["lastName"],
                    $params["endereco"],
                    $params["zipCode"],
                    $params["email"],
                    $params["tel"]
                );
            } else {
                throw new \Exception("allFieldRequired");
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
