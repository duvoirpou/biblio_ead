<?php
	if(!empty($_SESSION['nom_etudiant'])){
		session_destroy();
		header('Location:?c');
	}
?>