var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.constant) CAREER24H.constant = {};

(function ($) {
  var constant = CAREER24H.constant;
  constant.isCompanyLogoChange = false;
  constant.isWorkToDateIsPresent = false;
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
        // location.reload();
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
    formData.append('phone_number', phone_number);
    formData.append('city', city);
    var fileInput = $('#JobseekerImage').prop('files');

    if (fileInput[0] && CAREER24H.constant.isCompanyLogoChange) {
      var file = fileInput[0];
      formData.append('file', file);
    }

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
})(jQuery);
