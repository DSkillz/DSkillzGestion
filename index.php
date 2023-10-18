<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Subileau Matthias">

	<title>Digital Skillz - Interface de gestion</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/open_sans@1.0.1/open_sans.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- JavaScript libs are placed at the end of the document so the pages load faster, except JQuery -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js" type="text/javascript"></script>

</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php
	include('consolelog.php');
	include('menu.php');
	?>
	<!-- /.navbar -->

	<!-- Main -->
	<main class="container-fluid">
		<?php include('authform.php'); ?>
	</main>
	<footer id="footer" class="top-space">

		<?php include('footer.php'); ?>

	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js" type="text/javascript"></script>

	<script>
		function SubmitFormData() {
			var login = $("#login").val();
			var pwd = $("#pwd").val();
			console.log(login);
			console.log(pwd);
			$.post("login.php", {
					login: login,
					pwd: pwd
				},
				function(data) {
					function getCookie(name) {
						const value = `; ${document.cookie}`;
						const parts = value.split(`; ${name}=`);
						if (parts.length === 2) return parts.pop().split(';').shift();
					}
					if (getCookie("valid") === "true") {
						console.log('affichage fichecrea.php');
						$('main').load("fichecrea.php");
					} else if (getCookie("valid") === "false") {
						console.log("Mauvaise combinaison login / mot de passe.")
					}
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

			window.scrollTo(0, 0);
			// clear session cookie
			document.cookie = 'valid=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT; SameSite=Lax';

		});
	</script>

</body>

</html>