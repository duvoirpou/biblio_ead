<?php

	include('models/classe_ouvrages.php');
	include('models/classe_exemplaire.php');

	/* $photo_client	   = NULL; */
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierOuv = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$ouv = $ModifierOuv->getIdOuv($code);

	}
	
	
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierExp = new Exemplaires(NULL,NULL,NULL,NULL,NULL,NULL);
		$exp = $ModifierExp->getIdExp($code);

	}
	

	if(isset($_POST['ajoutE'])){
		//var_dump($_POST);exit;
		if(!empty($_POST['id_ouvrage'])){
		
		$etat_exp	   	= htmlentities(trim($_POST['etat_exp']));
		$date_achat	   	= htmlentities(trim($_POST['date_achat']));
		$annee_pub	   	= htmlentities(trim($_POST['annee_pub']));
		$prix_achat	   	= htmlentities(trim($_POST['prix_achat']));
		$id_ouvrage      = htmlentities(trim($_POST['id_ouvrage']));
		
		$AjoutExemplaires = new Exemplaires(NULL,$etat_exp,$date_achat,$annee_pub,$prix_achat,$id_ouvrage);
	
		$reponse = $AjoutExemplaires->ajoutExemplaires();
		
		if($reponse){
			header('location:?c=AdmlisteOuv');
		}
	}
	}
	
	
	
	
	

	include('views/admin/formAjoutExp.php');

?>

 	 	 	




