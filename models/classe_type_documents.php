<?php 
	class type_doc
	{
		private $id_type_doc;
		private $lib_type_doc;
		
		
		

		public function __construct($id_type_doc,$lib_type_doc)
					{
						$this->id_type_doc 		= $id_type_doc;
						$this->lib_type_doc 		= $lib_type_doc;
						
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_type_doc()
		{
			return $this->id_type_doc;
		}
		
		public function getLib_type_doc()
		{
			return $this->lib_type_doc;
		}
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_type_doc($id_type_doc)
		{
			$this->id_type_doc = $id_type_doc;
		}
		
		public function setLib_type_doc($lib_type_doc)
		{
			$this->lib_type_doc = $lib_type_doc;
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
        public function afficheTypeDoc(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM type_doc ORDER BY id_type_doc DESC");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionTypeDoc($lib_type_doc){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM type_doc WHERE lib_type_doc=?");

				$request->execute(array($_POST['lib_type_doc']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutTypeDoc(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `type_doc` WHERE lib_type_doc=:lib_type_doc");
			$result = $request->execute(array(
												':lib_type_doc'=>$this->lib_type_doc
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `type_doc`(`id_type_doc`, `lib_type_doc`) VALUES (:id_type_doc,:lib_type_doc)");

				$reponse = $request->execute(array(
													'id_type_doc'	 => NULL,			
													'lib_type_doc' => $this->lib_type_doc
													
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