<section class="archive-posts-section">

    <div class="header">
        <div class="archive-categories">
            <?php
                $tech_categories = get_categories(array('parent' => get_cat_ID('Tech Blog Categories')));
                if ($tech_categories) :
                    foreach ($tech_categories as $category) :
            ?>
                <button class="category-button" data-category="<?php echo $category->slug; ?>">
                    <?php echo $category->name; ?>
                </button>
            <?php
                    endforeach;
                endif;
            ?>
        </div>
    </div>

    <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;

        // Get IDs of tech blog categories
        $tech_category_ids = array();
        $tech_categories = get_categories(array('parent' => get_cat_ID('Tech Blog Categories')));
        foreach ($tech_categories as $category) {
            $tech_category_ids[] = $category->term_id;
        }

        $args = array(
            'post_type'        => 'post',
            'posts_per_page'   => 4,
            'paged'            => $paged,
            'category__in'     => $tech_category_ids, // Limit to posts in tech blog categories
        );

        // Additional code for filtering by category
        $selected_category = isset($_GET['category']) ? $_GET['category'] : '';
        if (!empty($selected_category) && $selected_category !== 'all') {
            $args['category_name'] = $selected_category;
        }

        $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()) : ?>

        <div class="archive-posts" id="archive-posts-container">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part('template-parts/post-card'); ?>
            <?php endwhile; ?>
        </div>

        <div class="footer">
            <button id="load-more-btn">
                Load More
                <i class="material-icons">refresh</i>
            </button>
        </div>

    <?php else : ?>
        <p class="post-not-found-container">No posts found</p>
    <?php endif; ?>

</section>


<script>
    jQuery(document).ready(function ($) {
        $('.category-button').on('click', function () {
            var selectedCategory = $(this).data('category');

            // Remove the 'selected' class from all category buttons
            $('.category-button').removeClass('selected');

            // Add the 'selected' class to the clicked category button
            $(this).addClass('selected');

            // Log the selected category to the console
            console.log('Selected Category:', selectedCategory);

            // Update the selected category display
            $('#selected-category').text('Selected Category: ' + selectedCategory);

            filterPosts(selectedCategory);

            // Construct URL with category slug included
            var newURL = '<?php echo esc_url(home_url()); ?>' + '/category' + selectedCategory; 
            history.replaceState({}, '', newURL);
        });

        var archivePage = <?php echo $paged; ?>;
        var maxPages = <?php echo $query->max_num_pages; ?>;
        var selectedCategory = '<?php echo esc_js($selected_category); ?>'; // Store the selected category
            
        jQuery(document).on('click', '#load-more-btn', function () {
            var button = jQuery(this);
            archivePage++; // Increment the global page counter
            var data = {
                'action': 'load_more_posts',
                'archive_page': archivePage,
                'filter_categories': selectedCategory, // Ensure this is defined if you're using category filters
            };

            jQuery.ajax({
                url: ajaxurl,
                type: 'POST',
                data: data,
                success: function (response) {
                    if (response) {
                        jQuery('#archive-posts-container').append(response);
                        button.data('page', archivePage); // Update button data-page attribute if necessary
                    } else {
                        button.hide();
                    }
                }
            });
        });

        $('#archive-posts-container').on('click', '.post-link', function (e) {
            e.preventDefault();

            var postTitle = $(this).data('post-title');z
            var postCategories = $(this).data('post-categories');
            var postCategory = postCategories ? postCategories.split(',')[0] : '';

            // Update the URL without a page reload
            var newURL = '<?php echo esc_url(home_url()); ?>' + '/category/' + postCategory + '/' + postTitle;
            history.pushState({}, '', newURL);

            // Handle the logic to load the specific post content
        });

        function filterPosts(category) {
            var data = {
                'action': 'filter_posts_by_category',
                'selected_category': category,
            };

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: data,
                success: function (response) {
                    $('#archive-posts-container').html(response);
                    archivePage = 1; // Reset page counter when filtering
                    $('#load-more-btn').show(); // Show the "Load more" button
                    
                    // Replace the current URL without adding a new state
                    var newURL = '<?php echo esc_url(home_url()); ?>' + '/category/' + category;
                    history.replaceState({}, '', newURL);
                }
            });
        }
    });
</script>










