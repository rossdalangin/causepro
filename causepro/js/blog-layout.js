(function ($) {
    'use strict';

    $(function () {
        var grid = $('.blog-archive-grid'); // The container for the posts

        // Initialize Masonry if selected
        if (causepro_blog_layout_data.layout === 'masonry' && grid.length > 0) {
            var masonry = grid.masonry({
                itemSelector: '.blog-item',
                columnWidth: '.blog-item',
                percentPosition: true
            });
        }

        // Load More button functionality
        var loadMoreButton = $('#load-more-posts');
        if (loadMoreButton.length > 0) {
            loadMoreButton.on('click', function (e) {
                e.preventDefault();

                var button = $(this);
                var paged = button.data('paged');
                var maxPages = button.data('max-pages');

                button.text('Loading...');

                $.ajax({
                    url: causepro_blog_layout_data.ajax_url,
                    type: 'post',
                    data: {
                        action: 'load_more_posts',
                        paged: paged,
                        nonce: causepro_blog_layout_data.nonce
                    },
                    success: function (response) {
                        if (response) {
                            var newPosts = $(response);
                            grid.append(newPosts);

                            if (causepro_blog_layout_data.layout === 'masonry') {
                                masonry.append(newPosts).masonry('layout');
                            }

                            var newPaged = paged + 1;
                            button.data('paged', newPaged);

                            if (newPaged > maxPages) {
                                button.hide();
                            } else {
                                button.text('Load More');
                            }
                        } else {
                            button.hide();
                        }
                    },
                    error: function () {
                        button.text('Load More');
                        // console.log('Error loading posts.');
                    }
                });
            });
        }
    });

})(jQuery);
