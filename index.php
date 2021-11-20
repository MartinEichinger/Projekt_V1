<?php
setcookie("Image2Food", time(), time() + (60 * 60 * 24 * 120), "/", "localhost", false, true);
session_start();
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soziales Netzwerk</title>
</head>

<body>
    <div id="nav">
        <?php
        //var_dump($_SESSION);
        if (
            isset($_SESSION["login"]) &&
            ($_SESSION["login"] == "true")
        ) {
            require("navmitglieder.php");
        } else {
            require("nav.php");
        }
        ?>
    </div>
    <div id="content">
        <h1>Image2Food - Sag mir, was ich daraus kochen kann</h1>
        <h2>Das soziale, multimediale Netzwerk für Kochideen</h2>
        <?php
        class Index
        {
            function besucher()
            {
                if (isset($_SESSION['login']) && $_SESSION['login'] == "true") {
                    echo "<div id='indextext'><h3>Mitliederbereich</h3>" .
                        "Sie sind angemeldet.</div>";
                } else if (isset($_SESSION['login']) && $_SESSION['login'] == "false") {
                    echo "<div id='indextext'>Sie können sich jetzt zum Mitgliederbereich anmelden.</div>";
                } else if (isset($_COOKIE['Image2Food'])) {
                    echo "<div id='indextext'>Schön, Sie wiederzusehen. " .
                        "Melden Sie sich an, um in den geschlossenen Mitgliederbereich zu gelangen, " .
                        "wenn Sie sich schon registriert haben.</div>";
                } else {
                    echo "<div id='indextext'>Willkommen " .
                        "auf unserer Webseite. " .
                        "Schauen Sie sich um. " .
                        "Sie können sich hier registrieren und dann " .
                        "in einem geschlossenen " .
                        "Mitgliederbereich anmelden.</div>";
                }
            }
        }
        $obj = new Index();
        $obj->besucher();
        ?>
    </div>
</body>

</html>