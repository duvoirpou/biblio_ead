<?php 
	class ouvrages
	{
		private $id_ouvrage;
		private $titre_ouvrage;
		private $resume_ouvrage;
		private $nbre_page_ouv;
		private $id_cat_ouv;
		private $id_auteur;
		private $id_comp;
		
		

		public function __construct($id_ouvrage,$titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$id_cat_ouv,$id_auteur,$id_comp)
					{
						$this->id_ouvrage 		= $id_ouvrage;
						$this->titre_ouvrage 		= $titre_ouvrage;
						$this->resume_ouvrage 		= $resume_ouvrage;
						
						$this->nbre_page_ouv 		= $nbre_page_ouv;
						$this->id_cat_ouv 		= $id_cat_ouv;
						$this->id_auteur 		= $id_auteur;
						$this->id_comp 		= $id_comp;
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_ouvrage()
		{
			return $this->id_ouvrage;
		}
		
		public function getId_comp()
		{
			return $this->id_comp;
		}
		
		public function getTitre_ouvrage()
		{
			return $this->titre_ouvrage;
		}
		
		public function getResume_ouvrage()
		{
			return $this->resume_ouvrage;
		}
		
		
		
		
		public function getNbre_page_ouv()
		{
			return $this->nbre_page_ouv;
		}
		
		public function getId_cat()
		{
			return $this->id_cat_ouv;
		}

		public function getId_auteur()
		{
			return $this->id_auteur;
		}
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_ouvrage($id_ouvrage)
		{
			$this->id_ouvrage = $id_ouvrage;
		}
		
		public function setId_comp($id_comp)
		{
			$this->id_comp = $id_comp;
		}
		
		public function setId_cat($id_cat)
		{
			$this->id_cat = $id_cat;
		}
		
		public function setTitre_ouvrage($titre_ouvrage)
		{
			$this->titre_ouvrage = $titre_ouvrage;
		}
		
		public function setResume_ouvrage($resume_ouvrage)
		{
			$this->resume_ouvrage = $resume_ouvrage;
		}
		
		
		public function setNbre_page_ouv($nbre_page_ouv)
		{
			$this->nbre_page_ouv = $nbre_page_ouv;
		}
		
		public function setId_auteur($id_auteur)
		{
			$this->id_auteur = $id_auteur;
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

		
		
		
		
		/*SELECT ouvrages.`id_ouvrage`, ouvrages.titre_ouvrage, ouvrages.resume_ouvrage, ouvrages.nbre_page_ouv FROM `ouvrages` INNER JOIN operations ON ouvrages.id_ouvrage=operations.`id_ouvrage` ORDER BY `id_ouvrage` DESC 
		SELECT ouvrages.`id_ouvrage`, ouvrages.titre_ouvrage, ouvrages.resume_ouvrage, ouvrages.nbre_page_ouv, operations.lib_op FROM `ouvrages` LEFT JOIN operations ON ouvrages.id_ouvrage=operations.`id_ouvrage` ORDER BY `id_ouvrage` DESC*/
/*METHODE QUI PERMET D'AFFICHER LA LISTE DES */
        public function afficheOuvrages(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT ouvrages.`id_ouvrage`, ouvrages.titre_ouvrage, ouvrages.resume_ouvrage, ouvrages.nbre_page_ouv, auteurs.nom_auteur, auteurs.prenom_auteur, categories.lib_cat_ouv, compartiments.lib_comp, rayon.lib_rayon FROM `ouvrages` INNER JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur INNER JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon ORDER BY `id_ouvrage` DESC ");
            $requete->execute();

            return $requete;
        }
		
		
public function afficheOuv(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM `ouvrages` INNER JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur INNER JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv ORDER BY `id_ouvrage` DESC");
            $requete->execute();

            return $requete;
        }
		
		public function afficheOuvToutEmpr(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM ouvrages INNER JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur INNER JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv INNER JOIN operations ON ouvrages.id_ouvrage=operations.id_ouvrage INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant ORDER BY id_op DESC");
            $requete->execute();

            return $requete;
        }
		
		
		
		public function afficheMesOuvEmprunte(){
            $bdd = connexionBdd();
            $var=$_SESSION['id_etudiant'];
            $requete = $bdd->prepare("SELECT * FROM exemplaires JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv INNER JOIN operations ON exemplaires.id_exp=operations.id_exp WHERE lib_op='emprunt&eacute;' AND id_etudiant=$var AND operation='1' ORDER BY id_op DESC");
            $requete->execute();

            return $requete;
        }
		
		
		public function afficheMesOuvReserve(){
            $bdd = connexionBdd();
            $var=$_SESSION['id_etudiant'];
            $requete = $bdd->prepare("SELECT * FROM exemplaires JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv INNER JOIN operations ON exemplaires.id_exp=operations.id_exp WHERE lib_op='reserv&eacute;' AND id_etudiant=$var AND operation='1' ORDER BY id_op DESC");
            $requete->execute();

            return $requete;
        }
		
		

		public function afficheOuvEmpr(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM `operations` LEFT JOIN exemplaires ON operations.id_exp=exemplaires.id_exp LEFT JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON auteurs.id_auteur=ouvrages.id_auteur LEFT JOIN categories ON categories.id_cat_ouv=ouvrages.id_cat_ouv INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon WHERE lib_op="demande d\'emprunt" ORDER BY id_op DESC');
            $requete->execute();

			
			$ouv_empr = $requete -> rowCount();
			$_SESSION['ouv_empr'] = $ouv_empr;
			
            return $requete;
		
		
        }
		
		
		public function afficheOuvRes(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM `operations` LEFT JOIN exemplaires ON operations.id_exp=exemplaires.id_exp LEFT JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON auteurs.id_auteur=ouvrages.id_auteur LEFT JOIN categories ON categories.id_cat_ouv=ouvrages.id_cat_ouv INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon WHERE lib_op="demande de reservation" ORDER BY id_op ASC');
            $requete->execute();

			$ouv_res = $requete -> rowCount();
			$_SESSION['ouv_res'] = $ouv_res;
			
            return $requete;
        }
		
		
		
		
		public function afficheOuvEmprunte(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM `operations` LEFT JOIN exemplaires ON operations.id_exp=exemplaires.id_exp LEFT JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON auteurs.id_auteur=ouvrages.id_auteur LEFT JOIN categories ON categories.id_cat_ouv=ouvrages.id_cat_ouv INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon WHERE lib_op="emprunt&eacute;" AND operation="1" ORDER BY id_op DESC');
            $requete->execute();

			
			$nb_emprunt = $requete -> rowCount();
			$_SESSION['nb_emprunt'] = $nb_emprunt;
			
            return $requete;
        }
		
		
		public function afficheOuvReserve(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM ouvrages INNER JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur INNER JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv INNER JOIN operations ON ouvrages.id_ouvrage=operations.id_ouvrage INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant WHERE lib_op="reserv&eacute;" AND operation="1" ORDER BY id_op DESC');
            $requete->execute();

            return $requete;
        }
		
		
		
		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteUser($titre_ouvrage){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM ouvrages WHERE titre_ouvrage=?");

				$request->execute(array($_POST['titre_ouvrage']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutOuvrage(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `ouvrages` WHERE titre_ouvrage=:titre_ouvrage");
			$result = $request->execute(array(
												':titre_ouvrage'=>$this->titre_ouvrage
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `ouvrages`(`id_ouvrage`, `titre_ouvrage`, `resume_ouvrage`, `nbre_page_ouv`, `id_cat_ouv`, id_auteur, id_comp) VALUES (:id_ouvrage,:titre_ouvrage,:resume_ouvrage,:nbre_page_ouv,:id_cat_ouv,:id_auteur,:id_comp)");

				$reponse = $request->execute(array(
													'id_ouvrage'	 => NULL,			
													'titre_ouvrage' => $this->titre_ouvrage,
													'resume_ouvrage' => $this->resume_ouvrage,
													'nbre_page_ouv' => $this->nbre_page_ouv,
													'id_cat_ouv' => $this->id_cat_ouv,
													'id_auteur' => $this->id_auteur,
													'id_comp' => $this->id_comp
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 }
		}


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierOuv(){
			//if($this->photo==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `ouvrages` SET `titre_ouvrage`=?,`resume_ouvrage`=?,`nbre_page_ouv`=?,`id_cat_ouv`=?,`id_auteur`=?,`id_comp`=? WHERE `id_ouvrage`=?");
					
							
							$titre_ouvrage	= $this->titre_ouvrage;
							$resume_ouvrage	= $this->resume_ouvrage;
							$nbre_page_ouv	= $this->nbre_page_ouv;
							$id_cat_ouv	= $this->id_cat_ouv;
							$id_auteur	= $this->id_auteur;
							$id_comp	= $this->id_comp;
							$id_ouvrage		= $this->id_ouvrage;
					
					$params=array($titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$id_cat_ouv,$id_auteur,$id_comp,$id_ouvrage);
					
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
			public function supprimerOuv(){
				//connexion à la bdd
				
				$bdd = connexionBdd();
				$code=$_GET['code'];
				$request=$bdd->prepare("DELETE FROM ouvrages WHERE id_ouvrage=? LIMIT 1");
				
				$params=array($code);
				
				$request->execute($params);
				
				return $request;
		}
		
		
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_user`=commentaires.`id_user` WHERE id_commentaire=14
		public function getIdOuv($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `ouvrages` WHERE id_ouvrage=?");
			$params=array($code);
			$request->execute($params);
			$ouv=$request->fetch();

			return $ouv; 
		}
//======================================================================	
	}
	
?>