<?php

include('connexionBdd/connexionBdd.php');
include('models/classe_ouvrages.php');

$listeOuvEmpr = new Ouvrages(NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	
	$aff = $listeOuvEmpr->afficheOuvEmpr();
?>
    
    <?php while($et=$aff->fetch()){?>
									<tr>
										<td ><?php echo($et['id_ouvrage'])?></td>
										<!---affichage de la photo---->
										
										<td><?php echo($et['titre_ouvrage'])?></td>
										<td><?php echo($et['nom_auteur'])?></td>
										<td><?php echo($et['lib_cat_ouv'])?></td>
										<td><?php echo($et['resume_ouvrage'])?></td>
										<td><span class="badge"><?php echo($et['nbre_page_ouv'])?></span></td>
										<td class="alert-warning"><?php echo($et['lib_op'])?></td>
										<td><?php echo($et['prenom_etudiant'])?> <?php echo($et['nom_etudiant'])?></td>
										
										
										
										
			
										<!---MODIFICATION---->
										<td style="text-align:center;">
											<a style="text-decoration: none; " href="?c=modifOuvEmpr&code=<?php echo($et['id_op'])?>">
												<button  class="btn btn-primary btn-block" type="submit" style="">MODIFIER</button>
											</a>						
										<!---SUPPRESSION---->
											<button style="margin-top: 10px" class="btn btn-danger btn-block suppr" id="<?php echo($et['id_op'])?>" type="submit" style="">SUPPRIMER</button>
										</td>
									</tr>	
									<?php }?>


<!--<a class="a_lien" onclick="return confirm('Confirmer la suppression ?');" style="text-decoration: none;" href="?c=supprOuvEmprunte&code=<?php echo($et['id_op'])?>">
												<button  class="btn btn-danger btn-block" type="submit" style="">SUPPRIMER</button>
											</a>-->


