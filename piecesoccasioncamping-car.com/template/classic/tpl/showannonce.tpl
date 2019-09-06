<div class="container topMargin" style="margin-bottom: 90px;">
		<div class="nav">
			{navigation}
		</div>
		<div class="mega-block">
			<div class="big-block-gauche">
				<h1>{titre}</h1>
				{urgente}
				<div class="big-block-photo">
					<img id="big-image-block" src="{bigimage}">
				</div>
				<div class="block-selection-image">
				{all_image}
				</div>
				<div class="mise-en-ligne">
					<div class="mise-en-ligne-text">{date_mise_en_ligne}</div>
					<div class="nombre-de-vue"><img src="{url_script}/images/view-icon.png" title="Nombre de vue" alt="Nombre de vue">{nombre_de_vue}</div>
				</div>
				<div class="user-mise-en-ligne">{utilisateur}</div>
				<div class="information">
					<div class="information-title">
					Prix
					</div>
					<div class="other-information">
					{prix}
					</div>
					<div class="information-title">
					Ville
					</div>
					<div class="other-information">
					{codepostal} - {ville}
					</div>
				</div>
				<style>
                   /* Set the size of the div element that contains the map */
                  #map {
                    height:50vh; 
                    width: 95%;
                    margin: 0 auto;
                   }
                </style>
				<div style="margin: 10px" id="map">
                </div>
				{map}
				<div class="block-description">
				{critere}
				</div>
				<div class="block-description">
					<b>Description :</b>
					<br><br>
					{description}
				</div>
				<hr>
				<div class="block-signaler">
					<div class="image-signaler">
						<img src="{url_script}/images/signaler-icon.png" alt="Signaler une annonces">
					</div>
					<div class="link-signaler">
						<a href="{signaler_link}">Signaler l'annonce</a>
					</div>
				</div>
				<div class="block-social-share">
					{sharing_social}
				</div>
			</div>
			<div class="big-block-droit">
				<div class="username-block-droit"><b>{utilisateur}</b></div>
				{telephone}
				<div class="send-message-block">
					<a href="javascript:window.print()" class="blueBtn print-icon"> Imprimer l'annonce</a>
				</div>
				<div class="send-message-block">
					<a href="{send_message_link}" class="blueBtn message-icon">Envoyez un message</a>
				</div>
				<div class="send-message-block">
					<a href="{contact_user}" class="blueBtn message-icon">Contact</a>
				</div>
			</div>
			<div class="big-block-droit">
				<h4>Publicité</h4>
				{publicite_left}
			</div>
		</div>
		<script>
		var oldid = 0;
		function showBigImage(url,x)
		{
			$('#id-'+oldid).css('border','0px solid #000000');
			$('#id-'+x).css('border','2px solid rgb(255, 135, 0)');
			$('#big-image-block').prop('src',url);
			oldid = x;
		}
		
		function showNumberPhone()
		{
			$('#btnPhone').css('display','none');
			$('#phone-number').css('display','block');
		}
		</script>
		<script>
            // Initialize and add the map
            function initMap() {
              // The location of Uluru
              var uluru = {lat: {lat}, lng: {lng}};
              // The map, centered at Uluru
              var map = new google.maps.Map(
                  document.getElementById('map'), {zoom: 12, center: uluru});
              // The marker, positioned at Uluru
              var marker = new google.maps.Marker({position: uluru, map: map});
            }
        </script>
            <!--Load the API from the specified URL
            * The async attribute allows the browser to render the page while the API loads
            * The key parameter will contain your own API key (which is not needed for this tutorial)
            * The callback parameter executes the initMap() function
            -->
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjd0AaXmIV3o665Jwy7wKlRw1U_SF9_dU&callback=initMap">
        </script>
</div>