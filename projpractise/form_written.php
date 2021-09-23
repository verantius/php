<?php
session_start();
if (isset($_POST['submit']))
{   
    $rejestration_complete = true;
    
    $imie = $_POST['imie'];
    if (empty($imie))
    {
        $_SESSION['error_name'] = "Jak masz na imię?";
        $rejestration_complete = false;
    }
    else if (strlen($imie)<3)
    {
        $_SESSION['error_name'] = "Twoje imie musi posiadać przynajmniej 3 znaki";
        $rejestration_complete = false;
    }
    else if (strlen($imie)>7)
    {
        $_SESSION['error_name'] = "Twoje imie nie moze byc wieksze niz 7 znakow";
        $rejestration_complete = false;
    }
    //$name_pattern = '/^[a-zA-Z]*$/';
    $name_pattern = "@^([1-9][0-9]*)$@";
    preg_match($name_pattern, $imie,$name_matches);
    if (!isset($name_matches[0]))
    {
        $_SESSION['error_name'] = "Twoje imie nie moze zawierac znaków specjalnych";
        $rejestration_complete = false;
    }







}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formularz rejestracyjny</title>
    <link href="../../twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link href="parsely.css" rel="stylesheet">
    <style type="text/css">
    h1 {margin-bottom:20px}
    input, label {margin-top:2px; margin: bottom 1px; color:#000066; font-size: 16px; padding-right: 7px}
    input[type='checkbox'] {margin-left: 5px}
    .wiadomosc {color: #ff0000}
    .success_msg{color:#006600}
    </style>
</head>
<body>
    <div class="container">
        <h1>Zarejestruj się.</h1>
        <h2>uzupełnij wszystkie dane</h2>
        <form id="rejestration_form" method="post" action="">
            <label>imię:</label>  <br>
            <input type="text" name="imie" autofocus="autofocus" placeholder="podaj Imię"><br><br>
            <?php  if(isset($_SESSION['error_name'])) echo "<div class='wiadomosc'>".$_SESSION['error_name']."</div>"; unset($_SESSION['error_name']);?>
            
            <label>nazwisko:</label><br>
            <input type="text" name="nazwisko" placeholder="podaj Nazwisko"><br><br>
            <?php  if(isset($error_surname)) echo "<p class='wiadomosc'>".$error_surname."</p>";?>
            
            <label>email:</label><br>
            <input type="text" name="email" placeholder="podaj email"><br><br>
            <?php  if(isset($error_email)) echo "<p class='wiadomosc'>".$error_email."</p>";?>
            
            <label>username:</label><br>
            <input type="text" name="username" placeholder="podaj username"><br><br>
            <?php  if(isset($error_nick)) echo "<p class='wiadomosc'>".$error_nick."</p>";?>
            
            <label>data urodzenia:</label><br>
            <input type="text" name="birth" placeholder="d/m/r"><br><br>
            <?php  if(isset($error_birth)) echo "<p class='wiadomosc'>".$error_birth."</p>";?>
            
            <label>hasło:</label><br>
            <input type="password" name="haslo1"><br>
            <?php  if(isset($error_password)) echo "<p class='wiadomosc'>".$error_password."</p>";?>
            <label>powtórz hasło:</label><br>
            <input type="password" name="haslo2"><br><br>

            <!-- <label>Akceptuję regulamin</label>
            <input type="radio" name="service" value="agree"><br><br> -->

            <button type="submit" class="btn btn-large btn-primary" name="submit">Rejestracja</button>



        </form>
    </div>
</body>
</html>