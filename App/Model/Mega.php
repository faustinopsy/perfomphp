<?php
namespace App\Model;

class Mega{
    private int $id;
    private int $num1;
    private int $num2;
    private int $num3;
    private int $num4;
    private int $num5;
    private int $num6;

    public function __construct() {}
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
}