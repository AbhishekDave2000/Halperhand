$(document).ready(function () {
    var url = 'http://localhost/Halperhand/Helperland/';
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

        if (password.length < 1) {
            $('#password').after('<span class="error">This field is required</span>');
            return false;
        } else if (password.length > 1 && password.length < 7) {
            $('#password').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }

        if (cpassword.length < 1) {
            $('#cpassword').after('<span class="error">This field is required</span>');
            return false;
        } else if (cpassword.length > 1 && cpassword.length < 7) {
            $('#cpassword').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }

        if (password != cpassword) {
            $('.pass').after('<span class="error">Both Passwords must be same!</span>');
            return false;
        }

        if (!agreed) {
            $('.agree-div').after('<span class="error">You have to first agree to our terms and condition!</span>');
            return false;
        }

    });

    $('#login-btn').on('click', function (e) {
        var data = $('#login-form-modal').serialize();
        if (loginValidate() != false) {
            $.ajax({
                url: url + '?controller=Authentication&function=Login',
                type: 'post',
                data: data,
                success: function (result) {
                    $(".error").remove();
                    if (result == 1) {
                        window.location.href = "http://localhost/Halperhand/Helperland/";
                    } else if (result == 2) {
                        $('#login-btn').before('<span class="error">You are not approved wait till you get approval!</span>');
                    } else if (result == 3) {
                        $('#login-btn').before('<span class="error">Incorrect email or password please try again with correct ones!</span>');
                    } else {
                        $('#login-btn').before('<span class="error">Something Went Wrong!</span>');
                    }
                }
            });
        }
        e.preventDefault();
    });

    $('#E-send').click(function (e) {
        var data = $('.SendEmail-Form').serialize();
        $(".error").remove();
        $('#E-send').html("Sending Mail!...").attr('disabled', true);
        if (emailSendvalidate() != false) {
            $.ajax({
                url: url + '?controller=Authentication&function=forgotPassword',
                type: 'post',
                data: data,
                success: function (result) {
                    if (result == 1) {
                        $('#E-send').html("Send").attr('disabled', false);
                        window.location.href = "http://localhost/Halperhand/Helperland/";
                    } else if (result == 2) {
                        $('#F-send-Email').after('<span class="error">This email is not registered!</span>');
                    } else {
                        alert("Something Went Wrong!");
                    }
                }
            });
        }
        e.preventDefault();
    });

    $('#set-new-Pass-btn').click(function (e) {
        var data = $('.setPassForm').serialize();
        var para = $('.forgotpage-parameter').html();
        if (newPasswordValidate() != false) {
            $.ajax({
                url: url + '?controller=Authentication&function=setPass&parameter=' + para,
                type: 'post',
                data: data,
                success: function (result) {
                    if (result == 1) {
                        window.location.href = "http://localhost/Halperhand/Helperland/";
                    }
                    else if (result == 2) {
                        $('#set-new-Pass-btn').before('<span class="error">Password did not change try again!</span>');
                    } else if (result == 3) {
                        $('#set-new-Pass-btn').before('<span class="error">Enter Same passwords in both fields!</span>');
                    } else {
                        alert('Something Went Wrong!');
                    }
                }
            });
        }
        e.preventDefault();
    });

    function newPasswordValidate() {
        var newpass = $('#set-new-Pass').val();
        var newcpass = $('#set-confirm-Pass').val();

        $(".error").remove();

        if (newpass.length < 1) {
            $('#set-new-Pass').after('<span class="error">This field is required</span>');
            return false;
        } else if (newpass.length > 1 && newpass.length < 7) {
            $('#set-new-Pass').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }

        if (newcpass.length < 1) {
            $('#set-confirm-Pass').after('<span class="error">This field is required</span>');
            return false;
        } else if (newcpass.length > 1 && newcpass.length < 7) {
            $('#set-confirm-Pass').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }

        if (newpass != newcpass) {
            $('.pass').after('<span class="error">Both Passwords must be same!</span>');
            return false;
        }
    }

    function emailSendvalidate() {
        var Semail = $('#F-send-Email').val();
        $(".error").remove();

        if (Semail.length < 1) {
            $('#F-send-Email').after('<span class="error">This field is required</span>');
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(Semail);
            if (!validEmail) {
                $('#F-send-Email').after('<span class="error">Enter a valid email</span>');
                return false;
            }
        }
    }

    function loginValidate() {
        var Lemail = $('#login-Email').val();
        var Lpass = $('#login-Password').val();
        $(".error").remove();
        if (Lemail.length < 1) {
            $('#login-Email').after('<span class="error">This field is required</span>');
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(Lemail);
            if (!validEmail) {
                $('#login-Email').after('<span class="error">Enter a valid email</span>');
                return false;
            }
        }
        if (Lpass.length <= 0) {
            $('#login-Password').after('<span class="error">This field is required</span>');
            return false;
        } else if (Lpass.length > 1 && Lpass.length < 7) {
            $('#login-Password').after('<span class="error">Password must be greater than 8 character!</span>');
            return false;
        }
    }
});