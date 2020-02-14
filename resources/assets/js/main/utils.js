var CAREER24H;
if(!CAREER24H) CAREER24H = {};
if(!CAREER24H.utils) CAREER24H.utils = {};

(function($) {
    var func = CAREER24H.utils;

    func.handleFormSubmitionError = function(formEle, error, defaultMessage) {
		swal.fire({
			title: 'Oop!',
			icon: 'error',
			text: error.responseJSON && error.responseJSON.message ? error.responseJSON.message : defaultMessage,
			timer: 3000,
            showCancelButton: false,
            showConfirmButton: false
		});
	}

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