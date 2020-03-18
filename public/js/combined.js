function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.constant) CAREER24H.constant = {};

(function ($) {
  var constant = CAREER24H.constant;
  constant.isCompanyLogoChange = false;
  constant.isWorkToDateIsPresent = false;
  constant.videoDuration = null;
})(jQuery);

var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.utils) CAREER24H.utils = {};

(function ($) {
  var func = CAREER24H.utils;

  func.handleFormSubmitionError = function (formEle, error, defaultMessage) {
    swal.fire({
      title: 'Oop!',
      icon: 'error',
      text: error.responseJSON && error.responseJSON.message ? error.responseJSON.message : defaultMessage
    });
  };

  func.deactivateSpinner = function () {
    $('.spinner').removeClass('active animated bounce infinite');
    $('.spinner-wrapper').removeClass('active');
    $('body').removeClass('spinner-loading');
  };

  func.activateSpinner = function () {
    $('body').addClass('spinner-loading');
    $('.spinner-wrapper').addClass('active');
    $('.spinner').addClass('active animated bounce infinite');
  };
})(jQuery);

var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.main) CAREER24H.main = {};

(function ($) {
  var func = CAREER24H.main;

  func.formSubmitPromise = function (url, formData) {
    return new Promise(function (resolve, reject) {
      $.ajax({
        url: url,
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        success: function success(response) {
          resolve(response);
        },
        error: function (_error) {
          function error(_x) {
            return _error.apply(this, arguments);
          }

          error.toString = function () {
            return _error.toString();
          };

          return error;
        }(function (error) {
          reject(error);
        })
      }).always(function () {
        CAREER24H.utils.deactivateSpinner();
      });
    });
  };

  func.getRequestPromise = function (url) {
    var formData = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : null;
    return new Promise(function (resolve, reject) {
      $.ajax({
        url: url,
        type: 'GET',
        processData: true,
        contentType: false,
        data: formData,
        success: function success(response) {
          resolve(response);
        },
        error: function (_error) {
          function error(_x) {
            return _error.apply(this, arguments);
          }

          error.toString = function () {
            return _error.toString();
          };

          return error;
        }(function (error) {
          reject(error);
        })
      }).always(function () {
        CAREER24H.utils.deactivateSpinner();
      });
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

  func.chooseProfilePicture = function (e) {
    var self = e.target;

    if (self.files && self.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('#ProfileImage').attr('src', e.target.result);
      };

      reader.readAsDataURL(self.files[0]);
      CAREER24H.constant.isCompanyLogoChange = true;
    }
  };

  func.skipProfileSetting = function (e) {
    swal.fire({
      title: 'Are you sure?',
      text: "You can still update your profile in setting",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, skip it!'
    }).then(function (result) {
      if (result.value) {
        CAREER24H.utils.activateSpinner();
        url = '/signup_without_profile';
        var promise = CAREER24H.main.getRequestPromise(url);
        promise.then(function (response) {
          if (response.code == 200) {
            // console.log(response)
            location.replace(response.url);
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

  func.createCompanyProfile = function (e) {
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
    var fileInput = $('#CompanyLogo').prop('files');

    if (fileInput[0] && CAREER24H.constant.isCompanyLogoChange) {
      var file = fileInput[0];
      formData.append('file', file);
    } // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]); 
    // }


    CAREER24H.utils.activateSpinner();
    url = '/signup_with_profile';
    var promise = CAREER24H.main.formSubmitPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        location.replace(response.url);
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

  func.createJobseekerProfile = function (e) {
    var fullName = $('#full_name').val(),
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
        email = $('#email').val(),
        phone_number = $('#phone_number').val(),
        city = $('#city').val(),
        token = $("input[name='_token']").val();
    var social_media = {
      "facebook": facebook,
      "instagram": instagram,
      "twitter": twitter,
      "linkedin": linkedin
    };
    var formData = new FormData();
    formData.append('_token', token);
    formData.append('full_name', fullName);
    formData.append('age', age);
    formData.append('gender', gender);
    formData.append('experience', experience);
    formData.append('industry', industry);
    formData.append('education_level', education_level);
    formData.append('career_level', career_level);
    formData.append('social_media', JSON.stringify(social_media));
    formData.append('email', email);
    formData.append('phone_number', phone_number);
    formData.append('city', city);
    var fileInput = $('#JobseekerImage').prop('files');

    if (fileInput[0] && CAREER24H.constant.isCompanyLogoChange) {
      var file = fileInput[0];
      formData.append('file', file);
    }

    CAREER24H.utils.activateSpinner();
    url = '/signup_with_profile';
    var promise = CAREER24H.main.formSubmitPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        location.replace(response.url);
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

  func.handleApplyJob = function (e) {
    var id = $('#jobId').val();
    formData = {
      'jobId': id
    };
    CAREER24H.utils.activateSpinner();
    var url = '/apply-job';
    var promise = CAREER24H.main.getRequestPromise(url, formData);
    promise.then(function (response) {
      if (response.code == 200) {
        swal.fire({
          title: 'Done!',
          icon: 'success',
          text: response.message
        });
      } else if (response.code == 500) {
        swal.fire(_defineProperty({
          title: '<strong>You can\'t apply for job</strong>',
          icon: 'info',
          html: 'You have to login first',
          showCloseButton: true,
          showCancelButton: true,
          cancelButtonColor: '#32cd32',
          focusConfirm: false,
          confirmButtonText: ' Login',
          confirmButtonAriaLabel: 'Thumbs up, great!',
          cancelButtonText: 'I don\'t have account'
        }, "confirmButtonAriaLabel", 'Thumbs up, great!')).then(function (result) {
          if (result.value) {
            location.replace('/login');
          } else if (result.dismiss === swal.DismissReason.cancel) {
            location.replace('/signup');
          }
        });
      } else if (response.code == 501) {
        swal.fire({
          title: 'Oop!',
          icon: 'warning',
          text: response.message
        });
      }
    }, function (error) {
      console.log(error);
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpectedd error occured, please retry.');
    })["catch"](function (error) {
      CAREER24H.utils.handleFormSubmitionError(self, error, 'Unexpected error occured, please retry.');
    });
  };

  func.handleFilterJob = function (e) {
    var filter = '/jobs/filter?';
    var jobTitle = $('#job_title').val();
    var city = $('.chosen-city').val();
    var jobType = $("input[name='job_type[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();
    var categories = $("input[name='categories[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();
    var careerLevel = $("input[name='career_level[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();
    var educationLevel = $("input[name='qualification[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();
    var gender = $('input[name="gender"]:checked').val();

    if (jobTitle != '') {
      filter = "".concat(filter, "job_title=").concat(jobTitle, "&");
    }

    if (city != '') {
      filter = "".concat(filter, "city=").concat(city, "&");
    }

    if (jobType.length > 0) {
      filter = "".concat(filter, "job_type=").concat(jobType, "&");
    }

    if (categories.length > 0) {
      filter = "".concat(filter, "categories=").concat(categories, "&");
    }

    if (careerLevel.length > 0) {
      filter = "".concat(filter, "career_level=").concat(careerLevel, "&");
    }

    if (gender != undefined) {
      filter = "".concat(filter, "gender=").concat(gender, "&");
    }

    if (educationLevel.length > 0) {
      filter = "".concat(filter, "qualification=").concat(educationLevel, "&");
    }

    window.location = filter.replace(/ /g, '%20'); // swal.fire(filter);
  };

  func.handleFilterCompany = function (e) {
    var filter = '/company/filter?';
    var companyName = $('#company_name').val();

    if (companyName != '') {
      filter = "".concat(filter, "company_name=").concat(companyName, "&");
    }

    var city = $("input[name='city[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();
    var industry = $("input[name='industry[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();
    var teamSize = $("input[name='team_size[]']:checked").map(function (_, el) {
      return $(el).val();
    }).get();

    if (city.length > 0) {
      filter = "".concat(filter, "city=").concat(city, "&");
    }

    if (industry.length > 0) {
      filter = "".concat(filter, "industry=").concat(industry, "&");
    }

    if (teamSize.length > 0) {
      filter = "".concat(filter, "team_size=").concat(teamSize, "&");
    }

    window.location = filter.replace(/ /g, '%20');
  };
})(jQuery);
