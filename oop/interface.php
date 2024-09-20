<?php


interface A
{
    function add();
}

interface B
{
    function sub();
}

class C implements A, B
{
    function add()
    {

    }

    fucntion sub()
    {
        
    }
}
