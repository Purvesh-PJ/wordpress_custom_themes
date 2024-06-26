<?php
    /*
        Template Name: Computer Science
    */
    get_header();
?>

<div id="primary" class="computer-science-area">
    <main id="main" class="site-main" role='main'>

        <div>
            <?php
                $requested_post_title = isset($_GET['post_title']) ? sanitize_title($_GET['post_title']) : '';

                if (!empty($requested_post_title)) {
                    get_template_part('/template-parts/single-post');
                } else {
                    get_template_part('/template-parts/computer-science-lobby');
                }
            ?>
        </div>

    </main>
</div>

<?php
    get_footer();
?>