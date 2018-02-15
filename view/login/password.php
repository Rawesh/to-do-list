<link rel="stylesheet" href="<?= URL ?>css/login.css">
<nav>
	<button id="help">?</button>
</nav>

<article>
	<fieldset>
		<form action="<?=URL?>personalia/getUserPassword" method="post" id="form1">
			<header>Vul het emailadres in om uw gegevens te krijgen</header>
			<br>
			<label>E-mail</label>
			<br>
			<input type="email" name="email" required>
			<br><br>
			<button type="submit">Verzend</button>
			<br><br>
			<?php if ($_POST): ?>	
				<?php foreach ($user_datas as $data) {  ?>				
					<label>Voornaam: <?= $data['firstname'] ?></label>
					<br><br>
					<label>Achternaam: <?= $data['lastname'] ?></label>
					<br><br>
					<label>Wactwoord: <?= $data['user_password'] ?></label>
				<?php } ?>
			<?php endif ?>
		</form>
	</fieldset>
</article>