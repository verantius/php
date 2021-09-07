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

        $login = htmlentities($login);





    }

}
catch (Exception $e)
{
    //print_r($e);
    echo "wystąpił problem z połączeniem z bazą danych  ";
}


?>
