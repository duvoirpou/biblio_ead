<?php
include('models/classe_d_memoire.php');


$listeD_memoire = new D_memoire(NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeD_memoire->afficheD_memoire();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['nom_dm']) AND !empty($_POST['prenom_dm'])){
		
		
		$nom_dm		= htmlentities(trim($_POST['nom_dm']));
		$prenom_dm		= htmlentities(trim($_POST['prenom_dm']));
		
		$cnxD_memoire = new D_memoire(NULL,NULL,NULL,NULL,NULL,NULL);
	
		$reponse = $cnxD_memoire->connexionSiteD_memoire($nom_dm,$prenom_dm);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_dm']		=$reponse->id_dm;
						$_SESSION['nom_dm']		=$reponse->nom_dm;
						$_SESSION['prenom_dm']		=$reponse->prenom_dm;

			header('location:?c=cnxAutDocs');
		}else{
			header('location:?c=cnxDmDocs');
		}
	
	}}




if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['nom_dm']) AND !empty($_POST['prenom_dm'])){//si ces champs sont remplis -> ligne 33
		
		$nom_dm		= htmlentities(trim($_POST['nom_dm']));
		$prenom_dm		= htmlentities(trim($_POST['prenom_dm']));
		
		$sexe_dm		= htmlentities(trim($_POST['sexe_dm']));
		$grade_dm		= htmlentities(trim($_POST['grade_dm']));
		$fonction_dm		= htmlentities(trim($_POST['fonction_dm']));
		
		
		
		
		$AjouterD_memoire = new D_memoire (NULL,$nom_dm,$prenom_dm,$sexe_dm,$grade_dm,$fonction_dm);
	
		$reponse = $AjouterD_memoire->ajoutD_memoire();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer un nouveau directeur de mémoire';
			header('location:?c=cnxDmDocs');
		}else{
			$_SESSION['info'] = 'Ce DM existe déjà';
			header('location:?c=cnxDmDocs');
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


	include ('views/admin/cnxDmDocs.php');
?>