<?php
session_start();
require 'db.class.php';
require 'panier.class.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title id="titreAlbum">Albums</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
    <div class="fond"></div>
    <?php include('en-tete.php'); ?>
    <h1 id="topOfPage">Albums</h1>
    <a href="#topOfPage" class="btn btn-primary position-fixed btn-return-to-top">Haut de la page</a>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <?php
                  $DB = new DB(); //instanciation
                  $albums = $DB->query('SELECT * FROM albums_vinyle'); ?>
                  <?php foreach ($albums as $album ): ?>
                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Informations diverses
                            </button>
                          </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                            <ul>
                              <li>Titre de l'album : <?php echo $album->album;?> </li>
                              <li>Nom de l'artiste : <?php echo $album->artiste;?> </li>
                              <li>Label de sortie : <?php echo $album->label;?> </li>
                              <li>Date de sortie : <?php echo $album->dateSortie;?> </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingTwo">
                          <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Liste des morceaux
                            </button>
                          </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                          <div class="card-body">
                            <ul>
                              <li>#1 : <?php echo $album->premiere_piste;?></li>
                              <li>#2 : <?php echo $album->deuxieme_piste;?></li>
                              <li>#3 : <?php echo $album->troisieme_piste;?></li>
                              <li>#4 : <?php echo $album->quatrieme_piste;?></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="headingThree">
                          <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Prix
                            </button>
                          </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                          <div class="text-center">
                            <p><?php echo $album->prix?>€</p>
                        <a class="btn btn-primary btn-lg"  href="addpanier.php?id=<?= $album->id; ?>">Ajouter au panier</a>
                          </div>
                        </div>
                      </div>
                    </div>
				</div>
			</div>
		</div>
        <section id="pochette">
            <h3>Pochette</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card" >
                                <img src="assets/img/<?php echo $album->lien_pochette_album;?>" class="card-img-top " alt="pochette">
                             </div>
                        </div>
                    </div>
                </div>
        </section>
<?php endforeach; ?>
<?php include("pied-de-page.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>