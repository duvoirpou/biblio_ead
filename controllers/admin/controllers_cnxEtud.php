<?php

	include('models/classe_ouvrages.php');
	include('models/classe_operations.php');
	include('models/classe_exemplaire.php');
	include('models/classe_etudiant.php');

	/* $photo_client	   = NULL; */
	
	
if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierExp = new Exemplaires(NULL,NULL,NULL,NULL,NULL,NULL);
		$exp = $ModifierExp->getIdExp($code);

	}
	
	
	
	

	if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['nom_etudiant']) AND !empty($_POST['matricule'])){
		
		$nom_etudiant	= htmlentities(trim($_POST['nom_etudiant']));
		$matricule		= htmlentities(trim($_POST['matricule']));
		
		
		$cnxUser = new Etudiant (NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
		$reponse = $cnxUser->connexionSiteUser($nom_etudiant,$matricule);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_etudiant']		=$reponse->id_etudiant;
						$_SESSION['nom_etudiant']		=$reponse->nom_etudiant;
						$_SESSION['prenom_etudiant']		=$reponse->prenom_etudiant;
						
						$_SESSION['matricule']		=$reponse->matricule;
						
						$_SESSION['sexe']		=$reponse->sexe;
						$_SESSION['adresse_lecteur']		=$reponse->adresse_lecteur;
						$_SESSION['tel_lecteur']		=$reponse->tel_lecteur;
						
			header('location:?c=attExp');
		}else{
			header('location:?c=cnxEtud');
		}
	
	}}
	
	
	
	
		
		$listeOperations = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOperations->afficheOperations();
	
		$listeOpDemEmp = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOpDemEmp = $listeOpDemEmp->afficheOpDemEmpr();
		
		$listeOuvrages = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOuv = $listeOuvrages->afficheOuvrages();
		
		
        
        $listeExemplaire = new Exemplaires(NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affExp = $listeExemplaire->afficheExemplaire();
		

	include('views/admin/formCnxEtud.php');

?>

 	 	 	




