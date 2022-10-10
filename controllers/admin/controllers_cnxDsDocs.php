<?php
include('models/classe_d_rapp_stage.php');


$listeD_rapp_stage = new D_rapp_stage(NULL,NULL,NULL,NULL);
	
	$aff = $listeD_rapp_stage->afficheD_rapp_stage();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['nom']) AND !empty($_POST['prenom'])){
		
		
		$nom		= htmlentities(trim($_POST['nom']));
		$prenom		= htmlentities(trim($_POST['prenom']));
		
		$cnxD_rapp_stage = new D_rapp_stage(NULL,NULL,NULL,NULL);
	
		$reponse = $cnxD_rapp_stage->connexionSiteD_rapp_stage($nom,$prenom);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_d_rapp_stage']		=$reponse->id_d_rapp_stage;
						$_SESSION['nom']		=$reponse->nom;
						$_SESSION['prenom']		=$reponse->prenom;

			header('location:?c=cnxAutDocs');
		}else{
			header('location:?c=cnxDsDocs');
		}
	
	}}




if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['nom']) AND !empty($_POST['prenom'])){//si ces champs sont remplis -> ligne 33
		
		$nom		= htmlentities(trim($_POST['nom']));
		$prenom		= htmlentities(trim($_POST['prenom']));
		
		$sexe		= htmlentities(trim($_POST['sexe']));
		
		
		
		
		$AjouterD_rapp_stage = new D_rapp_stage (NULL,$nom,$prenom,$sexe);
	
		$reponse = $AjouterD_rapp_stage->ajoutD_rapp_stage();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer un nouveau directeur de rapport de stage';
			header('location:?c=cnxDsDocs');
		}else{
			$_SESSION['info'] = 'Ce Directeur existe déjà';
			header('location:?c=cnxDsDocs');
		}
		}//le msg est envoyé
		
		
		}








	include ('views/admin/cnxDsDocs.php');
?>