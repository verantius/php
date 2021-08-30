<!DOCTYPE html>
<html>
<body>
<h1>Pierwszy tekst:</h1> 
<?php
echo "SCTRCTUSEPTRAAAAAAA!";
//echo "\n";
//taka sytuacja
$tekst = "szesć";
$two = 2;
$four = 4;
echo "<br>";
echo "suma 2 + 4 wynosi: "; echo $two + $four; echo " czyli $tekst";
echo "<br>";
echo "\n a ja dodam jeszcze coś od siebie";

echo "<br>";


function side() {
    
    $x = 4;

echo "wynik wynosi $x";
}
side();

print "<br><br><br><br>czy aby na pewno print działa?<br><br>";

$txt1 = "tutaj bedzie text w h2";

echo "<h2>".$txt1."</h2>";

$liczba1 = 456.4;
echo "<br> liczba wynosi ",$liczba1+$liczba1;
echo "<br>";
var_dump($liczba1);

$cars = array("audi","bmw","vw");
echo "<br>";
//var_dump($cars);
echo $cars[1];
echo "<br>";
echo "testowanie funkcji: <br>";

function sUm (int $a, int $b){
    $c = $a+$b;
    return $c;
}
echo "wynik 5 + 2 = ".sum(5,2)."<br>"."zkonkatenowano";
echo "<br>";
echo "<br>";
echo "hello!";
echo "hello from my mac !!";

?>

</body>
</html>