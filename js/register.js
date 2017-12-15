$(function () {

    // Use AJAX to verify that the email address provided has not been used previously.
    $('#email').keyup(function () {
        $.post('server/emailAction.php', {
            email: $('#email').val()
        },
        function (data, status) {
            $('#emailGroup').removeClass('has-success has-error');

            if ($('#email').val() === '') {
                $('#emailBlock').html('');
                $('#emailGroup').removeClass('has-success has-error');
                $('#register').prop('disabled', false);
            } else if (data == 1) {
                $('#emailBlock').html('Account available!');
                $('#emailGroup').addClass('has-success');
                $('#register').prop('disabled', false);
            } else {
                $('#emailBlock').html('There is already an account with this email address.');
                $('#emailGroup').addClass('has-error');
                $('#register').prop('disabled', true);
            }
        });
    });

    // Verify that the confirmed password matches the original password, on keyup event.
    $('#confirmed').keyup(function () {
        var lastIndex = $(this).val().length - 1;

        $('#passwordGroup').removeClass('has-error');
        $('#confirmedGroup').removeClass('has-error');

        if ($(this).val().charAt(lastIndex) !== $('#password').val().charAt(lastIndex)) {
            $('#confirmedBlock').html('Password entries do not match!');
            $('#passwordGroup').addClass('has-error');
            $('#confirmedGroup').addClass('has-error');
            $('#register').prop('disabled', true);
        } else {
            $('#confirmedBlock').html('');
            $('#register').prop('disabled', false);
        }
    });
});