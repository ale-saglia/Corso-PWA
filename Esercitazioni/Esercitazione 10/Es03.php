<?php
    $data = mktime(23,59,59,12,31,2019);
    setcookie("Country", "IT", $data);
?>
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
        <p>Italia!</p>
        <p><a href="Es03bis.php">Pagina successiva</a></p>
    </body>
</html>