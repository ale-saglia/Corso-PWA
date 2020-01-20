<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang=it>

    <head>
        <meta charset="utf-8">
        <title>Biblioteca - Libri</title>
        <meta name="description" content="Homepage del sito della biblioteca Civica di Alba">
        <link rel="shortcut icon" type="image/x-icon" href="resources/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="resources/main.css">

    </head>

    <?php
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["checkbox"])) {
            if (count($_POST["checkbox"]) + $numlibri <= 3) {
                foreach ($_POST["checkbox"] as $selected) {
                    if (isset($selected) && is_numeric($_POST["numgiorni"])) {
                        $sql = "UPDATE books SET prestito = '" . $_SESSION["login_user"] . "',data=NOW(),giorni='" . $_POST["numgiorni"] . "'  WHERE id=$selected;";
                        mysqli_query($dbw, $sql);
                        header("Location: libri.php");
                    }
                    else {
                        $error = "Selezionare dei libri e mettere un numero di giorni.";
                    }
                }

            }
        else {
            $error = "Massimo 3 libri in prestito alla volta.";
        }

        
    }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "SELECT * FROM books";
            $resultlibri = mysqli_query($dbr, $sql);
            if (mysqli_num_rows($resultlibri) > 0) {
                while ($row = mysqli_fetch_assoc($resultlibri)) {
                    if (!empty($_POST["" . $row["id"]])) {
                        $durataprestito = round((time() - strtotime($row["data"])) / 60 / 60 / 24);
                        $sql = "UPDATE books
                        SET prestito = '', DATA = 0, giorni=0
                        WHERE id=" . $row['id'] . ";";
                        mysqli_query($dbw, $sql);
                    }
                }
            }
        }
    ?>
    
    <body>
        <div class="topBar">
            <a class="logo" href="home.php">
                <div class="logo">
                    <img src="resources/logo.svg" alt="logo biblioteca">
                    <span>Biblioteca Civica di Alba</span>
                </div>
            </a>
            <div class="menu">
                <a href="home.php">Home</a>
                <a class="active" href="libri.php">Libri</a>
                <a href="new.php">Registrami</a>
                <?php
                    if (empty($_SESSION["login_user"]))
                        echo '<a href="login.php">Login</a>';
                    else
                        echo '<a href="">Login</a>';
                ?>
                <?php
                    if (!empty($_SESSION["login_user"]))
                        echo '<a href="logout.php">Logout</a>';
                    else
                        echo '<a href="">Logout</a>';
                ?>

            </div>
        </div>

        <div class="statusBar">
            <?php
                if (!empty($_SESSION["login_user"]))
                    echo '<div class="usermenu">Benvenuto ' . $_SESSION["login_user"] . '. Hai ' . $numlibri . ' libri in prestito.</div>';
                else
                    echo '<div class="usermenu">Benvenuto ANONIMO. Hai 0 libri in prestito.</div>'
            ?>
        </div>

        <div class="card">
            <?php
                if (empty($_SESSION["login_user"])){
                    $totlibri=mysqli_num_rows(mysqli_query($dbr, "SELECT * FROM books"));
                    $libridisponibili=mysqli_num_rows(mysqli_query($dbr, "SELECT * FROM books WHERE prestito IS NULL OR prestito=''"));



                    echo '<h2 style="text-align: center;">Attenzione! Per accedere a questa sezione è necessario essere autenticati.</h2>
                        <p>Accedendo alla nostra biblioteca potrai avere accesso al nostro catalogo di '.$totlibri.' libri dei quali '.$libridisponibili.' sono disponibili!</p>
                        <br>
                        <p style="text-align: center;">Utilizza i menu in alto per accedere o registrarti!</p>
                        ';
                         
                }
                else{
                    include ("ua.php");
                }
            ?>
        </div>
        
        <div class="notif peek"><?php echo $error; ?></div>

        <footer>
            <span>
                Pagina corrente: 
                <?php
                    echo basename($_SERVER['PHP_SELF']);
                ?>
            </span>
            <a class="author" href="https://github.com/ale-saglia">Alessandro Saglia</span>
        </footer>
    </body>
</html>