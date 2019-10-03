<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.5</title>
        <meta name="author" content="Alessandro Saglia">
        <style type="text/css">p.err {color:red}</style>
    </head>

    <body>
        <h1>Esercitazione 9.5</h1>
        <?php
            if(isset($_REQUEST['testo'])){
                $regex = '/^(?:[\w]+[\.\,\!\?\:\;\s]\s?)+[\w]+[\.\,\!\?\:\;]?$/';
                $testo = trim($_REQUEST['testo']);

                if(!preg_match($regex, $testo))
                    echo "<p class=\"err\">Errore - testo non valido: inserire solo parole separate da punteggiatura e spazi</p>";
                else{
                    $ris = preg_split("/[\W\s]/", $testo, NULL, PREG_SPLIT_NO_EMPTY);

                    if(count($ris) == 0)
                        echo "<p class=\"err\">Nessuna parola inserita</p>\n";
                    else{
                        echo "<p>Numero di parole inserite: ".count($ris)."</p>";
                        echo "<p>Elenco delle parole inserite:</p>";
                        echo "<ul>";
                        foreach($ris as $value)
                            echo "<li>$value</li>";
                        echo "</ul>";
                    }
                }    
            }
            else
                echo "<p class=\"err\">Errore - dati mancanti</p>\n";
        ?>
    </body>
</html>