<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.4</title>
        <meta name="author" content="Alessandro Saglia">
        <style type="text/css">p.err {color:red}</style>
    </head>

    <body>
        <h1>Esercitazione 9.4</h1>
        <?php
            $temp = $_REQUEST['gradi'];
            validate($temp);

            function validate($x){
                if(empty($x)){
                    echo "Inserisci una temperatura";
                    return false;
                }

                if(!is_numeric($x)){
                    echo "Inserisci una temperatura numerica";
                    return false;
                }
                else{
                    $regexp = "/^(([+|-])(\d{1,3})([+.])(\d{1}))$/";

                    if (preg_match($regexp, $x)==true){
                        $temperatura_i = intval($x);
                        $risultato = "Oggi è una giornata ";
                        $opt1 = array("options" => array("max_range"=>0));
                        $opt2 = array("options" => array("min_range"=>1, "max_range"=>10));
                        $opt3 = array("options" => array("min_range"=>11, "max_range"=>18));
                        $opt4 = array("options" => array("min_range"=>19, "max_range"=>25));
                        $opt5 = array("options" => array("min_range"=>26));

                        if(filter_var($temperatura_i, FILTER_VALIDATE_INT, $opt1)){
                            $risultato .= "molto fredda";
                        }
                        else if(filter_var($temperatura_i, FILTER_VALIDATE_INT, $opt2)){
                            $risultato .= "fredda";
                        }
                        else if(filter_var($temperatura_i, FILTER_VALIDATE_INT, $opt3)){
                            $risultato .= "tiepida";
                        }
                        else if(filter_var($temperatura_i, FILTER_VALIDATE_INT, $opt4)){
                            $risultato .= "calda";
                        }
                        else if(filter_var($temperatura_i, FILTER_VALIDATE_INT, $opt5)){
                            $risultato .= "molto calda";
                        }

                        echo $risultato;
                    }
                    else{
                        echo "Inserisci un numero nel formato ±xxx.x";
                        return false;
                    }
                }
                return true;
            }
        ?>
    </body>
</html>
