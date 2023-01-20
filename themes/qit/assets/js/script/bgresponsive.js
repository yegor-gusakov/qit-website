/**
 * BgResponsive
 * @type {{init: BgResponsive.init}}
 */
const BgResponsive = function () {

    /**
     * Background responsive
     */
    const bgResponsive = function () {
            // var newWindowWidth = $(window).width();
            var newWindowWidth2 = window.innerWidth;

            var $heroSection = document.getElementById('section_hero');

            var tabletBG = $heroSection.dataset.bgTablet // "3"
            var mobileBG = $heroSection.dataset.bgMobile // "3"
            if ((newWindowWidth2 > 768) && (newWindowWidth2 < 992)) {
                if ($heroSection.dataset.bgTablet) {
                    // $bgtablet = $heroSection.data('bg-tablet');
                    $heroSection.style.backgroundImage = 'linear-gradient(90deg, #00000099 26.58%, rgba(0, 0, 0, 0.38) 197%),url(' + tabletBG + ')';
                }
            };
            if (newWindowWidth2 < 767) {
                if ($heroSection.dataset.bgMobile) {
                    $heroSection.style.backgroundImage = 'linear-gradient(90deg, #00000099 26.58%, rgba(0, 0, 0, 0.38) 197%),url(' + mobileBG + ')';
                }
            }


        }
    ;

    /**
     * Init
     */

    return {
        init: function () {
            bgResponsive();

        }
    };
}();


/**
 * ready
 */
document.addEventListener('DOMContentLoaded', function () { // Аналог $(document).ready(function(){
    BgResponsive.init();

});
