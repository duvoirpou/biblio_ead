<?php 
	class operations_docs
	{
		private $id_op_doc;
		private $lib_op_doc;
		private $id_etudiant;
		private $id_doc;
		
		private $date_demande_op;
		private $heure_demande_op;
		private $date_debut_op;
		private $heure_debut_op;
		private $date_fin_op;
		private $heure_fin_op;
		private $jour_op;
		private $mois_op;
		private $annee_op;
		
		
		

		public function __construct($id_op_doc,$lib_op_doc,$id_etudiant,$id_doc,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op)
					{
						$this->id_op_doc 		= $id_op_doc;
						$this->lib_op_doc 		= $lib_op_doc;
						$this->id_etudiant 		= $id_etudiant;
						$this->id_doc 		= $id_doc;
						
						$this->date_demande_op 		= $date_demande_op;
						$this->heure_demande_op 		= $heure_demande_op;
						$this->date_debut_op 		= $date_debut_op;
						$this->heure_debut_op 		= $heure_debut_op;
						$this->date_fin_op 		= $date_fin_op;
						$this->heure_fin_op 		= $heure_fin_op;
						$this->jour_op 		= $jour_op;
						$this->mois_op 		= $mois_op;
						$this->annee_op 		= $annee_op;
						
					}

		/*LISTE DES GETTERS*/
		
		public function getId_op_doc()
		{
			return $this->id_op_doc;
		}
		
		public function getLib_op_doc()
		{
			return $this->lib_op_doc;
		}
		
		public function getId_etudiant()
		{
			return $this->id_etudiant;
		}
		
		
		
		public function getDate_demande_op()
		{
			return $this->date_demande_op;
		}
		
		public function getHeure_demande_op()
		{
			return $this->heure_demande_op;
		}
		
		public function getDate_debut_op()
		{
			return $this->date_debut_op;
		}
		
		
		public function getHeure_debut_op()
		{
			return $this->heure_debut_op;
		}
		
		public function getHeure_fin_op()
		{
			return $this->heure_fin_op;
		}
		
		
		public function getDate_fin_op()
		{
			return $this->date_fin_op;
		}
		
		
		public function getJour_op()
		{
			return $this->jour_op;
		}
		
		
		public function getMois_op()
		{
			return $this->mois_op;
		}
		
		public function getAnnee_op()
		{
			return $this->annee_op;
		}
		
		
		
public function getId_doc()
		{
			return $this->id_doc;
		}
		

		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_op_doc($id_op_doc)
		{
			$this->id_op_doc = $id_op_doc;
		}
		
		public function setLib_op_doc($lib_op_doc)
		{
			$this->lib_op_doc = $lib_op_doc;
		}
		
		public function setId_etudiant($id_etudiant)
		{
			$this->id_etudiant = $id_etudiant;
		}
		
public function setId_doc($id_doc)
		{
			$this->id_doc = $id_doc;
		}
		
		

		
		
				public function setDate_demande_op($date_demande_op)
		{
			$this->date_demande_op = $date_demande_op;
		}
		
		
		public function setHeure_demande_op($heure_demande_op)
		{
			$this->heure_demande_op = $heure_demande_op;
		}
		
		
		public function setDate_debut_op($date_debut_op)
		{
			$this->date_debut_op = $date_debut_op;
		}
		
		
		
		public function setHeure_debut_op($heure_debut_op)
		{
			$this->heure_debut_op = $heure_debut_op;
		}
		
		public function setHeure_fin_op($heure_fin_op)
		{
			$this->heure_fin_op = $heure_fin_op;
		}
		
		
		public function setDate_fin_op($date_fin_op)
		{
			$this->date_fin_op = $date_fin_op;
		}
		
		
		public function setJour_op($jour_op)
		{
			$this->jour_op = $jour_op;
		}
		
		
		public function setMois_op($mois_op)
		{
			$this->mois_op = $mois_op;
		}
		
		
		public function setAnnee_op($annee_op)
		{
			$this->annee_op = $annee_op;
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
        public function afficheOperations_docs(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM operations_docs ORDER BY id_op_doc");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteAuteurs($lib_op_doc,$id_etudiant){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM op_docs WHERE lib_op_doc=? AND id_etudiant=?");

				$request->execute(array($_POST['lib_op_doc'],$_POST['id_etudiant']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutOperations_docs(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			/*$request = $bdd->prepare("SELECT * FROM operations_docs WHERE titre_doc=:titre_doc");
			$result = $request->execute(array(
												':titre_doc'=>$this->titre_doc
											));
											
			$result=$request->fetchobject();*/
			
			

			//vérification pour s'avoir si l'objet existe
			//if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO operations_docs(id_op_doc, lib_op_doc, id_etudiant, id_doc, date_demande_op, heure_demande_op, date_debut_op, heure_debut_op, date_fin_op, heure_fin_op, jour_op, mois_op, annee_op) VALUES (:id_op_doc, :lib_op_doc, :id_etudiant, :id_doc, :date_demande_op, :heure_demande_op, :date_debut_op, :heure_debut_op, :date_fin_op, :heure_fin_op, :jour_op, :mois_op, :annee_op)");

				$reponse = $request->execute(array(
													'id_op_doc'	 => NULL,			
													'lib_op_doc' => $this->lib_op_doc,
													
													'id_etudiant' => $this->id_etudiant,
													'id_doc' => $this->id_doc,
													'date_demande_op' => $this->date_demande_op,
													'heure_demande_op' => $this->heure_demande_op,
													'date_debut_op' => $this->date_debut_op,
													'heure_debut_op' => $this->heure_debut_op,
													'date_fin_op' => $this->date_fin_op,
													'heure_fin_op' => $this->heure_fin_op,
													'jour_op' => $this->jour_op,
													'mois_op' => $this->mois_op,
													'annee_op' => $this->annee_op
													
												)); //var_dump($reponse); die();
			return $reponse;
					
			// /*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
			unset($bdd);
				 //}
		}




		//Supprimer la demande
		public function annuleDemande(){
				//connexion à la bdd
				
				$bdd = connexionBdd();
				$code=$_GET['code'];
				$request=$bdd->prepare("DELETE FROM operations_docs WHERE id_op_doc=? LIMIT 1");
				
				$params=array($code);
				
				$request->execute($params);
				
				return $request;
		}
		
		



//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierDocsEmpr(){
			 
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE operations_docs SET lib_op_doc=?,id_etudiant=?,id_doc=?,date_demande_op=?,heure_demande_op=?,date_debut_op=?,heure_debut_op=?,date_fin_op=?,heure_fin_op=?,jour_op=?,mois_op=?,annee_op=? WHERE id_op_doc=?");
					
							
							$lib_op_doc	= $this->lib_op_doc;
							$id_etudiant	= $this->id_etudiant;
							$id_doc	= $this->id_doc;
							
							$date_demande_op	= $this->date_demande_op;
							$heure_demande_op	= $this->heure_demande_op;
							$date_debut_op	= $this->date_debut_op;
							$heure_debut_op	= $this->heure_debut_op;
							$date_fin_op	= $this->date_fin_op;
							$heure_fin_op	= $this->heure_fin_op;
							$jour_op	= $this->jour_op;
							$mois_op	= $this->mois_op;
							$annee_op	= $this->annee_op;
							$id_op_doc	= $this->id_op_doc;
							
					
					$params=array($lib_op_doc,$id_etudiant,$id_doc,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op,$id_op_doc);
					
					$request->execute($params);
			
			//var_dump($request); die();
			return $request;
		}

		
		
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM user INNER JOIN commentaires ON user.id_user=commentaires.id_user WHERE id_commentaire=14
		public function getIdOp_doc($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM operations_docs WHERE id_op_doc=?");
			$params=array($code);
			$request->execute($params);
			$op_doc=$request->fetch();

			return $op_doc; 
		}
//======================================================================	
	}
	
?>