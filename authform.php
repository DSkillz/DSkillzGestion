<section class="row justify-content-center">
	<h1 style="text-align: center;font-size: 30px;color: coral;">INTERFACE DE GESTION: <br><br>Authentification </h1>
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
</section>