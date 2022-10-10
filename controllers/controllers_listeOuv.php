<?php
include('models/classe_ouvrages.php');
include('models/classe_operations.php');


$listeOuvrages = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvrages->afficheOuvrages();
	
	
$listeOuv = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affO = $listeOuv->afficheOuv();
	
	$listeOuvrage = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOuv = $listeOuvrage->afficheOuvToutEmpr();


	$listeOperations = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOp = $listeOperations->afficheOp();


	include ('views/listeOuv.php');
?>