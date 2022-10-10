


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
                    <li class="nav-item dropdown active">
                      
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
        
        
        <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">effectuez une opération</strong>
              </div>
              
              <div class="card-body">
								<!--<a href="?c=AjoutAutOuv" style="text-decoration: none"><h5>Ajoutez un nouvel auteur</h5></a>-->
                 <div id="container" style="" align="center">
	  
		
		
									
									
									
				<form method="POST" style="" action=""> 
						<h4></h4>
							<?php $_SESSION['rec'] ?>
														
                             <div class="form-group" >
                                <label class="control-label">Choisissez le type d'opération pour M./Mme <b><?php echo $_SESSION['prenom_etudiant'].' '.$_SESSION['nom_etudiant'] ?></b> : </label>
                                <select name="lib_op" style="" class="form-control">
                                                                        
																
																
																<option value=""></option>
																<option value="emprunt&eacute;">Emprunt</option>
                                <option value="reserv&eacute;">Reservation</option>
                                <option value="consult&eacute;">Consultation</option>
                                </select>
                             </div>                           
                                                     
                                                        
								<div class="form-group" hidden>
									<label for="id_etudiant"></label>
									<input id="id_etudiant" name="id_etudiant" type="number" value="<?php echo $_SESSION['id_etudiant'] ?>" style="  height:26px" placeholder="" class="form-control"/>
                              
								</div>
													
													
													
								<div class="form-group" hidden>
									<label for="id_exp"></label>
									<input id="id_exp" name="id_exp" type="number" value="<?php echo $_SESSION['rec'] ?>" style="  height:26px" placeholder="Matricule du lecteur" class="form-control"/>
                              
								</div>
													
								
								<div class="form-group" hidden>
									<label for="operation"></label>
									<input id="operation" name="operation" type="text" value="1" style="  height:26px" placeholder="Matricule du lecteur" class="form-control"/>
                              
								</div>

<?PHP	//Pour avoir le mois et la date du jour, en francais
	$tab_mois = array('','janvier','février','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre');
	$date_jour = date("d").' '.$tab_mois[date("n")].' '.date("Y");
	//echo"Brazzaville, le ".$date_jour;
	 
	$d = date('j M Y').' '.date('H').'h '.date('i').'m '.date('s').'s ';
	$jour = date("d");
	$mois = $tab_mois[date("n")];
	$annee = date("Y");
	$heure = date('H').'h '.date('i').'m '.date('s').'s';
?>					
 

					<div class="form-group" hidden>
						<label class="control-label">date_demande_op : </label>
						<input type="text" name="date_demande_op" value ="<?php echo($date_jour)?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">heure_demande_op : </label>
						<input type="text" name="heure_demande_op" value ="<?php echo($heure)?>" class="form-control"/>
					</div>
	
	
					
					<div class="form-group" hidden>
						<label class="control-label">date_debut_op : </label>
						<input type="text" name="date_debut_op" value ="<?php echo($date_jour)?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">heure_debut_op : </label>
						<input type="text" name="heure_debut_op" value ="<?php echo($heure)?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">date_fin_op : </label>
						<input type="text" name="date_fin_op" value ="" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">heure_fin_op : </label>
						<input type="text" name="heure_fin_op" value ="" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">jour_op : </label>
						<input type="text" name="jour_op" value ="<?php echo($jour); ?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">mois_op : </label>
						<input type="text" name="mois_op" value ="<?php echo($mois); ?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">annee_op : </label>
						<input type="text" name="annee_op" value ="<?php echo($annee); ?>" class="form-control"/>
					</div>            										
													
									<button type="submit" class="btn btn-default" name="valider">Valider</button>
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
   
   
   
   
   
   
   
   
   
   
   <script src="js/jquery.js"></script>
    <!-- <script src="popper.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/all.js"></script>
  </body>
</html>