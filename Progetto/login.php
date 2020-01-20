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
        include("session.php");
        $name = $password = false;
        $nameerr = $passworderr = $error = "";
        $utentetrovato = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"]))
                    $nameerr = "Devi inserire uno username!";
                else
                    $name = true;

            if (empty($_POST["password"]))
                $passworderr = "Devi inserire una password!";
            else
                $password = true;


            if ($password == true && $name == true) {
                $password = mysqli_real_escape_string($dbw, $_POST["password"]);
                $name = mysqli_real_escape_string($dbr, $_POST["name"]);

                $sql = "SELECT username, pwd FROM users WHERE username='$name' AND pwd='$password'";
                $result = mysqli_query($dbr, $sql);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $count = mysqli_num_rows($result);

                if ($count == 1) {
                    $cookie_name = "last_login";
                    $_SESSION["login_user"] = $name;
                    setcookie($cookie_name, $name, time() + (86400 * 2), "/");
                    header("location: libri.php");
                }
                else {
                    $error = "Il tuo username o la tua password non sono validi.";
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
                <a href="new.php">Registrami</a>
                <?php
                    if (empty($_SESSION["login_user"]))
                        echo '<a class="active" href="login.php">Login</a>';
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
            <form method="post" action="
                <?php
                    echo htmlspecialchars($_SERVER["PHP_SELF"]);
                ?>
            ">
                Username: <br><input type="text" name="name" class="textinput" placeholder="Inserisci il tuo username.." value="<?php
                        if (isset($_COOKIE["last_login"]))
                            echo $_COOKIE["last_login"];
                    ?>"><br>
                Password: <br><input type="password" name="password" class="textinput" placeholder="Inserisci la tua password..">
                <br><br>
                <div style="text-align: center;">
                    <input Style="margin-right:10px;" type="reset" class="btn" value="Reset">    
                    <input type="submit" class="btn" value="Login">
                </div>
            </form>
        </div>

        <div class="notif peek"><?php echo $error; ?></div>
        <div class="notif peek"><?php echo $nameerr; ?></div>
        <div class="notif peek"><?php echo $passworderr; ?></div>

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