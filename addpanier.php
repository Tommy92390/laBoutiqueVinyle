<?php
session_start();
require 'db.class.php';
require 'panier.class.php';

if(isset($_GET['id'])){
    $DB = new DB();
    $album = $DB->query("SELECT * FROM albums_vinyle WHERE id=:id", array('id' => $_GET['id']));

    $panier = new panier($DB);


	$panier->add($album[0]->id);
	//var_dump($album[0]);
	echo 'L\'album a été ajouté à votre catalogue. <a href="page-album.php">Retourner sur la page album</a>';
	//var_dump($_SESSION['panier']);

}else{
	echo "Vous n'avez pas sélectionné d'album.";
}

