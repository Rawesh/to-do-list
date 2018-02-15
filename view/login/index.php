<link rel="stylesheet" href="<?= URL ?>css/login.css">
<nav>
	<button id="help">?</button>
</nav>

<article>
	<fieldset>
		<form action="<?=URL?>login/create" method="post" id="form1">
			<label>Voornaam</label><br>
			<input type="text" name="user_firstname" required><br>
			<label>Achternaam</label><br>
			<input type="text" name="user_lastname" required>
			<br><br>
			<label>E-mail</label><br>
			<input type="email" name="user_email" required><br>
			<label>Wachtwoord</label><br>
			<input type="password" name="user_password" required>
			<br><br>
			<button id="created" type="submit">Registreer</button>
		</form>

		<hr>

		<form action="<?=URL?>login/acces" method="post" id="form2">
			<label>E-mail</label><br>
			<input type="email" name="user_email"><br>
			<label>Wachtwoord</label><br>
			<input type="password" name="user_password">
			<br><br>
			<button name="login" type="submit">Log in</button>
			<!-- <button><a href="<?=URL?>login/userPassword">Wachtwoord vergeten</a></button> -->
		</form>
	</fieldset>
</article>