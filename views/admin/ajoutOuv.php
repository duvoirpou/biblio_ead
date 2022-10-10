<?php
if(isset($_POST['enregistrer'])){
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
                    <li class="nav-item active dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_documents.php'); ?>
                      
                    </li>
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_etudiants.php'); ?>
                      
                      
                    </li>
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
              <strong class="">entrez les informations de l'ouvrage</strong>
              </div>
              
              <div class="card-body">
								<div id="container" style="" align="center">
									
					<?php if(isset($_COOKIE[$cnom])){ if($_SESSION['info'] == 'Cet ouvrage existe déjà'){ echo '<div class="alert alert-warning" role="alert">'.$_COOKIE[$cnom].'
					<button type="button" class="close" data-dismiss="alert" arialabel="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					'; } }
					
					?>

									
								<form method="post" enctype="multipart/form-data" action=""> 
									
													<div class="form-group">
														<label for="titre_ouvrage"></label>
														<input id="titre_ouvrage" name="titre_ouvrage" type="text" value="" style="  height:26px" placeholder="Titre" class="form-control"/>
                              
													</div>
													
													
													
													<div class="form-group">
														<label for="resume_ouvrage"></label>
														<textarea id="resume_ouvrage" name="resume_ouvrage" cols="40" rows="4" placeholder="Résumé" class="form-control"></textarea>
													</div>
													
													<div class="form-group">
														<label for="nbre_page_ouv"></label>
														<input id="nbre_page_ouv" name="nbre_page_ouv" type="number" value="" style="  height:26px" placeholder="Nombre de pages" class="form-control"/>
                              
													</div>
													<div class="form-group" hidden>
														<label for="id_cat_ouv"></label>
														<input id="id_cat_ouv" name="id_cat_ouv" type="number" value="<?php echo ($_SESSION['id_cat_ouv']) ?>" style="  height:26px" placeholder="" class="form-control"/>
                              
													</div>
													<div class="form-group" hidden>
														<label for="id_auteur"></label>
														<input id="id_auteur" name="id_auteur" type="number" value="<?php echo ($_SESSION['id_auteur']) ?>" style="  height:26px" placeholder="" class="form-control"/>
                              
													</div>
                          
													<div class="form-group" hidden>
														<label for="id_comp"></label>
														<input id="id_comp" name="id_comp" type="number" value="<?php echo ($_SESSION['id_comp']) ?>" style="  height:26px" placeholder="" class="form-control"/>
                              
													</div>
													
													<!--<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="text" name="operation" value ="libre" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_etudiant" value ="0" class="form-control"/>
					</div>-->
									<button type="submit" class="btn btn-default" name="enregistrer">Enregistrer</button>
								</form>
								
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
              </div>
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