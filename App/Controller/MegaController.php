<?php
namespace App\Controller;

use App\Database\Database;

class MegaController {
    private $conn;
    private $mega;
    public function __construct($mega) {
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->mega = $mega;
    }

    public function insertMega() {
        $num1=$this->mega->getNum1();
        $num2=$this->mega->getNum2();
        $num3=$this->mega->getNum3();
        $num4=$this->mega->getNum4();
        $num5=$this->mega->getNum5();
        $num6=$this->mega->getNum6();
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
}
?>
