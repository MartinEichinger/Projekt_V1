<h1 class="formueberschrift">Wählen Sie eine Datei zum Upload aus</h1>
<form action="bildspeichern.php" method="post" enctype="multipart/form-data" id="uploadform">
    <label class="reg_label">Bildauswahl</label>
    <span class="pflichtmarker"> * </span>
    <input name="datei" type="file" />
    <span class="fehlermeldung"></span>
    <br />

    <h4 class="spezielleUeber">Zusätzliche Informationen zum Bild</h4>
    <textarea name="zusatzinfos" cols="110" rows="5"></textarea>
    <br />

    <input type="submit" value="Starte Upload" class="hlink" />
</form>

<div id="meldung">
    <?php
    if (isset($_SESSION['upload'])) {
        echo '<script>document.getElementById("meldung").style.visibility = "visible";
    window.setTimeout(re, 3000);</script>';
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>
</div>
<script type="text/javascript" src="lib/js/index.js"></script>