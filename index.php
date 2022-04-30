<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

	<title>ABCDEPANPC - Connexion</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/open_sans@1.0.1/open_sans.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js" type="text/javascript"></script>

</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.html'; ?>
	<!-- /.navbar -->

	<!-- Main -->
	<main class="container-fluid">
		<div class="row justify-content-center" style="">
			<h1 style="text-align: center;font-size: 30px;color: coral;">FICHE INTERVENTION: <br>Authentification </h1>
			<div id="formDiv">


				<form id="loginForm" method="post">
					<!-- Email input -->
					<div class="form-outline mb-4">
						<input type="email" id="login" name="login" class="form-control">
						<label class="form-label" for="form2Example1">Identifiant</label>
					</div>

					<!-- Password input -->
					<div class="form-outline mb-4">
						<input type="password" id="pwd" name="pwd" class="form-control">
						<label class="form-label" for="form2Example2">Mot de passe</label>
					</div>

					<!-- 2 column grid layout for inline styling -->
					<div class="row mb-4">
						<div class="col d-flex justify-content-center">
							<!-- Checkbox -->
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked="">
								<label class="form-check-label" for="form2Example31"> Remember me </label>
							</div>
						</div>

						<!-- Submit button -->
						<button type="button" class="btn btn-primary btn-block mb-4" onclick="SubmitFormData();">Connexion</button>

					</div>
				</form>
			</div>
		</div>
	</main>

	<footer id="footer" class="top-space">

		<?php include 'footer.html'; ?>

	</footer>

	<script>
		function SubmitFormData() {
			var login = $("#login").val();
			var pwd = $("#pwd").val();
			$.post("login.php", {
					login: login,
					pwd: pwd
				},
				function(data) {
					console.log(data);
					$('main > div').replaceWith(data);
					$('#myForm')[0].reset();
				});
		}

		$(document).ready(function() {
			// grab an element
			var myElement = document.querySelector("nav");
			// construct an instance of Headroom, passing the element
			var headroom = new Headroom(myElement, {
				"offset": 50,
				"tolerance": 5,
				"classes": {
					"initial": "animated",
					"pinned": "slideDown",
					"unpinned": "slideUp"
				}
			});
			// initialise
			headroom.init();
		});
	</script>

</body>

</html>