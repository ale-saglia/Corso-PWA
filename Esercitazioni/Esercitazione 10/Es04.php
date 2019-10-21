<?php
    $form_received = false;

    if(isset($_REQUEST["nome"]) && isset($_REQUEST["cognome"]) && $_REQUEST["nome"] != "" && $_REQUEST["cognome"] != "" && preg_match('/^[A-Z]{1}[a-z]{0,29}$/', $_REQUEST["nome"]) && preg_match('/^[A-Z]{1}[a-z]{0,29}$/', $_REQUEST["cognome"])){
        $nome = $_REQUEST["nome"];
        $cognome = $_REQUEST["cognome"];
        $scadenza = time()+3600;
        $form_received=true;
        setcookie("nome", $nome, $scadenza);
        setcookie("cognome", $cognome, $scadenza);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Esercizio 10.4</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Esercizio 10.4</h1>
        <?php
            if($form_received){
                if(isset($_COOKIE["nome"]) && isset($_COOKIE["cognome"])){
                    echo "<p> Bentornato, caro ".$_COOKIE["nome"] . " " .$_COOKIE["cognome"] . " nel mio umile sito</p>";
                }
                echo "<p>Agli stupidi non capita mai di pensare che il merito e la buona sorte sono strettamente correlati. - Johann Wolfgang von Goethe
                </p>";
            }
            else{
                echo "<p class='err'> ERRORE: Sono stati presentati dei dati non validi! </p>";
                echo "<p><a href='Es04.html'>Pagina principale</a></p>";
            }
        ?>
    </body>
</html>