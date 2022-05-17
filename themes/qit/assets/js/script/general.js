/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AllPage = function () {

    /**
     * Header
     */


    const Header = function () {

        /**
         * Navbar Menu
         */


    }

    /**
     * Slider
     * @constructor
     */
    const Slider = function () {

        const swiperwith = new Swiper(".swiper-with", {
            // slidesPerView: 3,
            spaceBetween: 60,
            // centeredSlides: true,
            loop: true,
            slidesPerView: 1,
            // centeredSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        const swiperwithout = new Swiper(".swiper-without", {
            // slidesPerView: 3,
            spaceBetween: 60,
            centeredSlides: true,
            loop: true,
            slidesPerView: "auto",
            // centeredSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });


    }
    /**
     * Init
     */
    return {
        init: function () {
            Header();
            Slider()
        }
    };

}
();

/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();
});


