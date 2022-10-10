<?php
include('models/classe_etudiant.php');

$listeEtudiants = new Etudiant(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeEtudiants->afficheEtudiant();


	include ('views/admin/listeEtudiants.php');
?>