<div class="row">
    <div class="col" align="center">
        <form method="post"  class="form-inline" id="form_eleve">
            <div class="form-group">
                <label for="classe" class="control-label">classe</label>
                <select name="classe" id="classe" class="form-control">
                    <option value=""></option>
                    <option value="CE1A1">CE1A1</option>
                </select>
            </div>
            <div class="form-group">
                <label for="annee" class="control-label">Année scolaire</label>
                <select name="annee" id="annee" class="form-control">
                    <option value=""></option>
                    <option value="2018-2019">2018-2019</option>
                    <option value="2019-2020">2019-2020</option>
                </select>
            </div>
            <input type="hidden" name="valider" id="valider" value="ok">
            <div class="form-group">
                <button type="submit"  class="btn btn-primary"><i class="fa fa-check-circle"></i> valider</button>
            </div>
        </form>
    </div>
    <div class="col" align="center">
        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"><i class="fa fa-arrow-right"></i> INSCRIPTION</button>
    </div>
    <div class="col" align="center">
        <button class="btn btn-primary"><i class="fa fa-refresh"></i> INSCRIPTION</button>
    </div>
</div>

<br><br>


liste des élèves de la

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Noms</th>
                <th>Prénoms</th>
                <th>Sexe</th>
                <th>Fiche</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="exampleModalLabel">INSCRIPTION ELEVE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_inscrit">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="noms_el">Nom(s) élève :</label>
                            <input type='text' name='noms_el' class="form-control" placeholder="Nom élève" id="noms_el">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="prenoms_el">Prenom(s) élève :</label>
                            <input type='text' name='prenoms_el' placeholder="Prenom élève" class="form-control" id="prenoms_el">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nais_el">Date de naissance élève:</label>
                            <input type='date' name='nais_el' placeholder="Date de naissance élève" class="form-control" id="nais_el">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="lieu_nais">Lieu de naissance élève:</label>
                            <input type='text' name='lieu_nais' placeholder="lieu de naissance élève" class="form-control" id="lieu_nais">
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label for="sexe_el">Sexe élève: </label>
                            <select name='sexe_el' class="form-control" id="sexe_el">
                                <option value=''></option>
                                <option value='M'>Masculin</option>
                                <option value='F'>Feminin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="ad_el"> Adresse élève</label>
                            <input type='text' name='ad_el' placeholder="Adresse de l'élève"  class="form-control" id="ad_el" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="choix_el">Raison choix :</label>
                            <select name='choix_el' class="form-control" id="choix_el">
                                <option value=''></option>
                                <option value="amenagement">Aménagement proche</option>
                                <option value="qualite_enseignement">Qualié enseignement</option>
                                <option value="montant_frais_scolaire">Montant frais scolaire</option>
                                <option value="trop_de_frais_sup">Trop de frais supplémentaire</option>
                                <option value="distance_ecole_maison">Distance école maison</option>
                                <option value="autres_motifs">Autres motifs</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="cycle">Cycle</label>
                            <select name='cycle' class="form-control" id="cycle">
                                <option value=''></option>
                                <option value='garderie'>garderie</option>
                                <option value='prescolaire'>prescolaire</option>
                                <option value='primaire'>Primaire</option>
                                <option value='college'>Collège</option>
                                <option value='lycee_gleA'>Lycée gleA</option>
                                <option value='lycee_gleC'>Lycée gleC</option>
                                <option value='lycee_gleD'>Lycée gleD</option>
                                <option value='lycee_tech'>Lycée tech</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="niveau_el">S'inscrire en :</label>

                            <?PHP include('niveau.php');?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="classe_el">Classe :</label>
                            <select name="classe_el" class="form-control" id="classe_el">
                                <option value=''></option>
                                <?PHP
                                $req_cla = "SELECT * FROM classe ORDER BY id_classe";
                                $rep = $db -> query($req_cla);
                                while($row = $rep -> fetch())
                                {
                                    echo"<option value=".$row['id_classe'].">".$row['lib_classe']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="annee_scolaire">Année scolaire</label>
                            <input type='text' name='annee_scolaire' placeholder="Année scolaire" class="form-control" id="annee_scolaire" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="frequentation">Type de fréquentation</label>
                            <select name='frequentation' class="form-control" id="frequentation">
                                <option value=''></option>
                                <option value='mi_temps'>Mi-temps</option>
                                <option value='plein_temps'>Plein temps</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fr_insc">Frais d'inscription / réinscription</label>
                            <input type='text' name='fr_insc' placeholder="Frais d'inscription de l'élève" class="form-control" id="fr_insc" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="fr_let">Montant en lettre</label>
                            <input type='text' name='fr_let' placeholder="Montant frais d'inscription en lettre" class="form-control" id="fr_let" required>
                        </div>
                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">

                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fichier">Photo élève</label>
                            <input type='file' name='fichier'  id="fichier" class="form-control-file">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div id="info"></div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Inscrire</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="assets/js/eleve.js"></script>