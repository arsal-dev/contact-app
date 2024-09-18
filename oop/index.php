<?php

class myClass
{
    public $a = 10;

    public function myFunc()
    {
        return $this->a;
    }
}

$MyCls = new myClass;

// $MyCls->a = 20;

// echo $MyCls->a;

echo $MyCls->myFunc();
