<?php

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try {

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

    if (mysqli_connect_error())
        throw new Exception(mysqli_connect_error());
    else
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

        $login = htmlentities($login,ENT_QUOTES,"UTF-8");
        $haslo = htmlentities($haslo, ENT_QUOTES,"UTF-8");

        //$sql = "SELECT * FROM users WHERE user='$login' and pass='$haslo'";
        
        if($rezultat = $polaczenie->query(
            sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",
            mysqli_real_escape_string($polaczenie,$login),
            mysqli_real_escape_string($polaczenie,$haslo))
        ))
        {

        }





    }

}
catch (Exception $e)
{
    //print_r($e);
    echo "wystąpił problem z połączeniem z bazą danych  ";
}


?>
