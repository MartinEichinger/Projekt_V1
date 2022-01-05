<form method="post" action="login.php" id="loginform">
  <label class="reg_label">Userid</label>
  <span class="pflichtmarker"> * </span>
  <input name="userid" maxlength="20">
  <span class="fehlermeldung"></span>
  <br />

  <label class="reg_label">Passwort</label>
  <span class="pflichtmarker"> * </span>
  <input name="pw" type="password" maxlength="50">
  <span class="fehlermeldung"></span>
  <br />

  <img src="captchagenerieren.php" alt="Captcha" class="captcha" />
  <br />

  <label class="reg_label">Captcha</label>
  <span class="pflichtmarker"> * </span>
  <input name="captcha" />
  <span class="fehlermeldung"></span>
  <br />

  <input type="submit" value="Daten absenden" class="hlink">
</form>

<div id="meldung" style="top: -250px"></div>