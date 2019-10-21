<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 10.3</title>
        <meta name="author" content="Alessandro Saglia">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Esercizio 10.3</h1>
        <?php
            if(isset($_COOKIE["Country"])){
                $nazione = $_COOKIE["Country"];
                echo"<p>Il valore del cookie COUNTRY &egrave; $nazione </p>";
            }
            else{
                echo"<p class='err'>ERRORE: Cookie \"Country\" assente</p>";
                echo"<p><a href='Es01.php'>Pagina precedente</a></p>";
            }
        ?>
    </body>
</html>