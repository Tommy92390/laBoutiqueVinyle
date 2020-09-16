<?php
session_start();
require 'db.class.php';
require 'panier.class.php';
$DB = new DB();
$panier = new panier($DB);
if (isset($_GET['del'])) {
	$panier->del($_GET['del']);
}
if (isset($_GET['clean'])) {
	$panier->clean();
}
$prixtotal =0;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Panier</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="fond"></div>
	<?php include('en-tete.php'); ?>
	<?php
    //var_dump($_SESSION['current_user']); die();
    //var_dump($_SESSION['panier'][$album_id]);die();
    if (isset($_SESSION['panier'])){
        $ids = implode(',',array_keys($_SESSION['panier']));
    }

	if (empty($ids)) {
		$albums = array();
	}else{
        $DB = new DB();
        //var_dump($ids);
		$albums = $DB->query("SELECT * FROM albums_vinyle WHERE id IN (".$ids.")");
        // doc https://stackoverflow.com/questions/14767530/php-using-pdo-with-in-clause-array
	}

    //var_dump($album); die();?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped table-dark">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Nom de l'album</th>
					      <th scope="col">Prix</th>
					      <th scope="col">Retirer l'article</th>
					    </tr>
					  </thead>
                        <?php foreach ($albums as $album):?>
					  <tbody>
					    <tr>
					      <th scope="row"> <?= $album->id;?> </th>
					      <td> <?= $album->album; ?> </td>
					      <td> <?= $album->prix; $prixtotal +=$album->prix; ?> </td>
                            <td> <a class="btn btn-secondary btn-sm btn-info" href="panier.php?del=<?= $album->id; ?>">Retirer</a></td>
					    </tr>
					  </tbody>
                    <?php endforeach;?>
					</table>
					<div class="row">
					  <div class="col-sm-6">
					    <div class="card text-white bg-dark">
					      <div class="card-body">
					        <h5 class="card-title">Montant total : <?= $panier->total(); ?> €</h5>
					        <p class="card-text">Quel bon choix !</p>
					        <a href="#" class="btn btn-primary btn-lg">Passer commande</a>
					      </div>
					    </div>
					  </div>
					</div>
		    		<div id="boutonViderPanier">
		   				<button type="button" class="btn btn-secondary btn-lg"><a href="panier.php?clean">Vider le panier</a></button>
		   			</div>
			    </div>
		    </div>
        </div>
	</section>

<?php include("pied-de-page.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>