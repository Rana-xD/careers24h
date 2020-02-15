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

    $(document).ready(function ($) {
        CAREER24H.jobseeker.initializeSummernote();
    });
})(jQuery);