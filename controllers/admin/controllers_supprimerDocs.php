<?php
	include('models/classe_documents.php');

	$SupprimerDocuments = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL);

	$suppression = $SupprimerDocuments->supprimerDocs();
	
	if($suppression){
		header('location:?c=AdmlisteDocs');
	}
?>