<?PHP	//Pour avoir le mois et la date du jour, en francais
	$tab_mois = array('','janvier','février','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre');
	$date_jour = date("d").' '.$tab_mois[date("n")].' '.date("Y");
	echo"Brazzaville, le ".$date_jour;
	
	$mois = $tab_mois[date("n")];
	$annee = date("Y");
?>