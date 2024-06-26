<div class="technology-categories-section">
    <h2 class="tech-category-title">Tech Categories</h2>
    <?php
    $menu_args = array(
        'tech-categories' =>  'primary', // Replace with your menu location name
        'container'       =>  false,
        'menu_class'      =>  'technology-menu',
        // 'items_wrap'      =>  '<ul id="%1$s" class="%2$s">%3$s</ul>',
        // 'walker'          =>  new Material_Icons_Menu_Walker(),
    );

    wp_nav_menu($menu_args);
    ?>
</div>
