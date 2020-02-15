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
        info = $('#info').summernote('code'),
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

    func.loadDataForCompanyProfile = function(){
        if(arguments[0].facebook) $('#facebook').val(arguments[0].facebook);
        if(arguments[0].instagram) $('#instagram').val(arguments[0].instagram);
        if(arguments[0].twitter) $('#twitter').val(arguments[0].twitter);
        if(arguments[0].linkedin) $('#linkedin').val(arguments[0].linkedin);
        if(arguments[1]) $('#info').summernote('code',arguments[1]);
        if(arguments[2]){
            $('#city').val(arguments[2]);
            $('#city').trigger("chosen:updated");
        } 

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
            description = $('#description').summernote('code'),
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
            responsibility = $('#responsibility').summernote('code'),
            requiredSkill = $('#required_skill').summernote('code'),
            benefit = $('#benefit').summernote('code'),
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

            // for (var pair of formData.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }
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

    func.loadDataForEditForm = function(){
        if (arguments[0]){
            $('#job_type').val(arguments[0]);
            $('#job_type').trigger("chosen:updated");
        } 
        if (arguments[1]) {
            $('#category').val(arguments[1]);
            $('#category').trigger("chosen:updated");
        }  
        if (arguments[2]) {
            $('#qualification').val(arguments[2]);
            $('#qualification').trigger("chosen:updated");
        }
        if (arguments[3]) {
            $('#career_level').val(arguments[3]);
            $('#career_level').trigger("chosen:updated");
        }
        if (arguments[4]) {
            $('#city').val(arguments[4]);
            $('#city').trigger("chosen:updated");
        }
        if(arguments[5]) $('#description').summernote('code', arguments[5]);
        if(arguments[6]) $('#responsibility').summernote('code', arguments[6]);
        if(arguments[7]) $('#required_skill').summernote('code', arguments[7]);
        if(arguments[8]) $('#benefit').summernote('code', arguments[8]);

        if(!parseInt(arguments[9])){
            $('#negotiable').prop('checked', false);
            $('#negotiable').bootstrapToggle('off');
        }

        if(parseInt(arguments[10])){
            $('#specificGender').prop('checked', true);
            $('#specificGender').bootstrapToggle('on');
            $('.gender').css("display","block");
            $('.gender').val(arguments[11]);
            $('.gender').trigger("chosen:updated");
        }

        if(!parseInt(arguments[12])){
            $('#isActive').prop('checked', false);
            $('#isActive').bootstrapToggle('off')
        }
    }

    func.updateJob = function(){
        let jobTitle = $('#job_title').val()
            isActive = $('#isActive')[0].checked ? 1 : 0,
            description = $('#description').summernote('code'),
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
            responsibility = $('#responsibility').summernote('code'),
            requiredSkill = $('#required_skill').summernote('code'),
            benefit = $('#benefit').summernote('code'),
            token = $("input[name='_token']").val()
            id = $("#jobID").val();

            formData = new FormData();
            formData.append('_token',token);
            formData.append('job_title',jobTitle);
            formData.append('is_active',isActive);
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
            formData.append('id',id);

            // for (var pair of formData.entries()) {
            //     console.log(pair[0]+ ', ' + pair[1]); 
            // }

            let url = '/company/update-job';
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

    func.deleteJob = function(e){
        let self = e.target;
        swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              let uuid = $(self).attr("data-id");
              formData = {
                  "uuid" : uuid
              };
              $.ajax({
                url: '/company/delete-job',
                type: "GET", 
                data: formData,
                contentType: false,
                processData: true,
                success: function(response){
                     if(response.code == 200){
                        let list = $(self).parents('.job-list');
                        $(list).remove();
                        swal.fire(
                         'Deleted!',
                         'Job has been deleted.',
                         'success'
                        )
                     }
                },
                error: function(err){
                    CAREER24H.utils.handleFormSubmitionError(self, _error, 'Something weird occured, please reload the page.');
                } 
              });
            
            }
          })
    }

    func.initializeSummernoteforJob = function () {
        $('#description').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
        });
        
        $('#responsibility').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
        });
        
        $('#required_skill').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
        });
        
        $('#benefit').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
        });
        
        $('#info').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
		});
        
    }

    $(document).ready(function ($) {
        CAREER24H.company.initializeSummernoteforJob();
    });
})(jQuery);