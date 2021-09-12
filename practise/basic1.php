<?php
function test51 ($x)
{
    $p1=51;

    if($x>$p1)
        return abs(3*($x-$p1));
    else
        return abs($x-$p1);    
}
function spaceX ($y)
{
    $p=0;
    
    for($i=0; $i<strlen($y); $i++)
    {
        $y1=substr($y,$i,1);
        if ($y1==" ")
        {
            $p++;
        }
    }
    return $p;
}
//funkcja 1
echo test51(53)."<br>";
echo test51(30)."<br>";
echo test51(51)."<br>";
//funkcja 2
$y="rom an a";
echo "Ilosc spacjiw slowie to: ".spaceX($y)."<br>"

?>