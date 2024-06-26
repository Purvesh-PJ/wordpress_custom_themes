<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Your_Theme_Name
 */

get_header();
?>

<main id="primary" class="content-area">
    <div class="container">
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header><!-- .page-header -->

        <?php
        // Start the Loop.
        while (have_posts()) :
            the_post();

            /*
             * Include the Post-Type-specific template for the content.
             * If you want to display excerpts instead of full content, use the_excerpt() instead of the_content().
             */
            get_template_part('template-parts/content', get_post_type());

        endwhile;

        // Previous/next page navigation.
        the_posts_pagination(array(
            'prev_text'          => __('Previous page', 'your-text-domain'),
            'next_text'          => __('Next page', 'your-text-domain'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'your-text-domain') . ' </span>',
        ));

        ?>
    </div><!-- .container -->
</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
