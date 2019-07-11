<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Esercizio 8.3</title>
    <meta name="author" content="Alessandro Saglia">
</head>

<body>
    <h1>Quadrati e cubi</h1>
    <table>
        <tr>
            <th>N</th>
            <th>Quadrati</th>
            <th>Cubi</th>
        </tr>
    </table>
    <?php
    $n = $_REQUEST['n'];

    for($i = 1; $i <= $n; $i++){
        $quadrato = pow(i, 2);
        $cubo = pow(i, 3);
        echo "<tr>";
        echo "<th>" + $quadrato + "</th>";
        echo "<th>" + $cubo + "</th>";
        echo "</tr>";
    }
    ?>
</body>

</html>