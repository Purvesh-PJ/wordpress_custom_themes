<?php
    /**
    * The template for displaying single posts.
    *
    * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
    *
    * @package WP-CUSTOM-THEME
    **/
    get_header();
?>

<main id="primary" class="content-area">

    <div class="container">
        <div class="ham" onclick="toggleSidebar()">
            <div class="hamburger-icon">
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
    </div>

    <div class="single-post-section">

        <div class="left-sidebar" id="leftSidebar">
            <?php get_sidebar() ?>
        </div>

        <!-- Your single post content goes here -->
        <div class="single-post-content">
            <div class="content-section">
                <?php
                    // Get the current post URL
                    $post_permalink = get_permalink();

                    // Get the post ID from the permalink
                    $post_id = url_to_postid($post_permalink);

                    // Query the post based on the post ID
                    $args = array(
                        'post_type' => 'post',
                        'p' => $post_id,
                    );

                    $query = new WP_Query($args);

                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <!-- Display the post content -->
                            <article <?php post_class('single-post-card'); ?>>
                                <div class="title-icon-container">
                                    <div class="title-container">
                                        <h1 class="single-post-title"><?php the_title(); ?></h1>
                                    </div>
                                    <div class="icon-container">
                                        <div class="share-icon-container" onclick="openSharePrompt('<?php echo esc_url(home_url('/tech-blogs/?post_title=' . sanitize_title_with_dashes(get_the_title()))); ?>')">
                                            <i class="material-icons share-icon">share</i>
                                        </div>
                                    </div>
                                </div>

                                <div class="post-details">
                                    <span class="post-time"> 
                                        <?php echo get_the_time('F j, Y g:i a'); ?>
                                    </span>
                                    <span class="post-categories">
                                        Category: <?php echo get_content_child_categories(get_the_ID()); ?>
                                    </span>
                                </div>
                                <div class="post-content">
                                    <?php the_content(); ?>
                                </div>
                                <div class="article-footer">
                                    <button class="comment-btn" onclick="openCommentPrompt()"> add comments
                                        <i class="material-icons cmt-icon">add_comment</i>
                                    </button>
                                </div>
                            </article>
                            <!-- Include comments section -->
                            <div id="cmt-1" class="comments">
                                <?php comments_template(); ?>
                            </div>
                    <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Post not found.';
                    }
                ?>
            </div>

            <!-- Add other sections as needed -->
            <div class="related-posts-section">
                <?php get_template_part('/template-parts/related-posts-section'); ?>
            </div>

            <div class="single-page-footer">
                <?php get_footer(); ?> 
            </div>
        </div>
    </div>

</main>

<script>
   
    function fetchPostsByCategory() {
        var categoryId = document.getElementById('categoryDropdown').value;
        var data = {
            'action': 'fetch_posts_by_category',
            'category_id': categoryId
        };

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(data)
        })
        .then(response => response.json())
        .then(data => {
            var postsContainer = document.getElementById('postsContainer');
            postsContainer.innerHTML = ''; // Clear previous posts
            if(data.length > 0) {
                data.forEach(function(post) {
                    postsContainer.innerHTML += '<div><a href="' + post.link + '">' + post.title + '</a></div>';
                });
            } else {
                postsContainer.innerHTML = 'No posts found for this category.';
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

</script>


<?php get_footer(); ?>


