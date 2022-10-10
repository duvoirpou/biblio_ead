<?php
include('models/classe_operations.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['titre_ouvrage']) AND !empty($_POST['resume_ouvrage'])){//si ces champs sont remplis -> ligne 33
		
		$lib_op		= htmlentities(trim($_POST['lib_op']));
		$id_etudiant		= htmlentities(trim($_POST['id_etudiant']));
		$id_ouvrage		= htmlentities(trim($_POST['id_ouvrage']));
		$date_demande_op	   	= htmlentities(trim($_POST['date_demande_op']));
		$heure_demande_op	   	= htmlentities(trim($_POST['heure_demande_op']));
		$date_debut_op	   	= htmlentities(trim($_POST['date_debut_op']));
		$heure_debut_op	   	= htmlentities(trim($_POST['heure_debut_op']));
		$date_fin_op	   	= htmlentities(trim($_POST['date_fin_op']));
		$heure_fin_op	   	= htmlentities(trim($_POST['heure_fin_op']));
		$jour_op	   	= htmlentities(trim($_POST['jour_op']));
		$mois_op	   	= htmlentities(trim($_POST['mois_op']));
		$annee_op	   	= htmlentities(trim($_POST['annee_op']));
		
		$AjouterOperations = new Operations (NULL,$lib_op,$id_etudiant,$id_ouvrage,$operation,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op);
	
		$reponse = $AjouterOperations->ajoutOperations();
	if($reponse){
			header('location:?c=espAdm');
		}else{
			header('location:?c=AjoutOp');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/ajoutOp.php');
?>