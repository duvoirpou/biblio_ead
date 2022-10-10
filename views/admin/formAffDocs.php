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
                    <li class="nav-item  dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item active dropdown">
                      
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
                  
                </div>
            </nav>
          </div>
        </div>
<!-- ####################################################################################################### -->

    <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">modifier le document</strong>
              </div>
              
              <div class="card-body">
								<div id="container" style="" >
								<form method="POST" action="" enctype="multipart/form-data">
					
					<div class="form-group" hidden>
						<input type="number" name="id_doc" value ="<?php echo($docs['id_doc'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Thème du document : </label>
						<input type="text" name="theme_doc" value ="<?php echo($docs['theme_doc'])?>" class="form-control"/>
					</div>					
					
					<div class="form-group">
						<label class="control-label" >Option : </label>
						<input type="text" name="option_doc" value ="<?php echo($docs['option_doc'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Niveau : </label>
						<select name="niveau_doc" style="" class="form-control">
                                                                        
																
																
																<option value="<?php echo($docs['niveau_doc'])?>"></option>
																<option value="Licence">Licence</option>
                                <option value="BTS">BTS</option>
                                </select> 
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_auteur" value ="<?php echo($docs['id_auteur'])?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_dm" value ="<?php echo($docs['id_dm'])?>" class="form-control"/>
					</div>
					
          <div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_d_rapp_stage" value ="<?php echo($docs['id_d_rapp_stage'])?>" class="form-control"/>
					</div>
          
					<div class="form-group" hidden>
						<label class="control-label">N° Type document : </label>
						<input type="number" name="id_type_doc" value ="<?php echo($docs['id_type_doc'])?>" class="form-control"/>
					</div>
					
					
					
					
					
					
					<div align="center">
						<button type="submit" class="btn btn-default" onclick="return confirm('Confirmer la modification ?');" name="modifDocs">OK</button>
					</div>
				</form>	
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
              </div>
								
								
								<div id="container" style="" align="center" hidden>
							
								
							<form method="POST" action="" enctype="multipart/form-data">
					
					
					
					<div class="form-group" >
						<label class="control-label">Type d'opération : </label>
						
						<select name="lib_op_doc" style="" class="form-control">
																
																
																
																<option value=""></option>
																<option value="demande d'emprunt">Emprunt</option>
																<option value="demande de reservation">Reservation</option>
						</select>
					</div>					
					
					
					<div class="form-group" hidden>
						<label class="control-label">N° de l'etudiant : </label>
						<input type="number" name="id_etudiant" value ="<?php echo($_SESSION['id_etudiant'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">N° du document : </label>
						<input type="number" name="id_doc" value ="<?php echo($docs['id_doc'])?>" class="form-control"/>
					</div>
					
					
					
					
										<!--<div class="form-group" >
						<select class="" id="lib_cat_ouv" name="lib_cat_ouv" style="">
																
																
																
																<option value="<?php echo($ouv['operation'])?>"></option>
																<option value="emprunté">Emprunter</option>
																<option value="reservé">Reserver</option>
															</select>
					</div>-->
					

					
					
					<div class="form-group">
						<button type="submit" class="btn btn-default" onclick="return confirm('Confirmer l enregistrement ?');" name="enregistrer">OK</button>
					</div>
				</form>
							
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
    <script src="js/all.js"></script>

</body>
</html>