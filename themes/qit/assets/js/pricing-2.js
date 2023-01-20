/**
 * PricingPageNew
 * @type {{init: PricingPageNew.init}}
 */
const PricingPageNew = function () {

    $(document).ready(function () {

        $(window).on("resize", function (e) {
            mobileRemoveText();
        });
        /**
         Remove text from datalist option input range
         */
        mobileRemoveText();

        function mobileRemoveText() {
            var newWindowWidth = $(window).width();
            if (newWindowWidth <= 840) {
                $('.range__list .range__opt span.text').remove();
            } else {
                return;
            }

        }

    });

    var modalArray = {
        expert: '',
        level: '',
        duration: 1,
        price: {
            'Front-end': {
                'Middle': 25,
                'Strong middle': 30,
                'Senior': 40,
            }, 'Back-end': {
                'Middle': 26,
                'Strong middle': 31,
                'Senior': 42,
            }, 'Mobile': {
                'Middle': 28,
                'Strong middle': 33,
                'Senior': 45,
            }, 'Full Stack': {
                'Middle': 35,
                'Strong middle': 40,
                'Senior': 50,
            },
        },
    };

    const DisplayPrice = function () {
        var val = modalArray.price[modalArray.expert][modalArray.level] * modalArray.duration * 168;
        // console.log(modalArray.price[modalArray.expert][modalArray.level]);

        $('.price-notice-container-right.price .endprice,.section__form-row-cost  .col-duration h2').text("$" + val);
        $('.price-notice-container-right.price .col-rating h4.price,.section__form-row-cost .col-rating h2').text("$" + modalArray.price[modalArray.expert][modalArray.level]);

        if ((modalArray['expert'] != "") && (modalArray['level'] != "")) {
            $('.price-notice-container-right.alert').removeClass('d-block').addClass('d-none');
            $('.price-notice-container-right.price').removeClass('d-none').addClass('d-block');
            $('.section__form-row-cost .col-rating,.section__form-row-cost .col-divider,.section__form-row-cost  .col-duration').removeClass('d-none').addClass('d-flex');
            $('.section__form-row-cost p').removeClass('d-none').addClass('d-block');
        }
    }


    /**
     * Creating datalist option. Same width of islands. And color it if less than input
     */

    const inputRadioExpert = function () {
        $('.section__form-row-expert input[type=radio]').change(function () {
            var expert = $(this).val();

            if (modalArray['expert'] == "") {
                $('.modal-subtotal__expert-list.modal-subtotal-list').removeClass('d-none').append('<p></p>');
                $('.modal-subtotal__expert-list.modal-subtotal-list p').text(expert)


            } else {
                $('.modal-subtotal__expert-list.modal-subtotal-list p').text(expert)

            }

            modalArray['expert'] = expert;
            DisplayPrice();

        });

    };
    const inputRadioLevel = function () {
        $('.section__form-row-level input[type=radio]').change(function () {
            var level = $(this).val();

            if (modalArray['level'] == "") {

                $('.modal-subtotal__level-list.modal-subtotal-list ').removeClass('d-none').append('<p></p>');
                $('.modal-subtotal__level-list.modal-subtotal-list p').text(level)


            } else {
                $('.modal-subtotal__level-list.modal-subtotal-list p').text(level)

            }

            modalArray['level'] = level;
            DisplayPrice();

        });

    };
    const inputRange = function () {
        document.getElementById("wpforms-4293-field_15").oninput = function () {
            var value = (this.value - this.min) / (this.max - this.min) * 100;
            var rangeOpt = $('.range__opt');
            var val = $(this).val();
            // $(('.range__opt-') + this.value).addClass('active');
            $(rangeOpt).each(function (index) { // Find every div
                if ($(this).data('month') <= val) {    // if it has an ID of under x
                    $(this).addClass('active');    // add the class
                } else {
                    $(this).removeClass('active');    // add the class
                }

            });
            this.style.background = 'linear-gradient(to right, #363636 0%, #363636 ' + value + '%, #F8F8F8 ' + value + '%, #F8F8F8 100%)'

            if ($(this).val() == 1) {
                $(".wpforms-field-number-slider-hint").addClass('d-none').removeClass('d-block');
                $(".wpforms-field-number-slider-hint-year").addClass('d-none').removeClass('d-block');
                $(".wpforms-field-number-slider-hint-month").addClass('d-block').removeClass('d-none');
            } else if ($(this).val() >= 12) {
                $(".wpforms-field-number-slider-hint").addClass('d-none').removeClass('d-block');
                $(".wpforms-field-number-slider-hint-month").addClass('d-none').removeClass('d-block');
                $(".wpforms-field-number-slider-hint-year").addClass('d-block').removeClass('d-none');
            } else {
                $(".wpforms-field-number-slider-hint").removeClass('d-none').addClass('d-block');
                $(".wpforms-field-number-slider-hint-year").removeClass('d-block').addClass('d-none');
                $(".wpforms-field-number-slider-hint-month").removeClass('d-block').addClass('d-none');
            }

            modalArray.duration = +val;
            if (val <= 1) {
                $('.modal-subtotal__duration-list.modal-subtotal-list p').text(val + ' month');
                $('.section__form-row-cost .col-duration span').text('/ ' + val + ' month');
                $('.price-notice-container-right.price  .duration').text('/ ' + val + ' month');

            } else if (val < 12) {
                $('.modal-subtotal__duration-list.modal-subtotal-list p').text(val + ' months');
                $('.section__form-row-cost .col-duration span').text('/ ' + val + ' months');

                $('.price-notice-container-right.price  .duration').text('/ ' + val + ' months');
            } else if (val >= 12) {
                $('.modal-subtotal__duration-list.modal-subtotal-list p').text('1+ years');
                $('.section__form-row-cost .col-duration span').text('/ 1+ years');

                $('.price-notice-container-right.price .duration').text('/ 1+ years');

            }

            DisplayPrice();
        };
    }
    const PriceFormSubmit = function () {
        $("#wpforms-form-4293").submit(function (e) {
            e.preventDefault();
            if ($.trim($("#wpforms-form-4293 .form-contact__user-name input").val()) === "" || $.trim($(" #wpforms-form-4293 .form-contact__user-email input").val()) === "") {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#wpforms-form-4293')[0].reset();

                        $("#wpforms-form-4293 .wpforms-field input").val('').prop("checked", false);
                    }
                });
            }
        });
    };

    /**
     * Init
     */
    return {
        init: function () {
            var newWindowWidth = $(window).width();
            inputRadioExpert();
            inputRadioLevel();
            inputRange();
            PriceFormSubmit();
            $(document).ready(function () {
                $('#cookie-notice').appendTo('#bottom-row');
                $(".modal-form-bottom").appendTo(".section__banner-contact-row.form-bottom .section__banner-contact-row-left");
                $('.section__banner-contact-row.form-bottom >div ').addClass('row');
                $('.section__form-wrapper-fifth .wpforms-payment-total').html('$ 0');
                $(".wpforms-field-number-slider-hint").addClass('d-none').removeClass('d-block');
                $(".wpforms-field-number-slider-hint-month").addClass('d-block').removeClass('d-none');
                $('#wpforms-4293-field_20-container svg').on('click', function () {
                    $('#wpforms-4293-field_21-container .wpforms-uploader').click();
                });
                if (newWindowWidth > 991) {
                    $("#bottom-row").css({"maxHeight": "200px"}).delay(4000);

                } else if (newWindowWidth < 991) {
                    $("#bottom-row").css({"maxHeight": "400px"}).delay(4000);

                }
                $('#wpforms-form-4293 .section__banner-contact-row-left.col-lg-6').append($('#wpforms-form-4293 > .wpforms-submit-container').append($('<lottie-player src="https://assets4.lottiefiles.com/private_files/lf30_4d2kzehv.json" background="transparent" speed="1" style="width: 26px; height: 26px; display: none" loop="" autoplay="" class="wpforms-submit-spinner lottie-player"></lottie-player>')));
            });

            $('.price-notice-close').on('click', function () {
                $('.price-notice').css('height', 0).css('opacity', 0);

            });
            $('#cn-accept-cookie').on('click', function () {
                $('#cookie-notice').css({"maxHeight": "0px"}).delay(4000);

            });

            DisplayPrice();

            if (newWindowWidth < 576) {
                $('.modal-subtotal__terms').appendTo('#wpforms-433-field_66 .modal-form');

            }

        }
    };
}();

/**
 * ready
 */
jQuery(document).ready(function () {
    PricingPageNew.init();
});

