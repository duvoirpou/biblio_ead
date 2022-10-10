<?php
include('models/classe_documents.php');

$listeDocsReserve = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeDocsReserve->afficheDocsReserve();


$listeDocsRes = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affRes = $listeDocsRes->afficheDocsRes();


	include ('views/admin/listeDocsReserve.php');
?>