<?php
include('models/classe_ouvrages.php');
include('models/classe_operations.php');


$listeOuvrages = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvrages->afficheOuvrages();
	
	$listeOuvrage = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affMesOuvReserve = $listeOuvrage->afficheMesOuvReserve();


	$listeOperations = new Operations(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affOp = $listeOperations->afficheOp();


	include ('views/listeMesOuvReserve.php');
?>