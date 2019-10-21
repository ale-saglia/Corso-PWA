<?php
    setcookie("Author", "Stoker")
?>

<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 10.2</title>
        <meta name="author" content="Alessandro Saglia">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Esercizio 10.2</h1>
        <h2>Tabella dei cookie</h2>
        <?php
            $size = count($_COOKIE);
            echo "<table><caption>Numero di cookie: $size</caption>";
            echo "<thead>";
            echo "<tr><th>Nome Cookie</th><th>Valore Cookie</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            if ($size==0)
                echo "<tr><td> </td><td> </td></tr>";
            else foreach($_COOKIE as $key => $value){
                echo "<tr><td> $key </td><td> $value </td></tr>";
            }
            echo "</tbody>";
            echo "</table>";
        ?>
    </body>
</html>