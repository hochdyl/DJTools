<!DOCTYPE HTML>

<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Prologue by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script type="text/javascript" src="assets/js/jquery.min.js"></script>
		<script src="assets/js/musicplayer.js"></script>
		<script>
			// Ajouter des artistes
			x = 1; // Nombre d'artistes à ajouté
			function modifier_artistes(action) {
				if (action == 'ajouter-artiste') {
					x++; //text box increment
					$('.wrapper-artistes').append("<input placeholder='Selectionner l artiste' list='Artistes' id='Artiste-"+x+"' class='artistes' required/>");
				} else if (action == 'supprimer-artiste') {
					x--;
					$('.artistes').last().remove();
				};
				$("#supprimer-artiste").attr("disabled",true);

				if (x > 1) {
					$("#supprimer-artiste").removeAttr("disabled");
				};
			};


			$(document).ready(function() {

				// Preview album cover
				function readURL(input) {
					if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function(e) {
							$('#imagePreview').css('background-image', 'url('+e.target.result +')');
							$('#imagePreview').hide();
							$('#imagePreview').fadeIn(650);
						}
						reader.readAsDataURL(input.files[0]);
					}
				}
				$("#imageUpload").change(function() {
					readURL(this);
				});


				// Séléctionner des albums
				$('.item-album').click(function() {
				var currentAlbum = $(this).attr('id');
				
					if ( $(this).hasClass('selected') ) {
						$('#'+currentAlbum+'-checkbox').removeAttr("checked","checked");	
						$(this).removeClass('selected');
					} else {
						$('#'+currentAlbum+'-checkbox').attr("checked","checked");
						$(this).addClass('selected');
	 				}
				});
				
				$("#myInputSearchBar").on("keyup", function() {
					var value = $(this).val().toLowerCase();
					$(".item-album").filter(function() {
						$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
					});
				});
			});
	

		</script>
	</head>
	<body class="is-preload">
		<!-- Header -->
			<div id="header">
				<div class="top">

					<!-- Logo -->
					<div id="logo">
						<h1 id="title">DJTools</h1>
					</div>

					<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="album.php"><span class="icon solid fa-th">Albums</span></a></li>
							<li><a href="playlist.php"><span class="icon solid fa-th">Playlist</span></a></li>
							<li><a href="ajouter-morceau.php"><span class="icon solid fa-plus">Ajouter un morceau</span></a></li>
							<li><a href="ajouter-album.php"><span class="icon solid fa-plus">Ajouter un album</span></a></li>
							<li><a href="ajouter-playlist.php"><span class="icon solid fa-plus">Ajouter une playlist</span></a></li>
						</ul>
					</nav>
				</div>
			</div>

		<!-- Main -->
			<div id="main">
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
							<div class="row">
								<div class="col-12 col-12-mobile">
									<article class="item" id='1'>
										<form class="addform" action="playlist-ele.php?#AJOUTER-L'ID" method="get">
											<h2>Ajouter une playlist</h2>

											<div class="avatar-upload">
												<div class="avatar-edit">
													<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
													<label for="imageUpload"></label>
												</div>
												<div class="avatar-preview">
													<div id="imagePreview" style="background-image: url(images/default-cover.jpg)">
													</div>
												</div>
											</div>
											
											<input placeholder="Nom du morceau" type="text" tabindex="1" name='titre-morceau' required autofocus> 	
											<fieldset>
												  <button type="submit" id="ajouter-morceau">Ajouter</button>
											</fieldset>
										</form>
									</article>
								</div>
							</div>
						</div>
					</section>
				</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>