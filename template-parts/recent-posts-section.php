<section class="recent-posts">
    <h2 class="section-heading">
        Recent Posts
    </h2>

    <?php
    // WordPress Loop to display recent posts
    if (have_posts()) :
        while (have_posts()) : the_post();
            // Include the card template part
            get_template_part('components/post-card');
        endwhile;
    else :
        // If no posts are found
        echo '<p>No posts found.</p>';
    endif;
    ?>
</section>
