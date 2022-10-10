<?php
// Start the session
session_start();
//index.php : va centraliser toutes les pages
if(isset($_GET['c'])){
	$ctrl = $_GET['c'];
}
else{
	$ctrl = NULL;
}

include('connexionBdd/connexionBdd.php');

switch($ctrl){
	case 'cnx'://controleur de connexion au site
		include('controllers/controllers_cnx.php');
	break;

	case 'espEtud':
		include('controllers/controllers_espace_etudiant.php');
	break;

	case 'pdf':
		include('controllers/controllers_affiche_pdf.php');
	break;

	case 'listeOuv':
		include('controllers/controllers_listeOuv.php');
	break;

	case 'listeMesOuvEmprunte':
		include('controllers/controllers_listeMesOuvEmprunte.php');
	break;

	case 'listeMesDocsEmprunte':
		include('controllers/controllers_listeMesDocsEmprunte.php');
	break;

	case 'listeMesDocsReserve':
		include('controllers/controllers_listeMesDocsReserve.php');
	break;

	case 'listeMesOuvReserve':
		include('controllers/controllers_listeMesOuvReserve.php');
	break;

	case 'annulerDemande'://
			include('controllers/controllers_annulerDemande.php');
	break;

	case 'annuleDemande'://
			include('controllers/controllers_annuleDemande.php');
	break;

	case 'listeDocs':
		include('controllers/controllers_listeDocs.php');
	break;
	
	case 'dcnxE'://controleur de connexion au site
		include('controllers/controllers_dcxEtu.php');
	break;

	case 'menu'://controleur d'affichage du menu
		include('controllers/controllers_menu.php');
		break;	
	
	case 'aff'://controleur d'affichage du contenu de la base de données
		include('controllers/controllers_afficherContenu.php');
	break;

	case 'LectModifOuv'://
		include('controllers/controllers_modifOuv.php');
	break;

	
	case 'LectModifExp'://
		include('controllers/controllers_modifExp.php');
	break;

	
	case 'LectModifDocs'://
		include('controllers/controllers_modifDocs.php');
	break;

	
	case 'AjoutOp':
		include('controllers/controllers_ajoutOp.php');
	break;

	
	case 'AjoutOpDocs':
		include('controllers/controllers_ajoutOpDocs.php');
	break;
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	case 'espAdm':
		include('controllers/admin/controllers_espace_admin.php');
	break;

	case 'AdmlisteOuv':
		include('controllers/admin/controllers_listeOuv.php');
	break;

	case 'AjoutOuv':
		include('controllers/admin/controllers_ajoutOuv.php');
	break;

	case 'AjoutAutOuv':
		include('controllers/admin/controllers_ajoutAutOuv.php');
	break;
	
	case 'AjoutAutDocs':
		include('controllers/admin/controllers_ajoutAutDocs.php');
	break;


	case 'AjoutCatOuv':
		include('controllers/admin/controllers_ajoutCatOuv.php');
	break;

	

	case 'cnxCat':
		include('controllers/admin/controllers_cnxCat.php');
	break;

	case 'cnxAutOuv':
		include('controllers/admin/controllers_cnxAutOuv.php');
	break;

	case 'cnxCompOuv':
		include('controllers/admin/controllers_cnxCompOuv.php');
	break;

	case 'cnxRayonOuv':
		include('controllers/admin/controllers_cnxRayonOuv.php');
	break;

	case 'cnxDocs':
		include('controllers/admin/controllers_cnxDocs.php');
	break;

	case 'cnxTypeDoc':
		include('controllers/admin/controllers_cnxTypeDocs.php');
	break;

	case 'cnxAutDocs':
		include('controllers/admin/controllers_cnxAutDocs.php');
	break;

	case 'cnxDmDocs':
		include('controllers/admin/controllers_cnxDmDocs.php');
	break;

	case 'cnxDsDocs':
		include('controllers/admin/controllers_cnxDsDocs.php');
	break;

	case 'modifDocs'://
		include('controllers/admin/controllers_modifDocs.php');
	break;
	
	case 'modifOuv'://
		include('controllers/admin/controllers_modifOuv.php');
	break;

	case 'attribOuv'://
		include('controllers/admin/controllers_attribOuv.php');
	break;

	case 'ajoutExp'://
		include('controllers/admin/controllers_ajoutExp.php');
	break;

	case 'attExp'://
		include('controllers/admin/controllers_attExp.php');
	break;
    
    case 'attDocs'://
		include('controllers/admin/controllers_attDocs.php');
	break;

	case 'cnxEtud'://
		include('controllers/admin/controllers_cnxEtud.php');
	break;
    
    case 'cnxEtuDocs'://
		include('controllers/admin/controllers_cnxEtudDocs.php');
	break;

	case 'modifEtud'://
		include('controllers/admin/controllers_modifEtud.php');
	break;

	case 'modifOuvEmpr'://
		include('controllers/admin/controllers_modifOuvEmpr.php');
	break;

	case 'modifOuvEmprunte'://
		include('controllers/admin/controllers_modifOuvEmprunte.php');
	break;

	case 'modifOuvReserve'://
		include('controllers/admin/controllers_modifOuvReserve.php');
	break;

	case 'modifDocsEmpr'://
		include('controllers/admin/controllers_modifDocsEmpr.php');
	break;

	case 'modifDocsRes'://
		include('controllers/admin/controllers_modifDocsRes.php');
	break;

	case 'modifOuvRes'://
		include('controllers/admin/controllers_modifOuvRes.php');
	break;

	case 'supprOuv'://
		include('controllers/admin/controllers_supprimerOuv.php');
	break;

	case 'supprOuvEmprunte'://
			include('controllers/admin/controllers_supprimerOuvEmprunte.php');
	break;

	case 'supprOuvReserve'://
			include('controllers/admin/controllers_supprimerOuvReserve.php');
	break;

	case 'supprDocsReserve'://
			include('controllers/admin/controllers_supprimerDocsReserve.php');
	break;
	
	case 'supprDocsEmprunte'://
			include('controllers/admin/controllers_supprimerDocsEmprunte.php');
	break;
	
	case 'supprDocs'://
		include('controllers/admin/controllers_supprimerDocs.php');
	break;
	
	case 'AjoutDocs':
		include('controllers/admin/controllers_ajoutDocs.php');
	break;
	
	case 'AjoutEtud':
		include('controllers/admin/controllers_ajoutEtud.php');
	break;
	
	case 'AdmlisteDocs':
		include('controllers/admin/controllers_listeDocs.php');
	break;

	case 'AdmlisteEtud':
		include('controllers/admin/controllers_listeEtud.php');
	break;

	case 'AdmlisteEmp':
		include('controllers/admin/controllers_listeEmpr.php');
	break;

	
	case 'AdmlisteDocsEmpr':
			include('controllers/admin/controllers_listeDocsEmpr.php');
	break;
	
	case 'AdmlisteRes':
		include('controllers/admin/controllers_listeRes.php');
	break;

	
	case 'AdmlisteDocsRes':
		include('controllers/admin/controllers_listeDocsRes.php');
	break;

	case 'AdmlisteEmprunte':
			include('controllers/admin/controllers_listeEmprunte.php');
	break;

	case 'AdmlisteDocsEmprunte':
			include('controllers/admin/controllers_listeDocsEmprunte.php');
	break;

	case 'AdmlisteReserve':
			include('controllers/admin/controllers_listeReserve.php');
	break;

	
	case 'AdmlisteDocsReserve':
			include('controllers/admin/controllers_listeDocsReserve.php');
	break;
	
	case 'dcnxAdm'://controleur de connexion au site
		include('controllers/admin/controllers_dcxAdm.php');
	break;
//=========================================================================		
	default: //affichage de la page d'accueil par défaut
		include('controllers/controllers_accueil.php');
	break;
}

?>


