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
   <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/all.css" />
    
    <style>



  
</style>
    
    
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
                    <li class="nav-item active">
                      
                      <a class="nav-link" href="?c=espEtud"><b>Accueil <span class="sr-only">(current)</span></b></a>
                      
                      
                    </li>
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
											
                    </li>
                    <li class="nav-item dropdown" >
                      
                      <?php include('menu_documents.php'); ?>
                      
                      
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b><?php echo ($_SESSION['nom_etudiant']); ?></b>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="?c=dcnxE">Déconnexion</a>
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
              <div class="card-heading card-header text-center text-white text-uppercase bgc" style="">
              <strong>BIENVENUE à LA BIBLIOTHèQUE</strong>
              </div>
              
              <div class="card-body">
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
              </div>
              
              
            </div>
            
          </div>
          
        </div>
        
        <!-- FOOTER -->
        <?php //include ('footer.php'); ?>
        <!-- FIN FOOTER -->
        
    </div> <!--Fin container-fluid-->
   
   
   
   
   
   
   
   
   
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>
    <!-- <script src="popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
  </body>
</html>