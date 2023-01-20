(function($) {
    $doc = $(document);

    $doc.ready( function() {

        /**
         * Retrieve posts
         */
        function get_posts($params) {

            $container = $('#container-async');
            $content   = $container.find('.content');
            $loader = "<lottie-player src=\"https://assets4.lottiefiles.com/private_files/lf30_4d2kzehv.json\"  background=\"transparent\"  speed=\"1\"  style=\"width: 100px; height: 100px; margin:0 auto;\"  loop  autoplay class=\"lottie-player\"></lottie-player>"


            $.ajax({
                url: bobz.ajax_url,
                data: {
                    action: 'do_filter_posts',
                    nonce: bobz.nonce,
                    params: $params
                },
                type: 'post',
                dataType: 'json',
                beforeSend: function (xhr) {
                    $('.section__blog-nav-item').css({'pointer-events': 'none', 'opacity': '.7'})

                    $("#container-async .content").empty().append($loader);      // Append the new elements

                },
                success: function(data, textStatus, XMLHttpRequest) {

                    if (data.status === 200) {
                        $('.section__blog-nav-item').css({'pointer-events': 'all', 'opacity': '1'});

                        $content.html(data.content);
                    }
                    else if (data.status === 201) {
                        $('.section__blog-nav-item').css({'pointer-events': 'all', 'opacity': '1'});

                        $content.html(data.message);
                    }
                    else {
                        $('.lottie-player').remove();
                        $('.section__blog-nav-item').css({'pointer-events': 'all', 'opacity': '1'});

                    }

                },
                error: function(MLHttpRequest, textStatus, errorThrown) {

                    $('.lottie-player').remove();

                    // console.log('MLHttpRequest: '+MLHttpRequest);
                    // console.log('textStatus '+textStatus);
                    // console.log('errorThrown '+errorThrown);
                },
                complete: function(data, textStatus) {

                    msg = textStatus;

                    if (textStatus === 'success') {
                        msg = data.responseJSON.found;
                    }
                    $('.section__blog-nav-item').css({'pointer-events': 'all', 'opacity': '1'});

                    $('.lottie-player').remove();


                    /*console.log(data);
                    console.log(textStatus);*/
                }
            });
        }

        /**
         * Bind get_posts to tag cloud and navigation
         */
        $('#container-async').on('click', 'a[data-filter], .pagination a', function(event) {
            if(event.preventDefault) { event.preventDefault(); }

            $this = $(this);

            /**
             * Set filter active
             */
            if ($this.data('filter')) {
                $this.closest('ul').find('.active').removeClass('active');
                $this.parent('li').addClass('active');
                $page = $this.data('page');
            }
            else {
                /**
                 * Pagination
                 */
                $page = parseInt($this.attr('href').replace(/\D/g,''));
                $this = $('.nav-filter .active a');
            }


            $params    = {
                'page' : $page,
                'tax'  : $this.data('filter'),
                'term' : $this.data('term'),
                'qty'  : $this.closest('#container-async').data('paged'),
            };

            // Run query
            get_posts($params);
        });

    });

})(jQuery);