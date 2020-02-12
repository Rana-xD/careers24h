var CAREER24H;
if(!CAREER24H) CAREER24H = {};
if(!CAREER24H.company) CAREER24H.company = {};

(function($) {
    var func = CAREER24H.company;

    func.changePassword = function(e){
        e.preventDefault();
        self = $(e.target);
        actionUrl = $(self).attr('action');
        formData = new FormData(self.get(0));
        
        $.ajax({
            url: actionUrl,
            type: "POST", 
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.code == 200){
                    self[0].reset();
                    swal.fire({
                        icon: 'success',
                        title: 'Done',
                        text: res.message,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                }
                else if(res.code == 505){
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: res.message,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                      })
                }
                else{
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: "Something went wrong",
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                      })
                }
            },
            error: function(error){
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Something weird occured, please reload the page.');
            } 
          });
        
    }

    func.chooseCompanyLogo = function(e){
        let self = e.target;
			if (self.files && self.files[0]) {
    			var reader = new FileReader();
    
    			reader.onload = function(e) {
      			$('#logoImage').attr('src', e.target.result);
   			 }
    
                reader.readAsDataURL(self.files[0]);
                CAREER24H.constant.isCompanyLogoChange = true;
  			}
    }

    func.updateCompanyProfile = function(e){
        let name = $("#name").val(),
        startYear = $("#start_year").val(),
        teamSize = $('#team_size').val(),
        info = $('#info').val(),
        facebook= $('#facebook').val(),
        instagram = $('#instagram').val(),
        twitter = $('#twitter').val(),
        linkedin = $('#linkedin').val(),
        phoneNumber = $('#phone_number').val(),
        email = $('#email').val(),
        website = $('#website').val(),
        city = $('#city').val(),
        address = $('#address').val(),
        token = $("input[name='_token']").val();

       
        

        let social_media = {
            "facebook" : facebook,
            "instagram" : instagram,
            "twitter" : twitter,
            "linkedin" : linkedin
        }
        social_media = JSON.stringify(social_media);
        formData = new FormData();

        formData.append('_token',token);
        formData.append('name',name);
        formData.append('start_year',startYear);
        formData.append('team_size',teamSize);
        formData.append('info',info);
        formData.append('social_media',social_media);
        formData.append('phone_number',phoneNumber);
        formData.append('email',email);
        formData.append('website',website)
        formData.append('city',city);
        formData.append('address',address);


        let fileInput = $('#CompanyLogo').prop('files');
        if(fileInput[0] && CAREER24H.constant.isCompanyLogoChange){
            let file = fileInput[0];
            formData.append('file',file);
        }
        CAREER24H.utils.activateSpinner();
        $.ajax({
            url: '/company/update-profile',
            type: "POST", 
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.code == 200){
                    CAREER24H.utils.deactivateSpinner()
                    location.reload();
                    // console.log(res.message);
                    // swal.fire(res.message);
                }
                else if(res.code == 505){
                    CAREER24H.utils.deactivateSpinner()
                    let message = JSON.parse(res.message);
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: message.file,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                      })
                }
            },
            error: function(error){
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Something weird occured, please reload the page.');
            } 
          });
    }

    func.loadData = function(){
        if(arguments[0].facebook) $('#facebook').val(arguments[0].facebook);
        if(arguments[0].instagram) $('#instagram').val(arguments[0].instagram);
        if(arguments[0].twitter) $('#twitter').val(arguments[0].twitter);
        if(arguments[0].linkedin) $('#linkedin').val(arguments[0].linkedin);
        if(arguments[1]) $('#info').val(arguments[1]);
    }
})(jQuery);