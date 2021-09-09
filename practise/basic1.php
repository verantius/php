<?php

// echo "no to piszemy"."<br>";

// $n=0;
// echo "n wynosi '$n'"."<br>";

// if ($n<=51)
// {
//     $d = 51 - $n;
// }
// else if ($n>51) 
// {
//     $d = 51 - $n;
//     $d=3*$d;
    
// }
// $d=abs($d);
// echo "wynik wynosi '$d'"."<br>";

function test51 ($x)
{
    $p1=51;

    if($x>$p1)
        return abs(3*($x-$p1));
    else
        return abs($x-$p1);
    
}

echo test51(53)."<br>";
echo test51(30)."<br>";
echo test51(51)."<br>";



?>