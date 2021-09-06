<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oblicz math</title>
    </head>
    <body>
        
        <p>Podaj wynik:</p><br> 
        <form >
            <input type="text" name="wynikg"> 
            <br>
            <button type="submit" name="submit" value="submit">Oblicz</button>
            
        </form>
     <br>
    <?php
        if (isset($_GET['submit'])){
            $wynikk = $_GET['wynikg'];

            $wynikk = $wynikk + 1;
            echo "wynik wynosi: ".$wynikk;

        }
    


    
    
    ?>


    
</body>
</html>