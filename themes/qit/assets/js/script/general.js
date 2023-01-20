/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AllPage = function () {



    const ContactFormAttacher = function () {

        $('#wpforms-form-783 .form-contact__textarea svg').on('click', function () {
            $('#wpforms-783-field_4-container .wpforms-uploader').click();
        });
        $('#wpforms-form-790 .form-contact__textarea svg').on('click', function () {
            $('#wpforms-790-field_4-container .wpforms-uploader').click();
        });
        $('#wpforms-form-433 .form-contact__textarea svg').on('click', function () {
            $('#wpforms-433-field_71-container .wpforms-uploader').click();
        });
        $('#wpforms-form-1160 .form-contact__textarea svg').on('click', function () {
            $('#wpforms-1160-field_4-container .wpforms-uploader').click();
        });
        $('#wpforms-form-1237 .form-contact__textarea svg').on('click', function () {
            $('#wpforms-1237-field_12-container .wpforms-uploader').click();
        });

        $('#pum-1473 .form-contact__user-textarea svg').on('click', function () {
            $('#pum-1473 .cd-upload-btn').click();
        });
        $('#section-contact .form-contact__user-textarea svg').on('click', function () {
            $('#section-contact .cd-upload-btn').click();
        });
        $('#section-form .form-contact__user-textarea svg').on('click', function () {
            $('#section-form .cd-upload-btn').click();
        });
        $('.position-form .form-contact__user-textarea svg').on('click', function () {
            $('.position-form .cd-upload-btn').click();
        });

    }

    $('#wpforms-145-field_5').on('change', function () {
        let val = $(this).val();
        $(this).addClass('selected');
    });

    const ButtonModalClose = function () {
        $("#wpforms-form-790 button.modal-close").prependTo('#wpforms-form-790 .modal-body');
        $("#wpforms-433-field_66 button.modal-close").prependTo('#wpforms-433-field_66 .modal-body');
        $("#globalModalQuote button.modal-close").prependTo('#globalModalQuote .modal-body');
    }

    const RemoveFile = function () {

        $("#section-contact .remove-file span").on('click', function () {
            alert("The paragraph was clicked.");
        });
    }


    const ResetForm = function () {
        $('#popmake-1473 .pum-close').on('click', function () {
            $('#pum-1473 form')[0].reset();
            $('#pum-1473 .dnd-icon-remove').click();
            $('#pum-1473 input[type=text],#pum-1473 input[type=checkbox],#pum-1473 input[type=email],#pum-1473 textarea,#pum-1473 .form-contact__user-file input').val('');
            $('#pum-1473 .wpcf7-list-item').removeClass('checked');
            $('#menu-mobile-menu').removeClass('d-block');
            $('.rekki-toggler .animated-icon').removeClass('open');

        });

        $("#section-contact form").submit(function (e) {
            e.preventDefault();
            if ($.trim($("#section-contact .form-contact__user-name input").val()) === "" || $.trim($(" #section-contact .form-contact__user-email input").val()) === "") {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#section-contact .wpcf7-list-item').removeClass('checked');
                        $('#menu-mobile-menu').removeClass('d-block');
                        $('.rekki-toggler .animated-icon').removeClass('open');
                    }
                });
            }
        });
        $("#pum-1473 form").submit(function (e) {

            e.preventDefault(); // prevent actual form submit
            if ($.trim($("#pum-1473 .form-contact__user-name input").val()) === "" || $.trim($("#pum-1473 .form-contact__user-email input").val()) === "") {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#pum-1473 .wpcf7-list-item').removeClass('checked');
                        $('#menu-mobile-menu').removeClass('d-block');
                        $('.rekki-toggler .animated-icon').removeClass('open');
                    }
                });
            }
        });
        $("#section-form form").submit(function (e) {
            e.preventDefault(); // prevent actual form submit
            if ($.trim($("#section-form .form-contact__user-name input").val()) === "" || $.trim($("#section-form .form-contact__user-email input").val()) === "" || $.trim($(".form-contact__user-position input").val()) === "" || $.trim($(".form-contact__user-phone input").val() === "")) {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#pum-1473 .wpcf7-list-item').removeClass('checked');
                        $('#menu-mobile-menu').removeClass('d-block');
                        $('.rekki-toggler .animated-icon').removeClass('open');
                    }
                });
            }
        });
        $(".position-form form").submit(function (e) {
            e.preventDefault(); // prevent actual form submit
            if ($.trim($(".position-form .form-contact__user-name input").val()) === "" || $.trim($(".position-form .form-contact__user-email input").val()) === "" || $.trim($(".form-contact__user-last-name input").val() === "")) {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        $('#pum-1473 .wpcf7-list-item').removeClass('checked');
                        $('#menu-mobile-menu').removeClass('d-block');
                        $('.rekki-toggler .animated-icon').removeClass('open');
                    }
                });
            }
        });

    };
    /**
     * Slider
     * @constructor
     */
    const Slider = function () {
        /**

         const swiperwith = new Swiper(".swiper-with", {
            spaceBetween: 60,
            loop: true,
            slidesPerView: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
         */
        const swiperwithout = new Swiper(".swiper-without", {
            centeredSlides: true,
            loop: true,
            slidesPerView: "auto",
            autoplay: {
                delay: 5000,
            }, navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    centeredSlides: false,
                    slidesPerView: 1,
                    spaceBetween: 48,
                    autoHeight: false,
                    calculateHeight: false,

                },
                576: {
                    centeredSlides: true,
                    slidesPerView: "auto",
                },
                1200: {
                    centeredSlides: true,
                    slidesPerView: "auto",
                }
            }

        });
        const swiperComparisons = new Swiper(".swiperComparisons", {
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                breakpoints: {
                    0: {
                        autoHeight: true,
                    },

                    576: {
                        autoHeight: false,

                    },
                }
            },

        });


    }


    /**
     * Customize select dropdowns
     */
    const CustomizeSelects = function () {
        var x, i, j, l, ll, selElmnt, a, b, c, arrow;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("filter-select");
        arrow = '<svg width="16" height="9" viewBox="0 0 16 9" fill="none" xmlns="https://www.w3.org/2000/svg"><path d="M1 1L8 8L15 1" stroke="#363636" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /* For each element, create a new DIV that will act as the selected item: */
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /* For each element, create a new DIV that will contain the option list: */
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 0; j < ll; j++) {
                /* For each option in the original select element,
                create a new DIV that will act as an option item: */
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;

                if (j === 0) {
                    c.setAttribute("class", "selected");
                }

                c.addEventListener("click", function (e) {
                    if (this.classList.contains('selected')) {
                        // return;
                    } else {
                        /* When an item is clicked, update the original select box,
                    and the selected item: */
                        var y, i, k, s, h, sl, yl;
                        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                        sl = s.length;
                        h = this.parentNode.previousSibling;
                        for (i = 0; i < sl; i++) {
                            if (s.options[i].innerHTML == this.innerHTML) {
                                s.selectedIndex = i;
                                h.innerHTML = this.innerHTML;
                                y = this.parentNode.getElementsByClassName("selected");
                                yl = y.length;
                                for (k = 0; k < yl; k++) {
                                    y[k].removeAttribute("class");
                                }
                                break;
                            }
                        }
                        $(this).addClass('selected');
                        h.click();
                        // h.innerHTML += arrow;

                    }
                });

                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function (e) {
                /* When the select box is clicked, close any other select boxes,
                and open/close the current select box: */
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }

        function closeAllSelect(elmnt) {

            /* A function that will close all select boxes in the document,
            except the current select box: */
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }

        }

        document.addEventListener("click", closeAllSelect);
    };



    const CheckboxClass = function () {
        $('#section-contact .form-contact__user-checkbox input').on('click', function () {
            $('.form-contact__user-checkbox .wpcf7-list-item').toggleClass('checked');
        });
        $('#pum-1473 .form-contact__user-checkbox input').on('click', function () {
            $('#pum-1473 .form-contact__user-checkbox .wpcf7-list-item').toggleClass('checked');
        });
        $('#section-form .form-contact__user-checkbox input').on('click', function () {
            $('#section-form .form-contact__user-checkbox .wpcf7-list-item').toggleClass('checked');
        });
        $('.position-form .form-contact__user-checkbox input').on('click', function () {
            $('.position-form .form-contact__user-checkbox .wpcf7-list-item').toggleClass('checked');
        });
    }
    /**
     * Init
     */

    return {
        init: function () {
            var newWindowWidth = $(window).width();
            Slider();
            ContactFormAttacher();
            CustomizeSelects();
            ResetForm();
            CheckboxClass();
            RemoveFile();
            if (newWindowWidth < 576) {
                ButtonModalClose();
            }

        }
    };
}();


/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();
});
