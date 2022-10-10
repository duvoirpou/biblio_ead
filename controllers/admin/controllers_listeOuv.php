<?php
include('models/classe_ouvrages.php');

$listeOuvrages = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvrages->afficheOuvrages();


	include ('views/admin/listeOuv.php');
?>