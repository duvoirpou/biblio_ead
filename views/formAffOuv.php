<?php
	if(!$_SESSION['id_etudiant']){
		header('location:?c=espEtud');
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
                      
                      <a class="nav-link" href="?c=espEtud"><b>Accueil <span class="sr-only">(current)</span></b></a>
                      
                      
                    </li>
                    <li class="nav-item dropdown active">
                      
                      <?php include('menu_ouvrages.php'); ?>
                      
                    </li>
                    <li class="nav-item dropdown">
                      
                      <?php include('menu_documents.php'); ?>
                      
                      
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
<!-- ####################################################################################################### -->

    <div class="row" style="margin-top: 10px;">
          <div class="col-xs-12 col-sm-12 col-md-12" style="">
            <div class="card card-default"><!-- content -->
              <div class="card-header text-white text-center text-uppercase bgc" style="">
              <strong class="">liste des exemplaires</strong>
              </div>
              
              <div class="card-body">
								
								<div id="container" style="" align="center" hidden>
								<form method="POST" action="" enctype="multipart/form-data">
					
					<div class="form-group" hidden>
						<input type="number" name="id_ouvrage" value ="<?php echo($ouv['id_ouvrage'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Titre de l'ouvrage : </label>
						<input type="text" name="titre_ouvrage" value ="<?php echo($ouv['titre_ouvrage'])?>" class="form-control"/>
					</div>					
					
					<div class="form-group" hidden>
						<label class="control-label" >Description de l'ouvrage : </label>
						<input type="text" name="resume_ouvrage" value ="<?php echo($ouv['resume_ouvrage'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" >
						<label class="control-label">Nombre de pages de l'ouvrage : </label>
						<input type="number" name="nbre_page_ouv" value ="<?php echo($ouv['nbre_page_ouv'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_cat_ouv" value ="<?php echo($ouv['id_cat_ouv'])?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">id_auteur : </label>
						<input type="number" name="id_auteur" value ="<?php echo($ouv['id_auteur'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">id_comp : </label>
						<input type="number" name="id_comp" value ="<?php echo($ouv['id_comp'])?>" class="form-control"/>
					</div>
					
					<!--<div class="form-group" >
						<label class="control-label">pseudo : </label>
						<input type="text" name="operation" value ="<?php echo($ouv['operation'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">pseudo : </label>
						<input type="number" name="id_etudiant" value ="<?php echo($ouv['id_etudiant'])?>" class="form-control"/>
					</div>-->
					
										<!--<div class="form-group" >
						<select class="" id="lib_cat_ouv" name="lib_cat_ouv" style="">
																
																
																
																<option value="<?php echo($ouv['operation'])?>"></option>
																<option value="emprunté">Emprunter</option>
																<option value="reservé">Reserver</option>
															</select>
					</div>-->
					

					
					
					<div>
						<button type="submit" onclick="return confirm('Confirmer la modification ?');" name="modifOuv">OK</button>
					</div>
				</form>	
                 <!--<<p><a target="_blank" href="ouvrages/cursor - CSS _ Feuilles de style en cascade _ MDN.pdf">lien</a></p>-->
              </div>
							
							
							<div id="container" style="" align="center">
							
								
							<form method="POST" action="" enctype="multipart/form-data">
					
					
					
					
						<?php $_SESSION['exemplaire']=$ouv['id_ouvrage']; $listeExemplaires = new Exemplaires(NULL,NULL,NULL,NULL,NULL,NULL);
	
	$affExp = $listeExemplaires->afficheExemplaires();
						?>
						
						<div class="table-responsive" style="">
							<table class="table table-bordered table-striped table-sm">
								<thead class="text-center " >
									<tr>
										<!--<th>CODE</th>-->
										
										
										<th>Titre </th>
										<th>Date d'achat</th>
										<th>Année de publication</th>
										<!-- <th>Prix</th> -->
										<!--<th>id_ouvrage</th>-->
										<th style="">Statut</th>
										<th>ACTION</th>
										
									
									
									</tr>
								</thead>
								
									<?php while($exp=$affExp->fetch()){?>
									<tbody class="font-weight-normal">
									<!--<td ><?php echo $exp['id_exp'] ?></td>-->
									<td ><?php echo $exp['titre_ouvrage'] ?></td>
									<td ><?php echo $exp['date_achat'] ?></td>
									<td ><?php echo $exp['annee_pub'] ?></td>
									<!-- <td ><?php echo $exp['prix_achat'] ?></td> -->
									<!--<td ><?php echo $exp['id_ouvrage'] ?></td>-->
									<td class="text-info"><b><?php echo $exp['lib_op'] ?></b></td>
									<td ><?php echo '<a class="btn btn-primary btn-block btn-sm" style="text-decoration: none;" href="?c=LectModifExp&code='.$exp['id_exp'].'">
												EMPRUNT/RESERVATION
											</a>'; ?></td>
									</tbody>
									<?php }?>
								
							</table>
						</div>
						
								
					
					
					<div class="form-group" hidden>
						<label class="control-label">N° de l'etudiant : </label>
						<input type="number" name="id_etudiant" value ="<?php echo($_SESSION['id_etudiant'])?>" class="form-control"/>
					</div>
					
					<div class="form-group" hidden>
						<label class="control-label">N° de l'ouvrage : </label>
						<input type="number" name="id_ouvrage" value ="<?php echo($ouv['id_ouvrage'])?>" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">N° de l'operation : </label>
						<input type="text" name="operation" value ="1" class="form-control"/>
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
						<input type="text" name="date_debut_op" value ="" class="form-control"/>
					</div>
					
					
					<div class="form-group" hidden>
						<label class="control-label">heure_debut_op : </label>
						<input type="text" name="heure_debut_op" value ="" class="form-control"/>
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
					
					
					
					
										<!--<div class="form-group" >
						<select class="" id="lib_cat_ouv" name="lib_cat_ouv" style="">
																
																
																
																<option value="<?php echo($ouv['operation'])?>"></option>
																<option value="emprunté">Emprunter</option>
																<option value="reservé">Reserver</option>
															</select>
					</div>-->
					

					
					
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