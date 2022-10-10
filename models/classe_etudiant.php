<?php 
	class etudiant
	{
		private $id_etudiant;
		private $matricule;
		private $nom_etudiant;
		private $prenom_etudiant;
		private $sexe;
		private $adresse_lecteur;
		private $tel_lecteur;
		private $option_etud;
		private $annee;

		public function __construct($id_etudiant,$matricule,$nom_etudiant,$prenom_etudiant,$sexe,$adresse_lecteur,$tel_lecteur,$option_etud,$annee)
					{
						$this->id_etudiant 		= $id_etudiant;
						$this->matricule 		= $matricule;
						$this->nom_etudiant 		= $nom_etudiant;
						$this->prenom_etudiant 		= $prenom_etudiant;
						$this->sexe 		= $sexe;
						$this->adresse_lecteur 		= $adresse_lecteur;
						$this->tel_lecteur 		= $tel_lecteur;
						$this->option_etud 		= $option_etud;
						$this->annee 		= $annee;
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_etudiant()
		{
			return $this->id_etudiant;
		}
		
		public function getMatricule()
		{
			return $this->matricule;
		}
		
		public function getNom_etudiant()
		{
			return $this->nom_etudiant;
		}
		
		
		public function getPrenom_etudiant()
		{
			return $this->prenom_etudiant;
		}
		
		public function getSexe()
		{
			return $this->sexe;
		}
		
		public function getOption_etud()
		{
			return $this->option_etud;
		}
		
		public function getAnnee()
		{
			return $this->annee;
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
		
		public function setId_etudiant($id_etudiant)
		{
			$this->id_etudiant = $id_etudiant;
		}
		
		public function setMatricule($matricule)
		{
			$this->matricule = $matricule;
		}
		
		public function setNom_etudiant($nom_etudiant)
		{
			$this->nom_etudiant = $nom_etudiant;
		}
		
		public function setPrenom_etudiant($prenom_etudiant)
		{
			$this->prenom_etudiant = $prenom_etudiant;
		}
		
		public function setSexe($sexe)
		{
			$this->sexe = $sexe;
		}
		
		public function setAnnee($annee)
		{
			$this->annee = $annee;
		}
		
		public function setOption_etud($option_etud)
		{
			$this->option_etud = $option_etud;
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

			public function connexionSiteUser($nom_etudiant,$matricule){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM etudiant WHERE nom_etudiant=? AND matricule=?");

				$request->execute(array($_POST['nom_etudiant'],$_POST['matricule']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		
		
		
		
		    public function afficheEtudiant(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM `etudiant` ");
            $requete->execute();

            return $requete;
        }
		
		
		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutEtudiant(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			$request = $bdd->prepare("SELECT * FROM `etudiant` WHERE matricule=:matricule");
			$result = $request->execute(array(
												':matricule'=>$this->matricule
											));
											
			$result=$request->fetchobject();
			
			

			//vérification pour s'avoir si l'objet existe
			if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `etudiant`(`id_etudiant`, `matricule`, `nom_etudiant`, `prenom_etudiant`, `sexe`, `adresse_lecteur`, `tel_lecteur`, `option_etud`, `annee`) VALUES (:id_etudiant,:matricule,:nom_etudiant,:prenom_etudiant,:sexe,:adresse_lecteur,:tel_lecteur,:option_etud,:annee)");

				$reponse = $request->execute(array(
													'id_etudiant'	 => NULL,			
													'matricule'	 => $this->matricule,			
													'nom_etudiant' => $this->nom_etudiant,
													'prenom_etudiant' => $this->prenom_etudiant,
													'sexe' => $this->sexe,
													'adresse_lecteur' => $this->adresse_lecteur,
													'tel_lecteur' => $this->tel_lecteur,
													
													'option_etud' => $this->option_etud,
													'annee' => $this->annee
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 }
		}


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierEtud(){
			
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `etudiant` SET `matricule`=?,`nom_etudiant`=?,`prenom_etudiant`=?,`sexe`=?,`adresse_lecteur`=?,`tel_lecteur`=?,`option_etud`=?,`annee`=? WHERE `id_etudiant`=?");
					
							
							$matricule	= $this->matricule;
							$nom_etudiant	= $this->nom_etudiant;
							$prenom_etudiant	= $this->prenom_etudiant;
							$sexe	= $this->sexe;
							$adresse_lecteur	= $this->adresse_lecteur;
							$tel_lecteur	= $this->tel_lecteur;
							
							
							$option_etud		= $this->option_etud;
							$annee		= $this->annee;
							$id_etudiant		= $this->id_etudiant;
					
					$params=array($matricule,$nom_etudiant,$prenom_etudiant,$sexe,$adresse_lecteur,$tel_lecteur,$option_etud,$annee,$id_etudiant);
					
					$request->execute($params);
			
			return $request;
		}

		
		
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_user`=commentaires.`id_user` WHERE id_commentaire=14
		public function getIdEtud($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `etudiant` WHERE id_etudiant=?");
			$params=array($code);
			$request->execute($params);
			$etud=$request->fetch();

			return $etud; 
		}
//======================================================================	
	}
	
?>