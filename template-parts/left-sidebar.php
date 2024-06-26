<aside id="left-sidebar" class="sidebar-container">
    <?php
    // Get the current post's categories
    $post_categories = get_the_category();

    // Define a mapping of pages to their parent categories and link structures
    $page_category_mapping = array(
        'tech-blogs' => array(
            'parent_category' => 'Tech Blog Categories',
            'link_structure' => '/tech-blog/?post_title=%s'
        ),
        'programming' => array(
            'parent_category' => 'Programming Categories',
            'link_structure' => '/programming/?post_title=%s'
        ),
        // Add more pages and their corresponding parent categories and link structures as needed
    );

    // Determine the parent category and link structure dynamically based on the current page
    $current_page_slug = get_post_field('post_name', get_post());
    $page_data = isset($page_category_mapping[$current_page_slug]) ? $page_category_mapping[$current_page_slug] : null;

    if ($page_data) {
        $parent_category_name = $page_data['parent_category'];
        $link_structure = $page_data['link_structure'];

        // Get the ID of the dynamically determined parent category
        $parent_category_id = get_cat_ID($parent_category_name);

        // Get child categories of the dynamically determined parent category
        $child_categories = get_categories(array(
            'parent' => $parent_category_id,
            'hide_empty' => false, // Show empty categories as well
        ));

        if ($child_categories) {
            echo '<div class="category-list">';
            foreach ($child_categories as $child_category) {
                $is_current_category = in_array($child_category->term_id, wp_list_pluck($post_categories, 'term_id')) ? 'current-category' : '';
                echo '<div class="category-item ' . esc_attr($is_current_category) . '">';

                // Use a span for styling and a data attribute for the link
                echo '<span class="category-toggle" data-link="' . esc_url(home_url(sprintf($link_structure, sanitize_title_with_dashes($child_category->name)))) . '">';
                echo esc_html($child_category->name) . ' <i class="fas fa-chevron-down"></i>';
                echo '</span>';

                // Fetch posts within the current child category
                $category_posts = get_posts(array('category' => $child_category->term_id));

                if ($category_posts) {
                    echo '<div class="post-list">';
                    foreach ($category_posts as $post) {
                        setup_postdata($post);
                        $is_current_post = is_single($post->ID) ? ' current-post' : ''; // Add space before class name
                        $post_link = esc_url(home_url(sprintf($link_structure, sanitize_title_with_dashes(get_the_title()))));

                        // Add a class if the post is the current post
                        $post_class = $is_current_post ? ' current-post' : '';

                        echo '<div class="' . esc_attr($is_current_post . $post_class) . '"><a class="post-link" data-post-id="' . get_the_ID() . '" href="' . $post_link . '">' . esc_html(get_the_title()) . '</a></div>';
                    }
                    echo '</div>';
                    wp_reset_postdata();
                }

                echo '</div>';
            }
            echo '</div>';
        }
    }
    ?>
</aside>


<script>
jQuery(document).ready(function($) {
    // Log a message to confirm that the script is executed
    console.log('Sidebar JavaScript executed.');

    // Highlight the current post in the current category
    $('.post-list.current-post').addClass('highlight');

    // Open dropdown for the category of the current post
    var currentCategoryItem = $('.category-item.current-category');
    currentCategoryItem.find('.post-list').addClass('open').show();

    // Bind click event to category toggle
    $('.category-toggle').click(function(e) {
        e.preventDefault();

        var postList = $(this).closest('.category-item').find('.post-list');

        // Close all other open post lists except the current one
        $('.post-list.open').not(postList).removeClass('open').hide();

        // Toggle the dropdown for the clicked category
        postList.toggleClass('open').toggle(); // No slide animation
    });

    // Scroll to the current post item in the sidebar
    var currentPostItem = $('.post-list.current-post');
    if (currentPostItem.length > 0) {
        $('html, body').animate({
            scrollTop: currentPostItem.offset().top - 100 // Adjust the value as needed for proper scrolling position
        }, 500);
    }
});


</script>


















