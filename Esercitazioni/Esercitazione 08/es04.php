<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Esercizio 8.3</title>
    <meta name="author" content="Alessandro Saglia">
</head>

<body>
    <h1>Prezzo finale</h1>
    <p>Il prezzo finale del prodotto &egrave; di € 
    <?php
    $prezzoUnitario = $_REQUEST['prezzoUnitario'];
    $iva = $_REQUEST['iva'];

    switch ($iva){
        case "minima":
        $iva = 0.04; break;

        case "ridotta":
        $iva = 0.10; break;

        case "ordinaria":
        $iva = 0.22; break;
    }

    $prezzoTotale = $prezzoUnitario + ($iva * $prezzoUnitario);

    echo number_format($prezzoTotale,2)."</p>";
    ?>
</body>

</html>