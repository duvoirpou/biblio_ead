<?php

    include('connexion.php');

    if(isset($_POST['valider']) && $_POST['valider']=='ok'){


        $classe= htmlentities($_POST['classe']);

        $annee= htmlentities($_POST['annee']);


        $req = $db->prepare("SELECT * FROM eleve WHERE classe='$classe' AND annee_scolaire='$annee' ");
        $req->execute();

        $nbr = $req->rowCount();


        $sortie = array();

        while ($data=$req->fetch()){ ?>

             $table ="<tr>
                        <td><?= $data['matricule']?></td>
                        <td><?= $data['noms']?></td>
                        <td><?= $data['prenoms']?></td>
                        <td><?= $data['sexe']?></td>
                        <td><button class="btn btn-info btn-sm">fiche</button></td>
                     </tr>";
     <?php   }


    }