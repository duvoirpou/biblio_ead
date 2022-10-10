<?php
include('models/classe_documents.php');

$listeDocumentsEmpr = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeDocumentsEmpr->afficheDocumentsEmpr();


	include ('views/admin/listeDocsEmpr.php');
?>