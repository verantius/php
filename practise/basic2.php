<?php

function check ($x,$y)
{
    $d=$x+$y;
    if ($x==30 || $y==30)   
        return true;
    else if ($d == 30)
        return true;
    else
        return false;
}

var_dump( check(30,0))."<br>";
var_dump( check(25,5))."<br>";
var_dump( check(20,30))."<br>";
var_dump( check(20,25))."<br>";

echo "<br>";

//--------------------------------
function check2 ($x,$y)
{
    return ( ($x==30)||($y==30)||($x+$y==30) );
}
var_dump( check2(30,0))."<br>";
var_dump( check2(25,5))."<br>";
var_dump( check2(20,30))."<br>";
var_dump( check2(20,25))."<br>";

?>