<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.6</title>
        <meta name="author" content="Alessandro Saglia">
        <style type="text/css">p.err {color:red}</style>
    </head>

    <body>
        <h1>Esercitazione 9.6</h1>
        <?php
            if(isset($_REQUEST['testo'])){
                $regex = '/^(?:[\w]+[\.\,\!\?\:\;\s]\s?)+[\w]+[\.\,\!\?\:\;]?$/';
                $testo = trim($_REQUEST['testo']);

                if(!preg_match($regex, $testo))
                    echo "<p class=\"err\">Errore - testo non valido: inserire solo parole separate da punteggiatura e spazi</p>";
                else{
                    $ris = preg_split("/[\W\s]/", $testo, NULL, PREG_SPLIT_NO_EMPTY);
                    foreach($ris as $value){
                        $value = strtolower($value);
                        if(!isset($parole[$value]))
                            $parole[$value] = 1;
                        else
                            ++$parole[$value];
                    }

                    if(count($ris) == 0)
                        echo "<p class=\"err\">Nessuna parola inserita</p>\n";
                    else{
                        echo "<p>Numero di parole univoche: ".count($parole)."</p>";
                        echo "<ul>";
                        foreach($parole as $key=>$value)
                            echo "<li>\"$key\" - numero di occorrenze: $value</li>";
                        echo "</ul>";
                    }
                }    
            }
            else
                echo "<p class=\"err\">Errore - dati mancanti</p>\n";
        ?>
    </body>
</html>