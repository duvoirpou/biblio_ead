<?php
include('models/classe_operations_docs.php');
include('models/classe_documents.php');
include('models/classe_etudiant.php');

if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierDocs = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$docs = $ModifierDocs->getIdDocs($code);

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
						
			header('location:?c=attDocs');
		}
	
	}}
	



include ('views/admin/formCnxEtudDocs.php');
?>