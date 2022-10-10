<?php
include('models/classe_documents.php');

$listeDocuments = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeDocuments->afficheDocuments();


	include ('views/admin/listeDocs.php');
?>