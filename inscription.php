<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
</head>
<body>
	<div class="fond"></div>
	<?php include('en-tete.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="r-inscription.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-12 col-md-6 text-white">
                            <label>Prénom</label>
                            <input class="form-control" type="text" name="prenom" placeholder="Prénom" autofocus="" required>
                        </div>
                        <div class="form-group col-12 col-md-6 text-white">
                            <label>Nom</label>
                            <input class="form-control" type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div class="form-group col-md-6 text-white">
                            <label>Adresse mail</label>
                            <input type="email" class="form-control" name="email" id="inputMailAddress" placeholder="Votre mail" required>
                        </div>
                        <div class="form-group col-md-6 text-white">
                            <label for="inputAge">Âge</label>
                            <input type="number" class="form-control" name="age" id="inputAge" placeholder="Votre âge" required>
                        </div>
                        <div class="form-group col-md-6 text-white">
                            <label for="inputPassword">Mot de passe</label>
                            <input type="password" class="form-control" name="password" id="inputPassword" placeholder="9 caractères minimum" required minlength="9">
                        </div>
                        <div class="form-group col-md-6 text-white">
                            <label>Confirmer mot de passe</label>
                            <input type="password" class="form-control" name="confirmPass" id="inputPassword2" placeholder="9 caractères minimum" required minlength="9">
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-check">
                                <div>
                                    <label class="btn btn-secondary active">
                                         Cocher
                                    </label>
                                    <input type="checkbox" id="boutonAccepterConditions">
                                    <div id="paragraphe"><p>J'accepte la Politique de Confidentialité et je suis d'accord avec les Conditions D'Utilisation, qui comportent un âge minimum requis.</p></div>
                                </div>
                            </div>
                        <div class="form-group col-md-6">
                            <button type="submit" name="sub" id="submitForm" class="btn btn-primary" disabled="true">Créer un compte</button>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Vous avez déjà un compte.<a href="connexion.php"> Page de connexion</a></label>
                        </div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>
    <?php include("pied-de-page.php"); ?>
    <script>
    $('#inputPassword, #inputPassword2').on('keyup', function () {
      if ($('#inputPassword').val() == $('#inputPassword2').val() && document.getElementById('boutonAccepterConditions').checked) {
        document.getElementById('submitForm').disabled = false;
      }
    });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>