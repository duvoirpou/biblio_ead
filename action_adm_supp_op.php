<?php

include('connexionBdd/connexionBdd.php');
//connexion à la bdd



//supprimer les Demandes, emprunts et reservations

if (isset($_POST['id_conf'])) {


    $id_conf = $_POST['id_conf'];


     $id_op = $_POST['id_conf'];
     $lib_op = $_POST['lib_op'];
     $id_etudiant = $_POST['id_etudiant'];
     $id_exp = $_POST['id_exp'];
     $operation = $_POST['operation'];

     $date_demande_op = $_POST['date_demande_op'];
     $heure_demande_op = $_POST['heure_demande_op'];
     $date_debut_op = $_POST['date_debut_op'];
     $heure_debut_op = $_POST['heure_debut_op'];
     $date_fin_op = $_POST['date_fin_op'];
     $heure_fin_op = $_POST['heure_fin_op'];
     $jour_op = $_POST['jour_op'];
     $mois_op = $_POST['mois_op'];
     $annee_op = $_POST['annee_op'];


    $bdd = connexionBdd();



    $requ = $bdd->prepare("INSERT INTO `operations_annulees`(`id_op_annul`, `id_op`, `lib_op`, `id_etudiant`, `id_exp`, `operation`, `date_demande_op`, `heure_demande_op`, `date_debut_op`, `heure_debut_op`, `date_fin_op`, `heure_fin_op`, `jour_op`, `mois_op`, `annee_op`) VALUES (:id_op_annul,:id_op,:lib_op,:id_etudiant,:id_exp,:operation,:date_demande_op,:heure_demande_op,:date_debut_op,:heure_debut_op,:date_fin_op,:heure_fin_op,:jour_op,:mois_op,:annee_op)");

    $reponse = $requ->execute(array(
        'id_op_annul'	 => NULL,
        'id_op'	 => $id_conf,
        'lib_op' => $lib_op,

        'id_etudiant' => $id_etudiant,
        'id_exp' => $id_exp,
        'operation' => $operation,
        'date_demande_op' => $date_demande_op,
        'heure_demande_op' => $heure_demande_op,
        'date_debut_op' => $date_debut_op,
        'heure_debut_op' => $heure_debut_op,
        'date_fin_op' => $date_fin_op,
        'heure_fin_op' => $heure_fin_op,
        'jour_op' => $jour_op,
        'mois_op' => $mois_op,
        'annee_op' => $annee_op

    ));





    $request = $bdd->prepare("DELETE FROM operations WHERE id_op=? ");
    $request->execute(array($id_conf));

    echo '<h6>Opération annulée avec succès</h6>';

}









