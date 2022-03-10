$(document).ready(function () {
    var url = "http://localhost/Halperhand/Helperland/";
    var spid = $('.sp-id').text();
    $('#complete-serreq-btn-row').hide();
    // setInterval(displayCompleteButton, 1000);

    //mysetting page operations Start___________________________________________________________________________________
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
    //mysetting page operations end

    // New Service Request Operations Start_____________________________________________________________________________
    $('#sp-ns-table').ready(function () {
        getServiceRequestDetail();
    });
    $('#sp-ns-table').on("click", "tbody tr td:not(:last-child)", function (e) {
        const nsr = $(e.target).closest('tr').find("input").val().split(',');
        setSRModalDetail(nsr);
        $('.Cancel-btn,.Reschedule-btn').hide();
        $('#complete-cancel').modal('show');
        $('.accept-btn').click(function () {
            acceptServiceRequest(nsr);
        });
    });
    $('#sp-ns-table').on("click", ".accept-sr-btn", function (e) {
        const nsr = $(e.target).closest('tr').find("input").val().split(',');
        acceptServiceRequest(nsr);
    });
    // New Service Request Operations End

    // Upcoming Service Request Strat___________________________________________________________________________________
    $('#sp-upcoming-service').ready(function () {
        getUpcomingServiceDetail();
    });
    $('#sp-upcoming-service').on("click", "tbody tr td:not(:last-child)", function (e) {
        const usr = $(e.target).closest('tr').find("input").val().split(',');
        setUCSRModalDetail(usr);
        $('.accept-btn').hide();
        $('#complete-cancel').modal('show');
        $('html').on('click', '#cancel-serreq-btn', function () {
            cancelServiceRequest(usr);
        });
        $('html').on("click", '#complete-serreq-btn', function () {
            completeServiceRequest(usr);
        });
    });
    $('#sp-upcoming-service').on("click", ".Cancel-btn", function (e) {
        const usr = $(e.target).closest('tr').find("input").val().split(',');
        cancelServiceRequest(usr);
    });
    $('#sp-upcoming-service').on('click', '#complete-serreq-btn-row', function (e) {
        const usr = $(e.target).closest('tr').find("input").val().split(',');
        completeServiceRequest(usr);
    });
    // Upcoming Service Request End

    // service Provider's Service History Page Start
    $('#sp-service-history').ready(function () {
        getServiceHistoryDetail();
    });
    // service Provider's Service History Page end

    // Service Provider Rating page Start
    $('#sp-myratings').ready(function () {
        $.ajax({
            url: url + '?controller=providerDash&function=getServiceProviderReatings',
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                if (result.length != 0) {
                    var data = JSON.parse(result);
                    showSPRatings(data);
                } else {
                    var SPRatingTable = $('#sp-myratings').DataTable();
                    SPRatingTable.clear().draw();
                }
            }
        });
    });
    // Service Provider Rating page end

    // Block Customer page start
    $('#sp-cblock').ready(function () {
        getCustomerBlockPage();
    });
    $('#sp-cblock').on("click", ".block-fav-pro-btn", function (e) {
        const blockCus = $(e.target).closest('tr').find("input").val().split(',');
        var cid = blockCus[2];
        var spid = blockCus[1];
        var bc = blockCus[4];
        $.ajax({
            url: url + '?controller=providerDash&function=blockCustomer',
            type: 'post',
            data: {
                cid: cid,
                spid: spid,
                bc: bc
            },
            success: function (result) {
                if (result) {
                    getCustomerBlockPage();
                } else {
                    alert('Something went Wrong!');
                }
            }
        });
    });
    // Block Customer page end

    function getServiceRequestDetail() {
        $.ajax({
            url: url + '?controller=providerDash&function=getServiceRequestData',
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                if (result != 0) {
                    var data = JSON.parse(result);
                    showNewServiceReq(data);
                } else {
                    var table = $('#sp-ns-table').DataTable();
                    table.clear().draw();
                }

            }
        });
    }

    function getUpcomingServiceDetail() {
        $.ajax({
            url: url + '?controller=providerDash&function=getUpcomingServiceRequestData',
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                if (result != 0) {
                    var data = JSON.parse(result);
                    showUpcomingService(data);
                } else {
                    var myTable = $('#sp-upcoming-service').DataTable();
                    myTable.clear().draw();
                }
            }
        });
    }

    function getServiceHistoryDetail() {
        $.ajax({
            url: url + "?controller=providerDash&function=getServiceHistoryData",
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                if (result != 0) {
                    var data = JSON.parse(result);
                    showServiceHistory(data);
                }
                else {
                    var historyTable = $('#sp-service-history').DataTable();
                    historyTable.clear().draw();
                }
            }
        });
    }

    function getCustomerBlockPage() {
        $.ajax({
            url: url + '?controller=providerDash&function=getCustomerBlockPage',
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                if (result.length != 0) {
                    var data = JSON.parse(result);
                    showBlockCustomerData(data);
                } else {
                    var SPCBlockTable = $('#sp-cblock').DataTable();
                    SPCBlockTable.clear().draw();
                }
            }
        });
    }

    function showUpcomingService(data) {
        var myTable = $('#sp-upcoming-service').DataTable();
        myTable.clear().draw();
        data.forEach(function (dt) {
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':3', '.5').replace(':', '.');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.5', ':30').replace('.', ':');
            if (endtime.length == 2) { endtime = endtime + ":00"; }
            else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
            var ED = dt.ServiceStartDate.substr(0, 10) + ' ' + endtime;
            var endDate = new Date(ED);
            var today = new Date();
            var btnhtml = '';
            if (today < endDate) {
                btnhtml = '';
            } else {
                btnhtml = `<button type="button" class="btn Reschedule-btn complete-serreq-btn-row m-1" id="complete-serreq-btn-row"><i class="fa fa-check"></i> Complete</button>`;
            }
            myTable.row.add($(
                `<tr>
                    <input type="hidden" name="srdata" class="USReqData" value='` + jsontoArray(dt) + `'>
                    <td>`+ dt.ServiceRequestId + `</td>
                    <td><img src="assets/Img/spupcoming/calendar2.png" alt="">
                        <span>`+ dt.ServiceStartDate.substr(0, 10) + `</span> <br>
                        <img src="assets/Img/spupcoming/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + `-` + endtime + ` 
                    </td>
                    <td>`+ dt.CFName + `  ` + dt.CLName + ` <br>
                        <img src="assets/Img/spupcoming/layer-15.png" alt=""> `+ dt.AddressLine1 + ` , ` + dt.ZipCode + ` , ` + dt.City + `
                    </td>
                    <td>15km</td>
                    <td class="UCSCAC-btn">
                    `+ btnhtml + `
                        <button class="btn btn-rounded-17 Cancel-btn cancel-serreq-btn`+ dt.ServiceRequestId + `" id="cancel-serreq-btn" value="Cancel">Cancel</button>
                    </td>
                </tr>`
            )).draw();
        });
    }

    function showNewServiceReq(data) {
        var table = $('#sp-ns-table').DataTable();
        table.clear().draw();
        data.forEach(function (dt) {
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':3', '.5').replace(':', '.');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.5', ':30').replace('.', ':');
            if (endtime.length <= 2) { endtime = endtime + ":00"; }
            else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
            table.row.add($(
                `<tr> 
                    <input type="hidden" name="srdata" class="SReqData" value='` + jsontoArray(dt) + `'>
                    <td data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel">`+ dt.ServiceRequestId + `</td> 
                    <td data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel"><img src="assets/Img/spupcoming/calendar2.png" alt=""> 
                        <span class="mt-2"> `+ dt.ServiceStartDate.substr(0, 10) + ` </span> <br> 
                        <img src="assets/Img/spupcoming/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + `-` + endtime + ` 
                    </td> 
                    <td data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel" class="customerdetail"> `+ dt.CFName + `  ` + dt.CLName + `<br> 
                        <img src="assets/Img/spupcoming/layer-15.png" alt=""> `+ dt.AddressLine1 + ` , ` + dt.ZipCode + ` , ` + dt.City + `
                    </td> 
                    <td data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel" style="font-size:18px;">`+ dt.TotalCost + ` <i class="fa-solid fa-euro-sign"></i></td> 
                    <td data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#complete-cancel"></td> 
                    <td><button class="btn btn-rounded-17 accept-sr-btn accept-sr-btn`+ dt.ServiceRequestId + `" value="1">Accept</button></td> 
                </tr>`
            )).draw();
        });
    }

    function showServiceHistory(data) {
        var historyTable = $('#sp-service-history').DataTable();
        historyTable.clear().draw();
        data.forEach(function (dt) {
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':', '.').replace('3', '5');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.5', ':30').replace('.', ':');
            if (endtime.length <= 2) { endtime = endtime + ":00"; }
            else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
            historyTable.row.add($(
                `<tr>
                    <td>`+ dt.ServiceRequestId + `</td>
                    <td style="display:flex;flex-direction:column;">
                        <span><img src="assets/Img/spupcoming/calendar2.png" alt=""> `+ dt.ServiceStartDate.substr(0, 10) + `  </span>
                        <span><img src="assets/Img/spupcoming/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + `-` + endtime + ` </span>
                    </td>
                    <td>`+ dt.CFName + `  ` + dt.CLName + ` <br>
                        <img src="assets/Img/spupcoming/layer-15.png" alt=""> `+ dt.AddressLine1 + `, ` + dt.AddressLine2 + ` , ` + dt.ZipCode + ` , ` + dt.City + `
                    </td>
                </tr>`
            )).draw();
        });
    }

    function showSPRatings(data) {
        var SPRatingTable = $('#sp-myratings').DataTable();
        SPRatingTable.clear().draw();

        data.forEach(function (dt) {
            var starttime = dt.ServiceStartDate.substr(11, 5).replace(':', '.').replace('3', '5');
            var endtotal = parseFloat(starttime) + parseFloat(dt.SubTotal);
            var endtime = endtotal.toString().replace('.5', ':30').replace('.', ':');
            if (endtime.length <= 2) { endtime = endtime + ":00"; }
            else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
            var rate = dt.AvarageRating;
            var rhtml = "";
            if (parseFloat(rate) <= 1) {
                rhtml = "Bad";
            } else if (parseFloat(rate) <= 3 && parseFloat(rate) > 1) {
                rhtml = "Good";
            } else if (parseFloat(rate) <= 4 && parseFloat(rate) > 3) {
                rhtml = "Very Good";
            } else if (parseFloat(rate) <= 5 && parseFloat(rate) > 4) {
                rhtml = "Excellent";
            }
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

            SPRatingTable.row.add($(
                `<tr class="myRating-row-table">
                    <td style="padding: 0;">
                        <div class="col customer-rating-main-div pb-3 mb-3">
                            <div class="row data-mr-row pb-2 pl-1 pr-1 pt-3">
                                <div class="col">
                                    `+ dt.ServiceRequestId + ` <br><span class="rate-customer-name" style="font-weight: 600;">` + dt.CFName + ` ` + dt.CLName + `</span>
                                </div>
                                <div class="col">
                                    <img src="assets/Img/spupcoming/calendar2.png" alt="">
                                    <span class="c-s-r-d">`+ dt.ServiceStartDate.substr(0, 10) + `</span> <br>
                                    <img src="assets/Img/spupcoming/layer-14.png" alt=""> `+ dt.ServiceStartDate.substr(11, 5) + `-` + endtime + `
                                </div>
                                <div class="col">
                                    <span><span style="font-weight: 500;" class="your-ratings-provider">ratings</span> <br>
                                        `+ ratehtml + `
                                        `+ rhtml + `
                                    </span>
                                </div>
                            </div>
                            <hr class="rc-divider-line">
                            <div class="row">
                                <div class="col customer-comments-main-div">
                                    <span class="comments-heading-div">
                                        Customer Comments
                                    </span>
                                    <span class="customer-comment-div">
                                        `+ dt.Comments + `
                                    </span>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>`
            )).draw();
        });
    }

    function showBlockCustomerData(data) {
        var SPCBlockTable = $('#sp-cblock').DataTable();
        SPCBlockTable.clear().draw();

        data.forEach(function (dt) {
            SPCBlockTable.row.add($(
                `<tr>
                    <td>
                        <input type="hidden" value="`+ jsontoArray(dt) + `">
                        <div class="card fav-pro-card pb-4 m-4">
                            <div class="row pb-2 pt-4">
                                <div class="avtar-fav-pro-card">
                                    <img src="assets/Img/assets/avatar-1.png" alt="avatar" srcset="">
                                </div>
                            </div>
                            <div class="row pt-3">
                                <span style=" font-size: 18px; font-weight:500;">`+ dt.FullName + `</span>
                            </div>
                            <div class="row pt-3">
                                <button type="submit" value="block" name="block" class="btn block-fav-pro-btn ml-2"></button>
                            </div>
                        </div>
                    </td>
                </tr>`
            )).draw();
            if (dt.IsBlocked == 1) {
                $('.block-fav-pro-btn').html("Unblock");
                $('.block-fav-pro-btn').addClass('unblock-btn');
                $('.block-fav-pro-btn').removeClass('block-btn');
            } else {
                $('.block-fav-pro-btn').html("Block");
                $('.block-fav-pro-btn').removeClass('unblock-btn');
                $('.block-fav-pro-btn').addClass('block-btn');
            }
        });
    }

    function setSRModalDetail(data) {
        starttime = data[1].substr(11, 5);
        endtime = (parseFloat(starttime.replace(':', '.').replace('3', '5')) + parseFloat(data[5])).toString().replace('.5', ':30').replace('.', ':');
        if (endtime.length == 2) { endtime = endtime + ":00"; }
        else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
        var extra = ["Inside Cabinates", "Inside Oven", "Laundry wash & dry", "Interior Windows", "Inside Fridge"];
        var elength = data[22].length;
        var edata = data[22].split('');
        var extrahtml = "";
        if (data[22] != 0) {
            for (var i = 0; i < elength; i++) {
                if (i != elength - 1) {
                    extrahtml += extra[(edata[i]) - 1] + '  ,  ';
                } else {
                    extrahtml += extra[(edata[i]) - 1] + '.';
                }
            }
        }
        var address = data[16] + ' , ' + data[17] + ' , ' + data[18] + '.';
        $('.s-start-date').html(data[1].substr(0, 10));
        $('.start-end-time-service').html(starttime + ' - ' + endtime);
        $('.model-service-duration').html(data[5]);
        $('.modal-s-id').html(data[0]);
        $('.extra-service-modal-show').html(extrahtml);
        $('.modal-totalcost-show').html(data[7]);
        $('.customer-name-show').html(data[23] + ' ' + data[24]);
        $('.service-address-detail-show').html(address);
        if (data[11] != 0) {
            $('.hpts').hide();
            $('.nhpets').show();
        } else {
            $('.hpts').show();
            $('.nhpets').hide();
        }
        $('.gmap_canvas').html('<iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=11 ' + address + '&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>');
    }

    function setUCSRModalDetail(data) {
        $('.Cancel-btn').addClass('.cancel-serreq-btn' + data[0]);
        $('#complete-serreq-btn').hide();
        starttime = data[1].substr(11, 5);
        endtime = (parseFloat(starttime.replace(':', '.').replace('3', '5')) + parseFloat(data[5])).toString().replace('.5', ':30').replace('.', ':');
        if (endtime.length == 2) { endtime = endtime + ":00"; }
        else if (endtime.length == 1) { endtime = "0" + endtime + ":00"; }
        enddatetime = data[1].substr(0, 10) + " " + endtime + ":00.000";
        var extra = ["Inside Cabinates", "Inside Oven", "Laundry wash & dry", "Interior Windows", "Inside Fridge"];
        var elength = data[22].length;
        var edata = data[22].split('');
        var extrahtml = "";
        if (data[22] != 0) {
            for (var i = 0; i < elength; i++) {
                if (i != elength - 1) {
                    extrahtml += extra[(edata[i]) - 1] + '  ,  ';
                } else {
                    extrahtml += extra[(edata[i]) - 1] + '.';
                }
            }
        }
        var address = data[16] + ' , ' + data[17] + ' , ' + data[18] + '.';
        $('.s-start-date').html(data[1].substr(0, 10));
        $('.start-end-time-service').html(starttime + ' - ' + endtime);
        $('.model-service-duration').html(data[5]);
        $('.modal-s-id').html(data[0]);
        $('.extra-service-modal-show').html(extrahtml);
        $('.modal-totalcost-show').html(data[7]);
        $('.customer-name-show').html(data[23] + ' ' + data[24]);
        $('.service-address-detail-show').html(address);
        if (data[11] != 0) {
            $('.hpts').hide();
            $('.nhpets').show();
        } else {
            $('.hpts').show();
            $('.nhpets').hide();
        }
        $('.gmap_canvas').html('<iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=11 ' + address + '&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>');
        var today = new Date();
        var endDate = new Date(enddatetime);
        if (today > endDate) {
            $('#complete-serreq-btn').show();
        }
    }

    function acceptServiceRequest(nsr) {
        $('.accept-sr-btn' + nsr[0]).attr('disabled', true).html('Wait!...');
        $.ajax({
            url: url + '?controller=providerDash&function=acceptServiceRequest',
            type: 'post',
            data: {
                data: nsr
            },
            success: function (result) {
                $('.accept-sr-btn' + nsr[0]).attr('disabled', false).html('Accept');
                if (result == 1) {
                    getServiceRequestDetail();
                } else if (result == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something Went Wrong! Try Again!',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        confirmButtonColor: 'green'
                    });
                } else {
                    if (result != null) {
                        var data = JSON.parse(result);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Another service request ' + data.ServiceRequestId + ' has already been assigned which has time overlap with this service request. You can’t pick this one!',
                            showConfirmButton: true,
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#1D7A8C'
                        });
                    }
                }
                // console.log(result);
            }
        });
    }

    function cancelServiceRequest(usr) {
        var btn = $('.cancel-serreq-btn' + usr[0]);
        btn.attr('disabled', true).html('Wait! ...');
        $.ajax({
            url: url + "?controller=providerDash&function=cancelServiceRequest",
            type: 'post',
            data: {
                data: usr
            },
            success: function (result) {
                btn.attr('disabled', false).html('Cancel');
                if (result == 1) {
                    getUpcomingServiceDetail();
                } else {
                    $("#myElem").fadeIn('slow').delay(2500).fadeOut('slow');
                }
            }
        });
    }

    function completeServiceRequest(usr) {
        var srid = usr[0];
        var cid = usr[27];
        $.ajax({
            url: url + '?controller=providerDash&function=completeServiceRequest',
            type: 'post',
            data: {
                id: srid,
                cid: cid
            },
            success: function (result) {
                if (result == 1) {
                    getUpcomingServiceDetail();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something wnet Wrong! Try agian!'
                    });
                }
            }
        });
        // console.log(usr);
    }

    function setMyDetailSet() {
        $.ajax({
            url: url + "?controller=providerDash&function=getMySettingData&parameter=my-setting",
            type: 'post',
            data: {
                spid: spid
            },
            success: function (result) {
                var data = JSON.parse(result);
                $('#sp-firstname').val(data.FirstName);
                $('#sp-lastname').val(data.LastName);
                $('#sp-email').val(data.Email);
                $('#sp-phone').val(data.Mobile);
                if (data.DateOfBirth != null) {
                    $('#sp-dob-y').val(data.DateOfBirth.substr(0, 4));
                    $('#sp-dob-m').val(data.DateOfBirth.substr(5, 2));
                    $('#sp-dob-d').val(data.DateOfBirth.substr(8, 2));
                }
                if (data.NationalityId != null) {
                    $('#country').val(data.NationalityId);
                }
                if (data.Gender != null) {
                    $("input[name=gender][value=" + data.Gender + "]").prop('checked', true);
                } else {
                    $("input[name=gender][value=" + 1 + "]").prop('checked', true);
                }
                var av = 1;
                if (data.UserProfilePicture != null) {
                    av = data.UserProfilePicture;
                    $("input[name=avatar-val][value=" + data.UserProfilePicture + "]").prop('checked', true);
                } else {
                    $("input[name=avatar-val][value=" + 1 + "]").prop('checked', true);
                }
                if (data.AddressLine2 != null) {
                    $('#streetname-id').val(data.AddressLine2);
                }
                if (data.AddressLine1 != null) {
                    $('#housename-id').val(data.AddressLine1);
                }
                if (data.ZipCode != null) {
                    $('#postalcode-id').val(data.ZipCode);
                    findCityFromPostal(data.ZipCode);
                }
                $('.avatar-image-os-user').html(`<img src="assets/Img/assets/avatar-${av}.png" alt="avatar" width="100%" height="100%">`);
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

    function jsontoArray(dt) {
        var result = [];
        var keys = Object.keys(dt);
        keys.forEach(function (key) {
            result.push(dt[key]);
        });
        return result;
    }

    // export to excel
    $('#SPS-SH-export-btn').click(function () {
        let data = document.getElementById('sp-service-history');
        var fp = XLSX.utils.table_to_book(data, { sheet: 'History' });
        XLSX.write(fp, {
            bookType: 'xlsx',
            type: 'base64'
        });
        XLSX.writeFile(fp, 'service-history.xlsx');
    });

});
