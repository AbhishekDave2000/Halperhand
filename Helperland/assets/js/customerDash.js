$(document).ready(function () {
    var id = $('.userid-div').html();
    var url = "http://localhost/Halperhand/Helperland/";

    function convertDate(dateString) {
        var p = dateString.split(/\D/g)
        return [p[2], p[1], p[0]].join("-")
    }

    $.ajax({
        url: url + '?controller=customerDash&function=getMyDetail',
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
        $('.service-pro-email').val(serviceDetail.SPEmail);
        // $('#rdate').val(serviceDetail.ServiceStartDate.substring(0, 10));
        $('#rdate').val(getTommorrowDate());
        $('#service-reshedule-time').val(serviceDetail.ServiceStartDate.substring(11, 16));

        $('.Update-btn-reschedule').on('click', function (e) {
            $(".error").remove();
            var srt = parseFloat($('#service-reshedule-time').val().replace(":", ".").replace('.30', '.50'));
            var ttime = parseFloat(serviceDetail.SubTotal);
            if ((srt + ttime) > 21) {
                $('.reschedule-dat-div').after("<span class='error'>Service Provider must be able to complete work till 9:00PM!</span>");
                return false;
            } else {
                $('.Update-btn-reschedule').attr("disabled", true).html("Processing......");
                var data = $('#reshedule-service-form').serialize();
                $.ajax({
                    url: url + '?controller=customerDash&function=resheduleDateAndTime',
                    type: 'post',
                    data: data,
                    success: function (result) {
                        if (result) {
                            $('.Update-btn-reschedule').attr("disabled", false).html("Update");
                            window.location.href = url + "?controller=Default&function=customerDash&parameter=dashboard";
                        }
                    }
                });
            }
            e.preventDefault();
        });

        $('.cancel-btn-modal').on("click", function (e) {
            var data = $('.cancel-sr-form').serialize();
            $.ajax({
                url: url + '?controller=customerDash&function=cancelServiceRequest',
                type: 'post',
                data: data,
                success: function (result) {
                    if (result) {
                        window.location.href = url + "?controller=Default&function=customerDash&parameter=dashboard";
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
            url: url + '?controller=customerDash&function=rateServiceProvider',
            type: 'post',
            data: data,
            success: function (result) {
                if (result == 0) {
                    $('.feedbackonsp').before('<span class="error pl-2">Please provide all three ratings!</span>');
                } else {
                    window.location.href = url + "?controller=Default&function=customerDash&parameter=service-history";
                }
            }
        });
        e.preventDefault();
    });

    $('.Rate-Service-Provider-btn').on("click", function (e) {
        const spd = JSON.parse($(e.target).closest('tr').find("input").val());
        // console.log(spd);
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
            $('.cap-div-avatar-modal').html('<img class="cap" src="assets/Img/assets/avatar-'+spd.UserProfilePicture+'.png" alt="cap">');
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
                if (rate != null) {
                    if (rate.substr(2, 1) != 0) {
                        ratehtml += `<i class="fa-solid fa-star-half-stroke"></i>`;
                        or = 1;
                    }
                } else {
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

    // export to excel
    $('#SH-export-button').click(function () {
        let data = document.getElementById('service-history-datatable');
        var fp = XLSX.utils.table_to_book(data, { sheet: 'History' });
        XLSX.write(fp, {
            bookType: 'xlsx',
            type: 'base64'
        });
        XLSX.writeFile(fp, 'service-history.xlsx');
    });

    $('.dashboard-data').on('click', function (e) {
        const service = $(e.target).closest('tr').find("input").val();
        if (service != "") {
            serviceDetailsPopup(JSON.parse(service));
        }
    });

    function serviceDetailsPopup(service) {
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

    $('.myAddress-Details').on("click", function () {
        var id = $('#user-id-span-val').html();
        getUserAddressData(id);
    });

    $('.set-address-table').on('click', ".edit-user-add-ms", function (e) {
        var addrdata = $(e.target).closest("tr").find("input").val().split(",");
        $('.new-address-btn').addClass("edit-address-btn");
        $('.user-id-address').val($('#user-id-span-val').html());
        $('#aeaddresstitle').html("Edit Your Address");
        $('.new-address-btn').html('Edit');
        $('#address-street-name').val(addrdata[1]);
        $('#address-house-name').val(addrdata[0]);
        $('#address-postal-code').val(addrdata[2]);
        $('#address-city option:selected').val(addrdata[5]);
        $("#address-city option:selected").html(addrdata[6]);
        $('#address-user-phone').val(addrdata[4]);
        $('.user-address-id').val(addrdata[7]);
        findPostalCodeData();
    });

    $(".add-edit-address-form").on("click", ".edit-address-btn", function (e) {
        if (userAddressValidate()) {
            var data = $('.add-edit-address-form').serialize();
            $.ajax({
                url: url + "?controller=customerDash&function=userAddressupdate",
                type: 'post',
                data: data,
                success: function (result) {
                    if (result) {
                        $('.modal-backdrop').remove();
                        $('#add-address-modal').modal("hide");
                        var addressData = JSON.parse(result);
                        showUserAddress(addressData);
                    }
                    $('.new-address-btn').removeClass("edit-address-btn");
                }
            });
        }
        e.preventDefault();
    });

    $(".add-address-btn").click(function () {
        $('#aeaddresstitle').html("Add New Address");
        $('.new-address-btn').html('Add');
        $('.address-street-name,.address-house-name,.address-postal-code,.address-user-phone').val('');
        $('.new-address-btn').addClass("new-address-add-btn");
        findPostalCodeData();
    });

    $(".add-edit-address-form").on("click", ".new-address-add-btn", function (e) {
        if (userAddressValidate()) {
            var data = $('.add-edit-address-form').serialize();
            $.ajax({
                url: url + "?controller=customerDash&function=addNewUserAddress",
                type: 'post',
                data: data,
                success: function (result) {
                    if (result) {
                        var id = $('#user-id-span-val').html();
                        getUserAddressData(id);
                        $('.modal-backdrop').remove();
                        $('#add-address-modal').modal("hide");
                    }
                    $('.new-address-btn').removeClass("new-address-add-btn");
                }
            });
        }
        e.preventDefault();
    });

    $('.set-address-table').on("click", ".delete-user-address-btn", function (e) {
        var addrdata = $(e.target).closest("tr").find("input").val().split(",");
        var id = addrdata[7];
        var uid = $('#user-id-span-val').html();
        $.ajax({
            url: url + "?controller=customerDash&function=deleteUserAddress",
            type: 'post',
            data: {
                uid: uid,
                id: id
            },
            success: function (result) {
                if (result) {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Address is Deleted.',
                        text: 'Address Id : ' + id,
                        showConfirmButton: true,
                        confirmButtonColor: 'green'
                    });
                    getUserAddressData(uid);
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Deletion Failed!',
                    });
                }
            }
        });
    });

    $(".favpro-data").ready(function () {
        var uid = $('#user-id-span-val').html();
        $.ajax({
            url: url + '?controller=customerDash&function=getFavProviderData',
            type: 'post',
            data: {
                id: uid
            },
            success: function (result) {
                var data = JSON.parse(result);
                showFavProData(data);
            }
        });
    });

    function jsontoArray(dt) {
        var result = [];
        var keys = Object.keys(dt);
        keys.forEach(function (key) {
            result.push(dt[key]);
        });
        return result;
    }

    function showFavProData(data) {
        var table = $('#favpro-datatable').DataTable();
        table.clear().draw();
        data.forEach(function (dt) {
            var result = jsontoArray(dt);
            var rate = dt.AvarageRating;
            var or = 0;
            ratehtml = "";
            for (var i = 0; i < parseInt(rate); i++) {
                ratehtml += `<i class="fas fa-star i-con"></i>`;
            }
            for (var i = 0; i < 1; i++) {
                if (rate != null) {
                    if (rate.substr(2, 1) != 0) {
                        ratehtml += `<i class="fa-solid fa-star-half-stroke"></i>`;
                        or = 1;
                    }
                } else {
                    rate = 0;
                }
            }
            for (var i = 5; i > (parseInt(rate) + or); i--) {
                ratehtml += `<i class="fas fa-star i-con-e"></i>`;
            }
            table.row.add($(
                            '<tr class="m-2" style="border: none !important;"><td><div class="card fav-pro-card pb-4 m-1"><div class="row pb-2 pt-4">'+
                                '<div class="avtar-fav-pro-card">'+
                                        '<img src="assets/Img/assets/avatar-'+dt.UserProfilePicture+'.png" alt="avatar" class="favblock-cap">'+
                                '</div>'+
                                '</div>'+
                                '<input type="hidden" class="fav-pro-data" value="'+result+'" />'+
                                '<input type="hidden" class="fav-pro-id" value="'+dt.TargetUserId+'" />'+
                                '<div class="row pt-3">'+
                                    '<span style=" font-size: 18px;">'+dt.FullName+'<br>'+
                                        '<span style="font-size: 15px;">'
                                            +ratehtml+
                                            +dt.AvarageRating.substring(0, 4)+
                                        '</span>'+
                                    '</span><br>'+
                                '</div>'+
                                '<div class="row pt-3">'+
                                    '<button class="btn remove-fav-pro-btn remove-fav-pro-btn'+dt.IsFavorite+' mr-2" type="submit" data-arfav-pro="'+dt.IsFavorite+'" value="0" ></button>'+
                                    '<button class="btn block-fav-pro-btn block-fav-pro-btn'+dt.IsBlocked+' ml-2" type="submit" data-bubfav-pro="'+dt.IsBlocked+'" value="0"></button>'+
                                '</div>'+
                                    '</div>'+
                                '</td>'+
                            '</tr>' )).draw();
            $('.remove-fav-pro-btn1').html('Remove');
            $('.remove-fav-pro-btn0').html('Add');
            $('.block-fav-pro-btn1').html('Unblock');
            $('.block-fav-pro-btn0').html('Block');
        });
    }

    $('body').on("click", ".remove-fav-pro-btn", function (e) {
        var prodata = $(e.target).closest("tr").find(".fav-pro-id").val().split(",");
        var profavdata = $(e.target).closest("tr").find(".fav-pro-data").val().split(",");
        $('.remove-fav-pro-btn').val(1);
        favblockFunction(prodata[0], profavdata[3], profavdata[4]);
    });

    $('body').on("click", ".block-fav-pro-btn", function (e) {
        var prodata = $(e.target).closest("tr").find(".fav-pro-id").val().split(",");
        var profavdata = $(e.target).closest("tr").find(".fav-pro-data").val().split(",");
        $('.block-fav-pro-btn').val(1);
        favblockFunction(prodata[0], profavdata[3], profavdata[4]);
    });

    function favblockFunction(prodata, profav, problock) {
        var uid = $('#user-id-span-val').html();
        var favbtn = $('.remove-fav-pro-btn').val();
        var blockbtn = $('.block-fav-pro-btn').val();
        var favstatus = profav;
        var blockstatus = problock;
        $.ajax({
            url: url + '?controller=customerDash&function=addRemoveFavBlock',
            type: 'post',
            data: {
                uid: uid,
                tid: prodata,
                fav: favstatus,
                block: blockstatus,
                favbtn: favbtn,
                blockbtn: blockbtn
            },
            success: function (result) {
                showFavProPageData();
                $('.block-fav-pro-btn').val(0);
                $('.remove-fav-pro-btn').val(0);
            }
        });
    }

    function showFavProPageData() {
        var uid = $('#user-id-span-val').html();
        $.ajax({
            url: url + '?controller=customerDash&function=getFavProviderData',
            type: 'post',
            data: {
                id: uid
            },
            success: function (result) {
                var data = JSON.parse(result);
                showFavProData(data);
            }
        });
    }

    function getUserAddressData(id) {
        $.ajax({
            url: url + '?controller=customerDash&function=getUserAddressData',
            type: 'post',
            data: {
                data: id
            },
            success: function (result) {
                var address = JSON.parse(result);
                showUserAddress(address);
            }
        });
    }

    function findPostalCodeData() {
        $('.address-postal-code').on("input", function () {
            var postal = $(this).val();
            $.ajax({
                url: url + "?controller=customerDash&function=getUserCityData",
                type: 'post',
                data: {
                    postal: postal
                },
                success: function (result) {
                    $(".error").remove();
                    if (result != 0) {
                        var cn = JSON.parse(result);
                        $('.address-city option:selected').val(cn.Id);
                        $(".address-city option:selected").html(cn.CityName);
                    } else {
                        $('.address-postal-code').after("<span class='error'>service isn't available in this area!</span>");
                    }
                }
            });
        });
    }

    function showUserAddress(address) {
        var addhtml = "";
        address.forEach(function (dt) {
            addhtml += `<tr class="set-address-table-row" style="border-bottom: 1px solid #e0e0e0;">
                            <input id="address-mysetting" type="hidden" value='${dt.AddressLine1},${dt.AddressLine2},${dt.PostalCode},${dt.City},${dt.Mobile},${dt.CityId},${dt.CityName},${dt.AddressId}' >
                                <td class="set-address-body">
                                    <span class="set-addres-span">
                                        <b>Address : </b>
                                        ${dt.AddressLine1} , ${dt.AddressLine2} , ${dt.City} , ${dt.State}.
                                    </span>
                                    <span class="set-addres-span">
                                        <b>Phone Number : </b>
                                        ${dt.Mobile}
                                    </span>
                                </td>
                                <td class="set-action-body">
                                    <a class="btn edit-user-add-ms" data-bs-toggle="modal" data-bs-target="#add-address-modal"><i class="fas fa-edit"></i></a>
                                    <a class="btn delete-user-address-btn"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>`;
        });
        $('.my-setting-address-details').html(addhtml);
    }

    function userAddressValidate() {
        var streetName = $('.address-street-name').val();
        var houseName = $('.address-house-name').val();
        var postalCode = $('.address-postal-code').val();
        var phoneNo = $('.address-user-phone').val();

        $(".error").remove();

        if (streetName.length < 1) {
            $('.address-street-name').after('<span class="error">This field is required</span>');
            return false;
        }
        else if (houseName.length < 1) {
            $('.address-house-name').after('<span class="error">This field is required</span>');
            return false;
        }
        else if (postalCode.length < 1) {
            $('.address-postal-code').after('<span class="error">This field is required</span>');
            return false;
        } else if (postalCode.length < 5 && postalCode.length > 6) {
            $('.address-postal-code').after('<span class="error">This field is required</span>');
            return false;
        }
        else if (phoneNo.length < 1) {
            $('.address-user-phone-div').after('<span class="error">This field is required</span>');
            return false;
        } else {
            return true;
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

});