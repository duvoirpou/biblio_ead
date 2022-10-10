$(document).ready(function(){

    $('#inscrire').click(function(){

        $('#inscrire_form')[0].reset();
        $('.modal-title').text('Inscrire un élève');
        $('#action').val("ajouter");
        $('#operation').val("ajouter");
        $('#image').html('');


    });













$(document).ready(function(){
	$('#forLoad').load('affiche_ouv_empr.html');
});


    var dataTable = $('#tabOuvr').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"affiche_ouv_empr.php",
            method: "POST"
        },
        "columnDefs":[
            {
                "targets": [0],
                "orderable":false
            },
        ],


    });






    $(document).on('click', '.suppr', function(){
        var id = $(this).attr("id");


        $.ajax({
            url: "save_supp_op.php",
            method: "POST",
            data: {id : id},
            dataType: "json",
            success: function(data){

                $('#id_conf').val(data.id_op);
                $('#lib_op').val(data.lib_op);
                $('#id_etudiant').val(data.id_etudiant);
                $('#id_ouvrage').val(data.id_ouvrage);
                $('#operation').val(data.operation);
                $('#date_demande_op').val(data.date_demande_op);
                $('#heure_demande_op').val(data.heure_demande_op);
                $('#date_debut_op').val(data.date_debut_op);
                $('#heure_debut_op').val(data.heure_debut_op);
                $('#date_fin_op').val(data.date_fin_op);
                $('#heure_fin_op').val(data.heure_fin_op);
                $('#jour_op').val(data.jour_op);
                $('#mois_op').val(data.mois_op);
                $('#annee_op').val(data.annee_op);

                $('#supprModal').modal('show');

            }
        });



    });

    $(document).on('submit', '#confirm', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "action_adm_supp_op.php",
            method: "POST",
            data: data,
            success: function(data){


                $('#msg').html(data);
                dataTable.ajax.reload();

            }
        });

    });














    $("#rechercher").keyup(function () {

        var recherche = $(this).val();
        var data = 'motclef='+recherche;
        if (recherche.length=1){

            $.ajax({
                type: 'POST',
                url:'action_inscript.php',
                data: data,
                success: function(reponse){

                    $('#resultat').html(reponse);

                }
            });

        }

    });


    /*$(document).on('click','.tuteur', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var operation = 'select';
        $.ajax({
            url:"action_inscript.php",
            method: "POST",
            data:{id:id, operation:operation},
            dataType:"JSON",
            success: function(rep){
                console.log(rep);
                $('#id_tuteur').val(rep.id_tuteur);
                $('#rechercher').val(rep.identite);
                $('#resultat').html('');

            }

        });

    });*/


    /*$(document).on('submit','#inscrire_form', function(event){
        event.preventDefault();
        var data = $(this).serialize();
        console.log(data);
        var noms_el = $('#noms_el').val();
        var prenoms_el = $('#prenoms_el').val();
        var date_naiss = $('#date_naiss').val();
        var lieu_nais = $('#lieu_nais').val();
        var sexe_el = $('#sexe_el').val();
        var adresse = $('#adresse').val();
        var choix_el = $('#choix_el').val();
        var annee_scolaire = $('#annee_scolaire').val();
        var id_cy = $('#id_cy').val();
        var id_niveau = $('#id_niveau').val();
        var id_classe = $('#id_classe').val();
        var id_freq = $('#id_freq').val();
        var fr_insc = $('#fr_insc').val();
        var fr_let = $('#fr_let').val();
        var id_tuteur = $('#id_tuteur').val();
        var extension = $('#photo').val().split('.').pop().toLowerCase();
        if(extension != '')
        {
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {

                $('#message').html('<h6 class="text-danger">Format d\'image invalide</h6>');
                $('#photo').val('');
                return false;
            }
        }


        $.ajax({
            url: "action_inscript.php",
            method: "POST",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data)
            {
                $('#message').html(data);
                // $('#inscrire_form')[0].reset();
                dataTable.ajax.reload();
            }
        })


    });


    $(document).on('click', '.edit', function(){
        $('#message').html('');
        var mat= $(this).attr("id");
        var operation = 'afficher';
        $.ajax({
            url: "action_inscript.php",
            method: "POST",
            data: {mat:mat,operation:operation},
            dataType: "JSON",
            success: function(data){

                $('#modInscrire').modal('show');
                $('.modal-title').text('Editer élève');
                $('#eleve_mat').val(data.matricule);
                $('#noms_el').val(data.noms);
                $('#prenoms_el').val(data.prenoms);
                $('#date_naiss').val(data.date_naiss);
                $('#lieu_nais').val(data.lieu_naiss);
                $('#sexe_el').val(data.sexe_el);
                $('#adresse').val(data.adresse);
                $('#choix_el').val(data.choix_el);
                $('#annee_scolaire').val(data.annee_scolaire);
                $('#image').val(data.photo);
                $('#id_cy').val(data.id_cy);
                $('#id_niveau').val(data.id_niveau);
                $('#id_classe').val(data.id_classe);
                $('#id_freq').val(data.id_freq);
                $('#id_tuteur').val(data.id_tuteur);
                $('#action').val("Modifier");
                $('#operation').val("modifier");
            }
        });

    });

    $(document).on('click', '.suppr', function(){
        var id = $(this).attr("id");
        $('#id_conf').val(id);
        $('#supprModal').modal('show');

    });

    $(document).on('click', '.suppr', function (e) {
        e.preventDefault();
        $.ajax({
            url: "affiche_ouv_emprunte.php",
            method: "POST",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data){


                $('#confirmation').html(data);
                dataTable.ajax.reload();

            }
        });

    });*/

});











