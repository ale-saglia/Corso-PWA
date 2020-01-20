<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang=it>

    <head>
        <meta charset="utf-8">
        <title>Biblioteca - Home</title>
        <meta name="description" content="Homepage del sito della biblioteca Civica di Alba">
        <link rel="shortcut icon" type="image/x-icon" href="resources/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="resources/main.css">
        <link rel="stylesheet" type="text/css" media="print" href="resources/print.css">

    </head>

    <body>
        <div class="topBar">
            <a class="logo" href="home.php">
                <div class="logo">
                    <img src="resources/logo.svg" alt="logo biblioteca">
                    <span>Biblioteca Civica di Alba</span>
                </div>
            </a>
            <div class="menu">
                <a class="active" href="home.php">Home</a>
                <a href="libri.php">Libri</a>
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
            <h1>Benvenuto/a sul sito  della biblioteca Civica "Giovanni Ferrero"!</h1>
            <h3>Il sito della biblioteca civica di Alba &egrave; lieto di accoglierti!</h3>
            <img src="resources/img/foto1.jpg" alt="Foto biblioteca">
        </div>
        
        <div class="card">
            <h2>Storia</h2>
            <img src="resources/img/foto2.jpg" alt="" style="float:right; width:27%; padding-left: 15px; min-width: 300px;">
            <p>La Biblioteca civica “Giovanni Ferrero” di Alba (centro rete del Sistema bibliotecario delle Langhe di cui fanno parte 44 paesi e 4 associazioni) fu istituita nel 1960 al fine di creare una biblioteca aperta e a disposizione di tutti i cittadini. Come prima sede furono individuati alcuni locali nel complesso scolastico di San Secondo, essi si rivelarono presto inadeguati e nel 1971 la biblioteca fu trasferita in locali appositamente ristrutturati nel Palazzo della Maddalena, zona centrale della città, dove risiede tuttora la nuova sede, con più servizi e locali, aperta nell’ottobre 1987.</p>
            <p>La biblioteca ha un vasto orario di apertura e tutti possono liberamente accedervi per la consultazione di volumi presenti al prestito, in consultazione, della sezione locale, enciclopedie e periodici.</p>
            <p>I servizi che offre la Biblioteca sono: Reference, informazioni e consulenze bibliografiche; Prestito di libri, e-book, dvd, cd audio e audiolibri per il quale è necessaria la tessera di iscrizione; Internet, servizio di ricerca bibliografica tramite web; Periodici, di cui fanno parte 110 abbonamenti correnti, con 8 quotidiani; Sezione locale, con libri ed opuscoli di Alba e dell’albese, con una parte dedicata alle tesi; Sezione Nati per leggere, per bambini in età da 0 a 6 anni con arredi adatti e libri giocattolo, cartonati, filastrocche; Attività per bambini, letture per le diverse fasce d’età, laboratori di scrittura e disegno; Attività per adulti, presentazione di libri, mostre bibliografiche.</p>
        </div>

        <div class="card">
            <h2>Servizi</h2>
            <p>La biblioteca offre ai cittadini i seguenti servizi:</p>
            <ul>
                <li>Iscrizione e prestito di libri, cd, dvd e audiolibri</li>
                <li>Prestito interbibliotecario</li>
                <li>Prestito digitale</li>
                <li>Box restituzione libri</li>
                <li>Fotocopie</li>
                <li>Libro parlato Lions - Servizio di prestito per ciechi, ipovedenti e dislessici</li>
            </ul>

        </div>

        <div class="card">
            <h2>Contatti</h2>
            <p>Contatta la Biblioteca "G. Ferrero" di Alba:</p>
            <p style="text-align:center;">Direttore: Annalisa Salati</p>
            <p style="text-align:center;">Via Vittorio Emanuele II (Via Maestra), 19 - 12051 Alba CN<br>Tel. 0173 / 292466 - Email: <a href="mailto:biblioteca@comune.alba.cn.it">biblioteca@comune.alba.cn.it</a></p>
            <p style="text-align:center;">Servizio di prestito<br>Tel. 0173 / 292468 - email: <a href="mailto:prestito@comune.alba.cn.it">prestito@comune.alba.cn.it</a></p>
            <p style="text-align:center;">ORARIO DI APERTURA<br>martedì - venerdì: 9.00-12.30 e 14.00-18.00<br>sabato: 9.00-12.30 e 14.30-18.00</p>

            
        </div>


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

