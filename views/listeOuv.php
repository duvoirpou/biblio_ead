<?php
	if(!$_SESSION['id_etudiant']){
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
     <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
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
                      
                      <a class="nav-link" href="?c=espEtud"><b>Accueil <span class="sr-only">(current)</span></b></a>
                      
                      
                    </li>
                    <li class="nav-item dropdown active">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_documents.php'); ?>
                      
                      
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b><?php echo ($_SESSION['nom_etudiant']); ?></b>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?c=dcnxE">Déconnexion</a>
                        
                      </div>
                    </li>
                    
                    
                  </ul>
								
								</div>
            </nav>
          </div>
        </div>
        
        
        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">liste des ouvrages</strong>
              </div>
              
              <div class="card-body">
								<p><a href="?c=listeMesOuvEmprunte" style="text-decoration: none">
								<!--<h5>Voir la liste de mes emprunts d'ouvrages</h5>-->
								</a></p>
									<div class="table-responsive" style="">
											<table class="table table-bordered table-striped table-sm" id="tabOuvr">
												<thead class="text-center" style="/*background-color: #6c757d*/">
															<tr>
																<!--<th>CODE</th>-->
																<th scope="col">Titre</th>
																<th scope="col">Auteur</th>
																<th scope="col">Catégorie</th>
																<th scope="col">Description</th>
																<th style="" scope="col">Pages</th>
																<!--<th style="">Statut</th>-->
																<th style="" scope="col">Voir les exemplaires</th>
															</tr>
												</thead>
			
										
										</table>
									
								</div>
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
   <script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="assets/js/dataTables.bootstrap4.min.js"></script>
   <script src="assets/js/ouvrage.js"></script>
  </body>
</html>