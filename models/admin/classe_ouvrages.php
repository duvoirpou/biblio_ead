<?php 
	class ouvrages
	{
		private $id_ouvrage;
		private $titre_ouvrage;
		private $resume_ouvrage;
		
		private $nbre_page_ouv;
		

		public function __construct($id_ouvrage,$titre_ouvrage,$resume_ouvrage,$nbre_page_ouv)
					{
						$this->id_ouvrage 		= $id_ouvrage;
						$this->titre_ouvrage 		= $titre_ouvrage;
						$this->resume_ouvrage 		= $resume_ouvrage;
						
						$this->nbre_page_ouv 		= $nbre_page_ouv;
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_etudiant()
		{
			return $this->id_ouvrage;
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

		
		
		public function getAdresse_lecteur()
		{
			return $this->adresse_lecteur;
		}
		
		public function getTel_lecteur()
		{
			return $this->tel_lecteur;
		}

		/*LISTE DES SETTERS*/
		
		public function setId_etudiant($id_ouvrage)
		{
			$this->id_ouvrage = $id_ouvrage;
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
        public function afficheOuvrages(){
            $bdd = connexionBdd();
            //$eleve = $_SESSION['video'];
            $requete = $bdd->prepare("SELECT * FROM ouvrages ORDER BY id_ouvrage DESC LIMIT 3");
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
		public function ajoutOuvrages(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `ouvrages` WHERE titre=:titre");
			$result = $request->execute(array(
												':titre'=>$this->titre
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `ouvrages`(`id_ouvrage`, `titre_ouvrage`, `resume_ouvrage`, `nbre_page_ouv`) VALUES (:id_ouvrage,:titre_ouvrage,:resume_ouvrage,:nbre_page_ouv)");

				$reponse = $request->execute(array(
													'id_ouvrage'	 => NULL,			
													'titre_ouvrage' => $this->titre_ouvrage,
													'resume_ouvrage' => $this->resume_ouvrage,
													'nbre_page_ouv' => $this->nbre_page_ouv
													
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 }
		}


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierOuvrages(){
			if($this->livre==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `ouvrages` SET `titre_ouvrage`=?,`resume_ouvrage`=?,`nbre_page_ouv`=?,`tel`=?,`pseudo`=?,`mpass`=?,`permis`=? WHERE `id_user`=?");
					
							
							$nom_user	= $this->titre_ouvrage;
							$resume_ouvrage	= $this->resume_ouvrage;
							$nbre_page_ouv	= $this->nbre_page_ouv;
							
							$id_ouvrage		= $this->id_ouvrage;
					
					$params=array($nom_user,$resume_ouvrage,$nbre_page_ouv,$id_ouvrage);
					
					$request->execute($params);
			}else{
				$bdd = connexionBdd();
				//tmp_name est un dossier temporaire
				$livres=$_FILES['livre']['tmp_name'];
				
				//chemin pour recevoir les photos du site
				//impseudos nom du dossier et $nomPhoto fichier temporaire
				move_uploaded_file($livre, 'documents/'.$livres);
				
				$request=$bdd->prepare("UPDATE `user` SET `titre_ouvrage`=?,`resume_ouvrage`=?,`nbre_page_ouv`=?,`livre`=? WHERE `id_ouvrage`=?");
					
							
							$titre_ouvrage	= $this->titre_ouvrage;
							$resume_ouvrage	= $this->resume_ouvrage;
							$nbre_page_ouv	= $this->nbre_page_ouv;
							$livre		= $this->livre;
							$id_ouvrage		= $this->id_ouvrage;
							
							
					
					$params=array($titre_ouvrage,$resume_ouvrage,$nbre_page_ouv,$livre,$id_ouvrage);
					
					$request->execute($params);
				
				
			}
			return $request;
		}

		
		
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_ouvrage`=commentaires.`id_ouvrage` WHERE id_commentaire=14
		public function getIdUser($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `user` WHERE id_ouvrage=?");
			$params=array($code);
			$request->execute($params);
			$user=$request->fetch();

			return $user; 
		}
//======================================================================	
	}
	
?>