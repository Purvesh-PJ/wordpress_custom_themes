<?php get_header(); ?>

<main id="main-content" class="page-content">
    <div class="container">
        <?php
        // Start the Loop
        while (have_posts()) :
            the_post();

            // Display the page title
            the_title('<h1 class="page-title">', '</h1>');

            // Display the page content
            the_content();

        endwhile;
        ?>
    </div><!-- .container -->
</main><!-- #main-content -->

<?php get_footer(); ?>
