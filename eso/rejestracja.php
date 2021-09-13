<?php
session_start();

if (isset($_POST['email']))
{
    $wszystko_OK = true;

    $nick=$_POST['nick'];

    if ((strlen($nick) < 3 ) || (strlen($nick) > 20))
    {
        $wszystko_OK = false;
        $_SESSION['e_nick'] = "nick powinien zawierac od 3 do 20 znaków!"; 
    }
    if (ctype_alnum($nick)==false)
    {
        $wszystko_OK = false;
        $_SESSION['e_nick']= "nick nie powinien skladać się z liter i cyfr";
    }

    $email = $_POST['email'];
    $email_san = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if ((filter_var($email, FILTER_SANITIZE_EMAIL)==false) || ($email_san!=$email))
    {
        $wszystko_OK=false;
        $_SESSION['e_email']= "Podaj poprawny email";

    }

    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];

    if ((strlen($pass1) < 8 ) OR (strlen($pass1) > 21))
    {
        $wszystko_OK=false;
        $_SESSION['e_pass1']="hasło nie może być krótsze niż 8 znaków oraz dłuższe niż 21!";   
    }
    if ($pass1!=$pass2)
    {
        $wszystko_OK=false;
        $_SESSION['e_pass1']="Hasła nie są jednakowe";
    }
    //$pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
    if (!isset($_POST['reg']))
    {
        $wszystko_OK==false;
        $_SESSION['e_reg']=="potwierdz regulamin!";
    }
}

require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);
try
{
    $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

    if ($polaczenie->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else
    {
        $sqmail = ("SELECT id FROM users WHERE email='$email'");
        $rezultat = $polaczenie->query($sqmail);

        if(!$rezultat) throw new Exception($polaczenie->error);

        $ile_takich_maili = $rezultat->num_rows;

        if($ile_takich_maili>0)
        {
            $wszystko_OK = false;
            $_SESSION['e_mail'] = "istnieje w bazie taki email!";
        }
        
        $sqlogin = ("SELECT id FROM users WHERE user='$login'");
        $rezultat = $polaczenie->query($sqlogin);

        if(!$polaczenie) throw new Exception($polaczenie->error);

        $ile_takich_nickow = $rezultat->num_rows;

        if($ile_takich_nickow>0)
        {
            $wszystko_OK = false;
            $_SESSION['e_nick']="Istieje już w bazie taki nick! wybierz inny";
        }
        if($wszystko_OK==true)
        {
            if($polaczenie->query("INSERT INTO users VALUES (NULL, '$nick','$pass_hash','$email',1500,1000,250)"))
            {
                $_SESSION['udanarejestracja']=true;
                //header("Location: witamy.php");
                
            }
            else
            {
                throw new Exception($polaczenie->error);
            }
        }
        $polaczenie->close();
    } 

}
catch(Exception $e)
{
    echo '<span style="color:red;">wystąpił problem z połączniem. spróbuj później</span>';
    
}
?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja eso</title>
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

<?php
?>
<h1>Witaj w Elder scolls online</h1>
<h3>zarejestruj się</h3>
<form method="post">

    nickname: <br> <input type="text" name="nick"><br>
    
    <?php
        if(isset($_SESSION['e_nick']))
        {
          echo '<div class="error">'.$_SESSION['nick'].'</div>'; 
          unset($_SESSION['e_nick']); 
        }
    ?>
    
    e-mail: <br> <input type="text" name="email"><br>
    
    <?php
        if(isset($_SESSION['e_email']))
        {
            echo '<div class="error">'.$_SESSION['email'].'</div>';
            unset($_SESSION['email']);
        }
    ?>
    
    hasło: <br> <input type="password" name="pass1"><br>
    
    <?php
        if(isset($_SESSION['e_pass1']))
        {
            echo '<div class="error">'.$_SESSION['pass1'].'</div>';
            unset($_SESSION['pass1']);
        }
    ?>

    powtórz hasło: <br> <input type="password" name="pass2"><br>
    
    <label>
        akceptuję regulamin: <br> <input type="checkbox" name="reg"><br>
    </label>

    <?php
        if(isset($_SESSION['e_reg']))
        {
            echo '<div class="error">'.$_SESSION['e_reg'].'</div>';
            unset($_SESSION['e_reg']);
        }
    ?>

    <br> <input type="submit" value="zarejestruj sie">
        
</form>

</body>
</html>