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
        $('.rekki-toggler').on('click', function () {
            $('#menu-main-menu').toggleClass('d-block');
            $('.animated-icon').toggleClass('open');
        });

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
            // autoplay: {
            //     delay: 5000,
            // },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        const swiperwithout = new Swiper(".swiper-without", {
            spaceBetween: 60,
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
                // when window width is >= 320px
                0: {
                    centeredSlides: false,
                    slidesPerView: 1,
                    spaceBetween: 48,

                },

                // when window width is >= 640px
                576: {
                    centeredSlides: true,
                    slidesPerView: "auto",

                }
            }

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
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AboutUsPage = function () {

    /**
     * Iframe
     * @constructor
     */
    // const Iframe = function () {
    //     // const iFrame = document.getElementById('about-us-video');
    //     // const ytpTopTitle = iFrame.contentWindow.document.getElementsByClassName('ytp-chrome-top');
    //     // // console.log(ytpTopTitle);
    //     // // iFrame.contentWindow.yourFunction();
    //     // // $( iFrame + '.ytp-chrome-top').addClass( "d-none" );
    //     // $("#about-us-video").contents().find('ytp-chrome-top').addClass('d-none')
    //     // $("iframe").contents().find('body').addClass('foo');
    //     var iframe = document.getElementById("about-us-video");
    //     var elmnt = iframe.contentWindow.document.getElementsByTagName("body")[0];
    //     elmnt.style.display = "none";
    // }


    /**
     * Init
     */
    return {
        init: function () {
            Iframe();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    AllPage.init();
    AboutUsPage.init();
});
