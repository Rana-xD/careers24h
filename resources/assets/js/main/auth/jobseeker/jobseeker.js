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
        CAREER24H.utils.activateSpinner();
        let promise = CAREER24H.main.formSubmitPromise(actionUrl,formData)
            promise.then((response)=>{
                if(response.code===200){
                    self[0].reset();
                    swal.fire({
                        icon: 'success',
                        title: 'Done',
                        text: response.message,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                    })
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
        let url = '/jobseeker/update-profile';
        CAREER24H.utils.activateSpinner();
        let promise = CAREER24H.main.formSubmitPromise(url,formData);
            promise.then((response)=>{
                if(response.code == 200){
                    CAREER24H.utils.deactivateSpinner();
                    location.reload();
                    // console.log(res.message);
                    // swal.fire(res.message);
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

        
    func.loadDataForJobseekerProfile = function(){
        if(arguments[0].facebook) $('#facebook').val(arguments[0].facebook);
        if(arguments[0].instagram) $('#instagram').val(arguments[0].instagram);
        if(arguments[0].twitter) $('#twitter').val(arguments[0].twitter);
        if(arguments[0].linkedin) $('#linkedin').val(arguments[0].linkedin);
        if(arguments[1]) {
            $('#industry').val(arguments[1]);
            $('#industry').trigger("chosen:updated");
        }
        if(arguments[2]) {
            $('#education_level').val(arguments[2]);
            $('#education_level').trigger("chosen:updated");
        }
        if(arguments[3]) {
            $('#career_level').val(arguments[3]);
            $('#career_level').trigger("chosen:updated");
        }
        if(arguments[4]) {
            $('#gender').val(arguments[4]);
            $('#gender').trigger("chosen:updated");
        }
        if(arguments[5]) {
            $('#city').val(arguments[5]);
            $('#city').trigger("chosen:updated");
        }
     }

    func.updateCoverLetter = function(){
        let coverLetter = $('#coverLetter').summernote('code')
        token = $("input[name='_token']").val();
        
        let formData = new FormData();
        formData.append('_token', token);
        formData.append('cover_letter', coverLetter);
        let url = '/jobseeker/update-cover-letter';
        CAREER24H.utils.activateSpinner();
        let promise = CAREER24H.main.formSubmitPromise(url,formData);
            promise.then((response)=>{
                if(response.code == 200){
                    location.reload();
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

    func.initializeSummernote = function(){
        $('#coverLetter').summernote({
        	toolbar: [
          		['style', ['style']],
				  ['font', ['bold', 'underline', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
        	]
		});
    }

    func.handleNewEducationSubmit = function(e){
        let title = $('#eduction_title').val(),
            fromDate = $('#education_from_date').val(),
            toDate = $('#education_to_date').val(),
            schoolName = $('#education_school_name').val(),
            description = $('#education_description').val();

        let data = {
            'title' : title,
            'from' :  fromDate,
            'to' : toDate,
            'school' : schoolName,
            'description' : description
        };
        let formData = {
            'education' : data
        };
        let url = '/jobseeker/add-education'
        let promise = CAREER24H.main.getRequestPromise(url,formData)
            promise.then((response)=>{
                if(response.code == 200){
                    swal.fire({
                        title: 'Success',
                        icon: 'success',
                        text: response.message ? response.message : 'Profile successfully updated.',
                    })
                }
            }, function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            }).catch(function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
        // console.log(data);
    }

    func.handleNewWorkSubmit = function(e){
        let title = $('#work_title').val(),
            fromDate = $('#work_from_date').val(),
            toDate =  $('#work_present')[0].checked ? 'Now' : $('#work_to_date').val(),
            companyName = $('#work_company').val(),
            description = $('#work_description').val();

            let data = {
                'title' : title,
                'from' :  fromDate,
                'to' : toDate,
                'company' : companyName,
                'description' : description
            };
            let formData = {
                'work_experience' : data
            };
            let url = '/jobseeker/add-work-experience'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message ? response.message : 'Profile successfully updated.',
                        })
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
    }

    func.handleNewSkillSubmit = function(e){
        let skillName = $('#skill_name').val(),
            percentage = $('#skill_percentage').val();

        let data = {
            'skill' : skillName,
            'percentage' : percentage
        }

        let formData = {
            'skillset' : data
        };
        let url = '/jobseeker/add-skillset'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message ? response.message : 'Profile successfully updated.',
                        })
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });

    }

    func.handleNewAchievementSubmit = function(e){
        let title = $('#achievement_title').val(),
            fromDate = $('#achievement_from_date').val(),
            toDate = $('#achievement_to_date').val(),
            description = $('#achievement_description').val();

        let data = {
            'title' : title,
            'from' :  fromDate,
            'to' : toDate,
            'description' : description
        }
        let formData = {
            'achievement' : data
        }
        let url = '/jobseeker/add-achievement'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message ? response.message : 'Profile successfully updated.',
                        })
                    }
                }, function (error) {
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
    }

    func.deleteEducation = function(e){
        let self = e.target;
        let index = $(self).hasClass('removeEducation') ? $(self).attr("data-index") : $(self).parents('.removeEducation').attr("data-index");
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
                let url = '/jobseeker/delete-education'
                let formData = {
                    'index' : index
                };
                CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        location.reload();
                    }
                }, function (error) {
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
            }
          }) 
    }

    func.deleteWorkExperience = function(e){
        let self = e.target;
        let index = $(self).hasClass('removeWorkExperience') ? $(self).attr("data-index") : $(self).parents('.removeWorkExperience').attr("data-index");
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
                let url = '/jobseeker/delete-work-experiece'
                let formData = {
                    'index' : index
                };
                CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        location.reload();
                    }
                }, function (error) {
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
            }
          }) 
    }

    func.deleteSkillset = function(e){
        let self = e.target;
        let index = $(self).hasClass('removeSkillset') ? $(self).attr("data-index") : $(self).parents('.removeSkillset').attr("data-index");
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
                let url = '/jobseeker/delete-skillset'
                let formData = {
                    'index' : index
                };
                CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        location.reload();
                    }
                }, function (error) {
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
            }
          }) 
    }

    func.removeAchievement = function(e){
        let self = e.target;
        let index = $(self).hasClass('removeAchievement') ? $(self).attr("data-index") : $(self).parents('.removeAchievement').attr("data-index");
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
                let url = '/jobseeker/delete-achievement'
                let formData = {
                    'index' : index
                };
                CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        location.reload();
                    }
                }, function (error) {
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
            }
          }) 
    }

    func.showEditEducationModal = function(e){
        let self = e.target;
        let div = $(self).parents('.edu-history');
    
    
        $('#eduction_title_edit').val($(div).find('.title').text());
        $('#education_from_date_edit').val($(div).find('.fromDate').val());
        $('#education_to_date_edit').val($(div).find('.toDate').val());
        $('#education_school_name_edit').val($(div).find('.school_name').text());
        $('#education_description_edit').val($(div).find('.description').text());
        $('#educationIndex').val($(div).find('.editEducation').attr('data-index'));
        $('#editEducationModal').modal('show');
    }

    func.handleEditEducationSubmit = function(){
        let title = $('#eduction_title_edit').val(),
            fromDate = $('#education_from_date_edit').val(),
            toDate = $('#education_to_date_edit').val(),
            schoolName = $('#education_school_name_edit').val(),
            description = $('#education_description_edit').val(),
            index = $('#educationIndex').val();

        let data = {
            'title' : title,
            'from' :  fromDate,
            'to' : toDate,
            'school' : schoolName,
            'description' : description,
        };

        let formData = {
            'education' : data,
            'index' : index
        }
        url = '/jobseeker/update-education'
        CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        $('#editEducationModal').modal('hide');
                        location.reload();
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
    }

    $(document).ready(function ($) {
        CAREER24H.jobseeker.initializeSummernote();
    });
})(jQuery);