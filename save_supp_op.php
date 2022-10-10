<?php
include('connexionBdd/connexionBdd.php');


//Selectionner tous les champs de la table "operations" pour les envoyer dans une autre table
if (isset($_POST['id'])) {


    $id = $_POST['id'];


    $bdd = connexionBdd();

    $request = $bdd->prepare("SELECT * FROM operations WHERE id_op=? ");
    $request->execute(array($id));


    $recup = $request->fetchAll();

    foreach ($recup AS $row){
        $sub_array = array();

        $sub_array['id_op'] = $row['id_op'];
        $sub_array['lib_op'] = $row['lib_op'];
        $sub_array['id_etudiant'] = $row['id_etudiant'];
        $sub_array['id_exp'] = $row['id_exp'];
        $sub_array['operation'] =$row['operation'];
        $sub_array['date_demande_op'] =$row['date_demande_op'];
        $sub_array['heure_demande_op'] =$row['heure_demande_op'];
        $sub_array['date_debut_op'] =$row['date_debut_op'];
        $sub_array['heure_debut_op'] =$row['heure_debut_op'];
        $sub_array['date_fin_op'] =$row['date_fin_op'];
        $sub_array['heure_fin_op'] =$row['heure_fin_op'];
        $sub_array['jour_op'] =$row['jour_op'];
        $sub_array['mois_op'] =$row['mois_op'];
        $sub_array['annee_op'] =$row['annee_op'];
    }


    echo json_encode($sub_array);



}