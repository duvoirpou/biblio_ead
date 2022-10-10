<?php
	if(!$_SESSION['id_admin']){
		header('location:?c=admin');
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
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
   

    
    
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
<!-- ####################################################################################################### -->







		
		<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter un nouvel exemplaire</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
				
				<?php $_SESSION['exemplaire']=$ouv['id_ouvrage']; $listeExemplaires = new Exemplaires(NULL,NULL,NULL,NULL,NULL,NULL);
	
				$affExp = $listeExemplaires->afficheExemplaires();
	
	
						 $exp=$affExp->fetch();
				$_SESSION['code'] = $exp['id_ouvrage']; ?>
        <!-- Modal body -->
				<form method="post" enctype="multipart/form-data" action="" id="exemplairesform"> 
        <div class="modal-body">
          
									
<div class="form-group" >
						<label class="control-label">Etat de l'exemplaire : </label>
						<input type="text" id="etat_exp" name="etat_exp" value ="<?php echo $exp['etat_exp'] ?>" class="form-control"/>
					</div>					
					
					<div class="form-group" >
						<label class="control-label" >Date de l'achat : </label>
						<input type="date" id="date_achat" name="date_achat" value ="<?php echo $exp['date_achat'] ?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Année de publication : </label>
						<input type="text" id="annee_pub" name="annee_pub" value ="<?php echo $exp['annee_pub'] ?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Prix d'achat : </label>
						<input type="number" id="prix_achat" name="prix_achat" value ="<?php echo $exp['prix_achat'] ?>" class="form-control"/>
					</div>
					
                    
                    <div class="form-group" hidden>
						<input type="number" id="id_ouvrage" name="id_ouvrage" value ="<?php echo($ouv['id_ouvrage'])?>" class="form-control"/>
					</div>
					
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
					<button type="submit" class="btn btn-success btn-sm" name="ajoutE">Ajouter</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Fermer</button>
        </div>
        </form>
      </div>
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
              <strong class="">Listes des exemplaires</strong>
              </div>
              
              <div class="card-body">
								<!-- Button to Open the Modal -->
								<div class="form-group" align="center">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Nouvel exemplaire
  </button>
					</div>
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
                
                
								
						
						<div class="table-responsive" style="">
							<table id="mydatatable" class="table table-bordered table-striped table-sm">
								<thead class="text-center" >
									<tr>
										<!--<th>CODE</th>-->
										
										
										<th>Titre </th>
										<th>Date d'achat</th>
										<th>Année de publication</th>
										<!-- <th>Prix</th> -->
										
										<th>ACTION</th>
										
									
									
									</tr>
								</thead>
								<!--<tbody class="font-weight-normal">
									<?php while($exp=$affExp->fetch()){?>
									</tr>
									
									<td ><?php echo $exp['titre_ouvrage'] ?></td>
									<td ><?php echo $exp['date_achat'] ?></td>
									<td ><?php echo $exp['annee_pub'] ?></td>
									<td ><?php echo $exp['prix_achat'] ?></td>
									
									<td ><?php echo '<button  class="btn btn-danger btn-block btn-sm suppr" id="'.$exp['id_exp'].'" type="submit" style=""><i class="fa fa-remove"></i> SUPPRIMER</button>
															      '; ?></td>
									</tr>
									<?php }?>
								</tbody> -->
							</table>
						</div>
				
                
                
              </div>
              
              
            </div>
            
            
            
        
            
            
          </div>
          
        </div>
		 <!-- FOOTER -->
        <?php //include ('footer.php'); ?>
        <!-- FIN FOOTER -->
		</div>

<!-- ####################################################################################################### -->



<script src="js/jquery.js"></script>
    <!-- <script src="popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="assets/js/dataTables.bootstrap4.min.js"></script>
   <script src="js/examplaires.js"></script><script>
			
		</script> 
</body>
</html>