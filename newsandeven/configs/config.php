<?php
class DBConnect
{
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbName = 'newsandeven';

    public function connect()
    {
        try {
            $dsn = "mysql:host={$this->hostname};dbname={$this->dbName};charset=UTF8";
            $pdo = new PDO($dsn, $this->username, $this->password);
            if ($pdo) {
                return $pdo;
            }
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }

    }
}

