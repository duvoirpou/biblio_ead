<?php
include('models/classe_auteurs.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['nom_auteur']) AND !empty($_POST['prenom_auteur'])){//si ces champs sont remplis -> ligne 33
		
		$nom_auteur		= htmlentities(trim($_POST['nom_auteur']));
		$prenom_auteur		= htmlentities(trim($_POST['prenom_auteur']));
		
		
		
		$AjouterAuteurs = new Auteurs (NULL,$nom_auteur,$prenom_auteur);
	
		$reponse = $AjouterAuteurs->ajoutAuteur();
	if($reponse){
			header('location:?c=cnxAutOuv');
		}else{
			header('location:?c=ajoutAutOuv');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/ajoutAutOuv.php');
?>