<?php

include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();

$query .= "SELECT * FROM operations_docs LEFT JOIN documents ON operations_docs.id_doc=documents.id_doc LEFT JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE documents.id_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR documents.theme_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR documents.option_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR documents.niveau_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.nom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.nom_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR etudiant.prenom_etudiant LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';

    $query .= 'OR d_memoire.nom_dm LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';


    $query .= 'OR type_doc.lib_type_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations_docs.lib_op_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    

}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_op_doc ASC ';
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

    
    $sub_array[] = $row['lib_type_doc'];
     $sub_array[] = $row['theme_doc'];
      $sub_array[] =$row['nom_auteur'];
      $sub_array[] =$row['nom_dm'];

     $sub_array[] = $row['option_doc'];
     $sub_array[] = $row['niveau_doc'];
    
     $sub_array[] ='<span><b>'.$row['lib_op_doc'].'</span></b>';
     $sub_array[] =$row['nom_etudiant'];
     
     
     
    
    
    
   
    
    
    $sub_array[] = '<button  class="btn btn-danger btn-sm btn-block suppr" id="'.$row['id_op_doc'].'" type="submit" style=""><i class="fa fa-remove"></i> ANNULER</button>';
    $data[] = $sub_array;

}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records_docs_empr(),
    "data" => $data
);

echo json_encode($output);

?>


