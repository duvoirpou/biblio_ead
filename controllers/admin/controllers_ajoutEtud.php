<?php
include('models/classe_etudiant.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['prenom_etudiant']) AND !empty($_POST['nom_etudiant'])){
		
		$matricule		= htmlentities(trim($_POST['matricule']));
		$nom_etudiant		= htmlentities(trim($_POST['nom_etudiant']));
		
		$prenom_etudiant		= htmlentities(trim($_POST['prenom_etudiant']));
		$sexe		= htmlentities(trim($_POST['sexe']));
		$adresse_lecteur	= htmlentities(trim($_POST['adresse_lecteur']));
		$tel_lecteur	= htmlentities(trim($_POST['tel_lecteur']));
		$option_etud	= htmlentities(trim($_POST['option_etud']));
		$annee	= htmlentities(trim($_POST['annee']));
		
		
		$AjouterEtudiant = new Etudiant(NULL,$matricule,$nom_etudiant,$prenom_etudiant,$sexe,$adresse_lecteur,$tel_lecteur,$option_etud,$annee);
	
		$reponse = $AjouterEtudiant->ajoutEtudiant();
	if($reponse){
			header('location:?c=AdmlisteEtud');
		}else{
			header('location:?c=AjoutEtud');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/ajoutEtud.php');
?>