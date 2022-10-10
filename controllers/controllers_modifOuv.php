<?php

	include('models/classe_ouvrages.php');
	include('models/classe_operations.php');
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
	
	
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierOp = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$op = $ModifierOp->getIdOperations($code);

	}
	

	if(isset($_POST['modifOuv'])){
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
		
		$ModifierOuvrages = new Ouvrages($id_ouvrage,$titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$id_cat_ouv,$id_auteur,$id_comp /*,$operation,$id_etudiant*/ );
	
		$reponse = $ModifierOuvrages->ModifierOuv();
		
		if($reponse){
			header('location:?c=listeOuv');
		}
	}
	
	
	
	
	
	
		
		if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_op'])){//si ces champs sont remplis -> ligne 33
		
		$lib_op		= htmlentities(trim($_POST['lib_op']));
		$id_etudiant		= htmlentities(trim($_POST['id_etudiant']));
		$id_ouvrage		= htmlentities(trim($_POST['id_ouvrage']));
		$operation		= htmlentities(trim($_POST['operation']));
		$date_demande_op	   	= htmlentities(trim($_POST['date_demande_op']));
		$heure_demande_op	   	= htmlentities(trim($_POST['heure_demande_op']));
		$date_debut_op	   	= htmlentities(trim($_POST['date_debut_op']));
		$heure_debut_op	   	= htmlentities(trim($_POST['heure_debut_op']));
		$date_fin_op	   	= htmlentities(trim($_POST['date_fin_op']));
		$heure_fin_op	   	= htmlentities(trim($_POST['heure_fin_op']));
		$jour_op	   	= htmlentities(trim($_POST['jour_op']));
		$mois_op	   	= htmlentities(trim($_POST['mois_op']));
		$annee_op	   	= htmlentities(trim($_POST['annee_op']));
		
		$AjouterOperations = new Operations (NULL,$lib_op,$id_etudiant,$id_ouvrage,$operation,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op);
	
		$reponse = $AjouterOperations->ajoutOperations();
	if($reponse){
			header('location:?c=listeOuv');
		}/*else{
			header('location:?c=LectModifOuv');
		}*/
		}//le msg est envoyé
		
		
		}
		
		
		
		
		
		$listeOperations = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOperations->afficheOperations();
	
		$listeOpDemEmp = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOpDemEmp = $listeOpDemEmp->afficheOpDemEmpr();
		
		$listeOuvrages = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOuv = $listeOuvrages->afficheOuvrages();
		
		
		

	include('views/formAffOuv.php');

?>

 	 	 	




