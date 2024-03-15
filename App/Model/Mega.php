<?php
namespace App\Model;
use App\Database\Database;
class Mega{
    private int $id;
    private int $num1;
    private int $num2;
    private int $num3;
    private int $num4;
    private int $num5;
    private int $num6;
    private $conn;
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getNum1(): int
    {
        return $this->num1;
    }
    public function setNum1(int $num1): self
    {
        $this->num1 = $num1;

        return $this;
    }
    public function getNum2(): int
    {
        return $this->num2;
    }
    public function setNum2(int $num2): self
    {
        $this->num2 = $num2;

        return $this;
    }
    public function getNum3(): int
    {
        return $this->num3;
    }
    public function setNum3(int $num3): self
    {
        $this->num3 = $num3;

        return $this;
    }
    public function getNum4(): int
    {
        return $this->num4;
    }
    public function setNum4(int $num4): self
    {
        $this->num4 = $num4;

        return $this;
    }
    public function getNum5(): int
    {
        return $this->num5;
    }
    public function setNum5(int $num5): self
    {
        $this->num5 = $num5;

        return $this;
    }
    
    public function getNum6(): int
    {
        return $this->num6;
    }
    public function setNum6(int $num6): self
    {
        $this->num6 = $num6;

        return $this;
    }
    public function insertMega() {
        $num1=$this->getNum1();
        $num2=$this->getNum2();
        $num3=$this->getNum3();
        $num4=$this->getNum4();
        $num5=$this->getNum5();
        $num6=$this->getNum6();
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