<?php 
	class lecteur
	{
		private $id_lecteur;
		private $matricule_lecteur;
		private $nom_lecteur;
		private $prenom_lecteur;
		private $sexe_lecteur;
		private $adresse_lecteur;
		private $tel_lecteur;
		

		public function __construct($id_lecteur,$matricule_lecteur,$nom_lecteur,$prenom_lecteur,$sexe_lecteur,$adresse_lecteur,$tel_lecteur)
					{
						$this->id_lecteur 		= $id_lecteur;
						$this->matricule_lecteur 		= $matricule_lecteur;
						$this->nom_lecteur 		= $nom_lecteur;
						$this->prenom_lecteur 		= $prenom_lecteur;
						$this->sexe_lecteur 		= $sexe_lecteur;
						$this->adresse_lecteur 		= $adresse_lecteur;
						$this->tel_lecteur 		= $tel_lecteur;
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_lecteur()
		{
			return $this->id_lecteur;
		}
		
		public function getMatricule_lecteur()
		{
			return $this->matricule_lecteur;
		}
		
		public function getNom_lecteur()
		{
			return $this->nom_lecteur;
		}
		
		
		public function getPrenom_lecteur()
		{
			return $this->prenom_lecteur;
		}
		
		public function getSexe_lecteur()
		{
			return $this->sexe_lecteur;
		}

		public function getAdresse_lecteur()
		{
			return $this->adresse_lecteur;
		}
		
		public function getTel_lecteur()
		{
			return $this->tel_lecteur;
		}
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_lecteur($id_lecteur)
		{
			$this->id_lecteur = $id_lecteur;
		}
		
		public function setMatricule_lecteur($matricule_lecteur)
		{
			$this->matricule_lecteur = $matricule_lecteur;
		}
		
		public function setNom_lecteur($nom_lecteur)
		{
			$this->nom_lecteur = $nom_lecteur;
		}
		
		public function setPrenom_lecteur($prenom_lecteur)
		{
			$this->prenom_lecteur = $prenom_lecteur;
		}
		
		public function setSexe_lecteur($sexe_lecteur)
		{
			$this->sexe_lecteur = $sexe_lecteur;
		}
		
		public function setTel_lecteur($tel_lecteur)
		{
			$this->tel_lecteur = $tel_lecteur;
		}
		
		public function setAdresse_lecteur($adresse_lecteur)
		{
			$this->adresse_lecteur = $adresse_lecteur;
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

		

		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteUser($nom_lecteur,$matricule_lecteur){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM lecteur WHERE nom_lecteur=? AND matricule_lecteur=?");

				$request->execute(array($_POST['nom_lecteur'],$_POST['matricule_lecteur']));

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

				 $request = $bdd->prepare("INSERT INTO `user`(`id_user`, `nom_user`, `prenom_user`, `sexe_lecteur`, `tel`, `pseudo`, `mpass`, `photo`, `permis`) VALUES (:id_user,:nom_user,:prenom_user,:sexe_lecteur,:tel,:pseudo,:mpass,:photo,:permis)");

				$reponse = $request->execute(array(
													'id_user'	 => NULL,			
													'nom_user' => $this->nom_user,
													'prenom_user' => $this->prenom_user,
													'sexe_lecteur' => $this->sexe_lecteur,
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


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/lecteur
		public function ModifierMembre(){
			if($this->photo==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`sexe_lecteur`=?,`tel`=?,`pseudo`=?,`mpass`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->nom_user;
							$prenom_user	= $this->prenom_user;
							$sexe_lecteur	= $this->sexe_lecteur;
							$tel	= $this->tel;
							$pseudo		= $this->pseudo;
							$mpass		= $this->mpass;
							
							$permis		= $this->permis;
							$id_user		= $this->id_user;
					
					$params=array($nom_user,$prenom_user,$sexe_lecteur,$tel,$pseudo,$mpass,$permis,$id_user);
					
					$request->execute($params);
			}else{
				$bdd = connexionBdd();
				//tmp_name est un dossier temporaire
				$photos=$_FILES['photo']['tmp_name'];
				
				//chemin pour recevoir les photos du site
				//impseudos nom du dossier et $nomPhoto fichier temporaire
				move_uploaded_file($photo, 'images/'.$photos);
				
				$request=$bdd->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`sexe_lecteur`=?,`tel`=?,`pseudo`=?,`mpass`=?,`photo`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->nom_user;
							$prenom_user	= $this->prenom_user;
							$sexe_lecteur	= $this->sexe_lecteur;
							$tel	= $this->tel;
							$pseudo		= $this->pseudo;
							$mpass		= $this->mpass;
							$photo		= $this->photo;
							$permis		= $this->permis;
							$id_user		= $this->id_user;
							
							
					
					$params=array($nom_user,$prenom_user,$sexe_lecteur,$tel,$pseudo,$mpass,$photo,$permis,$id_user);
					
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