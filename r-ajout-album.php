<?php
	require 'db.class.php';
    $DB = new DB();

	if ($_POST != null) {
	$extension = explode('.',$_FILES['imagePochette']['name'])[1];
	$filename = uniqid() . '.' . $extension;
	move_uploaded_file($_FILES['imagePochette']['tmp_name'], 'assets/img/' . $filename);

        // insertion du filename dans la base de données

    } else {
        echo "L\'image n\'est pas au bon format.";
    }

	if (isset($_POST['boutonAjouter'])) {
		$album = $_POST['nomAlbum'];
		$artiste = $_POST['nomArtiste'];
		$prix = $_POST['prix'];
		$piste1 = $_POST['nomPremierePiste'];
		$piste2 = $_POST['nomDeuxiemePiste'];
		$piste3 = $_POST['nomTroisiemePiste'];
		$piste4 = $_POST['nomQuatriemePiste'];
		$label = $_POST['label'];
		$date = $_POST['dateSortie'];


        $DB->query("INSERT INTO albums_vinyle(album,artiste,label,dateSortie,prix,premiere_piste,deuxieme_piste,troisieme_piste,quatrieme_piste,lien_pochette_album) 
                          VALUES ('$album','$artiste','$label','$date','$prix','$piste1','$piste2','$piste3','$piste4','$filename')");

	}


	
?>
