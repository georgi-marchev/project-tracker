$(document).ready(function() {
    
     $('#password, #password_confirmation').on('keyup', function() {
      
        const password = $('#password').val();
        const confirm = $('#password_confirmation').val();

        if (confirm === '') {
            $('#password-match-message').text('');
            return;
        }

        if (password === confirm) {
            $('#password-match-message')
                .text('Passwords match')
                .removeClass('text-danger')
                .addClass('text-success'); 
        } else {
            $('#password-match-message')
                .text('Passwords do not match')
                .removeClass('text-success')
                .addClass('text-danger'); 
        }
    });
});