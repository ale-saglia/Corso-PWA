<?php
  if((empty($_SESSION["login_user"])))
    header("Location: libri.php");
?>

<h2>In tuo possesso</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <table>
                    <tr>
                        <th>Autore</th>
                        <th>Titolo</th>
                        <th>Azione</th>
                    </tr>
                                
                    <?php
                        $sql = "SELECT * FROM books";
                        $resultlibri = mysqli_query($dbr, $sql);
                        if (mysqli_num_rows($resultlibri) > 0) {
                            while ($row = mysqli_fetch_assoc($resultlibri)) {
                                if ($row["prestito"] == $_SESSION["login_user"]) {
                                    echo "<tr><td>" . $row["autori"] . "</td><td>" . $row["titolo"] . "</td>
                                        <td class='input'><input type='submit' class='btn' name='" . $row["id"] . "'value='Restituisci'></td>";
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
        <h2>Tutti i libri</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <table>
            <tr>
              <th>Autore</th>
              <th>Titolo</th>
              <th>Azione</th>
            </tr>
            <?php
            $sql = "SELECT * FROM books";
            $resultlibri = mysqli_query($dbr, $sql);
            if (mysqli_num_rows($resultlibri) > 0) {
              while ($row = mysqli_fetch_assoc($resultlibri)) {
                echo "<tr><td>" . $row["autori"] . "</td><td>" . $row["titolo"] . "</td>";
                if ($row["prestito"] == $_SESSION["login_user"]) {
                  if (time() - strtotime($row["data"]) > $row["giorni"] * 86400)
                    echo "<td style='text-align: center'>Prestito scaduto</td>";
                  else {
                    echo "<td style='text-align: center'>In prestito</td>";
                  }
                } else if (!empty($row["prestito"])) {
                  echo "<td style='text-align: center'>Non disponibile</td>";
                } else {
                  echo "<td style='text-align: center'><input type='checkbox' name='checkbox[]' value='" . $row["id"] . "'></input></td>";
                }
                echo "</tr>";
              }
            } ?>
          </table>
          

          <div style="float:right;">
            <input class="textinput" style="width: 250px;" type="text" name="numgiorni" placeholder="Per quanti giorni vuoi richiederlo?">
            <input class="btn" type="submit" value="Richiedi">
        </div>
        </form>