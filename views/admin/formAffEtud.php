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
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_documents.php'); ?>
                      
                    </li>
                    
                    <li class="nav-item dropdown active">
                      
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

    <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">modifier l'étudiant</strong>
              </div>
              
              <div class="card-body">
								
								<form method="POST" action="" enctype="multipart/form-data">
					
					<div class="form-group" hidden>
						<input type="number" name="id_etudiant" value ="<?php echo($etud['id_etudiant'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Matricule : </label>
						<input type="text" name="matricule" value ="<?php echo($etud['matricule'])?>" class="form-control"/>
					</div>					
					
					<div class="form-group" >
						<label class="control-label" >Nom : </label>
						<input type="text" name="nom_etudiant" value ="<?php echo($etud['nom_etudiant'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Prenom : </label>
						<input type="text" name="prenom_etudiant" value ="<?php echo($etud['prenom_etudiant'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
                        <label class="control-label">Sexe : </label>
						<select class="form-control" id="sexe" name="sexe" style="">
																
																
																
									<option value="<?php echo($etud['sexe'])?>"></option>
									<option value="M">M</option>
									<option value="F">F</option>
						</select>
					</div>
					
					
					<div class="form-group" >
						<label class="control-label">Adresse : </label>
						<input type="text" name="adresse_lecteur" value ="<?php echo($etud['adresse_lecteur'])?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" >
						<label class="control-label">Tel : </label>
						<input type="text" name="tel_lecteur" value ="<?php echo($etud['tel_lecteur'])?>" class="form-control"/>
					</div>
                    
					<div class="form-group" >
						<label class="control-label">Option : </label>
						<input type="text" name="option_etud" value ="<?php echo($etud['option_etud'])?>" class="form-control"/>
					</div>
                    
					<div class="form-group" >
						<label class="control-label">Annee : </label>
						<input type="text" name="annee" value ="<?php echo($etud['annee'])?>" class="form-control"/>
					</div>
					
					<!--<div class="form-group" >
						<label class="control-label">pseudo : </label>
						<input type="text" name="operation" value ="<?php echo($etud['operation'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_etudiant" value ="<?php echo($etud['id_etudiant'])?>" class="form-control"/>
					</div>-->
					
										<!--<div class="form-group" >
						<select class="" id="lib_cat_ouv" name="lib_cat_ouv" style="">
																
																
																
																<option value="<?php echo($etud['operation'])?>"></option>
																<option value="emprunté">Emprunter</option>
																<option value="reservé">Reserver</option>
															</select>
					</div>-->
					

					
					
					<div align="center">
						<button type="submit" onclick="return confirm('Confirmer la modification ?');" name="modifEtud">OK</button>
					</div>
				</form>	
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
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