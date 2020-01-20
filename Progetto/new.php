<?php include("session.php"); ?>
<!DOCTYPE html>
<html lang=it>

    <head>
        <meta charset="utf-8">
        <title>Biblioteca - Login</title>
        <meta name="description" content="Homepage del sito della biblioteca Civica di Alba">
        <link rel="shortcut icon" type="image/x-icon" href="resources/favicon.ico">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="resources/main.css">

    </head>

    <?php
        $name = $password = $password2 = false;
        $nameerr = $passworderr = "";
        $utentecreato = false;

        // VARIE REGEX
        // USERNAME: solo LETTERE/NUMERI o %, deve iniziare con 
        // % o LETTERA, lungo minimo 6 caratteri con almeno un numero ed una non lettera
        $username_regex = "/(?=.*[a-zA-Z])(?=.*[0-9%])^[a-zA-Z%]{1}[a-zA-Z0-9%]{2,5}$/";
        // PASSWORD: solo caratteri ALFABETICI tra 4 ed 8 caratteri con almeno una MAIUSCOLA ed una MINUSCOLA
        $password_regex = "/^(?=.*[a-z])(?=.*[A-Z]).{4,8}/";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $err = "Devi inserire uno username!";
            } else {
                if (preg_match($username_regex, $_POST["name"])) {
                    $name = true;
                } else {
                    $err = "Lo username non rispetta i parametri.";
                }
            }
            if (empty($_POST["password"])) {
                $passerr = "Devi inserire una password!";
            } else {
                if (empty($_POST["password2"])) {
                    $passerr = "Devi ripetere la password!";
                } else {
                    if ($_POST["password"] === $_POST["password2"] && preg_match($password_regex, $_POST["password"])) {
                        $password = true;
                    } else {
                        $passerr = "Le due password non coincidono o la password non rispetta i parametri.";
                    }
                }
            }

            if(isset($err))
                $err=$passerr;
            else
                $err=$err."<br>".$passerr;
                
                

        if ($password === true && $name === true) {
            $password = mysqli_real_escape_string($dbw, $_POST["password"]);
            $name = mysqli_real_escape_string($dbw, $_POST["name"]);

            $sql = "SELECT username, pwd FROM users WHERE username='$name'";
            $usernameresult = mysqli_query($dbw, $sql);
            $count = mysqli_num_rows($usernameresult);
            if ($count > 0) {
                $nameerr = "Utente già presente nel sistema.";
            } else {
                $sql = "INSERT INTO users (username, pwd) VALUES ('$name', '$password')";
                mysqli_query($dbw, $sql);
                $utentecreato = true;
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
                <a href="libri.php">Libri</a>
                <a class="active" href="new.php">Registrami</a>
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

        <div class="card card-login">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    Username: <input type="text" class="textinput" name="name" placeholder="Inserisci uno username.."><br><br>
                    Password: <input type="password" class="textinput" name="password" placeholder="Inserisci una password.."><br><br>
                    Ripeti la Password: <input type="password" class="textinput" name="password2" placeholder="Ripeti la password.."><br><br>
                    <div style="text-align: center;">
                        <input Style="margin-right:10px;" type="reset" class="btn" value="Reset">    
                        <input type="submit" class="btn" value="Registrati">
                    </div>
                    <br>
                    <?php if ($utentecreato === true) {
                        echo "Uetnte " . $name . " creato con successo.";
                    }
                    $utentecreato = false;
                    ?>
                </form>
        </div>
        
        <div class="notif peek"><?php
                if(isset($err))
                    echo $err;
            ?></div>   

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