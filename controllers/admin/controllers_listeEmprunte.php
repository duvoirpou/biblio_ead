<?php
include('models/classe_ouvrages.php');

$listeOuvEmprunte = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvEmprunte->afficheOuvEmprunte();
	
	
	$listeOuvEmpr = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affEmpr = $listeOuvEmpr->afficheOuvEmpr();

$listeOuvRes = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affRes = $listeOuvRes->afficheOuvRes();

	include ('views/admin/listeOuvEmprunte.php');
?>