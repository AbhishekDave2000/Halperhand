$(document).ready(function () {

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

    $('.dashboard-data-table').on('click', function(e){
        const service = $(e.target).closest('tr').find("input").val();
        serviceDetailsPopup(JSON.parse(service));
    });

    function serviceDetailsPopup(service){
        console.log(service);
        extrahtml ="";
        var extra = ["Inside Cabinates","Inside Oven","Laundry wash & dry","Interior Windows","Inside Fridge"];
        var elength = service.ServiceExtraId.length;
        for(var i=0; i<elength; i++){
            if(i != elength-1){
                extrahtml += extra[i] + '  ,  ';
            }else{
                extrahtml += extra[i] + '.';
            }
        }
        var date = service.ServiceStartDate.substr(8,2) + '/' + service.ServiceStartDate.substr(5,2) +'/'+service.ServiceStartDate.substr(0,4);
        var stime = service.ServiceStartDate.substr(11,5);
        var endtime =  (parseFloat(service.ServiceStartDate.substr(11,5).replace(":30",".50").replace(":",".")) + parseFloat(service.SubTotal)).toString().replace(".5",":30");
        if(endtime.length == 2){ endtime = endtime+":00"; }
        // set the values
        $('.s-start-date').text(date);
        $('.start-end-time-service').text(stime+" to "+endtime);
        $('.model-service-duration').text(service.SubTotal.replace(".5",":3").replace(".",":"));
        $('.modal-s-id').text(service.ServiceRequestId);
        $('.extra-service-modal-show').text(extrahtml);
        $('.modal-totalcost-show').text(service.TotalCost);
        $('.address-modal-show-detail').text(service.AddressLine1+" "+service.AddressLine2+" "+service.City+" "+service.State+".");
        $('.billing-address-ddetail-show').text(service.AddressLine1+" "+service.AddressLine2+" "+service.City+" "+service.State+".");
        $('.mobile-no-modal-show').text(service.Mobile);
        $('.email-modal-show').text(service.Email);
        $('.comment-body-modal-show').text(service.Comments);
        if(service.HasPets == 0){
            $('.hpts').hide();
            $('.nhpets').show();
        }else{
            $('.nhpets').hide();
            $('.hpts').show();
        }
    }

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