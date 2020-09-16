<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="fond"></div>
	<?php include('../en-tete.php'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-white">
				<h1>Création d'article</h1>
				<form enctype="multipart/form-data" method="post" action="r-ajout-article.php">
					<div class="form-group">
						<label>Titre de l'article</label>
						<input class="form-control" type="text" name="titreArticle" placeholder="nom de l'article">
					</div>
						<label for="exampleFormControlTextarea1">Texte de l'article</label>
   	 					<textarea class="form-control" id="exampleFormControlTextarea1" name="texteArticle" rows="5"></textarea>
					<div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ajouter une image</label>
                            <input type="file" name="imageArticle" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="bouton">Créer l'article</button>
                        </div>
					</div>
				</form>
			</div>
		</div>
    </div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-dark">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nom de l'article</th>
				      <th scope="col">Date de création</th>
				      <th scope="col">Modifier</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Promotions</td>
				      <td>20/11/2019</td>
				      <td><a href="#">Lien</a></td>
				    </tr>
				    <tr>
				      <th scope="row">2</th>
				      <td>Dernières sorties</td>
				      <td>25/11/2019</td>
				      <td><a href="#">Lien</a></td>
				    </tr>
				    <tr>
				      <th scope="row">3</th>
				      <td>Top list de l'année 2019</td>
				      <td>30/11/2019</td>
				      <td><a href="#">Lien</a></td>
				    </tr>
				    <tr>
				      <th scope="row">4</th>
				      <td>Artistes du moment</td>
				      <td>05/12/2019</td>
				      <td><a href="#">Lien</a></td>
				    </tr>
				  </tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Ajouter un album</h2>
				<form action="r-ajout-album.php" method="POST" enctype="multipart/form-data">
				  <div class="form-group row">
				    <label for="nomAlbum" class="col-sm-2 col-form-label">Nom de l'album</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nomAlbum" id="nomAlbum">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nomArtiste" class="col-sm-2 col-form-label">Nom de l'artiste</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nomArtiste" id="nomArtiste" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="label" class="col-sm-2 col-form-label">Label de sortie</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="label" id="label" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="dateSortie" class="col-sm-2 col-form-label">Date de sortie</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="dateSortie" id="dateSortie" placeholder="Mettre au format AAAA-MM-JJ">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nomPremierePiste" class="col-sm-2 col-form-label">Première piste</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nomPremierePiste" id="nomPremierePiste" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nomDeuxiemePiste" class="col-sm-2 col-form-label">Deuxième piste</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nomDeuxiemePiste" id="nomDeuxiemePiste" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nomTroisiemePiste" class="col-sm-2 col-form-label">Troisième piste</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nomTroisiemePiste" id="nomTroisiemePiste" >
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nomQuatriemePiste" class="col-sm-2 col-form-label">Quatrième piste</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="nomQuatriemePiste" id="nomQuatriemePiste" >
				    </div>
				  </div>				  
				  <div class="form-group row">
				    <label for="prix" class="col-sm-2 col-form-label">Prix</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control" name="prix" id="prix" >
				    </div>
				  </div>
				  <div class="form-group">
						<label for="imagePochette">Ajouter une image</label>
						<input type="file" name="imagePochette" id="imagePochette" class="form-control-file">
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-10">
				      <button type="submit" name="boutonAjouter" class="btn btn-outline-success my-2 my-sm-0">Ajouter l'album</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</div>
<?php include("../pied-de-page.php"); ?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>