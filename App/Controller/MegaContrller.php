<?php
namespace App\Controller;

use App\Database\Database;

class MegaController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function insertMega($mega) {
        $query = "INSERT INTO Mega (num1, num2, num3, num4, num5, num6) VALUES (:num1, :num2, :num3, :num4, :num5, :num6)";

        $stmt = $this->conn->prepare($query);

        // bind values
        $stmt->bindParam(":num1", $mega->getNum1());
        $stmt->bindParam(":num2", $mega->getNum2());
        $stmt->bindParam(":num3", $mega->getNum3());
        $stmt->bindParam(":num4", $mega->getNum4());
        $stmt->bindParam(":num5", $mega->getNum5());
        $stmt->bindParam(":num6", $mega->getNum6());

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
?>
