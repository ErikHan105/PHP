<H1>Ajouter des options à votre annonces</H1>
<div class="info">
Les options permet de vendre plus rapidement votre objet et d'augmenter la visibilité de votre annonces. Ces options ne sont pas obligatoire mais vivement conseiller pour augmenter vos ventes.
</div>
<form method="POST">
{photo_pack}
{urgence_pack}
{remonter_semaine_pack}
{remonter_mois_pack}
<div style="overflow:auto;">
	<div style="float:right;font-size: 22px;" id="totalCmd">
		Total : {total}
	</div>
</div>
<input type="hidden" name="md5" value="{md5}">
<input type="hidden" name="step" value="3">
<input type="submit" value="Suivant" class="btnConfirm">
</form>