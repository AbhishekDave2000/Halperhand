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
                // console.log(result);
                if (result == null) {
                    var SRAtable = $('#servicerequest-admin-table').DataTable();
                    SRAtable.clear().draw();
                } else {
                    var data = JSON.parse(result);
                    showServiceRequestDataAdmin(data);
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
        findPostalCodeData();
    });
    $('html').on('click','.res-service-update',function(){
        var data = $('.admin-form-EditService').serialize();
        $.ajax({
            url: url + '?controller=adminDash&function=editServiceRequest',
            type: 'post',
            data: data,
            success : function (result){
                console.group(result);
            }
        });
    });
    //  ServiceRequest Page end

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
            ddmenu = `<a class="dropdown-item" href="#">Refund</a>
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