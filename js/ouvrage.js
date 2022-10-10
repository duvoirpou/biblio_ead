$(document).ready(function(){

    $('#creer').click(function(){

        $('#user_form')[0].reset();
        $('.modal-title').text('Créer un user');
        $('#action').val("ajouter");
        $('#operation').val("ajouter");
        $('#image').html('');


    });

    var dataTable = $('#tContact').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax":{
            url:"?c=AdmlisteOuv",
            method: "POST"
        },
        "columnDefs":[
            {
                "target": [0,5,6],
                "orderable":false
            },
        ],


    });


    $(document).on('submit','#user_form', function(event){
        event.preventDefault();

        var nom = $('#noms').val();
        var prenom = $('#prenoms').val();
        var compte_user = $('#compte_user').val();
        var pass_user = $('#pass_user').val();
        var type_user = $('#type_user').val();

        if(nom != '' && prenom != '' && compte_user != '' && pass_user != '' && type_user != '')
        {
            $.ajax({
                url: "action_user.php",
                method: "POST",
                data: new FormData(this),
                contentType:false,
                processData:false,
                success: function(data)
                {
                    $('#message').html(data);
                    $('#user_form')[0].reset();
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

    });

    $(document).on('submit', '#confirm', function (e) {
        e.preventDefault();
        $.ajax({
            url: "action_user.php",
            method: "POST",
            data: new FormData(this),
            contentType:false,
            processData:false,
            success: function(data){


                $('#confirmation').html(data);
                dataTable.ajax.reload();

            }
        });

    });

});












