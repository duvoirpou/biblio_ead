<?php 
	class auteurs
	{
		private $id_auteur;
		private $nom_auteur;
		private $prenom_auteur;
		
		
		

		public function __construct($id_auteur,$nom_auteur,$prenom_auteur)
					{
						$this->id_auteur 		= $id_auteur;
						$this->nom_auteur 		= $nom_auteur;
						$this->prenom_auteur 		= $prenom_auteur;
						
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_auteur()
		{
			return $this->id_auteur;
		}
		
		public function getNom_auteur()
		{
			return $this->nom_auteur;
		}
		
		public function getPrenom_auteur()
		{
			return $this->prenom_auteur;
		}
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_auteur($id_auteur)
		{
			$this->id_auteur = $id_auteur;
		}
		
		public function setNom_auteur($nom_auteur)
		{
			$this->nom_auteur = $nom_auteur;
		}
		
		public function setPrenom_auteur($prenom_auteur)
		{
			$this->prenom_auteur = $prenom_auteur;
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
        public function afficheAuteurs(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM auteurs ORDER BY id_auteur");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteAuteurs($nom_auteur,$prenom_auteur){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM auteurs WHERE nom_auteur=? AND prenom_auteur=?");

				$request->execute(array($_POST['nom_auteur'],$_POST['prenom_auteur']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutAuteur(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `auteurs` WHERE nom_auteur=:nom_auteur");
			$result = $request->execute(array(
												':nom_auteur'=>$this->nom_auteur
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `auteurs`(`id_auteur`, `nom_auteur`, `prenom_auteur`) VALUES (:id_auteur,:nom_auteur,:prenom_auteur)");

				$reponse = $request->execute(array(
													'id_auteur'	 => NULL,			
													'nom_auteur' => $this->nom_auteur,
													'prenom_auteur' => $this->prenom_auteur
													
													
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
					$request=$bdd->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`nbre_page_ouv`=?,`tel`=?,`pseudo`=?,`mpass`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->nom_user;
							$prenom_user	= $this->prenom_user;
							$nbre_page_ouv	= $this->nbre_page_ouv;
							$tel	= $this->tel;
							$pseudo		= $this->pseudo;
							$mpass		= $this->mpass;
							
							$permis		= $this->permis;
							$id_user		= $this->id_user;
					
					$params=array($nom_user,$prenom_user,$nbre_page_ouv,$tel,$pseudo,$mpass,$permis,$id_user);
					
					$request->execute($params);
			}else{
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