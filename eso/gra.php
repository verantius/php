<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eso - online</title>
</head>
<body>

<?php
echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="logout.php">Wyloguj się!</a> ]</p>';
echo "<p><b>Gold</b>: ".$_SESSION['gold'];
echo " | <b>Telvar</b>: ".$_SESSION['telvar'];
echo " | <b>Crowns</b>: ".$_SESSION['crowns']."</p>";

echo "<p><b>E-mail</b>: ".$_SESSION['email']."</p>";

//echo "<br /><b>Dni premium</b>: ".$_SESSION['dnipremium']."</p>";

//INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `gold`, `telvar`, `crowns`) VALUES
//(1, 'adam', 'qwerty', 'adam@gmail.com', 2136, 675, 400),
//(2, 'marek', 'asdfg', 'marek@gmail.com', 3241, 123, 5000),
//(3, 'anna', 'zxcvb', 'anna@gmail.com', 4536, 17, 150);

?>


</body>
</html>