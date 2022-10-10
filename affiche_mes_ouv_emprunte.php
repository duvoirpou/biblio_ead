<?php

include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();
$var=$_SESSION['id_etudiant'];
$query .= "SELECT * FROM ouvrages INNER JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur INNER JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv INNER JOIN operations ON ouvrages.id_ouvrage=operations.id_ouvrage WHERE lib_op='emprunt&eacute;' AND id_etudiant=$var ";

if (isset($_POST["search"]["value"])) {
    $query .= 'AND ouvrages.id_ouvrage LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR ouvrages.titre_ouvrage LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR ouvrages.resume_ouvrage LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR operations.lib_op LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR auteurs.nom_auteur LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR auteurs.prenom_auteur LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR categories.lib_cat_ouv LIKE "%' . $_POST["search"]["value"] . '%" ';


}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_op DESC ';
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

    $sub_array[] = $row['id_ouvrage'];
    $sub_array[] = $row['titre_ouvrage'];
     $sub_array[] = $row['nom_auteur'];
     $sub_array[] = $row['lib_cat_ouv'];
     $sub_array[] = $row['resume_ouvrage'];
     $sub_array[] =$row['nbre_page_ouv'];
    
    
    $sub_array[] = '<span class="text-info"><b>'.$row['lib_op'].'</b></span>';
   
    
    
    
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records_mes_ouv_e(),
    "data" => $data
);

echo json_encode($output);

?>


