/**
 * HireDev
 * @type {{init: HireDev.init}}
 */
const HireDev = function () {


    /**
     * Slider
     * @constructor
     */
    const Slider = function () {


        const libraryTech = new Swiper(".section__library-row-library", {
            autoplay: {
                delay:5000,
            },

            slidesPerView: 4,
            spaceBetween: 30,
            slidesPerGroup: 4,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                    slidesPerGroup: 2,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    slidesPerGroup: 3,
                },
                1200: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    slidesPerGroup: 4,
                }
            }


        });


    }


    /**
     * Init
     */

    return {
        init: function () {

            Slider();
        }
    };
}();

/**
 * ready
 */
jQuery(document).ready(function () {
    HireDev.init();

});
