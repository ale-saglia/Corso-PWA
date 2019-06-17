<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Esercizio 8.1</title>
        <meta name="author" content="Alessandro Saglia">
    </head>
    <body>
        <h1>Testo ricevuto</h1>
        <?php
            if(isset($_REQUEST['testo']) && $_REQUEST['testo'] != ""){
                $testo = $_REQUEST['testo'];
                echo "<p>$testo</p>";
            }
            else {
                echo "<p>ERRORE: non è stato ricevuto alcun testo</p>";
                echo "<p>&Egrave; obbligatoria riempire il campo di testo.</p>";
            }
        ?>
    </body>
</html>