<?php

	include('models/classe_ouvrages.php');
	include('models/classe_operations.php');

	/* $photo_client	   = NULL; */
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierOuv = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$ouv = $ModifierOuv->getIdOuv($code);

	}
	
	
	if(isset($_GET['code'])){
	
		$code=$_GET['code'];
		
		$ModifierOp = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
		$op = $ModifierOp->getIdOp($code);

	}
	

	if(isset($_POST['modifOuvEmprunte'])){
		$id_op      = htmlentities(trim($_POST['id_op']));
		$lib_op	   	= htmlentities(trim($_POST['lib_op']));
		$id_etudiant	   	= htmlentities(trim($_POST['id_etudiant']));
		$id_ouvrage	   	= htmlentities(trim($_POST['id_ouvrage']));
		$operation	   	= htmlentities(trim($_POST['operation']));
		$date_demande_op	   	= htmlentities(trim($_POST['date_demande_op']));
		$heure_demande_op	   	= htmlentities(trim($_POST['heure_demande_op']));
		$date_debut_op	   	= htmlentities(trim($_POST['date_debut_op']));
		$heure_debut_op	   	= htmlentities(trim($_POST['heure_debut_op']));
		$date_fin_op	   	= htmlentities(trim($_POST['date_fin_op']));
		$heure_fin_op	   	= htmlentities(trim($_POST['heure_fin_op']));
		$jour_op	   	= htmlentities(trim($_POST['jour_op']));
		$mois_op	   	= htmlentities(trim($_POST['mois_op']));
		$annee_op	   	= htmlentities(trim($_POST['annee_op']));
		
		$ModifierOperations = new Operations($id_op,$lib_op,$id_etudiant,$id_ouvrage,$operation,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op);
	
		$reponse = $ModifierOperations->ModifierOuvEmpr();
		
		if($reponse){
			header('location:?c=AdmlisteEmprunte');
		}
	}
	
	
	
	
	
	

	include('views/admin/formAffOuvEmprunte.php');

?>

 	 	 	




