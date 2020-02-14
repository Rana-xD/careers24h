var CAREER24H;
if(!CAREER24H) CAREER24H = {};
if(!CAREER24H.main) CAREER24H.main = {};

(function($) {
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
})(jQuery);