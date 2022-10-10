<?php
include('models/classe_ouvrages.php');

$listeOuvEmpr = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvEmpr->afficheOuvEmpr();


	include ('views/admin/listeOuvEmpr.php');
?>