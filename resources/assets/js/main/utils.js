var CAREER24H;
if(!CAREER24H) CAREER24H = {};
if(!CAREER24H.utils) CAREER24H.utils = {};

(function($) {
    var func = CAREER24H.utils;

    func.handleFormSubmitionError = function(formEle, error, defaultMessage) {
		swal({
			title: 'Oop!',
			icon: 'error',
			text: error.responseJSON && error.responseJSON.message ? error.responseJSON.message : defaultMessage,
			button: false,
			className: 'custom-swal'
		});
	}
})(jQuery);