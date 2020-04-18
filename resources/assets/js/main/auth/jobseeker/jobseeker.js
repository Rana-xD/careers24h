var CAREER24H;
if(!CAREER24H) CAREER24H = {};
if(!CAREER24H.jobseeker) CAREER24H.jobseeker = {};

(function($) {
    var func = CAREER24H.jobseeker;
    func.handleChangePassword = function(e){
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

    func.handleUpdateUserAccount = function(e){
        e.preventDefault();
        self = $(e.target);
        actionUrl = $(self).attr('action');
        formData = new FormData(self.get(0));

        let promise = CAREER24H.main.formSubmitPromise(actionUrl,formData);
            promise.then((response)=>{
                if(response.code == 200){
                    swal.fire({
                        icon: 'success',
                        title: 'Done',
                        text: response.message,
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                    }).then((data)=>{
                        location.reload(true);
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
        
        e.preventDefault();
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
            email = $('#email').val(),
            city = $('#city').val(),
            isPrivate = $('#isPrivate')[0].checked ? 0 : 1,
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
            formData.append('email',email);
            formData.append('phone_number',phone_number);
            formData.append('city',city);
            formData.append('is_private',isPrivate);

            let fileInput = $('#crop_image').val();
            if(fileInput && CAREER24H.constant.isCompanyLogoChange){
                formData.append('image',fileInput);
            }
    
        let url = '/jobseeker/update-profile';
        CAREER24H.utils.activateSpinner();
        let promise = CAREER24H.main.formSubmitPromise(url,formData);
            promise.then((response)=>{
                if(response.code == 200){
                    CAREER24H.utils.deactivateSpinner();
                    location.reload(true);
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

        if(parseInt(arguments[6])) {
            $('#isPrivate').prop('checked', false);
            $('#isPrivate').bootstrapToggle('off')
        }
        if(arguments[7]) {
            $('#experience').val(arguments[7]);
            $('#experience').trigger("chosen:updated");
        }
     }

    // func.updateCoverLetter = function(){
    //     let coverLetter = $('#coverLetter').summernote('code')
    //     token = $("input[name='_token']").val();
        
    //     let formData = new FormData();
    //     formData.append('_token', token);
    //     formData.append('cover_letter', coverLetter);
    //     let url = '/jobseeker/update-cover-letter';
    //     CAREER24H.utils.activateSpinner();
    //     let promise = CAREER24H.main.formSubmitPromise(url,formData);
    //         promise.then((response)=>{
    //             if(response.code == 200){
    //                 location.reload(true);
    //             }
    //             else{
    //                 swal.fire({
    //                     icon: 'warning',
    //                     title: 'Oops...',
    //                     text: response.message,
    //                     timer: 2500,
    //                     showCancelButton: false,
    //                     showConfirmButton: false
    //                   })
    //             }
    //         }, function (error) {
    //             CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    //         }).catch(function (error) {
    //             CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    //         });

    // }

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
        e.preventDefault();
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
        CAREER24H.utils.activateSpinner();
        let url = '/jobseeker/add-education'
        let promise = CAREER24H.main.getRequestPromise(url,formData)
            promise.then((response)=>{
                if(response.code == 200){
                    let htmlRender = $.parseHTML(response.html_render);
                    $('#education').append(htmlRender);
                    $('#addEducationModal').modal('hide');
                }
            }, function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            }).catch(function (error) {
                CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
        // console.log(data);
    }

    func.handleNewWorkSubmit = function(e){
        e.preventDefault();
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
            CAREER24H.utils.activateSpinner();
            let url = '/jobseeker/add-work-experience'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#work_experience').append(htmlRender);
                        $('#addWorkExperienceModal').modal('hide');
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
    }

    func.handleNewSkillSubmit = function(e){
        e.preventDefault();
        let skillName = $('#skill_name').val(),
            percentage = $('#skill_percentage').val();

        let data = {
            'skill' : skillName,
            'percentage' : percentage
        }

        let formData = {
            'skillset' : data
        };
        CAREER24H.utils.activateSpinner();
        let url = '/jobseeker/add-skillset'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#skill').append(htmlRender);
                        $('#addSkillsetModal').modal('hide');
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });

    }

    func.handleNewAchievementSubmit = function(e){
        e.preventDefault();
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
        CAREER24H.utils.activateSpinner();
        let url = '/jobseeker/add-achievement'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#achievement').append(htmlRender);
                        $('#addAchievementModal').modal('hide');
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
                        let card = $(self).parents('.edu-history');
                        $(card).remove();
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
                        let card = $(self).parents('.style2');
                        $(card).remove();
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
                        let card = $(self).parents('.with-edit');
                        $(card).remove();
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

    func.deleteAchievement = function(e){
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
                        let card = $(self).parents('.achieve');
                        $(card).remove();
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

    func.handleEditEducationSubmit = function(e){
        e.preventDefault();
        let title = $('#eduction_title_edit').val(),
            fromDate = $('#education_from_date_edit').val(),
            toDate = $('#education_to_date_edit').val(),
            schoolName = $('#education_school_name_edit').val(),
            description = $('#education_description_edit').val(),
            index = $('#educationIndex').val();

        let data = {
            'title' : title.trim(),
            'from' :  fromDate,
            'to' : toDate,
            'school' : schoolName.trim(),
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
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#education').find("[data-index='"+ index +"']").parents('.edu-history').replaceWith(htmlRender);
                        $('#editEducationModal').modal('hide');
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
    }

    func.showEditWorkExperienceModal = function(e){
        let self = e.target;
        let div = $(self).parents('.edu-history');
        $('#work_title_edit').val($(div).find('.title').clone().children().remove().end().text());
        $('#work_from_date_edit').val($(div).find('.fromDate').val());
        $('#work_company_edit').val($(div).find('.company').text());
        $('#work_description_edit').val($(div).find('.description').text());
        $('#workExperienceIndex').val($(div).find('.editWorkExperience').attr('data-index'));
        if($(div).find('.toDate').val() === 'Now'){
            $('#work_present_edit').prop('checked',true);
            $('#work_present_edit').bootstrapToggle('on');
            $('.edit-work-to-date-div').css('display','none');
        }else{
            $('#work_to_date_edit').val($(div).find('.toDate').val());
        }
        
        $('#editWorkExperienceModal').modal('show');
    }

    func.handleEditWorkExperienceSubmit = function(e){
        e.preventDefault();
        let title = $('#work_title_edit').val(),
            fromDate = $('#work_from_date_edit').val(),
            toDate =  $('#work_present_edit')[0].checked ? 'Now' : $('#work_to_date_edit').val(),
            companyName = $('#work_company_edit').val(),
            description = $('#work_description_edit').val(),
            index = $('#workExperienceIndex').val();

            let data = {
                'title' : title.trim(),
                'from' :  fromDate,
                'to' : toDate,
                'company' : companyName.trim(),
                'description' : description
            };
            let formData = {
                'work_experience' : data,
                'index' : index
            };
            url = '/jobseeker/update-work-experience'
            CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#work_experience').find("[data-index='"+ index +"']").parents('.style2').replaceWith(htmlRender);
                        $('#editWorkExperienceModal').modal('hide');
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
    }

    func.showEditSkillsetModal = function(e){
        let self = e.target;
        let div = $(self).parents('.with-edit');
        $('#skill_name_edit').val($(div).find('.skill').text());
        $('#skill_percentage_edit').val($(div).find('.percentage').val());
        $('#skillsetIndex').val($(div).find('.editSkillset').attr('data-index'));
        $('#editSkillsetModal').modal('show');
    }

    func.handleEditSkillsetSubmit = function(e){
        e.preventDefault();
        let skillName = $('#skill_name_edit').val(),
            percentage = $('#skill_percentage_edit').val(),
            index = $('#skillsetIndex').val();

        let data = {
            'skill' : skillName.trim(),
            'percentage' : percentage
        }

        let formData = {
            'skillset' : data,
            'index' : index
        };
        
        url = '/jobseeker/update-skillset'
            CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#skill').find("[data-index='"+ index +"']").parents('.with-edit').replaceWith(htmlRender);
                        $('#editSkillsetModal').modal('hide');
                    }
                }, function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
    }

    func.showEditAchievementModal = function(e){
        let self = e.target;
        let div = $(self).parents('.edu-history');
        
        $('#achievement_title_edit').val($(div).find('.title').text());
        $('#achievement_from_date_edit').val($(div).find('.fromDate').val());
        $('#achievement_to_date_edit').val($(div).find('.toDate').val());
        $('#achievement_description_edit').val($(div).find('.description').text());
        $('#achievementIndex').val($(div).find('.editAchievement').attr('data-index'));
        $('#editAchievementModal').modal('show');
    }

    func.handleEditAchievementSubmit = function(e){
        e.preventDefault();
        let title = $('#achievement_title_edit').val(),
            fromDate = $('#achievement_from_date_edit').val(),
            toDate = $('#achievement_to_date_edit').val(),
            description = $('#achievement_description_edit').val(),
            index = $('#achievementIndex').val();


        let data = {
            'title' : title,
            'from' :  fromDate,
            'to' : toDate,
            'description' : description
        }
        let formData = {
            'achievement' : data,
            'index' : index
        }
        
        let url = '/jobseeker/update-achievement'
            let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        let htmlRender = $.parseHTML(response.html_render);
                        $('#achievement').find("[data-index='"+ index +"']").parents('.achieve').replaceWith(htmlRender);
                        $('#editAchievementModal').modal('hide');
                    }
                }, function (error) {
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
            });
    }

    func.showAddEducationModal = function(e){
        $('#eduction_title').val('');
        $('#education_from_date').val('');
        $('#education_to_date').val('');
        $('#education_school_name').val('');
        $('#education_description').val('');

        $('#addEducationModal').modal('show');
    }

    func.showAddWorkExperienceModal = function(e){
        $('#work_title').val('');
        $('#work_from_date').val('');
        $('#work_to_date').val('');
        $('#work_company').val('');
        $('#work_description').val('');
        $('#work_present').prop('checked',false);
        $('#work_present').bootstrapToggle('off');

        $('#addWorkExperienceModal').modal('show');
    }

    func.showAddSkillsetModal = function(e){
        $('#skill_name').val('');
        $('#skill_percentage').val('');

        $('#addSkillsetModal').modal('show');
    }

    func.showAddAchievementModal = function(e){
        $('#achievement_title').val('');
        $('#achievement_from_date').val('');
        $('#achievement_to_date').val('');
        $('#achievement_description').val('');


        $('#addAchievementModal').modal('show');
    }


    func.handleVideoInput = function(e){
        let self = e.target;
				if (self.files && self.files[0]) {
                    if($('.video-content').find('#videoThumnail').length){
                        let video = `<video controls width="100%" height="600px" id=""></video>`;
					    $('.video-content').find('#videoThumnail').remove();
					    $('.video-content').append(video);
					    var fileURL = URL.createObjectURL(self.files[0])
                        $('video').attr('src',fileURL)
                        return;
                    }
					var fileURL = URL.createObjectURL(self.files[0])
                    $('video').attr('src',fileURL)
				}
    }

    func.handleVideoUpload = function(e){
        
        let fileInput = $('#videoCV').prop('files');
        if(fileInput[0]){
                if(fileInput[0].size > 30000000){
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Your video size is larger than 30 MB',
                        timer: 2500,
                        showCancelButton: false,
                        showConfirmButton: false
                    })
                    return;
                }
                let file = fileInput[0];
                let formData = new FormData();
                formData.append('file',file);
                formData.append('_token',$("input[name='_token']").val());

                let url = '/jobseeker/upload-videocv';
                CAREER24H.utils.activateSpinner();
                let promise = CAREER24H.main.formSubmitPromise(url,formData);
                promise.then((response)=>{
                    if(response.code == 200){
                        swal.fire({
                            icon: 'success',
                            title: 'Done!',
                            text: response.message,
                            timer: 2500,
                            showCancelButton: false,
                            showConfirmButton: false
                        }).then(()=>{
                            location.reload(true);
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
                    console.log(error)
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                }).catch(function (error) {
                    CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
                });
        }
    }

    func.handleDeleteApplyJob = function(e){
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
                let self = e.target;
                let div = $(self).parents('.action_job');
                let id = $(div).find('.deleteApplyJob').attr('data-id');
        
                let formData = {
                    'id' : id
                }

                url = '/jobseeker/delete-apply-job'
                let promise = CAREER24H.main.getRequestPromise(url,formData)
                promise.then((response)=>{
                    if(response.code == 200){
                        // console.log(response)
                        location.reload(true);
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

    $(document).ready(function ($) {
        CAREER24H.jobseeker.initializeSummernote();
    });
})(jQuery);