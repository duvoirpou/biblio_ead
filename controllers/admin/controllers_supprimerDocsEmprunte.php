<?php
	include('models/classe_operations_docs.php');

	$SupprimerOperations_docs = new Operations_docs(NULL,NULL,NULL,NULL,NULL);

	$suppression = $SupprimerOperations_docs->annuleDemande();
	
	if($suppression){
		header('location:?c=AdmlisteDocsEmprunte');
	}
?>