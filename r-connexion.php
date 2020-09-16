<?php session_start();
require 'db.class.php';
$DB = new DB(); //instanciation

if (isset($_POST['connexion'])) {
	$client = $DB->query3("SELECT * FROM clients WHERE email=:email", array('email' => $_POST['email']));

echo $client[0]['password'];

	if ($client) {

		if (password_verify($_POST['password'], $client[0]['password'])) {

			$_SESSION['current_user'] = $client;

			$_SESSION['flash']['success'] = "Bravo, vous êtes connecté !";
			header('Location: index.php');//envoie une en-tête HTTP brut, modifie l'URL pour rediriger vers une page
			die();

		} else {
			header('Location: connexion.php');
            $_SESSION['flash']['alert'] = "Vous vous êtes trompé de mot de passe";
			die();
		}
	} else {
	    echo "problème";
    }
}

?>

