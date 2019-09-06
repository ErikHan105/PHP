<div class="container topMargin">
	<H1>Connectez vous à votre compte</H1>
	{error_message}
	<form method="POST" action="connexion.php">
		<input type="email" id="email" name="email" placeholder="Votre adresse email" class="inputbox">
		<input type="password" id="password" name="password" placeholder="Votre mot de passe" class="inputbox">
		<div class="login-btn-connexion">
			<input type="hidden" name="action" value="1">
			<input type="submit" value="Se Connecter" class="btnConfirm">
		</div>
	</form>	
	<div class="boxsubscribe-login">
		<p>Vous n'avez pas de compte vous pouvez en créer gratuitement</p>
		<div class="btn-separate-login">
			<button onclick="location.href='lostpassword.php'" class="btnConfirm">Mot de passe oublié ?</button>
		</div>
		<div class="btn-separate-login">
			<button onclick="location.href='subscribe.php'" class="btnConfirm">Créer un compte gratuitement</button>
		</div>
	</div>
</div>