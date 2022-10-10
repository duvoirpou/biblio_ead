<?php
	include('models/classe_operations_docs.php');

	$SupprimerOperations = new Operations_docs($id_op_doc,$lib_op_doc,$id_etudiant,$id_doc,$operation_doc);

	$suppression = $SupprimerOperations->annuleDemande();
	
	if($suppression){
		header('location:?c=AdmlisteDocsReserve');
	}

	//Eviter les doublons
//SELECT DISTINCT `id_etudiant` FROM `operations_docs` WHERE `id_etudiant`=true
//SELECT DISTINCT `id_etudiant` FROM `operations_docs` WHERE GROUP BY id_etudiant

?>