<?php

	session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eso - zaloguj sie</title>
</head>
<body>
    <h1>Witaj w Elder Scrolls Online</h1>
    <h2>gra przeglądarkowa</h2>

    <form action="login.php" method="post">
        Login:     <br><input type="text" name="login"><br>
        Password:   <br><input type="password" name="pass"><br><br>
                    <input type="submit" value="log in">
    </form>

    <?php
        if(isset($_SESSION['blad']))    
            echo $_SESSION['blad'];
    ?>
    
</body>
</html>