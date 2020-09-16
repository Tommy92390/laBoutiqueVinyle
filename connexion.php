<?php session_start();
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="fond"></div>
	<?php include('en-tete.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="r-connexion.php" method="POST">
					<div class="form-group col-md-6 text-white">
			      		<label>Votre adresse mail</label>
			      		<input type="email" class="form-control" name="email" id="inputMailAddress" placeholder="Votre mail" autofocus>
			    	</div>
	    		    <div class="form-group col-md-6 text-white">
			    		<label>Votre mot de passe</label>
			    		<input type="password" class="form-control" name="password" id="inputPassword" placeholder="mot de passe" minlength="8">
					</div>
	    			<div class="col-auto my-1">
	        			<button type="submit" name="connexion" class="btn btn-primary" id="boutonConnecter">Se connecter</button>
	    			</div>
	    			<div class="form-group col-md-6">
	    				<label>Vous n'avez pas de compte ? <a href="inscription.php" id="lienInscription">Créer un compte</a></label>
	    			</div>
	    			<div class="form-group col-md-6">
	    				<label>Mot de passe oublié ? <a href="#" id="motDePasseOublie">Cliquez içi</a></label>
	    			</div>
				</form>
			</div>
		</div>
	</div>
<?php include("pied-de-page.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>