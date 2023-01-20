/**
 * OpenPositionPage
 * @type {{init: OpenPositionPage.init}}
 */
const OpenPositionPage = function () {
    const FormSubmit = function () {

        $("#position-form form").submit(function (e) {
            e.preventDefault(); // prevent actual form submit
            if ($.trim($("#position-form .form-contact__user-name input").val()) === "" || $.trim($("#position-form .form-contact__user-email input").val()) === "" || $.trim($("#position-form .form-contact__user-phone input").val()) === "") {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#position-form .wpcf7-list-item').removeClass('checked');
                    }
                });
            }
        });
    }
    /**
     * Init
     */
    return {
        init: function () {
            FormSubmit();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    OpenPositionPage.init();
});
