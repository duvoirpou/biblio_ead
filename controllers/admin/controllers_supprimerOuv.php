<?php
	include('models/classe_ouvrages.php');

	$SupprimerOuvrages = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);

	$suppression = $SupprimerOuvrages->supprimerOuv();
	
	if($suppression){
		header('location:?c=AdmlisteOuv');
	}
?>