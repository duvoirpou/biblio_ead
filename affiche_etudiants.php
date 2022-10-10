<?php

include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();

$query .= "SELECT * FROM `etudiant` ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE etudiant.id_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.matricule LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.nom_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.prenom_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.sexe LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.adresse_lecteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.tel_lecteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
   


}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_etudiant DESC ';
}

if ($_POST["length"] != -1) {

    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];

}

$statement = $bdd->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach ($result AS $row) {


    $sub_array = array();

    $sub_array[] = $row['nom_etudiant'];
    $sub_array[] = $row['prenom_etudiant'];
    
     $sub_array[] = $row['sexe'];
     $sub_array[] = $row['adresse_lecteur'];
     $sub_array[] =$row['tel_lecteur'];
     
    
    
   
    
    
    $sub_array[] = '<a class="lien" style="text-decoration: none;" href="?c=modifEtud&code='.$row['id_etudiant'].'">
																<button  class="btn btn-primary btn-block btn-sm" type="submit" style=" margin-bottom: 10px"><i class="fa fa-edit"></i> MODIFIER</button>
															</a>
                    
																<button  class="btn btn-danger btn-block btn-sm suppr" id="'.$row['id_etudiant'].'" type="submit" style=""><i class="fa fa-remove"></i> SUPPRIMER</button>
															                                       
                                                            
                                                            ';
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records_etudiants(),
    "data" => $data
);

echo json_encode($output);




