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
              <strong class="">mes reservations</strong>
              </div>
              
              <div class="card-body">
								
								<div class="table-responsive" style="">
								<table class="table table-bordered table-striped table-sm" id="mydatatable">
          <thead class="text-center" style="/*background-color: #6c757d*/">
								<tr>
									
									<th scope="col">Titre</th>
									<th scope="col">Auteur</th>
									<th scope="col">Catégorie</th>
									<th scope="col">Description</th>
									<th scope="col">Pages</th>
									
									<th style="" scope="col">Statut</th>
									<!--<th style="">OPERATIONS</th>-->
								</tr>
							</thead>

							<tbody class='font-weight-normal'>
									<?php while($et=$affMesOuvReserve->fetch()){?>
									<tr>
										
										<!---affichage de la photo---->
										
										<td><?php echo($et['titre_ouvrage'])?></td>
										<td><?php echo $et['prenom_auteur'].' '.$et['nom_auteur']; ?></td>
										<td><?php echo($et['lib_cat_ouv'])?></td>
										<td><?php echo($et['resume_ouvrage'])?></td>
										<td><span class="badge"><?php echo($et['nbre_page_ouv'])?></span></td>
										<td <?php if($et['lib_op']=="demande d'emprunt"){ echo 'class="bg-warning"'; }else{ echo 'class="bg-success"'; } ?>><?php echo($et['lib_op'])?></td>
										
										
										
			<!--<td style="text-align:center;">
										-MODIFICATION--
										
											<a style="text-decoration: none;" href="?c=LectModifOuv&code=<?php echo($et['id_ouvrage'])?>">
												EMPRUNT/RESERVATION
											</a>						-->
										<!---SUPPRESSION--<?php if($et['lib_op']=="demande d'emprunt"){echo '
											<a class="a_lien" onclick="return confirm(\'la demande sera annulée. Confirmer ?\');" style="text-decoration: none;" href="?c=supprMesOuvEmprunte&code='.$et['id_op'].'">
												<button  class="btn btn-danger btn-block" type="submit" style="">ANNULER</button>
											</a>'; } ?>
										</td>-->
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
        
        <!-- FIN FOOTER -->
        
    </div>
   
   
   
   
   
   
   
   
   
   
   <script src="js/jquery.js"></script>
    <!-- <script src="popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="assets/js/dataTables.bootstrap4.min.js"></script>
   <!--<script src="assets/js/mes_ouv_emprunte.js"></script>-->
    
		
		<script>
			$('#mydatatable').DataTable()
		</script>
  </body>
</html>