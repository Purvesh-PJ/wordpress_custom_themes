<?php
    /*
    * Template Name: Privacy Policy 
    */
?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <?php
            $args = array(
                'post_type' => 'page',
                'post_status' => 'publish',
                'name' => 'Privacy Policy',  
            );

            $privacy_query = new WP_Query($args);

            if ($privacy_query->have_posts()) :
                while ($privacy_query->have_posts()) :
                    $privacy_query->the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="entry-header">
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                            </header>

                            <div class="entry-content">
                                <?php echo apply_filters('the_content', get_the_content()); ?>
                            </div>
                        </article>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Page not found
                echo 'Privacy Policy not found';
            endif;
        ?>

    </main>

</div>





