<?php

	include('models/classe_ouvrages.php');
	
 
	/* $photo_client	   = NULL; */
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierOuv = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$ouv = $ModifierOuv->getIdOuv($code);

	}
	

	if(isset($_POST['modifOuv'])){
		//var_dump($_POST);exit;
		$id_ouvrage      = htmlentities(trim($_POST['id_ouvrage']));
		$titre_ouvrage	   	= htmlentities(trim($_POST['titre_ouvrage']));
		$resume_ouvrage	   	= htmlentities(trim($_POST['resume_ouvrage']));
		$nbre_page_ouv	   	= htmlentities(trim($_POST['nbre_page_ouv']));
		$id_cat_ouv	   	= htmlentities(trim($_POST['id_cat_ouv']));
		$id_auteur	   	= htmlentities(trim($_POST['id_auteur']));
		$id_comp	   	= htmlentities(trim($_POST['id_comp']));
		//$operation	   	= htmlentities(trim($_POST['operation']));
		//$id_etudiant	   	= htmlentities(trim($_POST['id_etudiant']));
		
		/*$videos	= htmlentities(trim($_FILES['videos']['name']));*/
		
		
		

		//tmp_name est un dossier temporaire
		/*$fichierTempo=$_FILES['videos']['tmp_name'];*/
		
		//chemin pour recevoir les photos du site
		//videos nom du dossier et $nomPhoto fichier temporaire
		/*move_uploaded_file($fichierTempo, 'videos/'.$videos);*/
		
		$ModifierOuvrages = new Ouvrages($id_ouvrage,$titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$id_cat_ouv,$id_auteur,$id_comp);
	
		$reponse = $ModifierOuvrages->ModifierOuv();
		
		if($reponse){
			header('location:?c=AdmlisteOuv');
		}
	}
	
	
	
	
	
	
		
		
		
		
		
		
		
		
		
		
		
		
		

	include('views/admin/formAffOuv.php');

?>

 	 	 	




