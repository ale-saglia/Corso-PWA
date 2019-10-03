<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <title>Esercizio 9.2</title>
        <meta name="author" content="Alessandro Saglia">
    </head>

    <body>
        <h1>Esercizio 9.2</h1>
        <p>Benvenuto!</p>

        <?php
            $time = time();
            $data = date("d/m/Y", $time);
            $ora = date("H:i:s", $time);
            echo "<p>Qui sul server sono le $ora del $data</p>";
        ?>

        <script type="text/javascript">
            "use scipt";
            function pad(n){
                if(n < 10)
                    return "0" + n;
                else
                    return n;
            }

            var time = new Date();
            var day = time.getDate();
            var month = time.getMonth()+1;
            var year = time.getFullYear();
            var data = "";

            data = pad(day)+"/";
            data = data + pad(month)+"/";
            data = data+year;

            var timeStamp = "";
            var hour = time.getHours();
            var minutes = time.getMinutes();
            var seconds = time.getSeconds();

            timeStamp = pad(hour)+":";
            timeStamp = timeStamp + pad(minutes) + ":";
            timeStamp = timeStamp + pad(seconds);

            document.write("<p>Sul client sono le " + timeStamp + " del " + data + "<\/p>");
        </script>
    </body>
</html>