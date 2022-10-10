<?php 
	class categories
	{
		private $id_cat_ouv;
		private $lib_cat_ouv;
		
		
		

		public function __construct($id_cat_ouv,$lib_cat_ouv)
					{
						$this->id_cat_ouv 		= $id_cat_ouv;
						$this->lib_cat_ouv 		= $lib_cat_ouv;
						
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_cat_ouv()
		{
			return $this->id_cat_ouv;
		}
		
		public function getLib_cat_ouv()
		{
			return $this->lib_cat_ouv;
		}
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_cat_ouv($id_cat_ouv)
		{
			$this->id_cat_ouv = $id_cat_ouv;
		}
		
		public function setLib_cat_ouv($lib_cat_ouv)
		{
			$this->lib_cat_ouv = $lib_cat_ouv;
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
        public function afficheCategories(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM categories ORDER BY id_cat_ouv DESC");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteCategories($lib_cat_ouv){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM categories WHERE lib_cat_ouv=?");

				$request->execute(array($_POST['lib_cat_ouv']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutCat(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `categories` WHERE lib_cat_ouv=:lib_cat_ouv");
			$result = $request->execute(array(
												':lib_cat_ouv'=>$this->lib_cat_ouv
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `categories`(`id_cat_ouv`, `lib_cat_ouv`) VALUES (:id_cat_ouv,:lib_cat_ouv)");

				$reponse = $request->execute(array(
													'id_cat_ouv'	 => NULL,			
													'lib_cat_ouv' => $this->lib_cat_ouv
													
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