<?php
include('connexionBdd/connexionBdd.php');
    //connexion à la bdd





if(isset($_POST['id_conf'])){



    $id_conf = $_POST['id_conf'];


    $bdd = connexionBdd();

    $request=$bdd->prepare("DELETE FROM exemplaires WHERE id_exp=? ");
    $request->execute(array($id_conf));

echo '<h6>Supprimé avec succès</h6>';

}