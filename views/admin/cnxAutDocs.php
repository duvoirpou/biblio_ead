<?php
if(isset($_POST['enregistre']) AND !empty($_POST['nom_auteur']) AND !empty($_POST['prenom_auteur'])){
$cnom = 'info';

$cvaleur = $_SESSION['info'];
} else{
    $cnom = 'info';

$cvaleur = '';
  }
setcookie($cnom, $cvaleur, time() + 3600);



?>




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

    <!-- Bootstrap CSS -->
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
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item dropdown active">
                      
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
              <strong class="">Entrez les nom et prénom de l'auteur</strong>
              </div>
              
              <div class="card-body">
                 <div class="container" style="" align="center">
									
									
									
											<?php if(isset($_COOKIE[$cnom])){ if($_SESSION['info'] == 'Cet auteur existe déjà'){ echo '<div class="alert alert-danger" role="alert">'.$_COOKIE[$cnom].'
					<button type="button" class="close" data-dismiss="alert" arialabel="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					'; } else{ echo '<div class="alert alert-success" role="alert">'.$_COOKIE[$cnom].'
					<button type="button" class="close" data-dismiss="alert" arialabel="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					'; } }
					
					?>
		 <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Nouvel auteur
  </button>
		
		<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Créer un nouvel auteur</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
				<form method="post" enctype="multipart/form-data" action=""> 
        <div class="modal-body">
          
									
													<div class="form-group">
														<label for="nom_auteur"></label>
														<input id="nom_auteur" name="nom_auteur" type="text" value="" style="  height:26px" placeholder="Nom de l'auteur" class="form-control"/>
                              
													</div>
													
													
													
													<div class="form-group">
														<label for="prenom_auteur"></label>
														<input id="prenom_auteur" name="prenom_auteur" type="text" value="" style="  height:26px" placeholder="Prénom de l'auteur" class="form-control"/>
                              
													</div>
													
													
													
													
									
					
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
					<button type="submit" class="btn btn-success btn-sm" name="enregistre">Enregistrer</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
        </div>
        </form>
      </div>
    </div>
  </div>								
									

									
									
									
								<form method="POST" style="" action=""> 
									<h4></h4>
													<div class="form-group">
														<label for="nom_auteur"></label>
														<input id="nom_auteur" name="nom_auteur" type="text" value="" style="  height:26px" placeholder="Nom de l'auteur" class="form-control"/>
                              
													</div>
													
													
													
													<div class="form-group">
														<label for="prenom_auteur"></label>
														<input id="prenom_auteur" name="prenom_auteur" type="text" value="" style="  height:26px" placeholder="Prénom de l'auteur" class="form-control"/>
                              
													</div>
													
									<button type="submit" class="btn btn-default" name="valider">Valider</button>
								
                </form>
							
							</div>
							</div>
              
              
            </div>
            
            
            
           <!-- <div id="container" style="" align="center">
							
								
		<h1>&nbsp;</h1>
        <h2>&nbsp;</h2>
        <h3>&nbsp;</h3>
        <h4>&nbsp;</h4>
        <h5>&nbsp;</h5>
        <h6>&nbsp;</h6></div>
         ####################################################################################################### -->
    
            
            
            
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