<?php

function get_total_all_records(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');

    $statement = $db->prepare("SELECT * FROM ouvrages");
    $statement->execute();
    return $statement->rowCount();
}

function get_total_all_records_etudiants(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');

    $statement = $db->prepare("SELECT * FROM etudiant");
    $statement->execute();
    return $statement->rowCount();
}

function get_total_all_records_ouv_empr(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');

    $statement = $db->prepare('SELECT * FROM `operations` LEFT JOIN exemplaires ON operations.id_exp=exemplaires.id_exp LEFT JOIN ouvrages ON exemplaires.id_ouvrage=ouvrages.id_ouvrage LEFT JOIN auteurs ON auteurs.id_auteur=ouvrages.id_auteur LEFT JOIN categories ON categories.id_cat_ouv=ouvrages.id_cat_ouv INNER JOIN etudiant ON operations.id_etudiant=etudiant.id_etudiant LEFT JOIN compartiments ON ouvrages.id_comp=compartiments.id_comp LEFT JOIN rayon ON compartiments.id_rayon=rayon.id_rayon ORDER BY id_op DESC');
    $statement->execute();
    return $statement->rowCount();
}

function get_total_all_records_docs_empr(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');

    $statement = $db->prepare('SELECT * FROM operations_docs LEFT JOIN documents ON operations_docs.id_doc=documents.id_auteur LEFT JOIN auteurs ON documents.id_auteur=auteurs.id_auteur LEFT JOIN etudiant ON operations_docs.id_etudiant=etudiant.id_etudiant LEFT JOIN type_doc ON documents.id_type_doc=type_doc.id_type_doc LEFT JOIN d_memoire ON documents.id_dm=d_memoire.id_dm ORDER BY id_op_doc ASC');
    $statement->execute();
    return $statement->rowCount();
}

function get_total_all_records_docs(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');

    $statement = $db->prepare("SELECT * FROM documents");
    $statement->execute();
    return $statement->rowCount();
}

function get_total_all_records_mes_ouv_e(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');
$var=$_SESSION['id_etudiant'];
    $statement = $db->prepare("SELECT * FROM operations WHERE id_etudiant=$var");
    $statement->execute();
    return $statement->rowCount();
}

function get_total_all_records_exemplaires(){

    $db = new PDO('mysql:host=localhost;dbname=bibliotheque_ead;charset=utf8', 'root', '');
$var=$_SESSION['code'];
    $statement = $db->prepare("SELECT * FROM exemplaires WHERE id_ouvrage=$var");
    $statement->execute();
    return $statement->rowCount();
}

function upload_image(){
    $extension = explode(".", $_FILES['photo']['name']);
    $new_name = rand() .".".$extension[1];
    $destination = './destination/'.$new_name;
    move_uploaded_file($_FILES['photo']['tmp_name'],$destination);
    return $new_name;
}

?>