<?php
include('models/classe_compartiments.php');
include('models/classe_rayon.php');


$listeCompartiments = new Compartiments(NULL,NULL,NULL);
	
	$aff = $listeCompartiments->afficheCompartiments();
	
$listeRayon = new Rayon(NULL,NULL);
	
	$affRayon = $listeRayon->afficheRayon();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['lib_rayon'])){
		
		
		$lib_rayon		= htmlentities(trim($_POST['lib_rayon']));
		
		
		$cnxRayon = new Rayon(NULL,NULL);
	
		$reponse = $cnxRayon->connexionSiteRayon($lib_rayon);
			
		if($reponse){

			//ajout des sessions
						
						$_SESSION['lib_rayon']		=$reponse->lib_rayon;
						$_SESSION['id_rayon']		=$reponse->id_rayon;

			header('location:?c=cnxCompOuv');
		}else{
			header('location:?c=cnxRayonOuv');
		}
	
	}}




if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_rayon'])){//si ces champs sont remplis -> ligne 33
		
		$lib_rayon		= htmlentities(trim($_POST['lib_rayon']));
		
		
		
		
		$AjouterRayon = new Rayon (NULL,$lib_rayon);
	
		$reponse = $AjouterRayon->ajoutRayon();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer un nouveau rayon';
			header('location:?c=cnxRayonOuv');
		}else{
			$_SESSION['info'] = 'Ce rayon existe déjà';
			header('location:?c=cnxRayonOuv');
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


	include ('views/admin/cnxRayonOuv.php');
?>