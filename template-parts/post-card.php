<article <?php post_class('post-card'); ?>>
    <?php
    // Always display the first attachment and excerpt on the main page
    $attachments = get_attached_media('image');

    if (!empty($attachments)) {
        $first_attachment = reset($attachments);
        $attachment_url = wp_get_attachment_url($first_attachment->ID);
        ?>
        <div class="post-wrapper">
            <div class="post-thumbnail">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <img src="<?php echo esc_url($attachment_url); ?>" alt="<?php the_title_attribute(); ?>">
                </a>
            </div>
            <div class="post-card-content">
                <div class="post-card-details">
                    <h3 class="post-card-title">
                        <a href="<?php echo esc_url(get_permalink()); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                    <p class="post-date">
                        <?php echo get_the_date(); ?>
                    </p>
                    <!-- You can add more details here if needed -->
                </div>
                <div class="post-excerpt">
                    <?php
                    // Display only 20 words of the excerpt
                    $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
                    echo '<div class="post-excerpt">' . $excerpt . '</div>';
                    ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</article>












