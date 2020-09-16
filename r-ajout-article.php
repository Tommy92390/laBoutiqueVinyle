
<?php
require 'db.class.php';
$DB = new DB(); //instanciation
	
	if (isset($_POST['bouton'])) {
		$titreArticle = $_POST['titreArticle'];
		$texteArticle = $_POST['texteArticle'];
		$imageArticle = $_POST['imageArticle'];

		$DB->query2("INSERT INTO articles(titre,texte,image) VALUES ('$titreArticle','$texteArticle','$imageArticle')");
	}
?>