<?php
session_start();
require 'db.class.php';
$DB = new DB();
$reponse = $DB->query2('SELECT * FROM albums_vinyle');
$articles = $DB->query2('SELECT * FROM articles ');
//var_dump($_SESSION['current_user']);
if (isset($_SESSION['flash']['success']) && !empty($_SESSION['flash']['success'])) {
echo $_SESSION['flash']['success'];
unset($_SESSION['flash']['success']);}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Boutique-Vinyles</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="fond"></div>
	<div id="cookieAcceptance" class="clearfix px-3 py-2 text-white">
		<p class="my-auto">Nous utilisons des cookies afin de vous offrir la meilleure expérience sur notre site. En savoir plus sur notre page : <a href="conditions-generales-utilisation.html">Les conditions générales d'utilisation.</a></p>
		<button id="acceptCookies" class="btn btn-secondary ml-auto" >J'accepte</button>
	</div>

	<?php include('en-tete.php'); ?>
    <main>
    <section class="promotions">
        <h1>Sortie récentes</h1>
        <?php
            while ($donnees = $reponse->fetch()){
                echo $donnees['album'] ." de " . $donnees['artiste'] ." au prix de  " . $donnees['prix'] . "€"."<br>";
            }
            $reponse->closeCursor();
            ?>
        <a href="page-album.php">Voir la page des albums<i class="fas fa-music fa-3x"></i></a>
    </section>
    <section>
        <h2>Pages de présentation des artistes</h2>
        <p>Voici la page de Sébastien Léger : <a href="page-sebastien-leger.html">cliquez-içi</a></p>
        <p>Voici la page de Maya Jane Coles : <a href="page-maya-jane-coles.html">cliquez-içi</a></p>
    </section>
        <section>
            <h3>Articles</h3>
            <?php while ($article = $articles->fetch()){
                echo $article['titre'].'<br>';
                echo $article['texte'];
            }
            ?>
        </section>
    </main>
    <?php include("pied-de-page.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/hidden_div_cookieAcceptance.js"></script>
</body>
</html>
