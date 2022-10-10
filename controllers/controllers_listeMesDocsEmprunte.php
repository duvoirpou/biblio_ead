<?php
include('models/classe_documents.php');
include('models/classe_operations_docs.php');



	$listeDocument = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affMesMesDocsEmprunte = $listeDocument->afficheMesDocsEmprunte();




	include ('views/listeMesDocsEmprunte.php');
?>