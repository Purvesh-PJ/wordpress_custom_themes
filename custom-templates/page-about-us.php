<?php
    /*
        * Template Name: About Us 
    */
?>

<?php get_header(); ?>

<div class="content-area">
    <?php while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>



