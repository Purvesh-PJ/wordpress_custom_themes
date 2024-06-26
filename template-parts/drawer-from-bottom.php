<div id="drw-cnt-btm">
    <div class="btn-container">
        <button class="close-btn" onclick="toggleDrawer()"><i class="fas fa-chevron-down"></i></button>
    </div>
    <div class="drawer-content">
        <nav class="navigation-links">
            <ul>
                <?php 
                    $top_menus_nav_items = wp_get_nav_menu_items('top-menus');
                        if ($top_menus_nav_items) {
                            foreach ($top_menus_nav_items as $item) {
                            echo '<li><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
                        }
                    }
                ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    function toggleDrawer() {
        var drawer = document.getElementById('drw-cnt-btm');
        if (drawer.classList.contains('open')) {
            drawer.style.bottom = '-100%'; // Slide down completely
            setTimeout(function() {
                drawer.classList.remove('open');
            }, 300); // Delay removal of 'open' class to match transition duration
        } else {
            drawer.style.bottom = '0'; // Slide up
            drawer.classList.add('open');
        }
    }
</script>



