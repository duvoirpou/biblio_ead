<?php
include('models/classe_ouvrages.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['titre_ouvrage'])){//si ces champs sont remplis -> ligne 33
		
		$titre_ouvrage		= htmlentities(trim($_POST['titre_ouvrage']));
		$resume_ouvrage		= htmlentities(trim($_POST['resume_ouvrage']));
		$nbre_page_ouv		= htmlentities(trim($_POST['nbre_page_ouv']));
		$id_cat_ouv		= htmlentities(trim($_POST['id_cat_ouv']));
		
		$id_auteur		= htmlentities(trim($_POST['id_auteur']));
		$id_comp		= htmlentities(trim($_POST['id_comp']));
		//$operation		= htmlentities(trim($_POST['operation']));
		//$id_etudiant		= htmlentities(trim($_POST['id_etudiant']));
		
		
		$AjouterOuvrages = new Ouvrages (NULL,$titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$id_cat_ouv,$id_auteur,$id_comp /*,$operation,$id_etudiant*/ );
	
		$reponse = $AjouterOuvrages->ajoutOuvrage();
	if($reponse){
			header('location:?c=AdmlisteOuv');
		}else{
			$_SESSION['info'] = 'Cet ouvrage existe déjà';
			header('location:?c=AjoutOuv');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/ajoutOuv.php');
?>