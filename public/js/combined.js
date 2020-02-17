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
      text: error.responseJSON && error.responseJSON.message ? error.responseJSON.message : defaultMessage,
      timer: 3000,
      showCancelButton: false,
      showConfirmButton: false
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

  func.getRequestPromise = function (url, formData) {
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
})(jQuery);
