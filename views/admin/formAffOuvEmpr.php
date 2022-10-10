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
                        <b>Operations</b>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Consultation</a>
                        <a class="dropdown-item" href="#">Réservation</a>
												<!--<a class="dropdown-item" href="#">Emprunt</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>-->
                      </div>
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
<!-- ####################################################################################################### -->

    <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">validez la demande</strong>
              </div>
              
              <div class="card-body">
								<div id="container" style="" >
								<form method="POST" action="" enctype="multipart/form-data">
					
					<div class="form-group" hidden>
						<input type="number" name="id_op" value ="<?php echo($op['id_op'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<!--<label class="control-label">Titre de l'ouvrage : </label>-->
						
						<select class="form-control" id="lib_op" name="lib_op" style="">
																
																
																
																<option value="<?php echo($op['lib_op'])?>"></option>
																<option value="emprunté">Oui</option>
																<!--<option value="<?php echo($op['lib_op'])?>">Non</option>-->
						</select>
					</div>					
					
					<div class="form-group" hidden>
						<label class="control-label" >N° du lecteur : </label>
						<input type="number" name="id_etudiant" value ="<?php echo($op['id_etudiant'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">N° de l'ouvrage : </label>
						<input type="number" name="id_exp" value ="<?php echo($op['id_exp'])?>" class="form-control"/>
					</div>
					

					<div class="form-group" hidden>
						<label class="control-label">N° de l'operation : </label>
						<input type="text" name="operation" value ="<?php echo($op['operation'])?>" class="form-control"/>
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
						<input type="text" name="date_demande_op" value ="<?php echo($op['date_demande_op'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">heure_demande_op : </label>
						<input type="text" name="heure_demande_op" value ="<?php echo($op['heure_demande_op'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">date_debut_op : </label>
						<input type="text" name="date_debut_op" value ="<?php echo($date_jour); ?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">heure_debut_op : </label>
						<input type="text" name="heure_debut_op" value ="<?php echo($heure); ?>" class="form-control"/>
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
						<input type="text" name="jour_op" value ="<?php echo($op['jour_op']) ?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">mois_op : </label>
						<input type="text" name="mois_op" value ="<?php echo($op['mois_op']) ?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">annee_op : </label>
						<input type="text" name="annee_op" value ="<?php echo($op['annee_op']) ?>" class="form-control"/>
					</div>
					
										
					
					<div align="center">
						<button type="submit" class="btn btn-default" onclick="return confirm('Confirmer la modification ?');" name="modifOuvEmpr">OK</button>
					</div>
				</form>	
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
              </div>
						</div>
              
              
            </div>
            
            
            
            <!--<div id="container table-responsive" style="">
        
		<h1>&nbsp;</h1>
        <h2>&nbsp;</h2>
        <h3>&nbsp;</h3>
        <h4>&nbsp;</h4>
        <h5>&nbsp;</h5>
        <h6>&nbsp;</h6></div>
         ####################################################################################################### -->
    
            
            
            
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