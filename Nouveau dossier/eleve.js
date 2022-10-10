$(document).ready(function () {

    $('#form_eleve').on('submit',function (event) {

        event.preventDefault();

        var donnee = $(this).serialize();

        $.ajax({
            url: "liste_eleve.php",
            method: "POST",
            data: donnee,
            success: function (data) {

                $('tbody').html(data);

            }
        });


    });


    $(document).on( 'submit','#form_inscrit',function (e) {

        e.preventDefault();

        var data = $(this).serialize();
        alert(data);
        $.ajax({
            url: "action_inscript.php",
            method: "POST",
            data: data,
            success: function (rep) {


                $('#info').html(rep);

            }
        });


    });


});
