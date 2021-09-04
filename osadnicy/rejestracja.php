<?php
session_start();

if(isset($_POST['email']))
{
   $wszystko_ok=true; //udana walidacja
   
   $nick = $_POST['nick']; //poprawnosc nicka
   if((strlen($nick) < 3 )||(strlen($nick) > 20 ))
   {
       $wszystko_ok = false;
       $_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
   }
   if (ctype_alnum($nick) == false)
   {
       $wszystko_ok = false;
       $_SESSION['e_nick'] = "Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
   }
   //sprawdz poprawwnosc email
    $email = $_POST['email'];
    $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);//filtrując usuwa min polskaie znaki
    
    if ((filter_var($emailB,FILTER_VALIDATE_EMAIL) == false)||($emailB!=$email))
    {
        $wszystko_ok = false;
        $_SESSION['e_email'] = "Podaj poprawny adress email";
    }
    //sprawdz poprawnosc hasla
    $haslo1 = $_POST['haslo1'];
    $haslo2 = $_POST['haslo2'];
    
    if((strlen($haslo1) < 8 )||(strlen($haslo1) > 20 ))
    {
        $wszystko_ok = false;
        $_SESSION['e_haslo'] = "Haslo musi posiadać od 8 do 20 znaków!";
    }
    if($haslo1!=$haslo2)
    {
        $wszystko_ok = false;
        $_SESSION['e_haslo'] = "Podane hasła nie są identyczne!";
    }

    $haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
    
    //czy zaakcepowano regulamin?
    if (!isset($_POST['regulamin']))
    {
        $wszystko_ok = false;
        $_SESSION['e_regulamin'] = "Potwierdź akceptację regulaminu !"; 
    }
    
    require_once "connect.php";
    //------------------------------------
    mysqli_report(MYSQLI_REPORT_STRICT);
    try
    {
        $polaczenie = new mysqli($host,$db_user,"aaa",$db_name);
        if ($polaczenie->connect_errno!= 0)
        {
            throw new Exception(mysqli_connect_errno());
        }
    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">  Błąd servera! Przepraszamy!</span>';
        echo '<br>Informacja developerska:'.$e;
    }
    //------------------------------------1
//1



   if($wszystko_ok == true)
   {
       //wszystkie dane dodane poprawnie - gracz w bazie
       echo "udana walidacja"; exit();
   }

   
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Osadnicy - załóż darmowe konto!</title>
    <style>
        .error
        {
            color: red;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
    <form method="post">
        Nickname: <br> <input type="text" name="nick"><br>
        <?php
        if (isset($_SESSION['e_nick']))
        {
            echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
            unset($_SESSION['e_nick']);
        }
        ?>

        e-mail: <br> <input type="text" name="email"><br>
        <?php
        if (isset($_SESSION['e_email']))
        {
            echo '<div class="error">'.$_SESSION['e_email'].'</div>';
            unset($_SESSION['e_email']);
        }
        ?>

        Twoje hasło: <br> <input type="password" name="haslo1"><br>
        <?php
        if (isset($_SESSION['e_haslo']))
        {
            echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
            unset($_SESSION['e_haslo']);
        }
        ?>
        

        Powtórz hasło: <br> <input type="password" name="haslo2"><br>
        <label >
            <input type="checkbox"name="regulamin"> Akceptuję regulamin
        </label>
        <?php
        if (isset($_SESSION['e_regulamin']))
        {
            echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
            unset($_SESSION['e_regulamin']);
        }
        ?>
        <br><br>
        <input type="submit" value="zarejestruj się">
    </form>




</body>
</html>