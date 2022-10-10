<?php

include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();

$query .= "SELECT * FROM `operations` LEFT JOIN exemplaires ON operations.id_exp=exemplaires.id_exp LEFT JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON auteurs.id_auteur=ouvrages.id_auteur LEFT JOIN categories ON categories.id_cat_ouv=ouvrages.id_cat_ouv INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE ouvrages.id_ouvrage LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR ouvrages.titre_ouvrage LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR ouvrages.resume_ouvrage LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations.lib_op LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.nom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.nom_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.prenom_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.prenom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR categories.lib_cat_ouv LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR compartiments.lib_comp LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR rayon.lib_rayon LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations.heure_demande_op LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations.date_demande_op LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations.heure_debut_op LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations.date_debut_op LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';


}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_op ASC ';
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

    //$sub_array[] = $row['id_ouvrage'];
    $sub_array[] = $row['titre_ouvrage'];
     $sub_array[] = $row['nom_auteur'];
     $sub_array[] = $row['lib_cat_ouv'];
     $sub_array[] = $row['resume_ouvrage'];
     $sub_array[] =$row['nbre_page_ouv'];
    
     
     $sub_array[] =$row['lib_comp'];
     $sub_array[] =$row['lib_rayon'];
      $sub_array[] =$row['lib_op'];
     $sub_array[] =$row['prenom_etudiant'].' '.$row['nom_etudiant'];
     $sub_array[] =$row['heure_demande_op'];
     $sub_array[] =$row['date_demande_op'];
     $sub_array[] =$row['heure_debut_op'];
     $sub_array[] =$row['date_debut_op'];
    
    
    
   
    
    
    $sub_array[] = '<button  class="btn btn-danger btn-block btn-sm suppr" id="'.$row['id_op'].'" type="submit" style=""><i class="fa fa-remove"></i> ANNULER</button>';
    $data[] = $sub_array;

}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records_ouv_empr(),
    "data" => $data
);

echo json_encode($output);

?>


