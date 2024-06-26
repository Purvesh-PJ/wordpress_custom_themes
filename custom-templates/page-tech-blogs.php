<?php 
    /* Template Name: Tech Blogs */
    get_header();
?>

<div id="primary" >
    <main id="main" class="site-main" role="main">
        <div>
            <?php
                if (is_single()) {
                    get_template_part('/template-parts/single-post');
                } else {
                    get_template_part('/template-parts/tech-blog-lobby');
                }
            ?>
        </div>
    </main>
</div>

<!-- <div id="primary" >
    <main id="main" class="site-main" role="main">
        <div>
            <?php
                // $requested_post_title = isset($_GET['post_title']) ? sanitize_title($_GET['post_title']) : '';

                // if (!empty($requested_post_title)) {
                //     get_template_part('/template-parts/single-post');
                // } else {
                //     get_template_part('/template-parts/tech-blog-lobby');
                // }
            ?>
        </div>
    </main>
</div> -->


<?php get_footer(); ?>

