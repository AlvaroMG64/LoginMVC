<?php
class Database
{
    private $host = 'localhost';
    private $db_name = 'login-php';
    private $username = 'root';
    private $password = '';
    public $PDO;

    public function getConnection()
    {
        try {
            $this->PDO = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name};charset=utf8",
                $this->username,
                $this->password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Error BD");
        }
        return $this->PDO;
    }
}