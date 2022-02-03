$(document).ready(function () {

    $('#submit').click(function () {

        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var phonenumber = $('#phone').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        var agreed = $('#agreed:checked').length;

        $(".error").remove();

        if (firstname.length < 1) {
            $('#firstname').after('<span class="error">This field is required</span>');
            return false;
        }

        if (lastname.length < 1) {
            $('#lastname').after('<span class="error">This field is required</span>');
            return false;
        }

        if (email.length < 1) {
            $('#email').after('<span class="error">This field is required</span>');
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(email);
            if (!validEmail) {
                $('#email').after('<span class="error">Enter a valid email</span>');
                return false;
            }
        }
        
        if(phonenumber.length < 1){
            $('#phone-div').after('<span class="error">This field is required</span>');
            return false;
        }else if (phonenumber.length < 10 && phonenumber.length > 1) {
            $('#phone-div').after('<span class="error">Phone number is shorter than 10 numbers</span>');
            return false;
        }else{
            var regexp = /[0-9]{10}/;
            var validPhonenumber = regexp.test(phonenumber);
            if (!validPhonenumber) {
                $('#phone-div').after('<span class="error">Enter a valid Phonenumber</span>');
                return false;
            }
        }

        if(password.length < 1){
            $('#password').after('<span class="error">This field is required</span>');
            return false;
        }else if(password.length > 1 && password.length <7){
            $('#password').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }

        if(cpassword.length < 1){
            $('#cpassword').after('<span class="error">This field is required</span>');
            return false;
        }else if(cpassword.length > 1 && cpassword.length <7){
            $('#cpassword').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }

        if(password != cpassword){
            $('.pass').after('<span class="error">Both Passwords must be same!</span>');
            return false;
        }

        if(!agreed){
            $('.agree-div').after('<span class="error">You have to first agree to our terms and condition!</span>');
            return false;
        }

    });
});