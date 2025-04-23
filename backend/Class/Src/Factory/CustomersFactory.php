<?php

namespace Src\Factory;

use DB\Database;

class CustomersFactory
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database;
    }

    public function getAllCustomers()
    {
        $sql = "SELECT id, name, last_name, zip_code, email, address, tel
                  FROM customers";

        return $this->connection->executeQuery($sql);
    }

    public function newCustomer($name, $lastName, $address, $zipCode, $email = null, $tel = 0)
    {

        $sql = "INSERT INTO customers (name, last_name, address, zip_code, email, tel) 
                     VALUES ('$name', '$lastName', '$address', '$zipCode', '$email', '$tel')";

        $this->connection->executeStatement($sql);
    }
}
