<?php
include('models/classe_documents.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['theme_doc']) AND !empty($_POST['option_doc'])){
		
		$theme_doc		= htmlentities(trim($_POST['theme_doc']));
		$option_doc		= htmlentities(trim($_POST['option_doc']));
		
		$niveau_doc		= htmlentities(trim($_POST['niveau_doc']));
		$id_auteur		= htmlentities(trim($_POST['id_auteur']));
		$id_dm	= htmlentities(trim($_POST['id_dm']));
		$id_d_rapp_stage	= htmlentities(trim($_POST['id_d_rapp_stage']));
		$id_type_doc	= htmlentities(trim($_POST['id_type_doc']));
		
		
		$AjouterDocuments = new Documents (NULL,$theme_doc,$option_doc,$niveau_doc,$id_auteur,$id_dm,$id_d_rapp_stage,$id_type_doc);
	
		$reponse = $AjouterDocuments->ajoutDocuments();
	if($reponse){
			header('location:?c=AdmlisteDocs');
		}else{
			header('location:?c=AjoutDocs');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/ajoutDocs.php');
?>