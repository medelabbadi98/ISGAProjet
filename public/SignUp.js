var $ = jQuery;
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#btn-save').click(function(event) {
        console.log("fdfsfsf");
        $.ajax({
            url: "{{ route('Candidat.store') }}",
            type: 'Post',
            data: {
                CIN: $("cin").val(),
                Email: $("email").val(),
                Adresse: $("Adresse  ").val(),
                Mot_De_Passe: $("password").val(),
                Nom: $("nom").val(),
                Prenom: $("prenom").val(),
                Tel_C: $("tel").val(),
            },
            dataType: 'json',
            success: function(res) {
                console.log("=====  =====");
            }
        });
    });
});