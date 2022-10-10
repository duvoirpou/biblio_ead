<?php
	include('models/classe_operations.php');

	$SupprimerOperations = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

	$suppression = $SupprimerOperations->annulerDemande();
	
	if($suppression){
		header('location:?c=AdmlisteReserve');
	}

	//Eviter les doublons
//SELECT DISTINCT `id_etudiant` FROM `operations_docs` WHERE `id_etudiant`=true
//SELECT DISTINCT `id_etudiant` FROM `operations_docs` WHERE GROUP BY id_etudiant

?>