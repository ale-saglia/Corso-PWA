<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.3</title>
        <meta name="author" content="Alessandro Saglia">
        <style type="text/css">p.err {color:red}</style>
    </head>

    <body>
        <h1>Esercizio 9.3</h1>
        <?php
        if (!(isset($_REQUEST['numero1']) && isset($_REQUEST['numero2']) && isset($_REQUEST['operazione'])))
            echo "<p class=\"err\">Errore - Dati Mancanti</p>\n";
        else {
            $number1 = trim($_REQUEST['numero1']);
            $number2 = trim($_REQUEST['numero2']);
            $op = trim($_REQUEST['operazione']);
            $regex = '/^[+\-]?[\d]{1,3}$/';

            if(!preg_match($regex, $number1) || !preg_match($regex, $number2))
                echo "<p class=\"err\">Errore - i valori inseriti devono essere due numeri interi di massimo 3 cifre</p>\n";
            else {
                $err = false;

                switch($op){
                    case '+':
                        $r = $number1 + $number2;
                        break;

                    case '-':
                        $r = $number1 - $number2;
                        break;

                    case '*':
                        $r = $number1 * $number2;
                        break;

                    case '/':
                        if($number2 != 0)
                            $r = $number1 / $number2;
                        else{
                            echo "<p class=\"err\">Errore - impossibile dividere per 0!</p>\n";
                            $err = true;
                        }
                        break;

                    default:
                        echo "<p class=\"err\">Errore - operazione non valida</p>\n";
                        $err = true;
                }

                if(!$err){
                    echo "<p>Risultato:</p>";
                    echo "<p>$r = $number1 $op $number2</p>\n";
                }
            }
        }
        ?>
    </body>
</html>