<?php
	if(!$_SESSION['id_admin']){
		header('location:?c');
	}
?>

<!doctype html>
<html lang="fr-FR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap4 CSS -->
     <link rel="stylesheet" href="css/bootstrap.min.css"/>
   <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/all.css" />
    

    <title>Bibliothèque</title>
  </head>
  <body>
   
   <div class="container">
    
<?php include('header.php'); ?> 
        
        <div class="row" style="">
          <!--<div class="col">-->
            <img src="images/bibliothèque.jpg" alt="" style="width: 100%" />
          <!--</div>-->
        </div>
        
        
        <div class="row">
          <div class="col-sm">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!--<a class="navbar-brand" href="#">Navbar</a>-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      
                      <a class="nav-link" href="?c=espAdm"><b>Accueil <span class="sr-only">(current)</span></b></a>
                      
                      
                    </li>
                    <li class="nav-item active dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_documents.php'); ?>
                      
                    </li>
										<li class="nav-item dropdown">
                      
                      <?php include('menu_etudiants.php'); ?>
                      
                      
                    </li>
										<!--<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>Operations</b>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Consultation</a>
                        <a class="dropdown-item" href="#">Réservation</a>
												<a class="dropdown-item" href="#">Emprunt</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                      </div>
                    </li>-->
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b><?php echo ($_SESSION['nom_admin']); ?></b>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?c=dcnxAdm">Déconnexion</a>
                        <!--<a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>-->
                      </div>
                    </li>
                    <!--<li class="nav-item">
                      <a class="nav-link disabled" href="#">Disabled</a>
                    </li>-->
                    
                  </ul>
                  <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                  </form>-->
                </div>
            </nav>
          </div>
        </div>
        
        
        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">demande(s) de réservation en attente</strong>
              </div>
              
              <div class="card-body">
								<!--<p><a href="?c=AdmlisteReserve" style="text-decoration: none"><h5>Voir la liste des ouvrages reservés</h5></a></p>-->
								<p ><h5 class="text-center"><?php echo $_SESSION['ouv_res'] ?> demande<?php if($_SESSION['ouv_res']>1){ echo 's'; } ?></h5></p>
								<div class="table-responsive" style="">
								<table class="table table-bordered table-striped table-sm">
          <thead class="text-center" style="/*background-color: #6c757d*/">
								<tr>
									
									<th>Titre</th>
									<th>Auteur</th>
									<th>Catégorie</th>
									<th>Résumé</th>
									<th>Nombre de pages</th>
									<th>Statut</th>
									<th>Demandeur</th>
									<th>Demandé à</th>
									<th style="">ACTION</th>
								</tr>
							</thead>

							<tbody class='font-weight-normal'>
									<?php while($et=$aff->fetch()){?>
									<tr>
										
										<!---affichage de la photo---->
										
										<td><?php echo($et['titre_ouvrage'])?></td>
										<td><?php echo($et['nom_auteur'])?></td>
										<td><?php echo($et['lib_cat_ouv'])?></td>
										<td><?php echo($et['resume_ouvrage'])?></td>
										<td><span class="badge"><?php echo($et['nbre_page_ouv'])?></span></td>
										<td class="alert-warning"><?php echo($et['lib_op'])?></td>
										<td><?php echo($et['prenom_etudiant'])?> <?php echo($et['nom_etudiant'])?></td>
										<td><?php echo($et['heure_demande_op'])?> <?php if($et['date_demande_op']!=''){ echo 'le '.$et['date_demande_op'] ;}?></td>
										
										
										
										
			
										<!---MODIFICATION---->
										<td style="text-align:center;">
											<a class="a_lien" style="text-decoration: none;" href="?c=modifOuvRes&code=<?php echo($et['id_op'])?>">
												<button  class="btn btn-primary btn-sm btn-block" type="submit" style="">MODIFIER</button>
											</a>						
										<!---SUPPRESSION--
											<a class="a_lien" onclick="return confirm('Confirmer la suppression ?');" style="text-decoration: none;" href="?c=supprOuv&code=<?php echo($et['id_ouvrage'])?>">
												SUPPRIMER
											</a>-->
										</td>
									</tr>	
									<?php }?>
							</tbody>
        </table> </div>
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
              </div>
              
              
            </div>
            
            
            
            
          </div>
          
        </div>
        
        <!-- FOOTER -->
        <?php //include ('footer.php'); ?>
        <!-- FIN FOOTER -->
        
    </div>
   
   
   
   
   
   
   
   
   
   
   <script src="js/jquery.js"></script>
    <!-- <script src="popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
  </body>
</html>