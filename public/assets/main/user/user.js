/**
 * Script pour la verification des enregistrements des utilisateur
 */

$('#register-user').click(function () {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirm = $('#password-confirm').val();
    var passwordLength = password.length;
    var agreeTerms = $('#agreeTerms');

    if (firstname != "" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(firstname)) {
        $('#firstname').removeClass('is-invalid');
        $('#firstname').addClass('is-valid');
        $('#error-register-firstname').text("");
        alert('Working');

        if (lastname != "" && /^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(lastname)) {
            $('#lastname').removeClass('is-invalid');
            $('#lastname').addClass('is-valid');
            $('#error-register-lastname').text("");
            alert('Working');

            if (email != "" && /^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email)) {
                $('#email').removeClass('is-invalid');
                $('#email').addClass('is-valid');
                $('#error-register-email').text("");
                alert('Working');

                if (passwordLength >= 8) {
                    $('#password').removeClass('is-invalid');
                    $('#password').addClass('is-valid');
                    $('#error-register-password').text("");
                    alert('Working');

                    if (password == password_confirm) {
                        $('#password-confirm').removeClass('is-invalid');
                        $('#password-confirm').addClass('is-valid');
                        $('#error-register-password-confirm').text("");
                        alert('Working');

                        if (agreeTerms.is(': checked')) {
                            $('#agreeTerms').removeClass('is-invalid');
                            $('#error-register-agreeTerms').text("");

                            // envoie du formulaire
                            //alert('data-ok');

                            var res = emailExitJS(email);

                            if (res != "exist") {
                                $('#form-register').submit()
                            } else {
                                $('#email').addClass('is-invalid');
                                $('#email').removeClass('is-valid');
                                $('#error-register-email').text("This email address is already used !");
                            }

                            /*(res != "exist") ? $('#form-register').submit()
                                : ($('#email').addClass('is-invalid'),
                            $('#email').removeClass('is-valid'),
                            $('#error-register-email').text("This email address is already used !"));

                            /**
                             * condition ternaire
                             * (condition) ? vraie : fausse;
                             * condition avec plusieurs instructions
                             * (condition) ? vraie (instr1, instr2) : fausse (instr1, instr2);
                             */

                        } else {
                            $('#agreeTerms').addClass('is-invalid');
                            $('#error-register-agreeTerms').text("You should agree to out terms and conditions");
                        }

                    } else {
                        $('#password-confirm').addClass('is-invalid');
                        $('#password-confirm').removeClass('is-valid');
                        $('#error-register-password-confirm').text("Passwords must be identical");
                    }
                } else {
                    $('#password').addClass('is-invalid');
                    $('#password').removeClass('is-valid');
                    $('#error-register-password').text("Password must be at last 8 characteres");
                }
            } else {
                $('#email').addClass('is-invalid');
                $('#email').removeClass('is-valid');
                $('#error-register-email').text("Email is not valid");
            }
        } else {
            $('#lastname').addClass('is-invalid');
            $('#lastname').removeClass('is-valid');
            $('#error-register-lastname').text("Last Name is not valid");
        }
    } else {
        $('#firstname').addClass('is-invalid');
        $('#firstname').removeClass('is-valid');
        $('#error-register-firstname').text("First Name is not valid");
    }
});

// Evènement pour les termes et conditions

$('#agreeTerms').change(function () {
    var agreeTerms = $('#agreeTerms');

    if (agreeTerms.is(': checked')) {
        $('#agreeTerms').removeClass('is-invalid');
        $('#error-register-agreeTerms').text("");
    } else {
        $('#agreeTerms').addClass('is-invalid');
        $('#error-register-agreeTerms').text("You should agree to out terms and conditions");
    }
});

function emailExitJS(email) {
    var url = $('#email').attr('url-emailExist');
    var token = $('#email').attr('token');
    var res = "";

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            '_token': token,
            email: email
        },
        success: function (result) {
            res = result.response;
        },
        async: false
    });

    return res;
}
