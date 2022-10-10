<?php
include('models/classe_operations.php');


if(isset($_POST['valider'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_op'])){//si ces champs sont remplis -> ligne 33
		
		$lib_op		= htmlentities(trim($_POST['lib_op']));
		$id_etudiant		= htmlentities(trim($_POST['id_etudiant']));
		$id_exp		= htmlentities(trim($_POST['id_exp']));
		$operation		= htmlentities(trim($_POST['operation']));
		$date_demande_op	   	= htmlentities(trim($_POST['date_demande_op']));
		$heure_demande_op	   	= htmlentities(trim($_POST['heure_demande_op']));
		$date_debut_op	   	= htmlentities(trim($_POST['date_debut_op']));
		$heure_debut_op	   	= htmlentities(trim($_POST['heure_debut_op']));
		$date_fin_op	   	= htmlentities(trim($_POST['date_fin_op']));
		$heure_fin_op	   	= htmlentities(trim($_POST['heure_fin_op']));
		$jour_op	   	= htmlentities(trim($_POST['jour_op']));
		$mois_op	   	= htmlentities(trim($_POST['mois_op']));
		$annee_op	   	= htmlentities(trim($_POST['annee_op']));
		
		$AjouterOperations = new Operations (NULL,$lib_op,$id_etudiant,$id_exp,$operation,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op);
	
		$reponse = $AjouterOperations->ajoutOperations();
	if($reponse){
			header('location:?c=AdmlisteEmprunte');
		}/*else{
			header('location:?c=LectModifOuv');
		}*/
		}//le msg est envoyé
		
		
		}


include ('views/admin/formAttExp.php');
?>