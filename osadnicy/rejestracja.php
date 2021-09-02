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
        Powtórz hasło: <br> <input type="password" name="haslo2"><br>
        <label >
            <input type="checkbox"name="regulamin"> Akceptuję regulamin
        </label>
        <br><br>
        <input type="submit" value="zarejestruj się">
    </form>




</body>
</html>