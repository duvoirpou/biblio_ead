<?php 
	class documents
	{
		private $id_doc;
		private $theme_doc;
		private $option_doc;
		
		private $niveau_doc;
		private $id_auteur;
		private $id_dm;
		private $id_d_rapp_stage;
		private $id_type_doc;
		
		

		public function __construct($id_doc,$theme_doc,$option_doc,$niveau_doc,$id_auteur,$id_dm,$id_d_rapp_stage,$id_type_doc)
					{
						$this->id_doc 		= $id_doc;
						$this->theme_doc 		= $theme_doc;
						$this->option_doc 		= $option_doc;
						
						$this->niveau_doc 		= $niveau_doc;
						$this->id_auteur 		= $id_auteur;
						$this->id_dm 		= $id_dm;
						$this->id_d_rapp_stage 		= $id_d_rapp_stage;
						$this->id_type_doc 		= $id_type_doc;

						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_doc()
		{
			return $this->id_doc;
		}
		
		public function getTitre_doc()
		{
			return $this->theme_doc;
		}
		
		public function getOption_doc()
		{
			return $this->option_doc;
		}
		
		
		
		
		public function getNiveau_doc()
		{
			return $this->niveau_doc;
		}
		
		public function getId_auteur()
		{
			return $this->id_auteur;
		}
		
		public function getId_dm()
		{
			return $this->id_dm;
		}

		public function getId_d_rapp_stage()
		{
			return $this->id_d_rapp_stage;
		}

		
		public function getId_type_doc()
		{
			return $this->id_type_doc;
		}

		
		
		
		/*LISTE DES SETTERS*/
		
		public function setId_doc($id_doc)
		{
			$this->id_doc = $id_doc;
		}
		
		public function setTheme_do($theme_doc)
		{
			$this->theme_doc = $theme_doc;
		}
		
		public function setOption_doc($option_doc)
		{
			$this->option_doc = $option_doc;
		}
		
		
		public function setNiveau_doc($niveau_doc)
		{
			$this->niveau_doc = $niveau_doc;
		}
		
		
		public function setId_type_doc($id_type_doc)
		{
			$this->id_type_doc = $id_type_doc;
		}

		public function setId_d_rapp_stage($id_d_rapp_stage)
		{
			$this->id_d_rapp_stage = $id_d_rapp_stage;
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
        public function afficheDocuments(){
            $bdd = connexionBdd();
            //$eleve = $_SESSION['video'];
            $requete = $bdd->prepare("SELECT documents.id_doc, documents.theme_doc, documents.option_doc, documents.niveau_doc, auteurs.nom_auteur, auteurs.prenom_auteur, d_memoire.nom_dm, d_memoire.prenom_dm, d_memoire.sexe_dm, d_memoire.grade_dm, d_memoire.fonction_dm, d_rapp_stage.nom, d_rapp_stage.prenom, type_doc.lib_type_doc, type_doc.id_type_doc, operations_docs.lib_op_doc, operations_docs.id_op_doc, operations_docs.id_etudiant FROM documents INNER JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm LEFT JOIN d_rapp_stage ON documents.id_d_rapp_stage=d_rapp_stage.id_d_rapp_stage LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN operations_docs ON documents.id_doc=operations_docs.id_doc ORDER BY id_doc DESC ");
            $requete->execute();

            return $requete;
        }
		
		
		public function afficheDocumentsEmpr(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM documents LEFT JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm LEFT JOIN operations_docs ON documents.id_doc=operations_docs.id_doc LEFT JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN d_rapp_stage ON d_rapp_stage.id_d_rapp_stage=documents.id_d_rapp_stage WHERE lib_op_doc="demande d\'emprunt" ORDER BY id_op_doc DESC');
            $requete->execute();

			$docs_empr = $requete -> rowCount();
			$_SESSION['docs_empr'] = $docs_empr;
			
            return $requete;
        }
		
		
		public function afficheDocumentsEmprunte(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM documents INNER JOIN auteurs ON documents.id_auteur=auteurs.id_auteur INNER JOIN d_memoire ON documents.id_dm=d_memoire.id_dm INNER JOIN operations_docs ON documents.id_doc=operations_docs.id_doc INNER JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN d_rapp_stage ON d_rapp_stage.id_d_rapp_stage=documents.id_d_rapp_stage WHERE lib_op_doc="emprunt&eacute;" ORDER BY id_op_doc DESC');
            $requete->execute();

            return $requete;
        }
		
		
		
		public function afficheDocsRes(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM documents LEFT JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm LEFT JOIN operations_docs ON documents.id_doc=operations_docs.id_doc LEFT JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN d_rapp_stage ON d_rapp_stage.id_d_rapp_stage=documents.id_d_rapp_stage WHERE lib_op_doc="demande de reservation" ORDER BY id_op_doc DESC');
            $requete->execute();

			
			$docs_res = $requete -> rowCount();
			$_SESSION['docs_res'] = $docs_res;
			
            return $requete;
        }
		
		
		
		
		public function afficheDocsReserve(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM documents INNER JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm INNER JOIN operations_docs ON documents.id_doc=operations_docs.id_doc INNER JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN d_rapp_stage ON d_rapp_stage.id_d_rapp_stage=documents.id_d_rapp_stage WHERE lib_op_doc="reserv&eacute;" ORDER BY id_op_doc DESC');
            $requete->execute();

			
			$docs_reserve = $requete -> rowCount();
			$_SESSION['docs_reserve'] = $docs_reserve;
			
            return $requete;
        }
		
		
		
				public function afficheMesDocsEmprunte(){
            $bdd = connexionBdd();
            $var=$_SESSION['id_etudiant'];
            $requete = $bdd->prepare("SELECT * FROM documents INNER JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm INNER JOIN operations_docs ON documents.id_doc=operations_docs.id_doc INNER JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN d_rapp_stage ON d_rapp_stage.id_d_rapp_stage=documents.id_d_rapp_stage WHERE lib_op_doc='emprunt&eacute;' AND etudiant.id_etudiant=$var ORDER BY id_op_doc DESC");
            $requete->execute();

			
			$mes_docs_emprunte = $requete -> rowCount();
			$_SESSION['mes_docs_emprunte'] = $mes_docs_emprunte;
			
            return $requete;
        }
		
		
		
				public function afficheMesDocsReserve(){
            $bdd = connexionBdd();
            $var=$_SESSION['id_etudiant'];
            $requete = $bdd->prepare("SELECT * FROM documents INNER JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm INNER JOIN operations_docs ON documents.id_doc=operations_docs.id_doc INNER JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN d_rapp_stage ON d_rapp_stage.id_d_rapp_stage=documents.id_d_rapp_stage WHERE lib_op_doc='reserv&eacute;' AND etudiant.id_etudiant=$var ORDER BY id_op_doc DESC");
            $requete->execute();

			
			$docs_reserve = $requete -> rowCount();
			$_SESSION['docs_reserve'] = $docs_reserve;
			
            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteDocuments($theme_doc){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM documents WHERE theme_doc=?");

				$request->execute(array($_POST['theme_doc']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutDocuments(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `documents` WHERE theme_doc=:theme_doc");
			$result = $request->execute(array(
												':theme_doc'=>$this->theme_doc
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `documents`(`id_doc`, `theme_doc`, `option_doc`, `niveau_doc`, `id_auteur`, `id_dm`, id_d_rapp_stage, `id_type_doc`) VALUES (:id_doc,:theme_doc,:option_doc,:niveau_doc,:id_auteur,:id_dm,:id_d_rapp_stage,:id_type_doc)");

				$reponse = $request->execute(array(
													'id_doc'	 => NULL,			
													'theme_doc' => $this->theme_doc,
													'option_doc' => $this->option_doc,
													'niveau_doc' => $this->niveau_doc,
													'id_auteur' => $this->id_auteur,
													'id_dm' => $this->id_dm,
													'id_d_rapp_stage' => $this->id_d_rapp_stage,
													'id_type_doc' => $this->id_type_doc
												
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 }
		}


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierDocs(){
			//if($this->photo==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `documents` SET `theme_doc`=?,`option_doc`=?,`niveau_doc`=?,`id_auteur`=?,`id_dm`=?,`id_d_rapp_stage`=?,`id_type_doc`=? WHERE `id_doc`=?");
					
							
							$theme_doc	= $this->theme_doc;
							$option_doc	= $this->option_doc;
							
							$niveau_doc	= $this->niveau_doc;
							$id_auteur	= $this->id_auteur;
							$id_dm		= $this->id_dm;
							$id_d_rapp_stage = $this->id_d_rapp_stage;
							$id_type_doc		= $this->id_type_doc;
							$id_doc		= $this->id_doc;
					
					$params=array($theme_doc,$option_doc,$niveau_doc,$id_auteur,$id_dm,$id_d_rapp_stage,$id_type_doc,$id_doc);
					
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
				$request=$bdd->prepare("DELETE FROM documents WHERE id_doc=? LIMIT 1");
				
				$params=array($code);
				
				$request->execute($params);
				
				return $request;
		}
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_user`=commentaires.`id_user` WHERE id_commentaire=14
		public function getIdDocs($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `documents` WHERE id_doc=?");
			$params=array($code);
			$request->execute($params);
			$docs=$request->fetch();

			return $docs; 
		}
//======================================================================	
	}
	
?>