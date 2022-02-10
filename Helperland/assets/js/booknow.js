$(document).ready(function () {
    $('#postal-alert').hide();
    $('.s').hide();
    // $('.nav-link').attr('disabled', true);

    // note to do tommorrow 
    // fourth page checkbox validation not working

    //after step1
    $('form.first-step-form').on("submit", function (e) {
        // postal code validation
        var that = $(this),
            url = that.attr('action'),
            type = that.attr('method'),
            data = $('form.first-step-form').serialize();
        var postalcode = $('#postalcode').val();
        if (isValidPostalCode(postalcode)) {

            // ajax 
            $.ajax({
                url: url,
                type: type,
                data: data,
                success: function (result) {
                    if(result == postalcode){
                        // switch tabs
                        switchTheTab(
                            "servicesetup-tab",
                            "scheduleplane-tab",
                            "servicesetup",
                            "scheduleplan"
                        );
                        //set Default Val
                        setDefaultValue();
                    } else {
                        $('#postal-alert').show();
                    }
                }
            });
        }
        e.preventDefault();
    });

    //after step2
    $('#submit-step2').on("click", function (e) {
        // send service data through ajax

        // if success then next tab
        switchTheTab(
            "scheduleplane-tab",
            "yourdeatil-tab",
            "scheduleplan",
            "yourdeatil"
        );
        var postalcode = $('#postalcode').val();
        $('#address-postalcode').val(postalcode);

        e.preventDefault();
    });

    // after step3
    $('#submit-step3').on("click", function (e) {

        if (isvalidAddress()) {
            // for switching the tab
            switchTheTab(
                "yourdeatil-tab",
                "makepayment-tab",
                "yourdeatil",
                "makepayment"
            );
        }
        e.preventDefault();
    });

    // after step4
    $('#submit-step4').on("click", function (e) {

        if (isAgreeTerms()) {
            console.log('Successful');
        }

        e.preventDefault();
    });

    // to set dafault value after first step
    window.payment = 54;
    window.checkCount = 3.0;
    function setDefaultValue() {
        var tomorrowDate = getTommorrowDate();
        var service_start = "8:00";
        var working_hour = '3';
        var total_payment = "54";
        var total_time = '3.0';

        // set default
        $('#service-date').val(tomorrowDate);
        $('#service-start-time').val(service_start).change();
        $('#service-hour-select').val(working_hour).change();
        $(".service-row-1 .form-check input:checkbox").prop("checked", false);
        $("#service-comments").val("");
        $("#petathome").prop("checked", false);

        // set default in payment summary
        $('.duration-date').html($('#service-date').val());
        $('.duration-time').html($('#service-start-time').val());
        $('.basic-service-hours').html($('#service-hour-select').val() + " Hrs");
        $('.total-hours').html(total_time + " Hrs");
        $('.t_payment').html(total_payment);
        $('.s').show();

        // set value in payment summary after clicks
        $('#service-date').on("click", function () {
            $('.duration-date').html($('#service-date').val());
        });
        $('#service-start-time').on("click", function () {
            $('.duration-time').html($('#service-start-time').val());
        });
        $('#service-hour-select').on("click", function () {
            window.checkCount = parseFloat($('#service-hour-select').val());
            $('.basic-service-hours').html($('#service-hour-select').val() + " Hrs");
            $('.total-hours').html(window.checkCount + " Hrs");
            window.payment = window.checkCount * 18;
            $('.t_payment').html(window.payment);
        });
        $('.t_payment').html(window.payment);
    }

    // extra service calculation
    $('.Inside-cabinets-click').on("click", function () {
        $('.t_payment').html(window.payment);
        if ($('.s1').hasClass('show-service')) {
            window.checkCount = window.checkCount - 0.5;
            window.payment = window.payment - 9;
            $('.s1').removeClass('show-service');
        } else {
            window.checkCount = window.checkCount + 0.5;
            window.payment = window.payment + 9;
            $('.s1').addClass('show-service');
        }
        $('#service-hour-select').val(window.checkCount);
        $('.t_payment').html(window.payment);
        $('.total-hours').text(window.checkCount + " Hrs");
    });
    $('.Inside-oven-click').on("click", function () {
        if ($('.s2').hasClass('show-service')) {
            $('.s2').removeClass('show-service');
            window.payment = window.payment - 9;
            window.checkCount = window.checkCount - 0.5;
        } else {
            $('.s2').addClass('show-service');
            window.payment = window.payment + 9;
            window.checkCount = window.checkCount + 0.5;
        }
        $('#service-hour-select').val(window.checkCount);
        $('.t_payment').html(window.payment);
        $('.total-hours').text(window.checkCount + " Hrs");
    });
    $('.Laundry-click').on("click", function () {
        if ($('.s3').hasClass('show-service')) {
            $('.s3').removeClass('show-service');
            window.payment = window.payment - 9;
            window.checkCount = window.checkCount - 0.5;
        } else {
            $('.s3').addClass('show-service');
            window.payment = window.payment + 9;
            window.checkCount = window.checkCount + 0.5;
        }
        $('#service-hour-select').val(window.checkCount);
        $('.t_payment').html(window.payment);
        $('.total-hours').text(window.checkCount + " Hrs");
    });
    $('.windows-click').on("click", function () {
        if ($('.s4').hasClass('show-service')) {
            $('.s4').removeClass('show-service');
            window.payment = window.payment - 9;
            window.checkCount = window.checkCount - 0.5;
        } else {
            $('.s4').addClass('show-service');
            window.payment = window.payment + 9;
            window.checkCount = window.checkCount + 0.5;
        }
        $('#service-hour-select').val(window.checkCount);
        $('.t_payment').html(window.payment);
        $('.total-hours').text(window.checkCount + " Hrs");
    });
    $('.cabinets-click').on("click", function () {
        if ($('.s5').hasClass('show-service')) {
            $('.s5').removeClass('show-service');
            window.payment = window.payment - 9;
            window.checkCount = window.checkCount - 0.5;
        } else {
            $('.s5').addClass('show-service');
            window.payment = window.payment + 9;
            window.checkCount = window.checkCount + 0.5;
        }
        $('#service-hour-select').val(window.checkCount);
        $('.t_payment').html(window.payment);
        $('.total-hours').text(window.checkCount + " Hrs");
    });
    // extra service calculation end

    // to check whether the postal code is valid
    function isValidPostalCode(postal) {
        $(".error").remove();
        var len = postal.length;
        if (len <= 0) {
            $(".postalcode-division").after("<span class='error'>Field can`t be empty</span>");
            return false;
        } else if (len != 5) {
            $(".postalcode-division").after("<span class='error'>Postal code must be 5 characters long</span>"
            );
            return false;
        } else {
            return true;
        }
    }

    // to validate third tab
    function isvalidAddress() {
        var address = $('input[name=address-radio]:checked').length;
        if (address == 0) {
            $('.add-select-radio').html("<span class='error'>You have to select one Address</span>");
            return false;
        } else {
            return true;
        }
    }

    // terms and condition agrrement
    function isAgreeTerms() {
        var terms = $('input[name=accept-terms-of-payment]:checked').length;
        if (terms == 0) {
            alert("You have to agree to terms and conditions!");
            return false;
        } else {
            return true;
        }
    }

    // to get tommorrow's date for service
    function getTommorrowDate() {
        var myDate = new Date();
        myDate.setDate(myDate.getDate() + 1);
        var dt =
            myDate.getFullYear() +
            "-" +
            ("0" + (myDate.getMonth() + 1)).slice(-2) +
            "-" +
            ("0" + myDate.getDate()).slice(-2);
        return dt;
    }

    // to move from one tab to another
    function switchTheTab(from1, to1, from2, to2) {
        // from 1
        $("." + from1).addClass("filled");
        // $("." + from1).attr("disabled",false);
        $("." + from1).removeClass("active");
        $("." + from1 + ".filled").attr("aria-selected", "false");
        $("#" + from2).removeClass("show active");

        // from 2
        $("." + to1).addClass("active");
        $("." + to1 + ".active").attr("aria-selected", "true");
        $("#" + to2).addClass("show active");
    }

    //when payment-summary-button clicked
    $(".prices-modal-button").on("click", function () {
        var payment_content = $(".side-payment-bar").html();
        var modal_body = $("#examplePaymentSummary .modal-content .modal-body");
        modal_body.html(payment_content);
        modal_body.find("#payment-header").remove();
    });

    // accordian button down and side arrow
    $(".accordion-button1").click(function () {
        $('#arrow1').toggleClass("arrow-down");
    });
    $(".accordion-button2").click(function () {
        $('#arrow2').toggleClass("arrow-down");
    });
    $(".accordion-button3").click(function () {
        $('#arrow3').toggleClass("arrow-down");
    });

    // add new address button hide and show
    $('.add-new-address-hide-btn').on("click", function () {
        $('.add-new-address-hide-btn').hide();
    });
    $('.save-address-btn').on("click", function () {
        $('.add-new-address-hide-btn').show();
    });
    $('.cancle-address-btn').on("click", function () {
        $('.add-new-address-hide-btn').show();
    });

});