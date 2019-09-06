<?php

$langue = getConfig("langue_administration");

function getAutorisationModerateur($option)
{
	$o = getConfig("option_moderateur");
	$o = explode(",",$o);
	
	for($x=0;$x<count($o);$x++)
	{
		if($o[$x] == $option)
		{
			return true;
		}
	}
	
	return false;
}

?>
<div class="sidebar">
	<a href="home.php">
				<div class="blocksidebar">
					<img src="images/dashboard-icon.png"> Tableau de bord
				</div>
	</a>
	<?php
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("configuration"))
		{
			?>
			<a href="configuration.php">
				<div class="blocksidebar">
					<img src="images/setting-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Configuration
						<?php
					}
					if($langue == 'en')
					{
						?>
						Configuration
						<?php
					}
					if($langue == 'it')
					{
						?>
						Configurazione
						<?php
					}
					if($langue == 'bg')
					{
						?>
						конфигурация
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="configuration.php">
		<div class="blocksidebar">
			<img src="images/setting-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Configuration
				<?php
			}
			if($langue == 'en')
			{
				?>
				Configuration
				<?php
			}
			if($langue == 'it')
			{
				?>
				Configurazione
				<?php
			}
			if($langue == 'bg')
			{
				?>
				конфигурация
				<?php
			}
			?>
		</div>
	</a>
	<!--<a href="boutique.php">
		<div class="blocksidebar">
			<img src="images/setting-icon.png"> Boutique
		</div>
	</a>-->
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("design"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(4);">
				<div class="blocksidebar">
					<img src="images/design-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Design & Apparence
						<?php
					}
					if($langue == 'en')
					{
						?>
						Design & Appearance
						<?php
					}
					if($langue == 'it')
					{
						?>
						Design e aspetto
						<?php
					}
					if($langue == 'bg')
					{
						?>
						Дизайн и външен вид
						<?php
					}
					?>
				</div>
			</a>
			<div id="menutab-4" class="menutab" style="display:none;">
				<a href="parametretemplate.php">
					<div class="blocksidebar">
						<img src="images/setting-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Paramètre du template
							<?php
						}
						if($langue == 'en')
						{
							?>
							Template parameter
							<?php
						}
						if($langue == 'it')
						{
							?>
							Parametro del modello
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Параметър на шаблона
							<?php
						}
						?>
					</div>
				</a>
				<a href="edittemplate.php">
					<div class="blocksidebar">
						<img src="images/template-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Edition du template
							<?php
						}
						if($langue == 'en')
						{
							?>
							Template editing
							<?php
						}
						if($langue == 'it')
						{
							?>
							Modifica del modello
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Редактиране на шаблони
							<?php
						}
						?>
					</div>
				</a>
				<a href="template.php">
					<div class="blocksidebar">
						<img src="images/template-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Template
							<?php
						}
						if($langue == 'en')
						{
							?>
							Template
							<?php
						}
						if($langue == 'it')
						{
							?>
							Sagoma
							<?php
						}
						if($langue == 'bg')
						{
							?>
							шаблон
							<?php
						}
						?>
					</div>
				</a>
				<a href="apparence.php">
					<div class="blocksidebar">
						<img src="images/color-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Couleur du site
							<?php
						}
						if($langue == 'en')
						{
							?>
							Color of the site
							<?php
						}
						if($langue == 'it')
						{
							?>
							Colore del sito
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Цвят на сайта
							<?php
						}
						?>
					</div>
				</a>
				<a href="menu.php">
					<div class="blocksidebar">
						<img src="images/menu-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Menu
							<?php
						}
						if($langue == 'en')
						{
							?>
							Menu
							<?php
						}
						if($langue == 'it')
						{
							?>
							Menu
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Menu
							<?php
						}
						?>
					</div>
				</a>
				<a href="footer.php">
					<div class="blocksidebar">
						<img src="images/seo-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Footer
							<?php
						}
						if($langue == 'en')
						{
							?>
							Footer
							<?php
						}
						if($langue == 'it')
						{
							?>
							Footer
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Footer
							<?php
						}
						?>
					</div>
				</a>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(4);">
		<div class="blocksidebar">
			<img src="images/design-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Design & Apparence
				<?php
			}
			if($langue == 'en')
			{
				?>
				Design & Appearance
				<?php
			}
			if($langue == 'it')
			{
				?>
				Design e aspetto
				<?php
			}
			if($langue == 'bg')
			{
				?>
				Дизайн и външен вид
				<?php
			}
			?>
		</div>
	</a>
	<div id="menutab-4" class="menutab" style="display:none;">
		<a href="parametretemplate.php">
			<div class="blocksidebar">
				<img src="images/setting-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Paramètre du template
					<?php
				}
				if($langue == 'en')
				{
					?>
					Template parameter
					<?php
				}
				if($langue == 'it')
				{
					?>
					Parametro del modello
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Параметър на шаблона
					<?php
				}
				?>
			</div>
		</a>
		<a href="edittemplate.php">
			<div class="blocksidebar">
				<img src="images/template-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Edition du template
					<?php
				}
				if($langue == 'en')
				{
					?>
					Template editing
					<?php
				}
				if($langue == 'it')
				{
					?>
					Modifica del modello
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Редактиране на шаблони
					<?php
				}
				?>
			</div>
		</a>
		<a href="template.php">
			<div class="blocksidebar">
				<img src="images/template-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Template
					<?php
				}
				if($langue == 'en')
				{
					?>
					Template
					<?php
				}
				if($langue == 'it')
				{
					?>
					Sagoma
					<?php
				}
				if($langue == 'bg')
				{
					?>
					шаблон
					<?php
				}
				?>
			</div>
		</a>
		<a href="apparence.php">
			<div class="blocksidebar">
				<img src="images/color-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Couleur du site
					<?php
				}
				if($langue == 'en')
				{
					?>
					Color of the site
					<?php
				}
				if($langue == 'it')
				{
					?>
					Colore del sito
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Цвят на сайта
					<?php
				}
				?>
			</div>
		</a>
		<a href="menu.php">
			<div class="blocksidebar">
				<img src="images/menu-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Menu
					<?php
				}
				if($langue == 'en')
				{
					?>
					Menu
					<?php
				}
				if($langue == 'it')
				{
					?>
					Menu
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Menu
					<?php
				}
				?>
			</div>
		</a>
		<a href="footer.php">
			<div class="blocksidebar">
				<img src="images/seo-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Footer
					<?php
				}
				if($langue == 'en')
				{
					?>
					Footer
					<?php
				}
				if($langue == 'it')
				{
					?>
					Footer
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Footer
					<?php
				}
				?>
			</div>
		</a>
	</div>
	<?php
	}
	?>
	<a href="firewall.php">
		<div class="blocksidebar">
			<img src="images/firewall-icon.png"> Firewall
		</div>
	</a>
	<a href="javascript:void(0);" onclick="showMenuTab(8);">
		<div class="blocksidebar">
			<img src="images/design-icon.png"> Service
		</div>
	</a>
	<div id="menutab-8" class="menutab" style="display:none;">
		<a href="googleanalytics.php">
			<div class="blocksidebar">
				<img src="images/google-analytics-mini-icon.png"> Google Analytics
			</div>
		</a>
		<a href="googlerecaptcha.php">
			<div class="blocksidebar">
				<img src="images/google-recaptcha-icon.png"> Google reCAPTCHA
			</div>
		</a>
		<a href="googlesignin.php">
			<div class="blocksidebar">
				<img src="images/google-sign-in-icon.png"> Google Sign-in
			</div>
		</a>
		<!--<a href="parametretemplate.php">
			<div class="blocksidebar">
				<img src="images/setting-icon.png"> Facebook Connect
			</div>
		</a>-->
	</div>
	<?php
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("maintenance"))
		{
			?>
			<a href="maintenance.php">
				<div class="blocksidebar">
					<img src="images/maintenance-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Maintenance
						<?php
					}
					if($langue == 'en')
					{
						?>
						Maintenance
						<?php
					}
					if($langue == 'it')
					{
						?>
						Manutenzione
						<?php
					}
					if($langue == 'bg')
					{
						?>
						поддръжка
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="maintenance.php">
		<div class="blocksidebar">
			<img src="images/maintenance-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Maintenance
				<?php
			}
			if($langue == 'en')
			{
				?>
				Maintenance
				<?php
			}
			if($langue == 'it')
			{
				?>
				Manutenzione
				<?php
			}
			if($langue == 'bg')
			{
				?>
				поддръжка
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("annonces"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(5);">
				<div class="blocksidebar">
					<img src="images/annonce-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Annonces
						<?php
					}
					if($langue == 'en')
					{
						?>
						Announcements
						<?php
					}
					if($langue == 'it')
					{
						?>
						Annunci
						<?php
					}
					if($langue == 'bg')
					{
						?>
						Съобщения
						<?php
					}
					?>
				</div>
			</a>
			<div id="menutab-5" class="menutab" style="display:none;">
			<?php
			if(getAutorisationModerateur("gestion_annonces"))
			{
				?>
				<a href="annonce.php">
					<div class="blocksidebar">
						<img src="images/annonce-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Gestion des annonces
							<?php
						}
						if($langue == 'en')
						{
							?>
							Ad Management
							<?php
						}
						if($langue == 'it')
						{
							?>
							Gestione degli annunci
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Управление на реклами
							<?php
						}
						?>
					</div>
				</a>
				<?php
			}
			if(getAutorisationModerateur("ajouter_annonces"))
			{
				?>
				<a href="addannonce.php">
					<div class="blocksidebar">
						<img src="images/annonce-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Ajouter une annonce
							<?php
						}
						if($langue == 'en')
						{
							?>
							Add an ad
							<?php
						}
						if($langue == 'it')
						{
							?>
							Aggiungi un annuncio
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Добавете реклама
							<?php
						}
						?>
					</div>
				</a>
				<?php
			}
			if(getAutorisationModerateur("parametre_annonces"))
			{
				?>
				<a href="annonceparametre.php">
					<div class="blocksidebar">
						<img src="images/setting-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Paramètres des annonces
							<?php
						}
						if($langue == 'en')
						{
							?>
							Ads settings
							<?php
						}
						if($langue == 'it')
						{
							?>
							Impostazioni annunci
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Настройки за реклами
							<?php
						}
						?>
					</div>
				</a>
				<?php
			}
			?>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(5);">
		<div class="blocksidebar">
			<img src="images/annonce-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Annonces
				<?php
			}
			if($langue == 'en')
			{
				?>
				Announcements
				<?php
			}
			if($langue == 'it')
			{
				?>
				Annunci
				<?php
			}
			if($langue == 'bg')
			{
				?>
				Съобщения
				<?php
			}
			?>
		</div>
	</a>
	<div id="menutab-5" class="menutab" style="display:none;">
		<a href="annonce.php">
			<div class="blocksidebar">
				<img src="images/annonce-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Gestion des annonces
					<?php
				}
				if($langue == 'en')
				{
					?>
					Ad Management
					<?php
				}
				if($langue == 'it')
				{
					?>
					Gestione degli annunci
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Управление на реклами
					<?php
				}
				?>
			</div>
		</a>
		<a href="addannonce.php">
			<div class="blocksidebar">
				<img src="images/annonce-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Ajouter une annonce
					<?php
				}
				if($langue == 'en')
				{
					?>
					Add an ad
					<?php
				}
				if($langue == 'it')
				{
					?>
					Aggiungi un annuncio
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Добавете реклама
					<?php
				}
				?>
			</div>
		</a>
		<a href="annonceparametre.php">
			<div class="blocksidebar">
				<img src="images/setting-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Paramètres des annonces
					<?php
				}
				if($langue == 'en')
				{
					?>
					Ads settings
					<?php
				}
				if($langue == 'it')
				{
					?>
					Impostazioni annunci
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Настройки за реклами
					<?php
				}
				?>
			</div>
		</a>
	</div>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("signalement"))
		{
			?>
			<a href="signalement.php">
				<div class="blocksidebar">
					<img src="images/signalement-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Signalement
						<?php
					}
					if($langue == 'en')
					{
						?>
						Reporting
						<?php
					}
					if($langue == 'it')
					{
						?>
						Segnalazione
						<?php
					}
					if($langue == 'bg')
					{
						?>
						докладване
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="signalement.php">
		<div class="blocksidebar">
			<img src="images/signalement-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Signalement
				<?php
			}
			if($langue == 'en')
			{
				?>
				Reporting
				<?php
			}
			if($langue == 'it')
			{
				?>
				Segnalazione
				<?php
			}
			if($langue == 'bg')
			{
				?>
				докладване
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("region"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(3);">
				<div class="blocksidebar">
					<img src="images/map-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Région / Département / Ville
						<?php
					}
					if($langue == 'en')
					{
						?>
						Region / Department / City
						<?php
					}
					if($langue == 'it')
					{
						?>
						Regione / Dipartimento / Città
						<?php
					}
					if($langue == 'bg')
					{
						?>
						Регион / департамент / град
						<?php
					}
					?>
				</div>
			</a>
			<div id="menutab-3" class="menutab" style="display:none;">
				<a href="carte.php">
					<div class="blocksidebar">
						<img src="images/map-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Carte
							<?php
						}
						if($langue == 'en')
						{
							?>
							Map
							<?php
						}
						if($langue == 'it')
						{
							?>
							Mappa
							<?php
						}
						if($langue == 'bg')
						{
							?>
							карта
							<?php
						}
						?>
					</div>
				</a>
				<a href="region.php">
					<div class="blocksidebar">
						<img src="images/map-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Région
							<?php
						}
						if($langue == 'en')
						{
							?>
							Region
							<?php
						}
						if($langue == 'it')
						{
							?>
							Regione
							<?php
						}
						if($langue == 'bg')
						{
							?>
							област
							<?php
						}
						?>
					</div>
				</a>
				<a href="departement.php">
					<div class="blocksidebar">
						<img src="images/map-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Département
							<?php
						}
						if($langue == 'en')
						{
							?>
							Department
							<?php
						}
						if($langue == 'it')
						{
							?>
							Reparto
							<?php
						}
						if($langue == 'bg')
						{
							?>
							отдел
							<?php
						}
						?>
					</div>
				</a>
				<a href="ville.php">
					<div class="blocksidebar">
						<img src="images/map-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Ville
							<?php
						}
						if($langue == 'en')
						{
							?>
							City
							<?php
						}
						if($langue == 'it')
						{
							?>
							Città
							<?php
						}
						if($langue == 'bg')
						{
							?>
							град
							<?php
						}
						?>
					</div>
				</a>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(3);">
		<div class="blocksidebar">
			<img src="images/map-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Région / Département / Ville
				<?php
			}
			if($langue == 'en')
			{
				?>
				Region / Department / City
				<?php
			}
			if($langue == 'it')
			{
				?>
				Regione / Dipartimento / Città
				<?php
			}
			if($langue == 'bg')
			{
				?>
				Регион / департамент / град
				<?php
			}
			?>
		</div>
	</a>
	<div id="menutab-3" class="menutab" style="display:none;">
		<a href="carte.php">
			<div class="blocksidebar">
				<img src="images/map-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Carte
					<?php
				}
				if($langue == 'en')
				{
					?>
					Map
					<?php
				}
				if($langue == 'it')
				{
					?>
					Mappa
					<?php
				}
				if($langue == 'bg')
				{
					?>
					карта
					<?php
				}
				?>
			</div>
		</a>
		<a href="region.php">
			<div class="blocksidebar">
				<img src="images/map-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Région
					<?php
				}
				if($langue == 'en')
				{
					?>
					Region
					<?php
				}
				if($langue == 'it')
				{
					?>
					Regione
					<?php
				}
				if($langue == 'bg')
				{
					?>
					област
					<?php
				}
				?>
			</div>
		</a>
		<a href="departement.php">
			<div class="blocksidebar">
				<img src="images/map-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Département
					<?php
				}
				if($langue == 'en')
				{
					?>
					Department
					<?php
				}
				if($langue == 'it')
				{
					?>
					Reparto
					<?php
				}
				if($langue == 'bg')
				{
					?>
					отдел
					<?php
				}
				?>
			</div>
		</a>
		<a href="ville.php">
			<div class="blocksidebar">
				<img src="images/map-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Ville
					<?php
				}
				if($langue == 'en')
				{
					?>
					City
					<?php
				}
				if($langue == 'it')
				{
					?>
					Città
					<?php
				}
				if($langue == 'bg')
				{
					?>
					град
					<?php
				}
				?>
			</div>
		</a>
	</div>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("utilisateur"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(2);">
				<div class="blocksidebar">
					<img src="images/user-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Utilisateurs
						<?php
					}
					if($langue == 'en')
					{
						?>
						Users
						<?php
					}
					if($langue == 'it')
					{
						?>
						Utenti
						<?php
					}
					if($langue == 'bg')
					{
						?>
						потребители
						<?php
					}
					?>
				</div>
			</a>
			<div id="menutab-2" class="menutab" style="display:none;">
			<?php
			if(getAutorisationModerateur("gestion_utilisateur"))
			{
				?>
				<a href="user.php">
					<div class="blocksidebar">
						<img src="images/user-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Gestion des utilisateurs
							<?php
						}
						if($langue == 'en')
						{
							?>
							User Management
							<?php
						}
						if($langue == 'it')
						{
							?>
							Gestione degli utenti
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Управление на потребителите
							<?php
						}
						?>
					</div>
				</a>
				<?php
			}
			if(getAutorisationModerateur("gestion_administrateur"))
			{
				?>
				<a href="administrateur.php">
					<div class="blocksidebar">
						<img src="images/user-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Gestion des administrateurs
							<?php
						}
						if($langue == 'en')
						{
							?>
							Administrators management
							<?php
						}
						if($langue == 'it')
						{
							?>
							Gestione degli amministratori
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Управление на администраторите
							<?php
						}
						?>
					</div>
				</a>
				<?php
			}
			if(getAutorisationModerateur("gestion_moderateur"))
			{
				?>
				<a href="moderateur.php">
					<div class="blocksidebar">
						<img src="images/user-icon.png"> Gestion des modérateurs
					</div>
				</a>
				<?php
			}
			?>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(2);">
		<div class="blocksidebar">
			<img src="images/user-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Utilisateurs
				<?php
			}
			if($langue == 'en')
			{
				?>
				Users
				<?php
			}
			if($langue == 'it')
			{
				?>
				Utenti
				<?php
			}
			if($langue == 'bg')
			{
				?>
				потребители
				<?php
			}
			?>
		</div>
	</a>
	<div id="menutab-2" class="menutab" style="display:none;">
		<a href="user.php">
			<div class="blocksidebar">
				<img src="images/user-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Gestion des utilisateurs
					<?php
				}
				if($langue == 'en')
				{
					?>
					User Management
					<?php
				}
				if($langue == 'it')
				{
					?>
					Gestione degli utenti
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Управление на потребителите
					<?php
				}
				?>
			</div>
		</a>
		<a href="administrateur.php">
			<div class="blocksidebar">
				<img src="images/user-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Gestion des administrateurs
					<?php
				}
				if($langue == 'en')
				{
					?>
					Administrators management
					<?php
				}
				if($langue == 'it')
				{
					?>
					Gestione degli amministratori
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Управление на администраторите
					<?php
				}
				?>
			</div>
		</a>
		<a href="moderateur.php">
			<div class="blocksidebar">
				<img src="images/user-icon.png"> Gestion des modérateurs
			</div>
		</a>
	</div>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("language"))
		{
			?>
			<a href="langue.php">
				<div class="blocksidebar">
					<img src="images/language-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Languages
						<?php
					}
					if($langue == 'en')
					{
						?>
						Languages
						<?php
					}
					if($langue == 'it')
					{
						?>
						Lingue
						<?php
					}
					if($langue == 'bg')
					{
						?>
						езици
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="langue.php">
		<div class="blocksidebar">
			<img src="images/language-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Languages
				<?php
			}
			if($langue == 'en')
			{
				?>
				Languages
				<?php
			}
			if($langue == 'it')
			{
				?>
				Lingue
				<?php
			}
			if($langue == 'bg')
			{
				?>
				езици
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("hotline"))
		{
			?>
			<a href="hotline.php">
				<div class="blocksidebar">
					<img src="images/phone-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Hotline
						<?php
					}
					if($langue == 'en')
					{
						?>
						Hotline
						<?php
					}
					if($langue == 'it')
					{
						?>
						Hotline
						<?php
					}
					if($langue == 'bg')
					{
						?>
						Гореща линия
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="hotline.php">
		<div class="blocksidebar">
			<img src="images/phone-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Hotline
				<?php
			}
			if($langue == 'en')
			{
				?>
				Hotline
				<?php
			}
			if($langue == 'it')
			{
				?>
				Hotline
				<?php
			}
			if($langue == 'bg')
			{
				?>
				Гореща линия
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("tchat"))
		{
			?>
			<a href="tchat.php">
				<div class="blocksidebar">
					<img src="images/tchat-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Module Tchat
						<?php
					}
					if($langue == 'en')
					{
						?>
						Module Tchat
						<?php
					}
					if($langue == 'it')
					{
						?>
						Modulo Tchat
						<?php
					}
					if($langue == 'bg')
					{
						?>
						модул чат
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="tchat.php">
		<div class="blocksidebar">
			<img src="images/tchat-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Module Tchat
				<?php
			}
			if($langue == 'en')
			{
				?>
				Module Tchat
				<?php
			}
			if($langue == 'it')
			{
				?>
				Modulo Tchat
				<?php
			}
			if($langue == 'bg')
			{
				?>
				модул чат
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("paiement"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(1);">
				<div class="blocksidebar">
					<img src="images/money-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Paiement
						<?php
					}
					if($langue == 'en')
					{
						?>
						Payment
						<?php
					}
					if($langue == 'it')
					{
						?>
						Pagamento
						<?php
					}
					if($langue == 'bg')
					{
						?>
						плащане
						<?php
					}
					?>
				</div>
			</a>
			<div id="menutab-1" class="menutab" style="display:none;">
				<a href="paiement.php">
					<div class="blocksidebar">
						<img src="images/money-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Transaction & Chiffre d'affaire
							<?php
						}
						if($langue == 'en')
						{
							?>
							Transaction & Turnover
							<?php
						}
						if($langue == 'it')
						{
							?>
							Transazione e fatturato
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Транзакции и оборот
							<?php
						}
						?>
					</div>
				</a>
				<a href="configpaiement.php">
					<div class="blocksidebar">
						<img src="images/money-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Configuration des paiements
							<?php
						}
						if($langue == 'en')
						{
							?>
							Payment configuration
							<?php
						}
						if($langue == 'it')
						{
							?>
							Configurazione di pagamento
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Конфигурация на плащане
							<?php
						}
						?>
					</div>
				</a>
				<a href="parametreavancepaiement.php">
					<div class="blocksidebar">
						<img src="images/money-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Paramètres avancés des paiements
							<?php
						}
						if($langue == 'en')
						{
							?>
							Advanced payment settings
							<?php
						}
						if($langue == 'it')
						{
							?>
							Impostazioni di pagamento avanzate
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Настройки за разширено плащане
							<?php
						}
						?>
					</div>
				</a>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(1);">
		<div class="blocksidebar">
			<img src="images/money-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Paiement
				<?php
			}
			if($langue == 'en')
			{
				?>
				Payment
				<?php
			}
			if($langue == 'it')
			{
				?>
				Pagamento
				<?php
			}
			if($langue == 'bg')
			{
				?>
				плащане
				<?php
			}
			?>
		</div>
	</a>
	<div id="menutab-1" class="menutab" style="display:none;">
		<a href="paiement.php">
			<div class="blocksidebar">
				<img src="images/money-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Transaction & Chiffre d'affaire
					<?php
				}
				if($langue == 'en')
				{
					?>
					Transaction & Turnover
					<?php
				}
				if($langue == 'it')
				{
					?>
					Transazione e fatturato
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Транзакции и оборот
					<?php
				}
				?>
			</div>
		</a>
		<a href="configpaiement.php">
			<div class="blocksidebar">
				<img src="images/money-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Configuration des paiements
					<?php
				}
				if($langue == 'en')
				{
					?>
					Payment configuration
					<?php
				}
				if($langue == 'it')
				{
					?>
					Configurazione di pagamento
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Конфигурация на плащане
					<?php
				}
				?>
			</div>
		</a>
		<a href="parametreavancepaiement.php">
			<div class="blocksidebar">
				<img src="images/money-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Paramètres avancés des paiements
					<?php
				}
				if($langue == 'en')
				{
					?>
					Advanced payment settings
					<?php
				}
				if($langue == 'it')
				{
					?>
					Impostazioni di pagamento avanzate
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Настройки за разширено плащане
					<?php
				}
				?>
			</div>
		</a>
	</div>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("categorie"))
		{
			?>
			<a href="categorie.php">
				<div class="blocksidebar">
					<img src="images/home-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Catégories
						<?php
					}
					if($langue == 'en')
					{
						?>
						Category
						<?php
					}
					if($langue == 'it')
					{
						?>
						Categoria
						<?php
					}
					if($langue == 'bg')
					{
						?>
						категория
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="categorie.php">
		<div class="blocksidebar">
			<img src="images/home-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Catégories
				<?php
			}
			if($langue == 'en')
			{
				?>
				Category
				<?php
			}
			if($langue == 'it')
			{
				?>
				Categoria
				<?php
			}
			if($langue == 'bg')
			{
				?>
				категория
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("seo"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(7);">
				<div class="blocksidebar">
					<img src="images/seo-icon.png"> SEO
				</div>
			</a>
			<div id="menutab-7" class="menutab" style="display:none;">
				<a href="seo.php">
					<div class="blocksidebar">
						<img src="images/seo-icon.png"> SEO
					</div>
				</a>
				<a href="seometa.php">
					<div class="blocksidebar">
						<img src="images/seo-icon.png"> Bing/Google Verification
					</div>
				</a>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(7);">
		<div class="blocksidebar">
			<img src="images/seo-icon.png"> SEO
		</div>
	</a>
	<div id="menutab-7" class="menutab" style="display:none;">
		<a href="seo.php">
			<div class="blocksidebar">
				<img src="images/seo-icon.png"> SEO
			</div>
		</a>
		<a href="seometa.php">
			<div class="blocksidebar">
				<img src="images/seo-icon.png"> Bing/Google Verification
			</div>
		</a>
	</div>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("pages"))
		{
			?>
			<a href="page.php">
				<div class="blocksidebar">
					<img src="images/page-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Page(s)
						<?php
					}
					if($langue == 'en')
					{
						?>
						Page
						<?php
					}
					if($langue == 'it')
					{
						?>
						Pagina
						<?php
					}
					if($langue == 'bg')
					{
						?>
						страница
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="page.php">
		<div class="blocksidebar">
			<img src="images/page-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Page(s)
				<?php
			}
			if($langue == 'en')
			{
				?>
				Page
				<?php
			}
			if($langue == 'it')
			{
				?>
				Pagina
				<?php
			}
			if($langue == 'bg')
			{
				?>
				страница
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("social"))
		{
			?>
			<a href="social.php">
				<div class="blocksidebar">
					<img src="images/social-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Réseaux Sociaux
						<?php
					}
					if($langue == 'en')
					{
						?>
						Social Networks
						<?php
					}
					if($langue == 'it')
					{
						?>
						Reti sociali
						<?php
					}
					if($langue == 'bg')
					{
						?>
						Социални мрежи
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="social.php">
		<div class="blocksidebar">
			<img src="images/social-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Réseaux Sociaux
				<?php
			}
			if($langue == 'en')
			{
				?>
				Social Networks
				<?php
			}
			if($langue == 'it')
			{
				?>
				Reti sociali
				<?php
			}
			if($langue == 'bg')
			{
				?>
				Социални мрежи
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("cookie"))
		{
			?>
			<a href="cookie.php">
				<div class="blocksidebar">
					<img src="images/home-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Cookie
						<?php
					}
					if($langue == 'en')
					{
						?>
						Cookie
						<?php
					}
					if($langue == 'it')
					{
						?>
						Cookie
						<?php
					}
					if($langue == 'bg')
					{
						?>
						курабийка
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="cookie.php">
		<div class="blocksidebar">
			<img src="images/home-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Cookie
				<?php
			}
			if($langue == 'en')
			{
				?>
				Cookie
				<?php
			}
			if($langue == 'it')
			{
				?>
				Cookie
				<?php
			}
			if($langue == 'bg')
			{
				?>
				курабийка
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("email"))
		{
			?>
			<a href="javascript:void(0);" onclick="showMenuTab(6);">
				<div class="blocksidebar">
					<img src="images/email-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Email
						<?php
					}
					if($langue == 'en')
					{
						?>
						E-mail
						<?php
					}
					if($langue == 'it')
					{
						?>
						E-mail
						<?php
					}
					if($langue == 'bg')
					{
						?>
						електронна поща
						<?php
					}
					?>
				</div>
			</a>
			<div id="menutab-6" class="menutab" style="display:none;">
				<a href="email.php">
					<div class="blocksidebar">
						<img src="images/email-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Contenue des emails
							<?php
						}
						if($langue == 'en')
						{
							?>
							Content of emails
							<?php
						}
						if($langue == 'it')
						{
							?>
							Contenuto di e-mail
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Съдържание на имейли
							<?php
						}
						?>
					</div>
				</a>
				<a href="template-email.php">
					<div class="blocksidebar">
						<img src="images/design-icon.png">
						<?php
						if($langue == 'fr')
						{
							?>
							Template des emails
							<?php
						}
						if($langue == 'en')
						{
							?>
							Email template
							<?php
						}
						if($langue == 'it')
						{
							?>
							Modello di email
							<?php
						}
						if($langue == 'bg')
						{
							?>
							Шаблон за имейл
							<?php
						}
						?>
					</div>
				</a>
			</div>
			<?php
		}
	}
	else
	{
	?>
	<a href="javascript:void(0);" onclick="showMenuTab(6);">
		<div class="blocksidebar">
			<img src="images/email-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Email
				<?php
			}
			if($langue == 'en')
			{
				?>
				E-mail
				<?php
			}
			if($langue == 'it')
			{
				?>
				E-mail
				<?php
			}
			if($langue == 'bg')
			{
				?>
				електронна поща
				<?php
			}
			?>
		</div>
	</a>
	<div id="menutab-6" class="menutab" style="display:none;">
		<a href="email.php">
			<div class="blocksidebar">
				<img src="images/email-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Contenue des emails
					<?php
				}
				if($langue == 'en')
				{
					?>
					Content of emails
					<?php
				}
				if($langue == 'it')
				{
					?>
					Contenuto di e-mail
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Съдържание на имейли
					<?php
				}
				?>
			</div>
		</a>
		<a href="template-email.php">
			<div class="blocksidebar">
				<img src="images/design-icon.png">
				<?php
				if($langue == 'fr')
				{
					?>
					Template des emails
					<?php
				}
				if($langue == 'en')
				{
					?>
					Email template
					<?php
				}
				if($langue == 'it')
				{
					?>
					Modello di email
					<?php
				}
				if($langue == 'bg')
				{
					?>
					Шаблон за имейл
					<?php
				}
				?>
			</div>
		</a>
	</div>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("statistique"))
		{
			?>
			<a href="statistique.php">
				<div class="blocksidebar">
					<img src="images/stat-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Statistique de visite
						<?php
					}
					if($langue == 'en')
					{
						?>
						Visit statistics
						<?php
					}
					if($langue == 'it')
					{
						?>
						Visita le statistiche
						<?php
					}
					if($langue == 'bg')
					{
						?>
						Статистика за посещенията
						<?php
					}
					?>
				</div>	
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="statistique.php">
		<div class="blocksidebar">
			<img src="images/stat-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Statistique de visite
				<?php
			}
			if($langue == 'en')
			{
				?>
				Visit statistics
				<?php
			}
			if($langue == 'it')
			{
				?>
				Visita le statistiche
				<?php
			}
			if($langue == 'bg')
			{
				?>
				Статистика за посещенията
				<?php
			}
			?>
		</div>	
	</a>
	<?php
	}
	if($_SESSION['admin_type_compte'] == 'moderateur')
	{
		if(getAutorisationModerateur("publicite"))
		{
			?>
			<a href="publicite.php">
				<div class="blocksidebar">
					<img src="images/ads-icon.png">
					<?php
					if($langue == 'fr')
					{
						?>
						Publicité
						<?php
					}
					if($langue == 'en')
					{
						?>
						Ads
						<?php
					}
					if($langue == 'it')
					{
						?>
						Pubblicità
						<?php
					}
					if($langue == 'bg')
					{
						?>
						реклама
						<?php
					}
					?>
				</div>
			</a>
			<?php
		}
	}
	else
	{
	?>
	<a href="publicite.php">
		<div class="blocksidebar">
			<img src="images/ads-icon.png">
			<?php
			if($langue == 'fr')
			{
				?>
				Publicité
				<?php
			}
			if($langue == 'en')
			{
				?>
				Ads
				<?php
			}
			if($langue == 'it')
			{
				?>
				Pubblicità
				<?php
			}
			if($langue == 'bg')
			{
				?>
				реклама
				<?php
			}
			?>
		</div>
	</a>
	<?php
	}
	?>
</div>
<script src="js/jquery.js"></script>
<script>
function showMenuTab(id)
{
	$('#menutab-'+id).toggle('slow');
}
</script>