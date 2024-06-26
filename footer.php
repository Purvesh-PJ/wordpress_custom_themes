<?php
    $footer_class = '';

    // Check if a specific post is requested (via post title query parameter)
    $requested_post_title = isset($_GET['post_title']) ? sanitize_title($_GET['post_title']) : '';

    // Check if we are on a single post or the "Tech Blogs" page
    if (is_single() || !empty($requested_post_title)) {
        $footer_class = 'single-post-footer';
    }

    // if (is_single()) {
    //     echo '<script>console.log("Single Post Detected");</script>';
    // }
?>


<footer class="site-footer  <?php echo esc_attr($footer_class); ?>" >

    <div class="container-one <?php echo esc_attr($footer_class); ?>">
        
        <div class="footer-navigation <?php echo esc_attr($footer_class); ?>">
            <h3 class="container-headings <?php echo esc_attr($footer_class); ?>">Quick links</h3>
            <ul>
                <?php
                    // Get qucik links pages
                    $quick_links_menu_items = wp_get_nav_menu_items('quick-links-pages');
                    if ($quick_links_menu_items) {
                        foreach ($quick_links_menu_items as $item) {
                            echo '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>

        <div class="legals-navigation <?php echo esc_attr($footer_class); ?>">
            <h3 class="container-headings <?php echo esc_attr($footer_class); ?>">Legal & Policy</h3>
            <ul>
                <?php
                    // Get legal and policy pages
                    $legal_and_policy_menu_items = wp_get_nav_menu_items('legal-and-policy-pages');
                    if ($legal_and_policy_menu_items) {
                        foreach ($legal_and_policy_menu_items as $item) {
                            echo '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>

        <div class="informational-navigation <?php echo esc_attr($footer_class); ?>">
            <h3 class="container-headings <?php echo esc_attr($footer_class); ?>">Informational</h3>
            <ul>
                <?php
                    // Get informational pages
                    $informational_menu_items = wp_get_nav_menu_items('informational-pages');
                    if ($informational_menu_items) {
                        foreach ($informational_menu_items as $item) {
                            echo '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
                        }
                    }
                ?>
            </ul>
        </div>

    </div>

    <div class="container-two <?php echo esc_attr($footer_class); ?>">

        <!-- <div class="social-icons <?php echo esc_attr($footer_class); ?>">
            <h3 class="container-headings <?php echo esc_attr($footer_class); ?>"></h3>
            <div class="social-icon-container <?php echo esc_attr($footer_class); ?>">
                <a href="https://twitter.com/geekyquantum" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/geekyquantum" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/company/geekyquantum" target="_blank"><i class="fab fa-linkedin"></i></a>
            </div>
        </div> -->

        <!-- <div class="newsletter <?php echo esc_attr($footer_class); ?>">
            <h3 class="container-headings <?php echo esc_attr($footer_class); ?>">Subscribe to our newsletter</h3>
            <form class="subs-form <?php echo esc_attr($footer_class); ?>" action="/subscribe/" method="post">
                <input class="subscribe-input" type="email" name="email" placeholder="Enter your email" required>
                <button class="subscribe-button bg-slate-300" type="submit">Subscribe</button>
            </form>
        </div> -->

    </div>

    <div class="bottom-footer <?php echo esc_attr($footer_class); ?>">
        <div class="footer-text-container <?php echo esc_attr($footer_class); ?>">
            <p>&copy; <?php echo date('Y'); ?> GeekyQuantum. All Rights Reserved.</p>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>

