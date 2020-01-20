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
                    echo '<h2 style="text-align: center;">Attenzione! Per accedere a questa sezione è necessario essere autenticati.</h2>
                        <p style="text-align: center;">Utilizza i menu in alto per accedere o registrarti!</p>';
                }
                else{
                    echo '<p>temp</p>';
                }
            ?>
        </div>

        <div class="card">
            <h2>Libri in prestito</h2>
            <form method="post" action="<?php echo htmlspecialchars("restituisci.php    "); ?>">
                <table>
                    <tr>
                        <th>Autore</th>
                        <th>Titolo</th>
                        <th>Restituisci</th>
                    </tr>
                                
                    <?php
                        $sql = "SELECT * FROM books";
                        $resultlibri = mysqli_query($dbr, $sql);
                        if (mysqli_num_rows($resultlibri) > 0) {
                            while ($row = mysqli_fetch_assoc($resultlibri)) {
                                if ($row["prestito"] == $_SESSION["login_user"]) {
                                    echo "<tr><td>" . $row["autori"] . "</td><td>" . $row["titolo"] . "</td>
                                        <td class='input'><input type='submit' class='btn' name='" . $row["id"] . "'value='RESTITUISCI' formaction='restituisci.php'></td>";
                                }
                                echo "</tr>";
                            }
                        }
                    ?>
                </table>
            </form>
      </div>

      <div class="card">
      <div class="tabella">
        <h2>Elenco libri</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <table>
            <tr>
              <th>Autore</th>
              <th>Titolo</th>
              <th>Prestito</th>
            </tr>
            <?php
            $sql = "SELECT * FROM books";
            $resultlibri = mysqli_query($dbr, $sql);
            if (mysqli_num_rows($resultlibri) > 0) {
              while ($row = mysqli_fetch_assoc($resultlibri)) {
                echo "<tr><td>" . $row["autori"] . "</td><td>" . $row["titolo"] . "</td>";
                if ($row["prestito"] == $_SESSION["login_user"]) {
                  if (time() - strtotime($row["data"]) > $row["giorni"] * 60 * 60 * 24)
                    echo "<td style='text-align: center'>PRESTITO SCADUTO</td>";
                  else {
                    echo "<td style='text-align: center'>IN PRESTITO</td>";
                  }
                } else if (!empty($row["prestito"])) {
                  echo "<td style='text-align: center'>NON DISPONIBILE</td>";
                } else {
                  echo "<td style='text-align: center'><input type='checkbox' name='checkbox[]' value='" . $row["id"] . "'></input></td>";
                }
                echo "</tr>";
              }
            } ?>
          </table>
          <div class="notif peek"><?php echo $error; ?></div>

          <div style="float:right;">
            <input class="textinput" type="text" name="numgiorni" placeholder="Inserisci per quanti giorni">
            <input class="btn" type="submit" value="PRESTITO">
        </div>
        </form>
      </div>
    </div>
    </div>
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