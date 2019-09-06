<div class="container topMargin">
	<H1>Contactez-nous</H1>
	<p>
	Vous rencontrer un problème technique, vous avez besoin d'un renseignement ? Contactez-nous directement depuis ce formulaire.
	</p>
	{valid_msg}
	<form method="POST">
		<label>Email :</label>
		<input type="email" id="email" name="email" placeholder="Votre adresse email" class="inputbox" required>
		<label>Nom :</label>
		<input type="text" name="nom" placeholder="Votre nom" class="inputbox" required>
		<label>Message :</label>
		<textarea name="message" class="textareabox" placeholder="Votre message" required></textarea>
		<input type="hidden" name="action" value="1">
		<input type="submit" value="Envoyer" class="btnConfirm">
	</form>
</div>