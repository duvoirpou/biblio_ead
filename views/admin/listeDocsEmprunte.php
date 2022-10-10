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
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item active dropdown">
                      
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





       <div class="modal fade" id="supprModal">
           <div class="modal-dialog modal-dialog-scrollable">
               <div class="modal-content">

                   <!-- Modal Header -->
                   <div class="modal-header">
                       <h4 class="modal-title">Voulez-vous annuler l'opération ?</h4>
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                   </div>

                   <!-- Modal body -->
                   <form method="post" action="" id="confirm">
                       <div class="modal-body">
                           <input type="hidden" name="id_conf" id="id_conf"><!-- id_op -->

                           <input type="hidden" name="lib_op_doc" id="lib_op_doc">
                           <input type="hidden" name="id_etudiant" id="id_etudiant">
                           <input type="hidden" name="id_doc" id="id_doc">
                           <input type="hidden" name="date_demande_op" id="date_demande_op">
                           <input type="hidden" name="heure_demande_op" id="heure_demande_op">
                           <input type="hidden" name="date_debut_op" id="date_debut_op">
                           <input type="hidden" name="heure_debut_op" id="heure_debut_op">
                           <input type="hidden" name="date_debut_op" id="date_debut_op">
                           <input type="hidden" name="date_fin_op" id="date_fin_op">
                           <input type="hidden" name="heure_fin_op" id="heure_fin_op">
                           <input type="hidden" name="jour_op" id="jour_op">
                           <input type="hidden" name="mois_op" id="mois_op">
                           <input type="hidden" name="annee_op" id="annee_op">

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
              <strong class="">Demandes, emprunts, reservations et consultations</strong>
              </div>
              
              <div class="card-body">
								<div class="alert text-center font-weight-bold" role="alert">
									<h4 >
										Vous avez <a href="?c=AdmlisteDocsEmpr" style="text-decoration: none"><?php echo $_SESSION['docs_empr'].' demande(s) d\'emprunt'; ?></a>
										& 
										<a href="?c=AdmlisteDocsRes" style="text-decoration: none"><?php echo $_SESSION['docs_res'].' demande(s) de réservation'; ?></a>
										<?php if($_SESSION['docs_empr']>0 OR $_SESSION['docs_res']>0){ echo 'en attente...';}  ?>
									</h4>
								</div>
								<!--<p><a href="#" style="text-decoration: none">Voir la liste des ouvrages empruntés</a></p>-->
								<div class="table-responsive" style="">
								<table id="tabDocs" class="table table-bordered table-striped table-sm">
          <thead class="text-center" style="/*background-color: #6c757d*/">
								<tr>
									
									<th scope="col">Type de document</th>
									<th scope="col">Thème</th>
									<th scope="col">Auteur</th>
									<th scope="col">DM</th>
									<th scope="col">Option</th>
									<th scope="col">Niveau</th>
									
									
									<th scope="col">Statut</th>
									<th scope="col">Demandeur</th>
									<th style="" scope="col">ACTION</th>
								</tr>
							</thead>

							<!--<tbody class='font-weight-normal'>
									<?php while($et=$aff->fetch()){?>
									<tr>
										<td ><?php echo($et['id_doc'])?></td>
										-affichage de la photo--
										
										<td><?php echo($et['theme_doc'])?></td>
										<td><?php echo($et['option_doc'])?></td>
										<td><?php echo($et['niveau_doc'])?></td>
										<td><?php echo($et['nom_auteur'])?></td>
										<td><?php echo($et['nom_dm'])?></td>
										<td ><?php echo($et['lib_op_doc'])?></td>
										<td><?php echo($et['prenom_etudiant'])?> <?php echo($et['nom_etudiant'])?></td>
										
									
										
										
			<td style="text-align:center;">-->
										<!---MODIFICATION--
										
											<a class="a_lien" style="text-decoration: none;" href="?c=modifOuvEmpr&code=<?php echo($et['id_op'])?>">
												MODIFIER
											</a>						-->
										<!---SUPPRESSION--
											<a onclick="return confirm('Confirmer la suppression ?');" style="text-decoration: none;" href="?c=supprDocsEmprunte&code=<?php echo($et['id_op_doc'])?>">
												<button  class="btn btn-danger btn-block" type="submit" style="">SUPPRIMER</button>
											</a>
										</td>
									</tr>	
									<?php }?>
							</tbody>-->
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
		<script src="assets/js/jquery.dataTables.min.js"></script>
   <script src="assets/js/dataTables.bootstrap4.min.js"></script>
   <script src="assets/js/docs_emprunte.js"></script>
  </body>
</html>