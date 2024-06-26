<div class="top-navigation">
    <div class="mobile-menu-button" onclick="toggleDrawer()">
        <!-- Use the Material Icons class for the hamburger icon -->
        <i id="mobile-menu-toggle" class="material-icons ham-icon">menu</i>
    </div>

    <div class="site-branding">
        <h1 class="site-title">
            <a href="<?php echo home_url(); ?>">
                GeekyQuantum
            </a>
        </h1>
    </div>

    <nav class="site-navigation">
        <?php
            // Display WordPress menu
            wp_nav_menu(array(
                'theme_location' => 'top-menus', // Change 'top-menu' to your menu location name
                'container' => false,
                'menu_class' => 'menu',
            ));
        ?>
    </nav>

    <div class="search-btn">
        <button type="submit" class="search-submit-small" onclick="toggleSearchPrompt()">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>






