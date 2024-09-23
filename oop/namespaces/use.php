<?php

include './first.php';
include './second.php';

second\myFunction();
first\myFunction();

$etst = new first\test;
print_r($etst);


$newObj = new second\test;
print_r($newObj);
