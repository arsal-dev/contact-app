<?php

class A
{
    public static $num = 10;
    public static $num2 = 10;
    public $num3 = 10;

    public static function show()
    {
        return self::$num;
    }
}

class B extends A
{
    public function showNumber()
    {
        return parent::$num;
    }
}

// $classB = new B;
// echo $classB->showNumber();

// echo A::$num;
// echo A::show();
