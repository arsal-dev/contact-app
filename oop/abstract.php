<?php


// class A
// {
//     protected $num1 = 10;
//     private $num2 = 20;
// }

// class B extends A
// {
//     public function sub()
//     {
//         return $this->num2 - $this->num1;
//     }
// }


// $classA = new A;
// echo $classA->num2;

// $classB = new B;
// echo $classB->sub();


abstract class calculation
{
    public $num1 = 10;
    public $num2 = 20;

    public function add()
    {
        return $this->num2 + $this->num1;
    }

    abstract function sub();
    abstract function multiply();
}


class cal extends calculation
{
    function sub()
    {
        return $this->num1 - $this->num2;
    }

    function multiply()
    {
        return $this->num1 * $this->num2;
    }
}

$classCal = new cal;

echo $classCal->add();
echo '<br>';
echo $classCal->sub();
echo '<br>';
echo $classCal->multiply();
