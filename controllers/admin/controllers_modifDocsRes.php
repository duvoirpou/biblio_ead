<?php

	include('models/classe_documents.php');
	include('models/classe_operations_docs.php');

	/* $photo_client	   = NULL; */
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierDocs = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$docs = $ModifierDocs->getIdDocs($code);

	}
	
	
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierOp_doc = new Operations_docs(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$op_doc = $ModifierOp_doc->getIdOp_doc($code);

	}
	

	if(isset($_POST['modifDocsRes'])){
        
		$id_op_doc      = htmlentities(trim($_POST['id_op_doc']));
		$lib_op_doc	   	= htmlentities(trim($_POST['lib_op_doc']));
		$id_etudiant	   	= htmlentities(trim($_POST['id_etudiant']));
		$id_doc	   	= htmlentities(trim($_POST['id_doc']));
		
		$date_demande_op	   	= htmlentities(trim($_POST['date_demande_op']));
		$heure_demande_op	   	= htmlentities(trim($_POST['heure_demande_op']));
		$date_debut_op	   	= htmlentities(trim($_POST['date_debut_op']));
		$heure_debut_op	   	= htmlentities(trim($_POST['heure_debut_op']));
		$date_fin_op	   	= htmlentities(trim($_POST['date_fin_op']));
		$heure_fin_op	   	= htmlentities(trim($_POST['heure_fin_op']));
		$jour_op	   	= htmlentities(trim($_POST['jour_op']));
		$mois_op	   	= htmlentities(trim($_POST['mois_op']));
		$annee_op	   	= htmlentities(trim($_POST['annee_op']));
		
		$ModifierOperations = new Operations_docs($id_op_doc,$lib_op_doc,$id_etudiant,$id_doc,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op);
	
		$reponse = $ModifierOperations->ModifierDocsEmpr();
		
		if($reponse){
			header('location:?c=AdmlisteDocsRes');
		}
	}
	
	
	
	
	
	
		
		
		
		
		
		
		
		
		
		
		
		
		

	include('views/admin/formAffDocsRes.php');

?>

 	 	 	




