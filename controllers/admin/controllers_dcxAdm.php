<?php
	if(!empty($_SESSION['nom_admin'])){
		session_destroy();
		header('Location:?c');
	}
?>