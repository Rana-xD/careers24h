var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.company) CAREER24H.company = {};

(function ($) {
  var func = CAREER24H.company;

  func.handleChangePassword = function (e) {
    e.preventDefault();
    self = $(e.target);
    actionUrl = $(self).attr('action');
    formData = new FormData(self.get(0));
    var promise = CAREER24H.main.formSubmitPromise(actionUrl, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        self[0].reset();
        swal.fire({
          icon: 'success',
          title: 'Done',
          text: response.message,
          timer: 2500,
          showCancelButton: false,
          showConfirmButton: false
        });
      } else {
        swal.fire({
          icon: 'warning',
          title: 'Oops...',
          text: response.message,
          timer: 2500,
          showCancelButton: false,
          showConfirmButton: false
        });
      }
    }, function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.handleUpdateUserAccount = function (e) {
    e.preventDefault();
    self = $(e.target);
    actionUrl = $(self).attr('action');
    formData = new FormData(self.get(0));
    var promise = CAREER24H.main.formSubmitPromise(actionUrl, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        swal.fire({
          icon: 'success',
          title: 'Done',
          text: response.message,
          timer: 2500,
          showCancelButton: false,
          showConfirmButton: false
        }).then(function (data) {
          location.reload(true);
        });
      } else {
        swal.fire({
          icon: 'warning',
          title: 'Oops...',
          text: response.message,
          timer: 2500,
          showCancelButton: false,
          showConfirmButton: false
        });
      }
    }, function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.chooseCompanyLogo = function (e) {
    var self = e.target;

    if (self.files && self.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#logoImage').attr('src', e.target.result);
      };

      reader.readAsDataURL(self.files[0]);
      CAREER24H.constant.isCompanyLogoChange = true;
    }
  };

  func.updateCompanyProfile = function (e) {
    e.preventDefault();
    var name = $("#name").val(),
        startYear = $("#start_year").val(),
        teamSize = $('#team_size').val(),
        info = $('#info').summernote('code'),
        facebook = $('#facebook').val(),
        instagram = $('#instagram').val(),
        twitter = $('#twitter').val(),
        linkedin = $('#linkedin').val(),
        phoneNumber = $('#phone_number').val(),
        email = $('#email').val(),
        website = $('#website').val(),
        city = $('#city').val(),
        industry = $('#industry').val(),
        address = $('#address').val(),
        token = $("input[name='_token']").val();
    var social_media = {
      "facebook": facebook,
      "instagram": instagram,
      "twitter": twitter,
      "linkedin": linkedin
    };
    social_media = JSON.stringify(social_media);
    formData = new FormData();
    formData.append('_token', token);
    formData.append('name', name);
    formData.append('start_year', startYear);
    formData.append('team_size', teamSize);
    formData.append('info', info);
    formData.append('social_media', social_media);
    formData.append('phone_number', phoneNumber);
    formData.append('email', email);
    formData.append('website', website);
    formData.append('city', city);
    formData.append('industry', industry);
    formData.append('address', address);
    var fileInput = $('#crop_image').val();

    if (fileInput && CAREER24H.constant.isCompanyLogoChange) {
      formData.append('image', fileInput);
    } // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]); 
    // }


    var url = '/company/update-profile';
    CAREER24H.utils.activateSpinner();
    var promise = CAREER24H.main.formSubmitPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        location.reload(true);
      } else {
        var message = JSON.parse(res.message);
        swal.fire({
          icon: 'warning',
          title: 'Oops...',
          text: message.file,
          timer: 2500,
          showCancelButton: false,
          showConfirmButton: false
        });
      }
    }, function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.loadDataForCompanyProfile = function () {
    if (arguments[0].facebook) $('#facebook').val(arguments[0].facebook);
    if (arguments[0].instagram) $('#instagram').val(arguments[0].instagram);
    if (arguments[0].twitter) $('#twitter').val(arguments[0].twitter);
    if (arguments[0].linkedin) $('#linkedin').val(arguments[0].linkedin);
    if (arguments[1]) $('#info').summernote('code', arguments[1]);

    if (arguments[2]) {
      $('#city').val(arguments[2]);
      $('#city').trigger("chosen:updated");
    }

    if (arguments[3]) {
      $('#industry').val(arguments[3]);
      $('#industry').trigger("chosen:updated");
    }

    if (arguments[4]) {
      $('#team_size').val(arguments[4]);
      $('#team_size').trigger("chosen:updated");
    }
  };

  func.toggleSpecificGender = function (e) {
    self = e.target;

    if (self.checked) {
      $('.gender').css('display', 'block');
      return;
    }

    $('.gender').css('display', 'none');
  };

  func.loadDefaultDataForWorkDayAndWorkTime = function () {
    $('#work_day_from').val('Mon');
    $('#work_day_from').trigger("chosen:updated");
    $('#work_day_to').val('Fri');
    $('#work_day_to').trigger("chosen:updated");
    $('#work_time_from').val('8:00 AM');
    $('#work_time_to').val('5:00 PM');
  };

  func.createJob = function (e) {
    e.preventDefault();
    var self = $(e.target);
    var jobTitle = $('#job_title').val(),
        description = $('#description').summernote('code'),
        jobType = $('#job_type').val(),
        category = $('#category').val(),
        qualification = $('#qualification').val(),
        // career_level = $('#career_level').val(),
    yearsOfExperience = $('#years_of_experience').val(),
        pax = $('#pax').val(),
        offerSalary = $('#offer_salary').val(),
        isNegotiable = $('#negotiable')[0].checked ? 1 : 0,
        specificGener = $('#specificGender')[0].checked ? 1 : 0,
        gender = specificGener ? $('#gender').val() : '',
        deadline = $('#deadline').val(),
        city = $('#city').val(),
        responsibility = $('#responsibility').summernote('code'),
        requiredSkill = $('#required_skill').summernote('code'),
        benefit = $('#benefit').summernote('code'),
        workDayFrom = $('#work_day_from').val(),
        workDayTo = $('#work_day_to').val(),
        workTimeFrom = $('#work_time_from').val(),
        workTimeTo = $('#work_time_to').val(),
        token = $("input[name='_token']").val();
    var workDay = {
      'from': workDayFrom,
      'to': workDayTo
    };
    var workTime = {
      'from': workTimeFrom,
      'to': workTimeTo
    };
    formData = new FormData();
    formData.append('_token', token);
    formData.append('job_title', jobTitle);
    formData.append('description', description);
    formData.append('category', category);
    formData.append('working_term', jobType);
    formData.append('qualification', qualification); // formData.append('career_level',career_level);

    formData.append('years_of_experience', yearsOfExperience);
    formData.append('pax', pax);
    formData.append('offer_salary', offerSalary);
    formData.append('is_negotiable', isNegotiable);
    formData.append('is_specific_gender', specificGener);
    formData.append('gender', gender);
    formData.append('deadline', deadline);
    formData.append('responsibility', responsibility);
    formData.append('required_skill', requiredSkill);
    formData.append('benefit', benefit);
    formData.append('city', city);
    formData.append('work_day', JSON.stringify(workDay));
    formData.append('work_time', JSON.stringify(workTime));
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      for (var _iterator = formData.entries()[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
        var pair = _step.value;
        console.log(pair[0] + ', ' + pair[1]);
      }
    } catch (err) {
      _didIteratorError = true;
      _iteratorError = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion && _iterator["return"] != null) {
          _iterator["return"]();
        }
      } finally {
        if (_didIteratorError) {
          throw _iteratorError;
        }
      }
    }

    var url = '/company/create-job';
    CAREER24H.utils.activateSpinner();
    var promise = CAREER24H.main.formSubmitPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        swal.fire({
          title: 'Success',
          icon: 'success',
          text: response.message ? response.message : 'Profile successfully updated.'
        }).then(function () {
          self[0].reset();
          $('.chosen').not('.except_reset').val('').trigger('chosen:updated');
          $('#description').summernote('reset');
          $('#responsibility').summernote('reset');
          $('#required_skill').summernote('reset');
          $('#benefit').summernote('reset');
          $('#work_day_from').val('Mon').trigger('chosen:updated');
          $('#work_day_to').val('Fri').trigger('chosen:updated');
          $('#work_time_from').val('8:00 AM');
          $('#work_time_to').val('5:00 PM');
          $('#negotiable').prop('checked', true).bootstrapToggle('on');
          $('#specificGender').prop('checked', false).bootstrapToggle('off');

          if (!$('#specificGender')[0].checked) {
            $('.gender').css("display", "none");
          }
        });
      } else {
        swal.fire({
          title: 'Warning',
          icon: 'warning',
          text: response.message ? response.message : 'Unexpected error occured, please reload page.',
          button: false
        });
      }
    }, function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.loadDataForEditForm = function () {
    if (arguments[0]) {
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
    } // if (arguments[3]) {
    //     $('#career_level').val(arguments[3]);
    //     $('#career_level').trigger("chosen:updated");
    // }


    if (arguments[3]) {
      $('#city').val(arguments[3]);
      $('#city').trigger("chosen:updated");
    }

    if (arguments[4]) $('#description').summernote('code', arguments[4]);
    if (arguments[5]) $('#responsibility').summernote('code', arguments[5]);
    if (arguments[6]) $('#required_skill').summernote('code', arguments[6]);
    if (arguments[7]) $('#benefit').summernote('code', arguments[7]);

    if (!parseInt(arguments[8])) {
      $('#negotiable').prop('checked', false);
      $('#negotiable').bootstrapToggle('off');
    }

    if (parseInt(arguments[9])) {
      $('#specificGender').prop('checked', true);
      $('#specificGender').bootstrapToggle('on');
      $('.gender').css("display", "block");
      $('.gender').val(arguments[10]);
      $('.gender').trigger("chosen:updated");
    }

    if (!parseInt(arguments[11])) {
      $('#isActive').prop('checked', false);
      $('#isActive').bootstrapToggle('off');
    }

    if (arguments[12]) {
      $('#work_day_from').val(arguments[12].from);
      $('#work_day_from').trigger("chosen:updated");
      $('#work_day_to').val(arguments[12].to);
      $('#work_day_to').trigger("chosen:updated");
    }

    if (arguments[13]) {
      $('#work_time_from').val(arguments[13].from);
      $('#work_time_to').val(arguments[13].to);
    }

    if (arguments[14]) {
      $('#years_of_experience').val(arguments[14]);
      $('#years_of_experience').trigger("chosen:updated");
    }
  };

  func.updateJob = function (e) {
    e.preventDefault();
    var jobTitle = $('#job_title').val();
    isActive = $('#isActive')[0].checked ? 1 : 0, description = $('#description').summernote('code'), jobType = $('#job_type').val(), category = $('#category').val(), qualification = $('#qualification').val(), // career_level = $('#career_level').val(),
    yearsOfExperience = $('#years_of_experience').val(), pax = $('#pax').val(), offerSalary = $('#offer_salary').val(), isNegotiable = $('#negotiable')[0].checked ? 1 : 0, specificGener = $('#specificGender')[0].checked ? 1 : 0, gender = specificGener ? $('#gender').val() : '', deadline = $('#deadline').val(), city = $('#city').val(), responsibility = $('#responsibility').summernote('code'), requiredSkill = $('#required_skill').summernote('code'), benefit = $('#benefit').summernote('code'), workDayFrom = $('#work_day_from').val(), workDayTo = $('#work_day_to').val(), workTimeFrom = $('#work_time_from').val(), workTimeTo = $('#work_time_to').val(), token = $("input[name='_token']").val();
    id = $("#jobID").val();
    var workDay = {
      'from': workDayFrom,
      'to': workDayTo
    };
    var workTime = {
      'from': workTimeFrom,
      'to': workTimeTo
    };
    formData = new FormData();
    formData.append('_token', token);
    formData.append('job_title', jobTitle);
    formData.append('is_active', isActive);
    formData.append('description', description);
    formData.append('category', category);
    formData.append('working_term', jobType);
    formData.append('qualification', qualification); // formData.append('career_level',career_level);

    formData.append('years_of_experience', yearsOfExperience);
    formData.append('pax', pax);
    formData.append('offer_salary', offerSalary);
    formData.append('is_negotiable', isNegotiable);
    formData.append('is_specific_gender', specificGener);
    formData.append('gender', gender);
    formData.append('deadline', deadline);
    formData.append('responsibility', responsibility);
    formData.append('required_skill', requiredSkill);
    formData.append('benefit', benefit);
    formData.append('city', city);
    formData.append('id', id);
    formData.append('work_day', JSON.stringify(workDay));
    formData.append('work_time', JSON.stringify(workTime)); // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]); 
    // }

    var url = '/company/update-job';
    CAREER24H.utils.activateSpinner();
    var promise = CAREER24H.main.formSubmitPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        swal.fire({
          title: 'Success',
          icon: 'success',
          text: response.message ? response.message : 'Profile successfully updated.'
        }).then(function () {
          location.reload(true);
        });
      } else {
        swal.fire({
          title: 'Warning',
          icon: 'warning',
          text: response.message ? response.message : 'Unexpected error occured, please reload page.',
          button: false
        });
      }
    }, function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.deleteJob = function (e) {
    var self = e.target;
    swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then(function (result) {
      if (result.value) {
        var uuid = $(self).attr("data-id");
        formData = {
          "uuid": uuid
        };
        $.ajax({
          url: '/company/delete-job',
          type: "GET",
          data: formData,
          contentType: false,
          processData: true,
          success: function success(response) {
            if (response.code == 200) {
              var list = $(self).parents('.job-list');
              $(list).remove();
              swal.fire('Deleted!', 'Job has been deleted.', 'success');
            }
          },
          error: function error(err) {
            CAREER24H.utils.handleFormSubmitionError(self, _error, 'Something weird occured, please reload the page.');
          }
        });
      }
    });
  };

  func.initializeSummernoteforJob = function () {
    $('#description').summernote({
      toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['para', ['ul', 'ol', 'paragraph']]]
    });
    $('#responsibility').summernote({
      toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['para', ['ul', 'ol', 'paragraph']]]
    });
    $('#required_skill').summernote({
      toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['para', ['ul', 'ol', 'paragraph']]]
    });
    $('#benefit').summernote({
      toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['para', ['ul', 'ol', 'paragraph']]]
    });
    $('#info').summernote({
      toolbar: [['style', ['style']], ['font', ['bold', 'underline', 'clear']], ['para', ['ul', 'ol', 'paragraph']]]
    });
  };

  func.loadTotalApplicants = function (e) {
    var applicants = 0;
    var row = $('tbody').children();

    for (var i = 0; i < row.length; i++) {
      applicants += parseInt($(row[i]).find('.applied-field').attr('data-no'));
    }

    $('.application').text(applicants);
  }; // func.showCoverLetterModal = function(e){
  //     let self = e.target;
  //     let profileId = $(self).parents('.emply-resume-list').find('.applicant-id').val();
  //     let url = '/company/get-cover-letter';
  //     let formData = {
  //         'profileId' : profileId
  //     }
  //     CAREER24H.utils.activateSpinner();
  //     let promise = CAREER24H.main.getRequestPromise(url,formData)
  //     promise.then((response)=>{
  //         if(response.code == 200){
  //             let htmlRender = $.parseHTML(response.html_render)
  //             $('.modal-contents').html(htmlRender);
  //             $('#coverLetterModal').modal('show');
  //         }
  //         else{
  //             swal.fire({
  //                 title : 'Opps',
  //                 icon: 'warning',
  //                 text: response.message,
  //                 timer: 2500,
  //                 showCancelButton: false,
  //                 showConfirmButton: false
  //             })
  //         }
  //     }, function (error) {
  //         console.log(error)
  //         CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
  //     }).catch(function (error) {
  //         CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
  //     });
  // }


  func.showVideoCVModal = function (e) {
    var self = e.target;
    var profileId = $(self).parents('.cv__Info').find('.applicant-id').val();
    var url = '/company/get-video-cv';
    var formData = {
      'profileId': profileId
    };
    var promise = CAREER24H.main.getRequestPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        var htmlRender = $.parseHTML(response.html_render);
        $('.modal-contents').html(htmlRender);
        $('#videoCVModal').modal('show');
      } else {
        swal.fire({
          title: 'Opps',
          icon: 'warning',
          text: response.message,
          timer: 2500,
          showCancelButton: false,
          showConfirmButton: false
        });
      }
    }, function (error) {
      console.log(error);
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.showResumeModal = function (e) {
    var self = e.target;
    var profileId = $(self).parents('.cv__Info').find('.applicant-id').val();
    var url = '/company/get-resume';
    var formData = {
      'profileId': profileId
    };
    var promise = CAREER24H.main.getRequestPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        var htmlRender = $.parseHTML(response.html_render);
        $('.modal-contents').html(htmlRender);
        $('#resumeModal').modal('show');
      }
    }, function (error) {
      console.log(error);
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.handleAcceptApplicant = function (e) {
    var self = e.target;
    swal.fire({
      title: 'Are you sure?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then(function (result) {
      if (result.value) {
        var _id = $(self).parents('.emply-resume-list').find('.pivot-id').val();

        formData = {
          "id": _id
        };
        var url = '/company/accept-applicant';
        var promise = CAREER24H.main.getRequestPromise(url, formData);
        promise.then(function (response) {
          if (response.code == 200) {
            location.reload(true);
          }
        }, function (error) {
          console.log(error);
          CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
        })["catch"](function (error) {
          CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
        });
      }
    });
  };

  func.handleRejectApplicant = function (e) {
    var self = e.target;
    swal.fire({
      title: 'Are you sure?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then(function (result) {
      if (result.value) {
        var _id2 = $(self).parents('.emply-resume-list').find('.pivot-id').val();

        formData = {
          "id": _id2
        };
        var url = '/company/reject-applicant';
        var promise = CAREER24H.main.getRequestPromise(url, formData);
        promise.then(function (response) {
          if (response.code == 200) {
            location.reload(true);
          }
        }, function (error) {
          console.log(error);
          CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
        })["catch"](function (error) {
          CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
        });
      }
    });
  };

  func.handleInterviewDate = function (e) {
    var self = e.target;
    var id = $(self).parents('.emply-resume-list').find('.pivot-id').val();
    $('#pivot-id-modal').val(id);
    $('#interviewdateModal').modal('show');
  };

  func.handleSetInterviewDate = function (e) {
    var interviewDate = $('#datepicker_date').val(),
        isOnline = $('#online-interview')[0].checked ? 1 : 0,
        pivotId = $('#pivot-id-modal').val();
    var formData = {
      'id': pivotId,
      'is_online': isOnline,
      'interview_date': interviewDate
    };
    var url = '/company/set-interview-date';
    CAREER24H.utils.activateSpinner();
    var promise = CAREER24H.main.getRequestPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        location.reload(true);
      }
    }, function (error) {
      console.log(error);
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.initializeDateTimePicker = function (e) {
    $('#datetimepicker').datetimepicker({
      icons: {
        up: 'fa fa-angle-up',
        down: 'fa fa-angle-down',
        next: 'fa fa-angle-right',
        previous: 'fa fa-angle-left'
      },
      widgetPositioning: {
        horizontal: 'right',
        vertical: 'auto'
      },
      inline: true,
      sideBySide: true,
      locale: 'kh'
    });
    $('#datetimepicker').on('dp.change', function (event) {
      var formatted_date = event.date.format('MM/DD/YYYY h:mm A');
      $('#datepicker_date').val(formatted_date);
    });
  };

  $(document).ready(function ($) {
    CAREER24H.company.initializeSummernoteforJob();
  });
})(jQuery);
