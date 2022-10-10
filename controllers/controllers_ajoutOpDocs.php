<?php
include('models/classe_operations_docs.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['titre_ouvrage']) AND !empty($_POST['resume_ouvrage'])){//si ces champs sont remplis -> ligne 33
		
		$lib_op_doc		= htmlentities(trim($_POST['lib_op_doc']));
		$id_etudiant		= htmlentities(trim($_POST['id_etudiant']));
		$id_doc		= htmlentities(trim($_POST['id_doc']));
		
		
		$AjouterOperations_docs = new Operations_docs (NULL,$lib_op,$id_etudiant,$id_doc);
	
		$reponse = $AjouterOperations_docs->ajoutOperations_docs();
	if($reponse){
			header('location:?c=espAdm');
		}else{
			header('location:?c=AjoutOpDocs');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/ajoutOpDocs.php');
?>