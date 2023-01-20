const Header = function () {


    /**
     * Navbar Menu
     */


    $('.rekki-toggler').on("click", function () {
        $("#menu-mobile-menu").toggleClass("d-block");
        $(".animated-icon").toggleClass("open");
    });


    $(document).ready(function () {
        $(window).on("resize", function (e) {
            checkScreenSize();
        });

        checkScreenSize();

        function checkScreenSize() {
            var newWindowWidth = $(window).width();
            if (newWindowWidth < 576) {

                $('.menu-item-has-children .nav-link').on('click', function () {
                    $(this).toggleClass('open');
                    $(this).next('.dropdown-menu').toggleClass('d-block');
                });
                $('.rekki-toggler').on("click", function () {
                    $(".menu-item-has-children .nav-link").removeClass("open");
                    $(".dropdown-menu").removeClass("d-block");
                });
            } else {
                return;
            }

        }
    });

};

$(document).ready(function () {
    console.log('132');
    Header();
});