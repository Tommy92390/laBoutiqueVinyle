<!DOCTYPE html>
<html>
<head>
	<title>Réception des données du formulaire d'inscription</title>
</head>
<body>
	<h1>INSCRIPTION</h1>

<?php 
require 'db.class.php';
$DB = new DB(); //instanciation

if (isset($_POST['sub'])){
	//var_dump($_POST);
	$prenom = $_POST['prenom'];
	$nom = $_POST['nom'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	$pass = $_POST['password'];
	$confirmPass = $_POST['confirmPass'];
	$spass = password_hash($pass, PASSWORD_BCRYPT); // on utilise la méthode password bcrypt

    $run = $DB->query4("SELECT * FROM clients WHERE email = '$email'");
    //var_dump($run); die();
	//$check = mysqli_num_rows($run);
	if ($run > 0) {
	  echo "<h2>Cette adresse mail est déjà utilisée.</h2>";
	} else {
		$DB->query2("INSERT INTO clients(prenom,nom,email,age,password) VALUES ('$prenom','$nom','$email','$age','$spass')");
		header('Location: index.php');
	}
}

?>

</body>
</html>
