<?php
include('models/classe_documents.php');

$listeDocsEmpr = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeDocsEmpr->afficheDocumentsEmprunte();
	
	
$listeDocsE = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affE = $listeDocsE->afficheDocumentsEmpr();
	
$listeDocsR = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affR = $listeDocsR->afficheDocsRes();


	include ('views/admin/listeDocsEmprunte.php');
?>