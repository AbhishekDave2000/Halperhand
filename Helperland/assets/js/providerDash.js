$(document).ready(function () {
    var url = "http://localhost/Halperhand/Helperland/";
    var spid = $('.sp-id').text();

    //mysetting data load 
    $('.sp-mysetting-content').ready(function () {
        setMyDetailSet();
    });

    $('#postalcode-id').on("input", function () {
        var postal = $(this).val();
        if (postal != "") {
            findCityFromPostal(postal);
        }
    });

    $('#save-btn-mysetting-detail').on("click", function (e) {
        e.preventDefault();
        var data = $('.mySetting-Detail-Form').serialize();
        $.ajax({
            url: url + "?controller=providerDash&function=saveProviderDetail",
            type: 'post',
            data: data,
            success: function (result) {
                if (result == 1) {
                    setMyDetailSet();
                } else if (result == 0) {
                    $('#save-btn-mysetting-detail').after("<span class='error'>Your Detail is Not set Please Try Again!</span>");
                } else if (result.length > 5) {
                    var err = JSON.parse(result);
                    $('.mySetting-Detail-Form').before("<span class='error'>" + err.error + "</span>");
                } else {
                    alert("Somthing went wrong!");
                }
            }
        });
    });

    $('#save-btn-mysetting-pass').on("click", function (e) {
        e.preventDefault();
        if (passwordValidation()) {
            $('.sp-id').val(spid);
            var data = $('#changepass-form').serialize();
            $.ajax({
                url: url + "?controller=providerDash&function=myPasswordUpdate",
                type: 'post',
                data: data,
                success: function (result) {
                    if (result == 1) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Password has been changed!',
                            showConfirmButton: true,
                            confirmButtonColor: 'green'
                        });
                        $('.NewCPass,.OldPass,.NewPass').val('');
                    } else if (result == 2) {
                        $('.spmypass').after("<span class='error'>Old Password Does not match with your password Enter correct password!</span>");
                    } else if (result.length > 10) {
                        $('.spmypass').after("<span class='error'>" + result + "</span>");
                    }
                }
            });
        }
    });

    $('#sp-ns-table:visible').ready(function () {
        var fn = showNewServiceReq;
        getServiceReqData(fn);
    });

    $('#sp-upcoming-service').ready(function () {
        var fn = showUpcomingService;
        getServiceReqData(fn);
    });

    function getServiceReqData(fn) {
        $.ajax({
            url: url + '?controller=providerDash&function=getServiceRequestData',
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                var data = JSON.parse(result);
                fn(data);
                // console.log(data);
            }
        });
    }

    function showUpcomingService(data) {
        var myTable = $('#sp-upcoming-service').DataTable();
        myTable.clear().draw();
        data.forEach(function (dt) {
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':', '.').replace('3', '5');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.', ':').replace('5', '30');
            if (endtime.length <= 2) { endtime = endtime + ":00"; }
            myTable.row.add($(
                `<tr data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel">
                    <td class="serviceid">`+ dt.ServiceRequestId + `</td>
                    <td class="servicedata"><img src="assets/Img/spupcoming/calendar2.png" alt="">
                        <span>`+dt.ServiceStartDate.substr(0,10)+`</span> <br>
                        <img src="assets/Img/spupcoming/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + `-` + endtime + ` 
                    </td>
                    <td class="customerdetail">`+ dt.CFName + `  ` + dt.CLName + ` <br>
                        <img src="assets/Img/spupcoming/layer-15.png" alt=""> `+ dt.AddressLine1 + ` , ` + dt.ZipCode + ` , ` + dt.City + `
                    </td>
                    <td class="servicedistance">15km</td>
                <td class="serviceaction"><button class="btn btn-danger btn-rounded-17" value="Cancel">Cancel</button></td>`
            )).draw();
        });
    }

    function showNewServiceReq(data) {
        var table = $('#sp-ns-table').DataTable();
        table.clear().draw();
        data.forEach(function (dt) {
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':', '.').replace('3', '5');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.', ':').replace('5', '30');
            if (endtime.length <= 2) { endtime = endtime + ":00"; }
            table.row.add($(
                `<tr data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel" value='` + jsontoArray(dt) + `' > 
                    <input type="hidden" name="srdata" class="SReqData">
                    <td class="serviceid">`+ dt.ServiceRequestId + `</td> 
                    <td class="servicedata"><img src="assets/Img/spupcoming/calendar2.png" alt=""> 
                        <span class="mt-2"> `+ dt.ServiceStartDate.substr(0, 10) + ` </span> <br> 
                        <img src="assets/Img/spupcoming/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + `-` + endtime + ` 
                    </td> 
                    <td class="customerdetail"> `+ dt.CFName + `  ` + dt.CLName + `<br> 
                        <img src="assets/Img/spupcoming/layer-15.png" alt=""> `+ dt.AddressLine1 + ` , ` + dt.ZipCode + ` , ` + dt.City + `
                    </td> 
                    <td style="font-size:18px;">`+dt.TotalCost+` <i class="fa-solid fa-euro-sign"></i></td> 
                    <td class="timeconflict"></td> 
                    <td class="serviceactions-body"><button class="btn btn-rounded-17" value="Cancel">Accept</button></td> 
                </tr>`
            )).draw();
        });
    }

    function jsontoArray(dt) {
        var result = [];
        var keys = Object.keys(dt);
        keys.forEach(function (key) {
            result.push(dt[key]);
        });
        return result;
    }

    function setMyDetailSet() {
        $.ajax({
            url: url + "?controller=providerDash&function=getMySettingData&parameter=my-setting",
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                var myData = JSON.parse(result);
                var res = jsontoArray(myData);
                $('#sp-firstname').val(res[1]);
                $('#sp-lastname').val(res[2]);
                $('#sp-email').val(res[3]);
                $('#sp-phone').val(res[4]);
                if (res[6] != '0000-00-00 00:00:000') {
                    $('#sp-dob-y').val(res[6].substr(0, 4));
                    $('#sp-dob-m').val(res[6].substr(5, 2));
                    $('#sp-dob-d').val(res[6].substr(8, 2));
                }
                if (res[11] != null) {
                    $('#country').val(res[11]);
                }
                if (res[5] != null) {
                    $("input[name=gender][value=" + res[5] + "]").prop('checked', true);
                } else {
                    $("input[name=gender][value=" + 1 + "]").prop('checked', true);
                }
                if (res[7] != null) {
                    $("input[name=avatar-val][value=" + res[7] + "]").prop('checked', true);
                } else {
                    $("input[name=avatar-val][value=" + 1 + "]").prop('checked', true);
                }
                if (res[16] != null) {
                    $('#streetname-id').val(res[16]);
                }
                if (res[15] != null) {
                    $('#housename-id').val(res[15]);
                }
                if (res[8] != null) {
                    $('#postalcode-id').val(res[8]);
                    findCityFromPostal(res[8]);
                }
                $('.avatar-image-os-user').html(`<img src="assets/Img/assets/avatar-${res[7]}.png" alt="avatar" width="100%" height="100%">`);
            }
        });
    }

    function findCityFromPostal(postal) {
        $.ajax({
            url: url + "?controller=providerDash&function=getUserCityData",
            type: 'post',
            data: {
                postal: postal
            },
            success: function (result) {
                $(".error").remove();
                if (result != 0) {
                    var c = JSON.parse(result);
                    $(".city-select option:selected").val(c.Id);
                    $(".city-select option:selected").html(c.CityName);
                } else {
                    $('#postalcode-id').after("<span class='error'>city not exist from this postal code!</span>");
                }
            }
        });
    }

    function passwordValidation() {
        var opass = $('.OldPass').val();
        var npass = $('.NewPass').val();
        var ncpass = $('.NewCPass').val();
        $(".error").remove();
        if (opass.length < 1) {
            $('.OldPass').after('<span class="error">This field is required</span>');
            return false;
        } else if (opass.length < 7) {
            $('.OldPass').after('<span class="error">password must be 8 characters long</span>');
            return false;
        }
        else if (npass.length < 1) {
            $('.NewPass').after('<span class="error">This field is required</span>');
            return false;
        } else if (npass.length < 7) {
            $('.NewPass').after('<span class="error">password must be 8 characters long</span>');
            return false;
        }
        else if (ncpass.length < 1) {
            $('.NewCPass').after('<span class="error">This field is required</span>');
            return false;
        } else if (ncpass.length < 7) {
            $('.NewCPass').after('<span class="error">password must be 8 characters long</span>');
            return false;
        } else if (npass != ncpass) {
            $('.NewPass,.NewCPass').after('<span class="error">Please enter same password!</span>');
            return false;
        } else {
            return true;
        }
    }

});
