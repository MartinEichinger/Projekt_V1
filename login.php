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
    <title>Image2Food – Sag mir was ich daraus kochen kann – Login</title>
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
        <h1>Login</h1>
        <?php
        @require("login.inc.php");

        class Login
        {
            public function _login()
            {
                if ($this->plausibilisieren()) $this->anmelden_db();
            }

            private function plausibilisieren()
            {
                // Fehlervariable
                $anmelden = 0;
                $a = new Plausi();

                $anmelden += $a->nutzerdatentest($_POST['userid']);
                $anmelden += $a->nutzerdatentest($_POST['pw']);

                // Testausgaben für den derzeitigen Stand
                // des Projekts
                echo "Die Eingaben: <hr />";
                print_r($_POST);
                echo "<br />Fehleranzahl: " . $anmelden . "<hr />";
                if ($anmelden == 0) return true;
                else return false;
            }

            private function anmelden_db()
            {
                $vorhanden = false;
                @require_once("db.inc.php");

                if ($stmt = $pdo->prepare("SELECT userid, pw FROM mitglieder")) {
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                        if (isset($_POST["userid"]) && $_POST["userid"] == $row['userid'] && md5($_POST["pw"]) == $row['pw']) {
                            $vorhanden = true;
                            break;
                        }
                    }
                }
                if ($vorhanden) {
                    var_dump($_SESSION);
                    $_SESSION["name"] = $_POST["userid"];
                    $_SESSION["login"] = "true";
                    $dat = "index.php";
                } else {
                    $dat = "loginfehler.php";
                }
                header("Location: $dat");
            }
        }

        $regobj = new Login();
        if (sizeof($_POST) > 0) {
            $regobj->_login();
        }

        ?>
    </div>
</body>

</html>