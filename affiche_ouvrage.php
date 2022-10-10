<?php

include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();

$query .= "SELECT ouvrages.`id_ouvrage`, ouvrages.titre_ouvrage, ouvrages.resume_ouvrage, ouvrages.nbre_page_ouv, auteurs.nom_auteur, auteurs.prenom_auteur, categories.lib_cat_ouv, compartiments.lib_comp, rayon.lib_rayon FROM `ouvrages` INNER JOIN auteurs ON ouvrages.id_auteur=auteurs.id_auteur INNER JOIN categories ON ouvrages.id_cat_ouv=categories.id_cat_ouv LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE ouvrages.id_ouvrage LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR ouvrages.titre_ouvrage LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR ouvrages.resume_ouvrage LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.nom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.prenom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR categories.lib_cat_ouv LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';


}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_ouvrage DESC ';
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
     $sub_array[] = $row['prenom_auteur'].' '.$row['nom_auteur'];
     $sub_array[] = $row['lib_cat_ouv'];
     $sub_array[] = $row['resume_ouvrage'];
     $sub_array[] =$row['nbre_page_ouv'];
    
    
    
    
    
    $sub_array[] = '<a style="text-decoration: none;" href="?c=LectModifOuv&code='.$row['id_ouvrage'].'">
												<button class="btn btn-primary btn-sm btn-block" type="submit" style="">Cliquez ici</button>
											</a>';
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data" => $data
);

echo json_encode($output);




