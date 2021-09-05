<?php 
session_start(); 
if (!isset($_SESSION['udanarejestracja'])) 
{
    header('Location: index.php');
    exit();
}
else{
    unset($_SESSION['udanarejestracja']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osadnicy</title>
</head>
<body>
    
    <h1>Dziękujemy za rejestracje w serwisie! możesz już zalogować się na swoje konto!</h1>

    <a href="index.php">zaloguj się na swoje konto</a>
    <br><br>

    <form action="zaloguj.php" method="post">
        Login: <br> <input type="text" name="login"/> <br>
        Hasło: <br> <input type="password" name="haslo"/> <br><br>
        <input type="submit" value="zaloguj się"/>
 
    </form>

    <?php 
    if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
    ?>







</body>
</html>