/**
 * BlogPage
 * @type {{init: BlogPage.init}}
 */
const BlogPage = function () {
    const FormSubmit = function () {

        $("#wpforms-form-1134").submit(function (e) {
            e.preventDefault(); // prevent actual form submit
            if ($.trim($("#wpforms-form-1134 .wpforms-field input").val()) === "") {
                return false;
            } else {
                $.ajax({
                    success: function (data) {
                        setTimeout(function () {
                            $('#wpforms-form-1134')[0].reset();

                            $("#wpforms-form-1134 .wpforms-field input").val('');
                        }, 1000);
                    }
                });
            }
        });

    };
    const FormClear = function () {
        $('#popmake-2247 .pum-close').on('click', function () {
            // $('#popmake-2247 form')[0].reset();
            // $("#popmake-2247 .wpforms-field input").val('');
        });

        // $('#pum-2247.pum-overlay').on('click', function () {
        //     $('#popmake-2247 form')[0].reset();
        //     $("#popmake-2247 .wpforms-field input").val('').removeClass('wpforms-error');
        //     $("#popmake-2247 .wpforms-error").remove();
        //     $(".wpforms-field").removeClass('wpforms-has-error');
        // });

    };
    const ScrollSpy = function () {

        var positions = [],
            build_toc = function () {
                var output = '<ul>';

                $('.col-content').find('h2').each(function (i) {
                    $(this).attr('id', 'title_' + i)
                    output += '<li><a href="#title_' + i + '" class="toc-title_' + i + '">' + $(this).text() + '</a></li>';
                });
                return output;
            },
            get_bottom_off_content = function () {
                var $content = $('.col-content'),
                    offset = $content.offset();

                return $content.outerHeight() + offset.top;
            },
            get_positions = function () {
                $('.col-content').find('h2').each(function (i) {
                    offset = $(this).offset();
                    positions['title_' + i] = offset.top - 45;
                });
                return positions;
            },
            set_toc_reading = function () {
                var st = $(document).scrollTop(),
                    count = 0;

                for (var k in positions) {
                    var n = parseInt(k.replace('title_', ''));
                    has_next = typeof positions['title_' + (n + 1)] !== 'undefined',
                        not_next = has_next && st < positions['title_' + (n + 1)] ? true : false,
                        diff = 0,
                        $link = $('.toc-' + k);

                    if (has_next) {
                        diff = (st - positions[k]) / (positions['title_' + (n + 1)] - positions[k]) * 100;
                    } else {
                        diff = (st - positions[k]) / (get_bottom_off_content() - positions[k]) * 100;
                    }


                    if (st >= positions[k] && not_next && has_next) {
                        $('.toc-' + k).parent().addClass('active');
                    } else if (st >= positions[k] && !not_next && has_next) {
                        $('.toc-' + k).parent().removeClass('active');
                    } else if (st >= positions[k] && !not_next && !has_next) {
                        $('.toc-' + k).parent().addClass('active');
                    }

                    if (st >= positions[k]) {
                        $('.toc-' + k).addClass('toc-already-read');
                    } else {
                        $('.toc-' + k).removeClass('toc-already-read');
                    }

                    if (st < positions[k]) {
                        $('.toc-' + k).parent().removeClass('toc-already-read active');
                    }
                    count++;
                }
            };
        scroll_to_heading = function () {
            $('a[href^="#"]').click(function (event) {

                // The id of the section we want to go to.
                var id = $(this).attr("href");

                // An offset to push the content down from the top.
                var offset = 42;

                // Our scroll target : the top position of the
                // section that has the id referenced by our href.
                var target = $(id).offset().top - offset;

                // The magic...smooth scrollin' goodness.
                $('html, body').animate({scrollTop: target}, 'fast');

                //prevent the page from jumping down to our section.
                event.preventDefault();
            });
        }

// build our table of content
        $('.table-of-content').html(build_toc());

// first definition of positions
        get_positions();
// on resize, re-calc positions
        $(window).on('resize', function () {
            get_positions();
        });

        $(document).on('scroll', function () {
            set_toc_reading();
        });
        scroll_to_heading();

    }


    /**
     * Init
     */
    return {
        init: function () {
            FormSubmit();
            FormClear();
            ScrollSpy();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    BlogPage.init();
});
