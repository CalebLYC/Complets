$(function () {
    var session = false;

    $('#formLogin').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../http/login.php",
            data: {
                email: $('#email').val(),
                password:  $('#password').val(),
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                if(response.success){
                    session = true;
                    $('#displayForm').hide();
                    $('#displayDisconnect').show();
                    $('.menu').show();
                    $('.form-wrapper').hide();
                }else{
                    $('#loginError').text(response.msg);
                }
            }
        });
    });

    $('#formRegister').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../http/inscription.php",
            data: {
                username: $('#username').val(),
                email: $('#emailRegister').val(),
                password:  $('#passwordRegister').val(),
                passwordConfirm: $('#passwordConfirm').val(),
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    })

    /*$('#displayDisconnect').click(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "../config/deconnexion.php",
            data: {
                session: true
            },
            dataType: "json",
            success: function (response) {
                console.log(response);
                $('#displayDisconnect').hide();
                $('#displayForm').show();
                $('.menu').hide();
                $('.form-wrapper').show();
                session = false;
            }
        });
    });*/
});