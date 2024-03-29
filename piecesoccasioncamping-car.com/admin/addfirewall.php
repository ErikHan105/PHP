<?php
include "../main.php";
include "version.php";

@session_start();

$SQL = "SELECT COUNT(*) FROM pas_admin_user WHERE username = '".$_SESSION['admin_username']."' AND password = '".$_SESSION['admin_password']."'";
$reponse = $pdo->query($SQL);
$req = $reponse->fetch();

if($req[0] == 0)
{
	header("Location: index.php");
}

function br2nl($string)
{
	$string = str_replace("<br />","",$string);
	return $string;
}

if(isset($_REQUEST['action']))
{
	$action = $_REQUEST['action'];
	
	/* Add new rules Firewall */
	if($action == 1)
	{
		$ip = $_REQUEST['ip'];
		$type = $_REQUEST['type'];
		$pays = $_REQUEST['pays'];
		
		$SQL = "INSERT INTO pas_firewall (ip,type,pays) VALUES ('$ip','$type','$pays')";
		$pdo->query($SQL);
		
		header("Location: firewall.php");
		exit;
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Administration PAS Script v<?php echo $version; ?></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
	<?php
	
	include "header.php";
	include "sidebar.php";
	
	?>
	<div class="container">
		<H1>Ajout d'une nouvelle entrer dans le Firewall</H1>
		<div style="margin-top:20px;margin-bottom:20px;">
			<a href="firewall.php" class="btn blue">Retour</a>
		</div>
		<form method="POST">
			<label><b>Adresse IP :</b></label>
			<input type="text" name="ip" placeholder="Entrer l'adresse IP de la machine à bannir" class="inputbox">
			<label><b>Type de machine :</b></label>
			<select name="type" class="inputbox">
				<option value="user">Utilisateur</option>
				<option value="spambot">Robot spammer</option>
				<option value="hacker">Hacker</option>
			</select>
			<label><b>Pays :</b></label>
			<select name="pays" class="inputbox">
				 <option value="AF">Afghanistan
				<option value="ZA">Afrique du sud</option>
				<option value="AX">Åland, îles</option>
				<option value="AL">Albanie</option>
				<option value="DZ">Algérie</option>
				<option value="DE">Allemagne</option>
				<option value="AD">Andorre</option>
				<option value="AO">Angola</option>
				<option value="AI">Anguilla</option>
				<option value="AQ">Antarctique</option>
				<option value="AG">Antigua et barbuda</option>
				<option value="SA">Arabie saoudite</option>
				<option value="AR">Argentine</option>
				<option value="AM">Arménie</option>
				<option value="AW">Aruba</option>
				<option value="AU">Australie</option>
				<option value="AT">Autriche</option>
				<option value="AZ">Azerbaïdjan</option>
				<option value="BS">Bahamas</option>
				<option value="BH">Bahreïn</option>
				<option value="BD">Bangladesh</option>
				<option value="BB">Barbade</option>
				<option value="BY">Bélarus</option>
				<option value="BE">Belgique</option>
				<option value="BZ">Belize</option>
				<option value="BJ">Bénin</option>
				<option value="BM">Bermudes</option>
				<option value="BT">Bhoutan</option>
				<option value="BO">Bolivie, l'état plurinational de</option>
				<option value="BQ">Bonaire, saint eustache et saba</option>
				<option value="BA">Bosnie herzégovine</option>
				<option value="BW">Botswana</option>
				<option value="BV">Bouvet, île</option>
				<option value="BR">Brésil</option>
				<option value="BN">Brunei darussalam</option>
				<option value="BG">Bulgarie</option>
				<option value="BF">Burkina faso</option>
				<option value="BI">Burundi</option>
				<option value="KY">Caïmans, îles</option>
				<option value="KH">Cambodge</option>
				<option value="CM">Cameroun</option>
				<option value="CA">Canada</option>
				<option value="CV">Cap vert</option>
				<option value="CF">Centrafricaine, république</option>
				<option value="CL">Chili</option>
				<option value="CN">Chine</option>
				<option value="CX">Christmas, île</option>
				<option value="CY">Chypre</option>
				<option value="CC">Cocos (keeling), îles</option>
				<option value="CO">Colombie</option>
				<option value="KM">Comores</option>
				<option value="CG">Congo</option>
				<option value="CD">Congo, la république démocratique du</option>
				<option value="CK">Cook, îles</option>
				<option value="KR">Corée, république de</option>
				<option value="KP">Corée, république populaire démocratique de</option>
				<option value="CR">Costa rica</option>
				<option value="CI">Côte d'ivoire</option>
				<option value="HR">Croatie</option>
				<option value="CU">Cuba</option>
				<option value="CW">Curaçao</option>
				<option value="DK">Danemark</option>
				<option value="DJ">Djibouti</option>
				<option value="DO">Dominicaine, république</option>
				<option value="DM">Dominique</option>
				<option value="EG">Égypte</option>
				<option value="SV">El salvador</option>
				<option value="AE">Émirats arabes unis</option>
				<option value="EC">Équateur</option>
				<option value="ER">Érythrée</option>
				<option value="ES">Espagne</option>
				<option value="EE">Estonie</option>
				<option value="US">États unis</option>
				<option value="ET">Éthiopie</option>
				<option value="FK">Falkland, îles (malvinas)</option>
				<option value="FO">Féroé, îles</option>
				<option value="FJ">Fidji</option>
				<option value="FI">Finlande</option>
				<option value="FR">France</option>
				<option value="GA">Gabon</option>
				<option value="GM">Gambie</option>
				<option value="GE">Géorgie</option>
				<option value="GS">Géorgie du sud et les îles sandwich du sud</option>
				<option value="GH">Ghana</option>
				<option value="GI">Gibraltar</option>
				<option value="GR">Grèce</option>
				<option value="GD">Grenade</option>
				<option value="GL">Groenland</option>
				<option value="GP">Guadeloupe</option>
				<option value="GU">Guam</option>
				<option value="GT">Guatemala</option>
				<option value="GG">Guernesey</option>
				<option value="GN">Guinée</option>
				<option value="GW">Guinée bissau</option>
				<option value="GQ">Guinée équatoriale</option>
				<option value="GY">Guyana</option>
				<option value="GF">Guyane française</option>
				<option value="HT">Haïti</option>
				<option value="HM">Heard et îles macdonald, île</option>
				<option value="HN">Honduras</option>
				<option value="HK">Hong kong</option>
				<option value="HU">Hongrie</option>
				<option value="IM">Île de man</option>
				<option value="UM">Îles mineures éloignées des états unis</option>
				<option value="VG">Îles vierges britanniques</option>
				<option value="VI">Îles vierges des états unis</option>
				<option value="IN">Inde</option>
				<option value="ID">Indonésie</option>
				<option value="IR">Iran, république islamique d'</option>
				<option value="IQ">Iraq</option>
				<option value="IE">Irlande</option>
				<option value="IS">Islande</option>
				<option value="IL">Israël</option>
				<option value="IT">Italie</option>
				<option value="JM">Jamaïque</option>
				<option value="JP">Japon</option>
				<option value="JE">Jersey</option>
				<option value="JO">Jordanie</option>
				<option value="KZ">Kazakhstan</option>
				<option value="KE">Kenya</option>
				<option value="KG">Kirghizistan</option>
				<option value="KI">Kiribati</option>
				<option value="KW">Koweït</option>
				<option value="LA">Lao, république démocratique populaire</option>
				<option value="LS">Lesotho</option>
				<option value="LV">Lettonie</option>
				<option value="LB">Liban</option>
				<option value="LR">Libéria</option>
				<option value="LY">Libye</option>
				<option value="LI">Liechtenstein</option>
				<option value="LT">Lituanie</option>
				<option value="LU">Luxembourg</option>
				<option value="MO">Macao</option>
				<option value="MK">Macédoine, l'ex république yougoslave de</option>
				<option value="MG">Madagascar</option>
				<option value="MY">Malaisie</option>
				<option value="MW">Malawi</option>
				<option value="MV">Maldives</option>
				<option value="ML">Mali</option>
				<option value="MT">Malte</option>
				<option value="MP">Mariannes du nord, îles</option>
				<option value="MA">Maroc</option>
				<option value="MH">Marshall, îles</option>
				<option value="MQ">Martinique</option>
				<option value="MU">Maurice</option>
				<option value="MR">Mauritanie</option>
				<option value="YT">Mayotte</option>
				<option value="MX">Mexique</option>
				<option value="FM">Micronésie, états fédérés de</option>
				<option value="MD">Moldova, république de</option>
				<option value="MC">Monaco</option>
				<option value="MN">Mongolie</option>
				<option value="ME">Monténégro</option>
				<option value="MS">Montserrat</option>
				<option value="MZ">Mozambique</option>
				<option value="MM">Myanmar</option>
				<option value="NA">Namibie</option>
				<option value="NR">Nauru</option>
				<option value="NP">Népal</option>
				<option value="NI">Nicaragua</option>
				<option value="NE">Niger</option>
				<option value="NG">Nigéria</option>
				<option value="NU">Niué</option>
				<option value="NF">Norfolk, île</option>
				<option value="NO">Norvège</option>
				<option value="NC">Nouvelle calédonie</option>
				<option value="NZ">Nouvelle zélande</option>
				<option value="IO">Océan indien, territoire britannique de l'</option>
				<option value="OM">Oman</option>
				<option value="UG">Ouganda</option>
				<option value="UZ">Ouzbékistan</option>
				<option value="PK">Pakistan</option>
				<option value="PW">Palaos</option>
				<option value="PS">Palestinien occupé, territoire</option>
				<option value="PA">Panama</option>
				<option value="PG">Papouasie nouvelle guinée</option>
				<option value="PY">Paraguay</option>
				<option value="NL">Pays bas</option>
				<option value="PE">Pérou</option>
				<option value="PH">Philippines</option>
				<option value="PN">Pitcairn</option>
				<option value="PL">Pologne</option>
				<option value="PF">Polynésie française</option>
				<option value="PR">Porto rico</option>
				<option value="PT">Portugal</option>
				<option value="QA">Qatar</option>
				<option value="RE">Réunion</option>
				<option value="RO">Roumanie</option>
				<option value="GB">Royaume uni</option>
				<option value="RU">Russie, fédération de</option>
				<option value="RW">Rwanda</option>
				<option value="EH">Sahara occidental</option>
				<option value="BL">Saint barthélemy</option>
				<option value="SH">Sainte hélène, ascension et tristan da cunha</option>
				<option value="LC">Sainte lucie</option>
				<option value="KN">Saint kitts et nevis</option>
				<option value="SM">Saint marin</option>
				<option value="MF">Saint martin(partie française)</option>
				<option value="SX">Saint martin (partie néerlandaise)</option>
				<option value="PM">Saint pierre et miquelon</option>
				<option value="VA">Saint siège (état de la cité du vatican)</option>
				<option value="VC">Saint vincent et les grenadines</option>
				<option value="SB">Salomon, îles</option>
				<option value="WS">Samoa</option>
				<option value="AS">Samoa américaines</option>
				<option value="ST">Sao tomé et principe</option>
				<option value="SN">Sénégal</option>
				<option value="RS">Serbie</option>
				<option value="SC">Seychelles</option>
				<option value="SL">Sierra leone</option>
				<option value="SG">Singapour</option>
				<option value="SK">Slovaquie</option>
				<option value="SI">Slovénie</option>
				<option value="SO">Somalie</option>
				<option value="SD">Soudan</option>
				<option value="SS">Soudan du sud</option>
				<option value="LK">Sri lanka</option>
				<option value="SE">Suède</option>
				<option value="CH">Suisse</option>
				<option value="SR">Suriname</option>
				<option value="SJ">Svalbard et île jan mayen</option>
				<option value="SZ">Swaziland</option>
				<option value="SY">Syrienne, république arabe</option>
				<option value="TJ">Tadjikistan</option>
				<option value="TW">Taïwan, province de chine</option>
				<option value="TZ">Tanzanie, république unie de</option>
				<option value="TD">Tchad</option>
				<option value="CZ">Tchèque, république</option>
				<option value="TF">Terres australes françaises</option>
				<option value="TH">Thaïlande</option>
				<option value="TL">Timor leste</option>
				<option value="TG">Togo</option>
				<option value="TK">Tokelau</option>
				<option value="TO">Tonga</option>
				<option value="TT">Trinité et tobago</option>
				<option value="TN">Tunisie</option>
				<option value="TM">Turkménistan</option>
				<option value="TC">Turks et caïcos, îles</option>
				<option value="TR">Turquie</option>
				<option value="TV">Tuvalu</option>
				<option value="UA">Ukraine</option>
				<option value="UY">Uruguay</option>
				<option value="VU">Vanuatu</option>
				<option value="VE">Venezuela, république bolivarienne du</option>
				<option value="VN">Viet nam</option>
				<option value="WF">Wallis et futuna</option>
				<option value="YE">Yémen</option>
				<option value="ZM">Zambie</option>
				<option value="ZW">Zimbabwe​​​​​</option>
			</select>
			<input type="hidden" name="action" value="1">
			<input type="submit" value="Ajouter" class="btn blue">
		</form>
	</div>
</body>
</html>