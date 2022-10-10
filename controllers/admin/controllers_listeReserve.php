<?php
include('models/classe_ouvrages.php');

$listeOuvEmpr = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvEmpr->afficheOuvReserve();


$listeOuvRes = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affRes = $listeOuvRes->afficheOuvRes();


	include ('views/admin/listeOuvReserve.php');
?>