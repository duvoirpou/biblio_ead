<?php 
	class exemplaires
	{
		private $id_exp;
		private $etat_exp;
		private $date_achat;
		
		private $annee_pub;
		private $prix_achat;
		private $id_ouvrage;
		
		

		public function __construct($id_exp,$etat_exp,$date_achat,$annee_pub,$prix_achat,$id_ouvrage)
					{
						$this->id_exp 		= $id_exp;
						$this->etat_exp 		= $etat_exp;
						$this->date_achat 		= $date_achat;
						
						$this->annee_pub 		= $annee_pub;
						$this->prix_achat 		= $prix_achat;
						$this->id_ouvrage 		= $id_ouvrage;
						

						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_exp()
		{
			return $this->id_exp;
		}
		
		public function getEtat_exp()
		{
			return $this->etat_exp;
		}
		
		public function getDate_achat()
		{
			return $this->date_achat;
		}
		
		
		
		
		public function getAnnee_pub()
		{
			return $this->annee_pub;
		}
		
		public function getPrix_achat()
		{
			return $this->prix_achat;
		}
		
		public function getId_ouvrage()
		{
			return $this->id_ouvrage;
		}

		

		
		
		
		/*LISTE DES SETTERS*/
		
		public function setId_exp($id_exp)
		{
			$this->id_exp = $id_exp;
		}
		
		public function setTheme_do($etat_exp)
		{
			$this->etat_exp = $etat_exp;
		}
		
		public function setDate_achat($date_achat)
		{
			$this->date_achat = $date_achat;
		}
		
		
		public function setAnnee_pub($annee_pub)
		{
			$this->annee_pub = $annee_pub;
		}
		
		public function setId_ouvrage($id_ouvrage)
		{
			$this->id_ouvrage = $id_ouvrage;
		}
		
		
		
		
		
		
		
		
		
		/*Connexion à la base de Données*/
		/* public function connexionBdd()
		{			
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=test_mvc;charset=utf8', 'root', '');
				 return $bdd;
			}catch(Exception $e){
				die('Erreur : ' . $e->getMesspseudo());
			}
		} */

		
/*METHODE QUI PERMET D'AFFICHER LA LISTE DES */
        public function afficheExemplaires(){
            $bdd = connexionBdd();
            $var = $_SESSION['exemplaire'];
            $requete = $bdd->prepare("SELECT exemplaires.`id_exp`, exemplaires.etat_exp, exemplaires.date_achat, exemplaires.annee_pub, exemplaires.prix_achat, exemplaires.id_ouvrage, auteurs.nom_auteur, auteurs.prenom_auteur, categories.lib_cat_ouv, operations.lib_op, ouvrages.titre_ouvrage, ouvrages.resume_ouvrage, ouvrages.nbre_page_ouv, etudiant.id_etudiant, etudiant.nom_etudiant, etudiant.prenom_etudiant FROM exemplaires INNER JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur LEFT JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv LEFT JOIN operations ON exemplaires.id_exp=operations.id_exp LEFT JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant WHERE exemplaires.id_ouvrage=$var ORDER BY id_exp DESC ");
            $requete->execute();

            return $requete;
        }
		
       public function afficheExemplaire(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT exemplaires.`id_exp`, exemplaires.etat_exp, exemplaires.date_achat, exemplaires.annee_pub, exemplaires.prix_achat, exemplaires.id_ouvrage, auteurs.nom_auteur, auteurs.prenom_auteur, categories.lib_cat_ouv, operations.lib_op, ouvrages.titre_ouvrage, ouvrages.resume_ouvrage, ouvrages.nbre_page_ouv, etudiant.id_etudiant, etudiant.nom_etudiant, etudiant.prenom_etudiant FROM exemplaires INNER JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur LEFT JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv LEFT JOIN operations ON exemplaires.id_exp=operations.id_exp LEFT JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant ORDER BY id_exp DESC");
            $requete->execute();

            return $requete;
        }
		
		
		public function afficheDocumentsEmpr(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM exemplairers LEFT JOIN auteurs ON expuments.prix_achat=auteurs.prix_achat LEFT JOIN d_memoire ON expuments.id_ouv=d_memoire.id_ouv LEFT JOIN operations_exps ON expuments.id_exp=operations_exps.id_exp LEFT JOIN etudiant ON operations_exps.id_etudiant=etudiant.id_etudiant WHERE lib_op_exp="demande d\'emprunt" ORDER BY id_op_exp DESC');
            $requete->execute();

			$exps_empr = $requete -> rowCount();
			$_SESSION['exps_empr'] = $exps_empr;
			
            return $requete;
        }
		
		
		public function afficheDocumentsEmprunte(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM expuments INNER JOIN auteurs ON expuments.prix_achat=auteurs.prix_achat INNER JOIN d_memoire ON expuments.id_ouv=d_memoire.id_ouv INNER JOIN operations_exps ON expuments.id_exp=operations_exps.id_exp INNER JOIN etudiant ON operations_exps.id_etudiant=etudiant.id_etudiant WHERE lib_op_exp="emprunt&eacute;" ORDER BY id_op_exp DESC');
            $requete->execute();

            return $requete;
        }
		
		
		
		public function afficheDocsRes(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM expuments LEFT JOIN auteurs ON expuments.prix_achat=auteurs.prix_achat LEFT JOIN d_memoire ON expuments.id_ouv=d_memoire.id_ouv LEFT JOIN operations_exps ON expuments.id_exp=operations_exps.id_exp LEFT JOIN etudiant ON operations_exps.id_etudiant=etudiant.id_etudiant WHERE lib_op_exp="demande de reservation" ORDER BY id_op_exp DESC');
            $requete->execute();

			
			$exps_res = $requete -> rowCount();
			$_SESSION['exps_res'] = $exps_res;
			
            return $requete;
        }
		
		
		
		
		public function afficheDocsReserve(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM expuments INNER JOIN auteurs ON expuments.prix_achat=auteurs.prix_achat LEFT JOIN d_memoire ON expuments.id_ouv=d_memoire.id_ouv INNER JOIN operations_exps ON expuments.id_exp=operations_exps.id_exp INNER JOIN etudiant ON operations_exps.id_etudiant=etudiant.id_etudiant LEFT JOIN type_exp ON expuments.id_type_exp=type_exp.id_type_exp WHERE lib_op_exp="reserv&eacute;" ORDER BY id_op_exp DESC');
            $requete->execute();

			
			$exps_reserve = $requete -> rowCount();
			$_SESSION['exps_reserve'] = $exps_reserve;
			
            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteDocuments($etat_exp){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM expuments WHERE etat_exp=?");

				$request->execute(array($_POST['etat_exp']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutExemplaires(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			

				 $request = $bdd->prepare("INSERT INTO `exemplaires`(`id_exp`, `etat_exp`, `date_achat`, `annee_pub`, `prix_achat`, `id_ouvrage`) VALUES (:id_exp, :etat_exp, :date_achat, :annee_pub, :prix_achat, :id_ouvrage)");

				$reponse = $request->execute(array(
													'id_exp' => NULL,
													'etat_exp' => $this->etat_exp,
													'date_achat' => $this->date_achat,
													'annee_pub' =>  $this->annee_pub,
													'prix_achat' => $this->prix_achat,
													'id_ouvrage' => $this->id_ouvrage
													
												
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 
		}


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierDocs(){
			//if($this->photo==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `expuments` SET `etat_exp`=?,`date_achat`=?,`annee_pub`=?,`prix_achat`=?,`id_ouv`=?,`id_type_exp`=? WHERE `id_exp`=?");
					
							
							$etat_exp	= $this->etat_exp;
							$date_achat	= $this->date_achat;
							
							$annee_pub	= $this->annee_pub;
							$prix_achat	= $this->prix_achat;
							$id_ouv		= $this->id_ouv;
							$id_exp		= $this->id_exp;
					
					$params=array($etat_exp,$date_achat,$annee_pub,$prix_achat,$id_ouv,$id_type_exp,$id_exp);
					
					$request->execute($params);
			/*}else{
				$bdd = connexionBdd();
				//tmp_name est un dossier temporaire
				$photos=$_FILES['photo']['tmp_name'];
				
				//chemin pour recevoir les photos du site
				//impseudos nom du dossier et $nomPhoto fichier temporaire
				move_uploaded_file($photo, 'images/'.$photos);
				
				$request=$bdd->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`nbre_page_ouv`=?,`tel`=?,`pseudo`=?,`mpass`=?,`photo`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->nom_user;
							$prenom_user	= $this->prenom_user;
							$nbre_page_ouv	= $this->nbre_page_ouv;
							$tel	= $this->tel;
							$pseudo		= $this->pseudo;
							$mpass		= $this->mpass;
							$photo		= $this->photo;
							$permis		= $this->permis;
							$id_user		= $this->id_user;
							
							
					
					$params=array($nom_user,$prenom_user,$nbre_page_ouv,$tel,$pseudo,$mpass,$photo,$permis,$id_user);
					
					$request->execute($params);
				
				
			}*/
			//var_dump($request); die();
			return $request;
		}

		
		//METHODE QUI PERMET DE SUPPRIMER EMPLOYE
			public function supprimerDocs(){
				//connexion à la bdd
				
				$bdd = connexionBdd();
				$code=$_GET['code'];
				$request=$bdd->prepare("DELETE FROM expuments WHERE id_exp=? LIMIT 1");
				
				$params=array($code);
				
				$request->execute($params);
				
				return $request;
		}
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_user`=commentaires.`id_user` WHERE id_commentaire=14
		public function getIdExp($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `exemplaires` WHERE id_exp=?");
			$params=array($code);
			$request->execute($params);
			$exp=$request->fetch();

			return $exp; 
		}
//======================================================================	
	}
	
?>