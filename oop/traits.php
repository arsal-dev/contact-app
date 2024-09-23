<?php


trait myTrait
{
    public function hello()
    {
        return 'hello!';
    }
}


class A
{
    use myTrait;
}

class B
{
    use myTrait;
}


$classB = new B;
echo $classB->hello();
