<?php
include('models/classe_documents.php');

$listeDocsRes = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeDocsRes->afficheDocsRes();


	include ('views/admin/listeDocsRes.php');
?>