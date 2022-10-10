<?php
include('models/classe_categories.php');

if(isset($_POST['enregistrer'])){
		//var_dump($_POST);exit;
		
		if(!empty($_POST['lib_cat_ouv'])){//si ces champs sont remplis -> ligne 33
		
		
		$lib_cat_ouv		= htmlentities(trim($_POST['lib_cat_ouv']));
		
		
		
		$AjouterCategories = new Categories (NULL,$lib_cat_ouv);
	
		$reponse = $AjouterCategories->ajoutCat();
	if($reponse){
			header('location:?c=cnxCat');
		}else{
			header('location:?c=AjoutCat');
		}
		}//le msg est envoyé
		
		
		}


	include ('views/admin/ajoutCat.php');
?>