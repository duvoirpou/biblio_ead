$(document).ready(function(){

    $('#creer').click(function(){

        $('#user_form')[0].reset();
        $('.modal-title').text('Créer un user');
        $('#action').val("ajouter");
        $('#operation').val("ajouter");
        $('#image').html('');


    });

    var dataTable = $('#mydatatable').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"affiche_exemplaires.php",
            method: "POST"
        },
        "columnDefs":[
            {
                "targets": [0],
                "orderable":false
            },
        ],

        searching: false,
		ordering: false,
		lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'tout']]
    });


    $(document).on('submit','#exemplaireform', function(event){
        event.preventDefault();

        
        var id_ouvrage = $('#id_ouvrage').val();

        if(id_ouvrage != '')
        {
            $.ajax({
                url: "action_exemplaires.php",
                method: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function(data)
                {
                    $('#message').html(data);
                    $('#exemplairesform')[0].reset();
                    dataTable.ajax.reload();
                }
            })
        }
        else
        {
            $('#message').html('<h6 class="text-danger">Remplissez tous les champs</h6>');
        }

    });


    $(document).on('click', '.edit', function(){
        $('#message').html('');
        var user_id = $(this).attr("id");
        var operation = 'afficher';
        $.ajax({
            url: "action_user.php",
            method: "POST",
            data: {user_id:user_id,operation:operation},
            dataType: "JSON",
            success: function(data){

                $('#userModal').modal('show');
                $('.modal-title').text('Editer un user');
                $('#user_id').val(data.id);
                $('#noms').val(data.noms);
                $('#prenoms').val(data.prenoms);
                $('#compte_user').val(data.compte_user);
                $('#pass_user').val(data.pass_user);
                $('#type_user').val(data.type_user);
                $('#action').val("Modifier");
                $('#operation').val("modifier");
            }
        });

    });

















    $(document).on('click', '.suppr', function(){
        var id = $(this).attr("id");
        $('#id_conf').val(id);
        $('#supprModal').modal('show');
        $('#msg').html('');

    });

    $(document).on('submit', '#confirm', function (e) {
        e.preventDefault();
        $.ajax({
            url: "action_suppr_exp.php",
            method: "POST",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data){


                $('#msg').html(data);
                dataTable.ajax.reload();

            }
        });

    });

});












