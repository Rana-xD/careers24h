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
        
        let promise = CAREER24H.main.formSubmitPromise(actionUrl,formData);
            promise.then((response)=>{
                if(response.code == 200){
                    self[0].reset();
                    swal.fire({
                        icon: 'success',
                        title: 'Done',
                        text: response.message,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                }
                else{
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: response.message,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                      })
                }
            }, function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            }).catch(function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
        // $.ajax({
        //     url: actionUrl,
        //     type: "POST", 
        //     data: formData,
        //     contentType: false,
        //     processData: false,
        //     success: function(res){
        //         if(res.code == 200){
        //             self[0].reset();
        //             swal.fire({
        //                 icon: 'success',
        //                 title: 'Done',
        //                 text: res.message,
        //                 timer: 2500,
        //                 showCancelButton: false,
        //                 showConfirmButton: false
        //             })
        //         }
        //         else if(res.code == 505){
        //             swal.fire({
        //                 icon: 'warning',
        //                 title: 'Oops...',
        //                 text: res.message,
        //                 timer: 2500,
        //                 showCancelButton: false,
        //                 showConfirmButton: false
        //               })
        //         }
        //         else{
        //             swal.fire({
        //                 icon: 'warning',
        //                 title: 'Oops...',
        //                 text: "Something went wrong",
        //                 timer: 2500,
        //                 showCancelButton: false,
        //                 showConfirmButton: false
        //               })
        //         }
        //     },
        //     error: function(error){
        //         CAREER24H.utils.handleFormSubmitionError(self, error, 'Something weird occured, please reload the page.');
        //     } 
        //   });
        
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
        let url = '/company/update-profile';
        CAREER24H.utils.activateSpinner();
        let promise = CAREER24H.main.formSubmitPromise(url,formData);
            promise.then((response)=>{
                if(response.code==200){
                    location.reload();
                }
                else{
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
            }, function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            }).catch(function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
    }

    func.loadData = function(){
        if(arguments[0].facebook) $('#facebook').val(arguments[0].facebook);
        if(arguments[0].instagram) $('#instagram').val(arguments[0].instagram);
        if(arguments[0].twitter) $('#twitter').val(arguments[0].twitter);
        if(arguments[0].linkedin) $('#linkedin').val(arguments[0].linkedin);
        if(arguments[1]) $('#info').val(arguments[1]);
    }
    func.toggleSpecificGender = function(e){
        self = e.target;
        if(self.checked){
            $('.gender').css('display','block');
            return;
        }
        $('.gender').css('display','none');
    }

    func.createJob = function(e){
        let jobTitle = $('#job_title').val(),
            description = $('#description').val(),
            jobType = $('#job_type').val(),
            category = $('#category').val(),
            qualification = $('#qualification').val(),
            career_level = $('#career_level').val(),
            yearsOfExperience = $('#years_of_experience').val(),
            pax = $('#pax').val(),
            offerSalary = $('#offer_salary').val(),
            isNegotiable = $('#negotiable')[0].checked ? 1 : 0,
            specificGener = $('#specificGender')[0].checked ? 1 : 0,
            gender =  specificGener ? $('#gender').val() : '',
            deadline = $('#deadline').val(),
            city = $('#city').val(),
            responsibility = $('#responsibility').val(),
            requiredSkill = $('#required_skill').val(),
            benefit = $('#benefit').val(),
            token = $("input[name='_token']").val();

            formData = new FormData();
            formData.append('_token',token);
            formData.append('job_title',jobTitle);
            formData.append('description',description);
            formData.append('category',category);
            formData.append('working_term',jobType);
            formData.append('qualification',qualification);
            formData.append('career_level',career_level);
            formData.append('years_of_experience',yearsOfExperience);
            formData.append('pax',pax);
            formData.append('offer_salary',offerSalary);
            formData.append('is_negotiable',isNegotiable);
            formData.append('is_specific_gender',specificGener);
            formData.append('gender',gender);
            formData.append('deadline',deadline);
            formData.append('responsibility',responsibility);
            formData.append('required_skill',requiredSkill);
            formData.append('benefit',benefit);
            formData.append('city',city);

            let url = '/company/create-job';
            CAREER24H.utils.activateSpinner();
            let promise = CAREER24H.main.formSubmitPromise(url,formData);
            promise.then((response)=>{
                if (response.code == 200) {
                    swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: response.message ? response.message : 'Profile successfully updated.',
                    }).then(()=>{
                        location.reload();
                    });
                } else {
                    swal.fire({
                        title: 'Warning',
                        icon: 'warning',
                        text: response.message ? response.message : 'Unexpected error occured, please reload page.',
                        button: false
                    })
                }
            }, function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            }).catch(function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
        
    }
})(jQuery);