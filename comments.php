<?php
// Make sure comments are allowed on the current post
if (comments_open() || get_comments_number()) :
    // Get the number of comments
    $comments_count = get_comments_number();
?>

<div id="comments" class="comments-area">
    <button class="close-comment-prompt">
        <span onclick="closeComnmentPrompt()" class="material-icons">clear</span>
    </button>

    <?php
    // If comments are available, display them
    if (have_comments()) :
        ?>
        <div class="comment-list-container">
            <h2 class="comments-title"><?php echo esc_html__('Comments', 'your-theme-textdomain') . '(' . $comments_count . ')'; ?></h2>
            <ul class="comment-list">
                <?php
                // List comments
                wp_list_comments(array(
                    'style' => 'ul',
                    'short_ping' => true,
                    'callback' => 'custom_comment_template', // Custom callback for comment template
                ));
                ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="comment-form-container">
        <?php
            // Define aria_req variable based on whether the field is required or not
            $aria_req = ( $req ? ' aria-required="true"' : '' );

            // Display comment form
            comment_form();
        ?>
    </div>
</div>

<?php endif; ?>

<?php
    // Custom callback function for comment template
    function custom_comment_template($comment, $args, $depth) {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
            <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('comment-body'); ?>>
                <div class="comment-header">
                    <i class="material-icons comment-dropdown-icon">arrow_drop_down</i>
                    <div class="comment-author vcard">
                        <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                        <cite class="fn"><?php echo get_comment_author_link(); ?></cite> <span class="says"><?php esc_html_e('says:', 'your-theme-textdomain'); ?></span>
                    </div>

                    <div class="comment-meta commentmetadata">
                        <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                            <?php
                            /* translators: 1: date, 2: time */
                            printf(get_comment_date());
                            ?>
                        </a>
                        &nbsp;&nbsp;
                        <?php edit_comment_link(esc_html__('(Edit)', 'your-theme-textdomain'), '  ', ''); ?>
                    </div>
                </div>

                <div class="comment-content">
                    <?php comment_text(); ?>
                </div>

                <div class="comment-reply">
                    <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'],
                    )));
                    ?>
                </div>
            </<?php echo $tag; ?>>
        <?php
    }
?>


<script>
    jQuery(document).ready(function($) {
        // Toggle class on click to expand/collapse comment
        $('.comment-body').click(function() {
            $(this).toggleClass('expanded collapsed');
        });
    });
</script>





