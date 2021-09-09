<?php
session_start();

require_once "connect.php";
//mysqli_report(MYSQLI_REPORT_STRICT);
//try {

    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

    if ($polaczenie->connect_errno!=0)
    {
        echo "error:".$polaczene->connect_errno."opis: ".$polaczenie->connect_error;
    }
       // throw new Exception(mysqli_connect_error());
    else
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];

       // $login = htmlentities($login, ENT_QUOTES, "UTF-8");
       // $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

        $sql = "SELECT * FROM users WHERE user='$login' and pass='$haslo'";
        
        if($rezultat = $polaczenie->query($sql))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {
                //$_SESSION['zalogowany'] = true;

                $wiersz = $rezultat->fetch_assoc();
                $user=$wiersz['user'];
/*
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['user'];
                $_SESSION['email'] = $wiersz['email'];
                $_SESSION['gold'] = $wiersz['gold'];
                $_SESSION['telvar'] = $wiersz['telvar'];
                $_SESSION['crowns'] = $wiersz['crowns'];
                unset($_SESSION['blad']);
*/
                $rezultat->free_result();
                echo $user;
                //header('Location: gra.php');
            }
            else
            {
                $_SESSION['blad'] = "no jest problem z polaczeniem";
                header('Location:index.php');
            }

        }

        $polaczenie->close();
    }

/*
}
catch (Exception $e)
{
    //print_r($e);
    echo "wystąpił problem z połączeniem z bazą danych  ";
}
*/

//sprintf("SELECT * FROM uzytkownicy WHERE user='%s' AND pass='%s'",
//mysqli_real_escape_string($polaczenie,$login),
//mysqli_real_escape_string($polaczenie,$haslo)))
?>