<?php

namespace Engine\Core\Database;

use PDO;

class DBQuery
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect():void
    {
        $config = require APP_DIR . '/engine/Config/database.php';
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset=utf8";
            $this->pdo = new \PDO($dsn, $config['username'], $config['password']);
        } catch (\Exception $e) {
            echo "Connection failed {$e->getMessage()}";
        }
    }

    public function execute(string $sql) 
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function query(string $sql, array $params = []):array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $data ?? [];
    }

}