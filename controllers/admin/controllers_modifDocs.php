<?php

	include('models/classe_documents.php');
	include('models/classe_operations_docs.php');

	/* $photo_client	   = NULL; */
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierDocs = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$docs = $ModifierDocs->getIdDocs($code);

	}
	

	if(isset($_POST['modifDocs'])){
		$id_doc      = htmlentities(trim($_POST['id_doc']));
		$theme_doc	   	= htmlentities(trim($_POST['theme_doc']));
		$option_doc	   	= htmlentities(trim($_POST['option_doc']));
		$niveau_doc	   	= htmlentities(trim($_POST['niveau_doc']));
		$id_auteur	   	= htmlentities(trim($_POST['id_auteur']));
		$id_dm	   	= htmlentities(trim($_POST['id_dm']));
		$id_d_rapp_stage = htmlentities(trim($_POST['id_d_rapp_stage']));
		$id_type_doc	   	= htmlentities(trim($_POST['id_type_doc']));
		
		
		/*$videos	= htmlentities(trim($_FILES['videos']['name']));*/
		
		
		

		//tmp_name est un dossier temporaire
		/*$fichierTempo=$_FILES['videos']['tmp_name'];*/
		
		//chemin pour recevoir les photos du site
		//videos nom du dossier et $nomPhoto fichier temporaire
		/*move_uploaded_file($fichierTempo, 'videos/'.$videos);*/
		
		$ModifierDocuments = new Documents($id_doc,$theme_doc,$option_doc,$niveau_doc,$id_auteur,$id_dm,$id_d_rapp_stage,$id_type_doc);
	
		$reponse = $ModifierDocuments->ModifierDocs();
		
		if($reponse){
			header('location:?c=AdmlisteDocs');
		}
	}
	
	
	
	
	
	
		
		if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_op_doc'])){//si ces champs sont remplis -> ligne 33
		
		$lib_op_doc		= htmlentities(trim($_POST['lib_op_doc']));
		$id_etudiant		= htmlentities(trim($_POST['id_etudiant']));
		$id_doc		= htmlentities(trim($_POST['id_doc']));
		
		
		$AjouterOperations_docs = new Operations_docs (NULL,$lib_op_doc,$id_etudiant,$id_doc,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op); 
	
		$reponse = $AjouterOperations_docs->ajoutOperations_docs();
	if($reponse){
			header('location:?c=espEtud');
		}else{
			header('location:?c=AjoutOpDocs');
		}
		}//le msg est envoyé
		
		
		}
		
		
		
		
		
		
		
		
		
		
		

	include('views/admin/formAffDocs.php');

?>

 	 	 	




