<?php
include('connexionBdd/connexionBdd.php');
include('function.php');


    if(isset($_POST['ajoutE'])){


        $req = $bdd->prepare("INSERT INTO `exemplaires`(`id_exp`, `etat_exp`, `date_achat`, `annee_pub`, `prix_achat`, `id_ouvrage`) VALUES (:id_exp, :etat_exp, :date_achat, :annee_pub, :prix_achat, :id_ouvrage)");
        $action = $req->execute(array(
            ':id_exp' => NULL,
													':etat_exp' => $_POST["etat_exp"],
													':date_achat' => $_POST["date_achat"],
													':annee_pub' =>  $_POST["annee_pub"],
													':prix_achat' => $_POST["prix_achat"],
													':id_ouvrage' => $_POST["id_ouvrage"]
        ));

        if(!empty($action)){

            echo "<h6 class='text-success'>enregistrement effectué</h6>";
        }
    }