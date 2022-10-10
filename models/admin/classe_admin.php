<?php 
	class admin
	{
		private $id_admin;
		private $nom_admin;
		private $mp_admin;
		

		public function __construct($id_admin,$nom_admin,$mp_admin)
					{
						$this->id_admin 		= $id_admin;
						$this->nom_admin 		= $nom_admin;
						$this->mp_admin 		= $mp_admin;
						
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_admin()
		{
			return $this->id_admin;
		}
		
		public function getNom_admin()
		{
			return $this->nom_admin;
		}
		
		public function getMp_admin()
		{
			return $this->mp_admin;
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

			public function connexionSiteAdmin($mp_admin,$nom_admin){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM admin WHERE nom_admin=? AND mp_admin=?");

				$request->execute(array($_POST['nom_admin'],$_POST['mp_admin']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		
		
		
		
		
//======================================================================	
	}
	
?>