<?php 
	class operations
	{
		private $id_op;
		private $lib_op;
		private $id_etudiant;
		private $id_exp;
		private $operation;
		
		private $date_demande_op;
		private $heure_demande_op;
		private $date_debut_op;
		private $heure_debut_op;
		private $date_fin_op;
		private $heure_fin_op;
		private $jour_op;
		private $mois_op;
		private $annee_op;
		
		
		

		public function __construct($id_op,$lib_op,$id_etudiant,$id_exp,$operation,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op)
					{
						$this->id_op 		= $id_op;
						$this->lib_op 		= $lib_op;
						$this->id_etudiant 		= $id_etudiant;
						$this->id_exp 		= $id_exp;
						$this->operation 		= $operation;
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
		
		public function getId_op()
		{
			return $this->id_op;
		}
		
		public function getLib_op()
		{
			return $this->lib_op;
		}
		
		public function getId_etudiant()
		{
			return $this->id_etudiant;
		}
		
		public function getOperation()
		{
			return $this->operation;
		}
		
		public function getId_exp()
		{
			return $this->id_exp;
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
		
		
		
		
		

		/*LISTE DES SETTERS*/
		
		public function setId_op($id_op)
		{
			$this->id_op = $id_op;
		}
		
		public function setNom_op($lib_op)
		{
			$this->lib_op = $lib_op;
		}
		
		public function setId_etudiant($id_etudiant)
		{
			$this->id_etudiant = $id_etudiant;
		}
		
public function setId_exp($id_exp)
		{
			$this->id_exp = $id_exp;
		}
		
		public function setOperation($operation)
		{
			$this->operation = $operation;
		}
		
		
		public function setDate_demande_op($date_demande_op)
		{
			$this->date_demande_op = $date_demande_op;
		}
		
		
		public function setHeure_demande_op($demande_demande_op)
		{
			$this->demande_demande_op = $demande_demande_op;
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
        public function afficheOperations(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare("SELECT * FROM operations ORDER BY id_op");
            $requete->execute();

            return $requete;
        }
		
		
        public function afficheOpDemEmpr(){
            $bdd = connexionBdd();
            
            $requete = $bdd->prepare('SELECT * FROM operations WHERE lib_op="demande d\'emprunt" ORDER BY id_op');
            $requete->execute();

			
			$nb_dem_emprunt = $requete -> rowCount();
			$_SESSION['nb_dem_emprunt'] = $nb_dem_emprunt;
			
            return $requete;
		
        }
		
		
        public function afficheOp(){
            $bdd = connexionBdd();
            $var=$_SESSION['id_etudiant'];
            $requete = $bdd->prepare("SELECT * FROM operations WHERE id_etudiant=$var ORDER BY id_op");
            $requete->execute();

            return $requete;
        }
		

		/*METHODE QUI PERMET DE SE CONNECTER AU SITE*/

			public function connexionSiteAuteurs($lib_op,$id_etudiant){

				$bdd = connexionBdd();

				$request = $bdd->prepare("SELECT * FROM ops WHERE lib_op=? AND id_etudiant=?");

				$request->execute(array($_POST['lib_op'],$_POST['id_etudiant']));

				$reponse = $request->fetchObject();

				return $reponse;

				/*ON DETRUIT L'OBJET CONNEXION, CE QUI FERME LA CONNEXION A LA BASE DE DONNEES*/
				unset($bdd);
		}

		

		
		/*METHODE QUI PERMET D'AJOUTER UN user*/
		public function ajoutOperations(){
			
			$bdd = connexionBdd();
			//requête pour éviter la redendance des pseudo
			/*$request = $bdd->prepare("SELECT * FROM `operations` WHERE titre_ouvrage=:titre_ouvrage");
			$result = $request->execute(array(
												':titre_ouvrage'=>$this->titre_ouvrage
											));
											
			$result=$request->fetchobject();*/
			
			

			//vérification pour s'avoir si l'objet existe
			//if(!is_object($result)){

				 $request = $bdd->prepare("INSERT INTO `operations`(`id_op`, `lib_op`, `id_etudiant`, `id_exp`, `operation`, `date_demande_op`, `heure_demande_op`, `date_debut_op`, `heure_debut_op`, `date_fin_op`, `heure_fin_op`, `jour_op`, `mois_op`, `annee_op`) VALUES (:id_op,:lib_op,:id_etudiant,:id_exp,:operation,:date_demande_op,:heure_demande_op,:date_debut_op,:heure_debut_op,:date_fin_op,:heure_fin_op,:jour_op,:mois_op,:annee_op)");

				$reponse = $request->execute(array(
													'id_op'	 => NULL,			
													'lib_op' => $this->lib_op,
													
													'id_etudiant' => $this->id_etudiant,
													'id_exp' => $this->id_exp,
													'operation' => $this->operation,
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


//METHODE QUI PERMET DE MODIFIER LE MEMBRE/ETUDIANT
		public function ModifierOuvEmpr(){
			//if($this->photo==""){
					$bdd = connexionBdd();
					$request=$bdd->prepare("UPDATE `operations` SET `lib_op`=?,`id_etudiant`=?,`id_exp`=?,`operation`=?,`date_demande_op`=?,`heure_demande_op`=?,`date_debut_op`=?,`heure_debut_op`=?,`date_fin_op`=?,`heure_fin_op`=?,`jour_op`=?,`mois_op`=?,`annee_op`=? WHERE `id_op`=?");
					
							
							$lib_op	= $this->lib_op;
							$id_etudiant	= $this->id_etudiant;
							$id_exp	= $this->id_exp;
							$operation	= $this->operation;
							$date_demande_op	= $this->date_demande_op;
							$heure_demande_op	= $this->heure_demande_op;
							$date_debut_op	= $this->date_debut_op;
							$heure_debut_op	= $this->heure_debut_op;
							$date_fin_op	= $this->date_fin_op;
							$heure_fin_op	= $this->heure_fin_op;
							$jour_op	= $this->jour_op;
							$mois_op	= $this->mois_op;
							$annee_op	= $this->annee_op;
							$id_op	= $this->id_op;
							
					
					$params=array($lib_op,$id_etudiant,$id_exp,$operation,$date_demande_op,$heure_demande_op,$date_debut_op,$heure_debut_op,$date_fin_op,$heure_fin_op,$jour_op,$mois_op,$annee_op,$id_op);
					
					$request->execute($params);
			/*}else{
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
				
				
			}*/
			//var_dump($request); die();
			return $request;
		}

		
		//Supprimer la demande
		public function annulerDemande(){
				//connexion à la bdd
				
				$bdd = connexionBdd();
				$code=$_GET['code'];
				$request=$bdd->prepare("DELETE FROM operations WHERE id_op=? LIMIT 1");
				
				$params=array($code);
				
				$request->execute($params);
				
				return $request;
		}
		
		
		
		
		//RECUPERER UN MEMBRE PAR L'ID          SELECT * FROM `user` INNER JOIN commentaires ON user.`id_user`=commentaires.`id_user` WHERE id_commentaire=14
		public function getIdOp($code){
			$bdd =  connexionBdd();
			$request=$bdd->prepare("SELECT * FROM `operations` WHERE id_op=?");
			$params=array($code);
			$request->execute($params);
			$op=$request->fetch();

			return $op; 
		}
		
		
		
		public function getIdOperations($code){
			$bdd =  connexionBdd();
			$var=$_SESSION['id_etudiant'];
			$request=$bdd->prepare("SELECT * FROM `operations` WHERE id_exp=? AND id_etudiant=$var AND operation='1'");
			$params=array($code);
			$request->execute($params);
			$op=$request->fetch();

			return $op; 
		}
//======================================================================	
	}
	
?>