<?php
include('models/classe_ouvrages.php');

$listeOuvEmpr = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvEmpr->afficheOuvRes();


	include ('views/admin/listeOuvRes.php');
?>