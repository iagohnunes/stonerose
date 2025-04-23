<?php

namespace Src\Factory;

use DB\Database;

class EstimatesFactory
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Database;
    }

    public function newEstimate($name, $last_Name, $address, $zip_code, $email = null, $contact = 0, $datetime, $status)
    {   
        $sql = "INSERT INTO estimates (NAME, LAST_NAME, ADDRESS, ZIP_CODE, EMAIL, CONTACT, DATETIME, STATUS) 
                     VALUES ('$name', '$last_Name', '$address', '$zip_code', '$email', '$contact', '$datetime', '$status')";
    
        $this->connection->executeStatement($sql);
    }

    public function getAllEstimates()
    {
        $sql = "SELECT NAME, LAST_NAME, ADDRESS, ZIP_CODE, EMAIL, CONTACT, DATETIME, STATUS
                  FROM estimates";

        return $this->connection->executeQuery($sql);
    }
}
