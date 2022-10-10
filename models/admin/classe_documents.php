<?php 
	class documents
	{
		private $id_doc;
		private $theme_doc;
		private $option_doc;
		
		private $niveau_doc;
		

		public function __construct($id_doc,$theme_doc,$option_doc,$niveau_doc)
					{
						$this->id_doc 		= $id_doc;
						$this->theme_doc 		= $theme_doc;
						$this->option_doc 		= $option_doc;
						
						$this->niveau_doc 		= $niveau_doc;
						
						
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

		
		
		
		/*LISTE DES SETTERS*/
		
		public function setId_doc($id_doc)
		{
			$this->id_doc = $id_doc;
		}
		
		public function setTitre_doc($theme_doc)
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
            $requete = $bdd->prepare("SELECT * FROM documents ORDER BY id_doc DESC LIMIT 3");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteUser($theme_doc){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM documents WHERE theme_doc=?");

				$request->execute(array($_POST['theme_doc']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutClient(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `user` WHERE pseudo=:pseudo");
			$result = $request->execute(array(
												':pseudo'=>$this->pseudo
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `user`(`id_user`, `nom_user`, `prenom_user`, `niveau_doc`, `tel`, `pseudo`, `mpass`, `photo`, `permis`) VALUES (:id_user,:nom_user,:prenom_user,:niveau_doc,:tel,:pseudo,:mpass,:photo,:permis)");

				$reponse = $request->execute(array(
													'id_user'	 => NULL,			
													'nom_user' => $this->nom_user,
													'prenom_user' => $this->prenom_user,
													'niveau_doc' => $this->niveau_doc,
													'tel' => $this->tel,
													'pseudo' => $this->pseudo,
													'mpass' => $this->mpass,
													'photo' => $this->photo,
													'permis' => $this->permis
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 }
		}


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierMembre(){
			if($this->photo==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`niveau_doc`=?,`tel`=?,`pseudo`=?,`mpass`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->nom_user;
							$prenom_user	= $this->prenom_user;
							$niveau_doc	= $this->niveau_doc;
							$tel	= $this->tel;
							$pseudo		= $this->pseudo;
							$mpass		= $this->mpass;
							
							$permis		= $this->permis;
							$id_user		= $this->id_user;
					
					$params=array($nom_user,$prenom_user,$niveau_doc,$tel,$pseudo,$mpass,$permis,$id_user);
					
					$request->execute($params);
			}else{
				$bdd = connexionBdd();
				//tmp_name est un dossier temporaire
				$photos=$_FILES['photo']['tmp_name'];
				
				//chemin pour recevoir les photos du site
				//impseudos nom du dossier et $nomPhoto fichier temporaire
				move_uploaded_file($photo, 'images/'.$photos);
				
				$request=$bdd->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`niveau_doc`=?,`tel`=?,`pseudo`=?,`mpass`=?,`photo`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->nom_user;
							$prenom_user	= $this->prenom_user;
							$niveau_doc	= $this->niveau_doc;
							$tel	= $this->tel;
							$pseudo		= $this->pseudo;
							$mpass		= $this->mpass;
							$photo		= $this->photo;
							$permis		= $this->permis;
							$id_user		= $this->id_user;
							
							
					
					$params=array($nom_user,$prenom_user,$niveau_doc,$tel,$pseudo,$mpass,$photo,$permis,$id_user);
					
					$request->execute($params);
				
				
			}
			return $request;
		}

		
		
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_user`=commentaires.`id_user` WHERE id_commentaire=14
		public function getIdUser($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `user` WHERE id_user=?");
			$params=array($code);
			$request->execute($params);
			$user=$request->fetch();

			return $user; 
		}
//======================================================================	
	}
	
?>