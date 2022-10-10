<?php

	include('models/classe_etudiant.php');
	

	/* $photo_client	   = NULL; */
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierEtudiant = new Etudiant(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$etud = $ModifierEtudiant->getIdEtud($code);

	}
	

	if(isset($_POST['modifEtud'])){
		//var_dump($_POST);exit;
		$id_etudiant      = htmlentities(trim($_POST['id_etudiant']));
		$matricule	   	= htmlentities(trim($_POST['matricule']));
		$nom_etudiant	   	= htmlentities(trim($_POST['nom_etudiant']));
		$prenom_etudiant	   	= htmlentities(trim($_POST['prenom_etudiant']));
		$sexe	   	= htmlentities(trim($_POST['sexe']));
		$adresse_lecteur	   	= htmlentities(trim($_POST['adresse_lecteur']));
		$tel_lecteur	   	= htmlentities(trim($_POST['tel_lecteur']));
		$option_etud	   	= htmlentities(trim($_POST['option_etud']));
		$annee	   	= htmlentities(trim($_POST['annee']));
		//$operation	   	= htmlentities(trim($_POST['operation']));
		//$id_etudiant	   	= htmlentities(trim($_POST['id_etudiant']));
		
		/*$videos	= htmlentities(trim($_FILES['videos']['name']));*/
		
		
		

		//tmp_name est un dossier temporaire
		/*$fichierTempo=$_FILES['videos']['tmp_name'];*/
		
		//chemin pour recevoir les photos du site
		//videos nom du dossier et $nomPhoto fichier temporaire
		/*move_uploaded_file($fichierTempo, 'videos/'.$videos);*/
		
		$ModifierEtudiant = new Etudiant($id_etudiant,$matricule,$nom_etudiant,$prenom_etudiant,$sexe,$adresse_lecteur,$tel_lecteur,$option_etud,$annee);
	
		$reponse = $ModifierEtudiant->ModifierEtud();
		
		if($reponse){
			header('location:?c=AdmlisteEtud');
		}
	}
	
	
	
	
	
	
		
		

	include('views/admin/formAffEtud.php');

?>

 	 	 	




