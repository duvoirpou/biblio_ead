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
		 <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
		 <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
   <link rel="stylesheet" href="css/style.css"/>
    

    

    <title>Bibliothèque</title>
  </head>
  <body>
   
   <div class="container">
    
<?php include('header.php'); ?> 
        
        
        <div class="row" id="img">
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
										<!--<<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <b>Operations</b>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Consultation</a>
                        <a class="dropdown-item" href="#">Réservation</a>
												a class="dropdown-item" href="#">Emprunt</a>
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
        
				
				<div class="modal fade" id="supprModal">
           <div class="modal-dialog modal-dialog-scrollable">
               <div class="modal-content">

                   <!-- Modal Header -->
                   <div class="modal-header">
                       <h4 class="modal-title">Voulez vous supprimer ?</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>

                   <!-- Modal body -->
                   <form method="post" enctype="multipart/form-data" action="" id="confirm">
                       <div class="modal-body">
                                <input type="hidden" name="id_conf" id="id_conf">

                       </div>

                       <!-- Modal footer -->
                       <div class="modal-footer">
                           <div id="msg" class="text-success"></div>
                           <button type="submit" class="btn btn-success" name="">Confirmer</button>
                           <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
				
        
        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">liste des documents</strong>
              </div>
              
              <div class="card-body">
								<div class="table-responsive" style="">
									<table id="tabDocs" class="table table-bordered table-striped table-sm">
          <thead class="text-center" style="/*background-color: #6c757d*/">
								<tr>
<!--									<th>CODE</th>-->
									<th>Document</th>
									<th>Auteur</th>
									<th>D.M </th>
									<th>D.S</th>
									<th>Thème </th>
									<th>Option</th>
									<th>Niveau</th>
									<th style="" scope="col">Statut</th>
									<th id="action">ACTION</th>
								</tr>
							</thead>

        </table>
									<div class="form-group">		
											<button id="imprimer" class="btn btn-dark my-2 my-sm-0" type="submit" onclick="imprimer_page()"><i class="fa fa-print"></i> Imprimer</button>
				 
											<script type="text/javascript">
												function imprimer_page(){
												window.print();
												 }
											</script>										
											
									</div>							
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
    
		<script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="assets/js/dataTables.bootstrap4.min.js"></script>
   <script src="assets/js/documents.js"></script>
	 
	 <script type="text/javascript">
										$(document).on('click', '#imprimer', function(e){
        e.preventDefault();
				
				 });
	</script>	 
  </body>
</html>