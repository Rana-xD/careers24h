var CAREER24H;
if (!CAREER24H) CAREER24H = {};
if (!CAREER24H.company) CAREER24H.company = {};

(function ($) {
  var func = CAREER24H.company;

  func.changePassword = function (e) {
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
      success: function success(res) {
        if (res.code == 200) {
          self[0].reset();
          swal.fire({
            icon: 'success',
            title: 'Done',
            text: res.message,
            timer: 2500,
            showCancelButton: false,
            showConfirmButton: false
          });
        } else if (res.code == 505) {
          swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: res.message,
            timer: 2500,
            showCancelButton: false,
            showConfirmButton: false
          });
        } else {
          swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: "Something went wrong",
            timer: 2500,
            showCancelButton: false,
            showConfirmButton: false
          });
        }
      },
      error: function error(_error) {
        CAREER24H.utils.handleFormSubmitionError(self, _error, 'Something weird occured, please reload the page.');
      }
    });
  };
})(jQuery);
