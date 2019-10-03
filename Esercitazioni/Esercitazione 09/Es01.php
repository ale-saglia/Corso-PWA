<!DOCTYPE html>
<?php
function composeURL() {
    $protocollo = $_SERVER['SERVER_PROTOCOL'];
    $name = $_SERVER['HTTP_HOST'];
    $request = $_SERVER['REQUEST_URI'];
    $url = '';

    if (preg_match("/[A-Za-z]+/", $protocollo, $matches)){
        $url .= strtolower($matches[0])."://";
    }

    $url .= $name.$request;
    return $url;
}

function getBrowser()
{
/*Per l'acquisizione del browser partiamo dalla variabile HTTP_USER_AGENT. Questa variabile pero' contiene numerosi elementi aggiuntivi, come la piattaforma su cui lo user agent e' in funzione, descrizione sul formato si puo trovare in RFC 2616 (14.43 - User Agent), in cui in essenza il campo puo' contenere molteplici informazioni e commenti, e varia significativamente da browser a browser. Nel seguito, per presentare un'informazione concisa, vengono identificati alcuni pattern di alcuni specifici browser tramite un'espressione regolare, e poi utilizzata una sigla facilmente comprensibile dall'utente. 
Da notare che questa regExp vada estesa/aggiornata periodicamente, ad esempio con l'uscita di nuovi browser, per includere nell'elaborazione browser assenti e/o di nuova uscita*/
  $userAgent = $_SERVER['HTTP_USER_AGENT']; 
    
  $regex = "/(MSIE|Edge|Firefox|Chrome|Safari|Opera|Netscape)[\s:\/]([\d]+(\.[\d]+)*)/i";
  //
  if (preg_match($regex, $userAgent, $matches)) 
  { 
    $version = $matches[2]; 
        
    switch(strtolower($matches[1]))
    {
      case 'msie':
        $name = 'Internet Explorer'; 
        break;
      case 'edge':
        $name = 'Microsoft Edge'; 
        break;
      case 'firefox':
        $name = 'Mozilla Firefox'; 
        break;
      case 'chrome':
        $name = 'Google Chrome'; 
        break;
      case 'safari':
        $name = 'Apple Safari'; 
        break;
      case 'opera':
        $name = 'Opera'; 
        break;
      case 'netscape':
        $name = 'Netscape'; 
        break;
      }     
      return "$name $version";
    } 
 else 
   return $userAgent; 

}
?>

<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.1</title>
        <meta name="author" content="Paolo Rossi" >
        <link rel="stylesheet" type="text/css" href="Es01_style.css" >
    </head>
    <body>
      <h1>Esercizio 9.1</h1>
        <p>Benvenuto,</p>
        <p>hai richiesto la pagina <span class="info"><?php echo composeURL();?></span> utilizzando il metodo <span class="info"><?php echo $_SERVER['REQUEST_METHOD'];?></span>.</p>
        <p>Stai usando il browser <span class="info"><?php echo getBrowser();?></span> dal nodo con indirizzo IP <span class="info"><?php echo $_SERVER['REMOTE_ADDR'];?></span>.</p>
        <p>Sei collegato al server <span class="info"><?php echo $_SERVER['SERVER_NAME'];?></span> (indirizzo IP <span class="info"><?php echo $_SERVER['SERVER_ADDR'];?></span> e porta <span class="info"><?php echo $_SERVER['SERVER_PORT'];?>/TCP</span>).</p>
    </body>
</html>
