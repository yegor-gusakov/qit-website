
/**
 * PricingPage
 * @type {{init: PricingPage.init}}
 */
const PricingPage = function () {
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
                $('.range__list .range__opt span.text.month').remove();
            } else {
                return;
            }

        }

    });

    var modalArray = {
        specialist: [],
        industry: '',
        duration: '',
    };

    const NumberFields = function () {
        $(".rekki-number-field").wrapAll('<div class="rekki rekki__wrapper section__form-row-technologies section__form-wrapper-second" />');

        /**
         * Wrapping elements technologies section
         **/
        $(".rekki-number-field.front-end").wrapAll('<div class="rekki__wrapper-lang rekki__wrapper-lang-front-end" id="front-end"/>');
        $(".rekki-number-field.mobile").wrapAll('<div class="rekki__wrapper-lang rekki__wrapper-lang-mobile" id="mobile" />');
        $(".rekki-number-field.back-end").wrapAll('<div class="rekki__wrapper-lang rekki__wrapper-lang-back-end" id="back-end" />');
        $(".rekki-number-field.infrastructure").wrapAll('<div class="rekki__wrapper-lang rekki__wrapper-lang-infrastructure" id="infrastructure" />');

        /**
         * Wrapping section form
         **/
        $(".section__form-wrapper-first").wrapAll('<div class="section__form-wrapper section__form-wrapper-first" />');
        $(".section__form-wrapper-second").wrapAll('<div class="section__form-wrapper section__form-wrapper-second" />');
        $(".section__form-wrapper-third").wrapAll('<div class="section__form-wrapper section__form-wrapper-third" />', 's');
        $(".section__form-wrapper-fourth").wrapAll('<div class="section__form-wrapper section__form-wrapper-fourth" />');

    }

    /**
     * Create accordion for choosing experts
     */
    const MobileWrapperAccordion = function () {
        var ids = [''];
        var elements = $('.rekki__wrapper-lang').map(function () {
            ids.push($(this).attr('id'));
        });
        $(".rekki__wrapper-lang").wrap('<div class="accordion-body accordion-body-team"/>');
        $(".accordion-body-team").wrap('<div class="accordion-collapse accordion-collapse-team collapse"/>');
        $(".accordion-collapse-team").wrap('<div class="accordion-item accordion-item-team" />');
        for (i = 0; i < ids.length; ++i) {
            var header = '<h2 class="accordion-header" id="heading' + ids[i] + '"/>';
            var button = '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' + ids[i] + '" aria-expanded="false" aria-controls="collapse' + ids[i] + '">' + ids[i] + '<svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M1 1L8 8L15 1" stroke="#363636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>';
            $('.accordion-item:nth-child(' + i + ')').prepend(header);
            $('.accordion-item:nth-child(' + i + ') h2').prepend(button);
            $('.accordion-item:nth-child(' + i + ') .accordion-collapse').attr('id', 'collapse' + ids[i]);
        }
        $(".accordion-item-team").wrapAll('<div class="accordion" id="accordionTeam"/>')

    }

    const MobileWrapperAccordionModal = function () {
        var subtotals = $('.modal-subtotal');
        subtotals.wrap('<div class="accordion-body accordion-body-subtotal"/>')
        $(".accordion-body-subtotal").wrap('<div  id="subtotal" class="accordion-collapse accordion-collapse-subtotal collapse"/>');
        $(".accordion-collapse-subtotal").wrap('<div class="accordion-item accordion-item-subtotal" />');
        $('.accordion-item-subtotal').prepend('<h2 class="accordion-header d-block" id="subtotal"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#subtotal" aria-expanded="false" aria-controls="subtotal">You chose<svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M1 1L8 8L15 1" stroke="#363636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button></h2>')
        $(".accordion-item-subtotal").wrapAll('<div class="accordion" id="accordionSubtotal"/>')
        $("#accordionSubtotal").appendTo('#wpforms-form-433 .modal-form');

    }

    /**
     * Creating datalist option. Same width of islands. And color it if less than input
     */
    const inputRange = function () {
        document.getElementById("wpforms-433-field_2").oninput = function () {
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
            if ($(this).val() >= 12) {
                $(".wpforms-field-number-slider-hint").addClass('d-none').removeClass('d-block');
                $(".wpforms-field-number-slider-hint-year").addClass('d-block').removeClass('d-none');
            } else {
                $(".wpforms-field-number-slider-hint").removeClass('d-none').addClass('d-block');
                $(".wpforms-field-number-slider-hint-year").removeClass('d-block').addClass('d-none');

            }
        };
    }

    const QtyButtons = function () {
        $('.wpforms-field-number.rekki-number-field input').change(function () {
            var labelText = $('label[for=' + $(this).attr('id') + ']').text();

            var index = modalArray.specialist.findIndex(x => x.name == labelText);

            index === -1 ? modalArray.specialist.push({
                name: labelText,
                count: $(this).val()
            }) : modalArray.specialist.splice(index, 1, {name: labelText, count: $(this).val()});

        })
        /**
         *Add Quantity buttons for choose experts price page
         */
        $(function () {
            var field = $('.wpforms-field-number.rekki-number-field input');
            $(field).attr('max', '99');
            $(field).attr('min', '0');
            $(field).wrap('<div class="counter">');
            $('<div class="button plus">+</div>').insertAfter(field);
            $('<div class="button minus">-</div>').insertBefore(field);
        });

        $(function () {
            $(".wpforms-field-number.rekki-number-field input").change(function () {
                var max = parseInt($(this).attr('max'));
                if ($(this).val() > max) {
                    $(this).val(max);
                } else if ($(this).val() < min) {
                    $(this).val(min);
                }
            });
        });

        /**
         * Quantity buttons input
         */
        $('.rekki-number-field').on('click', 'div.plus, div.minus', function () {
            var qty = $(this).closest('.rekki-number-field').find('input');
            var val = parseFloat(qty.val());
            if ($(this).is('.plus')) {
                if (val >= 99) {
                    return;
                } else {
                    qty.val(val + 1);
                }
            } else {
                if (val <= 0) {
                    return;
                } else {
                    qty.val(val - 1);
                }
            }
            var labelText = $('label[for=' + $(qty).attr('id') + ']').text();

            var index = modalArray.specialist.findIndex(x => x.name == labelText);

            index === -1 ? modalArray.specialist.push({
                name: labelText,
                count: qty.val()
            }) : modalArray.specialist.splice(index, 1, {name: labelText, count: qty.val()});

        });
    }

    /**
     * Add form to modal window on price page
     */
    const ModalPriceCount = function () {
        $(".modal-form-price").appendTo("#priceModal .modal-form");
    }

    /**
     * Changing modal window with new selected elements from price page
     */
    const ChangeModalPriceTotal = function () {

        $('button[data-bs-target="#priceModal"]').on('click', function () {
            var specialistsList = $('.modal-subtotal__specialists-list');
            var industryList = $('.modal-subtotal__industry-list');
            var durationList = $('.modal-subtotal__duration-list');

            // if((modalArray['industry']  && modalArray['duration']) != false){
            var found = false;
            for (var i = 0; i < modalArray.specialist.length; i++) {
                if (modalArray.specialist[i].count != '0') {
                    found = true;
                } else {
                }
            }

            var industry = $('.section__form-row-industry .wpforms-selected input').val();
            var duration = $('.wpforms-field-number-slider input').val();
            modalArray['industry'] = industry;
            modalArray['duration'] = duration;

            if (found == false) {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#wpforms-433-field_20-container").offset().top - 45
                }, 100);
                $("#wpforms-433-field_20-container").append($('<div class="notice-error notice-error-specialist">').text('Please choose at least one specialist'));

                setTimeout(() => {
                    $(".notice-error").css('height', 0).css('padding', 0);
                    setTimeout(() => {
                        $(".notice-error").remove();
                    }, 500);
                }, 4000); // 👈️ time in milliseconds

            }
            if (modalArray['industry'] == undefined) {
                $([document.documentElement, document.body]).animate({
                    scrollTop: $("#wpforms-433-field_21-container").offset().top - 45
                }, 100);
                $("#wpforms-433-field_21-container").append($('<div class="notice-error notice-error-specialist">').text('Please choose industry'));

                setTimeout(() => {
                    $(".notice-error").css('height', 0).css('padding', 0);
                    setTimeout(() => {
                        $(".notice-error").remove();
                    }, 500);
                }, 4000); // 👈️ time in milliseconds

            }
            if (modalArray['duration'] == false) {
            }


            if ((modalArray['industry'] != undefined) && (modalArray['duration'] != false) && (found != false)) {
                $.each(modalArray.specialist, function (key, value) {
                    if (value.count > 0) {
                        $(specialistsList).append('<li><p><span class="specialist">' + value.name + '</span><span class="count">x' + value.count + '</span></p> </li>');
                    } else {
                        return;
                    }

                });
                if (industry) {
                    $(industryList).append('<li><p>' + industry + '</p></li>');
                }
                if (duration) {
                    $(durationList).append('<li><p>' + duration + ' ' + 'months</p></li>');
                }
                $("#priceModal").modal('show');
            } else {
            }
        });

        $('button[data-bs-dismiss="modal"]').on('click', function () {
            var specialistsList = $('.modal-subtotal__specialists-list');
            var industryList = $('.modal-subtotal__industry-list');
            var durationList = $('.modal-subtotal__duration-list');

            specialistsList.empty();
            industryList.empty();
            durationList.empty();
        });

        $('form#wpforms-form-433').bind('ajax:complete', function () {
            $('#priceModal').modal('hide');
        });
        $(document).on('keydown', function (event) {
            if (event.key == "Escape") {
                var specialistsList = $('.modal-subtotal__specialists-list');
                var industryList = $('.modal-subtotal__industry-list');
                var durationList = $('.modal-subtotal__duration-list');

                specialistsList.empty();
                industryList.empty();
                durationList.empty();
            }
        });

    }

    /**
     * Close accordeon when user click description
     */
    const CloseAccordion = function () {
        $('.accordion-body-subtotal').on('click', function () {
            $('button[data-bs-target="#subtotal"]').click();
        })
    }
    /**
     * Init
     */
    return {
        init: function () {
            var newWindowWidth = $(window).width();
            NumberFields();
            inputRange();
            QtyButtons();
            ChangeModalPriceTotal();
            if (newWindowWidth < 576) {
                MobileWrapperAccordion();
                MobileWrapperAccordionModal();
                $('.modal-subtotal__terms').appendTo('#wpforms-433-field_66 .modal-form');
                CloseAccordion();

            }
            ModalPriceCount();

        }
    };
}();


/**
 * PricingPage
 * @type {{init: PricingPage.init}}
 */

/**
 * ready
 */
jQuery(document).ready(function () {
    PricingPage.init();
});
