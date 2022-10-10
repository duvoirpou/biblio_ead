<?php

include('connexionBdd/connexionBdd.php');
include("function.php");

$bdd = connexionBdd();

$query = '';
$output = array();

$query .= "SELECT documents.id_doc, documents.theme_doc, documents.option_doc, documents.niveau_doc, auteurs.nom_auteur, auteurs.prenom_auteur, d_memoire.nom_dm, d_memoire.prenom_dm, d_memoire.sexe_dm, d_memoire.grade_dm, d_memoire.fonction_dm, type_doc.lib_type_doc, type_doc.id_type_doc, operations_docs.lib_op_doc, operations_docs.id_op_doc, operations_docs.id_etudiant FROM documents INNER JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN operations_docs ON documents.id_doc=operations_docs.id_doc ";

if (isset($_POST["search"]["value"])) {
    $query .= 'WHERE documents.id_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR documents.theme_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR documents.option_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR documents.niveau_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.nom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR auteurs.prenom_auteur LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR d_memoire.nom_dm LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR d_memoire.prenom_dm LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR d_memoire.sexe_dm LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR d_memoire.grade_dm LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR d_memoire.fonction_dm LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR type_doc.lib_type_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';
    $query .= 'OR operations_docs.lib_op_doc LIKE "%' . htmlentities(trim($_POST["search"]["value"])) . '%" ';


}

if (isset($_POST["order"])) {
    $query .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY id_doc DESC ';
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
    $sub_array[] = $row['prenom_auteur'].' '.$row['nom_auteur'];
     $sub_array[] =  $row['prenom_dm'].' '.$row['nom_dm'];
     $sub_array[] = $row['theme_doc'];
     $sub_array[] = $row['option_doc'];
     $sub_array[] =$row['niveau_doc'];
    
    
    $sub_array[] = '<span><b>'.$row['lib_op_doc'].'</b></span>';
   
    
    
    $sub_array[] = '<a style="text-decoration: none;" href="?c=LectModifDocs&code='.$row['id_doc'].'">
												<button  class="btn btn-primary btn-block btn-sm" type="submit" style="">EMPRUNT/RESERVATION</button>
											</a>';
    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records_docs(),
    "data" => $data
);

echo json_encode($output);




