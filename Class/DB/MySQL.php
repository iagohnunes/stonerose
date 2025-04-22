<?php

namespace DB;

class MySQL
{
    public function beginTransaction()
    {

        $connectionDb = new \mysqli(HOSTNAME, USER, PASSWORD, DATABASE);
        if ($connectionDb->connect_errno) {
            return "Failed to connect: (" . $connectionDb->connect_errno . " ) " . $connectionDb->connect_error;
        }
        return $connectionDb;
    }

    public function executeQuery($sql)
    {
        $connection = $this->beginTransaction();
        $data = [];
        $sql_query =  $connection->query($sql) or die("Execution failure: " . $connection->error);
        $validate = $sql_query->num_rows;

        if ($validate == 1) {
            array_push($data, $sql_query->fetch_assoc());
            return $data;
        }

        if ($validate > 1) {
            $data = $sql_query->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
    }

    public function executeStatement($sql)
    {
        $connection = $this->beginTransaction();
        $connection->query($sql) or die("Falha na execução " . $connection->error);
    }
}
