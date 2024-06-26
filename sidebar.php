<aside id="left-sidebar" class="sidebar-container">
    <ul class="sidebar-menu">
        <?php
        // Function to recursively fetch and display categories and posts
        function display_categories_and_posts($parent_category_id) {
            // Get child categories of the current parent category
            $child_categories = get_categories(array(
                'parent' => $parent_category_id,
                'hide_empty' => true, // Show only categories with posts
            ));

            // Check if the parent category has child categories
            if ($child_categories) {
                // Loop through each child category
                foreach ($child_categories as $child_category) {
                    // Display child category
                    echo '<li class="sub-menu-items">';
                    echo '<label for="toggle-' . $child_category->term_id . '">';
                    echo $child_category->name;
                    
                    // Check if the child category has child categories or posts
                    $grandchild_categories = get_categories(array(
                        'parent' => $child_category->term_id,
                        'hide_empty' => true, // Show only categories with posts
                    ));

                    $category_posts = get_posts(array('category' => $child_category->term_id));

                    if ($grandchild_categories || $category_posts) {
                        // Add dropdown icon
                        echo '<span class="material-icons dropdown-icon">arrow_drop_down</span>';
                    }
                    echo '</label>';
                    echo '<input type="checkbox" id="toggle-' . $child_category->term_id . '" class="toggle">';
                    // Recursively display child categories and posts
                    echo '<ul class="sub-menu">';
                    display_categories_and_posts($child_category->term_id);
                    echo '</ul>';
                    echo '</li>';
                }
            }
           // Display posts directly for the current parent category
            $category_posts = get_posts(array('category' => $parent_category_id));

            if ($category_posts) {
                foreach ($category_posts as $post) {
                    echo '<li class="sub-menu-items"><a class="link" href="' . get_permalink($post->ID) . '">' . $post->post_title . '</a></li>';
                }
            }
        }

        $exclude_categories = array(
            get_cat_ID('uncategorized'),
            get_cat_ID('Filter Categories')
        );
        
        $top_level_categories = get_categories(array(
            'parent' => 0,
            'hide_empty' => true, // Show only categories with posts
            'exclude' => $exclude_categories // Exclude specified categories
        ));

        // Display top-level categories and their children
        foreach ($top_level_categories as $top_level_category) {
            echo '<li class="menu-items">';
            echo '<label for="toggle-' . $top_level_category->term_id . '">';
            echo $top_level_category->name;
            
            // Check if the top-level category has child categories or posts
            $child_categories = get_categories(array(
                'parent' => $top_level_category->term_id,
                'hide_empty' => true, // Show only categories with posts
            ));

            $category_posts = get_posts(array('category' => $top_level_category->term_id));

            if ($child_categories || $category_posts) {
                // Add dropdown icon
                echo '<span class="material-icons dropdown-icon">arrow_drop_down</span>';
            }
            echo '</label>';
            echo '<input type="checkbox" id="toggle-' . $top_level_category->term_id . '" class="toggle">';
            // Recursively display child categories and posts
            echo '<ul class="sub-menu">';
            display_categories_and_posts($top_level_category->term_id);
            echo '</ul>';
            echo '</li>';
        }
        ?>
    </ul>
</aside>



<script>
    jQuery(document).ready(function($) {
        $('.menu-item-has-children').click(function(e) {
            e.preventDefault();
            $(this).children('.sub-menu').toggle();
        });
    });
</script>


