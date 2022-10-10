<?php
include('models/classe_auteurs.php');


$listeAuteurs = new Auteurs(NULL,NULL,NULL);
	
	$aff = $listeAuteurs->afficheAuteurs();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['nom_auteur']) AND !empty($_POST['prenom_auteur'])){
		
		
		$nom_auteur		= htmlentities(trim($_POST['nom_auteur']));
		$prenom_auteur		= htmlentities(trim($_POST['prenom_auteur']));
		
		$cnxAuteurs = new Auteurs(NULL,NULL,NULL);
	
		$reponse = $cnxAuteurs->connexionSiteAuteurs($nom_auteur,$prenom_auteur);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_auteur']		=$reponse->id_auteur;
						$_SESSION['nom_auteur']		=$reponse->nom_auteur;
						$_SESSION['prenom_auteur']		=$reponse->prenom_auteur;

			header('location:?c=cnxRayonOuv');
		}else{
			header('location:?c=cnxAutOuv');
		}
	
	}}




if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['nom_auteur']) AND !empty($_POST['prenom_auteur'])){//si ces champs sont remplis -> ligne 33
		
		$nom_auteur		= htmlentities(trim($_POST['nom_auteur']));
		$prenom_auteur		= htmlentities(trim($_POST['prenom_auteur']));
		
		
		
		$AjouterAuteurs = new Auteurs (NULL,$nom_auteur,$prenom_auteur);
	
		$reponse = $AjouterAuteurs->ajoutAuteur();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer un nouvel auteur';
			header('location:?c=cnxAutOuv');
		}else{
			$_SESSION['info'] = 'Cet auteur existe déjà';
			header('location:?c=cnxAutOuv');
		}
		}//le msg est envoyé
		
		
		}




if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['commentaire']) AND !empty($_POST['id_user'])){//si ces champs sont remplis -> ligne 33
		$id_sujet		= htmlentities(trim($_POST['id_sujet']));
		$titre_ouvrage		= htmlentities(trim($_POST['titre_ouvrage']));
		$resume_ouvrage		= htmlentities(trim($_POST['resume_ouvrage']));
		$nbre_page_ouv		= htmlentities(trim($_POST['nbre_page_ouv']));
		$id_cat		= htmlentities(trim($_POST['id_cat']));
		
		
		
		
		$AjouterOuvrages = new Ouvrages (NULL,$id_sujet,$titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$id_cat);
	
		$reponse = $AjouterOuvrages->ajoutOuvrage();
	if($reponse){
			header('location:?c=espAdm');
		}else{
			header('location:?c=AjoutOuv');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/cnxAutOuv.php');
?>