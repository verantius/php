<?php 
session_start(); 
if(!isset($_SESSION['zalogowany']))
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a>]</p>';
echo "<p><b>Drewno: </b>".$_SESSION['drewno']." | "."<b>Kamien: </b>".$_SESSION['kamien']." | "."<b>Zborze: </b>".$_SESSION['zboze']."</p>";

echo "<p><b>e-mail: </b>".$_SESSION['email'];
echo "<p><b>Dni premium: </b>".$_SESSION['dnipremium'];
?>


</body>
</html>