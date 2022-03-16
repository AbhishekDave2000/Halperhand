$(document).ready(function () {
    var url = 'http://localhost/Halperhand/Helperland/';

    $('#c-submit').click(function (e) {
        $('.c-submit').prop('disabled',true).html('Processing!...');
        var data = $('#first_form').serialize();
        $.ajax({
            url: url + '?controller=contact&function=insertContact',
            type: 'post',
            data: data,
            success: function (result) {
                $('.c-submit').prop('disabled',false).html('Submit');
                $(".error").remove();
                if (result == 1) {
                    window.location.href = url + '?controller=Default&function=contactpage';
                } else if (result == 2) {
                    $('.c-submit-div').before('<span class="error">file not uploaded Try Again!</span>');
                } else if (result == 3) {
                    $('.c-submit-div').before('<span class="error">Please upload valid file!</span>');
                } else {
                    $('.c-submit-div').before('<span class="error">' + result + '!</span>');
                }
            }
        });
        e.preventDefault();
    });

    function contactFormValdation() {
        var firstname = $('#c-first-name').val();
        var lastname = $('#c-last-name').val();
        var email = $('#c-email-id').val();
        var phonenumber = $('#c-phone-no').val();
        var message = $('#c-contact-message').val();
        var agreed = $('#c-agreed-terms').val();

        $(".error").remove();

        if (firstname.length < 1) {
            $('#c-first-name').after('<span class="error">This field is required</span>');
            return false;
        }

        if (lastname.length < 1) {
            $('#c-last-name').after('<span class="error">This field is required</span>');
            return false;
        }

        if (email.length < 1) {
            $('#c-email-id').after('<span class="error">This field is required</span>');
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(email);
            if (!validEmail) {
                $('#c-email-id').after('<span class="error">Enter a valid email</span>');
                return false;
            }
        }

        if (phonenumber.length < 1) {
            $('#phone-div').after('<span class="error">This field is required</span>');
            return false;

        } else if (phonenumber.length < 10 && phonenumber.length > 1) {
            $('#phone-div').after('<span class="error">Phone number is shorter than 10 numbers</span>');
            return false;
        } else {
            var regexp = /[0-9]{10}/;
            var validPhonenumber = regexp.test(phonenumber);
            if (!validPhonenumber) {
                $('#phone-div').after('<span class="error">Enter a valid Phonenumber</span>');
                return false;
            }
        }

        if (message.length < 1) {
            $('#c-contact-message').after('<span class="error">This field is required</span>');
            return false;
        }

        if (agreed == False) {
            $('#c-agreed-terms').after('<span class="error">You have to first agrre to terms and condition</span>');
            return false;
        }
    }
});