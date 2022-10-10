<?php
include('models/classe_compartiments.php');
include('models/classe_rayon.php');


$listeCompartiments = new Compartiments(NULL,NULL,NULL);
	
	$aff = $listeCompartiments->afficheCompartiments();
	
$listeRayon = new Rayon(NULL,NULL);
	
	$affRayon = $listeRayon->afficheRayon();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['lib_comp'])){
		
		
		$lib_comp		= htmlentities(trim($_POST['lib_comp']));
		
		
		$cnxCompartiments = new Compartiments(NULL,NULL,NULL);
	
		$reponse = $cnxCompartiments->connexionSiteCompartiments($lib_comp);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_comp']		=$reponse->id_comp;
						$_SESSION['lib_comp']		=$reponse->lib_comp;
						$_SESSION['id_rayon']		=$reponse->id_rayon;

			header('location:?c=AjoutOuv');
		}else{
			header('location:?c=cnxCompOuv');
		}
	
	}}




if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_comp'])){//si ces champs sont remplis -> ligne 33
		
		$lib_comp		= htmlentities(trim($_POST['lib_comp']));
		$id_rayon		= htmlentities(trim($_POST['id_rayon']));
		
		
		
		$AjouterCompartiments = new Compartiments (NULL,$lib_comp,$id_rayon);
	
		$reponse = $AjouterCompartiments->ajoutCompartiments();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer un nouveau compartiment';
			header('location:?c=cnxCompOuv');
		}else{
			$_SESSION['info'] = 'Ce compartiment existe déjà';
			header('location:?c=cnxCompOuv');
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


	include ('views/admin/cnxCompOuv.php');
?>