<?php
/**
 * The template for displaying category archives with left sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package YourThemeName
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Check if a specific category link is clicked
        if (isset($_GET['category'])) {
            // Display the single post
            get_template_part('/components/single-post');
        } else {
            // Display posts in the current category
            if (have_posts()) :
                // Start the Loop
                while (have_posts()) : the_post();
                    // Display the post content
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
            else :
                // If no posts are found, display a message
                get_template_part('template-parts/content', 'none');
            endif;
        }
        ?>

    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php
get_footer();
?>

