<?php

namespace DB;

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $driver = getenv('DB_DRIVER'); // 'mysql' ou 'pgsql'
        $host = getenv('DB_HOST');
        $dbname = getenv('DB_NAME');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASS');
        $port = getenv('DB_PORT') ?: '5432';

        try {
            $dsn = "$driver:host=$host;port=$port;dbname=$dbname";
            $this->connection = new \PDO($dsn, $user, $password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
    }

    public function executeQuery($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function executeStatement($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($params);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
