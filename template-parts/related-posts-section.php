<div class="related-posts-container">
    <h3 class="related-posts-heading">Related Posts</h3>
    <ul class="related-posts-list">
        <?php
            $related_posts = get_related_posts(get_the_ID());

            if (!empty($related_posts)) {
                foreach ($related_posts as $related_post) {
                    // Get the content of each related post
                    $related_post_content = get_post_field('post_content', $related_post['id']);

                    // Use regular expression to extract the first image URL
                    preg_match('/<img.*?src=["\'](.*?)["\'].*?>/i', $related_post_content, $matches);

                    echo '<li class="related-post-item">';
                    echo '<a href="' . esc_url(get_permalink($related_post['id'])) . '" class="related-post-link">';

                    if (!empty($matches[1])) {
                        $related_post_image_url = esc_url($matches[1]);
                        echo '<img src="' . $related_post_image_url . '" alt="' . esc_attr($related_post['title']) . '" class="related-post-image">';
                    } else {
                        // Display a default image if no image is found in the related post
                        echo '<img src="' . esc_url(home_url('/wp-content/themes/wp-custom-theme/images/default_image.png')) . '" alt="' . esc_attr($related_post['title']) . '" class="related-post-image">';
                    }

                    echo '<span class="related-post-title">' . esc_html($related_post['title']) . '</span>';
                    echo '</a>';
                    echo '</li>';
                }
            }
        ?>
    </ul>
</div>














