$(document).ready(function () {
    $('#change-sservice-dt-div').hide();
    var id = $('.userid-div').html();

    function convertDate(dateString) {
        var p = dateString.split(/\D/g)
        return [p[2], p[1], p[0]].join("-")
    }

    $.ajax({
        url: 'localhost/Halperhand/Helperland/?controller=customerDash&function=getMyDetail',
        type: 'post',
        data: {
            id: id
        },
        success: function (response) {
            var detail = JSON.parse(response);
            $('.my-setting-FN').val(detail.FirstName);
            $('.my-setting-LN').val(detail.LastName);
            $('.my-setting-Email').val(detail.Email);
            $('.my-setting-Phone').val(detail.Mobile);
            $('.my-setting-DOB-D').val(detail.DateOfBirth.substr(8, 2));
            $('.my-setting-DOB-M').val(detail.DateOfBirth.substr(5, 2));
            $('.my-setting-DOB-Y').val(detail.DateOfBirth.substr(0, 4));
            $('.my-setting-Language').val(detail.LanguageId);
        }
    });

    $('.reshedule-btn,.cancel-btn').on("click", function (ev) {
        const serviceDetail = JSON.parse($(ev.target).closest('tr').find("input").val());
        $('.service-id-input').val(serviceDetail.ServiceRequestId);
        $('#rdate').val(getTommorrowDate());

        $('.Update-btn-reschedule').on('click', function (e) {
            $(".error").remove();
            var srt = parseFloat($('#service-reshedule-time').val().replace(":", ".").replace('.30', '.50'));
            var ttime = parseFloat(serviceDetail.SubTotal);
            if ((srt + ttime) > 21) {
                $('.reschedule-dat-div').after("<span class='error'>Service Provider must be able to complete work till 9:00PM!</span>");
                return false;
            } else {
                var data = $('#reshedule-service-form').serialize();
                $.ajax({
                    url: 'http://localhost/Halperhand/Helperland/?controller=customerDash&function=resheduleDateAndTime',
                    type: 'post',
                    data: data,
                    success: function (result) {
                        if (result) {
                            $('#change-sservice-dt-div').addClass('alert-success').text('Service has successfully Rescheduled!');
                            $('#change-sservice-dt-div').removeClass('alert-danger');
                        } else {
                            $('#change-sservice-dt-div').addClass('alert-danger').text('Service was not Rescheduled try again!');
                            $('#change-sservice-dt-div').removeClass('alert-success');
                        }
                        $('#change-sservice-dt-div').show("normal").delay(5000).hide("normal");
                    }
                });
            }
            e.preventDefault();
        });

        $('.cancel-btn-modal').on("click", function (e) {
            var data = $('.cancel-sr-form').serialize();
            $.ajax({
                url: 'http://localhost/Halperhand/Helperland/?controller=customerDash&function=cancelServiceRequest',
                type: 'post',
                data: data,
                success: function (result) {
                    if (result) {
                        window.location.href = "http://localhost/Halperhand/Helperland/?controller=Default&function=customerDash&parameter=dashboard";
                    } else {
                        $('#change-sservice-dt-div').show("normal").delay(5000).hide("normal");
                        $('#change-sservice-dt-div').addClass('alert-danger').text('Service is not Canceled try again!');
                        $('#change-sservice-dt-div').removeClass('alert-success');
                    }
                }
            });
            e.preventDefault();
        });
    });

    $('#rating-submit-btn-pro').on("click", function (e) {
        $(".error").remove();
        var data = $('.s-p-rate-form').serialize();
        $.ajax({
            url: 'http://localhost/Halperhand/Helperland/?controller=customerDash&function=rateServiceProvider',
            type: 'post',
            data: data,
            success: function (result) {
                if(!result){
                    $('.feedbackonsp').before('<span class="error pl-2">Please provide all three ratings!</span>');
                }else{
                    window.location.href = "http://localhost/Halperhand/Helperland/?controller=Default&function=customerDash&parameter=service-history";
                }
            }
        });
        e.preventDefault();
    });

    $('.Rate-Service-Provider-btn').on("click", function (e) {
        const spd = JSON.parse($(e.target).closest('tr').find("input").val());
        console.log(spd);
        if (spd.FullName == "" || spd.FullName == null) {
            $('.rating-submit-btn').attr('disabled', true);
            $('.cap-div-avatar-modal').hide();
            ratehtml = "";
            spd.FullName = "";
            rate = "";
            $('.sp-rate-name').text(spd.FullName);
            $('.rating-of-sp').html(ratehtml);
            $('.ratings-sp-no').text(rate);
        } else {
            $('.cap-div-avatar-modal').show();
            $('.sp_rating_name').val(spd.ServiceProviderId);
            $('.sp_service_id').val(spd.ServiceRequestId);
            $('.rating-submit-btn').attr('disabled', false);
            $('.sp-rate-name').text(spd.FullName);
            var rate = spd.AvarageRating;
            var or = 0;
            ratehtml = "";
            for (var i = 0; i < parseInt(rate); i++) {
                ratehtml += `<i class="fas fa-star i-con"></i>`;
            }
            for (var i = 0; i < 1; i++) {
                if(rate != null){
                    if (rate.substr(2, 1) != 0) {
                        ratehtml += `<i class="fa-solid fa-star-half-stroke"></i>`;
                        or = 1;
                    }
                }else{
                    rate = 0;
                }
            }
            for (var i = 5; i > (parseInt(rate) + or); i--) {
                ratehtml += `<i class="fas fa-star i-con-e"></i>`;
            }
            $('.rating-of-sp').html(ratehtml);
            $('.ratings-sp-no').text(rate.substr(0, 4));
        }
    });

    $('.save-pass-btn').on("click", function () {
        var opass = $('.oldpass').val();
        var npass = $('.newpass').val();
        var ncpass = $('.cnewpass').val();
        $(".error").remove();
        if (opass.length < 1) {
            $('.oldpass').after('<span class="error">This field is required</span>');
            return false;
        }
        if (npass.length < 1) {
            $('.newpass').after('<span class="error">This field is required</span>');
            return false;
        }
        if (ncpass.length < 1) {
            $('.cnewpass').after('<span class="error">This field is required</span>');
            return false;
        }
    });

    $('.dashboard-data-table').on('click', function (e) {
        const service = $(e.target).closest('tr').find("input").val();
        serviceDetailsPopup(JSON.parse(service));
    });

    function serviceDetailsPopup(service) {
        console.log(service);
        extrahtml = "";
        var extra = ["Inside Cabinates", "Inside Oven", "Laundry wash & dry", "Interior Windows", "Inside Fridge"];
        var elength = service.ServiceExtraId.length;
        for (var i = 0; i < elength; i++) {
            if (i != elength - 1) {
                extrahtml += extra[i] + '  ,  ';
            } else {
                extrahtml += extra[i] + '.';
            }
        }
        var date = service.ServiceStartDate.substr(8, 2) + '/' + service.ServiceStartDate.substr(5, 2) + '/' + service.ServiceStartDate.substr(0, 4);
        var stime = service.ServiceStartDate.substr(11, 5);
        var endtime = (parseFloat(service.ServiceStartDate.substr(11, 5).replace(":30", ".50").replace(":", ".")) + parseFloat(service.SubTotal)).toString().replace(".5", ":30");
        if (endtime.length == 2) { endtime = endtime + ":00"; }
        // set the values
        $('.s-start-date').text(date);
        $('.start-end-time-service').text(stime + " to " + endtime);
        $('.model-service-duration').text(service.SubTotal.replace(".5", ":3").replace(".", ":"));
        $('.modal-s-id').text(service.ServiceRequestId);
        $('.extra-service-modal-show').text(extrahtml);
        $('.modal-totalcost-show').text(service.TotalCost);
        $('.address-modal-show-detail').text(service.AddressLine1 + " " + service.AddressLine2 + " " + service.City + " " + service.State + ".");
        $('.billing-address-ddetail-show').text(service.AddressLine1 + " " + service.AddressLine2 + " " + service.City + " " + service.State + ".");
        $('.mobile-no-modal-show').text(service.Mobile);
        $('.email-modal-show').text(service.Email);
        $('.comment-body-modal-show').text(service.Comments);
        if (service.HasPets == 0) {
            $('.hpts').hide();
            $('.nhpets').show();
        } else {
            $('.nhpets').hide();
            $('.hpts').show();
        }
    }

    $('.detail-save-btn').on("click", function () {
        var fname = $('.my-setting-FN').val();
        var lname = $('.my-setting-LN').val();
        var email = $('.my-setting-Email').val();
        var phone = $('.my-setting-Phone').val();
        $(".error").remove();

        if (fname.length < 1) {
            $('.my-setting-FN').after('<span class="error">This field is required</span>');
            return false;
        }

        if (lname.length < 1) {
            $('.my-setting-LN').after('<span class="error">This field is required</span>');
            return false;
        }

        if (email.length < 1) {
            $('.my-setting-Email').after('<span class="error">This field is required</span>');
            return false;
        } else {
            var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var validEmail = regEx.test(email);
            if (!validEmail) {
                $('.my-setting-Email').after('<span class="error">Enter a valid email</span>');
                return false;
            }
        }

        if (phone.length < 1) {
            $('.phone-no-div').after('<span class="error">This field is required</span>');
            return false;

        } else if (phone.length < 10 && phone.length > 1) {
            $('.phone-no-div').after('<span class="error">Phone number is shorter than 10 numbers</span>');
            return false;
        } else {
            var regexp = /[0-9]{10}/;
            var validPhonenumber = regexp.test(phone);
            if (!validPhonenumber) {
                $('.phone-no-div').after('<span class="error">Enter a valid Phonenumber</span>');
                return false;
            }
        }

    });

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

});