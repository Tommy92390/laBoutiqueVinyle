<?php
session_start();
require 'db.class.php'; 

if (isset($_GET['q'])) {
	$DB = new DB();
	$q = $_GET['q'];
	$s = explode(" ", $q);
	$sql = 'SELECT * FROM albums_vinyle';
	//var_dump($sql); die();
	$i = 0;
	foreach ($s as $mot) {
		if (strlen($mot) > 3) {
			if ($i==0) {
				$sql .= " WHERE ";
			}else{
				$sql .= " OR ";
			}
			$sql .= "artiste LIKE '%$mot%'";
			$i++;
		}
	}
    $result = $DB->query3($sql);
    //var_dump($result); die();
} ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recherche</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="fond"></div>
	<?php include('en-tete.php'); ?>
    <h1>Voici la liste des albums de l'artiste</h1>
    <ul class="list-group">
        <?php foreach ($result as $album): ?>
        <li class="list-group-item list-group-item-success"><?= $album['album'] ?></li>
        <?php endforeach; ?>
    </ul>
    <h3><a href="page-album.php">Voir tous les albums</a></h3>
    <?php include("pied-de-page.php"); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>