<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Oblicz math</title>
    </head>
    <body>
        <?php
        $rand1 = (rand(10,100));
        $rand2 = (rand(2,10));
        $rand3 = (rand(3,8));
        $rand4 = (rand(2,7));
        $rand5 = 3;
        echo "<br>";
        echo "wylosowana liczba: ".$rand1." ".$rand2." ".$rand3." ".$rand4."<br>";
        if ($rand1 == 50) {
            echo "oblicz: ".$rand2." * ".$rand3." + ".$rand4."<br>";
            $rd_sum = $rand2*$rand3+$rand4;
        }
        else if ($rand1 == 51) {
            echo "oblicz: ".$rand2." * ".$rand3." - ".$rand4."<br>";
            $rd_sum = $rand2*$rand3-$rand4;
            
        }
        else if ($rand5 == 3)
        {
            
            echo "oblicz: ".$rand3." + ".$rand4."<br>";
            $rd_sum = $rand3 + $rand4;
        }
        else {
            echo "brak rozwiązań";
        } 
        echo "<br>";
        ?>
        

        <p>Podaj wynik:</p><br> 
        <form >
            <input type="text" name="wynikg"> 
            <br>
            <button type="submit" name="submit" value="submit">sprawdz</button>
            
        </form>
     <br>
    <?php
        if (isset($_GET['submit'])){
            $wynik = $_GET['wynikg'];
            
            if ($wynik == $rd_sum)
            {
                echo "wynik poprawny!<br>";
                echo "suma = ".$rd_sum;
            }
            else {
                echo "wynik niepoprawny";
            }
        } 
        ?>
    <form >
        <button type="submit1" name="submit1" value="submit1">reset</button>      
    </form>
    <?php
    if (isset($_GET['submit1'])){
        header('Location: index.php');  
    
    }
    ?>
    
</body>
</html>