var CAREER24H;
if(!CAREER24H) CAREER24H = {};
if(!CAREER24H.jobseeker) CAREER24H.jobseeker = {};

(function($) {
    var func = CAREER24H.jobseeker;
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

    func.chooseProfilePicture = function(e){
        let self = e.target;
        if (self.files && self.files[0]) {
        	var reader = new FileReader();

        	reader.onload = function(e) {
          	$('#ProfileImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(self.files[0]);
            CAREER24H.constant.isCompanyLogoChange = true;
          }
      }

    func.updateJobseekerProfile = function(e){
        

        let fullName = $('#full_name').val(),
            age = $('#age').val(),
            gender = $('#gender').val(),
            experience = $('#experience').val(),
            industry = $('#industry').val(),
            education_level = $('#education_level').val(),
            career_level = $('#career_level').val(),
            facebook = $('#facebook').val(),
            instagram = $('#instagram').val(),
            twitter = $('#twitter').val(),
            linkedin = $('#linkedin').val(),
            phone_number = $('#phone_number').val(),
            city = $('#city').val(),
            token = $("input[name='_token']").val();


        let social_media = {
            "facebook" : facebook,
            "instagram" : instagram,
            "twitter" : twitter,
            "linkedin" : linkedin
        };
        let formData = new FormData();
            formData.append('_token',token);
            formData.append('full_name',fullName);
            formData.append('age',age);
            formData.append('gender',gender);
            formData.append('experience',experience);
            formData.append('industry',industry);
            formData.append('education_level',education_level);
            formData.append('career_level',career_level);
            formData.append('social_media',JSON.stringify(social_media));
            formData.append('phone_number',phone_number);
            formData.append('city',city);

            let fileInput = $('#JobseekerImage').prop('files');
            if(fileInput[0] && CAREER24H.constant.isCompanyLogoChange){
                let file = fileInput[0];
                formData.append('file',file);
            }

        CAREER24H.utils.activateSpinner();
        $.ajax({
            url: '/jobseeker/update-profile',
            type: "POST", 
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.code == 200){
                    CAREER24H.utils.deactivateSpinner();
                    location.reload();
                    // console.log(res.message);
                    // swal.fire(res.message);
                }
                else if(res.code == 505){
                    CAREER24H.utils.deactivateSpinner();
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
     }

    func.updateCoverLetter = function(){
        let coverLetter = $('#coverLetter').val()
        token = $("input[name='_token']").val();
        
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('cover_letter', coverLetter);
        CAREER24H.utils.activateSpinner();
        $.ajax({
            url: '/jobseeker/update-cover-letter',
            type: "POST", 
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.code == 200){
                    CAREER24H.utils.deactivateSpinner()
                    location.reload();
        
                }
                else if(res.code == 505){
                    CAREER24H.utils.deactivateSpinner();
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
})(jQuery);