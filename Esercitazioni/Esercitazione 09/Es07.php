<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.7</title>
        <meta name="author" content="Alessandro Saglia" >
        <style type="text/css">p.err {color:red} span.dato_utente {font-style:italic}</style>
    </head>
    
    <body>
      <h1>Esercizio 9.7</h1>
      <?php 
         if(isset($_REQUEST['nome']) && isset($_REQUEST['cognome']) && isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['email']))
         {
            $nome = trim($_REQUEST['nome']);
            $cognome = trim($_REQUEST['cognome']);
            $username = trim($_REQUEST['username']);
            $password = trim($_REQUEST['password']);
            $email = trim($_REQUEST['email']);

            $regNomeCognome = "/^[A-Z][\sA-Za-z]{0,29}$/";
            $regUsername = "/^[A-Za-z\d\-+.]{6,20}$/";
            $regPassword = "/^(?=(.*[\d]){2})(?=.*[A-Z])(?=.*[a-z])[A-Za-z\d]{8,16}$/";
          
            if( !preg_match($regNomeCognome,$nome) )
              echo "<p class=\"err\">Formato nome non valido! Deve iniziare con una lettera maiuscola, contenere solo lettere e non deve superare i 30 caratteri </p>";
            elseif( !preg_match($regNomeCognome,$cognome) )
              echo "<p class=\"err\">Formato cognome non valido! Deve iniziare con una lettera maiuscola, contenere solo lettere e non deve superare i 30 caratteri </p>";
            elseif( !preg_match($regUsername,$username) )
              echo "<p class=\"err\">Formato username non valido! Deve contenere minimo 6 caratteri e massimo 20 carattere. I caratteri ammissibili sono quelli alfanumerici, il punto, il pi&ugrave ed il meno </p>";
            elseif( !preg_match($regPassword,$password) )
              echo "<p class=\"err\">La password inserita non rispetta gli standard di sicurezza! Deve contenere minimo 8 e massimo 16 caratteri, scelti tra quelli alfanumerici, e deve contenere almeno due cifre, una lettera maiuscola e una minuscola</p>";
            elseif( !filter_var($email, FILTER_VALIDATE_EMAIL) )
              echo "<p class=\"err\">Formato e-mail non valido!</p>";
            else
             echo "<p class=\"err\">Caro <span class=\"dato_utente\"> $nome $cognome </span>, abbiamo ricevuto correttamente i tuoi dati.</p>\n<p>Lo username scelto &egrave; <span class=\"dato_utente\">$username</span>, la tua password contiene <span class=\"dato_utente\">".strlen($password)."</span> caratteri e soddisfa i requisiti minimi di sicurezza. Ulteriori informazioni saranno inviate all'indirizzo mail <span class=\"dato_utente\">$email</span>.</p>";
        }
        else
          echo "<p class=\"err\">Errore - Dati Mancanti</p>\n";
      ?>
    </body>
</html>
