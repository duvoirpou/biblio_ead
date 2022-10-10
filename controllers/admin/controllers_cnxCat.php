<?php
include('models/classe_categories.php');


$listeCategories = new Categories(NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeCategories->afficheCategories();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['lib_cat_ouv'])){
		
		
		$lib_cat_ouv		= htmlentities(trim($_POST['lib_cat_ouv']));
		
		
		$cnxCategories = new Categories(NULL,NULL);
	
		$reponse = $cnxCategories->connexionSiteCategories($lib_cat_ouv);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_cat_ouv']		=$reponse->id_cat_ouv;
						$_SESSION['lib_cat_ouv']		=$reponse->lib_cat_ouv;
						

			header('location:?c=cnxAutOuv');
		}else{
			header('location:?c=cnxCat');
		}
	
	}}





if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_cat_ouv'])){//si ces champs sont remplis -> ligne 33
		
		
		$lib_cat_ouv		= htmlentities(trim($_POST['lib_cat_ouv']));
		
		
		
		$AjouterCategories = new Categories (NULL,$lib_cat_ouv);
	
		$reponse = $AjouterCategories->ajoutCat();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer une nouvelle catégorie d\'ouvrage';
			header('location:?c=cnxCat');
			
		}else{
			$_SESSION['info'] = 'Cette catégorie existe déjà';
			header('location:?c=cnxCat');
			
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


	include ('views/admin/cnxCat.php');
?>