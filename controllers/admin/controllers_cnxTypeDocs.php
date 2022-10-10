<?php
include('models/classe_type_documents.php');


$listeType_doc = new Type_doc(NULL,NULL);
	
	$aff = $listeType_doc->afficheTypeDoc();


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;

		if(!empty($_POST['lib_type_doc'])){
		
		
		$lib_type_doc		= htmlentities(trim($_POST['lib_type_doc']));
		
		
		$cnxType_doc = new Type_doc(NULL,NULL);
	
		$reponse = $cnxType_doc->connexionTypeDoc($lib_type_doc);
			
		if($reponse){

			//ajout des sessions
						$_SESSION['id_type_doc']		=$reponse->id_type_doc;
						$_SESSION['lib_type_doc']		=$reponse->lib_type_doc;
						

			if($_SESSION['lib_type_doc']=='Mémoire'){
				header('location:?c=cnxDmDocs');
			}else{
				header('location:?c=cnxDsDocs');
			}
			
		}else{
			header('location:?c=cnxTypeDoc');
		}
	
	}}





if(isset($_POST['enregistre'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_type_doc'])){//si ces champs sont remplis -> ligne 33
		
		
		$lib_type_doc		= htmlentities(trim($_POST['lib_type_doc']));
		
		
		
		$AjouterType_doc = new Type_doc (NULL,$lib_type_doc);
	
		$reponse = $AjouterType_doc->ajoutTypeDoc();
	if($reponse){
		$_SESSION['info'] = 'Vous venez d\'enrégistrer une nouveau type de document';
			header('location:?c=cnxTypeDoc');
			
		}else{
			$_SESSION['info'] = 'Ce type de document existe déjà';
			header('location:?c=cnxTypeDoc');
			
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


	include ('views/admin/cnxTypeDocs.php');
?>