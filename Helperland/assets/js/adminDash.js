$(document).ready(function () {
    var url = 'http://localhost/Halperhand/Helperland/';
    var adminid = $('.admin-id').html();

    // ServiceRequest Page start
    $('#servicerequest-admin-table').ready(function () {
        getServiceRequestData();
        getSearchOptionData();
    });
    $('#search-btn').on("click", function (e) {
        var data = $('.sr-search-form').serialize();
        $.ajax({
            url: url + '?controller=adminDash&function=getServiceRequestSearchData',
            type: 'post',
            data: data,
            success: function (result) {
                if (result != null) {
                    var data = JSON.parse(result);
                    showServiceRequestDataAdmin(data);
                } else {
                    var SRAtable = $('#servicerequest-admin-table').DataTable();
                    SRAtable.clear().draw();
                }
            }
        });
        e.preventDefault();
    });
    $('html').on('click', '.edit-reshedule-admin-btn', function (e) {
        const data = $(e.target).closest('tr').find("input").val().split(',');
        console.log(data);
        $('#SR-ID-Form').val(data[0]);
        $('#Res-date').val(data[2].substr(0, 10));
        $('#service-reshedule-time').val(data[2].substr(11, 5));
        $('#Street-name').val(data[19]);
        $('#House-Number').val(data[18]);
        $('#Postal-code').val(data[3]);
        $('#city-select').val(data[20]);
        $('#SR-end-time').val(data[6]);
        $('#SR-SP-Name').val(data[4]);
        findPostalCodeData();
    });
    $('html').on('click', '.res-service-update', function () {
        var data = $('.admin-form-EditService').serialize();
        $('.res-service-update').attr('disabled',true).html('Processing!..');
        $.ajax({
            url: url + '?controller=adminDash&function=editServiceRequest',
            type: 'post',
            data: data,
            success: function (result) {
                $('.res-service-update').attr('disabled',false).html('Update');
                $(".error").remove();
                if (result == 1) {
                    $("#aminModel-1").modal("hide");
                    $(".modal-backdrop").remove();
                    getServiceRequestData();
                } else if (result == 2) {
                    $('.update-btn-div').before("<span class='error'>Service Should complete before 9:00 PM!</span>");
                } else {
                    $('.update-btn-div').before("<span class='error'>" + result + "</span>");
                }
            }
        });
    });
    $('html').on('click', '.refund-amt-btn', function (e) {
        const data = $(e.target).closest('tr').find("input").val().split(',');
        var bal = data[8];
        $('.paid-amt').html(data[8]);
        if (data[16] != "") {
            $('.refund-amt').html(data[16]);
            bal = (data[8] - data[16]).toFixed(2);
            $('.SR-PP').val(data[16]);
        } else {
            $('.refund-amt').html('00.00');
        }
        $('.balance-amt').html(bal);
        $('#payment-inp').val(bal);
        $('.select-percentage').on('change', function () {
            var multi = parseFloat($('.select-percentage').val());
            var cal = (bal * multi).toFixed(2);
            $('#calculate').val(cal);
            // $('.refund-amt').html(cal);
        });
        $('body').on('input', '#payment-inp', function () {
            $(".error").remove();
            var pay = parseFloat($('#payment-inp').val());
            if (pay > bal) {
                $('.payment-main').after("<span class='error'>Value can not be greater than Balance amount!</span>");
                $('.refund-amount-btn').attr('disabled', true);
            } else {
                $('.refund-amount-btn').attr('disabled', false);
            }
        });
        $('.SR-ID').val(data[0]);
    });
    $('.refund-amount-btn').on('click', function (e) {
        if (refundValidate() != false) {
            var data = $('.refund-form').serialize();
            $.ajax({
                url: url + '?controller=adminDash&function=refundServiceRequestAmount',
                type: 'post',
                data: data,
                success: function (result) {
                    if (result == 1) {
                        $("#exampleModalRedund").modal("hide");
                        $(".modal-backdrop").remove();
                        getServiceRequestData();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Refund Failed!',
                            showConfirmButton: true,
                            confirmButtonColor: '#1fb6ff'
                        });
                    }
                }
            });
        }
        e.preventDefault();
    });
    //  ServiceRequest Page end

    // user management page start
    $('#usermanage-admin-table').ready(function () {
        getUserManageMentPageData();
        getUMSearchData();
    });
    $('#usermanage-admin-table').on('click', '.activate-user', function (e) {
        changeUserstatus(e, 1);
    });
    $('#usermanage-admin-table').on('click', '.approve-user', function (e) {
        changeUserstatus(e, 2);
    });
    $('.um-search-btn').on('click',function(e){
        var data = $('.um-search-form').serialize();
        $.ajax({
            url: url + '?controller=adminDash&function=getUserManagementSearchData',
            type: 'post',
            data: data,
            success: function (result) {
                if (result != null) {
                    var data = JSON.parse(result);
                    showUserManagementData(data);
                } else {
                    var userTable = $('#usermanage-admin-table').DataTable();
                    userTable.clear().draw();
                }
                // console.log(result);
            }
        });
        e.preventDefault();
    });
    // user management page end

    function getServiceRequestData() {
        $.ajax({
            url: url + '?controller=adminDash&function=getAdminServiceRequestData',
            type: 'post',
            data: {
                aid: adminid
            },
            success: function (result) {
                if (result == null) {
                    var SRAtable = $('#servicerequest-admin-table').DataTable();
                    SRAtable.clear().draw();
                }
                else {
                    var data = JSON.parse(result);
                    showServiceRequestDataAdmin(data);
                }
            }
        });
    }

    function getSearchOptionData() {
        $.ajax({
            url: url + '?controller=adminDash&function=getSearchOptionDataSR',
            type: 'post',
            data: {
                aid: adminid
            },
            success: function (result) {
                var data = JSON.parse(result);
                setSearchOptionData(data);
            }
        });
    }

    function getUMSearchData(){
        $.ajax({
            url: url + '?controller=adminDash&function=getSearchDataUM',
            type: 'post',
            data: {
                aid: adminid
            },
            success: function (result) {
                var data = JSON.parse(result);
                setUMSearchOptionData(data);
            }
        });
    }

    function getUserManageMentPageData() {
        $.ajax({
            url: url + '?controller=adminDash&function=getAdminPageUserData',
            type: 'post',
            data: adminid,
            success: function (result) {
                if (result != null || result != "") {
                    var data = JSON.parse(result);
                    showUserManagementData(data);
                } else {
                    var userTable = $('#usermanage-admin-table').DataTable();
                    userTable.clear().draw();
                }
            }
        });
    }

    function showServiceRequestDataAdmin(data) {
        var SRAtable = $('#servicerequest-admin-table').DataTable();
        SRAtable.clear().draw();
        data.forEach(function (dt) {
            var ratinghtml, avatarhtml = '';
            var ratings = ""; var FullName = "";
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':3', '.5').replace(':', '.');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.5', ':30').replace('.', ':');
            if (endtime.length == 2) { endtime = endtime + ":00"; }
            else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
            if (dt.AvarageRating != null) {
                ratings = dt.AvarageRating.substring(0, 4);

            } if (dt.FullName != null) {
                FullName = dt.FullName;
            }
            ratinghtml = `<span>` + FullName + ` <br>
                                `+ ratingShow(dt.AvarageRating) + `
                                `+ ratings + `
                            </span>`;
            if (dt.UserProfilePicture != null) {
                avatarhtml = `<div class="cap-div">
                                <img class="cap" src="assets/Img/assets/avatar-`+ dt.UserProfilePicture + `.png" alt="cap">
                            </div>`;
            }
            SRAtable.row.add($(
                `<tr>
                    <td class="serviceid-data">
                    <input type="hidden" name="srdata" class="USReqData" value='` + jsontoArray(dt) + `'>
                        `+ dt.ServiceRequestId + `
                    </td>
                    <td class="servicedate-data">
                        <img src="assets/Img/admin/calendar2.png" alt=""> <span>`+ dt.ServiceStartDate.substr(0, 10) + `</span> <br>
                        <img src="assets/Img/admin/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + ` - ` + endtime + `
                    </td>
                    <td class="customerdetails-data">
                        David Bough <br>
                        <img src="assets/Img/admin/layer-15.png" alt=""> `+ dt.AddressLine1 + ` , ` + dt.AddressLine2 + ` , ` + dt.ZipCode + ` , ` + dt.City + `
                    </td>
                    <td class="serviceprovider-data">
                        `+ avatarhtml + `
                        <span>` + FullName + ` <br>
                                `+ ratingShow(ratings) + `
                                `+ ratings + `
                        </span>
                    </td>
                    <td class="status-data">
                        <span class="status new status-`+ dt.Status + `">
                            `+ showStatus(dt.Status) + `
                        </span>
                    </td>
                    <td class="action-data">
                        <div class="dropdown">
                            <button class="btn action-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/Img/admin/group-38.png" alt="action">
                            </button>
                            <div class="dropdown-menu dropdown-menu-sr-admin-page" aria-labelledby="dropdownMenuButton">
                                `+ showDropDown(dt.Status) + `
                            </div>
                        </div>
                    </td>
                </tr>`
            )).draw();
        });
    }

    function showUserManagementData(data) {
        var userTable = $('#usermanage-admin-table').DataTable();
        userTable.clear().draw();
        data.forEach(function (dt) {
            var dataArr = getAllDatatoSet(dt.UserTypeId, dt.RoleId, dt.IsActive, dt.ZipCode, dt.CityName, dt.IsApproved);
            userTable.row.add($(
                `<tr class="um-tb">
                    <td class="username-data">
                    <input type="hidden" name="userdata" class="userManagementData" value='` + jsontoArray(dt) + `'>
                        `+ dt.FirstName + ` ` + dt.LastName + `
                    </td>
                    <td class="usertype-data">
                        `+ dataArr[0] + `
                    </td>
                    
                    <td class="postalcode-data">
                        `+ dataArr[3] + `
                    </td>
                    <td class="city-data">
                        `+ dataArr[4] + `
                    </td>
                    <td class="radius-data">
                        `+ dataArr[6] + `
                    </td>
                    <td class="userstatus-data">
                        <span class="status active status-`+ dt.IsActive + `">
                            `+ dataArr[2] + `
                        </span>
                    </td>
                    <td class="action-data">
                        <div class="dropdown">
                            <button class="btn action-dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/Img/admin/group-38.png" alt="">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                `+ dataArr[5] + `
                            </div>
                        </div>
                    </td>
                </tr>`
            )).draw();
        });
        // <td class="role-data">
        //                 `+ dataArr[1] + `
        //             </td>
    }

    function changeUserstatus(e, Changes) {
        const data = $(e.target).closest('tr').find("input").val().split(',');
        $.ajax({
            url: url + '?controller=adminDash&function=setUserStatuses',
            type: 'post',
            data: {
                uid: data[0],
                active: data[14],
                approve: data[13],
                delete: data[15],
                set_status: Changes
            },
            success: function (result) {
                if (result == 1) {
                    getUserManageMentPageData();
                } else if (result == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong Try again!',
                        showConfirmButton: true,
                        confirmButtonColor: '#1fb6ff'
                    });
                } else {
                    alert('Something went wrong!');
                }
            }
        });
    }

    function getAllDatatoSet(dt1, dt2, dt3, dt4, dt5, dt6) {
        var dataArr = []; var d5 = ""; var ahtml = ""; var ddhtml = "";
        if (dt1 == 1) { d1 = "Customer"; } else if (dt1 == 2) { d1 = "Service Provider"; }
        if (dt2 == null) {  d2 = ""; }
        if (dt3 == 1) {  d3 = "Active"; } else if (dt3 == 0) { d3 = "Inactive"; }
        if (dt4 == null) { d4 = "";  d5 = ""; } else { d4 = dt4;  d5 = dt5; }
        if (dt3 == 1) {  ddhtml = `<a class="dropdown-item activate-user active0" href="#">Deactivate</a>`;} else if (dt3 == 0) {  ddhtml = `<a class="dropdown-item activate-user active1" href="#">Activate</a>`; }
        if (dt1 == 2 && dt6 == 0) {  ddhtml += `<a class="dropdown-item approve-user approve1" href="#">Approve</a>`; } else if (dt1 == 2 && dt6 == 1) { ddhtml += `<a class="dropdown-item approve-user approve0" href="#">Disapprove</a>`; }
        if (dt6 == 0) { ahtml = 'Not Approved'; } else { ahtml = 'Approved'; }
        dataArr[0] = d1; dataArr[1] = d2; dataArr[2] = d3; dataArr[3] = d4; dataArr[4] = d5; dataArr[5] = ddhtml; dataArr[6] = ahtml;
        return dataArr;
    }

    function setSearchOptionData(data) {
        var cusoption = "<option value='' selected>Customer</option>", prooption = "<option value='' selected>Provider</option>";
        data.forEach(function (dt) {
            if (dt.UserTypeId == 1) {
                cusoption += `<option value="` + dt.UserId + `">` + dt.Name + `</option>`;
            } else if (dt.UserTypeId == 2) {
                prooption += `<option value="` + dt.UserId + `">` + dt.Name + `</option>`;
            }
        });
        $('.s-second--input').html(cusoption);
        $('.s-third--input').html(prooption);
    }

    function setUMSearchOptionData(data){
        var userName = "<option value='' selected>User Name</option>";
        data.forEach(function(dt){
            userName += `<option value='`+dt.UserId+`'>`+dt.FirstName+` `+dt.LastName+`</option>`;
        });
        $('.username-um-search').html(userName);
    }

    function findPostalCodeData() {
        $('#Postal-code').on("input", function () {
            var postal = $(this).val();
            $.ajax({
                url: url + "?controller=customerDash&function=getUserCityData",
                type: 'post',
                data: {
                    postal: postal
                },
                success: function (result) {
                    $(".error").remove();
                    if (result != 0 || result != null) {
                        var cn = JSON.parse(result);
                        $('#city-select').val(cn.CityName);
                    } else {
                        $('#city-select').after("<span class='error'>service isn't available in this area!</span>");
                    }
                }
            });
        });
    }

    function refundValidate() {
        var payment = parseInt($('#payment-inp').val());
        var percentage = $('.select-percentage').val();
        var reason = $('#reason-of-refund').val();

        $(".error").remove();

        if (payment == 0) {
            $('.payment-div').after("<span class='error'>Payment can not be zero!</span>");
            return false;
        } else if (payment.length < 1) {
            $('.payment-div').after("<span class='error'>This field can not be empty!</span>");
            return false;
        }

        if (percentage == "") {
            $('.payment-div').after("<span class='error'>Percentage Field can not be empty!</span>");
            return false;
        }

        if (reason.length < 1) {
            $('#reason-of-refund').after("<span class='error'>Percentage Field can not be empty!</span>");
            return false;
        }
    }

    function ratingShow(rate) {
        var or = 0;
        var ratehtml = "";
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
        return ratehtml;
    }

    function showStatus(status) {
        statushtml = "";
        switch (status) {
            case '0':
                statushtml = 'New';
                break;
            case '1':
                statushtml = 'Assigned';
                break;
            case '2':
                statushtml = 'Accepted';
                break;
            case '3':
                statushtml = 'Canceled';
                break;
            case '4':
                statushtml = 'Completed';
                break;
            default:
                statushtml = "";
                break;
        }
        return statushtml;
    }

    function showDropDown(status) {
        ddmenu = "";
        if (status == 0 || status == 1 || status == 2) {
            ddmenu = `<a class="dropdown-item edit-reshedule-admin-btn" href="#" data-bs-toggle="modal" data-bs-target="#aminModel-1">Edit & Reschedule</a>
                      <a class="dropdown-item" href="#">Cancel</a>
                      <a class="dropdown-item" href="#">Change SP</a>
                      <a class="dropdown-item" href="#">History Log</a>
                      <a class="dropdown-item" href="#">Download Invoice</a>`;
        } else if (status == 3 || status == 4) {
            ddmenu = `<a class="dropdown-item refund-amt-btn" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalRedund">Refund</a>
                      <a class="dropdown-item" href="#">History Log</a>
                      <a class="dropdown-item" href="#">Download Invoice</a>`;
        }
        return ddmenu;
    }

    function jsontoArray(dt) {
        var result = [];
        var keys = Object.keys(dt);
        keys.forEach(function (key) {
            result.push(dt[key]);
        });
        return result;
    }

});