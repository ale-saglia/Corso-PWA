<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Esercizio 8.2</title>
        <meta name="author" content="Alessandro Saglia">
    </head>
    <body>
        <h1>Testo ricevuto</h1>
        <?php
           if(is_numeric($_REQUEST['addendo1']) && is_numeric($_REQUEST['addendo2'])){
            $addendo1 = intval($_REQUEST['addendo1']);
            $addendo2 = intval($_REQUEST['addendo2']);

            if(is_int($addendo1) && is_int($addendo2)){
                $somma = $addendo1 + $addendo2;
                echo "<p>Il risultato dell'operazione &egrave; $somma</p>"; 
            }
           }
           else {
               echo "<p>ERRORE: uno o pi&ugrave; valori non validi.</p>";
               echo "<p>Si prega di inserire due numeri validi</p>";
            }
        ?>
    </body>
</html>