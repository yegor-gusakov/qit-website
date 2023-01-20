/**
 * CasesPage
 * @type {{init: CasesPage.init}}
 */
const CasesPage = function () {

    /**
     * Filter cases and load more
     */
    const CasesLoadMoreFilter = function () {
        var loader = "<lottie-player src=\"https://assets4.lottiefiles.com/private_files/lf30_4d2kzehv.json\"  background=\"transparent\"  speed=\"1\"  style=\"width: 100px; height: 100px; margin:0 auto;\"  loop  autoplay class=\"lottie-player\"></lottie-player>"

        /**
         Load More
         */
        $('#cases_loadmore').click(function () {

            $.ajax({
                url: qit_loadmore_params.ajaxurl, // AJAX handler
                data: {
                    'action': 'loadmorebutton', // the parameter for admin-ajax.php
                    'query': qit_loadmore_params.posts, // loop parameters passed by wp_localize_script()
                    'page': qit_loadmore_params.current_page // current page
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    $('#cases_loadmore').text('Loading...'); // some type of preloader
                },
                success: function (posts) {
                    if (posts) {

                        $('#cases_loadmore').text('More posts');
                        $('#cases').append(posts); // insert new posts
                        qit_loadmore_params.current_page++;

                        if (qit_loadmore_params.current_page == qit_loadmore_params.max_page)
                            $('#cases_loadmore').hide(); // if last page, HIDE the button

                    } else {
                        $('#cases_loadmore').hide(); // if no data, HIDE the button as well
                    }
                }
            });
            return false;
        });

        /**
         * Filter
         */

        $('#cases_filter').submit(function () {

            $.ajax({
                url: qit_loadmore_params.ajaxurl,
                data: $('#cases_filter').serialize(), // form data
                dataType: 'json', // this data type allows us to receive objects from the server
                type: 'POST',
                beforeSend: function (xhr) {
                    $('#cases_filter').find('button').text('Filtering...');

                    $('#cases').hide();
                    $('.col-filter').css({'pointer-events': 'none', 'opacity': '.7'})
                    $(".section.section__cases .container").append(loader);      // Append the new elements

                },
                success: function (data) {

                    // when filter applied:
                    // set the current page to 1
                    qit_loadmore_params.current_page = 1;

                    // set the new query parameters
                    qit_loadmore_params.posts = data.posts;

                    // set the new max page parameter
                    qit_loadmore_params.max_page = data.max_page;

                    // change the button label back
                    $('#cases_filter').find('button').text('Apply filter');
                    $('.lottie-player').remove();
                    $('.col-filter').css({'pointer-events': 'all', 'opacity': '1'});
                    // insert the posts to the container
                    $('#cases').show().html(data.content);

                    // hide load more button, if there are not enough posts for the second page
                    if (data.max_page < 2) {
                        $('#cases_loadmore').hide();
                    } else {
                        $('#cases_loadmore').show();
                    }

                }
            });

            // do not submit the form
            return false;

        });
        /*
         * Clear Filters
         */

        $('.select-selected').bind('DOMNodeInserted DOMNodeRemoved', function () {
            // console.log('select');
            $('#cases_filter').submit();

        });

        /**
         * Clear filters on click "clear filter"
         */
        $('#clearCaseFilter.btn-clear-all').click(function () {
            if (($('.filter-select.Platforms .select-items > *:first').attr('class') != 'selected') || ($('.filter-select.Expertise .select-items > *:first').attr('class') != 'selected') || ($('.filter-select.Services .select-items > *:first').attr('class') != 'selected')) {
                $("#cases_filter")[0].reset();
                var selected = $('.filter-select');
                var select = $('.select-selected');
                var items = selected.children('.select-items');
                var itemFirst = items.find('div:first-child');

                // console.log(select[0]);

                $('.select-items div').removeClass('selected');
                for (i = 0; i < select.length; ++i) {
                    $(select[i]).text($(itemFirst[i]).text());
                    $(itemFirst[i]).addClass('selected');
                }


                $.ajax({
                    url: qit_loadmore_params.ajaxurl,
                    data: $('#cases_filter').serialize(), // form data
                    dataType: 'json', // this data type allows us to receive objects from the server
                    type: 'POST',
                    beforeSend: function (xhr) {
                        $('#cases_filter').find('button').text('Filtering...');
                    },
                    success: function (data) {

                        // when filter applied:
                        // set the current page to 1
                        qit_loadmore_params.current_page = 1;

                        // set the new query parameters
                        qit_loadmore_params.posts = data.posts;

                        // set the new max page parameter
                        qit_loadmore_params.max_page = data.max_page;

                        // change the button label back
                        $('#cases_filter').find('button').text('Apply filter');

                        // insert the posts to the container
                        $('#cases').html(data.content);

                        // hide load more button, if there are not enough posts for the second page
                        if (data.max_page < 2) {
                            $('#cases_loadmore').hide();
                        } else {
                            $('#cases_loadmore').show();
                        }
                    }
                });
            } else {
                return false;
            }
            return false;

        });

    };
    const PositionLoadMoreFilter = function () {
        var loader = "<lottie-player src=\"https://assets4.lottiefiles.com/private_files/lf30_4d2kzehv.json\"  background=\"transparent\"  speed=\"1\"  style=\"width: 100px; height: 100px; margin:0 auto;\"  loop  autoplay class=\"lottie-player\"></lottie-player>"

        /**
         Load More
         */
        $('#position_loadmore').click(function () {

            $.ajax({
                url: qit_loadmore_params.ajaxurl, // AJAX handler
                data: {
                    'action': 'loadmorebuttonpositions', // the parameter for admin-ajax.php
                    'query': qit_loadmore_params.posts, // loop parameters passed by wp_localize_script()
                    'page': qit_loadmore_params.current_page // current page
                },
                type: 'POST',
                beforeSend: function (xhr) {
                    $('#position_loadmore').text('Loading...'); // some type of preloader
                },
                success: function (posts) {
                    if (posts) {

                        $('#position_loadmore').text('More posts');
                        $('#positions').append(posts); // insert new posts
                        qit_loadmore_params.current_page++;

                        if (qit_loadmore_params.current_page == qit_loadmore_params.max_page)
                            $('#position_loadmore').hide(); // if last page, HIDE the button

                    } else {
                        $('#position_loadmore').hide(); // if no data, HIDE the button as well
                    }
                }
            });
            return false;
        });

        /**
         * Filter
         */

        $('#position_filter').submit(function () {

            $.ajax({
                url: qit_loadmore_params.ajaxurl,
                data: $('#position_filter').serialize(), // form data
                dataType: 'json', // this data type allows us to receive objects from the server
                type: 'POST',
                beforeSend: function (xhr) {
                    $('#position_filter').find('button').text('Filtering...');

                    $('#positions').hide();
                    $('.col-filter').css({'pointer-events': 'none', 'opacity': '.7'})
                    $(".section.section__open-position .container").append(loader);      // Append the new elements

                },
                success: function (data) {

                    // when filter applied:
                    // set the current page to 1
                    qit_loadmore_params.current_page = 1;

                    // set the new query parameters
                    qit_loadmore_params.posts = data.posts;

                    // set the new max page parameter
                    qit_loadmore_params.max_page = data.max_page;

                    // change the button label back
                    $('#position_filter').find('button').text('Apply filter');
                    $('.lottie-player').remove();
                    $('.col-filter').css({'pointer-events': 'all', 'opacity': '1'});
                    // insert the posts to the container
                    $('#positions').show().html(data.content);

                    // hide load more button, if there are not enough posts for the second page
                    if (data.max_page < 2) {
                        $('#position_loadmore').hide();
                    } else {
                        $('#position_loadmore').show();
                    }

                }
            });

            // do not submit the form
            return false;

        });
        /*
         * Clear Filters
         */

        $('.select-selected').bind('DOMNodeInserted DOMNodeRemoved', function () {
            // console.log('select');
            $('#position_filter').submit();

        });

        /**
         * Clear filters on click "clear filter"
         */
        $('#clearPositionFilter.btn-clear-all').click(function () {
            if (($('.filter-select.Categories .select-items > *:first').attr('class') != 'selected') || ($('.filter-select.Levels .select-items > *:first').attr('class') != 'selected')) {
                $("#position_filter")[0].reset();
                var selected = $('.filter-select');
                var select = $('.select-selected');
                var items = selected.children('.select-items');
                var itemFirst = items.find('div:first-child');

                // console.log(select[0]);

                $('.select-items div').removeClass('selected');
                for (i = 0; i < select.length; ++i) {
                    $(select[i]).text($(itemFirst[i]).text());
                    $(itemFirst[i]).addClass('selected');
                }


                $.ajax({
                    url: qit_loadmore_params.ajaxurl,
                    data: $('#position_filter').serialize(), // form data
                    dataType: 'json', // this data type allows us to receive objects from the server
                    type: 'POST',
                    beforeSend: function (xhr) {
                        $('#position_filter').find('button').text('Filtering...');
                    },
                    success: function (data) {

                        // when filter applied:
                        // set the current page to 1
                        qit_loadmore_params.current_page = 1;

                        // set the new query parameters
                        qit_loadmore_params.posts = data.posts;

                        // set the new max page parameter
                        qit_loadmore_params.max_page = data.max_page;

                        // change the button label back
                        $('#position_filter').find('button').text('Apply filter');

                        // insert the posts to the container
                        $('#positions').html(data.content);

                        // hide load more button, if there are not enough posts for the second page
                        if (data.max_page < 2) {
                            $('#position_loadmore').hide();
                        } else {
                            $('#position_loadmore').show();
                        }
                    }
                });
            } else {
                return false;
            }
            return false;

        });

    }

    return {
        init: function () {
            CasesLoadMoreFilter();
            PositionLoadMoreFilter();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function () {
    CasesPage.init();
});
