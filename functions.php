<?php
function custom_theme_enqueue_styles() {

    // Enqueue the main stylesheet
    wp_enqueue_style('custom-style', get_stylesheet_uri());
    
    // Enqueue Google Fonts Material Icons
    wp_enqueue_style('google-fonts-open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
    wp_enqueue_style('google-fonts-lobster', 'https://fonts.googleapis.com/css2?family=Lobster&display=swap');

    // Enqueue Google and font awesome Icons
    wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

    // Enqueue component's style for components
    wp_enqueue_style('top-navigation-bar-style', get_template_directory_uri() . '/styles/top-navigation-bar-style.css', array('custom-style'));
    wp_enqueue_style('post-card-style', get_template_directory_uri() . '/styles/post-card-style.css', array('custom-style'));
    wp_enqueue_style('archive-posts-section-style', get_template_directory_uri() . '/styles/archive-posts-section-style.css', array('custom-style'));
    // wp_enqueue_style('single-post-style', get_template_directory_uri() . '/styles/single-post-style.css', array('custom-style'));
    wp_enqueue_style('technology-categories-section-style', get_template_directory_uri() . '/styles/technology-categories-section-style.css', array('custom-style'));
    wp_enqueue_style('left-sidebar-style', get_template_directory_uri() . '/styles/left-sidebar-style.css', array('custom-style'));
    wp_enqueue_style('related-posts-section-style', get_template_directory_uri() . '/styles/related-posts-section-style.css', array('custom-style'));
    wp_enqueue_style('hero-section-style', get_template_directory_uri() . '/styles/hero-section-style.css', array('custom-style'));
    wp_enqueue_style('privacy-policy-style', get_template_directory_uri() . '/styles/privacy-policy-style.css', array('custom-style'));
    wp_enqueue_style('hamburger-prompt-style', get_template_directory_uri() . '/styles/hamburger-prompt-style.css', array('custom-style'));
    wp_enqueue_style('footer-style', get_template_directory_uri() . '/styles/footer-style.css', array('custom-style'));
    wp_enqueue_style('search-prompt-style', get_template_directory_uri() . '/styles/search-prompt-style.css', array('custom-style'));
    // wp_enqueue_style('drawer-from-bottom-style', get_template_directory_uri() . '/styles/drawer-from-bottom-style.css', array('custom-style'));
    wp_enqueue_style('contact-form-style', get_template_directory_uri() . '/styles/contact-form-style.css', array('custom-style'));
    wp_enqueue_style('contact-us-style', get_template_directory_uri() . '/styles/contact-us-style.css', array('custom-style'));
    wp_enqueue_style('search-query-prompt-style', get_template_directory_uri() . '/styles/search-query-prompt-style.css', array('custom-style'));
    wp_enqueue_style('social-share-prompt-style', get_template_directory_uri() . '/styles/social-share-prompt-style.css', array('custom-style'));
    // wp_enqueue_style('add-comments-style', get_template_directory_uri() . '/styles/add-comments-style.css', array('custom-style'));
    // wp_enqueue_style('display-comments-style', get_template_directory_uri() . '/styles/display-comments-style.css', array('custom-style'));
    // wp_enqueue_style('add-read-comment-prompt-style', get_template_directory_uri() . '/styles/add-read-comment-prompt-style.css', array('custom-style'));
    wp_enqueue_style('tech-lobby-style', get_template_directory_uri() . '/styles/tech-lobby-style.css', array('custom-style'));
    wp_enqueue_style('comments-style', get_template_directory_uri() . '/styles/comments-style.css', array('custom-style'));
    wp_enqueue_style('drawer-bottom-style', get_template_directory_uri() . '/styles/drawer-bottom-style.css', array('custom-style'));
    wp_enqueue_style('computer-science-style', get_template_directory_uri() . '/styles/computer-science-style.css', array('custom-style'));
    wp_enqueue_style('computer-science-lobby-style', get_template_directory_uri() . '/styles/computer-science-lobby-style.css', array('custom-style'));
    wp_enqueue_style('single-style', get_template_directory_uri() . '/styles/single-style.css', array('custom-style'));
    wp_enqueue_style('sidebar', get_template_directory_uri() . '/styles/sidebar-style.css', array('custom-style'));
    
    
    // icon style 
    wp_enqueue_style('icon', get_template_directory_uri() . '/icons/icon.css', array('custom-style'));

    // Enqueue social-share.js
    wp_enqueue_script('social-share', get_template_directory_uri() . '/javascript/social-share.js', array('jquery'), '', true);
    wp_enqueue_script('hamburger-prompt-script', get_template_directory_uri() . '/javascript/hamburger-prompt-script.js', array('jquery'), '', true);
    wp_enqueue_script('search-prompt-script', get_template_directory_uri() . '/javascript/search-prompt-script.js', array('jquery'), '', true);
    // wp_enqueue_script('drawer-from-bottom-script', get_template_directory_uri() . '/javascript/drawer-from-bottom-script.js', array('jquery'), '', true);
    wp_enqueue_script('hero-section-script', get_template_directory_uri() . '/javascript/hero-section-script.js', array('jquery'), '1.0', true);
    wp_enqueue_script('comment-script', get_template_directory_uri() . '/javascript/comment-script.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('comment-prompt-script', get_template_directory_uri() . '/javascript/comment-prompt-script.js', array('jquery'), '1.0', true);
    // wp_enqueue_script('search-prompt-ajax', get_template_directory_uri() . '/javascript/search-prompt-ajax.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'custom_theme_enqueue_styles');


// Add a filter to modify the comment form defaults
function customize_comment_form_defaults($defaults) {
    $defaults['submit_button'] = '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s <i class="fas fa-paper-plane"></i></button>';
    return $defaults;
}
add_filter('comment_form_defaults', 'customize_comment_form_defaults');


function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'enqueue_jquery');


// Add the Custom_Walker_Comment class definition
class Custom_Walker_Comment extends Walker_Comment {
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '<ul class="children">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
    }

    function start_el( &$output, $comment, $depth = 0, $args = null, $id = 0 ) {
        $depth++;
        $GLOBALS['comment'] = $comment;

        // Customize the comment output as needed
        $output .= '<li id="comment-' . esc_attr( $comment->comment_ID ) . '" ' . comment_class( '', $comment->comment_ID, null, false ) . '>';

        // Display comment content, author, etc.
        $output .= '<div class="comment-meta">';
        $output .= '<div class="comment-author">' . get_comment_author_link() . '</div>';
        $output .= '<div class="comment-metadata">' . get_comment_date() . ' at ' . get_comment_time() . '</div>';
        $output .= '</div>';

        $output .= '<div class="comment-content">';
        $output .= get_comment_text();
        $output .= '</div>';

        // Add reply link if comments are threaded
        if ( $args['max_depth'] > 1 ) {
            $output .= '<div class="reply">';
            $output .= get_comment_reply_link( array_merge( $args, array(
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
            ) ) );
            $output .= '</div>';
        }

        $output .= '</li>';
    }

    function end_el( &$output, $comment, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}


function get_related_posts() {
    $related_posts = array();

    // Get current post categories
    $categories = get_the_category();
    $category_ids = array();
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }

    // Query related posts
    $args = array(
        'post__not_in' => array(get_the_ID()), // Exclude the current post
        'posts_per_page' => 3, // Number of related posts to display
        'category__in' => $category_ids,
        'orderby' => 'rand', // Display random posts
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $related_posts[] = array(
                'id' => get_the_ID(),  // Add post ID
                'image' => get_the_post_thumbnail(get_the_ID(), 'thumbnail'),
                'title' => get_the_title(),
            );
        }
    }
    wp_reset_postdata();
    return $related_posts;
}
add_theme_support('post-thumbnails');


function add_custom_fields() {
    add_post_meta(get_the_ID(), 'views_count', 0, true);
    add_post_meta(get_the_ID(), 'likes_count', 0, true);
    add_post_meta(get_the_ID(), 'shares_count', 0, true);
}
add_action('save_post', 'add_custom_fields');


// Enqueue your custom script file
function enqueue_custom_script() {
    
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');


function get_content_child_categories($post_id) {
    // Get the post's categories
    $post_categories = get_the_category($post_id);

    $category_boxes = array();

    if ($post_categories) {
        foreach ($post_categories as $post_category) {
            $category_boxes[] = '<div class="category-box">' . esc_html($post_category->name) . '</div>';
        }
    }

    return implode(' ', $category_boxes);
}

// functions.php
function enqueue_custom_scripts() {
    global $post;
    $post_url = isset($post->ID) ? get_permalink($post->ID) : home_url();

    wp_enqueue_script('your-custom-script', get_template_directory_uri() . '/javascript/social-share.js', array('jquery'), null, true);
    wp_localize_script('your-custom-script', 'post_data', array(
        'post_url' => esc_url($post_url),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// function register_my_menus() {
//     register_nav_menus(
//         array(
//             'primary_menu' => __('Primary Menu'),
//         )
//     );
// }
// add_action('init', 'register_my_menus');

add_action( 'wp_ajax_search_component_query', 'handle_search_component_query' );
add_action( 'wp_ajax_nopriv_search_component_query', 'handle_search_component_query' ); 

function handle_search_component_query() {
    // Check nonce and sanitize search term
    if (isset($_POST['search_term'])) {
        $search_term = sanitize_text_field($_POST['search_term']);
    } else {
        wp_send_json_error('Search term not provided.');
    }

    // Initialize results array
    $results = array();

    // Search for posts with a match in title or content
    $post_args = array(
        's' => $search_term,
        'posts_per_page' => 5,
        'post_type' => 'post',
    );

    $post_query = new WP_Query($post_args);

    // Check if there are any posts found
    if ($post_query->have_posts()) {
        $results['posts'] = array();
        while ($post_query->have_posts()) {
            $post_query->the_post();
    
            // Get the post ID and title
            $post_id = get_the_ID();
            $post_title = get_the_title();
    
            // Construct the custom permalink with the desired structure
            // $custom_permalink = home_url('/tech-blogs/') . '?post_title=' . sanitize_title($post_title);
    
            $results['Tech blog posts'][] = array(
                'id' => $post_id,
                'title' => $post_title,
                'excerpt' => get_the_excerpt(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'permalink' => get_the_permalink(),
                'type' => 'post',
            );
        }
    } else {
        // No posts found, return an error message or handle accordingly
        wp_send_json_error('No matching posts found.');
        return;
    }

    // Search for pages
    $page_args = array(
        's' => $search_term,
        'posts_per_page' => 5,
        'post_type' => 'page',
    );

    $page_query = new WP_Query($page_args);

    if ($page_query->have_posts()) {
        $results['pages'] = array();
        while ($page_query->have_posts()) {
            $page_query->the_post();

            $results['Pages'][] = array(
                'id' => get_the_ID(),
                'title' => get_the_title(),
                'excerpt' => get_the_excerpt(),
                'permalink' => get_the_permalink(),
                'type' => 'page',
            );
        }
    }

    // Search for categories
    // $category_args = array(
    //     'name__like' => $search_term,
    //     'taxonomy' => 'category',
    //     'hide_empty' => false,
    // );

    // $categories = get_categories($category_args);

    // if ($categories) {
    //     $results['categories'] = array();
    //     foreach ($categories as $category) {
    //         $results['categories'][] = array(
    //             'id' => $category->term_id,
    //             'title' => $category->name,
    //             'description' => $category->description,
    //             'type' => 'category',
    //         );
    //     }
    // }

    // Reset post data
    wp_reset_postdata();

    // Only send JSON response if there are results
    if (!empty($results)) {
        wp_send_json_success($results);
    } else {
        wp_send_json_error('No results found.');
    }
}



function enqueue_custom_fonts() {
    wp_enqueue_style( 'svgfont', get_template_directory_uri() . '/fonts/svgfont.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_fonts' );
  

function load_more_posts() {
    $archivePage = $_POST['archive_page'];
    $filter_categories = $_POST['filter_categories'];
    $category_filter = $_POST['category_filter'];

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'paged'          => $archivePage,
    );

    if (!empty($filter_categories) && $filter_categories !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $filter_categories,
        );
    }

    if (!empty($category_filter) && $category_filter !== 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $category_filter,
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('/template-parts/post-card');
        endwhile;
    endif;

    wp_die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

// Registering a custom menu location
function register_top_menu() {
    register_nav_menu('top-menus', 'Top Menus');
}
add_action('after_setup_theme', 'register_top_menu');

function filter_posts_by_category() {
    $selected_category = $_POST['selected_category'];

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 4,
        'paged'          => 1,
        'category_name'  => $selected_category,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('/template-parts/post-card');
        }
        wp_reset_postdata();
    } else {
        echo 'No posts found';
    }

    wp_die(); // Always exit to avoid extra output
}

add_action('wp_ajax_filter_posts_by_category', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts_by_category', 'filter_posts_by_category');

add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}


function fetch_posts_by_category() {
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => -1, // You can limit the number of posts here
        'category__in' => array($category_id),
    );
    $query = new WP_Query($args);
    $posts = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $posts[] = array(
                'title' => get_the_title(),
                'link' => get_permalink(),
            );
        }
    }

    wp_reset_postdata();
    echo json_encode($posts);
    wp_die(); // This is required to terminate immediately and return a proper response
}

add_action('wp_ajax_fetch_posts_by_category', 'fetch_posts_by_category');
add_action('wp_ajax_nopriv_fetch_posts_by_category', 'fetch_posts_by_category');


function custom_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'custom-theme' ),
        'id'            => 'main-sidebar',
        'description'   => __( 'Widgets in this area will be shown in the main sidebar.', 'custom-theme' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'custom_theme_widgets_init' );















