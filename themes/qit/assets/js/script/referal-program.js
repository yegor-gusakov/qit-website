/**
 * ReferelPage
 * @type {{init: ReferelPage.init}}
 */
const ReferralPage = function () {
    const FormSubmitReferral = function () {

        $("#section-form form").submit(function (e) {
            e.preventDefault(); // prevent actual form submit
            if ($.trim($("#section-form .form-contact__user-position input").val()) === "" || $.trim($("#section-form .form-contact__user-name input").val()) === "" || $.trim($("#section-form .form-contact__user-email input ").val()) === ""|| $.trim($("#section-form .form-contact__user-phone input ").val()) === ""|| $.trim($("#section-form .form-contact__user-city input ").val()) === "") {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#section-form .wpcf7-list-item').removeClass('checked');
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
            FormSubmitReferral();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    ReferralPage.init();
});
