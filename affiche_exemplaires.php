<?php
session_start();
include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();
$var=$_SESSION['code'];
$query .= "SELECT exemplaires.id_ouvrage, exemplaires.id_exp, ouvrages.titre_ouvrage, exemplaires.etat_exp, exemplaires.date_achat, exemplaires.annee_pub, exemplaires.prix_achat FROM `exemplaires` JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage WHERE exemplaires.id_ouvrage=$var ";



if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_exp DESC ';
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
     $sub_array[] = $row['date_achat'];
     $sub_array[] = $row['annee_pub'];
    //  $sub_array[] =$row['prix_achat'];
     
     
    
   
    
    
    $sub_array[] = '<button  class="btn btn-danger btn-block btn-sm suppr" id="'.$row['id_exp'].'" type="submit" style=""><i class="fa fa-remove"></i> SUPPRIMER</button>
															      ';
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records_exemplaires(),
    "data" => $data
);

echo json_encode($output);