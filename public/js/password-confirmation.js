$(document).ready(function() {
    
     $('#password, #password-confirmation').on('keyup', function() {
      
        const password = $('#password').val();
        const confirm = $('#password-confirmation').val();

        console.log(password);
        console.log(confirm);

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