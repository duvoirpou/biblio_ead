<?php
include('models/classe_documents.php');
include('models/classe_operations_docs.php');



	$listeDocument = new Documents(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affMesDocsReserve = $listeDocument->afficheMesDocsReserve();




	include ('views/listeMesDocsReserve.php');
?>