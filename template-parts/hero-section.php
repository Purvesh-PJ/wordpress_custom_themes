<div class="hero-section">

    <div class="hero-slider">
        <?php
            $featured_posts = new WP_Query(array(
                'posts_per_page' => -1, // Display all featured posts
                'category_name' => 'featured', // Adjust the category name
            ));

            while ($featured_posts->have_posts()) : $featured_posts->the_post();
        ?>
            <div class="hero-post">
                <div class="hero-image">
                    <img src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" alt="<?php the_title_attribute(); ?>">
                </div>
                <div class="hero-content">
                    <a href="<?php the_permalink(); ?>">
                        <h2 class="hero-title">
                            <?php the_title(); ?>
                        </h2>
                    </a>
                    <div class="post-meta">
                        <span class="item"><?php echo get_post_meta(get_the_ID(), 'views_count', true); ?> 
                            <i class="material-icons meta-icon">visibility</i>
                            <p class="meta-icon-text">reads</p>
                        </span>
                        <span class="item"><?php echo get_post_meta(get_the_ID(), 'likes_count', true); ?>
                            <i class="material-icons meta-icon">access_time</i>
                            <p class="meta-icon-text">read time</p>
                        </span>
                        <span class="item"><?php echo get_post_meta(get_the_ID(), 'shares_count', true); ?>
                            <i class="material-icons meta-icon">share</i>
                            <p class="meta-icon-text">shares</p>
                        </span>
                    </div>
                    <p class="hero-excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 40); ?>
                    </p>
                
                    <div class="hero-buttons">
                        <div class="share-icon-container" onclick="openSharePrompt('<?php the_permalink(); ?>')">
                            <i class="material-icons share-icon">share</i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>   

    </div>
    
</div>


