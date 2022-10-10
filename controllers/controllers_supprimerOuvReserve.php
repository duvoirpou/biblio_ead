<?php
	include('models/classe_operations.php');

	$SupprimerOperations = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$suppression = $SupprimerOperations->supprimerOuvEmprunte();
	
	if($suppression){
		header('location:?c=listeOuv');
	}
?>