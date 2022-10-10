<?php
include ('models/classe_etudiant.php');
include ('models/admin/classe_admin.php');

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
						
			header('location:?c=espEtud');
		}else{
			header('location:?c');
		}
	
	}}
	
	
	
	
	
	
	if(isset($_POST['envoyer'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['nom_admin']) AND !empty($_POST['mp_admin'])){
		
		$nom_admin	= htmlentities(trim($_POST['nom_admin']));
		$mp_admin		= htmlentities(trim($_POST['mp_admin']));
		
		
		$cnxUser = new Admin (NULL,NULL,NULL);
	
		$reponse = $cnxUser->connexionSiteAdmin($nom_admin,$mp_admin);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_admin']		=$reponse->id_admin;
						$_SESSION['nom_admin']		=$reponse->nom_admin;
						$_SESSION['mp_admin']		=$reponse->mp_admin;
						
						
						
			header('location:?c=espAdm');
		}else{
			header('location:?c');
		}
	
	}}

	include ('views/accueil.php');
?>