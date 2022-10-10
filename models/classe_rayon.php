<?php 
	class rayon
	{
		private $id_rayon;
		private $lib_rayon;
		
		
		
		

		public function __construct($id_rayon,$lib_rayon)
					{
						$this->id_rayon 		= $id_rayon;
						$this->lib_rayon 		= $lib_rayon;
						
						
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_rayon()
		{
			return $this->id_rayon;
		}
		
		public function getlib_rayon()
		{
			return $this->lib_rayon;
		}
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_rayon($id_rayon)
		{
			$this->id_rayon = $id_rayon;
		}
		
		public function setlib_rayon($lib_rayon)
		{
			$this->lib_rayon = $lib_rayon;
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
        public function afficheRayon(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM rayon ORDER BY id_rayon");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteRayon($lib_rayon){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM rayon WHERE lib_rayon=?");

				$request->execute(array($_POST['lib_rayon']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutRayon(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `rayon` WHERE lib_rayon=:lib_rayon");
			$result = $request->execute(array(
												':lib_rayon'=>$this->lib_rayon
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `rayon`(`id_rayon`, `lib_rayon`) VALUES (:id_rayon,:lib_rayon)");

				$reponse = $request->execute(array(
													'id_rayon'	 => NULL,			
													'lib_rayon' => $this->lib_rayon
													
													
													
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