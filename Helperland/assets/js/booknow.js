$(document).ready(function () {

    $('#s1,#s2,#s3,#s4,#s5,#postal-alert,.s').hide();
    
    function setClickableOnNavTabs() {
        var clslist = document.getElementById("myTab").getElementsByClassName("nav-link");
        for (var i = 0; i < clslist.length; i++) {
            if (clslist[i].classList.contains("filled")) {
                clslist[i].style.pointerEvents = "auto";
            } else {
                clslist[i].style.pointerEvents = "none";
            }
        }
    }
    $(".nav-link").on("click", function () {
        var navtabs = ["servicesetup-tab", "scheduleplane-tab", "yourdeatil-tab", "makepayment-tab"];
        for (var i = 0; i < navtabs.length; i++) {
            if (!$(this).is($("." + navtabs[i]))) {
                if (i >= navtabs.indexOf(this.className.split(" ")[0])) {
                    $("." + navtabs[i]).removeClass("filled");
                }
            }
        }
        setClickableOnNavTabs();
    });

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
                    // alert(result);
                    len = result.length;
                    if (result == postalcode) {
                        // switch tabs
                        switchTheTab(
                            "servicesetup-tab",
                            "scheduleplane-tab",
                            "servicesetup",
                            "scheduleplan"
                        );
                        $('#postal-alert').hide();
                        //set Default Val
                        setDefaultValue();
                    } else if (len > 10) {
                        alert(result);
                    } else {
                        $('#postal-alert').show();
                    }
                }

            });
        }
        e.preventDefault();
        setClickableOnNavTabs();
    });

    //after step2
    $('#submit-step2').on("click", function (e) {
        //set default of next tab
        setThirdTabDefault();
        // if success then next tab
        switchTheTab(
            "scheduleplane-tab",
            "yourdeatil-tab",
            "scheduleplan",
            "yourdeatil"
        );


        var sess_var = $('#user-session-val').text();
        var postalcode = $('#postalcode').val();
        $.ajax({
            url: "localhost/Halperhand/Helperland/?controller=booknow&function=getUserAddress",
            type: "post",
            data: {
                userid: sess_var,
                postal: postalcode
            },
            success: function (result) {
                var address = JSON.parse(result);
                showAddress(address);
            }
        });

        $('.save-address-btn').on("click", function (e) {
            if (ValidateAddressForm()) {
                var stnm = $('#stnm').val();
                var housenm = $('#housenm').val();
                var citynm = $('#citynm').val();
                var phnm = $('#phnm').val();
                var email = $('#useremailid').val();
                $.ajax({
                    url: "localhost/Halperhand/Helperland/?controller=booknow&function=addNewAddress",
                    type: "post",
                    data: {
                        userid: sess_var,
                        street: stnm,
                        house: housenm,
                        city: citynm,
                        phone: phnm,
                        postal: postalcode,
                        email: email
                    },
                    success: function (result) {
                        if (result) {
                            var address = JSON.parse(result);
                            showAddress(address);
                        } else {
                            alert('result is not added!');
                        }
                    }
                });
            }
            e.preventDefault();
        });
        $('#customer-user-input-id').val(sess_var);
        $.ajax({
            url: "localhost/Halperhand/Helperland/?controller=booknow&function=getFavPros",
            type: "post",
            data: {
                userid: sess_var
            },
            success: function (result) {
                var Pros = JSON.parse(result);
                providerhtml = "";
                Pros.forEach(function (dt) {
                    providerhtml += `<div class="form-check avatar-card-select mr-1">
                                        <input class="form-check-input" type="radio" value="${dt.UserId}" id="fav-pro-${dt.UserId}" name="favrioute-provider">
                                        <label class="form-check-label" for="fav-pro-${dt.UserId}">
                                            <div class="avatar-pro">
                                                <img src="assets/Img/bookservice/cap.png" alt="">
                                            </div>
                                            <span class="avatar-pro-name">${dt.FirstName + " " + dt.LastName}</span>
                                            <p class="select-pro-btn">Select</p>
                                        </label>
                                    </div>`;
                });
                $('.fav-pro-main-div').html(providerhtml);
            }
        });
        e.preventDefault();
        setClickableOnNavTabs();
    });

    // after step3
    $('#submit-step3').on("click", function (e) {

        if (isvalidAddress()) {
            // for switching the tab
            switchTheTab("yourdeatil-tab", "makepayment-tab", "yourdeatil", "makepayment");
        }
        e.preventDefault();
        setClickableOnNavTabs();
    });

    // after step4
    $('#submit-step4').click(function (e) {
        if (isAgreeTerms()) {
            $('#submit-step4').text("Processing...").prop('disabled', true);
            var data = $('#postal-Form, .Schedule-form, .your-detail-form').serialize();
            $.ajax({
                url: "localhost/Halperhand/Helperland/?controller=booknow&function=addServiceRequest",
                type: "post",
                data: data,
                success: function (result) {
                    if (result == 0) {
                        $('#complete-booking-modal').modal("show");
                        $('#book-success-msg,.cb-logo,.service-request-show-div').hide();
                        $('#book-fail-msg,.cb-logo-fail').show();
                        $('#submit-step4').text("Complete Booking").prop('disabled', false);
                    } else if (result != 0) {
                        $('#complete-booking-modal').modal("show");
                        $('#book-fail-msg,.cb-logo-fail,.c-b-m-close-btn').hide();
                        $('#book-success-msg,.cb-logo,.service-request-show-div').show();
                        $('#submit-step4').text("Complete Booking").prop('disabled', false);
                        $('#s-r-id').text(result);
                        $('#booking-ok-btn').on("click", function () {
                            window.location.href = "?controller=Default&function=BookNowpage";
                        });
                    } else {
                        alert("Something went wrong! Try Agian!");
                    }
                }
            });
        }
        e.preventDefault();
        setClickableOnNavTabs();
    });

    // show address function
    function showAddress(address) {
        html = "";
        address.forEach(function (dt) {
            var check = "";
            if (dt.IsDefault == 1) {
                check = "checked";
            }
            html += `<div class="container address-detail">
                                <input type="radio" name="address-radio" class="radio-btn-address" value="${dt.AddressId}" ${check}>
                                <div class="container detail-of-address">
                                    <span><strong>Address : </strong><span class="addressline1-2">${dt.AddressLine1}  ${dt.AddressLine2}</span></span><br>
                                    <span><strong>Phone Numebr :</strong><span class="address-phone-no">${dt.Mobile}</span></span>
                                </div>
                            </div>`;
        });
        $('#address-div-wrap').html(html);
    }

    // to set dafault value after first step
    window.payment = 54;
    window.checkCount = 3.0;
    function setDefaultValue() {

        var tomorrowDate = getTommorrowDate();
        var service_start = "8.0";
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
        ectracheck();

        // set value in payment summary after clicks
        $('#service-date,#service-start-time').on("click", function () {
            $('.duration-date').html($('#service-date').val());
            $('.duration-time').html($('#service-start-time').val());
        });
        $('.extra-check-box,#service-hour-select,#service-start-time').each(function () {
            var $that = $(this);
            $that.click(function () {

                // same class
                var values = [];
                $('.extra-check-box').each(function () {
                    var $this = $(this);
                    if ($this.is(':checked')) {
                        values.push($this.val());
                    }
                });
                extra_service_time = parseFloat(values.length / 2);
                service_start_time = $('#service-start-time').val();
                select_service_hours = parseFloat($('#service-hour-select').val());
                total_service_hours = select_service_hours + extra_service_time;
                total_payment = parseFloat(total_service_hours) * 18;
                service_end_time = parseFloat(service_start_time) + select_service_hours + extra_service_time;

                $('.total-hours').text(parseFloat(total_service_hours) + " Hrs");
                $('.t_payment').html(total_payment);
                $('.basic-service-hours').html($('#service-hour-select').val() + " Hrs");
                if (parseFloat(service_end_time) > 21) {
                    $(".error").remove();
                    $('.first-row-second-tab').after("<span class='error'>Service provider must be able to complete service till 9:00PM !</span>");
                    $('#submit-step2').prop('disabled', true);
                } else {
                    $(".error").remove();
                    $('#submit-step2').prop('disabled', false);
                }
            });
        });

    }

    function ectracheck() {
        // extra service calculation
        $('.Inside-cabinets-click').on("click", function () {
            if ($('.s1').hasClass('show-service')) {
                $('.s1').removeClass('show-service');
            } else {
                $('.s1').addClass('show-service');
            }
        });
        $('.Inside-oven-click').on("click", function () {
            if ($('.s2').hasClass('show-service')) {
                $('.s2').removeClass('show-service');
            } else {
                $('.s2').addClass('show-service');
            }
        });
        $('.Laundry-click').on("click", function () {
            if ($('.s3').hasClass('show-service')) {
                $('.s3').removeClass('show-service');
            } else {
                $('.s3').addClass('show-service');
            }
        });
        $('.windows-click').on("click", function () {
            if ($('.s4').hasClass('show-service')) {
                $('.s4').removeClass('show-service');
            } else {
                $('.s4').addClass('show-service');
            }
        });
        $('.cabinets-click').on("click", function () {
            if ($('.s5').hasClass('show-service')) {
                $('.s5').removeClass('show-service');
            } else {
                $('.s5').addClass('show-service');
            }
        });
        // extra service calculation end
    }

    // third tab default
    function setThirdTabDefault() {
        var postalcode = $('#postalcode').val();
        $('#address-postalcode').val(postalcode);
    }

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

    // to validate address form
    function ValidateAddressForm() {
        $(".error").remove();

        var stnm = $('#stnm').val();
        var housenm = $('#housenm').val();
        var citynm = $('#citynm').val();
        var phnm = $('#phnm').val();

        if (stnm.length < 1) {
            $(".streetname-address").after("<span class='error'>Field can`t be empty!</span>");
            return false;
        } else if (housenm.length < 1) {
            $(".houseno-address").after("<span class='error'>Field can`t be empty!</span>");
            return false;
        } else if (citynm.length < 1) {
            $(".city-name-address").after("<span class='error'>Field can`t be empty!</span>");
            return false;
        } else if (phnm.length < 1) {
            $(".phone-number-address").after("<span class='error'>Field can`t be empty!</span>");
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
            alert("Please agree to our terms and conditions first!");
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