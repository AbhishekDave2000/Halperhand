$(document).ready(function () {

    var id = $('.userid-div').html();
    // $.ajax({
    //     url: 'localhost/Halperhand/Helperland/?controller=customerDash&function=getServiceRequestData',
    //     type: 'post',
    //     data: {
    //         id: id
    //     },
    //     success: function (result) {
    //         var data = JSON.parse(result);
    //         htmldata = '';
    //         data.forEach(function (dt) {
    //             var time = dt.ServiceStartDate.substr(11, 5).replace(':', '.');
    //             var endtime = (parseFloat(time) + parseFloat(dt.SubTotal)).toString().replace('.', ':').replace(':3', ':30').replace(':5', ':30');
    //             if (!endtime.match(':')) {
    //                 endtime = endtime + ':00';
    //             }
    //             if (dt.FirstName == null) { dt.FirstName = '' }
    //             if (dt.LastName == null) { dt.LastName = '' }
    //             if (dt.Ratings == undefined) { dt.Ratings = '' }
    //             var date = convertDate(dt.ServiceStartDate.substr(0, 10));
    //             htmldata += `<tr data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Reschedule-cancle">
    //                             <td class="dashserviceid">
    //                                 <span>${dt.ServiceRequestId}</span>
    //                             </td>
    //                             <td class="dashservicedate" style="flex-direction:column;">
    //                                 <span><img src="assets/Img/customer services history/calendar2.png" alt=""> ${date}</span><br>
    //                                 <span><img src="assets/Img/customer services history/layer-14.png" alt=""> ${time} - ${endtime}</span>
    //                             </td>
    //                             <td class="serviceprovider">
    //                                 <div class="cap-div">
    //                                     <img class="cap" src="assets/Img/customer services history/cap.png" alt="cap">
    //                                 </div>
                                    
    //                                 <span>${dt.FirstName}  ${dt.LastName} <br>
    //                                     <i class="fas fa-star i-con"></i>
    //                                     <i class="fas fa-star i-con"></i>
    //                                     <i class="fas fa-star i-con"></i>
    //                                     <i class="fas fa-star i-con"></i>
    //                                     <i class="fas fa-star i-con-e"></i>
    //                                     ${dt.Ratings}
    //                                 </span>
    //                             </td>
    //                             <td class="payment-text">
    //                                 <i class="fas fa-euro-sign"></i> ${dt.TotalCost}<br>
    //                             </td>
    //                             <td class="dash-action">
    //                                 <button type="button" data-bs-dismiss="modal" value="${dt.ServiceRequestId}" data-bs-toggle="modal" class="btn reshedule-btn" data-bs-target="#Reschedule-Request">Reshedule</button>
    //                                 <button type="button" data-bs-dismiss="modal" value="${dt.ServiceRequestId}" data-bs-toggle="modal" class="btn cancel-btn" data-bs-target="#cancel-request">Cancel</button>
    //                             </td>
    //                         </tr>`;
    //         });
    //         $('.dashboard-data').html(htmldata);
    //     }
    // });

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
        success : function (response){
            var detail = JSON.parse(response);
            $('.my-setting-FN').val(detail.FirstName);
            $('.my-setting-LN').val(detail.LastName);
            $('.my-setting-Email').val(detail.Email);
            $('.my-setting-Phone').val(detail.Mobile);
            $('.my-setting-DOB-D').val(detail.DateOfBirth.substr(8,2));
            $('.my-setting-DOB-M').val(detail.DateOfBirth.substr(5,2));
            $('.my-setting-DOB-Y').val(detail.DateOfBirth.substr(0,4));
            $('.my-setting-Language').val(detail.LanguageId);
        }
    });
    
    $('.save-pass-btn').on("click",function(){
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

    $('.detail-save-btn').on("click",function(){
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
        
        if(phone.length < 1){
            $('.phone-no-div').after('<span class="error">This field is required</span>');
            return false;
           
        }else if (phone.length < 10 && phone.length > 1) {
            $('.phone-no-div').after('<span class="error">Phone number is shorter than 10 numbers</span>');
            return false;
        }else{
            var regexp = /[0-9]{10}/;
            var validPhonenumber = regexp.test(phone);
            if (!validPhonenumber) {
                $('.phone-no-div').after('<span class="error">Enter a valid Phonenumber</span>');
                return false;
            }
        }

    });

});