<?php
if (isset($_POST['submit']))
{   
    if(empty($_POST['imie']))
        $error_name = "Jak masz na imię?";
    
    if(empty($_POST['nazwisko']))
        $error_surname = "Jakie masz nazwisko?";
    
    if(empty($_POST['email']))
        $error_surname = "Jaki posiadasz adress email?";
    
    if(empty($_POST['username']))
        $error_surname = "Podaj jaki chcesz mieć nick";

    if(empty($_POST['birth']))
        $error_surname = "Kiedy się urodziłeś?";

    if(empty($_POST['haslo1']))
        $error_surname = "Jakie masz nazwisko?";






}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formularz rejestracyjny</title>
    <!-- <link href="../../twitter-bootstrap/twitter-bootstrap-v2/docs/assets/css/bootstrap.css" rel="stylesheet"> -->
    <link href="parsely.css" rel="stylesheet">
    <style type="text/css">
    h1 {margin-bottom:20px}
    /* input, label {margin-top:2px; margin: bottom 1px; color:#000066; font-size: 16px; padding-right: 7px} */
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
            <?php  if(isset($error_name)) echo "<p class='wiadomosc'>".$error_name."</p>";?>
            
            <label>nazwisko:</label><br>
            <input type="text" name="nazwisko" placeholder="podaj Nazwisko"><br><br>
            <?php  if(isset($error_surname)) echo "<p class='wiadomosc'>".$error_surname."</p>";?>
            
            <label>email:</label><br>
            <input type="text" name="email" placeholder="podaj email"><br><br>
            
            <label>username:</label><br>
            <input type="text" name="username" placeholder="podaj username"><br><br>
            
            <label>data urodzenia:</label><br>
            <input type="text" name="birth" placeholder="kiedy się urodziłeś? d/m/r"><br><br>
            
            <label>hasło:</label><br>
            <input type="password" name="haslo1"><br>
            <label>powtórz hasło:</label><br>
            <input type="password" name="haslo2"><br><br>

            <!-- <label>Akceptuję regulamin</label>
            <input type="radio" name="service" value="agree"><br><br> -->

            <button type="submit" class="btn btn-large btn-primary" name="submit">Rejestracja</button>



        </form>
    </div>
</body>
</html>