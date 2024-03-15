<?php
namespace App\Repository;

use App\Database\Database;
use App\Model\Mega;
use PDO;
class MegaRepository {
    private $conn;

    public function __construct() {
        $this->conn = Database::getInstance();
    }

    public function insertMega(Mega $mega) {
        $num1=$mega->getNum1();
        $num2=$mega->getNum2();
        $num3=$mega->getNum3();
        $num4=$mega->getNum4();
        $num5=$mega->getNum5();
        $num6=$mega->getNum6();
        $query = "INSERT INTO Mega (num1, num2, num3, num4, num5, num6) VALUES (:num1, :num2, :num3, :num4, :num5, :num6)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":num1", $num1);
        $stmt->bindParam(":num2", $num2);
        $stmt->bindParam(":num3", $num3);
        $stmt->bindParam(":num4", $num4);
        $stmt->bindParam(":num5", $num5);
        $stmt->bindParam(":num6", $num6);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
    public function getAll() {
        $query = "SELECT * FROM Mega";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById(Mega $mega) {
        $id = $mega->getId();
        $query = "SELECT * FROM Mega WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id , PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
