<?php 
	class d_rapp_stage
	{
		private $id_d_rapp_stage;
		private $nom;
		private $prenom;
		private $sexe;
		
		
		
		

		public function __construct($id_d_rapp_stage,$nom,$prenom,$sexe)
					{
						$this->id_d_rapp_stage 		= $id_d_rapp_stage;
						$this->nom 		= $nom;
						$this->prenom 		= $prenom;
						$this->sexe 		= $sexe;
						
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_d_rapp_stage()
		{
			return $this->id_d_rapp_stage;
		}
		
		public function getNom_d_rapp_stage()
		{
			return $this->nom;
		}
		
		public function getPrenom()
		{
			return $this->prenom;
		}
		
		public function getSexe()
		{
			return $this->sexe;
		}
		
		
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_d_rapp_stage($id_d_rapp_stage)
		{
			$this->id_d_rapp_stage = $id_d_rapp_stage;
		}
		
		public function setNom_d_rapp_stage($nom_d_rapp_stage)
		{
			$this->nom_d_rapp_stage = $nom_d_rapp_stage;
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
        public function afficheD_rapp_stage(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM d_rapp_stage ORDER BY id_d_rapp_stage");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteD_rapp_stage($nom,$prenom){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM d_rapp_stage WHERE nom=? AND prenom=?");

				$request->execute(array($_POST['nom'],$_POST['prenom']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutD_rapp_stage(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `d_rapp_stage` WHERE nom=:nom AND prenom=:prenom");
			$result = $request->execute(array(
												':nom'=>$this->nom,
												':prenom'=>$this->prenom
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `d_rapp_stage`(`id_d_rapp_stage`, `nom`, `prenom`, `sexe`) VALUES (:id_d_rapp_stage, :nom, :prenom, :sexe)");

				$reponse = $request->execute(array(
													'id_d_rapp_stage' => NULL,			
													'nom' => $this->nom,
													'prenom' => $this->prenom,
													'sexe' => $this->sexe
													
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