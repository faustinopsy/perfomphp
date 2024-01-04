<?php
namespace App\Database;
use PDO;
use PDOException;
class Database {
    private $host = 'localhost';
    private $db_name = 'a01_teste';
    private $username = 'root';
    private $password = 'root123';
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password, [
                PDO::ATTR_PERSISTENT => true
            ]);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}