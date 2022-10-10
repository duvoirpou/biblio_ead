<?php 
	class d_memoire
	{
		private $id_dm;
		private $nom_dm;
		private $prenom_dm;
		private $sexe_dm;
		private $grade_dm;
		private $fonction_dm;
		
		
		

		public function __construct($id_dm,$nom_dm,$prenom_dm,$sexe_dm,$grade_dm,$fonction_dm)
					{
						$this->id_dm 		= $id_dm;
						$this->nom_dm 		= $nom_dm;
						$this->prenom_dm 		= $prenom_dm;
						$this->sexe_dm 		= $sexe_dm;
						$this->grade_dm 		= $grade_dm;
						$this->fonction_dm 		= $fonction_dm;
						
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_dm()
		{
			return $this->id_dm;
		}
		
		public function getNom_dm()
		{
			return $this->nom_dm;
		}
		
		public function getPrenom_dm()
		{
			return $this->prenom_dm;
		}
		
		public function getSexe_dm()
		{
			return $this->sexe_dm;
		}
		
		public function getGrade_dm()
		{
			return $this->grade_dm;
		}
		
		public function getFonction_dm()
		{
			return $this->fonction_dm;
		}
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_dm($id_dm)
		{
			$this->id_dm = $id_dm;
		}
		
		public function setNom_dm($nom_dm)
		{
			$this->nom_dm = $nom_dm;
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
        public function afficheD_memoire(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM d_memoire ORDER BY id_dm");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteD_memoire($nom_dm,$prenom_dm){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM d_memoire WHERE nom_dm=? AND prenom_dm=?");

				$request->execute(array($_POST['nom_dm'],$_POST['prenom_dm']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutD_memoire(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `d_memoire` WHERE nom_dm=:nom_dm AND prenom_dm=:prenom_dm");
			$result = $request->execute(array(
												':nom_dm'=>$this->nom_dm,
												':prenom_dm'=>$this->prenom_dm
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `d_memoire`(`id_dm`, `nom_dm`, `prenom_dm`, `sexe_dm`, `grade_dm`,`fonction_dm`) VALUES (:id_dm,:nom_dm,:prenom_dm,:sexe_dm,:grade_dm,:fonction_dm)");

				$reponse = $request->execute(array(
													'id_dm'	 => NULL,			
													'nom_dm' => $this->nom_dm,
													'prenom_dm' => $this->prenom_dm,
													'sexe_dm' => $this->sexe_dm,
													'grade_dm' => $this->grade_dm,
													'fonction_dm' => $this->fonction_dm
													
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