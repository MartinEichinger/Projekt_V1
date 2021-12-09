<?php
session_start();
/**
 * Festlegung der Untergrenze für die PHP-Version
 * @version: 1.0
 */
if (0 > version_compare(PHP_VERSION, '5')) {
    die('<h1>Für diese Anwendung ' .
        'ist mindestens PHP 5 notwendig</h1>');
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Image2Food – Sag mir was ich daraus kochen kann – Registrierung</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div id="nav">
        <?php
        @require("nav.php");
        @require("plausi.inc.php");
        ?>
    </div>
    <div id="content">
        <h1>Registrierung</h1>

        <?php
        @require("registrieren.inc.php");

        class Registrierung
        {
            public function registrieren() 
            {
                if ($this->plausibilisieren()) $this->eintragen_db();
            }

            private function plausibilisieren()
            {
                // Fehlervariable
                $anmelden = 0;
                $p = new Plausi();

                $anmelden += $p->namentest($_POST['name']);
                $anmelden += $p->namentest($_POST['vorname']);
                $anmelden += $p->emailtest($_POST['email']);
                $anmelden += $p->nutzerdatentest($_POST['userid']);
                $anmelden += $p->nutzerdatentest($_POST['pw']);
                $anmelden += $p->captchatest($_POST['captcha']);

                // Kritische Zeichen auf der freien Eingabe
                // der Zusatzinfos eliminieren
                $_POST['zusatzinfos'] =
                    preg_replace(
                        "/[<|>|$|%|&|§]/",
                        "#",
                        $_POST['zusatzinfos']
                    );

                // Testausgaben für den derzeitigen Stand
                // des Projekts
                echo "Die Eingaben: <hr />";
                print_r($_POST);
                echo "<br />Fehleranzahl: " . $anmelden . "<hr />";
                if ($anmelden == 0) return true;
                else return false;
            }

            private function eintragen_db()
            {
                @require_once("db.inc.php");

                if ($stmt = $pdo->prepare(
                    "INSERT INTO mitglieder" .
                        " (name, vorname, email, zusatzinfos, rolle, userid, pw)" .
                        " VALUES (:name, :vorname, :email, :zusatzinfos, :rolle, :userid, :pw)"
                )) {
                    if ($stmt->execute(
                        array(
                            ':name' => $_POST["name"],
                            ':vorname' => $_POST["vorname"],
                            ':email' => $_POST["email"],
                            ':zusatzinfos' => $_POST["zusatzinfos"],
                            ':rolle' => "Mitglied",
                            ':userid' => $_POST["userid"],
                            ':pw' => md5($_POST["pw"])
                        )
                    )) {
                        $_SESSION["name"] = $_POST["userid"];
                        $_SESSION["login"] = "false";
                        $dat = "index.php";
                    } else {
                        $dat = "regfehler.php";
                    }
                    header("Location: $dat");
                }
            }
        }

        $regobj = new Registrierung();
        if (sizeof($_POST) > 0) {
            $regobj->registrieren();
        }

        ?>
    </div>
</body>

</html>